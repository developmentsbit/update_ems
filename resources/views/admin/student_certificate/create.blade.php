@extends('layouts.master')
@section('content')
<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />
<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('student_certificate.create_title')
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
                    {{ route('student_certificate.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
        <style>
            .form-group{
                margin-top: 10px;
            }
        </style>
	<div class="col-12">

		<div class="card">
			<div class="card-body">
				<h3>@lang('student_certificate.create_title')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('student_certificate.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="row jumbotron">

                        <div class="col-sm-12 form-group">
                            <label >@lang('student_certificate.name')</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label >@lang('student_certificate.father_name')</label>
                            <input type="text" class="form-control" name="father_name"  required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label >@lang('student_certificate.mother_name')</label>
                            <input type="text" class="form-control" name="mother_name" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label >@lang('student_certificate.village')</label>
                            <input type="text" class="form-control" name="village"  required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label >@lang('student_certificate.post_office')</label>
                            <input type="text" class="form-control" name="post_office" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label > @lang('student_certificate.upazila')</label>
                            <input type="text" class="form-control" name="upazila"  required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label >@lang('student_certificate.district')</label>
                            <input type="text" class="form-control" name="district"  required>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label >@lang('student_certificate.class')</label>
                            <input type="text" class="form-control" name="class" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label > @lang('student_certificate.roll')</label>
                            <input type="text" class="form-control" name="roll" required>

                        </div>
                        <div class="col-sm-6 form-group">
                            <label >@lang('student_certificate.birth_date')</label>
                            <input type="date" name="birth_date" class="form-control" name="date"  required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label >@lang('student_certificate.date_in_word')</label>
                            <input type="text" class="form-control" name="birth_date_text"   required>
                        </div>


                        <div class="col-sm-12 form-group mb-0 text-center ">
                           <!-- <button class="btn btn-primary ">Submit</button> -->
                           <input type="submit" name="save" class="btn btn-primary">
                           <a href="view-testimonial.php" class="btn btn-info">View</a>
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

