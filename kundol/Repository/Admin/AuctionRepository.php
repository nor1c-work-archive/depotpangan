<?php

namespace App\Repository\Admin;

use App\Contract\Admin\AuctionInterface;
use App\Http\Resources\Admin\Auction as AuctionResource;
use App\Models\Admin\Auction;
use App\Models\Admin\Inventory;
use App\Models\Admin\Language;
use App\Models\Admin\Purchase;
use App\Models\Admin\PurchaseDetail;
use App\Services\Admin\PurchaseDetailService;
use App\Traits\ApiResponser;
use App\Traits\Transactions;
use DB;

class AuctionRepository implements AuctionInterface {
    use ApiResponser;
    use Transactions;

    public function all() {
        $auction = new Auction();

        if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
            $numOfResult = $_GET['limit'];
        } else {
            $numOfResult = 100;
        }

        $auction = $auction->with('product.productDetail');
        $auction = $auction->with(('product.unit.detail'));

        // if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
        //     $search = $_GET['searchParameter'];
        //     $auction = $auction->Where(function ($query) use ($search) {
        //         $query->whereHas('purchaser', function ($query) use ($search) {
        //             $query->where('purchaser.first_name', 'like', '%' . $search . '%')->orWhere('purchaser.last_name', 'like', '%' . $search . '%');
        //         })->orWhereHas('warehouse', function ($query) use ($search) {
        //             $query->where('warehouses.name', 'like', '%' . $search . '%');
        //         })->orWhere('description', 'like', '%' . $search . '%');
        //     });
        // }

        $sortBy = ['id', 'product', 'qty', 'duration', 'starting_price', 'min_bid', 'multiplier_bid', 'is_active'];
        $sortType = ['ASC', 'DESC', 'asc', 'desc'];
        if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
            $auction = $auction->orderBy($_GET['sortBy'], $_GET['sortType']);
        }

        try {
            return $this->successResponse(AuctionResource::collection($auction->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($auction) {
        $auction = Purchase::purchaseId($auction->id);
        if (isset($_GET['getSupplier']) && $_GET['getSupplier'] == '1') {
            $auction = $auction->with('supplier');
        }
        if (isset($_GET['getPurchaseDetail']) && $_GET['getPurchaseDetail'] == '1') {
            $auction = $auction->with('purchase_detail');
        }
        $languageId = Language::defaultLanguage()->value('id');
        if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
            $language = Language::languageId($_GET['language_id'])->firstOrFail();
            $languageId = $language->id;
        }
        if (isset($_GET['getProductDetail']) && $_GET['getProductDetail'] == '1') {
            $auction = $auction->with('purchase_detail.product.detail', function ($querys) use ($languageId) {
                $querys->where('language_id', $languageId);
            });
        }
        if (isset($_GET['getProductCombinationDetail']) && $_GET['getProductCombinationDetail'] == '1') {
            $auction = $auction->with('purchase_detail.product_combination');
        }
        if (isset($_GET['getWarehouse']) && $_GET['getWarehouse'] == '1') {
            $auction = $auction->with('warehouse');
        }
        try {

            return $this->successResponse(new AuctionResource($auction->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms) {
        DB::beginTransaction();
        try {
            $sql = new Purchase;
            $parms['created_by'] = \Auth::id();
            $auction = $sql->create($parms);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }

        if ($sql) {
            $transaction_id = $this->saveTransaction("Purchase product");
            $this->saveTransactionDetail($parms['supplier_id'], 0, $parms['total_amount'], 11, $transaction_id, "purchase", 'supplier');
            $auctionDetailService = new PurchaseDetailService;
            $sql = $auctionDetailService->store($parms, $auction->id, $auction->warehouse_id, $transaction_id, 'supplier');
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new AuctionResource($auction), 'Purchase Save Successfully!');
        } else {
            DB::rollBack();
            return $this->errorResponse();
        }
    }

    public function destroy($auction) {
        DB::beginTransaction();
        try {
            $sql = Purchase::findOrFail($auction);
            $sql->delete();
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }
        if ($sql) {
            DB::commit();
            return $this->successResponse('', 'Purchase Delete Successfully!');
        } else {
            DB::rollBack();
            return $this->errorResponse();
        }
    }

    public function update($parms, $auction) {
        // 
    }

    public function updateStatus($parms, $auction) {

        DB::beginTransaction();
        try {
            $sql = $auction->update([
                'purchase_status' => $parms['status'],
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }

        if ($sql) {
            $auction = Purchase::where('id', $auction->id)->first();
            $transaction_id = $this->saveTransaction("Purchase product");
            $this->saveTransactionDetail($auction->supplier_id, $auction->total_amount, 0, 11, $transaction_id, "purchase", 'supplier');
            $auctionDetails = PurchaseDetail::where('purchase_id', $auction->id)->get();
            foreach ($auctionDetails as $key => $auctionDetail) {
                Inventory::insertOrIgnore([
                    'product_id' => $auctionDetail->product_id,
                    'warehouse_id' => $auction->warehouse_id,
                    'stock_status' => 'OUT',
                    'qty' => $auctionDetail->qty,
                    'qty' => $auctionDetail->price,
                    'reference_id' => $auction->id,
                    'product_combination_id' => $auctionDetail->product_combination_id,
                    'stock_type' => 'PurchaseReturn',
                    'created_by' => \Auth::id(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]);
                $refrence_id = $auctionDetail->product_combination_id != null ? $auctionDetail->product_combination_id : $auctionDetail->product_id;
                $account_type = $auctionDetail->product_combination_id != null ? 'variable_product' : 'simple_product';
                $this->saveTransactionDetail($refrence_id, 0, $auctionDetail->price * $auctionDetail->qty, 6, $transaction_id, "purchase", $account_type, $auction->warehouse_id);
            }
            DB::commit();
            return $this->successResponse(new AuctionResource($auction), 'Purchase Status Updated Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }

    }
}
