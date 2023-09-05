<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AddclassTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('addclass')->delete();
        
        \DB::table('addclass')->insert(array (
            0 => 
            array (
                'id' => 2,
                'class_name' => 'Eleven',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'class_name' => 'Twelve',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'class_name' => 'Honours',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'class_name' => 'Master\'s',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'class_name' => 'BBA',
                'status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}