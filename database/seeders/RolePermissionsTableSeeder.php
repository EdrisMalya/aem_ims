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
                'id' => 1557,
                'role_id' => 1,
                'permission_id' => 4,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            1 => 
            array (
                'id' => 1558,
                'role_id' => 1,
                'permission_id' => 5,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            2 => 
            array (
                'id' => 1559,
                'role_id' => 1,
                'permission_id' => 3,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            3 => 
            array (
                'id' => 1560,
                'role_id' => 1,
                'permission_id' => 2,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            4 => 
            array (
                'id' => 1561,
                'role_id' => 1,
                'permission_id' => 6,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            5 => 
            array (
                'id' => 1562,
                'role_id' => 1,
                'permission_id' => 9,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            6 => 
            array (
                'id' => 1563,
                'role_id' => 1,
                'permission_id' => 11,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            7 => 
            array (
                'id' => 1564,
                'role_id' => 1,
                'permission_id' => 10,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            8 => 
            array (
                'id' => 1565,
                'role_id' => 1,
                'permission_id' => 12,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            9 => 
            array (
                'id' => 1566,
                'role_id' => 1,
                'permission_id' => 15,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            10 => 
            array (
                'id' => 1567,
                'role_id' => 1,
                'permission_id' => 16,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            11 => 
            array (
                'id' => 1568,
                'role_id' => 1,
                'permission_id' => 17,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            12 => 
            array (
                'id' => 1569,
                'role_id' => 1,
                'permission_id' => 18,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            13 => 
            array (
                'id' => 1570,
                'role_id' => 1,
                'permission_id' => 19,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            14 => 
            array (
                'id' => 1571,
                'role_id' => 1,
                'permission_id' => 21,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            15 => 
            array (
                'id' => 1572,
                'role_id' => 1,
                'permission_id' => 22,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            16 => 
            array (
                'id' => 1573,
                'role_id' => 1,
                'permission_id' => 23,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            17 => 
            array (
                'id' => 1574,
                'role_id' => 1,
                'permission_id' => 14,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            18 => 
            array (
                'id' => 1575,
                'role_id' => 1,
                'permission_id' => 26,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            19 => 
            array (
                'id' => 1576,
                'role_id' => 1,
                'permission_id' => 27,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            20 => 
            array (
                'id' => 1577,
                'role_id' => 1,
                'permission_id' => 28,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            21 => 
            array (
                'id' => 1578,
                'role_id' => 1,
                'permission_id' => 29,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            22 => 
            array (
                'id' => 1579,
                'role_id' => 1,
                'permission_id' => 30,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            23 => 
            array (
                'id' => 1580,
                'role_id' => 1,
                'permission_id' => 32,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            24 => 
            array (
                'id' => 1581,
                'role_id' => 1,
                'permission_id' => 1,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            25 => 
            array (
                'id' => 1582,
                'role_id' => 1,
                'permission_id' => 13,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            26 => 
            array (
                'id' => 1583,
                'role_id' => 1,
                'permission_id' => 33,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            27 => 
            array (
                'id' => 1584,
                'role_id' => 1,
                'permission_id' => 34,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            28 => 
            array (
                'id' => 1585,
                'role_id' => 1,
                'permission_id' => 35,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            29 => 
            array (
                'id' => 1586,
                'role_id' => 1,
                'permission_id' => 37,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            30 => 
            array (
                'id' => 1587,
                'role_id' => 1,
                'permission_id' => 36,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            31 => 
            array (
                'id' => 1588,
                'role_id' => 1,
                'permission_id' => 38,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            32 => 
            array (
                'id' => 1589,
                'role_id' => 1,
                'permission_id' => 39,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            33 => 
            array (
                'id' => 1590,
                'role_id' => 1,
                'permission_id' => 40,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            34 => 
            array (
                'id' => 1591,
                'role_id' => 1,
                'permission_id' => 41,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            35 => 
            array (
                'id' => 1592,
                'role_id' => 1,
                'permission_id' => 70,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            36 => 
            array (
                'id' => 1593,
                'role_id' => 1,
                'permission_id' => 75,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            37 => 
            array (
                'id' => 1594,
                'role_id' => 1,
                'permission_id' => 76,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            38 => 
            array (
                'id' => 1595,
                'role_id' => 1,
                'permission_id' => 77,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            39 => 
            array (
                'id' => 1596,
                'role_id' => 1,
                'permission_id' => 78,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            40 => 
            array (
                'id' => 1597,
                'role_id' => 1,
                'permission_id' => 83,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            41 => 
            array (
                'id' => 1598,
                'role_id' => 1,
                'permission_id' => 84,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            42 => 
            array (
                'id' => 1599,
                'role_id' => 1,
                'permission_id' => 86,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            43 => 
            array (
                'id' => 1600,
                'role_id' => 1,
                'permission_id' => 85,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            44 => 
            array (
                'id' => 1601,
                'role_id' => 1,
                'permission_id' => 91,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            45 => 
            array (
                'id' => 1602,
                'role_id' => 1,
                'permission_id' => 92,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            46 => 
            array (
                'id' => 1603,
                'role_id' => 1,
                'permission_id' => 94,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            47 => 
            array (
                'id' => 1604,
                'role_id' => 1,
                'permission_id' => 93,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            48 => 
            array (
                'id' => 1605,
                'role_id' => 1,
                'permission_id' => 96,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            49 => 
            array (
                'id' => 1606,
                'role_id' => 1,
                'permission_id' => 97,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            50 => 
            array (
                'id' => 1607,
                'role_id' => 1,
                'permission_id' => 102,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            51 => 
            array (
                'id' => 1608,
                'role_id' => 1,
                'permission_id' => 103,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            52 => 
            array (
                'id' => 1609,
                'role_id' => 1,
                'permission_id' => 104,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            53 => 
            array (
                'id' => 1610,
                'role_id' => 1,
                'permission_id' => 105,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            54 => 
            array (
                'id' => 1611,
                'role_id' => 1,
                'permission_id' => 112,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            55 => 
            array (
                'id' => 1612,
                'role_id' => 1,
                'permission_id' => 113,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            56 => 
            array (
                'id' => 1613,
                'role_id' => 1,
                'permission_id' => 114,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
            57 => 
            array (
                'id' => 1614,
                'role_id' => 1,
                'permission_id' => 115,
                'created_at' => '2023-02-18 18:48:24',
                'updated_at' => '2023-02-18 18:48:24',
            ),
        ));
        
        
    }
}