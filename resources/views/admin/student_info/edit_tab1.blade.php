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
                            <div class="tab-link active">
                                <a href="{{url('student_info/edit/tab1/'.$data->student_id)}}">
                                    <b>১. শিক্ষার্থীর তথ্য</b>
                                </a>
                            </div>
                            <div class="tab-link">
                                <a href="{{url('student_info/edit/tab2/'.$data->student_id)}}">
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

                    <form class="row g-3 mt-0" action="{{ url('studentInfoTab1Update/'.$data->student_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4 mt-2">
                            <label  class="form-label">@lang('student_info.Addmission_date') :</label>
                            <input type="text" class="form-control form-control-sm datepicker" name="admission_date" id="admission_date" value="{{date('d/m/Y')}}" required value="{{$admission_date}}">
                          </div>
                            <div class="col-md-4 mt-2 ">
                              <label for="name" class="form-label">@lang('student_info.name_en')  : <span class="text-danger" style="font-size: 15px;">*</span> </label>
                              <input type="text" class="form-control form-control-sm" name="student_name" id="student_name" required value="{{$data->student_name}}">
                            </div>
                            <div class="col-md-4 mt-2 ">
                              <label for="name_en" class="form-label">@lang('student_info.name')<span class="text-danger" style="font-size: 15px;">*</span></label>
                              <input type="text" class="form-control  form-control-sm" name="student_name_bn" id="student_name_bn" required value="{{ $data->student_name_bn }}">
                            </div>
                            <div class="col-md-4 mt-2">
                              <label for="father_name" class="form-label">@lang('student_info.father_name') :<span class="text-danger" style="font-size: 15px;">*</span> </label>
                              <input type="text" class="form-control  form-control-sm" name="father_name" id="father_name" required value="{{ $data->father_name }}">
                            </div>
                            <div class="col-md-4 mt-2">
                              <label for="mother_name" class="form-label">@lang('student_info.mother_name') :<span class="text-danger" style="font-size: 15px;">*</span> </label>
                              <input type="text" class="form-control  form-control-sm" name="mother_name" id="mother_name" required value="{{ $data->mother_name }}">
                            </div>
                            <div class="col-4">

                            </div>
                            <div class="col-md-3 col-6 mt-3">
                                <div class="row">
                                    <label for="gender" class="col-sm-4 col-form-label" >@lang('student_info.gender') : <span class="text-danger" style="font-size: 15px;">*</span></label>
                                    <div class="col-sm-8">
                                      <select class="form-select select2" data-toggle="select2" name="gender" id="gender">
                                        <option value="">Choose...</option>
                                        <option @if($data->gender == 'Male') selected @endif value="Male">Male</option>
                                        <option @if($data->gender == 'Female') selected @endif value="Female">Female</option>
                                        <option @if($data->gender == 'Others') selected @endif value="Others">Others</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3  col-6 mt-3">
                                <div class="row ">
                                    <label for="nationality" class="col-sm-5 col-form-label">@lang('student_info.nationality') : <span class="text-danger" style="font-size: 15px;">*</span></label>
                                    <div class="col-sm-7">
                                      <select class="form-select select2" data-toggle="select2" id="nationality" name="nationality">
                                        <option @if($data->nationality == 'Bangladeshi') selected @endif value="Bangladeshi">Bangladeshi</option>
                                        <option @if($data->nationality == 'Others') selected @endif value="Others">Others</option>

                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mt-3">
                                <div class="row ">
                                    <label for="religion" class="col-sm-4  col-form-label">@lang('student_info.religion') : <span class="text-danger" style="font-size: 15px;">*</span></label>
                                    <div class="col-sm-8">
                                      <select class="form-select select2" data-toggle="select2" id="religion" name="religion">
                                        <option value="">Choose...</option>
                                        <option @if($data->religion == 'Islam') selected @endif value="Islam">Islam</option>
                                        <option @if($data->religion == 'Hindu') selected @endif value="Hindu">Hindu</option>
                                        <option @if($data->religion == 'Others') selected @endif value="Others">Others</option>

                                      </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3 col-6 mt-3">
                                <div class="row ">
                                    <label for="blood_group" class="col-sm-5 col-form-label">@lang('student_info.blood_group') :</label>
                                    <div class="col-sm-7">
                                      <select class="form-select select2" data-toggle="select2" id="blood_group" name="blood_group">
                                        <option value="">Choose...</option>
                                        <option @if($data->blood_group == 'A+') selected @endif value="A+">A+</option>
                                        <option @if($data->blood_group == 'A-') selected @endif value="A-">A-</option>
                                        <option @if($data->blood_group == 'B+') selected @endif value="B+">B+</option>
                                        <option @if($data->blood_group == 'B-') selected @endif value="B-">B-</option>
                                        <option @if($data->blood_group == 'O+') selected @endif value="O+">O+</option>
                                        <option @if($data->blood_group == 'O-') selected @endif value="O-">O-</option>
                                        <option @if($data->blood_group == 'AB+') selected @endif value="AB+">AB+</option>
                                        <option @if($data->blood_group == 'AB-') selected @endif value="AB-">AB-</option>

                                      </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                              <label for="" class="form-label">@lang('student_info.student_image') :</label>
                              <input type="file" class="form-control form-control-sm" id="imageFile" name="image">
                            </div>
                            <div class="col-md-6 mb-0">
                              <img id="blah" src="{{ asset('student_image') }}/{{$data->image}}" alt="" name="image" style="height: 80px;" />
                            </div>
                        <div class="text-center mt-4 ">
                            <button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
                            <a href="{{url('student_info/edit/tab2')}}/{{$data->student_id}}" type="" class="btn btn-primary button border-0">@lang('common.skip') <i class="fa fa-arrow-right"></i></a>
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
@endsection

