<?php

namespace App\Http\Controllers;

use Redirect;
use App\Product;
use App\ClassList;
use App\Categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(){
   		$products       = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('frontend.product.index', [
            'products' => $products
        ]);
    }
}
