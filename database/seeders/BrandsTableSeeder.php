<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('brands')->delete();
        
        \DB::table('brands')->insert(array (
            0 => 
            array (
                'id' => 5,
                'image' => 'http://127.0.0.1:8000/storage/brand_images/ajYKPMC6pAIrUoY5naXbVyO5L9MHRnFPvUPiuZP4.png',
                'name' => 'Apple',
                'created_at' => '2023-02-18 19:15:13',
                'updated_at' => '2023-02-18 19:15:13',
            ),
        ));
        
        
    }
}