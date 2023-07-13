<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderPreorder extends Model {
    use SoftDeletes, HasFactory;

    protected $fillable = ['order_id', 'paid_off', 'is_dp'];

    public function order() {
        return $this->belongsTo('id', 'App\Models\Web\Order', 'order_id', 'id');
    }
}
