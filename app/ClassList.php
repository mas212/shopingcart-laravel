<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassList extends Model
{
    protected $table    = "classes";

    protected $fillable = [
    	'name'
    ];

    public function product(){
    	return $this->hasMany('App\Product');
    }
}
