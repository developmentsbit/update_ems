<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubjectPartsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('subject_parts')->delete();
        
        \DB::table('subject_parts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'class_id' => 2,
                'group_id' => 6,
                'exam_type_id' => 1,
                'subject_id' => 3,
                'subject_type' => 1,
                'part_name' => '1st',
                'part_name_bn' => '১ম',
                'part_code' => '301',
                'order_by' => 1,
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => '2023-12-26 13:00:04',
                'updated_at' => '2023-12-26 13:00:04',
            ),
        ));
        
        
    }
}