<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /*
     * Status :
     * 0 => open
     * 1 => paid
     * 2 => payment failed
     * 3 => sent to galasys
     * 4 => done
     */
    protected $fillable = ['visit_date', 'email', 'name', 'phone_number', 'total_amount', 'status'];

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
