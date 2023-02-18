<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolePermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_permissions')->delete();
        
        \DB::table('role_permissions')->insert(array (
            0 => 
            array (
                'id' => 1104,
                'role_id' => 1,
                'permission_id' => 4,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            1 => 
            array (
                'id' => 1105,
                'role_id' => 1,
                'permission_id' => 5,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            2 => 
            array (
                'id' => 1106,
                'role_id' => 1,
                'permission_id' => 3,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            3 => 
            array (
                'id' => 1107,
                'role_id' => 1,
                'permission_id' => 2,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            4 => 
            array (
                'id' => 1108,
                'role_id' => 1,
                'permission_id' => 6,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            5 => 
            array (
                'id' => 1109,
                'role_id' => 1,
                'permission_id' => 9,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            6 => 
            array (
                'id' => 1110,
                'role_id' => 1,
                'permission_id' => 11,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            7 => 
            array (
                'id' => 1111,
                'role_id' => 1,
                'permission_id' => 10,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            8 => 
            array (
                'id' => 1112,
                'role_id' => 1,
                'permission_id' => 12,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            9 => 
            array (
                'id' => 1113,
                'role_id' => 1,
                'permission_id' => 15,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            10 => 
            array (
                'id' => 1114,
                'role_id' => 1,
                'permission_id' => 16,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            11 => 
            array (
                'id' => 1115,
                'role_id' => 1,
                'permission_id' => 17,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            12 => 
            array (
                'id' => 1116,
                'role_id' => 1,
                'permission_id' => 18,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            13 => 
            array (
                'id' => 1117,
                'role_id' => 1,
                'permission_id' => 19,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            14 => 
            array (
                'id' => 1118,
                'role_id' => 1,
                'permission_id' => 21,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            15 => 
            array (
                'id' => 1119,
                'role_id' => 1,
                'permission_id' => 22,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            16 => 
            array (
                'id' => 1120,
                'role_id' => 1,
                'permission_id' => 23,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            17 => 
            array (
                'id' => 1121,
                'role_id' => 1,
                'permission_id' => 14,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            18 => 
            array (
                'id' => 1122,
                'role_id' => 1,
                'permission_id' => 26,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            19 => 
            array (
                'id' => 1123,
                'role_id' => 1,
                'permission_id' => 27,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            20 => 
            array (
                'id' => 1124,
                'role_id' => 1,
                'permission_id' => 28,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            21 => 
            array (
                'id' => 1125,
                'role_id' => 1,
                'permission_id' => 29,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            22 => 
            array (
                'id' => 1126,
                'role_id' => 1,
                'permission_id' => 30,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            23 => 
            array (
                'id' => 1127,
                'role_id' => 1,
                'permission_id' => 32,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            24 => 
            array (
                'id' => 1128,
                'role_id' => 1,
                'permission_id' => 1,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            25 => 
            array (
                'id' => 1129,
                'role_id' => 1,
                'permission_id' => 13,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            26 => 
            array (
                'id' => 1130,
                'role_id' => 1,
                'permission_id' => 33,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            27 => 
            array (
                'id' => 1131,
                'role_id' => 1,
                'permission_id' => 34,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            28 => 
            array (
                'id' => 1132,
                'role_id' => 1,
                'permission_id' => 35,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            29 => 
            array (
                'id' => 1133,
                'role_id' => 1,
                'permission_id' => 37,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            30 => 
            array (
                'id' => 1134,
                'role_id' => 1,
                'permission_id' => 36,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            31 => 
            array (
                'id' => 1135,
                'role_id' => 1,
                'permission_id' => 38,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            32 => 
            array (
                'id' => 1136,
                'role_id' => 1,
                'permission_id' => 39,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            33 => 
            array (
                'id' => 1137,
                'role_id' => 1,
                'permission_id' => 40,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
            34 => 
            array (
                'id' => 1138,
                'role_id' => 1,
                'permission_id' => 41,
                'created_at' => '2023-02-12 00:59:38',
                'updated_at' => '2023-02-12 00:59:38',
            ),
        ));
        
        
    }
}