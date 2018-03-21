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

    	$cart = Cart::add([

    		'id' => $pdt->id,

    		'name' => $pdt->name,

    		'qty' => request()->qty,

    		'price' => $pdt->price

    	]);

    	// dd($cart);

    	dd(Cart::content());
    }
}
