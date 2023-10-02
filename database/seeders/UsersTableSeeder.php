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
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // enable foreign key constraints

        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'created_at' => '2023-03-18 19:07:28',
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'dob' => NULL,
                'email' => 'super@admin.com',
                'email_verified_at' => NULL,
                'id' => 1,
                'mobile' => NULL,
                'name' => 'Super Admin',
                'password' => '$2y$10$tsTwmoEc9KOp4ie.ZZIXaeU2e/hIZW5kBb/xFhUr0I6suCc5tsefy',
                'picture' => NULL,
                'remember_token' => NULL,
                'status' => 1,
                'updated_at' => '2023-10-02 10:05:49',
            ),
            1 =>
            array (
                'created_at' => '2023-03-18 19:07:28',
                'deleted_at' => '2023-10-02 10:07:16',
                'deleted_by' => NULL,
                'dob' => NULL,
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'id' => 2,
                'mobile' => NULL,
                'name' => 'Admin',
                'password' => '$2y$10$avqu.cFfoARivdEGFj8etusRTELEB8C7It8G9hyoYf8pfJ8Wc7FC2',
                'picture' => NULL,
                'remember_token' => NULL,
                'status' => 1,
                'updated_at' => '2023-10-02 10:07:16',
            ),
            2 =>
            array (
                'created_at' => '2023-10-02 10:08:19',
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'dob' => '01-01-2011',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'id' => 3,
                'mobile' => '+8800000000',
                'name' => 'Admin',
                'password' => '$2y$10$ABjRPwk3o556BY2LHNUaMu2HR//UWOSIHlCAAWjncBoNOTUZER/yK',
                'picture' => '1150004412.png',
                'remember_token' => NULL,
                'status' => 1,
                'updated_at' => '2023-10-02 10:08:19',
            ),
        ));


    }
}
