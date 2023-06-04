<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippmentWithCity extends Model
{
    use HasFactory;

    protected $fillable = [
        'shippment_price', 'country_id', 'state_id', 'city_id', 'shipping_method_id'
    ];

    public function scopeShippmentWithCityId($query, $id)
    {
        return $query->where('id', $id);
    }


    public function scopeSearchParameter($query, $parameter)
    {
        return $query->whereHas('state', function ($querys) use ($parameter) {
                $querys->where('name', 'like', '%' . $parameter . '%');                
        })->orwhere(function ($query) use ($parameter) {
            $query->whereHas('country', function ($querys) use ($parameter) {
                $querys->where('name', 'like', '%' . $parameter . '%');
            });
        });

    }

    public function scopeCountryId($query, $id)
    {
        return $query->where('country_id', $id);
    }

    public function scopeStateId($query, $id)
    {
        return $query->where('state_id', $id);
    }

    public function scopeCityId($query, $id)
    {
        return $query->where('city_id', $id);
    }


    public function state()
    {
        return $this->belongsTo('App\Models\Admin\State', 'state_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Admin\Country', 'country_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\Admin\City', 'city_id', 'id');
    }

    public function ShippingMethod()
    {
        return $this->belongsTo('App\Models\Admin\ShippingMethod', 'shipping_method_id', 'id');
    }

}
