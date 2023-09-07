<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NoticesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('notices')->delete();
        
        \DB::table('notices')->insert(array (
            0 => 
            array (
                'id' => 2,
                'type' => '2',
                'date' => '2023-06-11',
                'title' => 'Test',
                'title_bn' => 'টেস্ট',
                'details' => '<p>Test</p>',
                'details_bn' => '<p>টেস্ট<br></p>',
                'image' => 'notices_image/83611.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'type' => '1',
                'date' => '2023-06-21',
                'title' => 'দ্বাদশ শ্রেণির রসায়ন বিষয়ের ব্যবহারিক ক্লাস সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => 'দ্বাদশ শ্রেণির রসায়ন বিষয়ের ব্যবহারিক ক্লাস সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/4040.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'type' => '1',
                'date' => '2023-06-21',
                'title' => 'এইচএসসি পরীক্ষা ২০২৩ এর বিশেষ অনুমতিতে সুযোগ প্রাপ্ত শিক্ষার্থীদের ফরম পূরণের বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => 'এইচএসসি পরীক্ষা ২০২৩ এর বিশেষ অনুমতিতে সুযোগ প্রাপ্ত শিক্ষার্থীদের ফরম পূরণের বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/4204.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'type' => '1',
                'date' => '2023-06-21',
                'title' => '২০২০ সালের প্রিলিমিনারী টু মাস্টার্স পরীক্ষার ফরম পূরণের সময় বৃদ্ধি সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => '২০২০ সালের প্রিলিমিনারী টু মাস্টার্স পরীক্ষার ফরম পূরণের সময় বৃদ্ধি সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/1370.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'type' => '1',
                'date' => '2023-06-21',
                'title' => 'ওয়ান ব্যাংক লিমিটেড এর বৃত্তিপ্রাপ্ত শিক্ষার্থীদের বৃত্তি সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => 'ওয়ান ব্যাংক লিমিটেড এর বৃত্তিপ্রাপ্ত শিক্ষার্থীদের বৃত্তি সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/8721.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'type' => '1',
                'date' => '2023-06-21',
                'title' => 'শ্রেণি কার্যক্রম স্থগিত সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => 'শ্রেণি কার্যক্রম স্থগিত সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/4907.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 8,
                'type' => '1',
                'date' => '2023-07-01',
                'title' => 'দ্বাদশ শ্রেণির বিজ্ঞান বিভাগের রসায়ন বিষয়ের ব্যবহারিক ক্লাসের সময়সূচি',
                'title_bn' => NULL,
                'details' => 'দ্বাদশ শ্রেণির বিজ্ঞান বিভাগের রসায়ন বিষয়ের ব্যবহারিক ক্লাসের সময়সূচি',
                'details_bn' => NULL,
                'image' => 'notices_image/37294.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 9,
                'type' => '1',
                'date' => '2023-07-02',
                'title' => 'আমার চোখে বঙ্গবন্ধু বিষয়ে এক মিনিটব্যাপী ভিডিও চিত্র তৈরি সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => 'আমার চোখে বঙ্গবন্ধু বিষয়ে এক মিনিটব্যাপী ভিডিও চিত্র তৈরি সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/91552.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 10,
                'type' => '1',
                'date' => '2023-07-03',
                'title' => 'এইচএসসি পরীক্ষা ২০২৩ এর ফরম পূরণের বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => 'এইচএসসি পরীক্ষা ২০২৩ এর ফরম পূরণের বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/20328.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 11,
                'type' => '1',
                'date' => '2023-07-04',
                'title' => '২য় বর্ষ ডিগ্রি পাস ও সার্টিফিকেট কোর্স পরীক্ষা-২০২১ এর প্রবেশপত্র বিতরণ সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => '২য় বর্ষ ডিগ্রি পাস ও সার্টিফিকেট কোর্স পরীক্ষা-২০২১ এর প্রবেশপত্র বিতরণ সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/45715.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 12,
                'type' => '1',
                'date' => '2023-07-05',
                'title' => 'দ্বাদশ শ্রেণির নির্বাচনী পরীক্ষা-২০২৩ এর ফলাফল প্রকাশ সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => 'দ্বাদশ শ্রেণির নির্বাচনী পরীক্ষা-২০২৩ এর ফলাফল প্রকাশ সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/56728.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 13,
                'type' => '1',
                'date' => '2023-08-02',
            'title' => 'স্নাতক (সম্মান) ২য় বর্ষ (২০২০-২০২১) শিক্ষাবর্ষের সেশন ফি জমাদান সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => NULL,
                'details_bn' => NULL,
                'image' => 'notices_image/83429.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 14,
                'type' => '1',
                'date' => '2023-08-02',
            'title' => 'স্নাতক (পাস) ১ম বর্ষ নির্বাচনী পরীক্ষার্থীদের সতর্কীকরণ বিজ্ঞপ্তি',
                'title_bn' => NULL,
            'details' => 'স্নাতক (পাস) ১ম বর্ষ নির্বাচনী পরীক্ষার্থীদের সতর্কীকরণ বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/56078.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 15,
                'type' => '1',
                'date' => '2023-08-02',
                'title' => 'একাদশ শ্রেণির বার্ষিক পরীক্ষা- ২০২৩ এর পরীক্ষার সময়সূচি',
                'title_bn' => NULL,
                'details' => 'একাদশ শ্রেণির বার্ষিক পরীক্ষা- ২০২৩ এর পরীক্ষার সময়সূচি',
                'details_bn' => NULL,
                'image' => 'notices_image/14624.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 16,
                'type' => '1',
                'date' => '2023-08-02',
            'title' => '২০২২-২০২৩ শিক্ষাবর্ষে স্নাতক (পাস) শ্রেণিতে ফেনী সরকারি কলেজে প্রাথমিক আবেদন সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
            'details' => '২০২২-২০২৩ শিক্ষাবর্ষে স্নাতক (পাস) শ্রেণিতে ফেনী সরকারি কলেজে প্রাথমিক আবেদন সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/68754.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 17,
                'type' => '1',
                'date' => '2023-08-02',
                'title' => 'বীর মুক্তিযোদ্ধা শহীদ ক্যাপ্টেন শেখ কামাল এঁর ৭৪ তম জন্মবার্ষিকী উপলক্ষ্যে রচনা প্রতিযোগিতা সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => 'বীর মুক্তিযোদ্ধা শহীদ ক্যাপ্টেন শেখ কামাল এঁর ৭৪ তম জন্মবার্ষিকী উপলক্ষ্যে রচনা প্রতিযোগিতা সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/66270.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 18,
                'type' => '1',
                'date' => '2023-07-31',
            'title' => 'স্নাতক (পাস) ১ম বর্ষ নির্বাচনী পরীক্ষার্থীদের সতর্কীকরণ বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => NULL,
                'details_bn' => NULL,
                'image' => 'notices_image/32115.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 19,
                'type' => '1',
                'date' => '2023-08-01',
                'title' => 'একাদশ শ্রেণির বার্ষিক পরীক্ষা- ২০২৩ এর পরীক্ষার সময়সূচি',
                'title_bn' => NULL,
                'details' => NULL,
                'details_bn' => NULL,
                'image' => 'notices_image/58338.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 20,
                'type' => '1',
                'date' => '2023-08-02',
            'title' => '২০২২-২০২৩ শিক্ষাবর্ষে স্নাতক (পাস) শ্রেণিতে ফেনী সরকারি কলেজে প্রাথমিক আবেদন সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => NULL,
                'details_bn' => NULL,
                'image' => 'notices_image/66928.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 21,
                'type' => '1',
                'date' => '2023-08-02',
                'title' => 'বীর মুক্তিযোদ্ধা শহীদ ক্যাপ্টেন শেখ কামাল এঁর ৭৪ তম জন্মবার্ষিকী উপলক্ষ্যে রচনা প্রতিযোগিতা সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => NULL,
                'details_bn' => NULL,
                'image' => 'notices_image/20428.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 23,
                'type' => '1',
                'date' => '2023-08-02',
                'title' => 'এইচএসসি পরীক্ষা-২০২৩ এর বিশেষ অনুমতিতে ফরম পূরণ প্রসঙ্গে',
                'title_bn' => NULL,
                'details' => 'এইচএসসি পরীক্ষা-২০২৩ এর বিশেষ অনুমতিতে ফরম পূরণ প্রসঙ্গে',
                'details_bn' => NULL,
                'image' => 'notices_image/71945.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 24,
                'type' => '1',
                'date' => '2023-08-06',
            'title' => 'ডিগ্রি (পাস) ১ম বর্ষ ইনকোর্স পরীক্ষা-২০২৩ সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
            'details' => 'ডিগ্রি (পাস) ১ম বর্ষ ইনকোর্স পরীক্ষা-২০২৩ সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/88939.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 25,
                'type' => '1',
                'date' => '2023-08-08',
                'title' => '২০২৩ সালের উচ্চমাধ্যমিক পরীক্ষার্থীদের বার্ষিক মিলাদ, দোয়া মাহফিল ও প্রবেশপত্র বিতরণ সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => '২০২৩ সালের উচ্চমাধ্যমিক পরীক্ষার্থীদের বার্ষিক মিলাদ, দোয়া মাহফিল ও প্রবেশপত্র বিতরণ সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/11200.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 26,
                'type' => '1',
                'date' => '2023-08-09',
                'title' => '২০২৩-২০২৪ শিক্ষাবর্ষে একাদশ শ্রেণিতে ভর্তি বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => '২০২৩-২০২৪ শিক্ষাবর্ষে একাদশ শ্রেণিতে ভর্তি বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/63353.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 27,
                'type' => '1',
                'date' => '2023-08-13',
                'title' => 'একাদশ শ্রেণির বার্ষিক পরীক্ষা- ২০২৩ এর সময়সূচি পরিবর্তন সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => 'একাদশ শ্রেণির বার্ষিক পরীক্ষা- ২০২৩ এর সময়সূচি পরিবর্তন সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/57393.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 28,
                'type' => '1',
                'date' => '2023-08-13',
                'title' => 'স্বাধীনতার মহান স্থপতি জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমানের ৪৮ তম শাহাদত বার্ষিকী ও জাতীয় শোক দিবস-২০২৩ যথাযথ মর্যাদায় পালন করার লক্ষ্যে ফেনী সরকারি কলেজ কর্তৃক গৃহীত কর্মসূচিসমূহ',
                'title_bn' => NULL,
                'details' => 'স্বাধীনতার মহান স্থপতি জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমানের ৪৮ তম শাহাদত বার্ষিকী ও জাতীয় শোক দিবস-২০২৩ যথাযথ মর্যাদায় পালন করার লক্ষ্যে ফেনী সরকারি কলেজ কর্তৃক গৃহীত কর্মসূচিসমূহ',
                'details_bn' => NULL,
                'image' => 'notices_image/78326.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 29,
                'type' => '1',
                'date' => '2023-08-13',
                'title' => 'স্বাধীনতার মহান স্থপতি জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমানের ৪৮ তম শাহাদত বার্ষিকী ও জাতীয় শোক দিবস-২০২৩ উপলক্ষ্যে রচনা ও আবৃত্তি প্রতিযোগিতা সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => 'স্বাধীনতার মহান স্থপতি জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমানের ৪৮ তম শাহাদত বার্ষিকী ও জাতীয় শোক দিবস-২০২৩ উপলক্ষ্যে রচনা ও আবৃত্তি প্রতিযোগিতা সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/13259.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 30,
                'type' => '1',
                'date' => '2023-08-14',
                'title' => 'অ্যান্ড্রয়েড মোবাইল ফোন ব্যবহার নিষিদ্ধ সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => 'অ্যান্ড্রয়েড মোবাইল ফোন ব্যবহার নিষিদ্ধ সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/95544.jpeg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 31,
                'type' => '1',
                'date' => '2023-08-15',
                'title' => 'একাদশ শ্রেণির তথ্য ও যোগাযোগ প্রযুক্তি বিষয়ের পরীক্ষা অনিবার্য কারণবশত স্থগিত সংক্রান্ত বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => 'একাদশ শ্রেণির তথ্য ও যোগাযোগ প্রযুক্তি বিষয়ের পরীক্ষা অনিবার্য কারণবশত স্থগিত সংক্রান্ত বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/59782.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 32,
                'type' => '1',
                'date' => '2023-08-21',
                'title' => 'ডিগ্রী পাস ও সার্টিফিকেট কোর্স ৩য় বর্ষ পরীক্ষা-২০২১ ফরম পূরণ সংক্রান্ত বিশেষ বিজ্ঞপ্তি',
                'title_bn' => NULL,
                'details' => 'ডিগ্রী পাস ও সার্টিফিকেট কোর্স ৩য় বর্ষ পরীক্ষা-২০২১ ফরম পূরণ সংক্রান্ত বিশেষ বিজ্ঞপ্তি',
                'details_bn' => NULL,
                'image' => 'notices_image/61646.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 33,
                'type' => '1',
                'date' => '2023-09-07',
                'title' => 'Test',
                'title_bn' => 'টেস্ট',
                'details' => NULL,
                'details_bn' => NULL,
                'image' => 'notices_image/84804.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}