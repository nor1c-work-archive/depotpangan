<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPrice extends Model
{
    use HasFactory;

    protected $table = 'product_category_prices';
    protected $fillable = [
        'category_id',
        'price'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
