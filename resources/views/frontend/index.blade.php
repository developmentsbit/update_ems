@php
$slider = DB::table('photogallerys')->where("slider",1)->orderBy('id','DESC')->get();
$setting = DB::table("setting")->first();
@endphp


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $setting->name }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="icon" href="{{ asset($setting->image) }}" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{ asset('/') }}frontend/css/uikit.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/') }}frontend/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/') }}frontend/style.css">
  <link href="{{ asset('/') }}frontend/css/bootstrap-4-navbar.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <link href="{{ asset('/') }}frontend/css/sliderResponsive.css" rel="stylesheet" type="text/css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('/') }}frontend/js/main.js"></script>
</head>
<body>




  <div class="container">


    <div class="col-sm-12 col-12 pt-2" style="background: #fff;">

     <div class="col-sm-12 col-12  topheader">
      <div class="row">
        <div class="col-sm-4 col-6 text-sm-left" id="email">


          <label><a href="public/mujib100/pages/timeline_bn.html"  class="btn btn-success btn-sm" target="_blank"><span uk-icon="icon: grid; ratio: 0.8"></span>&nbsp;সুবর্ণ জয়ন্তী ও  বঙ্গবন্ধু কর্ণার  </a></label>

        </div>


        <div class="col-sm-8 col-6 text-sm-right text-center" id="email">
          <div class="btn-group" role="group" aria-label="Basic example">

            <label><a target="_blank" href="https://fgc.gov.bd/showResult.php" style="text-decoration:none;color:white;margin-right:10px" class="btn btn-outline-info btn-sm">@lang('frontend.result')</a>
            <label><a target="_blank" href="{{url('admission_form')}}" style="text-decoration:none;color:white;margin-right:10px" class="btn btn-outline-warning btn-sm"> <i class="fa fa-users"></i>&nbsp; @lang('frontend.admission_form')</a>
            <label><a target="_blank" href="#" style="text-decoration:none;color:white;margin-right:10px" class="btn btn-outline-success btn-sm">@lang('frontend.student_login')</a>
            
            <!--<label><a href="" style="text-decoration:none;color:white;margin-right:10px" class="btn btn-success btn-sm"> <img src="{{ asset('/') }}frontend/img/bdicon.png" style="width:20px">&nbsp;বাংলা</a-->
            <!--  >-->
            <!--</label><label><a href="en" style="text-decoration:none" class="btn btn-outline-info btn-sm"> <img src="{{ asset('/') }}frontend/img/us.png" style="width:20px;">&nbsp;English</a>-->
            <!--  </label>-->
            </div>


          </div>

        </div>
      </div><!------------Top Header End---------------->








      <div class="col-sm-12 col-12 p-0">
        <div class="slider" id="slider1">
          <!-- Slides -->


          @if(isset($slider))
          @foreach($slider as $s)


          <div style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('/') }}{{ $s->image  }}'); "></div>


          @endforeach
          @endif





          <!-- The Arrows -->
          <i class="left" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path></svg></i>
          <i class="right" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) "></path></svg></i>
          <!-- Title Bar -->
          <span class="titleBar">
            <a href="{{ url('/') }}"><img src="{{ asset($setting->image) }}" class="img-fluid"></a>&nbsp;&nbsp;<span>{{ $setting->name }} <p style="padding-left: 100px;  margin-top: -20px;">প্রতিষ্ঠাকাল - {{ $setting->established }} ইং</p></span><br>
          </span>
        </div>



        <div id="carouselExampleControls" class="carousel slide d-block d-sm-none" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('/') }}frontend/img/090521_07_04_08.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('/') }}frontend/img/090521_07_04_08.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('/') }}frontend/img/090521_07_04_08.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>







      </div><!---------------End Slider------------------->











      <nav class="navbar navbar-expand-lg navbar-light btco-hover-menu menubar" style="background: #fff; border-bottom: 1px solid #e5e5e5; padding: 0px; box-shadow: 0 1px 5px -2px #999;">


        <a class="navbar-brand d-sm-none d-block" style="color: #000; font-weight: bold;" href="">মেনু নির্বাচন করুন</a>

        <button  class="navbar-toggler"  uk-toggle="target: #offcanvas-slide" style="background-color: #f4f4f4; color: #fff; padding: 5px 10px;">
          <span class="navbar-toggler-icon" style="color: #fff;"></span>
        </button>


        <div class="collapse navbar-collapse " id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true" style="font-size: 15px;"></i></a>
            </li>











            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                প্রতিষ্ঠান পরিচিতি
              </a>
              <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink" style="min-width: 400px;  max-width:100%;">

                <div class="row">

                  <div class="col-md-6 col-12 dmenu mt-3">
                    <li><a href="{{ url('page/1') }}">আমাদের সম্পর্কে</a></li>
                    <li><a href="{{ url('page/2') }}">লক্ষ্য এবং উদ্দেশ্য</a></li>
                    <li><a href="{{ url('page/3') }}">ইতিহাস</a></li>
                    <li><a href="{{ url('page/4') }}">সিটিজেন চার্টার</a></li>


                  </div>

                  <div class="col-md-6 col-12 dmenu mt-3">
                    <li><a href="{{ url('page/6') }}">ভৌত অবকাঠামো</a></li>
                    <li><a href="{{ url('page/7') }}">বার্ষিক কর্ম পরিকল্পনা </a></li>
                    <li><a href="{{ url('page/8') }}">যোগাযোগের ঠিকানা</a></li>
                  </div>



                </div>



              </ul>
            </li>



            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                প্রশাসনিক তথ্য
              </a>
              <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink" style="min-width:260px; max-width:100%;">

                <div class="col-md-12 col-12 dmenu mt-3">

                 {{-- <li><a href="{{ url('presidentmessage') }}">সভাপতির বাণী </a></li> --}}
                 <li><a href="{{ url('principle_message') }}">অধ্যক্ষের বার্তা</a></li>
                 {{-- <li><a href="{{ url('managing_comitte') }}">পরিচালনা পর্ষদ তথ্য</a></li> --}}
                 {{-- <li><a href="{{ url('presidents') }}">সভাপতির তালিকা</a></li> --}}
                 <li><a href="{{ url('principles') }}">অধ্যক্ষদের তালিকা</a></li>
                 {{-- <li><a href="{{ url('donar') }}">দাতা সদস্যদের তালিকা</a></li> --}}
                 {{-- <li><a href="{{ url('ex_member') }}">প্রাক্তন সদস্যদের তালিকা</a></li> --}}
               </div>
             </ul>
           </li>



           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              শিক্ষক এবং কর্মচারী
            </a>
            <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink" style="min-width: 500px;  max-width:100%;">

              <div class="col-md-12 col-12 dmenu mt-3">
               <div class="row">
                 <div class="col-md-7">
          
               <li><a href="{{ url('teacherinfo') }}">শিক্ষকবৃন্দের তথ্য</a></li>
               @php
                $department = DB::table('department')->limit(9)->get();
               @endphp
               
               @if(isset($department))
               @foreach($department as $d)
               <li><a href="{{ url('department_teacher/'.$d->id) }}">{{ $d->department }}</a></li>
               
               @endforeach
               @endif
               
               </div>
               
                <div class="col-md-5">
                    
                @php
                $department2 = DB::table('department')->skip(9)->limit(9)->get();
               @endphp
               
               @if(isset($department2))
               @foreach($department2 as $d)
               <li><a href="{{ url('department_teacher/'.$d->id) }}">{{ $d->department }}</a></li>
               
               @endforeach
               @endif
               
               <li><a href="{{ url('staffinfo') }}">কর্মচারীদের তথ্য</a></li>
               
               </div>
               </div>

             </div>
           </ul>
         </li>









         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           একাডেমিক তথ্য
         </a>
         <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink">

          <div class="col-md-12 col-12 dmenu mt-3">

           <li><a href="{{ url('page/9') }}">আচরণ বিধি</a></li>
           <li><a href="{{ url('academiccalenders') }}">একাডেমিক ক্যালেন্ডার</a></li>
           <li><a href="{{ url('classroutines') }}">ক্লাস রুটিন</a></li>
           <li><a href="{{ url('holidaylists') }}">ছুটির তালিকা</a></li>
           <li><a href="{{ url('page/10') }}">ইউনিফর্ম</a></li>
           <li><a href="{{ url('page/11') }}">ফি সমূহ</a></li>
           <li><a href="{{ url('page/5') }}">শিক্ষার্থী উপস্থিতি তথ্য</a></li>


         </div>
       </ul>
     </li>











     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        সহপাঠ্যক্রম
      </a>
      <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink" style="min-width: 400px;  max-width:100%;">

        <div class="row">

          <div class="col-md-6 col-12 dmenu mt-3">
            <li><a href="{{ url('page/13') }}">ক্রীড়া কার্যক্রম</a></li>
            <li><a href="{{ url('page/14') }}">সাংস্কৃতিক কার্যক্রম</a></li>
            <li><a href="{{ url('page/15') }}">স্কাউটস</a></li>
            <li><a href="{{ url('page/18') }}">রেড ক্রিসেন্ট</a></li>
            <li><a href="{{ url('page/22') }}">শিক্ষা সফর</a></li>


          </div>

          <div class="col-md-6 col-12 dmenu mt-3">
            <li><a href="{{ url('page/19') }}">স্টুডেন্ট ক্যাবিনেট</a></li>
            <li><a href="{{ url('page/20') }}">ডিবেটিং ক্লাব </a></li>
            <li><a href="{{ url('page/21') }}">ল্যাঙ্গুয়েজ ক্লাব</a></li>
            <li><a href="{{ url('page/23') }}">বিজ্ঞান মেলা</a></li>
          </div>



        </div>



      </ul>
    </li>


    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        ভর্তি সংক্রান্ত তথ্য
      </a>
      <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink">

        <div class="col-md-12 col-12 dmenu mt-3">
         <li><a href="{{ url('admissioninfo/1') }}">প্রসপেক্টাস</a></li>
         <li><a href="{{ url('admissioninfo/2') }}">ভর্তির নিয়মাবলী</a></li>
         <li><a href="{{ url('admissioninfo/3') }}">ভর্তির পদ্ধতি</a></li>
         <li><a href="{{ url('admissioninfo/4') }}">ভর্তি পরীক্ষার ফলাফল</a></li>
        

       </div>
     </ul>
   </li>


   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      পরীক্ষা সংক্রান্ত তথ্য
    </a>
    <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink">

      <div class="col-md-12 col-12 dmenu mt-3">
       <li><a href="{{ url('page/12') }}">পরীক্ষার নিয়মাবলী</a></li>
       <li><a href="{{ url('examroutines') }}">পরীক্ষার সময়সূচী</a></li>
       <li><a href="{{ url('examsyllabus') }}">সিলেবাস</a></li>
       <!--<li><a href="{{ url('examsuggession') }}">সাজেশন্স</a></li>-->

     </div>
   </ul>
 </li>




   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      ফলাফল
    </a>
    <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink">

      <div class="col-md-12 col-12 dmenu mt-3">
       <li><a href="#">অভ্যন্তরীণ ফলাফল</a></li>
       <li><a href="#">পাবলিক পরীক্ষার ফলাফল</a></li>

     </div>
   </ul>
 </li>





 <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    গ্যালারি
  </a>
  <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink" style="min-width: 150px; max-width:100%;">

    <div class="col-md-12 col-12 dmenu mt-3">
      <li><a href="{{ url('photogallery') }}">ফটোগ্যালারি</a></li>
      <li><a href="{{ url('videogallery') }}">ভিডিওগ্যালারি</a></li>
    </div>
  </ul>
</li>

 
<!--<li class="nav-item">-->
<!--    <a class="nav-link" href="{{ url('complainbox') }}">অভিযোগ বাক্স</a>-->
<!--</li>-->

</ul>

</div>
</nav>





</div>
</div><!-------------------End Container-------------------->







<div id="offcanvas-slide" id="offcanvas-slide" uk-offcanvas="flip: false; overlay: true;">
  <div class="uk-offcanvas-bar d-block sidemenu" id="mobilemenuoff" style="transition: 0.9s; border:none; background-color: #000; font-size: 13px!important;">
   <button class="uk-offcanvas-close" type="button" style="top:6px; color: #fff;" uk-close></button>
   <br><br>


   <ul class="uk-nav-parent-icon p-3" uk-nav duration='800'>

     <li><a href=""><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;হোম</a></li>


     <li class="uk-parent">
      <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;প্রতিষ্ঠান পরিচিতি</a>
      <ul class="uk-nav-sub">
        <li><a href="{{ url('page/6') }}">ভৌত অবকাঠামো</a></li>
        <li><a href="{{ url('page/7') }}">বার্ষিক কর্ম পরিকল্পনা </a></li>
        <li><a href="{{ url('page/8') }}">যোগাযোগের ঠিকানা</a></li>
        <li><a href="{{ url('page/1') }}">আমাদের সম্পর্কে</a></li>
        <li><a href="{{ url('page/2') }}">লক্ষ্য এবং উদ্দেশ্য</a></li>
        <li><a href="{{ url('page/3') }}">ইতিহাস</a></li>
        <li><a href="{{ url('page/4') }}">সিটিজেন চার্টার</a></li>
      </ul>
    </li>





    <li class="uk-parent">
      <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;প্রশাসনিক তথ্য </a>
      <ul class="uk-nav-sub">
        <li><a href="{{ url('presidentmessage') }}">সভাপতির বাণী </a></li>
        <li><a href="{{ url('principle_message') }}">প্রধান শিক্ষকের বাণী</a></li>
        <li><a href="{{ url('managing_comitte') }}">পরিচালনা পর্ষদ তথ্য</a></li>
        <li><a href="{{ url('presidents') }}">সভাপতির তালিকা</a></li>
        <li><a href="{{ url('principles') }}">প্রধান শিক্ষকদের তালিকা</a></li>
        <li><a href="{{ url('donar') }}">দাতা সদস্যদের তালিকা</a></li>
        <li><a href="{{ url('ex_member') }}">প্রাক্তন সদস্যদের তালিকা</a></li>
      </ul>
    </li>





    <li class="uk-parent">
      <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;শিক্ষক এবং কর্মচারী </a>
      <ul class="uk-nav-sub">
        <li><a href="{{ url('teacherinfo') }}">শিক্ষকবৃন্দের তথ্য</a></li>
        <li><a href="{{ url('staffinfo') }}">কর্মচারীদের তথ্য</a></li>
      </ul>
    </li>





    <li class="uk-parent">
      <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;একাডেমিক তথ্য</a>
      <ul class="uk-nav-sub">
       <li><a href="{{ url('page/9') }}">আচরণ বিধি</a></li>
       <li><a href="{{ url('academiccalenders') }}">একাডেমিক ক্যালেন্ডার</a></li>
       <li><a href="{{ url('classroutines') }}">ক্লাস রুটিন</a></li>
       <li><a href="{{ url('holidaylists') }}">ছুটির তালিকা</a></li>
       <li><a href="{{ url('page/10') }}">ইউনিফর্ম</a></li>
       <li><a href="{{ url('page/11') }}">ফি সমূহ</a></li>
       <li><a href="{{ url('page/5') }}">শিক্ষার্থী উপস্থিতি তথ্য</a></li>
     </ul>
   </li>



   <li class="uk-parent">
    <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;সহপাঠ্যক্রম</a>
    <ul class="uk-nav-sub">
      <li><a href="{{ url('page/13') }}">ক্রীড়া কার্যক্রম</a></li>
      <li><a href="{{ url('page/14') }}">সাংস্কৃতিক কার্যক্রম</a></li>
      <li><a href="{{ url('page/15') }}">স্কাউটস</a></li>
      <li><a href="{{ url('page/18') }}">রেড ক্রিসেন্ট</a></li>
      <li><a href="{{ url('page/22') }}">শিক্ষা সফর</a></li>
      <li><a href="{{ url('page/19') }}">স্টুডেন্ট ক্যাবিনেট</a></li>
      <li><a href="{{ url('page/20') }}">ডিবেটিং ক্লাব </a></li>
      <li><a href="{{ url('page/21') }}">ল্যাঙ্গুয়েজ ক্লাব</a></li>
      <li><a href="{{ url('page/23') }}">বিজ্ঞান মেলা</a></li>
    </ul>
  </li>





  <li class="uk-parent">
    <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;ভর্তি সংক্রান্ত তথ্য</a>
    <ul class="uk-nav-sub">
      <li><a href="{{ url('admissioninfo/1') }}">প্রসপেক্টাস</a></li>
      <li><a href="{{ url('admissioninfo/2') }}">ভর্তির নিয়মাবলী</a></li>
      <li><a href="{{ url('admissioninfo/3') }}">ভর্তির পদ্ধতি</a></li>
      <li><a href="{{ url('admissioninfo/4') }}">ভর্তি পরীক্ষার ফলাফল</a></li>
   

    </ul>
  </li>






  <li class="uk-parent">
    <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;পরীক্ষা সংক্রান্ত তথ্য</a>
    <ul class="uk-nav-sub">
     <li><a href="{{ url('page/12') }}">পরীক্ষার নিয়মাবলী</a></li>
     <li><a href="{{ url('examroutines') }}">পরীক্ষার সময়সূচী</a></li>
     <li><a href="{{ url('examsyllabus') }}">সিলেবাস</a></li>
     <!--<li><a href="{{ url('examsuggession') }}">সাজেশন্স</a></li>-->
   </ul>
 </li>
  
 
 <li class="uk-parent">
    <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;ফলাফল</a>
    <ul class="uk-nav-sub">
     <li><a href="{{ url('page/12') }}">অভ্যন্তরীণ</a></li>
     <li><a href="{{ url('examroutines') }}">পাবলিক পরীক্ষার ফলাফল</a></li>
   </ul>
 </li>




 <li class="uk-parent">
  <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;গ্যালারি</a>
  <ul class="uk-nav-sub">
    <li><a href="{{ url('photogallery') }}">ফটোগ্যালারি</a></li>
    <li><a href="{{ url('videogallery') }}">ভিডিওগ্যালারি</a></li>
  </ul>
</li>
 
<!--<li class="nav-item">-->
<!--    <a class="nav-link" href="{{ url('complainbox') }}">অভিযোগ বাক্স</a>-->
<!--</li>-->



</ul>


</div>
</div> <!----------------End Mobile Menu------------->







@yield('content')




<div class="container">
  <div class="col-sm-12 col-12 bg-white p-0 pt-5">
    <img src="{{ asset('/') }}frontend/img/footer_top_bg.png" class="img-fluid w-100">
  </div>


  <div class="col-sm-12 col-12 developerdiv">

    <center>
      <span class="develop">Copyright © <?php echo date('Y'); ?> {{ $setting->name }} All Right Reserved.</span><br>
      <span class="develop">Developed by</span>&nbsp;&nbsp;<a href="http://sbit.com.bd" target="blank" class="it">SKILL BASED IT</a></center>

    </div>

  </div>


  <!-----------end develop by---------->




  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="{{ asset('/') }}frontend/js/bootstrap-4-navbar.js"></script>
  <script type="text/javascript" src="{{ asset('/') }}frontend/js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="{{ asset('/') }}frontend/js/jquery.nivo.slider.js"></script>
  <script type="text/javascript" src="{{ asset('/') }}frontend/js/uikit.min.js"></script>
  <script type="text/javascript" src="{{ asset('/') }}frontend/js/uikit-icons.min.js"></script>
  <script type="text/javascript" src="{{ asset('/') }}frontend/js/jquery.exzoom.js"></script>

  <script>
    AOS.init();
    var preloader=document.getElementById('load');
    function myfunctions() {
      preloader.style.display='none';
    }

    $(document).ready(function() {
      $('#example').DataTable();
    } );


  </script>


  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="{{ asset('/') }}frontend/js/sliderResponsive.js"></script>


  <script>
    $(document).ready(function() {

      $("#slider1").sliderResponsive({
      });

      $("#slider2").sliderResponsive({
        fadeSpeed: 300,
        autoPlay: "off",
        showArrows: "on",
        hideDots: "on"
      });

      $("#slider3").sliderResponsive({
        hoverZoom: "off",
        hideDots: "on"
      });

    });
  </script>


  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" type="text/javascript" ></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    } );
  </script>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
