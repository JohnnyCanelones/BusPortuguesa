<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('staff')->insert([
			'nationality'=> 'V',            
			'id'=> 1234,
			'names' => 'admin',            
			'last_names' => 'admin',
			'genre' => 'Masculino',
            'email' => str_random(10).'@gmail.com',
            'address' => 'jhsdgfjg',
            'phone_number' => '656+5',
            'position' => 'Mecanico',
        ]);
        DB::table('users')->insert([
            
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('admin'),
            'username' => 1234,
        ]);
        DB::table('roles')->insert([
            'user_id' => 1,
            'Inventario' => 1,
        ]);
    }
}
