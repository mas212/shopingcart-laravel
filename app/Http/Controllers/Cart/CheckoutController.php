<?php

namespace App\Http\Controllers\Cart;

use DB;
use Auth;
use Session;
use Redirect;
use App\User;
use App\Cart;
use App\Order;
use App\Product;
use App\BillAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function checkout(Request $request){
    	$user_id 		     = Auth::user()->id;
    	$userDetails 	   = User::findOrFail($user_id);
      $session_id      = Session::get('session_id');
      if($request->isMethod('post')){
        $data     = $request->all();
        if (
            empty($data['name'])||
            empty($data['email'])||
            empty($data['address'])||
            empty($data['phone'])
          ) {
          return redirect()->back();
        }
        $billAddress              = new BillAddress;
        $billAddress->user_id     = $user_id;
        $billAddress->name        = $data['name']; 
        $billAddress->email       = $data['email']; 
        $billAddress->address     = $data['address']; 
        $billAddress->phone       = $data['phone']; 
        $billAddress->save();
        return redirect()->route('order.review');
      }
    	return view('frontend.checkout.index', [
    		'userDetails' 	=> $userDetails
    	]);
    }

    public function orderReview(){
      $user_id      = Auth::user()->id;
      $billMember   = BillAddress::where('user_id', $user_id)->first();
      $session_id   = Session::get('session_id');
      $userCart     = Cart::where('session_id', $session_id)->get();
      return view('frontend.order.index', [
        'billMember'  => $billMember,
        'userCart'    => $userCart
      ]);
    }
}
