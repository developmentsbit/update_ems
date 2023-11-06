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
input.form-control ,.form-select{
    border: 1px solid black;
    border-radius: 0px;
}
</style>


<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('student_info.addtitle')
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
                <div class="main_from mt-1 ">
                    <h5 class="bg-dark text-light border-bottom border-3 border-info rounded-bottom fs-5 p-2">@lang('student_info.addtitle')</h5>
                </div>
                <div class="from">

                    <form class="row g-3 mt-0">
                      <div class="col-md-4 mt-0">

                        <label  class="form-label text-dark">@lang('student_info.Addmission_date') :</label>
                        <input type="text" class="form-control datepicker" name="admission_date" id="admission_date" value="{{date('d/m/Y')}}">
                      </div>
                        <div class="col-md-4 mt-0 ">
                          <label for="name" class="form-label text-dark">@lang('student_info.name')  : <span class="text-danger" style="font-size: 15px;">*</span> </label>
                          <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="col-md-4 mt-0 ">
                          <label for="name_en" class="form-label text-dark">@lang('student_info.name_en')<span class="text-danger" style="font-size: 15px;">*</span></label>
                          <input type="text" class="form-control" name="name_en" id="name_en" required>
                        </div>
                        <div class="col-md-4 mt-1">
                          <label for="father_name" class="form-label text-dark">@lang('student_info.father_name') :<span class="text-danger" style="font-size: 15px;">*</span> </label>
                          <input type="text" class="form-control" name="father_name" id="father_name" required>
                        </div>
                        <div class="col-md-4 mt-1">
                          <label for="mother_name" class="form-label text-dark">@lang('student_info.mother_name') :<span class="text-danger" style="font-size: 15px;">*</span> </label>
                          <input type="text" class="form-control" name="mother_name" id="mother_name" required>
                        </div>

                        <div class="col-md-4 mt-1">

                          <label  class="form-label text-dark">@lang('student_info.date') : <span class="text-danger" style="font-size: 15px;">*</span>  </label>
                          <input type="text" class="form-control datepicker" name="date" id="date" value="{{date('d/m/Y')}}">

                        </div>

                        <div class="col-md-3 col-6 ">
                            <div class="row">
                                <label for="gender" class="col-sm-4 col-form-label text-dark" >@lang('student_info.gender') : <span class="text-danger" style="font-size: 15px;">*</span></label>
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
                        <div class="col-md-3  col-6">
                            <div class="row ">
                                <label for="nationality" class="col-sm-5 col-form-label text-dark">@lang('student_info.nationality') : <span class="text-danger" style="font-size: 15px;">*</span></label>
                                <div class="col-sm-7">
                                  <select class="form-select select2" data-toggle="select2" id="nationality" name="nationality">
                                    <option value="1">Bangladeshi</option>
                                    <option value="2">Others</option>

                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 ">
                            <div class="row ">
                                <label for="religion" class="col-sm-4  col-form-label text-dark">@lang('student_info.religion') : <span class="text-danger" style="font-size: 15px;">*</span></label>
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


                        <div class="col-md-3 col-6 ">
                            <div class="row ">
                                <label for="blood_grp" class="col-sm-5 col-form-label text-dark">@lang('student_info.blood_group') :</label>
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
                        <div class="col-md-12">

                          <label for="" class="form-label text-dark">@lang('student_info.student_image') :</label>
                          <input type="file" class="form-control" id="imageFile" name="image">
                          <img id="blah" src="https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o=" alt="your image" style="height: 80px;" />

                        </div>

                  {{-- STUDENT'S ADDRESS   --}}
                        {{-- <div class="main_from mt-1">
                          <h5 class="bg-info p-2 text-dark border-bottom border-3 border-drak rounded-bottom">STUDENT'S ADDRESS:</h5>
                        </div> --}}

                {{-- Present Address:  --}}

                        <div class="main_from mt-2">
                          <h6 class="bg-dark text-light border-bottom border-3 border-info rounded-bottom fs-5 p-2">@lang('student_info.present_address') :</h6>
                        </div>

                        <div class="col-md-2 col-6 mt-0">
                          <label for="present_houses" class="form-label text-dark">@lang('student_info.house_name'):</label>
                          <input type="text" class="form-control" id="present_houses" name="present_houses">
                        </div>
                        <div class="col-md-2 col-6 mt-0">
                          <label for="present_village" class="form-label text-dark">@lang('student_info.village'):</label>
                          <input type="text" class="form-control" id="present_village" name="present_village">
                        </div>
                        <div class="col-md-2 col-6 mt-0">
                          <label for="present_post_office" class="form-label text-dark">@lang('student_info.post_office'):</label>
                          <input type="text" class="form-control" id="present_post_office" name="present_post_office">
                        </div>
                        <div class="col-md-2 col-6 mt-0">
                          <label for="present_post_code" class="form-label text-dark">@lang('student_info.post_code'):</label>
                          <input type="text" class="form-control" id="present_post_code" name="present_post_code">
                        </div>
                        <div class="col-md-2 col-6 mt-0">
                          <label for="present_upazilla" class="form-label text-dark">@lang('student_info.upazilla'):</label>
                          <input type="text" class="form-control" id="present_upazilla" name="present_upazilla">
                        </div>
                        <div class="col-md-2 col-6 mt-0">
                          <label for="present_district" class="form-label text-dark">@lang('student_info.district'):</label>
                          <input type="text" class="form-control" id="present_district" name="present_district">
                        </div>

                      
                      {{-- Parmanenet Address --}}


                        <div class="main_from mt-1">
                          <h6 class="bg-dark text-light border-bottom border-3 border-success rounded-bottom fs-5 p-2">@lang('student_info.permanent_address') :</h6>
                        </div>
                        <div class="main_from mt-0 p-2">
                          <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                          <label class="form-check-label text-warning fs-5" for="flexCheckDefault">
                            @lang('student_info.address_message')
                          </label>
                        </div>
                        <div class="col-md-2 col-6 mt-0">
                            <label for="parmanenet_house" class="form-label text-dark">@lang('student_info.house_name'):</label>
                            <input type="text" class="form-control" id="parmanenet_house" name="parmanenet_house">
                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="parmanenet_village" class="form-label text-dark">@lang('student_info.village'):</label>
                            <input type="text" class="form-control" id="parmanenet_village" name="parmanenet_village">
                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="parmanenet_post_office" class="form-label text-dark">@lang('student_info.post_office'):</label>
                            <input type="text" class="form-control" id="parmanenet_post_office" name="parmanenet_post_office">
                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="parmanenet_post_code" class="form-label text-dark">@lang('student_info.post_code'):</label>
                            <input type="text" class="form-control" id="parmanenet_post_code" name="parmanenet_post_code">
                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="parmanenet_upazilla" class="form-label text-dark">@lang('student_info.upazilla'):</label>
                            <input type="text" class="form-control" id="parmanenet_upazilla" name="parmanenet_upazilla">
                          </div>
                          <div class="col-md-2 col-6 mt-0">
                            <label for="parmanenet_district" class="form-label text-dark">@lang('student_info.district') :</label>
                            <input type="text" class="form-control" id="parmanenet_district" name="parmanenet_district">
                          </div>

                   {{-- GUARDIAN'S INFORMATION --}}

                          <div class="main_from mt-1 ">
                            <h5 class="bg-dark text-light border-bottom border-3 border-info rounded-bottom fs-5 p-2">@lang('student_info.guardian_info') :</h5>
                          </div>
                          <div class="col-md-3 col-6 mt-0">
                            <label for="guardian_name" class="form-label text-dark">@lang('student_info.guardian_name') :</label>
                            <input type="text" class="form-control" id="guardian_name" name="guardian_name">
                          </div>
                          <div class="col-md-3 col-6 mt-0">
                            <label for="guardian_contact" class="form-label text-dark">@lang('student_info.guardian_contact') :</label>
                            <input type="text" class="form-control" id="guardian_contact" name="guardian_contact">
                          </div>
                          <div class="col-md-3 col-6 mt-0">
                            <label for="guardian_email" class="form-label text-dark">@lang('student_info.guardian_email') :</label>
                            <input type="text" class="form-control" id="guardian_email" name="guardian_email">
                          </div>
                          <div class="col-md-3 col-6 mt-0">
                            <label for="rel_with_student" class="form-label text-dark">@lang('student_info.relation')</label>
                            <input type="text" class="form-control" id="rel_with_student" name="rel_with_student">
                          </div>
                          

                          <div class="main_from mt-1 ">
                            <h5 class="bg-dark text-light border-bottom border-3 border-info rounded-bottom fs-5 p-2">@lang('student_info.academic_info') :</h5>
                          </div>
                          <div class="col-md-4 col-4 mt-0">
                            <div class="row mb-3">

                                <label for="" class="col-sm-6 col-form-label text-dark">Admission Desire( Class) :</label>
                                <div class="col-sm-6">
                                  <select class="form-select select2" data-toggle="select2" id="class" name="class">
                                    <option selected>Choose...</option>
                                  
                                  </select>
                                </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-4 mt-0">
                            <div class="row mb-3">

                                <label for="" class="col-sm-6 col-form-label text-dark">Admission Desire(Group) :</label>
                                <div class="col-sm-6">
                                  <select class="form-select select2" data-toggle="select2" id="group" name="group">
                                    <option selected>Choose...</option>
                                    <option value="1">Bangladeshi</option>


                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-4 mt-md-0 mt-3">
                            <div class="row mb-3">

                                <label for="" class="col-sm-4 col-form-label text-dark">Session :</label>
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

					<div class="row myinput">

						<div class="form-group mb-3 col-md-6">
							<label>@lang('common.date'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="date" name="date" id="date"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('mpo_nationalization.subject'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="subject" id="subject"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('mpo_nationalization.subject_bn'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="subject_bn" id="subject_bn"  required="">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('mpo_nationalization.layer'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="layer" id="layer"  required="">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('mpo_nationalization.layer_bn'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="layer_bn" id="layer_bn"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('mpo_nationalization.memorial'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="memorial_no" id="memorial_no"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-12">
							<label>@lang('admissioninfo.image'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="file" name="image" id="image">
							</div>
						</div>
						<div class="modal-footer border-0">
							<button type="button" class="btn btn-secondary border-0" onClick="window.location.reload();">@lang('common.close')</button>
							<button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
						</div>
					</div>

				</form> --}}
			</div> <!-- end card body-->
        </div>
		</div> <!-- end card -->
	</div><!-- end col-->
</div>



<script src="{{ asset('assets/js/vendor/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/demo.quilljs.js') }}"></script>



@endsection

