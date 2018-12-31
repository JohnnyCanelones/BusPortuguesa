<?php

use Illuminate\Database\Seeder;

class OccupationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('occupations')->insert([
			'occupation_name' => 'Mecanico',
        ]);
        
        DB::table('occupations')->insert([
			'occupation_name' => 'Conductor',
        ]);
    }
}
