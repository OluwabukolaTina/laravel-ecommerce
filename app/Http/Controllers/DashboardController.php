<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;



class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('check');
	}


	
    public function dashboard(){
    	$loop = Session::get('CustomerAccts');

    	$userDetails = Session::get('userDetails');
    	$cus         = "";

    	foreach ($loop as $user){

    		$cus = $user;
    		# code...
    	}
    	return view('dashboard', compact('loop', 'userDetails', 'cus'));
    }




}
