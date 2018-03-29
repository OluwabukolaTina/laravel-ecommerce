<?php

namespace App;

// use Cart;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['total', 'delivered'];

    public function products()
    {

    	return $this->belongsToMany(Product::class)->withPivot('quantity', 'total')->withTimestamps();

    	// return $this->belongsToMany(Product::class);

    }

    public function user()
    {

        return $this->belongsTo(User::class);

    }

    // public function createOrder()
    // {
    // 	$user = Auth::user();

    //     $order = $user->orders()->create([

    //         'total' => Cart::total(),

    //         'delivered' => 0,

    //     ]);

    //     $cartItems = Cart::content();

    //     foreach ($cartItems as $cartItem) {
    //         # code...
    //         //from the order model..pivot
    //         $order->products()->attach($cartItem->id, [

    //             'quantity' => $cartItem->qty,

    //             'total' => $cartItem->total()
    
    //         ]);

    // }


}
