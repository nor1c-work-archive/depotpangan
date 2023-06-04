<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code', 'direction', 'directory', 'is_default', 'status', 'created_by', 'updated_by',
    ];

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('name', 'like', '%' . $parameter . '%')->orWhere('code', 'like', '%' . $parameter . '%');
    }

    public function scopeNotLanguageId($query, $id)
    {
        return $query->where('id', '!=', $id);
    }

    public function scopeLanguageId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeDefaultLanguage($query)
    {
        return $query->where('is_default', '1');
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
}
