<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CustomerBalance extends Model {
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'customer_id', 'type', 'total', 'payment_method', 'snap_token', 'midtrans_order_id'
    ];

    public function customer() {
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'id');
    }

    public function ScopeWhereCustomer($query, $customer_id) {
        return  $query->where('customer_id', $customer_id);
    }
}