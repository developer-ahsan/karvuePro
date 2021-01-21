<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
            'f_name' => 'Super',
            'l_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '123',
            'user_type' => 'admin'
        ]);	
        // User::factory(10)->create();
    }
}
