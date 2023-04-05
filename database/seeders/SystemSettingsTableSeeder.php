<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SystemSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('system_settings')->delete();
        
        \DB::table('system_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'logo' => 'http://127.0.0.1:8000/storage/store_logo/IWJCCZ0dsdcZUVbcuRz6EO0mkJerrKdcHQIAd3NH.png',
                'name' => 'Karimi update',
                'address' => 'Parwan 2',
                'phone_number' => '0799210807',
                'currency_id' => 2,
                'province_id' => 13,
                'warehouse_id' => 2,
                'customer_id' => 2,
                'date_format' => 'Y-m-d',
                'created_at' => '2023-02-14 19:35:18',
                'updated_at' => '2023-04-02 22:41:31',
            ),
        ));
        
        
    }
}