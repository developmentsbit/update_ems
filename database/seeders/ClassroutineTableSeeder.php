<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClassroutineTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('classroutine')->delete();

        \DB::table('classroutine')->insert(array (
            0 =>
            array (
                'id' => 2,
                'class_id' => 4,
                'title' => 'Test',
                'date' => '2023-06-14',
                'image' => 'classroutine_image/25443.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
