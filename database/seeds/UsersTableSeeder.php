<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\User::create([

        	'name' => 'admin',

        	'email' => 'admin@ecommerce.com',

        	'password' => bcrypt('11111111')

        ]);
    }
}