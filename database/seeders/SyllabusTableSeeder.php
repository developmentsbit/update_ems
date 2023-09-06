<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SyllabusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('syllabus')->delete();

        \DB::table('syllabus')->insert(array (
            0 =>
            array (
                'id' => 2,
                'class_id' => 4,
                'title' => 'ওয়েব ডিজাইন',
                'date' => '2023-06-21',
                'image' => 'syllabus_image/50684.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
