<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auction extends Model
{
    use SoftDeletes, HasFactory;
    
    protected $fillable = [
        'product_id', 'duration', 'starting_price', 'min_bid', 'multiplier', 'is_active'
    ];
    
    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function productDetail() {
        return $this->hasOne(ProductDetail::class);
    }
}
