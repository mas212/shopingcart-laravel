<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "carts";

    protected $fillable = [
    	'product_id',
    	'name',
    	'code',
    	'price',
    	'qty',
    	'user_email',
    	'session_id',
        'start_date',
        'start_time'
    ];
}
