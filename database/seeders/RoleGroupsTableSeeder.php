<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleGroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_groups')->delete();
        
        \DB::table('role_groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admins',
                'created_at' => '2022-12-11 06:07:05',
                'updated_at' => '2022-12-11 06:07:05',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Sales',
                'created_at' => '2023-02-22 16:56:24',
                'updated_at' => '2023-02-22 16:56:24',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Purhcase',
                'created_at' => '2023-02-22 16:56:29',
                'updated_at' => '2023-02-22 16:56:29',
            ),
        ));
        
        
    }
}