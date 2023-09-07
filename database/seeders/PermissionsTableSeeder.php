<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Dashboard',
                'parent' => 'Dashboard',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-19 16:25:23',
                'updated_at' => '2023-03-19 16:25:23',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'User List',
                'parent' => 'User',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-19 18:08:09',
                'updated_at' => '2023-03-19 18:08:09',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'User Create',
                'parent' => 'User',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-19 18:08:09',
                'updated_at' => '2023-03-19 18:08:09',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'User Edit',
                'parent' => 'User',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-19 18:08:09',
                'updated_at' => '2023-03-19 18:08:09',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'User Delete',
                'parent' => 'User',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-19 18:08:09',
                'updated_at' => '2023-03-19 18:08:09',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'User View',
                'parent' => 'User',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-19 18:08:09',
                'updated_at' => '2023-03-19 18:08:09',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'User Print',
                'parent' => 'User',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-19 18:08:09',
                'updated_at' => '2023-03-19 18:08:09',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'User Restore',
                'parent' => 'User',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-19 18:08:09',
                'updated_at' => '2023-03-19 18:08:09',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Role List',
                'parent' => 'Role',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-19 18:17:22',
                'updated_at' => '2023-03-19 18:17:22',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Role Create',
                'parent' => 'Role',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-19 18:17:22',
                'updated_at' => '2023-03-19 18:17:22',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Role Edit',
                'parent' => 'Role',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-19 18:17:22',
                'updated_at' => '2023-03-19 18:17:22',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Role Delete',
                'parent' => 'Role',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-19 18:17:22',
                'updated_at' => '2023-03-19 18:17:22',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Role View',
                'parent' => 'Role',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-19 18:17:22',
                'updated_at' => '2023-03-19 18:17:22',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Role Print',
                'parent' => 'Role',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-19 18:17:22',
                'updated_at' => '2023-03-19 18:17:22',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Role Restore',
                'parent' => 'Role',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-19 18:17:22',
                'updated_at' => '2023-03-19 18:17:22',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Role Permission',
                'parent' => 'Role',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-19 18:17:22',
                'updated_at' => '2023-03-19 18:17:22',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 18,
                'name' => 'Apps Information List',
                'parent' => 'Apps Information',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-29 04:28:32',
                'updated_at' => '2023-03-29 04:28:32',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 19,
                'name' => 'Apps Information Create',
                'parent' => 'Apps Information',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-29 04:28:32',
                'updated_at' => '2023-03-29 04:28:32',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 20,
                'name' => 'Apps Information Edit',
                'parent' => 'Apps Information',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-29 04:28:32',
                'updated_at' => '2023-03-29 04:28:32',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 21,
                'name' => 'Apps Information Delete',
                'parent' => 'Apps Information',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-29 04:28:32',
                'updated_at' => '2023-03-29 04:28:32',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 22,
                'name' => 'Apps Information View',
                'parent' => 'Apps Information',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-29 04:28:32',
                'updated_at' => '2023-03-29 04:28:32',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 23,
                'name' => 'Apps Information Print',
                'parent' => 'Apps Information',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-29 04:28:32',
                'updated_at' => '2023-03-29 04:28:32',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 24,
                'name' => 'Apps Information Edit_history',
                'parent' => 'Apps Information',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-29 04:28:32',
                'updated_at' => '2023-03-29 04:28:32',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 27,
                'name' => 'About Us Create',
                'parent' => 'About Us',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-29 04:35:23',
                'updated_at' => '2023-03-29 04:35:23',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 28,
                'name' => 'About Us Edit',
                'parent' => 'About Us',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-29 04:35:23',
                'updated_at' => '2023-03-29 04:35:23',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 29,
                'name' => 'About Us Delete',
                'parent' => 'About Us',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-29 04:35:23',
                'updated_at' => '2023-03-29 04:35:23',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 30,
                'name' => 'About Us View',
                'parent' => 'About Us',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-29 04:35:23',
                'updated_at' => '2023-03-29 04:35:23',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 31,
                'name' => 'About Us Print',
                'parent' => 'About Us',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-29 04:35:23',
                'updated_at' => '2023-03-29 04:35:23',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 32,
                'name' => 'About Us Edit_history',
                'parent' => 'About Us',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-29 04:35:23',
                'updated_at' => '2023-03-29 04:35:23',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 41,
                'name' => 'Website Info Edit_history',
                'parent' => 'Website Info',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-29 09:02:52',
                'updated_at' => '2023-03-29 09:02:52',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 49,
                'name' => 'Photo Gallery Edit_history',
                'parent' => 'Photo Gallery',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-03-30 05:45:25',
                'updated_at' => '2023-03-30 05:45:25',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 56,
                'name' => 'Services Edit_history',
                'parent' => 'Services',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-01 06:32:18',
                'updated_at' => '2023-04-01 06:32:18',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 64,
                'name' => 'Project Info List',
                'parent' => 'Project Info',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-01 08:52:40',
                'updated_at' => '2023-04-01 08:52:40',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 65,
                'name' => 'Project Info Create',
                'parent' => 'Project Info',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-01 08:52:40',
                'updated_at' => '2023-04-01 08:52:40',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 66,
                'name' => 'Project Info Edit',
                'parent' => 'Project Info',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-01 08:52:40',
                'updated_at' => '2023-04-01 08:52:40',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 67,
                'name' => 'Project Info Delete',
                'parent' => 'Project Info',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-01 08:52:40',
                'updated_at' => '2023-04-01 08:52:40',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 68,
                'name' => 'Project Info View',
                'parent' => 'Project Info',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-01 08:52:40',
                'updated_at' => '2023-04-01 08:52:40',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 69,
                'name' => 'Project Info Print',
                'parent' => 'Project Info',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-01 08:52:40',
                'updated_at' => '2023-04-01 08:52:40',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 70,
                'name' => 'Project Info Edit_history',
                'parent' => 'Project Info',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-01 08:52:40',
                'updated_at' => '2023-04-01 08:52:40',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 71,
                'name' => 'Project Category List',
                'parent' => 'Project Category',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-01 08:53:23',
                'updated_at' => '2023-04-01 08:53:23',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 72,
                'name' => 'Project Category Create',
                'parent' => 'Project Category',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-01 08:53:23',
                'updated_at' => '2023-04-01 08:53:23',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 73,
                'name' => 'Project Category Edit',
                'parent' => 'Project Category',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-01 08:53:23',
                'updated_at' => '2023-04-01 08:53:23',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 74,
                'name' => 'Project Category Delete',
                'parent' => 'Project Category',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-01 08:53:23',
                'updated_at' => '2023-04-01 08:53:23',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 75,
                'name' => 'Project Category View',
                'parent' => 'Project Category',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-01 08:53:23',
                'updated_at' => '2023-04-01 08:53:23',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 76,
                'name' => 'Project Category Print',
                'parent' => 'Project Category',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-01 08:53:23',
                'updated_at' => '2023-04-01 08:53:23',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 77,
                'name' => 'Project Category Edit_history',
                'parent' => 'Project Category',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-01 08:53:23',
                'updated_at' => '2023-04-01 08:53:23',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 91,
                'name' => 'Project Information Edit_history',
                'parent' => 'Project Information',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-01 10:15:03',
                'updated_at' => '2023-04-01 10:15:03',
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 98,
                'name' => 'Testimonial Edit_history',
                'parent' => 'Testimonial',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-02 05:48:12',
                'updated_at' => '2023-04-02 05:48:12',
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 113,
                'name' => 'Our Team Edit_history',
                'parent' => 'Our Team',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-03 06:46:32',
                'updated_at' => '2023-04-03 06:46:32',
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => 114,
                'name' => 'Menu List',
                'parent' => 'Menu',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-03 10:39:32',
                'updated_at' => '2023-04-03 10:39:32',
                'deleted_at' => NULL,
            ),
            50 => 
            array (
                'id' => 115,
                'name' => 'Menu Create',
                'parent' => 'Menu',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-03 10:39:32',
                'updated_at' => '2023-04-03 10:39:32',
                'deleted_at' => NULL,
            ),
            51 => 
            array (
                'id' => 116,
                'name' => 'Menu Edit',
                'parent' => 'Menu',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-03 10:39:32',
                'updated_at' => '2023-04-03 10:39:32',
                'deleted_at' => NULL,
            ),
            52 => 
            array (
                'id' => 117,
                'name' => 'Menu Delete',
                'parent' => 'Menu',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-03 10:39:32',
                'updated_at' => '2023-04-03 10:39:32',
                'deleted_at' => NULL,
            ),
            53 => 
            array (
                'id' => 118,
                'name' => 'Menu View',
                'parent' => 'Menu',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-03 10:39:32',
                'updated_at' => '2023-04-03 10:39:32',
                'deleted_at' => NULL,
            ),
            54 => 
            array (
                'id' => 119,
                'name' => 'Menu Deleted_list',
                'parent' => 'Menu',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-03 10:39:32',
                'updated_at' => '2023-04-03 10:39:32',
                'deleted_at' => NULL,
            ),
            55 => 
            array (
                'id' => 120,
                'name' => 'Menu Restore',
                'parent' => 'Menu',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-03 10:39:32',
                'updated_at' => '2023-04-03 10:39:32',
                'deleted_at' => NULL,
            ),
            56 => 
            array (
                'id' => 121,
                'name' => 'Menu Permanent_delete',
                'parent' => 'Menu',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-03 10:39:32',
                'updated_at' => '2023-04-03 10:39:32',
                'deleted_at' => NULL,
            ),
            57 => 
            array (
                'id' => 128,
                'name' => 'Member Edit_history',
                'parent' => 'Member',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-05 07:01:18',
                'updated_at' => '2023-04-05 07:01:18',
                'deleted_at' => NULL,
            ),
            58 => 
            array (
                'id' => 129,
                'name' => 'Member Deleted_list',
                'parent' => 'Member',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-05 07:01:18',
                'updated_at' => '2023-04-05 07:01:18',
                'deleted_at' => NULL,
            ),
            59 => 
            array (
                'id' => 131,
                'name' => 'Member Permanent_delete',
                'parent' => 'Member',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-04-05 07:01:18',
                'updated_at' => '2023-04-05 07:01:18',
                'deleted_at' => NULL,
            ),
            60 => 
            array (
                'id' => 132,
                'name' => 'Pages List',
                'parent' => 'Pages',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-11 13:35:49',
                'updated_at' => '2023-06-11 13:35:49',
                'deleted_at' => NULL,
            ),
            61 => 
            array (
                'id' => 133,
                'name' => 'Principle List',
                'parent' => 'Principle',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-11 13:38:49',
                'updated_at' => '2023-06-11 13:38:49',
                'deleted_at' => NULL,
            ),
            62 => 
            array (
                'id' => 134,
                'name' => 'Photo Gallary List',
                'parent' => 'Photo Gallary',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-11 13:54:53',
                'updated_at' => '2023-06-11 13:54:53',
                'deleted_at' => NULL,
            ),
            63 => 
            array (
                'id' => 135,
                'name' => 'Video Gallary List',
                'parent' => 'Video Gallary',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-11 13:55:31',
                'updated_at' => '2023-06-11 13:55:31',
                'deleted_at' => NULL,
            ),
            64 => 
            array (
                'id' => 136,
                'name' => 'Notices List',
                'parent' => 'Notices',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-11 14:02:50',
                'updated_at' => '2023-06-11 14:02:50',
                'deleted_at' => NULL,
            ),
            65 => 
            array (
                'id' => 137,
                'name' => 'Link List',
                'parent' => 'Link',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-11 14:09:57',
                'updated_at' => '2023-06-11 14:09:57',
                'deleted_at' => NULL,
            ),
            66 => 
            array (
                'id' => 138,
                'name' => 'Add Members List',
                'parent' => 'Add Members',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-11 14:28:27',
                'updated_at' => '2023-06-11 14:28:27',
                'deleted_at' => NULL,
            ),
            67 => 
            array (
                'id' => 139,
                'name' => 'Academic Calender List',
                'parent' => 'Academic Calender',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-13 13:35:34',
                'updated_at' => '2023-06-13 13:35:34',
                'deleted_at' => NULL,
            ),
            68 => 
            array (
                'id' => 140,
                'name' => 'Class Routine List',
                'parent' => 'Class Routine',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-13 13:36:26',
                'updated_at' => '2023-06-13 13:36:26',
                'deleted_at' => NULL,
            ),
            69 => 
            array (
                'id' => 141,
                'name' => 'Holiday List List',
                'parent' => 'Holiday List',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-13 13:38:27',
                'updated_at' => '2023-06-13 13:38:27',
                'deleted_at' => NULL,
            ),
            70 => 
            array (
                'id' => 142,
                'name' => 'Prospects List',
                'parent' => 'Prospects',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-13 13:41:20',
                'updated_at' => '2023-06-13 13:41:20',
                'deleted_at' => NULL,
            ),
            71 => 
            array (
                'id' => 143,
                'name' => 'Admission Rules List',
                'parent' => 'Admission Rules',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-13 13:41:54',
                'updated_at' => '2023-06-13 13:41:54',
                'deleted_at' => NULL,
            ),
            72 => 
            array (
                'id' => 144,
                'name' => 'Admission Procedure List',
                'parent' => 'Admission Procedure',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-13 13:42:38',
                'updated_at' => '2023-06-13 13:42:38',
                'deleted_at' => NULL,
            ),
            73 => 
            array (
                'id' => 145,
                'name' => 'Admission Result List',
                'parent' => 'Admission Result',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-13 13:43:41',
                'updated_at' => '2023-06-13 13:43:41',
                'deleted_at' => NULL,
            ),
            74 => 
            array (
                'id' => 146,
                'name' => 'Exam Question List',
                'parent' => 'Exam Question',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-13 13:44:26',
                'updated_at' => '2023-06-13 13:44:26',
                'deleted_at' => NULL,
            ),
            75 => 
            array (
                'id' => 147,
                'name' => 'Admission Info. List',
                'parent' => 'Admission Info.',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-13 14:24:49',
                'updated_at' => '2023-06-13 14:24:49',
                'deleted_at' => NULL,
            ),
            76 => 
            array (
                'id' => 148,
                'name' => 'Add Class List',
                'parent' => 'Add Class',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-14 05:55:09',
                'updated_at' => '2023-06-14 05:55:09',
                'deleted_at' => NULL,
            ),
            77 => 
            array (
                'id' => 149,
                'name' => 'Add Group List',
                'parent' => 'Add Group',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-14 05:55:42',
                'updated_at' => '2023-06-14 05:55:42',
                'deleted_at' => NULL,
            ),
            78 => 
            array (
                'id' => 150,
                'name' => 'Add Section List',
                'parent' => 'Add Section',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-14 05:56:11',
                'updated_at' => '2023-06-14 05:56:11',
                'deleted_at' => NULL,
            ),
            79 => 
            array (
                'id' => 151,
                'name' => 'Exam Routine List',
                'parent' => 'Exam Routine',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-15 05:54:02',
                'updated_at' => '2023-06-15 05:54:02',
                'deleted_at' => NULL,
            ),
            80 => 
            array (
                'id' => 152,
                'name' => 'Syllabus List',
                'parent' => 'Syllabus',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-15 05:54:32',
                'updated_at' => '2023-06-15 05:54:32',
                'deleted_at' => NULL,
            ),
            81 => 
            array (
                'id' => 153,
                'name' => 'Lesson Plan List',
                'parent' => 'Lesson Plan',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-15 05:54:59',
                'updated_at' => '2023-06-15 05:54:59',
                'deleted_at' => NULL,
            ),
            82 => 
            array (
                'id' => 154,
                'name' => 'Suggestion List',
                'parent' => 'Suggestion',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-15 05:55:51',
                'updated_at' => '2023-06-15 05:55:51',
                'deleted_at' => NULL,
            ),
            83 => 
            array (
                'id' => 155,
                'name' => 'Department List',
                'parent' => 'Department',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-15 06:31:38',
                'updated_at' => '2023-06-15 06:31:38',
                'deleted_at' => NULL,
            ),
            84 => 
            array (
                'id' => 156,
                'name' => 'Teacher & Staff List',
                'parent' => 'Teacher & Staff',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-15 06:32:10',
                'updated_at' => '2023-06-15 06:32:10',
                'deleted_at' => NULL,
            ),
            85 => 
            array (
                'id' => 157,
                'name' => 'Website Setting',
                'parent' => 'Website Setting',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-18 05:29:49',
                'updated_at' => '2023-06-18 05:29:49',
                'deleted_at' => NULL,
            ),
            86 => 
            array (
                'id' => 158,
                'name' => 'View Admission Data List',
                'parent' => 'View Admission Data',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-27 09:20:56',
                'updated_at' => '2023-06-27 09:20:56',
                'deleted_at' => NULL,
            ),
            87 => 
            array (
                'id' => 159,
                'name' => 'View Admission Data View',
                'parent' => 'View Admission Data',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-06-27 09:20:56',
                'updated_at' => '2023-06-27 09:20:56',
                'deleted_at' => NULL,
            ),
            88 => 
            array (
                'id' => 160,
                'name' => 'Vice Principal Message List',
                'parent' => 'Vice Principal Message',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-07-16 05:09:11',
                'updated_at' => '2023-07-16 05:09:11',
                'deleted_at' => NULL,
            ),
            89 => 
            array (
                'id' => 161,
                'name' => 'Vice Principal Message Create',
                'parent' => 'Vice Principal Message',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-07-16 05:09:11',
                'updated_at' => '2023-07-16 05:09:11',
                'deleted_at' => NULL,
            ),
            90 => 
            array (
                'id' => 162,
                'name' => 'Vice Principal Message Edit',
                'parent' => 'Vice Principal Message',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-07-16 05:09:11',
                'updated_at' => '2023-07-16 05:09:11',
                'deleted_at' => NULL,
            ),
            91 => 
            array (
                'id' => 163,
                'name' => 'Vice Principal Message Delete',
                'parent' => 'Vice Principal Message',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-07-16 05:09:11',
                'updated_at' => '2023-07-16 05:09:11',
                'deleted_at' => NULL,
            ),
            92 => 
            array (
                'id' => 164,
                'name' => 'Vice Principal Message View',
                'parent' => 'Vice Principal Message',
                'guard_name' => 'web',
                'status' => 1,
                'created_at' => '2023-07-16 05:09:11',
                'updated_at' => '2023-07-16 05:09:11',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}