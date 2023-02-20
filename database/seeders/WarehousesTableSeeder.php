<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WarehousesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('warehouses')->delete();
        
        \DB::table('warehouses')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Parwan 2 warehouse',
                'email' => 'adrismalya@gmail.com',
                'phone_number' => '0730199991',
                'address' => 'Parwan 2',
                'province_id' => 13,
                'status' => 1,
                'created_at' => '2023-02-14 17:32:38',
                'updated_at' => '2023-02-14 18:36:26',
            ),
        ));
        
        
    }
}