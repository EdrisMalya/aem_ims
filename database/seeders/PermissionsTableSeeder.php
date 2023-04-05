<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'permission_group_id' => 1,
                'name' => 'Access',
                'key' => 'user-management-access',
                'created_at' => '2022-12-11 06:04:55',
                'updated_at' => '2022-12-11 06:04:55',
            ),
            1 => 
            array (
                'id' => 2,
                'permission_group_id' => 2,
                'name' => 'Access',
                'key' => 'users-access',
                'created_at' => '2022-12-11 06:05:18',
                'updated_at' => '2022-12-11 06:05:18',
            ),
            2 => 
            array (
                'id' => 3,
                'permission_group_id' => 2,
                'name' => 'Create user',
                'key' => 'users-create-user',
                'created_at' => '2022-12-11 06:05:30',
                'updated_at' => '2022-12-11 06:05:30',
            ),
            3 => 
            array (
                'id' => 4,
                'permission_group_id' => 2,
                'name' => 'Edit user',
                'key' => 'users-edit-user',
                'created_at' => '2022-12-11 06:05:39',
                'updated_at' => '2022-12-11 06:05:39',
            ),
            4 => 
            array (
                'id' => 5,
                'permission_group_id' => 2,
                'name' => 'Delete user',
                'key' => 'users-delete-user',
                'created_at' => '2022-12-11 06:05:48',
                'updated_at' => '2022-12-11 06:05:48',
            ),
            5 => 
            array (
                'id' => 6,
                'permission_group_id' => 3,
                'name' => 'Access',
                'key' => 'roles-access',
                'created_at' => '2022-12-11 06:05:55',
                'updated_at' => '2022-12-11 06:05:55',
            ),
            6 => 
            array (
                'id' => 9,
                'permission_group_id' => 3,
                'name' => 'View role details',
                'key' => 'roles-view-role-details',
                'created_at' => '2022-12-11 06:06:23',
                'updated_at' => '2022-12-11 06:06:23',
            ),
            7 => 
            array (
                'id' => 10,
                'permission_group_id' => 3,
                'name' => 'Create role',
                'key' => 'roles-create-role',
                'created_at' => '2022-12-11 06:06:50',
                'updated_at' => '2022-12-11 06:06:50',
            ),
            8 => 
            array (
                'id' => 11,
                'permission_group_id' => 3,
                'name' => 'Edit role',
                'key' => 'roles-edit-role',
                'created_at' => '2022-12-11 06:06:54',
                'updated_at' => '2022-12-11 06:06:54',
            ),
            9 => 
            array (
                'id' => 12,
                'permission_group_id' => 3,
                'name' => 'Delete role',
                'key' => 'roles-delete-role',
                'created_at' => '2022-12-11 06:06:58',
                'updated_at' => '2022-12-11 06:06:58',
            ),
            10 => 
            array (
                'id' => 13,
                'permission_group_id' => 2,
                'name' => 'View profile',
                'key' => 'users-view-profile',
                'created_at' => '2022-12-11 08:13:11',
                'updated_at' => '2022-12-11 08:13:11',
            ),
            11 => 
            array (
                'id' => 14,
                'permission_group_id' => 4,
                'name' => 'Access',
                'key' => 'configuration-access',
                'created_at' => '2022-12-11 10:24:17',
                'updated_at' => '2022-12-11 10:24:17',
            ),
            12 => 
            array (
                'id' => 15,
                'permission_group_id' => 5,
                'name' => 'Access',
                'key' => 'language-access',
                'created_at' => '2022-12-11 10:43:21',
                'updated_at' => '2022-12-11 10:43:21',
            ),
            13 => 
            array (
                'id' => 16,
                'permission_group_id' => 5,
                'name' => 'Create language',
                'key' => 'language-create-language',
                'created_at' => '2022-12-12 06:22:13',
                'updated_at' => '2022-12-12 06:22:13',
            ),
            14 => 
            array (
                'id' => 17,
                'permission_group_id' => 5,
                'name' => 'Edit language name',
                'key' => 'language-edit-language-name',
                'created_at' => '2022-12-13 05:26:42',
                'updated_at' => '2022-12-13 05:26:42',
            ),
            15 => 
            array (
                'id' => 18,
                'permission_group_id' => 5,
                'name' => 'Delete language',
                'key' => 'language-delete-language',
                'created_at' => '2022-12-13 05:26:49',
                'updated_at' => '2022-12-13 05:26:49',
            ),
            16 => 
            array (
                'id' => 19,
                'permission_group_id' => 6,
                'name' => 'Access',
                'key' => 'language-dictionary-access',
                'created_at' => '2022-12-13 05:27:28',
                'updated_at' => '2022-12-13 05:27:28',
            ),
            17 => 
            array (
                'id' => 21,
                'permission_group_id' => 6,
                'name' => 'Add new word to dictionary',
                'key' => 'language-dictionary-add-new-word-to-dictionary',
                'created_at' => '2022-12-13 05:44:26',
                'updated_at' => '2022-12-13 05:44:26',
            ),
            18 => 
            array (
                'id' => 22,
                'permission_group_id' => 6,
                'name' => 'Edit word',
                'key' => 'language-dictionary-edit-word',
                'created_at' => '2022-12-13 07:32:33',
                'updated_at' => '2022-12-13 07:32:33',
            ),
            19 => 
            array (
                'id' => 23,
                'permission_group_id' => 6,
                'name' => 'Delete word',
                'key' => 'language-dictionary-delete-word',
                'created_at' => '2022-12-13 07:32:39',
                'updated_at' => '2022-12-13 07:32:39',
            ),
            20 => 
            array (
                'id' => 26,
                'permission_group_id' => 9,
                'name' => 'Access',
                'key' => 'log-activity-access',
                'created_at' => '2022-12-18 10:06:53',
                'updated_at' => '2022-12-18 10:06:53',
            ),
            21 => 
            array (
                'id' => 27,
                'permission_group_id' => 2,
                'name' => 'View user login log',
                'key' => 'users-view-user-login-log',
                'created_at' => '2022-12-18 10:39:43',
                'updated_at' => '2022-12-18 10:39:43',
            ),
            22 => 
            array (
                'id' => 28,
                'permission_group_id' => 9,
                'name' => 'View log details',
                'key' => 'log-activity-view-log-details',
                'created_at' => '2022-12-18 11:01:30',
                'updated_at' => '2022-12-18 11:01:30',
            ),
            23 => 
            array (
                'id' => 29,
                'permission_group_id' => 9,
                'name' => 'Delete log',
                'key' => 'log-activity-delete-log',
                'created_at' => '2022-12-18 11:01:48',
                'updated_at' => '2022-12-18 11:01:48',
            ),
            24 => 
            array (
                'id' => 30,
                'permission_group_id' => 10,
                'name' => 'Access',
                'key' => 'login-log-access',
                'created_at' => '2022-12-19 06:29:09',
                'updated_at' => '2022-12-19 06:29:09',
            ),
            25 => 
            array (
                'id' => 31,
                'permission_group_id' => 10,
                'name' => 'Truncate',
                'key' => 'login-log-truncate',
                'created_at' => '2022-12-19 06:29:17',
                'updated_at' => '2022-12-19 06:29:17',
            ),
            26 => 
            array (
                'id' => 32,
                'permission_group_id' => 11,
                'name' => 'Access',
                'key' => 'backups-access',
                'created_at' => '2022-12-19 15:37:12',
                'updated_at' => '2022-12-19 15:37:12',
            ),
            27 => 
            array (
                'id' => 33,
                'permission_group_id' => 13,
                'name' => 'Access',
                'key' => 'log-activity-access',
                'created_at' => '2022-12-22 10:29:09',
                'updated_at' => '2022-12-22 10:29:09',
            ),
            28 => 
            array (
                'id' => 34,
                'permission_group_id' => 13,
                'name' => 'View details',
                'key' => 'log-activity-view-details',
                'created_at' => '2022-12-22 10:29:14',
                'updated_at' => '2022-12-22 10:29:14',
            ),
            29 => 
            array (
                'id' => 35,
                'permission_group_id' => 14,
                'name' => 'Access',
                'key' => 'public-website-access',
                'created_at' => '2022-12-26 20:11:00',
                'updated_at' => '2022-12-26 20:11:00',
            ),
            30 => 
            array (
                'id' => 36,
                'permission_group_id' => 16,
                'name' => 'Access',
                'key' => 'pages-access',
                'created_at' => '2022-12-27 17:49:27',
                'updated_at' => '2022-12-27 17:49:27',
            ),
            31 => 
            array (
                'id' => 37,
                'permission_group_id' => 15,
                'name' => 'Access',
                'key' => 'home-page-access',
                'created_at' => '2022-12-27 17:49:33',
                'updated_at' => '2022-12-27 17:49:33',
            ),
            32 => 
            array (
                'id' => 38,
                'permission_group_id' => 17,
                'name' => 'Access',
                'key' => 'widgets-access',
                'created_at' => '2022-12-28 20:05:53',
                'updated_at' => '2022-12-28 20:05:53',
            ),
            33 => 
            array (
                'id' => 39,
                'permission_group_id' => 17,
                'name' => 'Create widgets',
                'key' => 'widgets-create-widgets',
                'created_at' => '2022-12-28 20:14:26',
                'updated_at' => '2022-12-28 20:14:26',
            ),
            34 => 
            array (
                'id' => 40,
                'permission_group_id' => 17,
                'name' => 'Update widgets',
                'key' => 'widgets-update-widgets',
                'created_at' => '2022-12-29 12:49:46',
                'updated_at' => '2022-12-29 12:49:46',
            ),
            35 => 
            array (
                'id' => 41,
                'permission_group_id' => 17,
                'name' => 'Delete widgets',
                'key' => 'widgets-delete-widgets',
                'created_at' => '2022-12-29 12:49:56',
                'updated_at' => '2022-12-29 12:49:56',
            ),
            36 => 
            array (
                'id' => 70,
                'permission_group_id' => 53,
                'name' => 'Access',
                'key' => 'store-settings-access',
                'created_at' => '2023-02-12 18:50:04',
                'updated_at' => '2023-02-12 18:50:04',
            ),
            37 => 
            array (
                'id' => 75,
                'permission_group_id' => 55,
                'name' => 'Access',
                'key' => 'currency-access',
                'created_at' => '2023-02-12 19:25:00',
                'updated_at' => '2023-02-12 19:25:00',
            ),
            38 => 
            array (
                'id' => 76,
                'permission_group_id' => 55,
                'name' => 'Create currency',
                'key' => 'currency-create-currency',
                'created_at' => '2023-02-12 19:25:09',
                'updated_at' => '2023-02-12 19:25:09',
            ),
            39 => 
            array (
                'id' => 77,
                'permission_group_id' => 55,
                'name' => 'Edit currency',
                'key' => 'currency-edit-currency',
                'created_at' => '2023-02-12 19:25:17',
                'updated_at' => '2023-02-12 19:25:17',
            ),
            40 => 
            array (
                'id' => 78,
                'permission_group_id' => 55,
                'name' => 'Delete currency',
                'key' => 'currency-delete-currency',
                'created_at' => '2023-02-12 19:25:21',
                'updated_at' => '2023-02-12 19:25:21',
            ),
            41 => 
            array (
                'id' => 83,
                'permission_group_id' => 57,
                'name' => 'Access',
                'key' => 'warehouse-access',
                'created_at' => '2023-02-13 15:04:44',
                'updated_at' => '2023-02-13 15:04:44',
            ),
            42 => 
            array (
                'id' => 84,
                'permission_group_id' => 57,
                'name' => 'Create Warehouse',
                'key' => 'warehouse-create-warehouse',
                'created_at' => '2023-02-13 15:04:58',
                'updated_at' => '2023-02-13 15:04:58',
            ),
            43 => 
            array (
                'id' => 85,
                'permission_group_id' => 57,
                'name' => 'Edit Warehouse',
                'key' => 'warehouse-edit-warehouse',
                'created_at' => '2023-02-13 15:05:02',
                'updated_at' => '2023-02-13 15:05:02',
            ),
            44 => 
            array (
                'id' => 86,
                'permission_group_id' => 57,
                'name' => 'Delete',
                'key' => 'warehouse-delete',
                'created_at' => '2023-02-13 15:05:06',
                'updated_at' => '2023-02-13 15:05:06',
            ),
            45 => 
            array (
                'id' => 91,
                'permission_group_id' => 59,
                'name' => 'Access',
                'key' => 'customers-access',
                'created_at' => '2023-02-14 18:07:20',
                'updated_at' => '2023-02-14 18:07:20',
            ),
            46 => 
            array (
                'id' => 92,
                'permission_group_id' => 59,
                'name' => 'Create Customer',
                'key' => 'customers-create-customer',
                'created_at' => '2023-02-14 18:07:28',
                'updated_at' => '2023-02-14 18:07:28',
            ),
            47 => 
            array (
                'id' => 93,
                'permission_group_id' => 59,
                'name' => 'Edit Customer',
                'key' => 'customers-edit-customer',
                'created_at' => '2023-02-14 18:07:33',
                'updated_at' => '2023-02-14 18:07:33',
            ),
            48 => 
            array (
                'id' => 94,
                'permission_group_id' => 59,
                'name' => 'Delete Customer',
                'key' => 'customers-delete-customer',
                'created_at' => '2023-02-14 18:07:38',
                'updated_at' => '2023-02-14 18:07:38',
            ),
            49 => 
            array (
                'id' => 96,
                'permission_group_id' => 60,
                'name' => 'Access',
                'key' => 'products-management-access',
                'created_at' => '2023-02-14 21:07:59',
                'updated_at' => '2023-02-14 21:07:59',
            ),
            50 => 
            array (
                'id' => 97,
                'permission_group_id' => 61,
                'name' => 'Access',
                'key' => 'product-access',
                'created_at' => '2023-02-14 21:12:52',
                'updated_at' => '2023-02-14 21:12:52',
            ),
            51 => 
            array (
                'id' => 102,
                'permission_group_id' => 63,
                'name' => 'Access',
                'key' => 'base-unit-access',
                'created_at' => '2023-02-18 17:44:00',
                'updated_at' => '2023-02-18 17:44:00',
            ),
            52 => 
            array (
                'id' => 103,
                'permission_group_id' => 63,
                'name' => 'Create base uit',
                'key' => 'base-unit-create-base-uit',
                'created_at' => '2023-02-18 17:44:07',
                'updated_at' => '2023-02-18 17:44:07',
            ),
            53 => 
            array (
                'id' => 104,
                'permission_group_id' => 63,
                'name' => 'Edit base unit',
                'key' => 'base-unit-edit-base-unit',
                'created_at' => '2023-02-18 17:44:15',
                'updated_at' => '2023-02-18 17:44:15',
            ),
            54 => 
            array (
                'id' => 105,
                'permission_group_id' => 63,
                'name' => 'Delete base unit',
                'key' => 'base-unit-delete-base-unit',
                'created_at' => '2023-02-18 17:44:20',
                'updated_at' => '2023-02-18 17:44:20',
            ),
            55 => 
            array (
                'id' => 112,
                'permission_group_id' => 65,
                'name' => 'Access',
                'key' => 'brand-access',
                'created_at' => '2023-02-18 18:47:27',
                'updated_at' => '2023-02-18 18:47:27',
            ),
            56 => 
            array (
                'id' => 113,
                'permission_group_id' => 65,
                'name' => 'Create brand',
                'key' => 'brand-create-brand',
                'created_at' => '2023-02-18 18:47:32',
                'updated_at' => '2023-02-18 18:47:32',
            ),
            57 => 
            array (
                'id' => 114,
                'permission_group_id' => 65,
                'name' => 'Edit brand',
                'key' => 'brand-edit-brand',
                'created_at' => '2023-02-18 18:47:36',
                'updated_at' => '2023-02-18 18:47:36',
            ),
            58 => 
            array (
                'id' => 115,
                'permission_group_id' => 65,
                'name' => 'Delete brand',
                'key' => 'brand-delete-brand',
                'created_at' => '2023-02-18 18:47:41',
                'updated_at' => '2023-02-18 18:47:41',
            ),
            59 => 
            array (
                'id' => 120,
                'permission_group_id' => 67,
                'name' => 'Access',
                'key' => 'product-categories-access',
                'created_at' => '2023-02-20 10:08:10',
                'updated_at' => '2023-02-20 10:08:10',
            ),
            60 => 
            array (
                'id' => 121,
                'permission_group_id' => 67,
                'name' => 'Create category',
                'key' => 'product-categories-create-category',
                'created_at' => '2023-02-20 10:08:22',
                'updated_at' => '2023-02-20 10:08:22',
            ),
            61 => 
            array (
                'id' => 122,
                'permission_group_id' => 67,
                'name' => 'Edit category',
                'key' => 'product-categories-edit-category',
                'created_at' => '2023-02-20 10:08:29',
                'updated_at' => '2023-02-20 10:08:29',
            ),
            62 => 
            array (
                'id' => 123,
                'permission_group_id' => 67,
                'name' => 'Delete category',
                'key' => 'product-categories-delete-category',
                'created_at' => '2023-02-20 10:09:21',
                'updated_at' => '2023-02-20 10:09:21',
            ),
            63 => 
            array (
                'id' => 128,
                'permission_group_id' => 69,
                'name' => 'Access',
                'key' => 'supplier-access',
                'created_at' => '2023-02-20 11:57:59',
                'updated_at' => '2023-02-20 11:57:59',
            ),
            64 => 
            array (
                'id' => 129,
                'permission_group_id' => 69,
                'name' => 'Create supplier',
                'key' => 'supplier-create-supplier',
                'created_at' => '2023-02-20 11:58:07',
                'updated_at' => '2023-02-20 11:58:07',
            ),
            65 => 
            array (
                'id' => 130,
                'permission_group_id' => 69,
                'name' => 'Edit supplier',
                'key' => 'supplier-edit-supplier',
                'created_at' => '2023-02-20 11:58:16',
                'updated_at' => '2023-02-20 11:58:16',
            ),
            66 => 
            array (
                'id' => 131,
                'permission_group_id' => 69,
                'name' => 'Delete supplier',
                'key' => 'supplier-delete-supplier',
                'created_at' => '2023-02-20 11:58:22',
                'updated_at' => '2023-02-20 11:58:22',
            ),
            67 => 
            array (
                'id' => 133,
                'permission_group_id' => 61,
                'name' => 'Add product',
                'key' => 'product-add-product',
                'created_at' => '2023-02-20 13:02:32',
                'updated_at' => '2023-02-20 13:02:32',
            ),
            68 => 
            array (
                'id' => 134,
                'permission_group_id' => 61,
                'name' => 'View product details',
                'key' => 'product-view-product-details',
                'created_at' => '2023-03-20 17:19:04',
                'updated_at' => '2023-03-20 17:19:04',
            ),
            69 => 
            array (
                'id' => 135,
                'permission_group_id' => 61,
                'name' => 'Edit product',
                'key' => 'product-edit-product',
                'created_at' => '2023-03-20 17:19:10',
                'updated_at' => '2023-03-20 17:19:10',
            ),
            70 => 
            array (
                'id' => 136,
                'permission_group_id' => 61,
                'name' => 'Delete product',
                'key' => 'product-delete-product',
                'created_at' => '2023-03-20 17:19:16',
                'updated_at' => '2023-03-20 17:19:16',
            ),
            71 => 
            array (
                'id' => 137,
                'permission_group_id' => 70,
                'name' => 'Access',
                'key' => 'print-barcode-access',
                'created_at' => '2023-03-23 20:21:27',
                'updated_at' => '2023-03-23 20:21:27',
            ),
            72 => 
            array (
                'id' => 142,
                'permission_group_id' => 73,
                'name' => 'Access',
                'key' => 'purchase-return-access',
                'created_at' => '2023-03-25 21:32:46',
                'updated_at' => '2023-03-25 21:32:46',
            ),
            73 => 
            array (
                'id' => 143,
                'permission_group_id' => 72,
                'name' => 'Access',
                'key' => 'purchase-access',
                'created_at' => '2023-03-25 21:37:29',
                'updated_at' => '2023-03-25 21:37:29',
            ),
            74 => 
            array (
                'id' => 144,
                'permission_group_id' => 72,
                'name' => 'Create purchase',
                'key' => 'purchase-create-purchase',
                'created_at' => '2023-03-26 17:27:27',
                'updated_at' => '2023-03-26 17:27:27',
            ),
            75 => 
            array (
                'id' => 145,
                'permission_group_id' => 72,
                'name' => 'View details',
                'key' => 'purchase-view-details',
                'created_at' => '2023-03-31 20:36:21',
                'updated_at' => '2023-03-31 20:36:21',
            ),
            76 => 
            array (
                'id' => 150,
                'permission_group_id' => 75,
                'name' => 'Access',
                'key' => 'payment-types-access',
                'created_at' => '2023-04-03 19:27:17',
                'updated_at' => '2023-04-03 19:27:17',
            ),
            77 => 
            array (
                'id' => 151,
                'permission_group_id' => 75,
                'name' => 'Create',
                'key' => 'payment-types-create',
                'created_at' => '2023-04-03 19:28:04',
                'updated_at' => '2023-04-03 19:28:04',
            ),
            78 => 
            array (
                'id' => 152,
                'permission_group_id' => 75,
                'name' => 'Edit',
                'key' => 'payment-types-edit',
                'created_at' => '2023-04-03 19:28:11',
                'updated_at' => '2023-04-03 19:28:11',
            ),
            79 => 
            array (
                'id' => 153,
                'permission_group_id' => 75,
                'name' => 'Delete',
                'key' => 'payment-types-delete',
                'created_at' => '2023-04-03 19:28:14',
                'updated_at' => '2023-04-03 19:28:14',
            ),
            80 => 
            array (
                'id' => 154,
                'permission_group_id' => 73,
                'name' => 'Create purchase return',
                'key' => 'purchase-return-create-purchase-return',
                'created_at' => '2023-04-04 19:17:05',
                'updated_at' => '2023-04-04 19:17:05',
            ),
        ));
        
        
    }
}