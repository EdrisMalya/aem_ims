<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('currencies')->delete();
        
        \DB::table('currencies')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Dollor',
                'code' => 'USD',
                'symbol' => '$',
                'created_at' => '2023-02-12 19:16:35',
                'updated_at' => '2023-02-12 19:16:35',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Afghani',
                'code' => 'AFN',
                'symbol' => 'AF',
                'created_at' => '2023-02-12 19:43:08',
                'updated_at' => '2023-02-20 17:15:34',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Kaldar',
                'code' => 'PKR',
                'symbol' => 'PKR',
                'created_at' => '2023-02-22 17:09:46',
                'updated_at' => '2023-02-22 17:09:46',
            ),
        ));
        
        
    }
}