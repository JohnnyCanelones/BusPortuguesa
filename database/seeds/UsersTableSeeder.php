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
    	// DB::table('staff')->insert([
		// 	'nationality'=> 'V',            
		// 	'id'=> 1234,
		// 	'names' => 'admin',            
		// 	'last_names' => 'admin',
		// 	'genre' => 'Masculino',
        //     'email' => str_random(10).'@gmail.com',
        //     'date_birth' => '2018-02-23 00:00:00',
        //     'address' => 'jhsdgfjg',
        //     'phone_number' => '656+5',
        //     'position' => 'Mecanico',
        // ]);
        DB::table('staff')->insert([
            'nationality'=> 'V',            
            'id'=> 1234,
            'names' => 'admin',            
            'last_names' => 'admin',
            'genre' => 'Masculino',
            'email' => str_random(10).'@gmail.com',
            'date_birth' => '2018-02-23 00:00:00',
            'address' => 'Guanare',
            'phone_number' => '04121251297',
            'position' => 'Conductor',
        ]);
        
        DB::table('users')->insert([
            
            'email' => 'johnnyjose13@gmail.com',
            'password' => bcrypt('joh2969'),
            'username' => 1234,
        ]);
        DB::table('roles')->insert([
            'user_id' => 1,
            // 'Inventario' => 1,
            'Admin' => 1,
        ]);

        //  DB::table('staff')->insert([
        //     'nationality'=> 'V',            
        //     'id'=> 26503271,
        //     'names' => 'Jose',            
        //     'last_names' => 'Pantoja',
        //     'genre' => 'Masculino',
        //     'email' => str_random(10).'@gmail.com',
        //     'date_birth' => '2018-02-23 00:00:00',
        //     'address' => 'Guanare',
        //     'phone_number' => '04121251297',
        //     'position' => 'Mecanico',
        // ]);

    }
}
