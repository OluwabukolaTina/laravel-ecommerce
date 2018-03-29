<?php

namespace App\Http\Controllers;

use Session;

use Cart;

use App\Product;

use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    //
    public function addToCart()
    {
    	// dd(request()->all());
    	//find the product that is to be added to the cart
    	$pdt = Product::find(request()->pdt_id);

    	$cartItem = Cart::add([

    		'id' => $pdt->id,

    		'name' => $pdt->name,

    		'qty' => request()->qty,

    		'price' => $pdt->price

    	]);

    	Cart::associate($cartItem->rowId, 'App\Product');

        Session::flash('success', 'product has been added');

    	// dd($cart);

    	// dd(Cart::content());
    	return redirect()->route('cart');

    }

    public function rapidAdd($id)
    {

        // dd(request()->all());

        //find the product that is to be added to the cart
        $pdt = Product::find($id);

        $cartItem = Cart::add([

            'id' => $pdt->id,

            'name' => $pdt->name,

            'qty' => 1,

            'price' => $pdt->price

        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        // Cart::store('username');

        Session::flash('success', 'product has been added');

        // dd($cart);

        // dd(Cart::content());
        // return redirect()->route('cart');
          return redirect()->back();
    }

    public function cart()
    {
    	// Cart::destroy();
    	return view('cart');

    }

    public function cartDelete($id)
    {

    	Cart::remove($id);

        Session::flash('success', 'product has been deleted');

    	return redirect()->back();

    }

    public function increment($id, $qty)
    {

        Cart::update($id, $qty + 1);

        Session::flash('success', 'product qty updated');

        return redirect()->back();

    }

    public function decrement($id, $qty)
    {

        Cart::update($id, $qty - 1);

        Session::flash('success', 'product quantity has been updated');


        return redirect()->back();
    }






}
