<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VideogallerysTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('videogallerys')->delete();
        
        \DB::table('videogallerys')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'test',
                'linkurl' => 'https://www.youtube-nocookie.com/embed/ZZpp4WMokZ0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}