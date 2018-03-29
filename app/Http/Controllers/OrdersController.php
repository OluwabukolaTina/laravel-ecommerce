<?php

namespace App\Http\Controllers;

use App\Order;

use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function __construct()
    {

        $this->middleware('admin');

    }
    //
    public function index($type = '')
    {

    	if($type == 'pending') {

    		    	//display all orders
    	$orders = Order::where('delivered', 0)->get();

    	} elseif ($type == 'delivered') {
    		# code...
    		$orders = Order::where('delivered', 1)->get();
    	
    	} else {
        
            $orders = Order::all();
        
    	}

    	return view('admin.orders.index', compact('orders'));

    }





}
