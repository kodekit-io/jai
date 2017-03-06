<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
//    protected $fillable = ['visit_date', 'email', 'name', 'phone_number', 'sub_total', 'tax', 'total_amount', 'status'];
    protected $guarded = ['id'];

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function galasysTickets()
    {
        return $this->hasMany(GalasysTicket::class);
    }
}
