<?php

namespace App\Http\Controllers;

use Session;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Events\payBills;


use Illuminate\Http\Request;
use App\Http\Requests\billsForm;


class BillspaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('check');
    }

    public function bills(){
    	$loop = session::get('CustomerAccts');

    	$userDetails = Session::get('userDetails');
    	$cus         = "";
    	$contents;
    	$billers;
    	foreach ($loop as $user){
    		$cus = $user;
    		# code...
    	}
		$client = new Client(['http_errors' => false]);
		$result = $client->request('GET', 'https://nouveaurichemedia.herokuapp.com/api/v1/billers/billername');
		$contents = json_decode($result->getBody()->getContents());
    	return view('bills', compact('loop', 'cus', 'userDetails', 'contents'));
    }

    public function paybills(billsForm $request){
        $userDetails                = session::get('userDetails');
        $client                     = new Client(['http_errors' => false]);
        $body['action']             = 'web_service_provider_payment';
        $body['userAccessCode']     = $userDetails->userAccessCode;
        $body['userPin']            = request('userPin');
        $body['accountNumber']      = request('account_number');
        $body['transAmount']        = request('amount');
        $body['serviceProviderCode']= '102';
        $body['remarks']            = 'bills payment';
        $body['paymentCode']        = request('biller');
        $body['customerId']         = request('customer_id');
        $body['amount']             = request('amount');
        $body['customerMobile']     = $userDetails->customerPhoneNo;
        $body['customerEmail']      = 'lapo@gmail.com';
        $result                     = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);
        Session::put('bills', $body);
        return redirect('/confirm-token');
    }
    public function master(){

    	$userDetails = Session::get('userDetails');
    	$loop    = Session::get('CustomerAccts');
    	$cus         = "";

    	foreach ($loop as $user){

    		$cus = $user;
    		# code...
    	}

    	// dd($userDetails);

    	return view('layouts/master', compact('cus', 'userDetails'));
    }

}
