<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = "order_products";

    protected $fillable = [
    	'user_id',
    	'order_id',
    	'product_id',
    	'name',
    	'code',
    	'price',
    	'qty'
    ];
}
