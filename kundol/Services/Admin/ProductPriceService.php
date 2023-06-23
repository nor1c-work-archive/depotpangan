<?php

namespace App\Services\Admin;

use App\Models\Admin\ProductPrice;
use App\Traits\ApiResponser;
use DB;

class ProductPriceService {
    use ApiResponser;

    public function store($previous_price, $product_id) {
        $data = array(
            'product_id' => $product_id,
            'price' => $previous_price,
        );

        try {
            $query = new ProductPrice;
            $query->create($data);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }
        
        return true;
    }
}