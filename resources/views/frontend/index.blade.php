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

<style type="text/css">
.site-lang {

display: flex;
align-items: center;
}
.site-lang ul {
margin:0;
padding:0;
list-style:none;
}
.site-lang > ul > li {
position: relative;
display: block;
text-align: left;
/* padding: 11px 0; */
}
.site-lang ul li a {
font-weight:700;
color:#222222;
position:relative;
top:2px;
}
.site-lang > ul > li > a::after {
font-family:FontAwesome;
content:"\f107";
margin-left:5px;
font-weight:normal;
}
.site-lang ul li a:hover {
color: #7e7678;
}
.site-lang ul li img {
width:26px;
height:26px;
border-radius:100%;
margin-right:15px;
}
.site-lang ul li ul {
background-color: #ffffff;
box-shadow: 5.5px 9.526px 43px 0px rgb( 98, 143, 144, 0.15 );
position: absolute;
top:100%;
left: -18px;
min-width: 165px;
transition: .4s;
transform-origin: top;
z-index: 400;
border-radius: 10px;
opacity:0;
visibility:hidden;
}
.site-lang ul li:hover ul {
opacity:1;
visibility:visible;
}
.site-lang ul li ul {
padding:10px 0;
}
.site-lang ul li ul li {
padding: 10px 25px;
}
.site-lang.style-2 {
padding-left:50px;
}
.site-lang.style-2 > ul > li > a {
color:#ffffff;
}
.site-lang.in-right ul {
left:unset;
right:0;
}

.container{
  max-width : 1274px !important;
}

@media (max-width: 768px)
      {
#email label a {
    font-size: 12px;
    padding: 6px 17px 7px 4px;
    text-align: center;
    /* justify-content: center; */
}
}

.btn-success {
    background : #05c76a

}
</style>

@if(config('app.locale') == 'en')
<style>
    li.nav-item a {
      font-size: 10.6px;
      padding: 14px 6px !important;
      text-transform: uppercase;
      font-weight: bold;
  }
</style>

@endif

<body>




  <div class="container">


    <div class="col-sm-12 col-12 pt-2" style="background: #fff;">

     <div class="col-sm-12 col-12  topheader">
      <div class="row">
        <div class="col-sm-4 col-6 text-sm-left" id="email">

          <label><a href="public/mujib100/pages/timeline_bn.html"  class="btn btn-success btn-sm" target="_blank"><span uk-icon="icon: grid; ratio: 0.8"></span>&nbsp;@lang('frontend.golden_jubilee_and_bangabandhu_corner')  </a></label>

        </div>


        <div class="col-sm-8 col-8 text-right text-sm-right" id="email">
          <div class="btn-group" role="group" aria-label="Basic example">

            <label><a target="_blank" href="https://fgc.gov.bd/showResult.php" style="text-decoration:none;color:white;margin-right:10px" class="btn btn-outline-danger btn-sm">@lang('frontend.internal_results')</a></label>
            <label><a target="_blank" href="{{url('admission_form')}}" style="text-decoration:none;color:white;margin-right:10px" class="btn btn-outline-warning btn-sm"> <i class="fa fa-users"></i>&nbsp; @lang('frontend.admission_form')</a></label>
            <label><a target="_blank" href="#" style="text-decoration:none;color:white;margin-right:10px" class="btn btn-outline-info btn-sm">@lang('frontend.student_login')</a></label>
            <label>
              <div class="site-lang" style="margin-top: -4px;">
                  @if(config('app.locale')=='bn')
                  <a class="nav-link" href="{{ route('lang', 'en') }}" role="button">
                      <img src="{{ asset('assets/images/flags/us.jpg') }}" alt="user-image" class="me-0 me-sm-1" height="12" width="30px">
                      <span>{{'English'}}</span>
                  </a>
                  @else
                  <a class="nav-link" href="{{ route('lang', 'bn') }}" role="button">
                      <img src="{{ asset('assets/images/flags/bd.jpg') }}" alt="user-image" class="me-0 me-sm-1" height="12" width="30px">
                      <span>{{'বাংলা'}}</span>
                  </a>
                  @endif
              </div>
            </label>
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


        <a class="navbar-brand d-sm-none d-block" style="color: #000; font-weight: bold;" href="">@lang('frontend.select_menu')</a>

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
                @lang('frontend.institute_introduction')
              </a>
              <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink" style="min-width: 400px;  max-width:100%;">

                <div class="row">

                  <div class="col-md-6 col-12 dmenu mt-3">
                    <li><a href="{{ url('page/1') }}">@lang('frontend.about_us')</a></li>
                    <li><a href="{{ url('page/2') }}">@lang('frontend.mission_vision')</a></li>
                    <li><a href="{{ url('page/3') }}">@lang('frontend.history')</a></li>
                    <li><a href="{{ url('page/4') }}">@lang('frontend.citizen_charter')</a></li>


                  </div>

                  <div class="col-md-6 col-12 dmenu mt-3">
                    <li><a href="{{ url('page/6') }}">@lang('frontend.infrastructure')</a></li>
                    <li><a href="{{ url('page/7') }}">@lang('frontend.yearly_working_plan') </a></li>
                    <li><a href="{{ url('page/8') }}">@lang('frontend.contact')</a></li>
                  </div>



                </div>



              </ul>
            </li>



            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @lang('frontend.administrative_information')
              </a>
              <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink" style="min-width:260px; max-width:100%;">

                <div class="col-md-12 col-12 dmenu mt-3">

                 <li><a href="{{ url('presidentmessage') }}">@lang('frontend.presidentmessage') </a></li>
                 <li><a href="{{ url('principal_message') }}">@lang('frontend.principal_message')</a></li>
                 {{-- <li><a href="{{ url('managing_comitte') }}">@lang('frontend.managing_comitte')</a></li> --}}
                 {{-- <li><a href="{{ url('presidents') }}"></a>@lang('frontend.presidents')</li> --}}
                 <li><a href="{{ url('principles') }}">@lang('frontend.principles')</a></li>
                 {{-- <li><a href="{{ url('donar') }}">@lang('frontend.donar')</a></li> --}}
                 {{-- <li><a href="{{ url('ex_member') }}">@lang('frontend.ex_member')</a></li> --}}
               </div>
             </ul>
           </li>



           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @lang('frontend.teachers_and_staff')
            </a>
            <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink" style="min-width: 500px;  max-width:100%;">

              <div class="col-md-12 col-12 dmenu mt-3">
               <div class="row">
                 <div class="col-md-7">

               <li><a href="{{ url('teacherinfo') }}">@lang('frontend.teacherinfo')</a></li>
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

               <li><a href="{{ url('staffinfo') }}">@lang('frontend.staffinfo')</a></li>

               </div>
               </div>

             </div>
           </ul>
         </li>









         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @lang('frontend.academic_information')
         </a>
         <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink">

          <div class="col-md-12 col-12 dmenu mt-3">

           <li><a href="{{ url('page/9') }}">@lang('frontend.rules_regulation')</a></li>
           <li><a href="{{ url('academiccalenders') }}">@lang('frontend.academiccalenders')</a></li>
           <li><a href="{{ url('classroutines') }}">@lang('frontend.classroutines')</a></li>
           <li><a href="{{ url('holidaylists') }}">@lang('frontend.holidaylists')</a></li>
           <li><a href="{{ url('page/10') }}">@lang('frontend.uniform')</a></li>
           <li><a href="{{ url('page/11') }}">@lang('frontend.fees')</a></li>
           <li><a href="{{ url('page/5') }}">@lang('frontend.studentinfochart')</a></li>


         </div>
       </ul>
     </li>











     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      @lang('frontend.co_curricular')
      </a>
      <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink" style="min-width: 400px;  max-width:100%;">

        <div class="row">

          <div class="col-md-6 col-12 dmenu mt-3">
            <li><a href="{{ url('page/13') }}">@lang('frontend.sports_activities')</a></li>
            <li><a href="{{ url('page/14') }}">@lang('frontend.cultural_activities')</a></li>
            <li><a href="{{ url('page/15') }}">@lang('frontend.scouts')</a></li>
            <li><a href="{{ url('page/18') }}">@lang('frontend.red_crescent')</a></li>
            <li><a href="{{ url('page/22') }}">@lang('frontend.educational_tour')</a></li>


          </div>

          <div class="col-md-6 col-12 dmenu mt-3">
            <li><a href="{{ url('page/19') }}">@lang('frontend.student_cabinet')</a></li>
            <li><a href="{{ url('page/20') }}">@lang('frontend.debating_club')</a></li>
            <li><a href="{{ url('page/21') }}">@lang('frontend.language_club')</a></li>
            <li><a href="{{ url('page/23') }}">@lang('frontend.science_fair')</a></li>
          </div>



        </div>



      </ul>
    </li>


    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @lang('frontend.admission_information')
      </a>
      <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink">

        <div class="col-md-12 col-12 dmenu mt-3">

         <li><a href="{{ url('admissionInfo/3') }}">@lang('frontend.prospectus')</a></li>
         <li><a href="{{ url('admissionInfo/2') }}">@lang('frontend.admission_rules')</a></li>
         <li><a href="{{ url('admissionInfo/4') }}">@lang('frontend.admission_procedure')</a></li>
         <li><a href="{{ url('admissionInfo/5') }}">@lang('frontend.admission_test_result')</a></li>
         <li><a href="{{ url('admissionInfo/6') }}">@lang('frontend.admission_test_questions')</a></li>


       </div>
     </ul>
   </li>


   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    @lang('frontend.exam_information')
    </a>
    <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink">

      <div class="col-md-12 col-12 dmenu mt-3">
       <li><a href="{{ url('page/12') }}">@lang('frontend.exam_rules')</a></li>
       <li><a href="{{ url('examroutines') }}">@lang('frontend.examroutines')</a></li>
       <li><a href="{{ url('examsyllabus') }}">@lang('frontend.examsyllabus')</a></li>
       <!--<li><a href="{{ url('examsuggession') }}">@lang('frontend.examsuggession')</a></li>-->

     </div>
   </ul>
 </li>




   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    @lang('frontend.result')
    </a>
    <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink">

      <div class="col-md-12 col-12 dmenu mt-3">
       <li><a href="#">@lang('frontend.internal_results')</a></li>
       <li><a href="https://eboardresults.com/v2/home" target="blank">@lang('frontend.public_exam_result')</a></li>

     </div>
   </ul>
 </li>





 <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  @lang('frontend.gallery')
  </a>
  <ul class="dropdown-menu pb-3 bg-white" aria-labelledby="navbarDropdownMenuLink" style="min-width: 150px; max-width:100%;">

    <div class="col-md-12 col-12 dmenu mt-3">
      <li><a href="{{ url('photogallery') }}">@lang('frontend.photogallery')</a></li>
      <li><a href="{{ url('videogallery') }}">@lang('frontend.videogallery')</a></li>
    </div>
  </ul>
</li>


<!--<li class="nav-item">-->
<!--    <a class="nav-link" href="{{ url('complainbox') }}">@lang('frontend.complainbox')</a>-->
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

     <li><a href=""><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.home')</a></li>


     <li class="uk-parent">
      <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.institute_introduction')</a>
      <ul class="uk-nav-sub">
        <li><a href="{{ url('page/6') }}">@lang('frontend.infrastructure')</a></li>
        <li><a href="{{ url('page/7') }}">@lang('frontend.yearly_working_plan')</a></li>
        <li><a href="{{ url('page/8') }}">@lang('frontend.contact')</a></li>
        <li><a href="{{ url('page/1') }}">@lang('frontend.about_us')</a></li>
        <li><a href="{{ url('page/2') }}">@lang('frontend.mission_vision')</a></li>
        <li><a href="{{ url('page/3') }}">@lang('frontend.history')</a></li>
        <li><a href="{{ url('page/4') }}">@lang('frontend.citizen_charter')</a></li>
      </ul>
    </li>





    <li class="uk-parent">
      <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.administrative_information') </a>
      <ul class="uk-nav-sub">
        <li><a href="{{ url('presidentmessage') }}">@lang('frontend.presidentmessage') </a></li>
        <li><a href="{{ url('principal_message') }}">@lang('frontend.principal_message')</a></li>
        {{-- <li><a href="{{ url('managing_comitte') }}">@lang('frontend.managing_comitte')</a></li> --}}
        {{-- <li><a href="{{ url('presidents') }}"></a>@lang('frontend.presidents')</li> --}}
        <li><a href="{{ url('principles') }}">@lang('frontend.principles')</a></li>
        {{-- <li><a href="{{ url('donar') }}">@lang('frontend.donar')</a></li> --}}
        {{-- <li><a href="{{ url('ex_member') }}">@lang('frontend.ex_member')</a></li> --}}
      </ul>
    </li>





    <li class="uk-parent">
      <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.teachers_and_staff') </a>
      <ul class="uk-nav-sub">
        <li><a href="{{ url('teacherinfo') }}">@lang('frontend.teacherinfo')</a></li>
        <li><a href="{{ url('staffinfo') }}">@lang('frontend.staffinfo')</a></li>
      </ul>
    </li>





    <li class="uk-parent">
      <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.academic_information')</a>
      <ul class="uk-nav-sub">
       <li><a href="{{ url('page/9') }}">@lang('frontend.rules_regulation')</a></li>
       <li><a href="{{ url('academiccalenders') }}">@lang('frontend.academiccalenders')</a></li>
       <li><a href="{{ url('classroutines') }}">@lang('frontend.classroutines')</a></li>
       <li><a href="{{ url('holidaylists') }}">@lang('frontend.holidaylists')</a></li>
       <li><a href="{{ url('page/10') }}">@lang('frontend.uniform')</a></li>
       <li><a href="{{ url('page/11') }}">@lang('frontend.fees')</a></li>
       <li><a href="{{ url('page/5') }}">@lang('frontend.studentinfochart')</a></li>
     </ul>
   </li>



   <li class="uk-parent">
    <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.co_curricular')</a>
    <ul class="uk-nav-sub">
      <li><a href="{{ url('page/13') }}">@lang('frontend.sports_activities')</a></li>
      <li><a href="{{ url('page/14') }}">@lang('frontend.cultural_activities')</a></li>
      <li><a href="{{ url('page/15') }}">@lang('frontend.scouts')</a></li>
      <li><a href="{{ url('page/18') }}">@lang('frontend.red_crescent')</a></li>
      <li><a href="{{ url('page/22') }}">@lang('frontend.educational_tour')</a></li>
      <li><a href="{{ url('page/19') }}">@lang('frontend.student_cabinet')</a></li>
      <li><a href="{{ url('page/20') }}">@lang('frontend.debating_club')</a></li>
      <li><a href="{{ url('page/21') }}">@lang('frontend.language_club')</a></li>
      <li><a href="{{ url('page/23') }}">@lang('frontend.science_fair')</a></li>
    </ul>
  </li>





  <li class="uk-parent">
    <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.admission_information')</a>
    <ul class="uk-nav-sub">


      <li><a href="{{ url('admissionInfo/3') }}">@lang('frontend.prospectus')</a></li>
      <li><a href="{{ url('admissionInfo/2') }}">@lang('frontend.admission_rules')</a></li>
      <li><a href="{{ url('admissionInfo/4') }}">@lang('frontend.admission_procedure')</a></li>
      <li><a href="{{ url('admissionInfo/5') }}">@lang('frontend.admission_test_result')</a></li>
      <li><a href="{{ url('admissionInfo/6') }}">@lang('frontend.admission_test_questions')</a></li>
   



    </ul>
  </li>






  <li class="uk-parent">
    <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.exam_information')</a>
    <ul class="uk-nav-sub">
     <li><a href="{{ url('page/12') }}">@lang('frontend.exam_rules')</a></li>
     <li><a href="{{ url('examroutines') }}">@lang('frontend.examroutines')</a></li>
     <li><a href="{{ url('examsyllabus') }}">@lang('frontend.examsyllabus')</a></li>
     <!--<li><a href="{{ url('examsuggession') }}">@lang('frontend.examsuggession')</a></li>-->
   </ul>
 </li>


 <li class="uk-parent">
    <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.result')</a>
    <ul class="uk-nav-sub">
     <li><a href="#">@lang('frontend.internal_results')</a></li>
     <li><a href="https://eboardresults.com/v2/home" target="blank">@lang('frontend.public_exam_result')</a></li>
   </ul>
 </li>




 <li class="uk-parent">
  <a href="#"><span uk-icon="icon: chevron-right; ratio: 0.9"></span>&nbsp;&nbsp;@lang('frontend.gallery')</a>
  <ul class="uk-nav-sub">
    <li><a href="{{ url('photogallery') }}">@lang('frontend.photogallery')</a></li>
    <li><a href="{{ url('videogallery') }}">@lang('frontend.videogallery')</a></li>
  </ul>
</li>

<!--<li class="nav-item">-->
<!--    <a class="nav-link" href="{{ url('complainbox') }}">@lang('frontend.complainbox')</a>-->
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
      <span class="develop">@lang('frontend.crights') © <?php echo date('Y'); ?> {{ $setting->name }} @lang('frontend.rights')</span><br>
      <span class="develop">@lang('frontend.drights')</span>&nbsp;&nbsp;<a href="http://sbit.com.bd" target="blank" class="it">@lang('frontend.sbit')</a></center>

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
