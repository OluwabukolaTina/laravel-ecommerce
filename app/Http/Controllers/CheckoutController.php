<?php

namespace App\Http\Controllers;

use Session;

use Cart;

use Mail;

use Stripe\Stripe;

use Stripe\Charge;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Cart::content()->count() == 0 )
        {

                Session::flash('info', 'your cart is empty, do add some books to your cart');

                return redirect()->back();


        }
        
        return view('checkout');

    }

    public function pay()
    // public function pay(Request $req)
    {

        // dd(request()->all());
            Stripe::setApiKey('sk_test_cbm5FschjT6p2XUcStXhhPK1');

            $token = request()->stripeToken;

            $charge = Charge::create([

                "amount" => Cart::total() * 100,

                "currency" => "usd",

                "description" => "blah blah",

                "source" => $token
                            
            ]);

        // dd('successful');
        Session::flash('success', 'purchase successful');

        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);

        return redirect('/');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
