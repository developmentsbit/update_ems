<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdmissioninfoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admissioninfo')->delete();
        
        \DB::table('admissioninfo')->insert(array (
            0 => 
            array (
                'id' => 2,
                'date' => '2023-06-13',
                'type' => '2',
                'title' => 'Web Design',
                'title_bn' => 'ওয়েব ডিজাইন',
                'image' => 'admissioninfo_image/39093.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}