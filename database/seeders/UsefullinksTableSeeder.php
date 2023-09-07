<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsefullinksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('usefullinks')->delete();
        
        \DB::table('usefullinks')->insert(array (
            0 => 
            array (
                'id' => 2,
            'title' => 'বেসরকারি শিক্ষক নিবন্ধন ও প্রত্যয়ন কর্তৃপক্ষ (এনটিআরসিএ)',
                'linkurl' => 'http://www.ntrca.gov.bd',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'title' => 'মাধ্যমিক ও উচ্চশিক্ষা অধিদপ্তর',
                'linkurl' => 'http://www.dshe.gov.bd',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'title' => 'শিক্ষা মন্ত্রণালয়',
                'linkurl' => 'http://www.moedu.gov.bd',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'title' => 'কুমিল্লা বোর্ড',
                'linkurl' => 'http://comillaboard.portal.gov.bd/',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'title' => 'কারিগরি শিক্ষা বোর্ড',
                'linkurl' => 'http://www.bteb.gov.bd/',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'title' => 'জেলা শিক্ষা অফিস',
                'linkurl' => 'http://deo.dhaka.gov.bd/',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 8,
                'title' => 'জাতীয় বিশ্ববিদ্যালয়',
                'linkurl' => 'http://www.nu.ac.bd/',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 9,
                'title' => 'এইচ এস সি এডমিশন',
                'linkurl' => 'http://xiclassadmissiongovbd.com/',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}