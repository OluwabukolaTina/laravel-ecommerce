<?php

use Illuminate\Database\Seeder;

use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $p1 = [

        	'name' => 'Adaptive Web Designs',

        	'image' => 'products/1.jpg',

        	'price' => 5000,

        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua.'

];

$p2 = [

        	'name' => 'Mean Web Development',

        	'image' => 'uploads/products/2.jpg',

        	'price' => 2000,

        	'description' => 'Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat.'

];

$p2 = [

        	'name' => 'Mean Web Development',

        	'image' => 'uploads/products/2.jpg',

        	'price' => 2000,

        	'description' => 'Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat.'

];

$p3 = [

        	'name' => 'Pro Javascript for Web Apps',

        	'image' => 'uploads/products/3.jpg',

        	'price' => 6000,

        	'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'

];

$p4 = [

        	'name' => 'Javascript and Jquery',

        	'image' => 'uploads/products/4.jpg',

        	'price' => 3000,

        	'description' => 'Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat.'

];

Product::create($p1);
Product::create($p2);
Product::create($p3);
Product::create($p4);

	}
 
}
