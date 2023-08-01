<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CurrentBalance extends Model {
    protected $table = 'customer_current_balance';

    public function user() {
        return $this->belongsTo('App\Models\Admin\Customer', 'customer_id', 'id');
    }
}
