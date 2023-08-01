<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CustomerCurrentBalance extends Model {
    protected $table = 'customer_current_balance';

    public function customer() {
        return $this->belongsTo('App\Models\Admin\Customer', 'customer_id', 'id');
    }

    public function current_value_variable_product()
    {
        return $this->hasOne('App\Models\Admin\CurrentValue', 'reference_id', 'product_combination_id')->where('type','variable_product');
        
    }
}
