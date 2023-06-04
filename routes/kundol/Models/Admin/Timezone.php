<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'offset', 'diff_from_gtm',
    ];

    public function scopeNotTimezoneId($query, $id)
    {
        return $query->where('id', '!=', $id);
    }

    public function scopeFindByTimezoneId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopedefaultTimezone($query)
    {
        return $query->where('is_default', '1');
    }
}
