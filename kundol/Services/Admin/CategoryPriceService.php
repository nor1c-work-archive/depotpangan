<?php

namespace App\Services\Admin;

use App\Models\Admin\CategoryPrice;
use App\Traits\ApiResponser;
use DB;

class CategoryPriceService {
    use ApiResponser;

    public function store($parms, $categoryId) {
        $data = array(
            'category_id' => $categoryId,
            'price' => $parms['price'],
        );

        try {
            $query = new CategoryPrice;
            $query->create($data);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }
        
        return true;
    }
}