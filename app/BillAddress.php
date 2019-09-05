<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillAddress extends Model
{
    protected $table = "bill_addresses";

    protected $fillable = [
    	'user_id',
    	'name',
    	'email',
    	'address',
    	'phone'
    ];
}
