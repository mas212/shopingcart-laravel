<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
    	'name',
    	'category_id',
    	'class_id',
    	'code',
    	'price',
    	'photo',
    	'description'
    ];

    public function category(){
    	return $this->belongsTo('App\Categories');
    }

    public function classList(){
    	return $this->belongsTo('App\ClassList', 'class_id');
    }
}
