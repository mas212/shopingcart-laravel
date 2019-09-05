<?php

namespace App\Http\Controllers\Cart;

use DB;
use Session;
use Redirect;
use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart(Request $request){
    	$data 		= $request->all();
    	if(empty($data['user_email'])){
    		$data['user_email']  	= '';
    	}

    	$session_id 	= Session::get('session_id');
    	if(empty($session_id )){
    		$session_id 		= str_random(40);
    		Session::put('session_id', $session_id);
    	}
    	DB::table('carts')->insert([
    		'product_id'	=> $data['product_id'],
    		'name'			=> $data['name'],
    		'code' 			=> $data['code'],
    		'price' 		=> $data['price'],
    		'qty' 			=> $data['qty'],
    		'user_email' 	=> $data['user_email'],
    		'session_id' 	=> $session_id,
            'start_date'    => $data['start_date'],
            'start_time'    => $data['start_time']
    	]);	
    	return redirect('cart')->with('flash_message_success', 'product has been added in Cart');
    }

    public function cart(){
    	$session_id 	= Session::get('session_id');
    	$userCart 		= DB::table('carts')->where(['session_id' => $session_id])->get();
    	return view('frontend.cart.index',[
    		'userCart' 	=> $userCart
    	]);
    }

    public function updateQty($id=null, $qty = null){
    	DB::table('carts')->where('id', $id)
    					->increment('qty', $qty);
    	return redirect('cart')->with('flash_message_success', 'product has been added in Cart');  
     }

    public function deleteCart($id)
    {
        $deleteCart      = Cart::where('id', $id)->firstOrFail();
        if($deleteCart->delete()){
            return redirect()->back();
        }
    }
}
