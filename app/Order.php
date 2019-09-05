<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
    	'user_id',
    	'name',
    	'phone',
    	'total_price',
    	'status'
    ];

    public function product(){
    	return $this->belongsTo('App\Product', 'product_id');
    }

    public function user(){
    	return $this->hasOne('App\User');
    }
}
