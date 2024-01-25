<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MarksDistributionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('marks_distributions')->delete();
        
        \DB::table('marks_distributions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'class_id' => 2,
                'exam_id' => 1,
                'group_id' => 6,
                'subject_type' => 1,
                'subject_id' => 1,
                'subject_part_id' => NULL,
                'subject_code' => '101-102',
                'mcq' => 30,
                'written' => 70,
                'practical' => 0,
                'count_asses' => 0,
                'total' => 100,
                'deleted_at' => NULL,
                'created_at' => '2023-12-26 13:00:42',
                'updated_at' => '2023-12-26 13:00:42',
            ),
            1 => 
            array (
                'id' => 2,
                'class_id' => 2,
                'exam_id' => 1,
                'group_id' => 6,
                'subject_type' => 1,
                'subject_id' => 4,
                'subject_part_id' => NULL,
                'subject_code' => '107-108',
                'mcq' => 30,
                'written' => 70,
                'practical' => 0,
                'count_asses' => 0,
                'total' => 100,
                'deleted_at' => NULL,
                'created_at' => '2023-12-26 16:22:50',
                'updated_at' => '2023-12-26 16:22:50',
            ),
            2 => 
            array (
                'id' => 3,
                'class_id' => 2,
                'exam_id' => 1,
                'group_id' => NULL,
                'subject_type' => 1,
                'subject_id' => 2,
                'subject_part_id' => NULL,
                'subject_code' => '101-102',
                'mcq' => 25,
                'written' => 50,
                'practical' => 25,
                'count_asses' => 0,
                'total' => 100,
                'deleted_at' => NULL,
                'created_at' => '2024-01-16 12:44:12',
                'updated_at' => '2024-01-16 12:44:12',
            ),
        ));
        
        
    }
}