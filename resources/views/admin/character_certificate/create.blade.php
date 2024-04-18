@extends('layouts.master')
@section('content')
<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />
<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('character_certificate.create_title')
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
                    {{ route('character_certificate.index') }}
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
				<h3>@lang('character_certificate.create_title')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('character_certificate.store') }}" enctype="multipart/form-data">
					@csrf
                    <div class="row jumbotron">
                        <div class="col-sm-6 form-group">
                            <label >তারিখ</label>
                            <input type="date" name="date" class="form-control" name="date"  required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label >নাম</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label >পিতার নাম</label>
                            <input type="text" class="form-control" name="father_name"  required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label >মাতার নাম</label>
                            <input type="text" class="form-control" name="mother_name" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label >গ্রাম</label>
                            <input type="text" class="form-control" name="village"  required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label >ডাকঘর</label>
                            <input type="text" class="form-control" name="post_office" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label > উপজেলা</label>
                            <input type="text" class="form-control" name="upazila"  required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label >জেলা</label>
                            <input type="text" class="form-control" name="district"  required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label >যে শ্রেণি থেকে উত্তীর্ণ হয়েছে </label>
                            <input type="text" class="form-control" name="passing_class" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label >পাসের সন</label>
                            <input type="text" class="form-control" name="passing_year" required>

                        </div>


                        <div class="col-sm-6 form-group">
                           <label >গ্রুপ</label>
                            <input type="text" class="form-control" name="group">

                        </div>


                        <!-- <div class="col-sm-6 form-group">
                            <label >গ্রুপ</label>
                            <select class="form-control custom-select browser-default" name="group">
                            <option value="0">মানবিক </option>
                            <option value="1">ব্যাবসা</option>
                            <option value="2">বিজ্ঞান </option>
                           </select>

                        </div> -->
                        <div class="col-sm-6 form-group">
                            <label >গ্রেড পয়েন্ট</label>
                            <input type="text" class="form-control" name="gpa"  required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label > রোল নং </label>
                            <input type="text" class="form-control" name="roll_no"  required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label >রেজিষ্ট্রেশন নং</label>
                            <input type="text" class="form-control" name="reg_no"   required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label > জন্ম তারিখ</label>
                            <input type="date"  class="form-control" name="birth_date"   required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label >সেশন</label>
                            <input type="text"  class="form-control" name="session"   required>
                        </div>


                        <div class="col-sm-12 form-group mb-0 text-center ">
                           <!-- <button class="btn btn-primary ">Submit</button> -->
                           <input type="submit" name="save" class="btn btn-primary">
                           <a href="view_Character_certificate.php" class="btn btn-info">View</a>
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

