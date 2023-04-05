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
                'image' => 'http://127.0.0.1:8000/storage/brand_images/lkP5GJsLRRN3oDNYLlWbg9FkcInIopVvtR9yOq4p.jpg',
                'name' => 'Apple',
                'created_at' => '2023-02-18 19:15:13',
                'updated_at' => '2023-02-20 17:49:04',
            ),
            1 => 
            array (
                'id' => 7,
                'image' => NULL,
                'name' => 'Taimaz',
                'created_at' => '2023-02-20 17:48:52',
                'updated_at' => '2023-02-20 17:48:52',
            ),
            2 => 
            array (
                'id' => 8,
                'image' => 'http://127.0.0.1:8000/storage/brand_images/45b7zOdEwHLKbQlw8it24jnUKqObc1vjPzGjdEaU.png',
                'name' => 'This is for testing',
                'created_at' => '2023-03-18 12:51:39',
                'updated_at' => '2023-03-18 12:51:39',
            ),
            3 => 
            array (
                'id' => 9,
                'image' => NULL,
                'name' => 'New one',
                'created_at' => '2023-03-18 13:58:00',
                'updated_at' => '2023-03-18 13:58:00',
            ),
            4 => 
            array (
                'id' => 10,
                'image' => NULL,
                'name' => 'Pagah',
                'created_at' => '2023-03-18 14:21:38',
                'updated_at' => '2023-03-18 14:21:38',
            ),
            5 => 
            array (
                'id' => 11,
                'image' => NULL,
                'name' => 'Qwat',
                'created_at' => '2023-03-20 17:40:28',
                'updated_at' => '2023-03-20 17:40:28',
            ),
            6 => 
            array (
                'id' => 13,
                'image' => NULL,
                'name' => 'FOGG',
                'created_at' => '2023-03-28 17:25:18',
                'updated_at' => '2023-03-28 17:25:18',
            ),
            7 => 
            array (
                'id' => 14,
                'image' => NULL,
                'name' => 'NIVEA',
                'created_at' => '2023-03-28 17:28:49',
                'updated_at' => '2023-03-28 17:28:49',
            ),
            8 => 
            array (
                'id' => 15,
                'image' => NULL,
                'name' => 'Sylkin',
                'created_at' => '2023-03-28 17:31:06',
                'updated_at' => '2023-03-28 17:31:06',
            ),
            9 => 
            array (
                'id' => 16,
                'image' => NULL,
                'name' => 'Ashaan',
                'created_at' => '2023-03-28 17:33:28',
                'updated_at' => '2023-03-28 17:33:28',
            ),
            10 => 
            array (
                'id' => 17,
                'image' => NULL,
                'name' => 'Jango royal',
                'created_at' => '2023-03-28 17:35:34',
                'updated_at' => '2023-03-28 17:35:34',
            ),
            11 => 
            array (
                'id' => 18,
                'image' => NULL,
                'name' => 'Creation',
                'created_at' => '2023-03-28 17:37:40',
                'updated_at' => '2023-03-28 17:37:40',
            ),
            12 => 
            array (
                'id' => 19,
                'image' => NULL,
                'name' => 'Kodalo',
                'created_at' => '2023-03-28 17:43:57',
                'updated_at' => '2023-03-28 17:43:57',
            ),
        ));
        
        
    }
}