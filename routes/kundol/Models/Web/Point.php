<?php

namespace App\Models\Web;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Point extends Model
{
    use HasFactory;

    protected $fillable = ['points', 'type','description','reference_id', 'customer_id','status'];


    public function customer()
    {
        return $this->belongsTo('App\Models\Admin\Customer', 'customer_id', 'id');
    }

    public function ScopeCustomerId($query, $id)
    {
        $query->where('customer_id', $id);
    }

    public function ScopeFindStatus($query, $status)
    {
        $query->where('status', $status);
    }

    public function ScopeWithoutRedeem($query)
    {
        return $query->where('customer_id', Auth::id())->whereNotIn('type',['redeem'])->sum('points');
    }

    public function ScopeWithRedeem($query)
    {
        return $query->where('customer_id', Auth::id())->where('type',['redeem'])->sum('points');
    }

    public function ScopeTotalPoints()
    {
        $pointWithRedeem = $this->WithRedeem();
        $pointWithoutRedeem = $this->WithoutRedeem();
        $total = $pointWithoutRedeem - $pointWithRedeem ;
        return $total;
    }

}
