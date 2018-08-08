<?php

namespace App\Http\Controllers;

use Session;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUser;
use App\Http\Requests\validateLogin;
use Guzzle\Http\Exception\ClientErrorResponseException;
use GuzzleHttp\Exception\BadResponseException;
class UserController extends Controller
{
    public function index(){
    	return view('users/register');
    }
       public function register(RegisterUser $request){
    	$client = new Client(['http_errors' => false]);
        $body['action']       = 'register';
    	$body['account_number'] = request('account_Number');
    	
        $body['phone']			= "234".substr(request('phone_number'), 1);

        $result = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);

    	$response = json_decode($result->getBody()->getContents());

        if($response->status === false){
            Session::flash('message', $response->result->detail->CIException->errorList->errorMsg); 
            
            return redirect('/signup');
        }

        return redirect('/login');

    }

    	

        public function log(){

            Session::forget('userDetails');
            Session::forget('CustomerAccts');
    		return view('users/index');
    	}


    	public function login(validateLogin $request){

    		$client                   = new Client(['http_errors' => false]);
            $body['action']           = 'login';
            $body['userAccessCode']   = request('userAccessCode');
            $body['userPin']          = request('userPin');

            $result                   = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);

            $response                 = json_decode($result->getBody()->getContents());

            
            

            if($response->status === false){
                Session::flash('message', $response->result->detail->CIException->errorList->errorMsg);  //IF ERROR
                

                    return redirect('/login');
            }
            $loop                     = ($response->result->return->custChannelAcctData); //AN ARRAY OF CUSTOMER ACCOUNTS
            $userDetails              = $response->result->return;  //USER DETAILS FROM LOGIN PARAMETERS




            Session::put('userDetails', $userDetails);
            Session::put('CustomerAccts', $loop);

            $cus                      = "";

                    foreach ($loop as $user){ $cus  = $user;  }
                        

            return view('dashboard', compact('loop', 'userDetails', 'cus'));

    	       }

    	

        public function reset(){
    		      
                   return view('users/password-reset');
    	}

    	

        public function resetPassword(){
    		
            $userDetails             = session::get('userDetails');

    		$client                  = new Client(['http_errors' => false]);
            
            $body['action']          = 'change_password';
            
            $body['userAccessCode']  = $userDetails->userAccessCode;
            
            $body['userPin']         = request('userPin');
            
            $body['newPassword']	 = request('newPassword');
            
            $body['confirmPassword'] = request('confirmPassword');

            $result                  = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);

            $response                = json_decode($result->getBody()->getContents());

            

            if($response->status === false){
                
                Session::flash('message', $response->result->detail->CIException->errorList->errorMsg); 
                Session::flash('alert-class', 'alert-danger');
                
                return back();
            
            }
                Session::flash('message', 'Pin change successful');
                Session::flash('alert-class', 'alert-success');
            
            	return redirect('/login');

    	}
}
