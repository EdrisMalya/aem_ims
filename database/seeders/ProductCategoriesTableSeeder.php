<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_categories')->delete();
        
        \DB::table('product_categories')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => 'Dairy',
                'logo' => 'http://127.0.0.1:8000/storage/productcategory_logos/AA2QKXUkeEXjmlOuoIsfpsOYbMs2F4MnF6HbQOfq.jpg',
                'created_at' => '2023-02-20 11:39:40',
                'updated_at' => '2023-03-20 19:01:45',
            ),
            1 => 
            array (
                'id' => 7,
                'name' => 'Cosmetics',
                'logo' => NULL,
                'created_at' => '2023-03-28 17:26:14',
                'updated_at' => '2023-03-28 17:26:14',
            ),
        ));
        
        
    }
}