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
                'symbol' => 'af',
                'created_at' => '2023-02-12 19:43:08',
                'updated_at' => '2023-02-12 19:43:08',
            ),
        ));
        
        
    }
}