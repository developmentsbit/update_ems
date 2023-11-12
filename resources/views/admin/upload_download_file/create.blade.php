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
                @lang('upload_download_file.addtitle')
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
                    {{ route('upload_download_file.index') }}
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
                        <h5 class="bg-dark text-light border-bottom border-3 border-info rounded-bottom fs-5 p-2">@lang('upload_download_file.addtitle')</h5>
                    </div>
                    <div class="form">
                        <form method="post" class="row g-3 mt-0 btn-submit" action="{{ route('upload_download_file.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 mt-3">
                                <label class="col-sm-4 col-form-label">@lang('common.date') :</label>
                                <input type="text" name="date" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" value="{{ old('date') }}" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                                <label class="col-sm-4 col-form-label">@lang('upload_download_file.title_en')  : <span class="text-danger" style="font-size: 15px;">*</span> </label>
                                <input type="text" class="form-control" name="title_en" id="title_en" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                                <label class="col-sm-4 col-form-label">@lang('upload_download_file.title_bn')  :</label>
                                <input type="text" class="form-control" name="title_bn" id="title_bn">
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 mt-3">
                                <label class="col-sm-4 col-form-label" >@lang('common.status') : <span class="text-danger" style="font-size: 15px;">*</span></label>
                                <select class="form-select select2" data-toggle="select2" name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-12 mt-3">
                                <label class="col-sm-4 col-form-label">@lang('upload_download_file.image')  : <span class="text-danger" style="font-size: 15px;">*</span> </label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                            <div class="text-center mt-4 ">
                                <button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>


<script src="{{ asset('assets/js/vendor/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/demo.quilljs.js') }}"></script>



@endsection

