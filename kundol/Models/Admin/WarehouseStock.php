<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class WarehouseStock extends Model
{
    protected $table = 'warehouse_stock';

    public function ScopeProductId($query, $productId) {
        return $query->where('product_id', $productId);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo('App\Models\Admin\Product', 'product_id', 'id');
    }
}
