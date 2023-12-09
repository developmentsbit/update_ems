@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />

<style>
    .bg-primary{
    background-color: #727cf5 !important;

    padding: 3px;
    /* font-size: 20px; */
}
input.form-control ,.select2, .form-check-input{
    /* border: 1px solid black !important; */
    border-radius: 0px !important;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
    /* border:1px solid #aaa; */
    border-radius: 0px;
}

</style>


<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('student_info.title')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
            @if (\App\Traits\RolePermissionTrait::checkRoleHasPermission('role', 'create'))
                @slot('action_button1')
                  <i class="fa fa-eye"></i>  @lang('common.view')
                @endslot
                @slot('action_button1_link')
                    {{ route('student_info.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
            <div class="container">
                <div class="from">
                    <div class="navigation mb-2">
                        <div class="navigation-box">
                            <div class="tab-link">
                                <a href="{{url('student_info/edit/tab1/'.$data->student_id)}}">
                                    <b>১. শিক্ষার্থীর তথ্য</b>
                                </a>
                            </div>
                            <div class="tab-link active">
                                <a href="#">
                                    <b>২. ঠিকানা</b>
                                </a>
                            </div>
                            <div class="tab-link">
                                <a href="{{url('student_info/edit/tab3/'.$data->student_id)}}">
                                    <b>৩. অভিভাবকের তথ্য</b>
                                </a>
                            </div>
                            <div class="tab-link">
                                <a href="{{url('student_info/edit/tab4/'.$data->student_id)}}">
                                    <b>৪. একাডেমিক তথ্য</b>
                                </a>
                            </div>
                        </div>
                    </div>

                    <form class="row g-3 mt-0" action="{{ url('studentInfoTab2Update/'.$data->student_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="main_from mt-1 mb-1 fs-5 mb-3">
                            <b class="text-dark">@lang('student_info.present_address') :</b>
                          </div>

                          <div class="col-md-2 col-6 mt-0">
                            <label for="division" class="form-label">@lang('student_info.division') :</label>

                            <select class="form-select select2" data-toggle="select2" id="present_division" name="present_division" onchange="return loadDistrict()">
                              <option selected>Choose...</option>
                              @if ($division)
                              @foreach ($division as $d)
                              <option @if($data->present_division == $d->id) selected @endif value="{{ $d->id }}">{{ $d->division_name }}</option>
                              @endforeach
                              @endif

                            </select>

                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="present_district" class="form-label">@lang('student_info.district'):</label>
                            <select class="form-select select2" data-toggle="select2" id="present_district" name="present_district" onchange=" return loadUpazilla()">
                              <option selected>Choose...</option>
                              @if(isset($district))
                              @foreach ($district as $v)
                                <option @if($data->present_district == $v->id) selected @endif value="{{$v->id}}">{{ $v->district_name }}</option>
                              @endforeach
                              @endif
                            </select>

                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="present_upazila" class="form-label">@lang('student_info.upazilla'):</label>
                            <select class="form-select select2" data-toggle="select2" id="present_upazila" name="present_upazila">
                              <option selected>Choose...</option>
                              @if(isset($upazila))
                              @foreach ($upazila as $v)
                                <option @if($data->present_upazila == $v->id) selected @endif value="{{$v->id}}">{{ $v->upazila_name }}</option>
                              @endforeach
                              @endif
                            </select>

                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="present_po" class="form-label">@lang('student_info.post_office')/@lang('student_info.post_code'):</label>
                            <input type="text" class="form-control form-control-sm" id="present_po" name="present_po" value="{{$data->present_po}}">
                          </div>
                          {{-- <div class="col-md-1 col-6 mt-0">
                            <label for="present_post_code" class="form-label">:</label>
                            <input type="text" class="form-control form-control-sm" id="present_post_code" name="present_post_code">
                          </div> --}}
                          <div class="col-md-2 col-6 mt-0">
                            <label for="present_village" class="form-label">@lang('student_info.village'):</label>
                            <input type="text" class="form-control form-control-sm" id="present_village" name="present_village" value="{{ $data->present_village }}">
                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="present_home" class="form-label">@lang('student_info.house_name'):</label>
                            <input type="text" class="form-control form-control-sm" id="present_home" name="present_home" value="{{ $data->present_home }}">
                          </div>







                        {{-- Parmanenet Address --}}


                          <div class="main_from mt-3 mb-3">
                            <b class="text-dark fs-5">@lang('student_info.permanent_address') :</b>
                              &nbsp &nbsp
                            {{-- <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-warning fs-5" for="flexCheckDefault">
                              @lang('student_info.address_message')
                            </label> --}}
                          </div>

                          <div class="col-md-2 col-6 mt-0">
                            <label for="per_division" class="form-label">@lang('student_info.division') :</label>

                            <select class="form-select select2" data-toggle="select2" id="per_division" name="per_division" onchange="return loadParmanenetDistrict()">
                              <option selected>Choose...</option>
                              @if ($division)
                              @foreach ($division as $d)
                              <option @if($data->per_division == $d->id) selected @endif value="{{ $d->id }}">{{ $d->division_name }}</option>
                              @endforeach

                              @endif

                            </select>
                          </div>

                          <div class="col-md-2 col-6 mt-0">
                            <label for="per_district" class="form-label">@lang('student_info.district'):</label>
                            <select class="form-select select2" data-toggle="select2" id="per_district" name="per_district" onchange=" return loadParmanenetUpazilla()">
                              <option selected>Choose...</option>
                                @if(isset($per_district))
                                @foreach ($per_district as $v)
                                <option @if($data->per_district == $v->id) selected @endif value="{{$v->id}}">{{ $v->district_name }}</option>
                                @endforeach
                                @endif
                            </select>

                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="per_upazila" class="form-label">@lang('student_info.upazilla'):</label>
                            <select class="form-select select2" data-toggle="select2" id="per_upazila" name="per_upazila">
                              <option selected>Choose...</option>
                              @if(isset($per_upazila))
                              @foreach ($per_upazila as $v)
                                <option @if($data->per_upazila == $v->id) selected @endif value="{{ $v->id }}">{{ $v->upazila_name }}</option>
                              @endforeach
                              @endif
                            </select>

                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="per_po" class="form-label">@lang('student_info.post_office')/@lang('student_info.post_code'):</label>
                            <input type="text" class="form-control form-control-sm" id="per_po" name="per_po" value="{{ $data->per_po }}">
                          </div>

                          <div class="col-md-2 col-6 mt-0">
                            <label for="per_village" class="form-label">@lang('student_info.village'):</label>
                            <input type="text" class="form-control form-control-sm" id="per_village" name="per_village" value="{{ $data->per_village }}">
                          </div>

                          <div class="col-md-2 col-6 mt-0">
                              <label for="per_home" class="form-label">@lang('student_info.house_name'):</label>
                              <input type="text" class="form-control form-control-sm" id="per_home" name="per_home" value="{{ $data->per_home }}">
                        </div>
                        <div class="text-center mt-4 ">
                            <a href="{{url('student_info/edit/tab1')}}/{{$data->student_id}}" type="" class="btn btn-secondary button border-0"><i class="fa fa-arrow-left"></i> @lang('common.previous')</a>
                            <button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
                            <a href="{{url('student_info/edit/tab3')}}/{{$data->student_id}}" type="" class="btn btn-primary button border-0">@lang('common.skip') <i class="fa fa-arrow-right"></i></a>
                        </div>
                      </form>

                </div>
				{{-- <h3>@lang('mpo_nationalization.addtitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('mpo_nationalization.store') }}" enctype="multipart/form-data">
					@csrf



				</form> --}}
			</div> <!-- end card body-->
        </div>
		</div> <!-- end card -->
	</div><!-- end col-->
</div>



<script src="{{ asset('assets/js/vendor/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/demo.quilljs.js') }}"></script>

<script>

  function loadDistrict()
  {
    var division_id = $('#present_division').val();
    // alert(division_id);
    $.ajax({
      headers : {
        'X-CSRF-TOKEN' : '{{ csrf_token() }}'
      },

      url : '{{ url('loadDistrict') }}',

      type : 'POST',

      data : {division_id},

      success : function(data)
      {
        $('#present_district').html(data);
      }

    });
  }
  function loadUpazilla()
  {
    var district_id = $('#present_district').val();
    // alert(district_id);
    $.ajax({
      headers : {
        'X-CSRF-TOKEN' : '{{ csrf_token() }}'
      },

      url : '{{ url('loadUpazilla') }}',

      type : 'POST',

      data : {district_id},

      success : function(data)
      {
        $('#present_upazila').html(data);
      }

    });
  }
</script>

<script>

  function loadParmanenetDistrict()
  {
    var division_id = $('#per_division').val();
    // alert(division_id);
    $.ajax({
      headers : {
        'X-CSRF-TOKEN' : '{{ csrf_token() }}'
      },

      url : '{{ url('loadParmanenetDistrict') }}',

      type : 'POST',

      data : {division_id},

      success : function(data)
      {
        $('#per_district').html(data);
      }

    });
  }
  function loadParmanenetUpazilla()
  {
    var district_id = $('#per_district').val();
    // alert(district_id);
    $.ajax({
      headers : {
        'X-CSRF-TOKEN' : '{{ csrf_token() }}'
      },

      url : '{{ url('loadParmanenetUpazilla') }}',

      type : 'POST',

      data : {district_id},

      success : function(data)
      {
        $('#per_upazila').html(data);
      }

    });
  }
</script>


@endsection

