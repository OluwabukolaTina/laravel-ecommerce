<?php

namespace App\Http\Controllers;

use Session;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use App\Http\Requests\confirmToken;

class NavController extends Controller
{
    public function __construct()
    {
        $this->middleware('check', ['except' => ['faq', 'help', 'branch', 'scam', 'contact','forgotPassword', 'reset']]);
    }



    public function profile()
    {
    	$loop = session::get('CustomerAccts');
        $userDetails = Session::get('userDetails');
        $cus         = "";

        foreach ($loop as $user){

            $cus = $user;
            # code...
        }

        return view('profile', compact('cus', 'loop', 'userDetails'));

    }

    public function changePin(){
    	$loop = session::get('CustomerAccts');
        $userDetails = Session::get('userDetails');
        $cus         = "";

        foreach ($loop as $user){

            $cus = $user;
            # code...
        }

        return view('change-pin', compact('cus', 'loop', 'userDetails'));

    }


    public function security(){
    	$loop = session::get('CustomerAccts');
        $userDetails = Session::get('userDetails');
        $cus         = "";

        foreach ($loop as $user){

            $cus = $user;
            # code...
        }

        return view('security-questions', compact('loop', 'cus', 'userDetails'));

    }

    public function confirmToken(){

        $loop = session::get('CustomerAccts');
        $userDetails = Session::get('userDetails');
        $cus         = "";

        foreach ($loop as $user){

            $cus = $user;
            # code...
        }

        

        return view('transaction-token', compact('loop', 'cus', 'userDetails'));

    }

    public function token(confirmToken $request){
        
        //LAPO TO LAPO TRANSFER API
        if(Session::get('transferBody') !== null ){

        $body = Session::get('transferBody'); //REQUEST BODY PASSED FROM TRANSACTION FORM TO BE PASSED ALONG OTP
        $body['action']          = 'web_lapo_customer_transfer';
    
    
        $body['requestPassword'] = request('password');
        // dd($body);
        $client = new Client(['http_errors' => false]);
        
        $result = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);

        $response = json_decode($result->getBody()->getContents());

        Session::forget('transferBody');


        if($response->result->return->errorMsg){

            Session::flash('message', 'Transaction failed'); 
            
            Session::flash('alert-class', 'alert-danger');

            return redirect()->back();

        }

            Session::flash('message', 'transaction successful');
            
            Session::flash('alert-class', 'alert-success');
             
            return redirect()->back();

    
      } elseif (Session::get('airtime') !== null) {
          
          $value = Session::get('airtime');

          $value['action'] = 'web_service_provider_payment'; 

          $client = new Client(['http_errors' => false]);
          
          $result = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $value ]);

          $resp = json_decode($result->getBody()->getContents());

          // dd($resp);

          Session::forget('airtime');


           if($resp->status == true){

            //AIRTIME TOP UP API

            $amt        = $value['transAmount'];
            
            $ntwrk      = $value['ntwrk'];
            
            $phone      = $value['phone'];

            
            $res = $client->get('http://airtime.mindshareltd.com/api/v1/topup?ref=LAPOUSSD&token=HncVWJGDZPJEkv1dfbJ4K5jgZECMXyyv&network='.$ntwrk.'&amount='.$amt.'&phone='.$phone.'');
            
            $response = json_decode($res->getBody()->getContents());
            

             if($response->status == '250'){

            Session::flash('message', 'Airtime recharge successful');
            
            Session::flash('alert-class', 'alert-success');
             
             return redirect('airtime');

             } else {

            //ACCOUNT REVERSAL INCASE OF TRANSACTION FAILURE

            $reverse['action']         = 'reverse_transaction';
            $reverse['transAmount']    = $value['transAmount'];
            $reverse['userAccessCode'] = $value['userAccessCode'];
            $reverse['userPin']        = $value['userPin'];
            $reverse['accountNumber']  = $value['accountNumber'];

            $client = new Client(['http_errors' => false]);
          
            $result = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $reverse ]);

            Session::flash('message', 'Airtime Top Up failed'); 
            Session::flash('alert-class', 'alert-danger');
            return back();

             }

             
         } else {

            Session::flash('message', 'Insufficient Funds'); 
            Session::flash('alert-class', 'alert-danger');

            return back();
         }

      } elseif (Session::get('bills') !== null) {

          $data           = Session::get('bills');

          $data['action'] = 'web_service_provider_payment';

          $client         = new Client(['http_errors' => false]);
          
          $result         = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $data ]);

          $resp           = json_decode($result->getBody()->getContents());

          Session::forget('bills');

          if($resp->status === true){


        $client = new Client(['http_errors' => false]);

        $req['paymentCode']        = $data['paymentCode'];   

        $req['customerId']         = $data['customerId'];    

        $req['amount']             = $data['amount'];        

        $req['customerMobile']     = $data['customerMobile'];

        $req['customerEmail']      = $data['customerEmail']; 


        $res                  = $client->post('https://nouveaurichemedia.herokuapp.com/api/v1/billers/pay', ['form_params' => $req]);

        $resolve                = json_decode($res->getBody()->getContents());

        // dd($resolve);

        if(!is_object($resolve)){

            Session::flash('message', 'Transaction failed, please check your customer ID'); 
            Session::flash('alert-class', 'alert-danger');


            $body['action']         = 'reverse_transaction';
            $body['transAmount']    = $data['transAmount'];
            $body['userAccessCode'] = $data['userAccessCode'];
            $body['userPin']        = $data['userPin'];
            $body['accountNumber']  = $data['accountNumber'];

            $client = new Client(['http_errors' => false]);
          
            $reversal = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);



            return back();
        }

        Session::flash('message', 'Bills Payment successful');
            Session::flash('alert-class', 'alert-success');
             return back();


          } else {

            Session::flash('message', 'Insufficient Funds'); 
            Session::flash('alert-class', 'alert-danger');
            return back();


          }
      }

    }

    public function forgotPassword(){
        return view('users/forgot-password');
    }

    public function reset(){
        $body['action'] = 'reset_password';
        $body['userAccessCode'] = request('acct');

        $client = new Client(['http_errors' => false]);
        $result = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);

        $response = json_decode($result->getBody()->getContents());

        

        return redirect('/');
    }


    public function faq(){
        return view('users/faq');
    }

    public function help(){
        return view('users/help');
    }

    public function branch(){
       return view('users/branch-locator');
    }

    public function scam(){
        return view('users/scam-alert');
    }

    public function contact(){
        return view('users/contact');
    }














}
