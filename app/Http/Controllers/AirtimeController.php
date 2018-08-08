<?php

namespace App\Http\Controllers;

use Session;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use App\Http\Requests\airtime;


class AirtimeController extends Controller
{
	public function __construct()
    {
        $this->middleware('check');
    }


    public function index(){

    	$loop = session::get('CustomerAccts');
        $userDetails = Session::get('userDetails');
        $cus         = "";

        foreach ($loop as $user){

            $cus = $user;
            # code...
        }

        return view('airtime', compact('loop','userDetails','cus'));

    }

    function buyAirtime(airtime $airtime){
        $userDetails                = session::get('userDetails');

        $client                     = new Client(['http_errors' => false]);

        $body['action']             = 'generate_OTP';
       
        $body['userAccessCode']     = $userDetails->userAccessCode;
        
        $body['userPin']            = request('userPin');

        $body['accountNumber']      = request('account_number');

        $body['transAmount']        = request('amount');

        $body['serviceProviderCode']= '102';

        $body['ntwrk']              = request('network');

        $body['phone']              = request('phone_number');

        $body['remarks']            = 'Airtime top up';

        $result                     = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);

        Session::put('airtime', $body);
        return redirect('/confirm-token');
        
    }
}
