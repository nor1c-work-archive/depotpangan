<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterContact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'created_by'
    ];

    public function scopeSearchParameter($query, $parameter)
    {
        return $query->where('name', 'like', '%' . $parameter . '%');
    }
}
