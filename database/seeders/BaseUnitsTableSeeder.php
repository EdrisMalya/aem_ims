<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BaseUnitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('base_units')->delete();
        
        \DB::table('base_units')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => 'Kilogram',
                'created_at' => '2023-03-23 20:16:07',
                'updated_at' => '2023-03-23 20:16:07',
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'Color',
                'created_at' => '2023-02-18 17:53:29',
                'updated_at' => '2023-02-18 17:53:29',
            ),
            2 => 
            array (
                'id' => 7,
                'name' => 'Meter',
                'created_at' => '2023-02-18 17:53:33',
                'updated_at' => '2023-02-18 17:53:33',
            ),
            3 => 
            array (
                'id' => 8,
                'name' => 'بالون 10 کیلویی',
                'created_at' => '2023-02-20 17:42:15',
                'updated_at' => '2023-02-20 17:42:15',
            ),
            4 => 
            array (
                'id' => 9,
                'name' => 'بالون 20 کیلویی',
                'created_at' => '2023-02-20 17:42:25',
                'updated_at' => '2023-02-20 17:42:25',
            ),
            5 => 
            array (
                'id' => 10,
                'name' => 'Test',
                'created_at' => '2023-04-01 13:10:07',
                'updated_at' => '2023-04-01 13:10:07',
            ),
            6 => 
            array (
                'id' => 11,
                'name' => 'Single',
                'created_at' => '2023-03-18 14:27:10',
                'updated_at' => '2023-03-18 14:27:10',
            ),
            7 => 
            array (
                'id' => 12,
                'name' => 'can',
                'created_at' => '2023-03-20 17:42:31',
                'updated_at' => '2023-03-20 17:42:31',
            ),
            8 => 
            array (
                'id' => 13,
                'name' => 'kartan',
                'created_at' => '2023-03-20 17:42:50',
                'updated_at' => '2023-03-20 17:42:50',
            ),
        ));
        
        
    }
}