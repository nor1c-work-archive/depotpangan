<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    protected $table = 'countries';
    protected $fillable = [
        'name', 'iso_code_2', 'iso_code_3', 'address_format_id', 'country_code', 'status'
    ];

    public function scopeCountryId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('name', 'like', '%' . $parameter . '%');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeinActive($query)
    {
        return $query->where('status', 'inactive');
    }

    public function scopeOrderByStatus($query)
    {

        $query1 = "CASE WHEN status = 'active' THEN 1 ";
        $query1 .= "WHEN status = 'inactive' THEN 2 ";
        $query1 .= "WHEN status = 'disable' THEN 3 ";
        $query1 .= "ELSE 4 END ASC";
 

        return $query->orderByRaw($query1);
    }

    public function states()
    {
        return $this->hasMany('App\Models\Admin\State');
    }

    public function cities()
    {
        return $this->hasMany('App\Models\Admin\City');
    }

    public function shippmentWithCity()
    {
        return $this->hasMany('App\Models\Admin\ShippmentWithCity');
    }
}
