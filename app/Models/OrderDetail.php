<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['order_id', 'product_id', 'galasys_product_id', 'product_name', 'price', 'qty', 'total_price'];
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
