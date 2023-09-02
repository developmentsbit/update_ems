

@php

  $principle = DB::table('principles')->where('type',1)->first();
  $v_principle = DB::table('vice_principal_messages')->first();
  $usefullink = DB::table('usefullinks')->get();
  $setting = DB::table('setting')->first();



@endphp


<div class="col-sm-3 col-12">

    @if(request()->Is('principle_message'))

    @else
	<div class="col-sm-12 col-12 p-0">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">অধ্যক্ষের বার্তা</li>
		</ul>
		<li class="list-group-item p-0 pt-2" id="padd">
			<a href="{{ url('principle_message') }}"><center><img src="{{ asset($principle->image) }}" class="img-fluid"></center></a>
			<center>
				<div class="mt-2 mb-2">
					<span class="head">{{ $principle->name }}<br><a href="{{ url('principle_message') }}" class="details">বিস্তারিত...</a></span>
				</div>
			</center>
		</li>
	</div>
    @endif


    @if(request()->Is('vice_principal_messages'))

    @else
	<div class="col-sm-12 col-12 p-0 mt-2">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">উপাধ্যক্ষ বার্তা</li>
		</ul>
		<li class="list-group-item p-0 pt-2" id="padd">
			<a href="{{ url('principle_message') }}"><center><img src="{{ asset('vice_principal_image') }}/{{$v_principle->image}}" class="img-fluid"></center></a>
			<center>
				<div class="mt-2 mb-2">
					<span class="head">{{ $v_principle->name }}<br><a href="{{ url('vice_principal_messages') }}" class="details">বিস্তারিত...</a></span>
				</div>
			</center>
		</li>
	</div>
    @endif










	<div class="col-sm-12 col-12 p-0 mt-3" data-aos="fade-in" data-aos-duration="1000">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">গুরুত্বপূর্ণ লিংক</li>
		</ul>
		<div class="feature">

			@if(isset($usefullink))
			@foreach($usefullink as $link)

			<a href="{{ $link->linkurl }}" target="blank"><li style='font-size:12px;'><span uk-icon="icon: triangle-right; ratio: 0.7"></span>&nbsp;&nbsp;{{ $link->title }}</li></a>


			@endforeach
			@endif


		</div>
	</div>



	<div class="col-sm-12 col-12 p-0 mt-3" data-aos="fade-in" data-aos-duration="1000">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">গুগল ম্যাপ</li>
		</ul>
		<div class="feature">
			<iframe src="{{ $setting->map }}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


		</div>
	</div>



	<div class="col-sm-12 col-12 p-0 mt-3" data-aos="fade-in" data-aos-duration="1000">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">অফিসিয়াল ফ্যান পেইজ</li>
		</ul>
		<div class="feature">
			      <iframe src="{{ $setting->page }}" width="250" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>



		</div>
	</div>











	<div class="col-sm-12 col-12 p-0 mt-2">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">জরুরী হটলাইন</li>
		</ul>
		<li class="list-group-item p-0 pt-2" id="padd">
			<center><a ><img src="{{ asset('/') }}frontend/img/Hotline_BN.png" class="img-fluid"></a><br></center>

		</li>

	</div>








	<div class="col-sm-12 col-12 p-0 mt-3" data-aos="fade-in" data-aos-duration="1000">
		<ul class="list-group">
			<li class="list-group-item" id="featurehead">জাতীয় সংগীত</li>
			<audio class="mt-2 w-100" controls>
				<source src="{{ asset('/') }}frontend/img/bd_national_anthem.mp3" type="audio/ogg">
					<source src="{{ asset('/') }}frontend/img/bd_national_anthem.mp3" type="audio/mpeg">
					</audio>
				</ul>
			</div>


			<!----------End National Anthem----->


		</div>


	</div>
</div><!---------End sidebar--------->

