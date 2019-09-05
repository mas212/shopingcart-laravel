<?php

namespace App\Http\Controllers\FE;

use Redirect;
use App\Product;
use App\ClassList;
use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(){
    	$products       = Product::orderBy('created_at', 'DESC')->paginate($this->limit);
        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    public function getDetail($id){
    	$productDetail  	= Product::with('category')
    								->with('classList')
    								->find($id);
    	return view('frontend.product.detail',[
    		'productDetail' 	=> $productDetail
    	]);
    }
}
