<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data->name}}</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@100..900&display=swap" rel="stylesheet">
</head>
<style>
    body{
        font-family: "Noto Serif Bengali", serif;
    }
    page[size="A4"] {
	  	width: 21cm;
	  	height: 29.7cm;

	}

    /* Set content to fill the entire A4 page */
    body {
        width: 210mm;
        height: 297mm;
        margin: auto;
        /* border: 1px solid lightgray; */
        padding: 30px;
    }
</style>
<body>
    <div style="margin-top: 250px;">
        <div class="title" style="text-align: center">
            <h2>প্রত্যয়ন পত্র</h2>
        </div>
        <p style="font-size: 18px;line-height: 38px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  প্রত্যয়ন করা যাচ্ছে যে, {{$data->name}} , পিতাঃ {{$data->father_name}}, মাতাঃ {{$data->mother_name}} , গ্রামঃ {{$data->village}}, ডাকঘরঃ {{$data->post_office}}, উপজেলাঃ {{$data->upazila}}, জেলাঃ {{$data->district}} অত্র বিদ্যালয়ের {{$data->class}} শ্রেণির নিয়মিত ছাত্র। তার শ্রেণির রোল নং- {{$data->roll_no}}। ভর্তি বহি অনুযায়ী তার জন্ম তারিখ {{ \App\Traits\DateFormat::DbtoDate('-',$data->birth_date) }} খ্রিঃ ({{$data->birth_date_text}})। তার স্বভাব চরিত্র ভালো ।
        </p>
           <p> আমি তার উজ্জ্বল ভবিষ্যৎ কামনা করি।</p>
    </div>
</body>
</html>
