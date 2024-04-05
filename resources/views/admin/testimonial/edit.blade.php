@extends('layouts.master')
@section('content')
<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />
<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('testimonial.edit_title')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
            @if (\App\Traits\RolePermissionTrait::checkRoleHasPermission('role', 'create'))
                @slot('action_button1')
                   <i class="fa fa-eye"></i> @lang('common.view')
                @endslot
                @slot('action_button1_link')
                    {{ route('testimonial.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">

		<div class="card">
			<div class="card-body">
				<h3>@lang('testimonial.edit_title')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('testimonial.update',$data['data']->id) }}" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
					<div class="row myinput">
                        <div class="form-group mb-3 col-md-4">
							<label>@lang('testimonial.student_type'):</label><span class="text-danger">*</span>
							<select class="form-select form-select-sm" name="student_type" id="student_type" required>
                                <option value="">@lang('common.select_one')</option>
                                <option @if($data['data']->student_type == 1) selected @endif value="1">@lang('testimonial.general')</option>
                                <option @if($data['data']->student_type == 2) selected @endif value="2">@lang('testimonial.vocational')</option>
                            </select>
						</div>
                        <div class="form-group mb-3 col-md-4">
							<label>@lang('testimonial.date'):</label><span class="text-danger">*</span>
							<input type="date" id="date" name="date" class="form-control form-control-sm" required value="{{ $data['data']->date }}">
						</div>
                        <div class="form-group mb-3 col-md-4">
							<label>@lang('testimonial.title'):</label><span class="text-danger">*</span>
							<select class="form-select form-select-sm" name="title" id="title" required>
                                <option value="">@lang('common.select_one')</option>
                                <option @if($data['data']->title == 'SSC') selected @endif value="SSC">SSC</option>
                                <option @if($data['data']->title == 'HSC') selected @endif value="HSC">HSC</option>
                            </select>
						</div>
                        <div class="form-group mb-3 col-md-4">
							<label>@lang('testimonial.group'):</label>
							<input type="text" id="group" name="group" class="form-control form-control-sm" value="{{ $data['data']->group_subject }}">
						</div>
                        <div class="form-group mb-3 col-md-4">
							<label>@lang('testimonial.session'):</label><span class="text-danger">*</span>
							<input type="text" id="session" name="session" class="form-control form-control-sm" required value="{{ $data['data']->session }}">
						</div>
                        <div class="form-group mb-3 col-md-4">
							<label>@lang('testimonial.year'):</label><span class="text-danger">*</span>
							<input type="text" id="year" name="year" value="{{$data['data']->year}}" class="form-control form-control-sm" required>
						</div>
                        <div class="form-group mb-3 col-md-4">
							<label>@lang('testimonial.student_status'):</label><span class="text-danger">*</span>
							<select class="form-select form-select-sm" name="student_status" id="student_status" required>
                                <option value="">@lang('common.select_one')</option>
                                <option @if($data['data']->student_status == 1) selected @endif value="1">@lang('testimonial.regular')</option>
                                <option @if($data['data']->student_status == 2) selected @endif value="2">@lang('testimonial.irregular')</option>
                                <option @if($data['data']->student_status == 3) selected @endif value="3">@lang('testimonial.private')</option>
                            </select>
						</div>

                        <div class="form-group mb-3 col-md-4">
							<label>@lang('testimonial.student_name'):</label><span class="text-danger">*</span>
							<input type="text" id="student_name" name="student_name" class="form-control form-control-sm" required value="{{ $data['data']->student_name }}">
						</div>
                        <div class="form-group mb-3 col-md-4">
							<label>@lang('testimonial.father_name'):</label><span class="text-danger">*</span>
							<input type="text" id="father_name" name="father_name" class="form-control form-control-sm" required value="{{ $data['data']->father_name }}">
						</div>
                        <div class="form-group mb-3 col-md-4">
							<label>@lang('testimonial.mother_name'):</label><span class="text-danger">*</span>
							<input type="text" id="mother_name" name="mother_name" class="form-control form-control-sm" required value="{{ $data['data']->mother_name }}">
						</div>
                        <div class="form-group mb-3 col-md-4">
							<label>@lang('testimonial.gender'):</label><span class="text-danger">*</span>
							<select class="form-select form-select-sm" name="gender" id="gender" required>
                                <option value="">@lang('common.select_one')</option>
                                <option @if($data['data']->gender == '1') selected @endif value="1">@lang('common.male')</option>
                                <option @if($data['data']->gender == '2') selected @endif value="2">@lang('common.female')</option>
                                <option @if($data['data']->gender == '3') selected @endif value="3">@lang('common.others')</option>
                            </select>
						</div>

                        <div class="form-group mb-3 col-md-4">
							<label>@lang('testimonial.roll_no'):</label><span class="text-danger">*</span>
							<input type="text" id="roll_no" name="roll_no" class="form-control form-control-sm" required value="{{ $data['data']->roll_no }}">
						</div>
                        <div class="form-group mb-3 col-md-4">
							<label>@lang('testimonial.reg_no'):</label><span class="text-danger">*</span>
							<input type="text" id="reg_no" name="reg_no" class="form-control form-control-sm" required value="{{ $data['data']->reg_no }}">
						</div>
                        <div class="form-group mb-3 col-md-4">
							<label>@lang('testimonial.gpa'):</label><span class="text-danger">*</span>
							<input type="text" id="gpa" name="gpa" class="form-control form-control-sm" required value="{{ $data['data']->gpa }}">
						</div>
                        <div class="form-group mb-3 col-md-4">
							<label>@lang('testimonial.birth_date'):</label>
							<input type="date" id="birth_date" name="birth_date" class="form-control form-control-sm" value="{{ $data['data']->birth_date }}">
						</div>



						<div class="modal-footer border-0">
							<button type="button" class="btn btn-secondary border-0" onClick="window.location.reload();">@lang('common.close')</button>
							<button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
						</div>
					</div>
				</form>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>



<script src="{{ asset('assets/js/vendor/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/demo.quilljs.js') }}"></script>



@endsection

