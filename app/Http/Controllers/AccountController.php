<?php

namespace App\Http\Controllers;


use Session;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Guzzle\Http\Exception\ClientErrorResponseException;
use GuzzleHttp\Exception\BadResponseException;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('check');
    }


    
    public function account(){
    	$loop = session::get('CustomerAccts');
    	$user = Session::get('userDetails');
    	$body['action']   = 'account_statement';
    	$body['userAccessCode'] = $user->userAccessCode;
        $body['userPin']          = $user->userPin;
        $body['accountNumber']	   = $user->accountNo;
        $client = new Client(['http_errors' => false]);
        $statement = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);
        $acct_stmt = (json_decode($statement->getBody()->getContents()));
        $acct_history      = $acct_stmt->result->return->accountStmt;
        $userDetails = $user;
        // dd($acct);
        $cus         = "";
        foreach ($loop as $user){

            $cus = $user;
            # code...
        }

        //MAKE CALL TO THE ACCOUNT BALANCE API TO GET ACCOUNT BALANCE
        $client = new Client(['http_errors' => false]);
        $body['action']  = 'account_balance';
        $response = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);
        $acct_balance = (json_decode($response->getBody()->getContents()));
        // dd($acct_balance);
        return view('account-summary', compact('loop', 'acct_history', 'cus','userDetails'));
    }


    public function transactionHistory(){
    	$loop = session::get('CustomerAccts');
    	$user = Session::get('userDetails');

    	$body['action']   = 'account_statement';
    	$body['userAccessCode'] = $user->userAccessCode;
        $body['userPin']          = $user->userPin;
        $body['accountNumber']	   = $user->accountNo;

        $client = new Client(['http_errors' => false]);
        $statement = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);

        $acct_stmt = (json_decode($statement->getBody()->getContents()));
        $acct_history      = $acct_stmt->result->return->accountStmt;
        $userDetails = Session::get('userDetails');
        $cus         = "";
        foreach ($loop as $user){
            $cus = $user;
            # code...
        }
    	return view('transaction-history', compact('loop', 'acct_history', 'cus', 'userDetails'));

    }

    public function loan(){
    	$loop = session::get('CustomerAccts');
    	$user = Session::get('userDetails');
    	$body['action']   = 'account_statement';
    	$body['userAccessCode'] = $user->userAccessCode;
        $body['userPin']          = $user->userPin;
        $body['accountNumber']	   = $user->accountNo;
        $client = new Client(['http_errors' => false]);
        $statement = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);

        $acct_stmt = (json_decode($statement->getBody()->getContents()));
        $acct      = $acct_stmt->result->return->accountStmt;

        $userDetails = Session::get('userDetails');
        $cus         = "";

        foreach ($loop as $user){

            $cus = $user;
            # code...
        }

        // dd($loop);

    	

    	return view('loan', compact('loop', 'acct', 'cus', 'userDetails'));

    }
}
