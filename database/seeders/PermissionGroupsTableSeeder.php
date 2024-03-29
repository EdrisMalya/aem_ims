<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionGroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_groups')->delete();
        
        \DB::table('permission_groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'permission_group_id' => 0,
                'name' => 'User management',
                'sort' => 3,
                'created_at' => '2022-12-11 06:04:50',
                'updated_at' => '2023-03-25 21:03:35',
            ),
            1 => 
            array (
                'id' => 2,
                'permission_group_id' => 1,
                'name' => 'Users',
                'sort' => 0,
                'created_at' => '2022-12-11 06:05:03',
                'updated_at' => '2023-02-11 12:28:14',
            ),
            2 => 
            array (
                'id' => 3,
                'permission_group_id' => 1,
                'name' => 'Roles',
                'sort' => 4,
                'created_at' => '2022-12-11 06:05:11',
                'updated_at' => '2023-02-14 18:07:42',
            ),
            3 => 
            array (
                'id' => 4,
                'permission_group_id' => 0,
                'name' => 'Configuration',
                'sort' => 2,
                'created_at' => '2022-12-11 10:24:12',
                'updated_at' => '2023-02-14 20:54:24',
            ),
            4 => 
            array (
                'id' => 5,
                'permission_group_id' => 4,
                'name' => 'Language',
                'sort' => 0,
                'created_at' => '2022-12-11 10:43:17',
                'updated_at' => '2022-12-11 10:43:17',
            ),
            5 => 
            array (
                'id' => 6,
                'permission_group_id' => 5,
                'name' => 'Language dictionary',
                'sort' => 0,
                'created_at' => '2022-12-13 05:27:22',
                'updated_at' => '2022-12-13 05:27:22',
            ),
            6 => 
            array (
                'id' => 9,
                'permission_group_id' => 2,
                'name' => 'Log activity',
                'sort' => 0,
                'created_at' => '2022-12-18 10:06:48',
                'updated_at' => '2022-12-18 10:06:48',
            ),
            7 => 
            array (
                'id' => 10,
                'permission_group_id' => 1,
                'name' => 'Login log',
                'sort' => 5,
                'created_at' => '2022-12-19 06:28:45',
                'updated_at' => '2023-02-20 11:57:55',
            ),
            8 => 
            array (
                'id' => 11,
                'permission_group_id' => 4,
                'name' => 'Backups',
                'sort' => 1,
                'created_at' => '2022-12-19 15:37:06',
                'updated_at' => '2022-12-19 15:37:06',
            ),
            9 => 
            array (
                'id' => 13,
                'permission_group_id' => 1,
                'name' => 'Log activity',
                'sort' => 3,
                'created_at' => '2022-12-22 10:29:02',
                'updated_at' => '2023-02-11 12:28:14',
            ),
            10 => 
            array (
                'id' => 14,
                'permission_group_id' => 4,
                'name' => 'Public website',
                'sort' => 3,
                'created_at' => '2022-12-26 20:10:54',
                'updated_at' => '2023-02-12 18:49:59',
            ),
            11 => 
            array (
                'id' => 15,
                'permission_group_id' => 14,
                'name' => 'Home page',
                'sort' => 0,
                'created_at' => '2022-12-27 17:49:11',
                'updated_at' => '2022-12-27 17:49:11',
            ),
            12 => 
            array (
                'id' => 16,
                'permission_group_id' => 14,
                'name' => 'Pages',
                'sort' => 1,
                'created_at' => '2022-12-27 17:49:22',
                'updated_at' => '2022-12-27 17:49:22',
            ),
            13 => 
            array (
                'id' => 17,
                'permission_group_id' => 14,
                'name' => 'Widgets',
                'sort' => 2,
                'created_at' => '2022-12-28 20:05:48',
                'updated_at' => '2022-12-28 20:05:48',
            ),
            14 => 
            array (
                'id' => 33,
                'permission_group_id' => 6,
                'name' => 'Test1',
                'sort' => 0,
                'created_at' => '2023-02-11 12:33:57',
                'updated_at' => '2023-02-11 12:33:57',
            ),
            15 => 
            array (
                'id' => 53,
                'permission_group_id' => 4,
                'name' => 'Store settings',
                'sort' => 2,
                'created_at' => '2023-02-12 18:49:56',
                'updated_at' => '2023-02-12 18:49:59',
            ),
            16 => 
            array (
                'id' => 55,
                'permission_group_id' => 53,
                'name' => 'Currency',
                'sort' => 0,
                'created_at' => '2023-02-12 19:24:54',
                'updated_at' => '2023-02-12 19:24:54',
            ),
            17 => 
            array (
                'id' => 57,
                'permission_group_id' => 53,
                'name' => 'Warehouse',
                'sort' => 1,
                'created_at' => '2023-02-13 15:04:38',
                'updated_at' => '2023-02-13 15:04:38',
            ),
            18 => 
            array (
                'id' => 59,
                'permission_group_id' => 1,
                'name' => 'Customers',
                'sort' => 1,
                'created_at' => '2023-02-14 18:07:15',
                'updated_at' => '2023-02-14 18:07:42',
            ),
            19 => 
            array (
                'id' => 60,
                'permission_group_id' => 0,
                'name' => 'Products management',
                'sort' => 0,
                'created_at' => '2023-02-14 20:54:22',
                'updated_at' => '2023-03-20 17:20:12',
            ),
            20 => 
            array (
                'id' => 61,
                'permission_group_id' => 60,
                'name' => 'Product',
                'sort' => 0,
                'created_at' => '2023-02-14 21:12:48',
                'updated_at' => '2023-02-20 13:01:53',
            ),
            21 => 
            array (
                'id' => 63,
                'permission_group_id' => 60,
                'name' => 'Base unit',
                'sort' => 2,
                'created_at' => '2023-02-18 17:43:54',
                'updated_at' => '2023-02-18 18:47:51',
            ),
            22 => 
            array (
                'id' => 65,
                'permission_group_id' => 60,
                'name' => 'Brand',
                'sort' => 3,
                'created_at' => '2023-02-18 18:47:01',
                'updated_at' => '2023-02-20 10:08:04',
            ),
            23 => 
            array (
                'id' => 67,
                'permission_group_id' => 60,
                'name' => 'Product categories',
                'sort' => 1,
                'created_at' => '2023-02-20 10:07:59',
                'updated_at' => '2023-02-20 13:01:53',
            ),
            24 => 
            array (
                'id' => 69,
                'permission_group_id' => 1,
                'name' => 'Supplier',
                'sort' => 2,
                'created_at' => '2023-02-20 11:57:51',
                'updated_at' => '2023-02-20 11:57:55',
            ),
            25 => 
            array (
                'id' => 70,
                'permission_group_id' => 60,
                'name' => 'Print barcode',
                'sort' => 4,
                'created_at' => '2023-03-23 20:21:22',
                'updated_at' => '2023-03-23 20:21:22',
            ),
            26 => 
            array (
                'id' => 71,
                'permission_group_id' => 0,
                'name' => 'Purchases managment',
                'sort' => 1,
                'created_at' => '2023-03-25 21:03:11',
                'updated_at' => '2023-03-25 21:21:40',
            ),
            27 => 
            array (
                'id' => 72,
                'permission_group_id' => 71,
                'name' => 'Purchase',
                'sort' => 0,
                'created_at' => '2023-03-25 21:21:48',
                'updated_at' => '2023-03-25 21:37:22',
            ),
            28 => 
            array (
                'id' => 73,
                'permission_group_id' => 71,
                'name' => 'Purchase return',
                'sort' => 1,
                'created_at' => '2023-03-25 21:21:57',
                'updated_at' => '2023-03-25 21:21:57',
            ),
            29 => 
            array (
                'id' => 75,
                'permission_group_id' => 53,
                'name' => 'Payment Types',
                'sort' => 2,
                'created_at' => '2023-04-03 19:27:10',
                'updated_at' => '2023-04-03 19:27:10',
            ),
        ));
        
        
    }
}