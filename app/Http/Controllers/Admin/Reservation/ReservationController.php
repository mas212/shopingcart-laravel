<?php

namespace App\Http\Controllers\Admin\Reservation;

use Auth;
use Redirect;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
	protected $limit;
	public function __construct($limit = 10){
		$this->limit = $limit;
	}

    public function index(){
    	$orders 		= Order::with('user')
    							->orderBy('created_at', 'DESC')->paginate($this->limit);
    	//dd($orders);
    	return view('admin.reservation.index', [
    		'orders' => $orders
    	]);
    }
}
