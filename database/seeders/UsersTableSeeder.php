<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Super Admin',
                'email' => 'super@admin.com',
                'mobile' => NULL,
                'dob' => NULL,
                'picture' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$biJDn4uk1HvEmeDEYyRaQOzjjanCuZpll91Q3FzrGkCJXszQIXAIa',
                'deleted_by' => NULL,
                'status' => 1,
                'deleted_at' => NULL,
                'remember_token' => NULL,
                'created_at' => '2023-03-18 19:07:28',
                'updated_at' => '2023-03-20 18:18:31',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'mobile' => NULL,
                'dob' => NULL,
                'picture' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$KExq7d21rgaxmtBELU/JUuLrDXr7Xcl9FpliGZkJWU.3xO0zYZXUm',
                'deleted_by' => 1,
                'status' => 1,
                'deleted_at' => '2023-06-15 07:58:52',
                'remember_token' => NULL,
                'created_at' => '2023-03-18 19:07:28',
                'updated_at' => '2023-06-15 07:58:52',
            ),
        ));
        
        
    }
}