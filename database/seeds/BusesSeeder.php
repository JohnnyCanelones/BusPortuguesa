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
            'conductor_id'=> 26503270,
            'kilometraje' => 321000,
            'vin' => 'LZY1DGD68F100'.rand(1000, 9999),
			'esOperaciones' => 'Cono Sur',
			'estado' => 'Inactivo',
            'motivo_inactividad' => 'Servicio',
            'fecha_inactivo' => '2018-10-27 00:00:00',
			'observacion' => 'para ospino acto gobernador',
            
        ]);

        DB::table('buses')->insert([
            'id_bus'=> 6956,            
            'modelo' => 6896,            
            'conductor_id'=> 26503270,
            'kilometraje' => 521000,
            'vin' => 'LZY1DGD68F100'.rand(1000, 9999),
			'esOperaciones' => 'Cono Sur',
            'estado' => 'Activo',
            // 'motivo_inactividad' => 'Servicio',
            // 'fecha_inactivo' => '27/10/2018 2:08:20 p. m.',
            // 'observacion' => 'para ospino acto gobernador',
            
        ]);

        DB::table('buses')->insert([
            'id_bus'=> 6765,            
            'modelo' => 6752,
            'kilometraje' => 121000,
            'vin' => 'LZY1DGD68F100'.rand(1000, 9999),
			'esOperaciones' => 'Cono Norte',
            'conductor_id'=> 26503270,
            'estado' => 'Activo',
            // 'motivo_inactividad' => 'Servicio',
            // 'fecha_inactivo' => '27/10/2018 2:08:20 p. m.',
            // 'observacion' => 'para ospino acto gobernador',
            
        ]);

        for ($i=0; $i < 15; $i++) { 
           DB::table('buses')->insert([
            'id_bus'=> rand(1000, 9999),            
            'modelo' => 6752,
            'kilometraje' => rand(10000, 59999),
            'vin' => 'LZY1DGD68F100'.rand(1000, 9999),
			'esOperaciones' => 'Cono Norte',
            'conductor_id'=> 26503270,
            'estado' => 'Activo',
            // 'motivo_inactividad' => 'Servicio',
            // 'fecha_inactivo' => '27/10/2018 2:08:20 p. m.',
            // 'observacion' => 'para ospino acto gobernador',
            
            ]); 
            
            DB::table('buses')->insert([
             'id_bus'=> rand(1000, 9999),            
             'modelo' => 6118,
             'kilometraje' => rand(10000, 59999),
             'vin' => 'LZY1DGD68F100'.rand(1000, 9999),
             'esOperaciones' => 'Cono Sur',
             'conductor_id'=> 26503270,
             'estado' => 'Activo',
             // 'motivo_inactividad' => 'Servicio',
             // 'fecha_inactivo' => '27/10/2018 2:08:20 p. m.',
             // 'observacion' => 'para ospino acto gobernador',
             
             ]);
            
             DB::table('buses')->insert([
             'id_bus'=> rand(1000, 9999),            
             'modelo' => 6896,
             'kilometraje' => rand(10000, 59999),
             'vin' => 'LZY1DGD68F100'.rand(1000, 9999),
             'esOperaciones' => 'Cono Sur',
             'conductor_id'=> 26503270,
             'estado' => 'Inactivo',
             'motivo_inactividad' => 'Servicio',
             'fecha_inactivo' => '2019-03-27 00:00:00',
             'observacion' => 'test',
             
             ]);
         
        }
    }
}
