<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HolidaylistTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('holidaylist')->delete();
        
        \DB::table('holidaylist')->insert(array (
            0 => 
            array (
                'id' => 1,
                'date' => '2023-06-13',
                'title' => 'Holiday List of 2023',
                'image' => 'holidaylist_image/81390.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}