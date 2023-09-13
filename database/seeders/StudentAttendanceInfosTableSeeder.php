<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentAttendanceInfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('student_attendance_infos')->delete();

        \DB::table('student_attendance_infos')->insert(array (
            0 =>
            array (
                'created_at' => NULL,
            'details' => 'বিস্তারিত তথ্য প্রদান করুন',
                'id' => 1,
                'image' => '1167197453.jpg',
                'title' => 'ফেনী সরকারী কলেজ শিক্ষা',
                'title_bn' => 'Feni Government College is a government',
                'updated_at' => NULL,
            ),
        ));


    }
}
