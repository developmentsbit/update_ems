

@php

  $principle = DB::table('principles')->where('type',1)->first();
  $president = DB::table('principles')->where('type',2)->first();
  $minister_of_state = DB::table('principles')->where('type',3)->first();
  $chairman = DB::table('principles')->where('type',4)->first();
  $president_check = DB::table('principles')->where('type',2)->count();
  $v_principle = DB::table('vice_principal_messages')->first();
  $usefullink = DB::table('usefullinks')->get();
  $setting = DB::table('setting')->first();

@endphp


<div class="col-sm-3 col-12">
	@if(env('APP_URL') == 'https://ahrsc.edu.bd')
	<!-- ============ -->
	@if(request()->Is('ministerofstatemessage'))
	
	@else
	<div class="col-sm-12 col-12 p-0 mt-2">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">@lang('frontend.ministerofstatemessage')</li>
		</ul>
		<li class="list-group-item p-0" id="padd">
			<a href="{{ url('ministerofstatemessage') }}"><center><img src="{{ asset($minister_of_state->image) }}" class="img-fluid"></center></a>
			<center>
				<div class="mt-2">
					<span class="head">@if($lang == 'en'){{ $minister_of_state->name ?: $minister_of_state->name_bn}}@else {{$minister_of_state->name_bn ?: $minister_of_state->name}}@endif<br><a class="btn btn-success btn-sm w-100" style="border-radius: 0px;" href="{{ url('ministerofstatemessage') }}" class="details">@lang('frontend.details')</a></span>
				</div>
			</center>
		</li>
	</div>
	@endif

	@if(request()->Is('chairmanmessage'))
	
	@else
	<div class="col-sm-12 col-12 p-0 mt-2">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">@lang('frontend.chairmanmessage')</li>
		</ul>
		<li class="list-group-item p-0" id="padd">
			<a href="{{ url('chairman') }}"><center><img src="{{ asset($chairman->image) }}" class="img-fluid"></center></a>
			<center>
				<div class="mt-2">
					<span class="head">@if($lang == 'en'){{ $chairman->name ?: $chairman->name_bn}}@else {{$chairman->name_bn ?: $chairman->name}}@endif<br><a class="btn btn-success btn-sm w-100" style="border-radius: 0px;" href="{{ url('chairmanmessage') }}" class="details">@lang('frontend.details')</a></span>
				</div>
			</center>
		</li>
	</div>
	@endif

	@endif

	<!-- ====== -->

	@if($president_check > 0)
	
	@if(request()->Is('presidentmessage'))
	
	@else
	<div class="col-sm-12 col-12 p-0 mt-2">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">@lang('frontend.presidentmessage')</li>
		</ul>
		<li class="list-group-item p-0" id="padd">
			<a href="{{ url('presidentmessage') }}"><center><img src="{{ asset($president->image) }}" class="img-fluid"></center></a>
			<center>
				<div class="mt-2">
					<span class="head">@if($lang == 'en'){{$president->name}}@elseif($lang == 'bn'){{$president->name_bn}}@endif<br><a class="btn btn-success btn-sm w-100" style="border-radius: 0px;" href="{{ url('presidentmessage') }}" class="details">@lang('frontend.details')</a></span>
				</div>
			</center>
		</li>
	</div>
	@endif
	@endif



    @if(request()->Is('principal_message'))

    @else
	<div class="col-sm-12 col-12 p-0 mt-2">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">
				@if($setting->type == 'school')
				@lang('frontend.principal_message')
				@else
				@lang('frontend.principal_message')
				@endif
			</li>
		</ul>
		<li class="list-group-item p-0 pt-2" id="padd">
			<a href="{{ url('principal_message') }}"><center><img src="{{ asset($principle->image) }}" class="img-fluid"></center></a>
			<center>
				<div class="mt-2">
					<span class="head">@if($lang == 'en'){{ $principle->name }}@elseif($lang == 'bn'){{ $principle->name_bn }}@endif<br><a class="btn btn-sm btn-success w-100" style="border-radius: 0px;" href="{{ url('principal_message') }}" class="details">@lang('frontend.details')</a></span>
				</div>
			</center>
		</li>
	</div>
    @endif

    @if($setting->type == 'college' || $setting->type == 'madrasah')

	@if(request()->Is('vice_principal_messages'))

    @else
	<div class="col-sm-12 col-12 p-0 mt-2">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">@lang('frontend.vice_principal_message')</li>
		</ul>
		<li class="list-group-item p-0 pt-2" id="padd">
			<a href="{{ url('vice_principal_message') }}"><center><img src="{{ asset('/vice_principal_image') }}/{{$v_principle->image}}" class="img-fluid"></center></a>
			<center>
				<div class="mt-2">
					<span class="head">@if($lang == 'en'){{ $v_principle->name }}@elseif($lang == 'bn'){{ $v_principle->name_bn }}@endif<br><a class="btn btn-sm btn-success w-100" style="border-radius: 0px;" href="{{ url('vice_principal_messages') }}" class="details">@lang('frontend.details')</a></span>
				</div>
			</center>
		</li>
	</div>
    @endif
	@endif


	@if(env('APP_URL') == 'https://pmths.edu.bd/')
	<div class="col-sm-12 col-12 p-0 mt-3" data-aos="fade-in" data-aos-duration="1000">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">@lang('frontend.banbase_number') <b>133734</b> </li>
		</ul>
	</div>

	<div class="col-sm-12 col-12 p-0 mt-3" data-aos="fade-in" data-aos-duration="1000">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">@lang('frontend.useful_link')</li>
		</ul>
		<div class="feature">
			@if(isset($usefullink))
			@foreach($usefullink as $link)
			<a href="{{ $link->linkurl }}" target="blank"><li style='font-size:12px;'><span uk-icon="icon: triangle-right; ratio: 0.7"></span>&nbsp;&nbsp;@if($lang == 'en'){{ $link->title }}@elseif($lang == 'bn'){{ $link->title_bn }}@endif</li></a>
			@endforeach
			@endif
		</div>
	</div>
	@else

	<div class="col-sm-12 col-12 p-0 mt-3" data-aos="fade-in" data-aos-duration="1000">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">@lang('frontend.useful_link')</li>
		</ul>
		<div class="feature">
			@if(isset($usefullink))
			@foreach($usefullink as $link)
			<a href="{{ $link->linkurl }}" target="blank"><li style='font-size:12px;'><span uk-icon="icon: triangle-right; ratio: 0.7"></span>&nbsp;&nbsp;@if($lang == 'en'){{ $link->title }}@elseif($lang == 'bn'){{ $link->title_bn }}@endif</li></a>
			@endforeach
			@endif
		</div>
	</div>
	@endif
	
	<div class="col-sm-12 col-12 p-0 mt-3" data-aos="fade-in" data-aos-duration="1000">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">@lang('frontend.map')</li>
		</ul>
		<div class="feature">
			<iframe src="{{ $setting->map }}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>

	<div class="col-sm-12 col-12 p-0 mt-3" data-aos="fade-in" data-aos-duration="1000">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">@lang('frontend.fan_page')</li>
		</ul>
		<div class="feature">
			<iframe src="{{ $setting->page }}" width="250" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
		</div>
	</div>

	<div class="col-sm-12 col-12 p-0 mt-2">
		<ul class="list-group">
			<li class="list-group-item" id="featureheads">@lang('frontend.emergency_hotline')</li>
		</ul>
		<li class="list-group-item p-0 pt-2" id="padd">
			<center><a ><img src="{{ asset('/') }}frontend/img/Hotline_BN.png" class="img-fluid"></a><br></center>
		</li>
	</div>

	<div class="col-sm-12 col-12 p-0 mt-3" data-aos="fade-in" data-aos-duration="1000">
		<ul class="list-group">
			<li class="list-group-item" id="featurehead">@lang('frontend.national_anthem')</li>
			<audio class="mt-2 w-100" controls>
				<source src="{{ asset('/') }}frontend/img/bd_national_anthem.mp3" type="audio/ogg">
					<source src="{{ asset('/') }}/national_anthem.mp3" type="audio/mpeg">
					</audio>
				</ul>
			</div>
			<!----------End National Anthem----->
		</div>
	</div>

</div><!---------End sidebar--------->

