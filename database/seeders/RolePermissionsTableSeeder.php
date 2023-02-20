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
                'id' => 1876,
                'role_id' => 1,
                'permission_id' => 4,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            1 => 
            array (
                'id' => 1877,
                'role_id' => 1,
                'permission_id' => 5,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            2 => 
            array (
                'id' => 1878,
                'role_id' => 1,
                'permission_id' => 3,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            3 => 
            array (
                'id' => 1879,
                'role_id' => 1,
                'permission_id' => 2,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            4 => 
            array (
                'id' => 1880,
                'role_id' => 1,
                'permission_id' => 6,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            5 => 
            array (
                'id' => 1881,
                'role_id' => 1,
                'permission_id' => 9,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            6 => 
            array (
                'id' => 1882,
                'role_id' => 1,
                'permission_id' => 11,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            7 => 
            array (
                'id' => 1883,
                'role_id' => 1,
                'permission_id' => 10,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            8 => 
            array (
                'id' => 1884,
                'role_id' => 1,
                'permission_id' => 12,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            9 => 
            array (
                'id' => 1885,
                'role_id' => 1,
                'permission_id' => 15,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            10 => 
            array (
                'id' => 1886,
                'role_id' => 1,
                'permission_id' => 16,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            11 => 
            array (
                'id' => 1887,
                'role_id' => 1,
                'permission_id' => 17,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            12 => 
            array (
                'id' => 1888,
                'role_id' => 1,
                'permission_id' => 18,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            13 => 
            array (
                'id' => 1889,
                'role_id' => 1,
                'permission_id' => 19,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            14 => 
            array (
                'id' => 1890,
                'role_id' => 1,
                'permission_id' => 21,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            15 => 
            array (
                'id' => 1891,
                'role_id' => 1,
                'permission_id' => 22,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            16 => 
            array (
                'id' => 1892,
                'role_id' => 1,
                'permission_id' => 23,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            17 => 
            array (
                'id' => 1893,
                'role_id' => 1,
                'permission_id' => 14,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            18 => 
            array (
                'id' => 1894,
                'role_id' => 1,
                'permission_id' => 26,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            19 => 
            array (
                'id' => 1895,
                'role_id' => 1,
                'permission_id' => 27,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            20 => 
            array (
                'id' => 1896,
                'role_id' => 1,
                'permission_id' => 28,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            21 => 
            array (
                'id' => 1897,
                'role_id' => 1,
                'permission_id' => 29,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            22 => 
            array (
                'id' => 1898,
                'role_id' => 1,
                'permission_id' => 30,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            23 => 
            array (
                'id' => 1899,
                'role_id' => 1,
                'permission_id' => 32,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            24 => 
            array (
                'id' => 1900,
                'role_id' => 1,
                'permission_id' => 1,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            25 => 
            array (
                'id' => 1901,
                'role_id' => 1,
                'permission_id' => 13,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            26 => 
            array (
                'id' => 1902,
                'role_id' => 1,
                'permission_id' => 33,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            27 => 
            array (
                'id' => 1903,
                'role_id' => 1,
                'permission_id' => 34,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            28 => 
            array (
                'id' => 1904,
                'role_id' => 1,
                'permission_id' => 35,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            29 => 
            array (
                'id' => 1905,
                'role_id' => 1,
                'permission_id' => 37,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            30 => 
            array (
                'id' => 1906,
                'role_id' => 1,
                'permission_id' => 36,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            31 => 
            array (
                'id' => 1907,
                'role_id' => 1,
                'permission_id' => 38,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            32 => 
            array (
                'id' => 1908,
                'role_id' => 1,
                'permission_id' => 39,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            33 => 
            array (
                'id' => 1909,
                'role_id' => 1,
                'permission_id' => 40,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            34 => 
            array (
                'id' => 1910,
                'role_id' => 1,
                'permission_id' => 41,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            35 => 
            array (
                'id' => 1911,
                'role_id' => 1,
                'permission_id' => 70,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            36 => 
            array (
                'id' => 1912,
                'role_id' => 1,
                'permission_id' => 75,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            37 => 
            array (
                'id' => 1913,
                'role_id' => 1,
                'permission_id' => 76,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            38 => 
            array (
                'id' => 1914,
                'role_id' => 1,
                'permission_id' => 77,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            39 => 
            array (
                'id' => 1915,
                'role_id' => 1,
                'permission_id' => 78,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            40 => 
            array (
                'id' => 1916,
                'role_id' => 1,
                'permission_id' => 83,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            41 => 
            array (
                'id' => 1917,
                'role_id' => 1,
                'permission_id' => 84,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            42 => 
            array (
                'id' => 1918,
                'role_id' => 1,
                'permission_id' => 86,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            43 => 
            array (
                'id' => 1919,
                'role_id' => 1,
                'permission_id' => 85,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            44 => 
            array (
                'id' => 1920,
                'role_id' => 1,
                'permission_id' => 91,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            45 => 
            array (
                'id' => 1921,
                'role_id' => 1,
                'permission_id' => 92,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            46 => 
            array (
                'id' => 1922,
                'role_id' => 1,
                'permission_id' => 94,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            47 => 
            array (
                'id' => 1923,
                'role_id' => 1,
                'permission_id' => 93,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            48 => 
            array (
                'id' => 1924,
                'role_id' => 1,
                'permission_id' => 96,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            49 => 
            array (
                'id' => 1925,
                'role_id' => 1,
                'permission_id' => 97,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            50 => 
            array (
                'id' => 1926,
                'role_id' => 1,
                'permission_id' => 102,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            51 => 
            array (
                'id' => 1927,
                'role_id' => 1,
                'permission_id' => 103,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            52 => 
            array (
                'id' => 1928,
                'role_id' => 1,
                'permission_id' => 104,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            53 => 
            array (
                'id' => 1929,
                'role_id' => 1,
                'permission_id' => 105,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            54 => 
            array (
                'id' => 1930,
                'role_id' => 1,
                'permission_id' => 112,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            55 => 
            array (
                'id' => 1931,
                'role_id' => 1,
                'permission_id' => 113,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            56 => 
            array (
                'id' => 1932,
                'role_id' => 1,
                'permission_id' => 114,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            57 => 
            array (
                'id' => 1933,
                'role_id' => 1,
                'permission_id' => 115,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            58 => 
            array (
                'id' => 1934,
                'role_id' => 1,
                'permission_id' => 120,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            59 => 
            array (
                'id' => 1935,
                'role_id' => 1,
                'permission_id' => 121,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            60 => 
            array (
                'id' => 1936,
                'role_id' => 1,
                'permission_id' => 122,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            61 => 
            array (
                'id' => 1937,
                'role_id' => 1,
                'permission_id' => 123,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            62 => 
            array (
                'id' => 1938,
                'role_id' => 1,
                'permission_id' => 128,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            63 => 
            array (
                'id' => 1939,
                'role_id' => 1,
                'permission_id' => 129,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            64 => 
            array (
                'id' => 1940,
                'role_id' => 1,
                'permission_id' => 130,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            65 => 
            array (
                'id' => 1941,
                'role_id' => 1,
                'permission_id' => 131,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
            66 => 
            array (
                'id' => 1942,
                'role_id' => 1,
                'permission_id' => 133,
                'created_at' => '2023-02-20 13:02:51',
                'updated_at' => '2023-02-20 13:02:51',
            ),
        ));
        
        
    }
}