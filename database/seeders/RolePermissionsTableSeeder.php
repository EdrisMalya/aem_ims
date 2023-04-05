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
                'id' => 2600,
                'role_id' => 1,
                'permission_id' => 4,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            1 => 
            array (
                'id' => 2601,
                'role_id' => 1,
                'permission_id' => 5,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            2 => 
            array (
                'id' => 2602,
                'role_id' => 1,
                'permission_id' => 3,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            3 => 
            array (
                'id' => 2603,
                'role_id' => 1,
                'permission_id' => 2,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            4 => 
            array (
                'id' => 2604,
                'role_id' => 1,
                'permission_id' => 6,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            5 => 
            array (
                'id' => 2605,
                'role_id' => 1,
                'permission_id' => 9,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            6 => 
            array (
                'id' => 2606,
                'role_id' => 1,
                'permission_id' => 11,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            7 => 
            array (
                'id' => 2607,
                'role_id' => 1,
                'permission_id' => 10,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            8 => 
            array (
                'id' => 2608,
                'role_id' => 1,
                'permission_id' => 12,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            9 => 
            array (
                'id' => 2609,
                'role_id' => 1,
                'permission_id' => 15,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            10 => 
            array (
                'id' => 2610,
                'role_id' => 1,
                'permission_id' => 16,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            11 => 
            array (
                'id' => 2611,
                'role_id' => 1,
                'permission_id' => 17,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            12 => 
            array (
                'id' => 2612,
                'role_id' => 1,
                'permission_id' => 18,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            13 => 
            array (
                'id' => 2613,
                'role_id' => 1,
                'permission_id' => 19,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            14 => 
            array (
                'id' => 2614,
                'role_id' => 1,
                'permission_id' => 21,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            15 => 
            array (
                'id' => 2615,
                'role_id' => 1,
                'permission_id' => 22,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            16 => 
            array (
                'id' => 2616,
                'role_id' => 1,
                'permission_id' => 23,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            17 => 
            array (
                'id' => 2617,
                'role_id' => 1,
                'permission_id' => 14,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            18 => 
            array (
                'id' => 2618,
                'role_id' => 1,
                'permission_id' => 26,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            19 => 
            array (
                'id' => 2619,
                'role_id' => 1,
                'permission_id' => 27,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            20 => 
            array (
                'id' => 2620,
                'role_id' => 1,
                'permission_id' => 28,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            21 => 
            array (
                'id' => 2621,
                'role_id' => 1,
                'permission_id' => 29,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            22 => 
            array (
                'id' => 2622,
                'role_id' => 1,
                'permission_id' => 30,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            23 => 
            array (
                'id' => 2623,
                'role_id' => 1,
                'permission_id' => 32,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            24 => 
            array (
                'id' => 2624,
                'role_id' => 1,
                'permission_id' => 1,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            25 => 
            array (
                'id' => 2625,
                'role_id' => 1,
                'permission_id' => 13,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            26 => 
            array (
                'id' => 2626,
                'role_id' => 1,
                'permission_id' => 33,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            27 => 
            array (
                'id' => 2627,
                'role_id' => 1,
                'permission_id' => 34,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            28 => 
            array (
                'id' => 2628,
                'role_id' => 1,
                'permission_id' => 35,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            29 => 
            array (
                'id' => 2629,
                'role_id' => 1,
                'permission_id' => 37,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            30 => 
            array (
                'id' => 2630,
                'role_id' => 1,
                'permission_id' => 36,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            31 => 
            array (
                'id' => 2631,
                'role_id' => 1,
                'permission_id' => 38,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            32 => 
            array (
                'id' => 2632,
                'role_id' => 1,
                'permission_id' => 39,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            33 => 
            array (
                'id' => 2633,
                'role_id' => 1,
                'permission_id' => 40,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            34 => 
            array (
                'id' => 2634,
                'role_id' => 1,
                'permission_id' => 41,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            35 => 
            array (
                'id' => 2635,
                'role_id' => 1,
                'permission_id' => 70,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            36 => 
            array (
                'id' => 2636,
                'role_id' => 1,
                'permission_id' => 75,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            37 => 
            array (
                'id' => 2637,
                'role_id' => 1,
                'permission_id' => 76,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            38 => 
            array (
                'id' => 2638,
                'role_id' => 1,
                'permission_id' => 77,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            39 => 
            array (
                'id' => 2639,
                'role_id' => 1,
                'permission_id' => 78,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            40 => 
            array (
                'id' => 2640,
                'role_id' => 1,
                'permission_id' => 83,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            41 => 
            array (
                'id' => 2641,
                'role_id' => 1,
                'permission_id' => 84,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            42 => 
            array (
                'id' => 2642,
                'role_id' => 1,
                'permission_id' => 86,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            43 => 
            array (
                'id' => 2643,
                'role_id' => 1,
                'permission_id' => 85,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            44 => 
            array (
                'id' => 2644,
                'role_id' => 1,
                'permission_id' => 91,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            45 => 
            array (
                'id' => 2645,
                'role_id' => 1,
                'permission_id' => 92,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            46 => 
            array (
                'id' => 2646,
                'role_id' => 1,
                'permission_id' => 94,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            47 => 
            array (
                'id' => 2647,
                'role_id' => 1,
                'permission_id' => 93,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            48 => 
            array (
                'id' => 2648,
                'role_id' => 1,
                'permission_id' => 96,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            49 => 
            array (
                'id' => 2649,
                'role_id' => 1,
                'permission_id' => 97,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            50 => 
            array (
                'id' => 2650,
                'role_id' => 1,
                'permission_id' => 102,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            51 => 
            array (
                'id' => 2651,
                'role_id' => 1,
                'permission_id' => 103,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            52 => 
            array (
                'id' => 2652,
                'role_id' => 1,
                'permission_id' => 104,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            53 => 
            array (
                'id' => 2653,
                'role_id' => 1,
                'permission_id' => 105,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            54 => 
            array (
                'id' => 2654,
                'role_id' => 1,
                'permission_id' => 112,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            55 => 
            array (
                'id' => 2655,
                'role_id' => 1,
                'permission_id' => 113,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            56 => 
            array (
                'id' => 2656,
                'role_id' => 1,
                'permission_id' => 114,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            57 => 
            array (
                'id' => 2657,
                'role_id' => 1,
                'permission_id' => 115,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            58 => 
            array (
                'id' => 2658,
                'role_id' => 1,
                'permission_id' => 120,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            59 => 
            array (
                'id' => 2659,
                'role_id' => 1,
                'permission_id' => 121,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            60 => 
            array (
                'id' => 2660,
                'role_id' => 1,
                'permission_id' => 122,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            61 => 
            array (
                'id' => 2661,
                'role_id' => 1,
                'permission_id' => 123,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            62 => 
            array (
                'id' => 2662,
                'role_id' => 1,
                'permission_id' => 128,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            63 => 
            array (
                'id' => 2663,
                'role_id' => 1,
                'permission_id' => 129,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            64 => 
            array (
                'id' => 2664,
                'role_id' => 1,
                'permission_id' => 130,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            65 => 
            array (
                'id' => 2665,
                'role_id' => 1,
                'permission_id' => 131,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            66 => 
            array (
                'id' => 2666,
                'role_id' => 1,
                'permission_id' => 133,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            67 => 
            array (
                'id' => 2667,
                'role_id' => 1,
                'permission_id' => 134,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            68 => 
            array (
                'id' => 2668,
                'role_id' => 1,
                'permission_id' => 135,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            69 => 
            array (
                'id' => 2669,
                'role_id' => 1,
                'permission_id' => 136,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            70 => 
            array (
                'id' => 2670,
                'role_id' => 1,
                'permission_id' => 137,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            71 => 
            array (
                'id' => 2671,
                'role_id' => 1,
                'permission_id' => 143,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            72 => 
            array (
                'id' => 2672,
                'role_id' => 1,
                'permission_id' => 142,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            73 => 
            array (
                'id' => 2673,
                'role_id' => 1,
                'permission_id' => 144,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            74 => 
            array (
                'id' => 2674,
                'role_id' => 1,
                'permission_id' => 145,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            75 => 
            array (
                'id' => 2675,
                'role_id' => 1,
                'permission_id' => 150,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            76 => 
            array (
                'id' => 2676,
                'role_id' => 1,
                'permission_id' => 151,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            77 => 
            array (
                'id' => 2677,
                'role_id' => 1,
                'permission_id' => 152,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            78 => 
            array (
                'id' => 2678,
                'role_id' => 1,
                'permission_id' => 153,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
            79 => 
            array (
                'id' => 2679,
                'role_id' => 1,
                'permission_id' => 154,
                'created_at' => '2023-04-04 19:18:30',
                'updated_at' => '2023-04-04 19:18:30',
            ),
        ));
        
        
    }
}