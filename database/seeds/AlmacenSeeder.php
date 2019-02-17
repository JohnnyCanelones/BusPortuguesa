<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlmacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('almacen')->insert([
			'nombre_producto'=> 'aceite 15w50',            
			'compatibilidad'=> 6118,           
			'cantidad' => '10',
            'ubicacion' => 'Estante 5',
            'limite' => 6,
            
        ]);
        DB::table('almacen')->insert([
            'nombre_producto'=> 'Correa de Tiempo',            
            'compatibilidad'=> 'Todas las Unidades',           
            'cantidad' => '50',
            'ubicacion' => 'Estante 4',
            'limite' => 6,

            
        ]);
        DB::table('almacen')->insert([
            'nombre_producto'=> 'Caucho R18',            
            'compatibilidad'=> 6752,           
            'cantidad' => '20',
            'ubicacion' => 'Estante 1',
            'limite' => 6,

            
        ]);
        
        DB::table('almacen')->insert([
            'nombre_producto'=> 'Caucho R17',            
            'compatibilidad'=> 6896,           
            'cantidad' => '20',
            'ubicacion' => 'Estante 2',
            'limite' => 6,

            
        ]);
        
    } 
}
