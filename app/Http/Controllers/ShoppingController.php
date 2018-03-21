<?php

namespace App\Http\Controllers;

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

    	// dd($cart);

    	// dd(Cart::content());
    	return redirect()->route('cart');

    }

    public function cart()
    {

    	// Cart::destroy();

    	return view('cart');

    }

    public function cartDelete($id)
    {

    	Cart::remove($id);

    	return redirect()->back();

    }
}
