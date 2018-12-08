<?php

use Illuminate\Database\Seeder;

class WarehouseMonitoringTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warehouse_monitorings')->insert([
            'user_id'=> 1234,
            'almacen_id' => 1,
            'accion' => 'Producto Creado',
            'stock_added' => '10',
            'fecha_accion' => '2018-12-1 00:00:00'
        ]);

        DB::table('warehouse_monitorings')->insert([
            'user_id'=> 1234,
            'almacen_id' => 2,
            'accion' => 'Producto Creado',
            'stock_added' => '50',
            'fecha_accion' => '2018-12-1 00:00:00'
        ]);

        DB::table('warehouse_monitorings')->insert([
            'user_id'=> 1234,
            'almacen_id' => 3,
            'accion' => 'Producto Creado',
            'stock_added' => '20',
            'fecha_accion' => '2018-12-1 00:00:00'
        ]);

        DB::table('warehouse_monitorings')->insert([
            'user_id'=> 1234,
            'almacen_id' => 4,
            'accion' => 'Producto Creado',
            'stock_added' => '20',
            'fecha_accion' => '2018-12-1 00:00:00'
        ]);

        

        
    }
}
