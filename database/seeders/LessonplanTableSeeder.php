<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LessonplanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lessonplan')->delete();
        
        \DB::table('lessonplan')->insert(array (
            0 => 
            array (
                'id' => 1,
                'class_id' => 2,
                'title' => 'ওয়েব ডিজাইন',
                'date' => '2023-06-15',
                'image' => 'lessonplan_image/63841.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}