<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InventoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('inventories')->delete();
        
        \DB::table('inventories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'warehouse_id' => 2,
                'supplier_id' => 1,
                'product_id' => 1,
                'base_unit_id' => 5,
                'quantity' => 67,
                'added_date' => '2023-03-18 18:07:00',
                'created_at' => '2023-03-18 18:07:00',
                'updated_at' => '2023-04-04 11:38:59',
            ),
            1 => 
            array (
                'id' => 2,
                'warehouse_id' => 2,
                'supplier_id' => 1,
                'product_id' => 2,
                'base_unit_id' => 5,
                'quantity' => 65,
                'added_date' => '2023-03-18 19:14:38',
                'created_at' => '2023-03-18 19:14:38',
                'updated_at' => '2023-04-02 18:08:04',
            ),
            2 => 
            array (
                'id' => 3,
                'warehouse_id' => 2,
                'supplier_id' => 1,
                'product_id' => 3,
                'base_unit_id' => 5,
                'quantity' => 11,
                'added_date' => '2023-03-18 19:45:08',
                'created_at' => '2023-03-18 19:45:08',
                'updated_at' => '2023-03-31 19:58:51',
            ),
            3 => 
            array (
                'id' => 4,
                'warehouse_id' => 2,
                'supplier_id' => 1,
                'product_id' => 4,
                'base_unit_id' => 5,
                'quantity' => 51,
                'added_date' => '2023-03-20 17:43:56',
                'created_at' => '2023-03-20 17:43:56',
                'updated_at' => '2023-03-31 19:58:51',
            ),
            4 => 
            array (
                'id' => 5,
                'warehouse_id' => 2,
                'supplier_id' => 1,
                'product_id' => 5,
                'base_unit_id' => 5,
                'quantity' => 51,
                'added_date' => '2023-03-28 17:27:23',
                'created_at' => '2023-03-28 17:27:23',
                'updated_at' => '2023-03-31 19:58:51',
            ),
            5 => 
            array (
                'id' => 6,
                'warehouse_id' => 2,
                'supplier_id' => 1,
                'product_id' => 6,
                'base_unit_id' => 5,
                'quantity' => 7,
                'added_date' => '2023-03-28 17:29:31',
                'created_at' => '2023-03-28 17:29:31',
                'updated_at' => '2023-03-31 19:58:51',
            ),
            6 => 
            array (
                'id' => 7,
                'warehouse_id' => 3,
                'supplier_id' => 1,
                'product_id' => 7,
                'base_unit_id' => 5,
                'quantity' => 4,
                'added_date' => '2023-03-28 17:31:48',
                'created_at' => '2023-03-28 17:31:48',
                'updated_at' => '2023-03-31 19:54:10',
            ),
            7 => 
            array (
                'id' => 8,
                'warehouse_id' => 3,
                'supplier_id' => 1,
                'product_id' => 8,
                'base_unit_id' => 5,
                'quantity' => 100,
                'added_date' => '2023-03-28 17:33:55',
                'created_at' => '2023-03-28 17:33:55',
                'updated_at' => '2023-03-28 17:33:55',
            ),
            8 => 
            array (
                'id' => 9,
                'warehouse_id' => 3,
                'supplier_id' => 2,
                'product_id' => 9,
                'base_unit_id' => 5,
                'quantity' => 50,
                'added_date' => '2023-03-28 17:36:51',
                'created_at' => '2023-03-28 17:36:51',
                'updated_at' => '2023-03-28 17:36:51',
            ),
            9 => 
            array (
                'id' => 10,
                'warehouse_id' => 3,
                'supplier_id' => 2,
                'product_id' => 10,
                'base_unit_id' => 5,
                'quantity' => 200,
                'added_date' => '2023-03-28 17:43:03',
                'created_at' => '2023-03-28 17:43:03',
                'updated_at' => '2023-03-28 17:43:03',
            ),
            10 => 
            array (
                'id' => 11,
                'warehouse_id' => 2,
                'supplier_id' => 1,
                'product_id' => 11,
                'base_unit_id' => 5,
                'quantity' => 21,
                'added_date' => '2023-03-28 17:44:39',
                'created_at' => '2023-03-28 17:44:39',
                'updated_at' => '2023-03-31 19:58:51',
            ),
            11 => 
            array (
                'id' => 12,
                'warehouse_id' => 3,
                'supplier_id' => 1,
                'product_id' => 12,
                'base_unit_id' => 5,
                'quantity' => 122,
                'added_date' => '2023-03-28 17:46:30',
                'created_at' => '2023-03-28 17:46:30',
                'updated_at' => '2023-03-28 17:46:30',
            ),
            12 => 
            array (
                'id' => 15,
                'warehouse_id' => 3,
                'supplier_id' => 2,
                'product_id' => 7,
                'base_unit_id' => 5,
                'quantity' => 1,
                'added_date' => '2023/03/31',
                'created_at' => '2023-03-31 19:56:18',
                'updated_at' => '2023-03-31 19:56:18',
            ),
            13 => 
            array (
                'id' => 16,
                'warehouse_id' => 3,
                'supplier_id' => 2,
                'product_id' => 12,
                'base_unit_id' => 5,
                'quantity' => 10,
                'added_date' => '2023/03/31',
                'created_at' => '2023-03-31 21:36:26',
                'updated_at' => '2023-03-31 21:36:26',
            ),
            14 => 
            array (
                'id' => 18,
                'warehouse_id' => 2,
                'supplier_id' => 2,
                'product_id' => 1,
                'base_unit_id' => 5,
                'quantity' => 22,
                'added_date' => '2023/04/01',
                'created_at' => '2023-04-01 21:21:21',
                'updated_at' => '2023-04-03 21:19:51',
            ),
            15 => 
            array (
                'id' => 19,
                'warehouse_id' => 2,
                'supplier_id' => 2,
                'product_id' => 2,
                'base_unit_id' => 11,
                'quantity' => 21,
                'added_date' => '2023/04/02',
                'created_at' => '2023-04-02 18:09:54',
                'updated_at' => '2023-04-02 20:21:41',
            ),
            16 => 
            array (
                'id' => 20,
                'warehouse_id' => 3,
                'supplier_id' => 1,
                'product_id' => 12,
                'base_unit_id' => 9,
                'quantity' => 9,
                'added_date' => '2023/04/02',
                'created_at' => '2023-04-02 20:29:00',
                'updated_at' => '2023-04-02 20:29:00',
            ),
            17 => 
            array (
                'id' => 21,
                'warehouse_id' => 2,
                'supplier_id' => 1,
                'product_id' => 11,
                'base_unit_id' => 11,
                'quantity' => 1,
                'added_date' => '2023/04/02',
                'created_at' => '2023-04-02 20:53:42',
                'updated_at' => '2023-04-02 20:53:42',
            ),
            18 => 
            array (
                'id' => 22,
                'warehouse_id' => 2,
                'supplier_id' => 1,
                'product_id' => 6,
                'base_unit_id' => 13,
                'quantity' => 2,
                'added_date' => '2023/04/02',
                'created_at' => '2023-04-02 20:53:42',
                'updated_at' => '2023-04-02 20:53:42',
            ),
            19 => 
            array (
                'id' => 23,
                'warehouse_id' => 2,
                'supplier_id' => 1,
                'product_id' => 5,
                'base_unit_id' => 13,
                'quantity' => 3,
                'added_date' => '2023/04/02',
                'created_at' => '2023-04-02 20:53:42',
                'updated_at' => '2023-04-02 20:53:42',
            ),
            20 => 
            array (
                'id' => 24,
                'warehouse_id' => 3,
                'supplier_id' => 2,
                'product_id' => 12,
                'base_unit_id' => 11,
                'quantity' => 4,
                'added_date' => '2023/04/02',
                'created_at' => '2023-04-02 21:10:19',
                'updated_at' => '2023-04-02 21:14:50',
            ),
            21 => 
            array (
                'id' => 25,
                'warehouse_id' => 3,
                'supplier_id' => 2,
                'product_id' => 10,
                'base_unit_id' => 11,
                'quantity' => 12,
                'added_date' => '2023/04/02',
                'created_at' => '2023-04-02 21:10:19',
                'updated_at' => '2023-04-02 21:14:50',
            ),
            22 => 
            array (
                'id' => 26,
                'warehouse_id' => 3,
                'supplier_id' => 2,
                'product_id' => 9,
                'base_unit_id' => 11,
                'quantity' => 12,
                'added_date' => '2023/04/02',
                'created_at' => '2023-04-02 21:10:19',
                'updated_at' => '2023-04-02 21:14:50',
            ),
            23 => 
            array (
                'id' => 27,
                'warehouse_id' => 3,
                'supplier_id' => 2,
                'product_id' => 7,
                'base_unit_id' => 8,
                'quantity' => 27,
                'added_date' => '2023/04/02',
                'created_at' => '2023-04-02 21:10:19',
                'updated_at' => '2023-04-02 21:14:50',
            ),
            24 => 
            array (
                'id' => 28,
                'warehouse_id' => 3,
                'supplier_id' => 1,
                'product_id' => 12,
                'base_unit_id' => 11,
                'quantity' => 1,
                'added_date' => '2023/04/02',
                'created_at' => '2023-04-02 22:06:56',
                'updated_at' => '2023-04-02 22:06:56',
            ),
            25 => 
            array (
                'id' => 29,
                'warehouse_id' => 3,
                'supplier_id' => 1,
                'product_id' => 2,
                'base_unit_id' => 5,
                'quantity' => 8,
                'added_date' => '2023/04/02',
                'created_at' => '2023-04-02 22:06:56',
                'updated_at' => '2023-04-02 22:06:56',
            ),
            26 => 
            array (
                'id' => 30,
                'warehouse_id' => 2,
                'supplier_id' => 1,
                'product_id' => 2,
                'base_unit_id' => 12,
                'quantity' => 3,
                'added_date' => '2023/04/02',
                'created_at' => '2023-04-02 22:07:38',
                'updated_at' => '2023-04-02 22:07:38',
            ),
            27 => 
            array (
                'id' => 31,
                'warehouse_id' => 2,
                'supplier_id' => 2,
                'product_id' => 5,
                'base_unit_id' => 13,
                'quantity' => 5,
                'added_date' => '2023/04/03',
                'created_at' => '2023-04-03 20:24:19',
                'updated_at' => '2023-04-03 21:19:51',
            ),
            28 => 
            array (
                'id' => 32,
                'warehouse_id' => 2,
                'supplier_id' => 2,
                'product_id' => 3,
                'base_unit_id' => 11,
                'quantity' => 2,
                'added_date' => '2023/04/03',
                'created_at' => '2023-04-03 21:19:51',
                'updated_at' => '2023-04-03 21:19:51',
            ),
            29 => 
            array (
                'id' => 33,
                'warehouse_id' => 2,
                'supplier_id' => 2,
                'product_id' => 11,
                'base_unit_id' => 11,
                'quantity' => 1,
                'added_date' => '2023/04/03',
                'created_at' => '2023-04-03 21:19:51',
                'updated_at' => '2023-04-03 21:19:51',
            ),
        ));
        
        
    }
}