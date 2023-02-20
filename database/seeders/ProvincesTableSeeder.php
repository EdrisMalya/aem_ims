<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provinces')->delete();
        
        \DB::table('provinces')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Badakhshan',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Badgis',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Baglan',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Balkh',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Bamiyan',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Farah',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Faryab',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Gawr',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Gazni',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Herat',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Hilmand',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Jawzjan',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Kabul',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Kapisa',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Khawst',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Kunar',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Lagman',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Lawghar',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Nangarhar',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Nimruz',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Nuristan',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Paktika',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Paktiya',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Parwan',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Qandahar',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Qunduz',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Samangan',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Sar-e Pul',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Takhar',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Uruzgan',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Wardag',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Zabul',
                'created_at' => '2023-02-13 15:17:51',
                'updated_at' => '2023-02-13 15:17:51',
            ),
        ));
        
        
    }
}