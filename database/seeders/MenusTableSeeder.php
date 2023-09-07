<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => NULL,
                'name' => 'Dashboard',
                'bn_name' => 'ড্যাশবোর্ড',
                'system_name' => 'Dashboard',
                'route_name' => 'dashboard',
                'icon' => 'uil-home-alt',
                'order_by' => 5,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-03-19 14:04:30',
                'updated_at' => '2023-06-14 05:56:11',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'name' => 'User Management',
                'bn_name' => 'ইউজার ম্যানেজমেন্ট',
                'system_name' => 'User Management',
                'route_name' => NULL,
                'icon' => NULL,
                'order_by' => 7,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-03-19 18:06:39',
                'updated_at' => '2023-06-14 05:56:11',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 2,
                'name' => 'User',
                'bn_name' => 'ইউজার',
                'system_name' => 'User',
                'route_name' => 'user.index',
                'icon' => NULL,
                'order_by' => 1,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-03-19 18:08:09',
                'updated_at' => '2023-03-31 18:10:57',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => NULL,
                'name' => 'Role Management',
                'bn_name' => 'রোল ম্যানেজমেন্ট',
                'system_name' => 'Role Management',
                'route_name' => NULL,
                'icon' => NULL,
                'order_by' => 8,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-03-19 18:14:26',
                'updated_at' => '2023-06-14 05:56:11',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 4,
                'name' => 'Role',
                'bn_name' => 'রোল',
                'system_name' => 'Role',
                'route_name' => 'role.index',
                'icon' => NULL,
                'order_by' => 1,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-03-19 18:17:21',
                'updated_at' => '2023-03-31 18:11:32',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 25,
                'parent_id' => NULL,
                'name' => 'Menu Management',
                'bn_name' => 'মেন্যু ম্যানেজমেন্ট',
                'system_name' => 'Menu Management',
                'route_name' => '',
                'icon' => NULL,
                'order_by' => 1,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-04-03 10:38:48',
                'updated_at' => '2023-04-03 10:38:48',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 26,
                'parent_id' => 25,
                'name' => 'Menu',
                'bn_name' => 'মেন্যু',
                'system_name' => 'Menu',
                'route_name' => 'menu.index',
                'icon' => NULL,
                'order_by' => 1,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-04-03 10:39:32',
                'updated_at' => '2023-04-03 10:39:32',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 27,
                'parent_id' => NULL,
                'name' => 'About Institute',
                'bn_name' => 'আমাদের সম্পর্কে',
                'system_name' => 'About Institute',
                'route_name' => NULL,
                'icon' => NULL,
                'order_by' => 12,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-11 13:35:23',
                'updated_at' => '2023-06-14 05:56:11',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 28,
                'parent_id' => 27,
                'name' => 'Pages',
                'bn_name' => 'পেইজ',
                'system_name' => 'Pages',
                'route_name' => 'pages.index',
                'icon' => NULL,
                'order_by' => 1,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-11 13:35:49',
                'updated_at' => '2023-06-11 13:36:35',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 29,
                'parent_id' => NULL,
                'name' => 'Administrator Info.',
                'bn_name' => 'প্রশাসনিক তথ্য',
                'system_name' => 'Administrator Info.',
                'route_name' => NULL,
                'icon' => NULL,
                'order_by' => 17,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-11 13:37:43',
                'updated_at' => '2023-06-15 05:53:10',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 30,
                'parent_id' => 29,
                'name' => 'Principle/President',
                'bn_name' => 'অধ্যক্ষ/সভাপতি',
                'system_name' => 'Principle',
                'route_name' => 'principle.index',
                'icon' => NULL,
                'order_by' => 1,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-11 13:38:49',
                'updated_at' => '2023-06-11 13:39:21',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 31,
                'parent_id' => NULL,
                'name' => 'Gallery',
                'bn_name' => 'গ্যালারি',
                'system_name' => 'Gallery',
                'route_name' => NULL,
                'icon' => NULL,
                'order_by' => 32,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-11 13:54:20',
                'updated_at' => '2023-06-27 09:20:02',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 32,
                'parent_id' => 31,
                'name' => 'Photo Gallary',
                'bn_name' => 'ফটো গ্যালারি',
                'system_name' => 'Photo Gallary',
                'route_name' => 'photogallerys.index',
                'icon' => NULL,
                'order_by' => 1,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-11 13:54:53',
                'updated_at' => '2023-06-11 13:54:53',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 33,
                'parent_id' => 31,
                'name' => 'Video Gallary',
                'bn_name' => 'ভিডিও গ্যালারি',
                'system_name' => 'Video Gallary',
                'route_name' => 'videogallerys.index',
                'icon' => NULL,
                'order_by' => 2,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-11 13:55:31',
                'updated_at' => '2023-06-11 13:55:31',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 34,
                'parent_id' => NULL,
                'name' => 'Notices',
                'bn_name' => 'নোটিশ',
                'system_name' => 'Notices',
                'route_name' => NULL,
                'icon' => NULL,
                'order_by' => 18,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-11 14:01:55',
                'updated_at' => '2023-06-15 05:53:10',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 35,
                'parent_id' => 34,
                'name' => 'Notices',
                'bn_name' => 'নোটিশ',
                'system_name' => 'Notices',
                'route_name' => 'notices.index',
                'icon' => NULL,
                'order_by' => 1,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-11 14:02:50',
                'updated_at' => '2023-06-11 14:02:50',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 36,
                'parent_id' => NULL,
                'name' => 'Useful Link',
                'bn_name' => 'লিংক',
                'system_name' => 'Useful Link',
                'route_name' => NULL,
                'icon' => NULL,
                'order_by' => 29,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-11 14:09:21',
                'updated_at' => '2023-06-27 09:20:02',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 37,
                'parent_id' => 36,
                'name' => 'Link',
                'bn_name' => 'লিংক',
                'system_name' => 'Link',
                'route_name' => 'usefullink.index',
                'icon' => NULL,
                'order_by' => 1,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-11 14:09:57',
                'updated_at' => '2023-06-11 14:09:57',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 38,
                'parent_id' => 29,
                'name' => 'Add Members',
                'bn_name' => 'সদস্য যোগ করুন',
                'system_name' => 'Add Members',
                'route_name' => 'members.index',
                'icon' => NULL,
                'order_by' => 3,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-11 14:28:27',
                'updated_at' => '2023-07-16 05:09:11',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 39,
                'parent_id' => NULL,
                'name' => 'Academic Info.',
                'bn_name' => 'একাডেমিক তথ্যসমূহ',
                'system_name' => 'Academic Info.',
                'route_name' => NULL,
                'icon' => NULL,
                'order_by' => 13,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-13 13:34:38',
                'updated_at' => '2023-06-14 05:56:11',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 40,
                'parent_id' => 39,
                'name' => 'Academic Calender',
                'bn_name' => 'শিক্ষা বর্ষপঞ্জি',
                'system_name' => 'Academic Calender',
                'route_name' => 'academiccalender.index',
                'icon' => NULL,
                'order_by' => 1,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-13 13:35:34',
                'updated_at' => '2023-06-13 13:35:34',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 41,
                'parent_id' => 39,
                'name' => 'Class Routine',
                'bn_name' => 'ক্লাস রুটিন',
                'system_name' => 'Class Routine',
                'route_name' => 'classroutine.index',
                'icon' => NULL,
                'order_by' => 2,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-13 13:36:26',
                'updated_at' => '2023-06-13 13:36:26',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 42,
                'parent_id' => 39,
                'name' => 'Holiday List',
                'bn_name' => 'ছুটির দিন',
                'system_name' => 'Holiday List',
                'route_name' => 'holidaylist.index',
                'icon' => NULL,
                'order_by' => 3,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-13 13:38:27',
                'updated_at' => '2023-06-13 13:38:27',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 49,
                'parent_id' => NULL,
                'name' => 'Admission Info.',
                'bn_name' => 'ভর্তি সংক্রান্ত তথ্য',
                'system_name' => 'Admission Info.',
                'route_name' => NULL,
                'icon' => NULL,
                'order_by' => 18,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-13 14:24:19',
                'updated_at' => '2023-06-15 05:53:10',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 50,
                'parent_id' => 49,
                'name' => 'Admission Info.',
                'bn_name' => 'ভর্তি সংক্রান্ত তথ্য',
                'system_name' => 'Admission Info.',
                'route_name' => 'admissioninfo.index',
                'icon' => NULL,
                'order_by' => 1,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-13 14:24:49',
                'updated_at' => '2023-06-13 14:24:49',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 51,
                'parent_id' => NULL,
                'name' => 'Class Info.',
                'bn_name' => 'শ্রেণী সম্পর্কিত তথ্য',
                'system_name' => 'Class Info.',
                'route_name' => NULL,
                'icon' => NULL,
                'order_by' => 19,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-14 05:54:43',
                'updated_at' => '2023-06-15 05:53:10',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 52,
                'parent_id' => 51,
                'name' => 'Add Class',
                'bn_name' => 'শ্রেণী যোগ করুন',
                'system_name' => 'Add Class',
                'route_name' => 'addclass.index',
                'icon' => NULL,
                'order_by' => 1,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-14 05:55:09',
                'updated_at' => '2023-06-14 05:55:09',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 53,
                'parent_id' => 51,
                'name' => 'Add Group',
                'bn_name' => 'গ্রুপ যোগ করুন',
                'system_name' => 'Add Group',
                'route_name' => 'addgroup.index',
                'icon' => NULL,
                'order_by' => 2,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-14 05:55:42',
                'updated_at' => '2023-06-14 05:55:42',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 54,
                'parent_id' => 51,
                'name' => 'Add Section',
                'bn_name' => 'বিভাগ যোগ করুন',
                'system_name' => 'Add Section',
                'route_name' => 'addsection.index',
                'icon' => NULL,
                'order_by' => 3,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-14 05:56:11',
                'updated_at' => '2023-06-14 06:28:09',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 55,
                'parent_id' => NULL,
                'name' => 'Exam Info',
                'bn_name' => 'পরীক্ষা সংক্রান্ত তথ্য',
                'system_name' => 'Exam Info',
                'route_name' => 'examinfo',
                'icon' => NULL,
                'order_by' => 16,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-15 05:53:10',
                'updated_at' => '2023-06-15 05:53:10',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 56,
                'parent_id' => 55,
                'name' => 'Exam Routine',
                'bn_name' => 'পরীক্ষার রুটিন',
                'system_name' => 'Exam Routine',
                'route_name' => 'examroutine.index',
                'icon' => NULL,
                'order_by' => 1,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-15 05:54:02',
                'updated_at' => '2023-06-15 05:54:02',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 57,
                'parent_id' => 55,
                'name' => 'Syllabus',
                'bn_name' => 'সিলেবাস',
                'system_name' => 'Syllabus',
                'route_name' => 'syllabus.index',
                'icon' => NULL,
                'order_by' => 2,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-15 05:54:32',
                'updated_at' => '2023-06-15 05:54:32',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 58,
                'parent_id' => 55,
                'name' => 'Lesson Plan',
                'bn_name' => 'পাঠ পরিকল্পনা',
                'system_name' => 'Lesson Plan',
                'route_name' => 'lessonplan.index',
                'icon' => NULL,
                'order_by' => 3,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-15 05:54:59',
                'updated_at' => '2023-06-15 05:54:59',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 59,
                'parent_id' => 55,
                'name' => 'Suggestion',
                'bn_name' => 'সাজেশন্স',
                'system_name' => 'Suggestion',
                'route_name' => 'suggestion.index',
                'icon' => NULL,
                'order_by' => 4,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-15 05:55:51',
                'updated_at' => '2023-06-15 05:55:51',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 60,
                'parent_id' => NULL,
                'name' => 'Teacher & Staff info.',
                'bn_name' => 'শিক্ষক - কর্মচারীদের তথ্য',
                'system_name' => 'Teacher & Staff info.',
                'route_name' => NULL,
                'icon' => NULL,
                'order_by' => 22,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-15 06:30:54',
                'updated_at' => '2023-06-18 05:29:49',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 61,
                'parent_id' => 60,
                'name' => 'Department',
                'bn_name' => 'বিভাগ যুক্ত করুন',
                'system_name' => 'Department',
                'route_name' => 'department.index',
                'icon' => NULL,
                'order_by' => 1,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-15 06:31:38',
                'updated_at' => '2023-06-15 06:31:38',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 62,
                'parent_id' => 60,
                'name' => 'Teacher & Staff',
                'bn_name' => 'শিক্ষক - কর্মচারী যুক্ত করুন',
                'system_name' => 'Teacher & Staff',
                'route_name' => 'teacherstaff.index',
                'icon' => NULL,
                'order_by' => 2,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-15 06:32:10',
                'updated_at' => '2023-06-15 06:32:10',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 63,
                'parent_id' => NULL,
                'name' => 'Website Setting',
                'bn_name' => 'সেটিংস',
                'system_name' => 'Website Setting',
                'route_name' => 'setting.create',
                'icon' => NULL,
                'order_by' => 51,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-18 05:29:49',
                'updated_at' => '2023-06-27 09:20:02',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 64,
                'parent_id' => NULL,
                'name' => 'Registration Info',
                'bn_name' => 'অ্যাডমিশন তথ্য',
                'system_name' => 'Admission Info',
                'route_name' => NULL,
                'icon' => NULL,
                'order_by' => 23,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-27 09:20:02',
                'updated_at' => '2023-07-16 12:15:34',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 65,
                'parent_id' => 64,
                'name' => 'View Admission Data',
                'bn_name' => 'অ্যাডমিশন তথ্য',
                'system_name' => 'View Admission Data',
                'route_name' => 'admission_info.index',
                'icon' => NULL,
                'order_by' => 1,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-06-27 09:20:55',
                'updated_at' => '2023-06-27 09:20:56',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 66,
                'parent_id' => 29,
                'name' => 'Vice Principal Message',
                'bn_name' => 'উপাধ্যক্ষ বার্তা',
                'system_name' => 'Vice Principal Message',
                'route_name' => 'vice_principal_message.index',
                'icon' => NULL,
                'order_by' => 2,
                'is_hidden' => 'No',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => NULL,
                'created_at' => '2023-07-16 05:09:11',
                'updated_at' => '2023-07-16 05:09:12',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}