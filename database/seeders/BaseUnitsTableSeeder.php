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
                'created_at' => '2023-02-18 17:53:24',
                'updated_at' => '2023-02-18 17:53:24',
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
        ));
        
        
    }
}