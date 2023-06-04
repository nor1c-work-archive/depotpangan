<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state_id',
        'country_id',
        'status'
    ];

    public function scopeCityId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('name', 'like', '%' . $parameter . '%')->orWhere(function ($query) use ($parameter) {
                $query->whereHas('state', function ($querys) use ($parameter) {
                    $querys->where('name', 'like', '%' . $parameter . '%');
            });
        })->orWhere(function ($query) use ($parameter) {
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

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeOrderByStatus($query)
    {

        $query1 = "CASE WHEN status = 'active' THEN 1 ";
        $query1 .= "WHEN status = 'inactive' THEN 2 ";
        $query1 .= "WHEN status = 'disable' THEN 3 ";
        $query1 .= "ELSE 4 END ASC";
 

        return $query->orderByRaw($query1);
    }

    public function state()
    {
        return $this->belongsTo('App\Models\Admin\State', 'state_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Admin\Country', 'country_id', 'id');
    }

    public function shippmentWithCity()
    {
        return $this->hasMany('App\Models\Admin\ShippmentWithCity');
    }
}
