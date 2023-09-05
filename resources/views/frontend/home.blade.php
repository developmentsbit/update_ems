@extends('frontend.index')
@section('content')



<div class="container">


	<div class="col-sm-12 col-12" id="mainpage">
		<div class="row">

			<div class="col-sm-9 col-12">




				<div class="col-sm-12 col-12 mt-3 p-0 pb-2 cnotice">
					<div class="row">
						<div class="col-md-2 col-12 d-sm-block d-none">
							<img src="{{ asset('/') }}frontend/img/notice.png" class="img-fluid">
						</div>

						<div class="col-md-10 col-11 pt-3 p-4">
							<b>নোটিশ বোর্ড</b><br>

							<div class="mt-3">


								@if(isset($notice))
								@foreach($notice as $n)

								<li><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<a href="{{ url('noticesdetails',$n->id)  }}" >{{ $n->title }}</a></li>

								@endforeach
								@endif


							</div>

							<div class="">
								<a href="{{ url("allnotices") }}" class="float-right all">সকল</a>
							</div>


						</div>
					</div>

				</div><!-------------End Notice---------->





				@php
				$about = DB::table("pages")->where('id',1)->first();
				@endphp


				<div class="col-md-12 col-12 p-0 mt-3 about">
					<ul class="list-group p-0">
						<li class="list-group-item" id="header">পরিচিতি</li>
						<div class="details2 p-2 border">
							{{Str::limit($about->details,'500')}}
                            <div class="mt-2">
                                <a href="{{url('page/1')}}" class="btn btn-sm btn-success">Read More</a>
                            </div>
						</div>

					</ul>
				</div>















				<div class="col-sm-12 col-12 p-0">
					<div class="row">




						<div class="col-sm-6 col-12 ">
							<div class="col-sm-12 col-12 pt-3 pb-2" id="cart" data-aos="fade-in" data-aos-duration="1000" >
								<p class="session">&nbsp;&nbsp;আমাদের সম্পর্কে</p>
								<div class="row">
									<div class="col-sm-3 col-3">
										<img src="{{ asset('/') }}frontend/img/1.jpg" class="img-fluid" id="iconss">
									</div>

									<div class="col-sm-9 col-9 p-0">
										<ul class="menus">
											<li><i class="fa fa-caret-right"></i><a href="{{ url('page/1') }}">প্রতিষ্ঠান সম্পর্কে</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('page/2') }}">লক্ষ্য ও উদ্দেশ্য</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('page/3') }}">ইতিহাস</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('page/8') }}">যোগাযোগ করুন</a></li>

										</ul>
									</div>
								</div>
							</div>
						</div><!-------------------------End Card----------------------->





						<div class="col-sm-6 col-12 ">
							<div class="col-sm-12 col-12 pt-3 pb-2" id="cart" data-aos="fade-in" data-aos-duration="1000" >
								<p class="session">&nbsp;&nbsp;প্রশাসনিক তথ্য</p>
								<div class="row">
									<div class="col-sm-3 col-3">
										<img src="{{ asset('/') }}frontend/img/2.jpg" class="img-fluid" id="iconss">
									</div>

									<div class="col-sm-9 col-9 p-0">
										<ul class="menus">




											<li><i class="fa fa-caret-right"></i><a href="{{ url('/principle_message') }}">প্রধান শিক্ষকের বাণী</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/presidentmessage') }}">সভাপতির বাণী</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/managing_comitte') }}">পরিচালনা পর্ষদ তথ্য</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/donar') }}">দাতা সদস্যদের তালিকা</a></li>

										</ul>
									</div>
								</div>
							</div>
						</div><!-------------------------End Card----------------------->





						<div class="col-sm-6 col-12 ">
							<div class="col-sm-12 col-12 pt-3 pb-2" id="cart" data-aos="fade-in" data-aos-duration="1000" >
								<p class="session">&nbsp;&nbsp;শিক্ষক ও কর্মচারী</p>
								<div class="row">
									<div class="col-sm-3 col-3">
										<img src="{{ asset('/') }}frontend/img/3.jpg" class="img-fluid" id="iconss">
									</div>

									<div class="col-sm-9 col-9 p-0">
										<ul class="menus">
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/teacherinfo') }}">শিক্ষকবৃন্দের তথ্য</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/staffinfo') }}">কর্মচারীদের তথ্য</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/ex_member') }}" target="blank">প্রাক্তন সদস্যদের তথ্য</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div><!-------------------------End Card----------------------->



						<div class="col-sm-6 col-12 ">
							<div class="col-sm-12 col-12 pt-3 pb-2" id="cart" data-aos="fade-in" data-aos-duration="1000" >
								<p class="session">&nbsp;&nbsp;একাডেমিক তথ্য</p>
								<div class="row">
									<div class="col-sm-3 col-3">
										<img src="{{ asset('/') }}frontend/img/4.jpg" class="img-fluid" id="iconss">
									</div>

									<div class="col-sm-9 col-9 p-0">
										<ul class="menus">
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/allnotices') }}">নোটিশ সমূহ</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/events') }}">ইভেন্টস</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/page/26') }}">পাঠাগার তথ্য</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/page/27') }}">ছাত্রাবাস তথ্য</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div><!-------------------------End Card----------------------->





						<div class="col-sm-6 col-12 ">
							<div class="col-sm-12 col-12 pt-3 pb-2" id="cart" data-aos="fade-in" data-aos-duration="1000" >
								<p class="session">&nbsp;&nbsp;পরীক্ষার তথ্য</p>
								<div class="row">
									<div class="col-sm-3 col-3">
										<img src="{{ asset('/') }}frontend/img/5.jpg" class="img-fluid" id="iconss">
									</div>

									<div class="col-sm-9 col-9 p-0">
										<ul class="menus">
											<li><i class="fa fa-caret-right"></i><a href="{{ url('page/12') }}">পরীক্ষার নিয়মাবলী</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('examroutines') }}">পরীক্ষার সময়সূচী</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('examsyllabus') }}">সিলেবাস</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('examsuggession') }}">পাঠ পরিকল্পনা</a></li>

										</ul>
									</div>
								</div>
							</div>
						</div><!-------------------------End Card----------------------->


						<div class="col-sm-6 col-12 ">
							<div class="col-sm-12 col-12 pt-3 pb-2" id="cart" data-aos="fade-in" data-aos-duration="1000" >
								<p class="session">&nbsp;&nbsp;ফলাফল</p>
								<div class="row">
									<div class="col-sm-3 col-3">
										<img src="{{ asset('/') }}frontend/img/6.jpg" class="img-fluid" id="iconss">
									</div>

									<div class="col-sm-9 col-9 p-0">
										<ul class="menus">
											<li><i class="fa fa-caret-right"></i><a href="">অভ্যন্তরীণ ফলাফল</a></li>
											<li><i class="fa fa-caret-right"></i><a href="https://eboardresults.com/v2/home" target="blank">পাবলিক পরীক্ষার ফলাফল</a></li>
											<li><i class="fa fa-caret-right"></i><a href="">বৃত্তি পরীক্ষার ফলাফল</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div><!-------------------------End Card----------------------->




						<div class="col-sm-6 col-12 ">
							<div class="col-sm-12 col-12 pt-3 pb-2" id="cart" data-aos="fade-in" data-aos-duration="1000" >
								<p class="session">&nbsp;&nbsp;গ্যালরি</p>
								<div class="row">
									<div class="col-sm-3 col-3">
										<img src="{{ asset('/') }}frontend/img/7.jpg" class="img-fluid" id="iconss">
									</div>

									<div class="col-sm-9 col-9 p-0">
										<ul class="menus">

											<li><i class="fa fa-caret-right"></i><a href="{{ url('/photogallery') }}">ফটো গ্যালারী</a></li>
											<li><i class="fa fa-caret-right"></i><a href="{{ url('/videogallery') }}">ভিডিও গ্যালারী</a></li>

										</ul>
									</div>
								</div>
							</div>
						</div><!-------------------------End Card----------------------->





						<div class="col-sm-6 col-12 ">
							<div class="col-sm-12 col-12 pt-3 pb-2" id="cart" data-aos="fade-in" data-aos-duration="1000" >
								<p class="session">&nbsp;&nbsp;অন্যান্য</p>
								<div class="row">
									<div class="col-sm-3 col-3">
										<img src="{{ asset('/') }}frontend/img/3.jpg" class="img-fluid" id="iconss">
									</div>

									<div class="col-sm-9 col-9 p-0">
										<ul class="menus">
											<li><i class="fa fa-caret-right"></i><a  href="{{ url('page/13') }}">ক্রীড়া কার্যক্রম</a></li>
											<li><i class="fa fa-caret-right"></i><a  href="{{ url('page/14') }}">সাংস্কৃতিক কার্যক্রম</a></li>
											<li><i class="fa fa-caret-right"></i><a  href="{{ url('page/15') }}">স্কাউটস</a></li>
											<li><i class="fa fa-caret-right"></i><a  href="{{ url('page/21') }}">ল্যাঙ্গুয়েজ ক্লাব</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div><!-------------------------End Card----------------------->







						@php
						$setting = DB::table("setting")->first();
						@endphp



						<div class="col-12 mt-4">
					<iframe width="100%" height="400" src="https://www.youtube.com/embed/ZZpp4WMokZ0" title="FENI GOVERNMENT COLLEGE Documentary." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>	</div>







						<!-------------------------------------End Full Card---------------------------------->








					</div>
				</div>
			</div><!-----------------------End Mainpage---------------------->


			@include('frontend.sidebar')



		</div><!-------End Container----------->



		@endsection
