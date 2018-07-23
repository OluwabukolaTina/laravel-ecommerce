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

        // factory(App\Product::class, 7)->create();
        $p1 = [

        	'name' => 'Javascript and Jquery: Interactive Web Development',

        //	'category_id' => '1',

        	'code' => '1234',

        	'image' => 'uploads/products/1.jpg',

        	'price' => '123',

          'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'

        ];

        $p2 = [

        	'name' => 'Javascript:The Definitive Guide',

        //	'category_id' => '1',

        	'code' => '1235',

        	'image' => 'uploads/products/2.jpg',

        	'price' => '345',

          'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'

        ];

        $p3 = [

        	'name' => 'Pro Javascript for Web Apps',

        //	'category_id' => '1',

        	'code' => '1236',

        	'image' => 'uploads/products/3.jpg',

        	'price' => '678',

          'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'

        ];

        $p4 = [

        	'name' => 'HTML5, Javascript and Jquery',

        //	'category_id' => '1',

        	'code' => '1237',

        	'image' => 'uploads/products/4.jpg',

        	'price' => '911',

          'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'

        ];

        $p5 = [

        	'name' => 'Professional Javascript For Web Developers',

        //	'category_id' => '1',

        	'code' => '1238',

        	'image' => 'uploads/products/5.jpg',

        	'price' => '121',

          'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'

        ];

        $p6 = [

        	'name' => 'Beginning Laravel: A definititve guide to advanced application development with Laravel 5.3',

        //	'category_id' => '1',

        	'code' => '1239',

        	'image' => 'uploads/products/6.jpg',

        	'price' => '134',

          'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'

        ];

        $p7 = [

        	'name' => 'Javascript and HTML5 Now: A New Paradign For The Open Web',

        //	'category_id' => '1',

        	'code' => '1240',

        	'image' => 'uploads/products/7.jpg',

        	'price' => '137',

          'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'

        ];

        $p8 = [

        	'name' => 'Eloquent Javascript and Jquery: A Modern Introduction To Programming',

        //	'category_id' => '1',

        	'code' => '1241',

        	'image' => 'uploads/products/big.jpg',

        	'price' => '1908',

          'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'

        ];

        Product::create($p1);
        Product::create($p2);
        Product::create($p3);
        Product::create($p4);
        Product::create($p5);
        Product::create($p6);
        Product::create($p7);
        Product::create($p8);
        // App\Product::create([
        //
        // 	'name' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
        //
        // 	//'category_id' => '40',
        //
        //     'code' => '3456',
        //
        //     'image' => 'uploads/products/1.jpg',
        //
        // 	'price' => '383',
        //
        //   'description' > 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        //
        //   //'name', 'category_id', 'code', 'price', 'image', 'description'
        //
        // ]);
        //
        // App\Product::create([
        //
        // 	'name' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
        //
        // 	//'category_id' => '40',
        //
        //     'code' => '3456',
        //
        //     'image' => 'uploads/products/1.jpg',
        //
        // 	'price' => '383',
        //
        //   'description' > 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        //
        //   //'name', 'category_id', 'code', 'price', 'image', 'description'
        //
        // ]);


	}

}
