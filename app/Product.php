<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name', 'category_id', 'code', 'price', 'image', 'description'];

    public function category()
    {

      return $this->belongsTo('App\Category');

    }
    // public function category()
    // {
    //
    //   return $this->belongsTo('App\Category', 'category_id');
    //
    // }




}
