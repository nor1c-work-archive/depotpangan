<?php

namespace App\Repository\Web;

use App\Contract\Admin\CustomerBalanceInterface;
use App\Traits\ApiResponser;
use App\Models\Web\CustomerBalance;
use App\Http\Resources\Admin\CustomerBalance as CustomerBalanceResource;
use App\Models\Admin\CustomerCurrentBalance;
use Exception;
use Illuminate\Support\Facades\DB;

class CustomerBalanceRepository implements CustomerBalanceInterface {
    use ApiResponser;
    
    public function all() {
        try {
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            $balance = new CustomerBalance;

            if (isset($_GET['customer']) && $_GET['customer'] == '1') {
                $balance = $balance->with('customer');
            }

            if (isset($_GET['customer_id']) && $_GET['customer_id'] != "") {
                $balance = $balance->where('customer_id', $_GET['customer_id']);
            }

            if (isset($_GET['customer_id']) && $_GET['customer_id'] != '') {
                $balance = $balance->whereCustomer($_GET['customer_id']);
            }

            if (\Request::route()->getName() == 'customer_balance.index') {
                $balance = $balance->whereCustomer(\Auth::id());
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $balance = $balance->searchParameter($_GET['searchParameter']);
            }

            $sortBy = ['id'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $balance = $balance->orderBy($_GET['sortBy'], $_GET['sortType']);
            }
            
            return $this->successResponse(CustomerBalanceResource::collection($balance->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($balance) {
        $balance = CustomerBalance::where('id', $balance->id);

        try {
            return $this->successResponse(new CustomerBalanceResource($balance->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function deposit($parms) {
        try {
            DB::beginTransaction();

            $sql = CustomerBalance::create($parms);
            $sql->save();

            DB::commit();
            return $this->successResponse(new CustomerBalanceResource($sql), 'Customer Balance Updated!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }
    }

    public function get_current_balance($parms) {
        try {
            $sql = CustomerCurrentBalance::where('customer_id', $parms['customer_id']);

            $balance = $sql->firstOrfail();
            return $balance ? currencyFormat($balance['current_balance']) : 0;
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }
}
