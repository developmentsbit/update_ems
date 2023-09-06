<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrinciplesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('principles')->delete();
        
        \DB::table('principles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => '1',
                'name' => 'মোঃ মোক্তার হোসেন',
                'details' => 'আমি খুবই আনন্দিত এটা জেনে যে, আমাদের প্রতিষ্ঠানে একটি ডায়নামিক ওয়েবসাইট আছে। এটা হলো প্রযুক্তিগত উন্নয়নের যুগ। তাই সময়ের দাবী মেটাতে ডায়নামিক ওয়েবসাইটের কোন বিকল্প নেই।ডায়নামিক ওয়েবসাইটের মাধ্যমে আমরা কলেজের বিভিন্ন বিষয়ে তাৎক্ষণিক সিদ্ধান্ত ও প্রাসঙ্গিক বিষয়াবলীর হালনাগাদ তথ্য জানতে পারছি। এ ওয়েবসাইটে আমাদের কলেজ প্রতিষ্ঠার ইতিহাস থেকে শুরু করে প্রত্যেক শিক্ষক, কর্মচারী ও শিক্ষার্থী সকলের বিস্তারিত তথ্য আছে। কলেজের দৈনন্দিন কর্মকান্ড বিশেষ করে শিক্ষার্থী সংশ্লিষ্ট বিভিন্ন বিজ্ঞপ্তি ও তাদের পরীক্ষার ফলাফল ইত্যাদি বিষয়ে তথ্য প্রকাশিত হয়ে থাকে। মাননীয় প্রধানমন্ত্রীর ভিশন-২০২১ এর সাথে একাত্বতা ঘোষণা করে প্রযুক্তিগত উন্নয়নের মধ্য দিয়েই আমরাও আমাদের প্রতিষ্ঠানটিকে উন্নয়নের লক্ষ্যে এগিয়ে নিতে চাই।',
                'image' => 'principle_image/8487.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'type' => '2',
                'name' => 'মোঃ শামসুল হক',
                'details' => 'এক বিংশ শতাব্দির চ্যালেঞ্জ মোকাবেলায় প্রথম সোপান হল শিক্ষা। সুশিক্ষা ছাড়া কোন জাতি উন্নতি লাভ করতে পারে না। শিক্ষার মাধ্যমেই তৈরি হয় সৎ, দেশপ্রেমিক ও মানবিক মূল্যবোধ সম্পন্ন সুনাগরিক। শিক্ষা ছাড়া মানুষের মধ্যে দেশপ্রেম,মানবতা ও নৈতিক মূল্যবোধের বিকাশ ঘটানো সম্ভব নয়। একবিংশ শতাব্দীর চ্যালেঞ্জ মোকাবেলা করে দেশকে আধুনিক ও ডিজিটাল বাংলাদেশ রূপে গড়ার ক্ষেত্রে যুগোপযোগী ও প্রযুক্তি নির্ভর মানসম্মত শিক্ষার কোন বিকল্প নেই। আল হেলাল একাডেমি একটি সর্বাধুনিক বিশ্বমানের শিক্ষা প্রতিষ্ঠানে পরিণত করার লক্ষ্যকে সামনে রেখে এখানে চালু করা হয়েছে সৃজনশীল শিক্ষা পদ্ধতি।

শিক্ষার ক্ষেত্রে অনুসরণ করা হচ্ছে অংশগ্রহণমূলক পদ্ধতি। নিয়মিত বিভিন্ন ধরণের আধুনিক পদক্ষেপ গ্রহণের মাধ্যমে এ প্রতিষ্ঠানকে আন্তর্জাতিক মানে উন্নীত করার প্রচেষ্টা অব্যাহত আছে। ‘সহস্রাব্দ উন্নয়ন লক্ষ্যমাত্রা’ অর্জন এবং ‘ভিশন-২০২১’ বাস্তবায়নের লক্ষ্যে শিক্ষার্থী, অভিভাবক, শিক্ষক ও পরিচালনা পরিষদের সবাই একযোগে কাজ করে আল হেলাল একাডেমি একটি সর্বাধুনিক বিশ্বমানের শিক্ষা প্রতিষ্ঠানে পরিণত করবে বলে আমি দৃঢ়ভাবে আশাবাদী।',
                'image' => 'principle_image/57611.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}