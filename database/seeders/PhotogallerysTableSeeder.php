<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PhotogallerysTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('photogallerys')->delete();
        
        \DB::table('photogallerys')->insert(array (
            0 => 
            array (
                'id' => 8,
                'title' => '2',
                'image' => 'photogallerys_image/22730.jpg',
                'slider' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 9,
                'title' => '3',
                'image' => 'photogallerys_image/49218.jpg',
                'slider' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 10,
                'title' => '3',
                'image' => 'photogallerys_image/38324.jpg',
                'slider' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}