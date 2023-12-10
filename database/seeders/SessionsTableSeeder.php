<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sessions')->delete();
        
        \DB::table('sessions')->insert(array (
            0 => 
            array (
                'created_at' => '2023-12-10 06:14:31',
                'id' => 3,
                'session' => '2018',
                'status' => 1,
                'updated_at' => '2023-12-10 06:14:31',
            ),
            1 => 
            array (
                'created_at' => '2023-12-10 06:14:41',
                'id' => 4,
                'session' => '2019',
                'status' => 1,
                'updated_at' => '2023-12-10 06:14:41',
            ),
            2 => 
            array (
                'created_at' => '2023-12-10 06:14:48',
                'id' => 5,
                'session' => '2020',
                'status' => 1,
                'updated_at' => '2023-12-10 06:14:48',
            ),
            3 => 
            array (
                'created_at' => '2023-12-10 06:14:57',
                'id' => 6,
                'session' => '2021',
                'status' => 1,
                'updated_at' => '2023-12-10 06:14:57',
            ),
            4 => 
            array (
                'created_at' => '2023-12-10 06:15:07',
                'id' => 7,
                'session' => '2022',
                'status' => 1,
                'updated_at' => '2023-12-10 06:15:07',
            ),
            5 => 
            array (
                'created_at' => '2023-12-10 06:15:15',
                'id' => 8,
                'session' => '2023',
                'status' => 1,
                'updated_at' => '2023-12-10 06:15:15',
            ),
        ));
        
        
    }
}