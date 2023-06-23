<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ConsolidationStock extends Model
{
    protected $table = 'consolidation_stock';

    public function ScopeProductId($query, $productId) {
        return $query->where('product_id', $productId);
    }

    public function product() {
        return $this->belongsTo('App\Models\Admin\Product', 'product_id', 'id');
    }
}
