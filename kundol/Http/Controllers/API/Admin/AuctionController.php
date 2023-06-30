<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\AuctionInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\AuctionRequest;
use App\Models\Admin\Auction;
use App\Repository\Admin\AuctionRepository;
use App\Services\Admin\AuctionService;
use App\Traits\ApiResponser;

class AuctionController extends Controller {
    use ApiResponser;
    private $AuctionRepository;

    public function __construct(AuctionInterface $AuctionRepository) {
        $this->AuctionRepository = $AuctionRepository;
        $this->middleware('store')->except('index', 'show');
    }

    public function index() {
        return $this->AuctionRepository->all();
    }

    public function show(Auction $auction) {
        dd('getting auctions');
        return $this->AuctionRepository->show($auction);
    }

    public function store(AuctionRequest $request) {
        $parms = $request->all();
        if ($request->product_type == 'variable') {
            $productService = new AuctionService;
            $validate = $productService->validateProductVariable($request);
            if ($validate != '1') {
                return $validate;
            }
        }
        return $this->AuctionRepository->store($parms);
    }

    public function update(AuctionRequest $request, Auction $auction) {
        $parms = $request->all();
        
        if ($auction->product_type != $request->product_type) {
            return $this->errorResponse("You Don't have a right to change the product type!", 401);
        }

        if ($request->product_type == 'variable') {
            $productService = new AuctionService;
            $validate = $productService->validateProductVariable($request);
            if ($validate != '1' && !isset($parms['edit'])) {
                return $validate;
            }
        }
        
        return $this->AuctionRepository->update($parms, $auction);
    }

    public function destroy($id) {
        return $this->AuctionRepository->destroy($id);
    }
}
