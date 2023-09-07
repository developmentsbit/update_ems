<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExamroutineTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('examroutine')->delete();
        
        \DB::table('examroutine')->insert(array (
            0 => 
            array (
                'id' => 2,
                'class_id' => 2,
                'title' => 'Web Design',
                'title_bn' => 'ওয়েব ডিজাইন',
                'date' => '2023-06-21',
                'image' => 'examroutine_image/13321.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}