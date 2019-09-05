<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = "user_profiles";

    protected $fillable = [
    	'user_id',
    	'gender',
    	'phone',
    	'wa',
    	'birthday',
    	'photo'
    ];

    public function user(){
    	return $this->belongsTo('App/User');
    }
}
