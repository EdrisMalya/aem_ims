<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customers')->delete();
        
        \DB::table('customers')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Walk in user',
                'phone_number' => '0799211221',
                'email' => NULL,
                'address' => '.',
                'created_at' => '2023-02-14 18:16:59',
                'updated_at' => '2023-02-14 18:16:59',
            ),
        ));
        
        
    }
}