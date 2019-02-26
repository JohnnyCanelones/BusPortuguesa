<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('buses')->insert([
			'id_bus'=> 6317,            
            'modelo' => 6118,            
            'conductor_id'=> 1234,
            'kilometraje' => 321000,
			'estado' => 'Inactivo',
            'motivo_inactividad' => 'Servicio',
            'fecha_inactivo' => '2018-10-27 00:00:00',
			'observacion' => 'para ospino acto gobernador',
            
        ]);

        DB::table('buses')->insert([
            'id_bus'=> 6956,            
            'modelo' => 6896,            
            'conductor_id'=> 1234,
            'kilometraje' => 521000,
            'estado' => 'Activo',
            // 'motivo_inactividad' => 'Servicio',
            // 'fecha_inactivo' => '27/10/2018 2:08:20 p. m.',
            // 'observacion' => 'para ospino acto gobernador',
            
        ]);

        DB::table('buses')->insert([
            'id_bus'=> 6765,            
            'modelo' => 6752,
            'kilometraje' => 121000,
            'conductor_id'=> 1234,
            'estado' => 'Activo',
            // 'motivo_inactividad' => 'Servicio',
            // 'fecha_inactivo' => '27/10/2018 2:08:20 p. m.',
            // 'observacion' => 'para ospino acto gobernador',
            
        ]);
        
    }
}
