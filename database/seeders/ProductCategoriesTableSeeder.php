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
                'logo' => 'http://127.0.0.1:8000/storage/productcategory_logos/Ddx4U3EaF5p20v6QgpRmJk720cuIhg0BHJZxLhEm.jpg',
                'created_at' => '2023-02-20 11:39:40',
                'updated_at' => '2023-02-20 11:39:40',
            ),
        ));
        
        
    }
}