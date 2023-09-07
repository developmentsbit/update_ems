<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuggestionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suggestion')->delete();
        
        \DB::table('suggestion')->insert(array (
            0 => 
            array (
                'id' => 2,
                'class_id' => 2,
                'title' => 'test',
                'title_bn' => 'টেস্ট',
                'date' => '2023-06-21',
                'image' => 'suggestion_image/60386.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}