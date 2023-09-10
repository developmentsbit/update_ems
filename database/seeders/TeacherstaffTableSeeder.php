<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeacherstaffTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('teacherstaff')->delete();
        
        \DB::table('teacherstaff')->insert(array (
            0 => 
            array (
                'id' => 142,
                'department_id' => NULL,
                'name' => 'এ.এম মোমেন হোসেন শিকদার',
                'designation' => 'হিসাব রক্ষক',
                'nid' => NULL,
                'dob' => NULL,
                'blood' => NULL,
                'religion' => 'Islam',
                'relationship' => 'Married',
                'father_name' => NULL,
                'mother_name' => NULL,
                'mobile' => '018186459831',
                'email' => 'fenigovcollege@yahoo.com',
                'join_date' => NULL,
                'mpo_date' => NULL,
                'present_address' => 'ফেনী',
                'parmanent_address' => 'ফেনী',
                'education' => '<p>&nbsp;Null</p>',
                'gender' => 'Male',
                'type' => '2',
                'status' => 1,
                'image' => 'public/otherimage/1757920985797310.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 143,
                'department_id' => NULL,
                'name' => 'মো : হাবিবুর রহমান',
                'designation' => 'মেকানিক কাম ইলেকট্রিশিয়ান',
                'nid' => NULL,
                'dob' => NULL,
                'blood' => NULL,
                'religion' => 'Islam',
                'relationship' => 'Married',
                'father_name' => NULL,
                'mother_name' => NULL,
                'mobile' => '01830074134',
                'email' => 'fenigovcollege@yahoo.com',
                'join_date' => NULL,
                'mpo_date' => NULL,
                'present_address' => 'ফেনী',
                'parmanent_address' => 'ফেনী',
                'education' => '<p>Null</p>',
                'gender' => 'Male',
                'type' => '2',
                'status' => 1,
                'image' => 'public/otherimage/1757921094961162.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 144,
                'department_id' => NULL,
                'name' => 'বাবুল চন্দ্র সাহা',
                'designation' => 'গ্রন্থাগারিক',
                'nid' => NULL,
                'dob' => NULL,
                'blood' => NULL,
                'religion' => 'Hindu',
                'relationship' => 'Married',
                'father_name' => NULL,
                'mother_name' => NULL,
                'mobile' => '01920821320',
                'email' => 'fenigovcollege@yahoo.com',
                'join_date' => NULL,
                'mpo_date' => NULL,
                'present_address' => 'ফেনী',
                'parmanent_address' => 'ফেনী',
                'education' => '<p>Null</p>',
                'gender' => 'Male',
                'type' => '2',
                'status' => 1,
                'image' => 'public/otherimage/1757921171282764.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}