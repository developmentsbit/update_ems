<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('department')->delete();
        
        
        
    }
}