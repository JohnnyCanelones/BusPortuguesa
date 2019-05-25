<?php

use Illuminate\Database\Seeder;

class StaffMonitoringTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('staff_monitoring')->insert([
            'id'=> 1,
            'user_id'=> 26503270,
            'staff_id' => 26503270,
            'accion' => 'Empleado Creado',
            'fecha_accion' => '2018-12-1 00:00:00'


        ]);
    }
}
