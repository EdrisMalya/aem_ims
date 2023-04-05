<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suppliers')->delete();
        
        \DB::table('suppliers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Karimi',
                'email' => 'karimi@gmail.com',
                'phone_number' => '0781357171',
                'province_id' => 1,
                'address' => 'Parwan 2',
                'created_at' => '2023-02-20 18:56:11',
                'updated_at' => '2023-03-31 21:31:26',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Rahimi group',
                'email' => 'rahimi@gmail.com',
                'phone_number' => '078821232',
                'province_id' => 13,
                'address' => 'Parwan 2',
                'created_at' => '2023-03-28 17:36:42',
                'updated_at' => '2023-03-28 17:36:42',
            ),
        ));
        
        
    }
}