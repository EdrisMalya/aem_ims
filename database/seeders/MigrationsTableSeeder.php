<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'migration' => '2014_10_12_000000_create_users_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'migration' => '2014_10_12_100000_create_password_resets_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'migration' => '2019_08_19_000000_create_failed_jobs_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'migration' => '2019_12_14_000001_create_personal_access_tokens_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'migration' => '2022_11_30_050041_create_permission_groups_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'migration' => '2022_12_02_181022_create_permissions_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'migration' => '2022_12_06_052144_create_roles_table',
                'batch' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'migration' => '2022_12_06_052517_create_role_groups_table',
                'batch' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'migration' => '2022_12_06_105233_create_role_permissions_table',
                'batch' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'migration' => '2022_12_10_051106_create_user_roles_table',
                'batch' => 2,
            ),
            10 => 
            array (
                'id' => 11,
                'migration' => '2022_12_12_070531_create_languages_table',
                'batch' => 3,
            ),
            11 => 
            array (
                'id' => 12,
                'migration' => '2022_12_13_071728_create_language_dictionaries_table',
                'batch' => 4,
            ),
            12 => 
            array (
                'id' => 13,
                'migration' => '2022_12_18_070817_create_activity_log_table',
                'batch' => 5,
            ),
            13 => 
            array (
                'id' => 14,
                'migration' => '2022_12_18_070818_add_event_column_to_activity_log_table',
                'batch' => 5,
            ),
            14 => 
            array (
                'id' => 15,
                'migration' => '2022_12_18_070819_add_batch_uuid_column_to_activity_log_table',
                'batch' => 5,
            ),
            15 => 
            array (
                'id' => 16,
                'migration' => '2022_12_18_073237_create_login_logs_table',
                'batch' => 6,
            ),
            16 => 
            array (
                'id' => 17,
                'migration' => '2022_12_19_102550_create_system_backup_logs_table',
                'batch' => 7,
            ),
            17 => 
            array (
                'id' => 18,
                'migration' => '2022_12_26_193928_create_public_websites_table',
                'batch' => 8,
            ),
            18 => 
            array (
                'id' => 19,
                'migration' => '2022_12_29_092027_create_widgets_table',
                'batch' => 9,
            ),
            19 => 
            array (
                'id' => 20,
                'migration' => '0000_00_00_000000_create_websockets_statistics_entries_table',
                'batch' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'migration' => '2023_02_12_191419_create_currencies_table',
                'batch' => 10,
            ),
            21 => 
            array (
                'id' => 22,
                'migration' => '2023_02_13_150027_create_warehouses_table',
                'batch' => 11,
            ),
            22 => 
            array (
                'id' => 23,
                'migration' => '2023_02_13_151150_create_provinces_table',
                'batch' => 12,
            ),
            23 => 
            array (
                'id' => 24,
                'migration' => '2023_02_14_180341_create_customers_table',
                'batch' => 13,
            ),
            24 => 
            array (
                'id' => 25,
                'migration' => '2023_02_14_190215_create_system_settings_table',
                'batch' => 14,
            ),
            25 => 
            array (
                'id' => 26,
                'migration' => '2023_02_18_172839_create_base_units_table',
                'batch' => 15,
            ),
            26 => 
            array (
                'id' => 27,
                'migration' => '2023_02_18_184153_create_brands_table',
                'batch' => 16,
            ),
            27 => 
            array (
                'id' => 28,
                'migration' => '2023_02_20_095853_create_product_categories_table',
                'batch' => 17,
            ),
            28 => 
            array (
                'id' => 29,
                'migration' => '2023_02_20_114613_create_supplieers_table',
                'batch' => 18,
            ),
            29 => 
            array (
                'id' => 30,
                'migration' => '2023_02_20_115240_create_suppliers_table',
                'batch' => 19,
            ),
        ));
        
        
    }
}