<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AcademiccalenderTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('academiccalender')->delete();
        
        \DB::table('academiccalender')->insert(array (
            0 => 
            array (
                'id' => 2,
                'date' => '2023-06-13',
                'title' => 'Academic Calender 2023',
                'title_bn' => 'একাডেমিক ক্যালেন্ডার 2023',
                'image' => 'academiccalender_image/67289.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}