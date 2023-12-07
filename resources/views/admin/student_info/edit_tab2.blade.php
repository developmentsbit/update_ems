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
    border: 1px solid black !important;
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
                                <a href="{{url('student_info/edit/tab2/'.$data->student_id)}}">
                                    <b>১. শিক্ষার্থীর তথ্য</b>
                                </a>
                            </div>
                            <div class="tab-link active">
                                <a href="#">
                                    <b>২. ঠিকানা</b>
                                </a>
                            </div>
                            <div class="tab-link disabled">
                                <a href="#">
                                    <b>৩. অভিভাবকের তথ্য</b>
                                </a>
                            </div>
                            <div class="tab-link disabled">
                                <a href="#">
                                    <b>৪. একাডেমিক তথ্য</b>
                                </a>
                            </div>
                        </div>
                    </div>

                    <form class="row g-3 mt-0" action="{{route('student_info.store')}}" method="POST" enctype="multipart/form-data">
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
                              <option value="{{ $d->id }}">{{ $d->division_name }}</option>
                              @endforeach

                              @endif

                            </select>

                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="present_district" class="form-label">@lang('student_info.district'):</label>
                            <select class="form-select select2" data-toggle="select2" id="present_district" name="present_district" onchange=" return loadUpazilla()">
                              <option selected>Choose...</option>

                            </select>

                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="present_upazilla" class="form-label">@lang('student_info.upazilla'):</label>
                            <select class="form-select select2" data-toggle="select2" id="present_upazilla" name="present_upazilla">
                              <option selected>Choose...</option>

                            </select>

                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="present_po" class="form-label">@lang('student_info.post_office')/@lang('student_info.post_code'):</label>
                            <input type="text" class="form-control" id="present_po" name="present_po">
                          </div>
                          {{-- <div class="col-md-1 col-6 mt-0">
                            <label for="present_post_code" class="form-label">:</label>
                            <input type="text" class="form-control" id="present_post_code" name="present_post_code">
                          </div> --}}
                          <div class="col-md-2 col-6 mt-0">
                            <label for="present_village" class="form-label">@lang('student_info.village'):</label>
                            <input type="text" class="form-control" id="present_village" name="present_village">
                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="present_home" class="form-label">@lang('student_info.house_name'):</label>
                            <input type="text" class="form-control" id="present_home" name="present_home">
                          </div>







                        {{-- Parmanenet Address --}}


                          <div class="main_from mt-3 mb-3">
                            <b class="text-dark fs-5">@lang('student_info.permanent_address') :</b>
                              &nbsp &nbsp
                            <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-warning fs-5" for="flexCheckDefault">
                              @lang('student_info.address_message')
                            </label>
                          </div>

                          <div class="col-md-2 col-6 mt-0">
                            <label for="parmanenet_division" class="form-label">@lang('student_info.division') :</label>

                            <select class="form-select select2" data-toggle="select2" id="parmanenet_division" name="parmanenet_division" onchange="return loadParmanenetDistrict()">
                              <option selected>Choose...</option>
                              @if ($division)
                              @foreach ($division as $d)
                              <option value="{{ $d->id }}">{{ $d->division_name }}</option>
                              @endforeach

                              @endif

                            </select>
                          </div>

                          <div class="col-md-2 col-6 mt-0">
                            <label for="parmanenet_district" class="form-label">@lang('student_info.district'):</label>
                            <select class="form-select select2" data-toggle="select2" id="parmanenet_district" name="parmanenet_district" onchange=" return loadParmanenetUpazilla()">
                              <option selected>Choose...</option>


                            </select>

                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="parmanenet_upazilla" class="form-label">@lang('student_info.upazilla'):</label>
                            <select class="form-select select2" data-toggle="select2" id="parmanenet_upazilla" name="parmanenet_upazilla">
                              <option selected>Choose...</option>


                            </select>

                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="parmanenet_post_office" class="form-label">@lang('student_info.post_office')/@lang('student_info.post_code'):</label>
                            <input type="text" class="form-control" id="parmanenet_post_office" name="parmanenet_post_office">
                          </div>

                          <div class="col-md-2 col-6 mt-0">
                            <label for="parmanenet_village" class="form-label">@lang('student_info.village'):</label>
                            <input type="text" class="form-control" id="parmanenet_village" name="parmanenet_village">
                          </div>

                          <div class="col-md-2 col-6 mt-0">
                              <label for="parmanenet_house" class="form-label">@lang('student_info.house_name'):</label>
                              <input type="text" class="form-control" id="parmanenet_house" name="parmanenet_house">
                        </div>
                        <div class="text-center mt-4 ">
                            <button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
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
    var division_id = $('#division').val();
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
        $('#present_upazilla').html(data);
      }

    });
  }
</script>

<script>

  function loadParmanenetDistrict()
  {
    var division_id = $('#parmanenet_division').val();
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
        $('#parmanenet_district').html(data);
      }

    });
  }
  function loadParmanenetUpazilla()
  {
    var district_id = $('#parmanenet_district').val();
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
        $('#parmanenet_upazilla').html(data);
      }

    });
  }
</script>


@endsection

