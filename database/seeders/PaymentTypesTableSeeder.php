<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payment_types')->delete();
        
        \DB::table('payment_types')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'Cash',
                'created_at' => '2023-04-03 19:54:41',
                'updated_at' => '2023-04-03 19:54:41',
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'Credit card',
                'created_at' => '2023-04-03 19:54:46',
                'updated_at' => '2023-04-03 19:54:46',
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'Partial',
                'created_at' => '2023-04-03 19:54:52',
                'updated_at' => '2023-04-03 19:54:52',
            ),
        ));
        
        
    }
}