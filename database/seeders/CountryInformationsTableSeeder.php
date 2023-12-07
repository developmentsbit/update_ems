<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountryInformationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('country_informations')->delete();
        
        \DB::table('country_informations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'country_name' => 'বাংলাদেশ',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => '2022-07-26 10:28:35',
                'updated_at' => '2022-07-26 10:28:35',
            ),
        ));
        
        
    }
}