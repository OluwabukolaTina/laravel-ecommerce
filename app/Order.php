<?php

namespace App;

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


}
