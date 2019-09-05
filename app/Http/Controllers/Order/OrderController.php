<?php

namespace App\Http\Controllers\Order;

use DB;
use Auth;
use Session;
use Redirect;
use App\User;
use App\Cart;
use App\Order;
use App\Product;
use App\BillAddress;
use App\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function getOrder(Request $request){
    	$user_id      = Auth::user()->id;
    	$session_id   = Session::get('session_id');
       /* $userCart     = Cart::where('session_id', $session_id)->get();
        $total_amount  = 0;
        for ($userCart as $cart) { 
            $total_amount = $total_amount + ($cart->price*$cart->qty);
        }*/

        $userBill     = BillAddress::where('id', $user_id)->first();
    	$data		  = $request->all();

    	$order 		  			= new Order;
    	$order->user_id			= $user_id;
    	$order->name 			= $userBill->name;
    	$order->phone 			= $userBill->phone;
    	$order->total_price 	= $data['total_price'];
    	$order->status 			= "pending";
    	$order->save();

        $order_id               = DB::getPdo()->lastInsertId();
        $cartProducts            = DB::table('carts')->where('session_id', $session_id)->get();
        foreach ($cartProducts as $item) {
            $cartProduct        = new  OrderProduct;
            $cartProduct->order_id    = $order_id;
            $cartProduct->user_id    = $user_id;
            $cartProduct->product_id = $item->product_id;
            $cartProduct->name      = $item->name;
            $cartProduct->code      = $item->code;
            $cartProduct->price      = $item->price;
            $cartProduct->qty       = $item->qty;
            $cartProduct->save();
        }
        Session::put('order_id', $order_id);
        Session::put('total_price', $data['total_price']);
    	return redirect()->route('cart.order.thanks');
    }

    public function thanks(Request $request){
        $session_id   = Session::get('session_id');
        DB::table('carts')->where('session_id',$session_id )->delete();
        return view('frontend.order.thanks');
    }
}
