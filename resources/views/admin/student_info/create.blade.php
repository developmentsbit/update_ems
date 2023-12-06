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

                    <form class="row g-3 mt-0">
                      <div class="main_from mt-0">
                          <h6 class="bg-light text-dark border-bottom border-3 border-dark rounded-bottom fs-5 p-2">@lang('student_info.addtitle') :</h6>
                      </div>
                      <div class="col-md-4 mt-2">
                        <label  class="form-label">@lang('student_info.Addmission_date') :</label>
                        <input type="text" class="form-control form-control-sm datepicker" name="admission_date" id="admission_date" value="{{date('d/m/Y')}}">
                      </div>
                        <div class="col-md-4 mt-2 ">
                          <label for="name" class="form-label">@lang('student_info.name')  : <span class="text-danger" style="font-size: 15px;">*</span> </label>
                          <input type="text" class="form-control form-control-sm" name="name" id="name" required>
                        </div>
                        <div class="col-md-4 mt-2 ">
                          <label for="name_en" class="form-label">@lang('student_info.name_en')<span class="text-danger" style="font-size: 15px;">*</span></label>
                          <input type="text" class="form-control  form-control-sm" name="name_en" id="name_en" required>
                        </div>
                        <div class="col-md-4 mt-2">
                          <label for="father_name" class="form-label">@lang('student_info.father_name') :<span class="text-danger" style="font-size: 15px;">*</span> </label>
                          <input type="text" class="form-control  form-control-sm" name="father_name" id="father_name" required>
                        </div>
                        <div class="col-md-4 mt-2">
                          <label for="mother_name" class="form-label">@lang('student_info.mother_name') :<span class="text-danger" style="font-size: 15px;">*</span> </label>
                          <input type="text" class="form-control  form-control-sm" name="mother_name" id="mother_name" required>
                        </div>

                        <div class="col-md-4 mt-2">
                          <label  class="form-label">@lang('student_info.date') : <span class="text-danger" style="font-size: 15px;">*</span>  </label>
                          <input type="text" class="form-control form-control-sm datepicker" name="date" id="date" value="{{date('d/m/Y')}}">

                        </div>

                        <div class="col-md-3 col-6 mt-3">
                            <div class="row">
                                <label for="gender" class="col-sm-4 col-form-label" >@lang('student_info.gender') : <span class="text-danger" style="font-size: 15px;">*</span></label>
                                <div class="col-sm-8">
                                  <select class="form-select select2" data-toggle="select2" name="gender" id="gender">
                                    <option selected>Choose...</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Others</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3  col-6 mt-3">
                            <div class="row ">
                                <label for="nationality" class="col-sm-5 col-form-label">@lang('student_info.nationality') : <span class="text-danger" style="font-size: 15px;">*</span></label>
                                <div class="col-sm-7">
                                  <select class="form-select select2" data-toggle="select2" id="nationality" name="nationality">
                                    <option value="1">Bangladeshi</option>
                                    <option value="2">Others</option>

                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mt-3">
                            <div class="row ">
                                <label for="religion" class="col-sm-4  col-form-label">@lang('student_info.religion') : <span class="text-danger" style="font-size: 15px;">*</span></label>
                                <div class="col-sm-8">
                                  <select class="form-select select2" data-toggle="select2" id="religion" name="religion">
                                    <option selected>Choose...</option>
                                    <option value="1">Islam</option>
                                    <option value="2">Hindu</option>
                                    <option value="3">Others</option>

                                  </select>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3 col-6 mt-3">
                            <div class="row ">
                                <label for="blood_grp" class="col-sm-5 col-form-label">@lang('student_info.blood_group') :</label>
                                <div class="col-sm-7">
                                  <select class="form-select select2" data-toggle="select2" id="blood_grp" name="blood_grp">
                                    <option selected>Choose...</option>
                                    <option value="1">A+</option>
                                    <option value="2">A-</option>
                                    <option value="3">B+</option>
                                    <option value="4">B-</option>
                                    <option value="5">O+</option>
                                    <option value="6">O-</option>
                                    <option value="7">AB+</option>
                                    <option value="8">AB-</option>

                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                          <label for="" class="form-label">@lang('student_info.student_image') :</label>
                          <input type="file" class="form-control form-control-sm" id="imageFile" name="image">
                        </div>
                        <div class="col-md-6 mb-0">
                          <img id="blah" src="" alt="" style="height: 80px;" />
                        </div>


                  {{-- STUDENT'S ADDRESS   --}}
                        {{-- <div class="main_from mt-1">
                          <h5 class="bg-info p-2 text-dark border-bottom border-3 border-drak rounded-bottom">STUDENT'S ADDRESS:</h5>
                        </div> --}}

                {{-- Present Address:  --}}

                        <div class="main_from mt-0">
                          <h6 class="bg-light text-dark border-bottom border-3 border-dark rounded-bottom fs-5 p-2">@lang('student_info.address') :</h6>
                        </div>
                        <div class="main_from mt-1 mb-1 fs-5 mb-3">
                          <b class="text-dark">@lang('student_info.present_address') :</b>
                        </div>

                        <div class="col-md-2 col-6 mt-0">
                          <label for="division" class="form-label">@lang('student_info.division') :</label>

                          <select class="form-select select2" data-toggle="select2" id="division" name="division" onchange="return loadDistrict()">
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
                          <label for="present_post_office" class="form-label">@lang('student_info.post_office')/@lang('student_info.post_code'):</label>
                          <input type="text" class="form-control" id="present_post_office" name="present_post_office">
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
                          <label for="present_houses" class="form-label">@lang('student_info.house_name'):</label>
                          <input type="text" class="form-control" id="present_houses" name="present_houses">
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


                          {{-- <div class="col-md-2 col-6 mt-0">
                            <label for="parmanenet_post_code" class="form-label">@lang('student_info.post_code'):</label>
                            <input type="text" class="form-control" id="parmanenet_post_code" name="parmanenet_post_code">
                          </div> --}}



                   {{-- GUARDIAN'S INFORMATION --}}

                          <div class="main_from mt-3">
                            <h5 class="bg-light text-dark border-bottom border-3 border-dark  rounded-bottom fs-5 p-2">@lang('student_info.guardian_info') :</h5>
                          </div>
                          <div class="col-md-3 col-6 mt-1">
                            <label for="guardian_name" class="form-label">@lang('student_info.guardian_name') :</label>
                            <input type="text" class="form-control" id="guardian_name" name="guardian_name">
                          </div>
                          <div class="col-md-3 col-6 mt-1">
                            <label for="guardian_contact" class="form-label">@lang('student_info.guardian_contact') :</label>
                            <input type="text" class="form-control" id="guardian_contact" name="guardian_contact">
                          </div>
                          <div class="col-md-3 col-6 mt-1">
                            <label for="guardian_email" class="form-label">@lang('student_info.guardian_email') :</label>
                            <input type="text" class="form-control" id="guardian_email" name="guardian_email">
                          </div>
                          <div class="col-md-3 col-6 mt-1">
                            <label for="rel_with_student" class="form-label">@lang('student_info.relation')</label>
                            <input type="text" class="form-control" id="rel_with_student" name="rel_with_student">
                          </div>


                          <div class="main_from mt-3">
                            <h5 class="bg-light text-dark border-bottom border-3 border-dark rounded-bottom fs-5 p-2">@lang('student_info.academic_info') :</h5>
                          </div>
                          <div class="col-md-4 col-4 mt-1">
                            <div class="row ">
                                <label for="" class="col-sm-6 col-form-label">@lang('student_info.admission_class')  :</label>
                                <div class="col-sm-6">
                                  <select class="form-select select2" data-toggle="select2" id="class" name="class">
                                    <option selected>Choose...</option>

                                  </select>
                                </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-4 mt-1">
                            <div class="row ">

                                <label for="" class="col-sm-6 col-form-label">@lang('student_info.admission_group') :</label>
                                <div class="col-sm-6">
                                  <select class="form-select select2" data-toggle="select2" id="group" name="group">
                                    <option selected>Choose...</option>
                                    <option value="1">Bangladeshi</option>


                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-4 mt-md-1 mt-3">
                            <div class="row ">

                                <label for="" class="col-sm-4 col-form-label">@lang('student_info.session') :</label>
                                <div class="col-sm-8">
                                  <select class="form-select select2" data-toggle="select2" id="session" name="session">
                                    <option selected>Choose...</option>
                                    <option value="1">Bangladeshi</option>

                                  </select>
                                </div>
                            </div>
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

