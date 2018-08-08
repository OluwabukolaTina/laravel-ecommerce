<?php

namespace App\Http\Controllers;

use Session;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use App\Http\Requests\validateSelfTransfer;
use App\Http\Requests\beneficiary;
class TransferController extends Controller
{
    public function __construct()
    {
        $this->middleware('check');
    }
	public function self(){
		$loop = session::get('CustomerAccts');
		$creditLoop = session::get('CustomerAccts');
        $userDetails = Session::get('userDetails');
        $cus         = "";

        foreach ($loop as $user){

            $cus = $user;
            # code...
        }
        //GET LIST OF BENEFICIARIES
        $client = new Client(['http_errors' => false]);
        $body['action']  = 'get_beneficiaries';
        $body['userAccessCode'] = $userDetails->userAccessCode;
        $body['userPin']          = $userDetails->userPin;
        $result = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);
        $response = json_decode($result->getBody()->getContents());
        //BENEFICIARY ACCOUNT LIST ARRAY
        $beneficiaries = ($response->result->return->customerBeneficiaryOutputCIData);
		return view('self-transfer', compact('loop', 'creditLoop', 'cus', 'userDetails', 'beneficiaries'));
	}
	public function selfTransfer(validateSelfTransfer $request){
		$client = new Client(['http_errors' => false]);
		$user_data = Session::get('userDetails');
        $body['action']       = 'mobile_lapo_customer_transfer';
        $body['userAccessCode'] = $user_data->userAccessCode;
        $body['userPin']          = request('userPin');
        $body['accountNumber']    = request('accountNumber');
        $body['transAmount']      = request('transAmount');
        $body['receipientAccountNo'] = request('receipientAccountNo');
        $body['remarks']             = request('remarks');
        $result = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);
        $response = json_decode($result->getBody()->getContents());
        // dd($response);
        if($response->status == false){
            Session::flash('message', 'INSUFFICIENT FUNDS'); 
			Session::flash('alert-class', 'alert-danger');
            return back();
        } 
        	Session::flash('message', 'transaction successful');
        	Session::flash('alert-class', 'alert-success');
        	 return redirect('/self');
	}
    public function LapoTransfer(){
        Session::forget('transferBody');
        $loop = session::get('CustomerAccts');
        $creditLoop = session::get('CustomerAccts');
        $userDetails = Session::get('userDetails');
        // $beneficiaries = Session::get('beneficiaries');
        $cus         = "";
         $client = new Client(['http_errors' => false]);
        $body['action']  = 'get_beneficiaries';
        $body['userAccessCode'] = $userDetails->userAccessCode;
        $body['userPin']          = $userDetails->userPin;
        $res = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);
        $resp = json_decode($res->getBody()->getContents());
        //BENEFICIARY ACCOUNT LIST ARRAY
        $beneficiaries = ($resp->result->return->customerBeneficiaryOutputCIData);
        // Session::put('beneficiaries', $beneficiaries);
        ///////////////////////////END OF BENEFICIARY REQUEST API/////////////////////////////////////
        foreach ($loop as $user){
            $cus = $user;
            # code...
        }
        return view('lapo-account', compact('loop', 'creditLoop', 'cus', 'userDetails', 'beneficiaries'));
    }

    public function Lapo2LapoTransfer(validateSelfTransfer $request){
        $client                      = new Client(['http_errors' => false]);
        $user_data                   = Session::get('userDetails');
        $body['action']              = 'generate_OTP';
        $body['userAccessCode']      = $user_data->userAccessCode;
        $body['userPin']             = request('userPin');
        $body['accountNumber']       = request('accountNumber');
        $body['transAmount']         = request('transAmount');
        $body['receipientAccountNo'] = request('receipientAccountNo');
        $body['remarks']             = request('remarks');
        Session::put('transferBody', $body);
            // $body['action']          = 'generate_OTP';
            // $body['userAccessCode']  = $user_data->userAccessCode;
            // $body['userPin']         = request('userPin');
        $result                  = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);
        return redirect('/confirm-token');
    }
    public function Interbank(){
        $loop = session::get('CustomerAccts');
        $userDetails = Session::get('userDetails');
        ///////////////GET LIST OF BENEFICIARIES///////////////////
        $client                 = new Client(['http_errors' => false]);
        $body['action']         = 'get_beneficiaries';
        $body['userAccessCode'] = $userDetails->userAccessCode;
        $body['userPin']        = $userDetails->userPin;
        $res                    = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);
        $resp                   = json_decode($res->getBody()->getContents());
        //BENEFICIARY ACCOUNT LIST ARRAY
        $beneficiaries          = ($resp->result->return->customerBeneficiaryOutputCIData);
        $cus                    = "";
        foreach ($loop as $user){ 
            $cus = $user;
          }
        $client                 = new Client(['http_errors' => false]);
        $result                 = $client->post('https://moneywave.herokuapp.com/banks');       
        $response               = json_decode($result->getBody()->getContents());
        $banks                  = $response->data;
        return view('other-banks', compact('loop', 'cus', 'userDetails', 'banks', 'beneficiaries'));
    }
    public function OtherBanks(beneficiary $request){
        $client      = new Client(['http_errors' => false]);
        $userDetails = Session::get('userDetails');
        if($request->has('checkbox')){
            $body['action']                     = "add_beneficiary";
            $body['userAccessCode']             = $userDetails->userAccessCode;
            $body['userPin']                    = $userDetails->userPin;
            $body['beneficiaryBankName']        = request('beneficiary_bank');
            $body['beneficiaryBankCode']        = request('beneficiary_bank');
            $body['beneficiaryName']            = request('recipient');
            $body['beneficiaryAccountNumber']   = request('beneficiary_number');
            $result                             = $client->post('cloudnrm.com/lapo/soapClient/api.php', ['form_params' => $body ]);
            $response                           = json_decode($result->getBody()->getContents());
        }
    }   
}
