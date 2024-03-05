<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentInformationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        

        \DB::table('student_informations')->delete();
        
        
        
    }
}