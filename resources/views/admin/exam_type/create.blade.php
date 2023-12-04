@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />

<style>
input.form-control ,.form-select{
    border: 1px solid black !important;
    border-radius: 0px;
}
.limit {
    margin-left: 220px;
}
.to_limit_do{
    border: 1px solid black !important;
    border-radius: 0px;
    width: 131px;
}
</style>


<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('exam_type.addtitle')
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
                    {{ route('exam_type.index') }}
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
                    <div class="main_from mt-2">
                        <h5 class="bg-dark text-light border-bottom border-3 border-info rounded-bottom fs-5 p-2 ">@lang('exam_type.addtitle') :</h5>
                      </div>
                 
                </div>
                <div class="from">
                
                    <form class="">
                            <div class="row mx-5">
                                <div class="col-md-8 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
                                            @lang('exam_type.select_class') :</label>
                                        <div class="col-sm-7">
                                            <select class="form-select" id="session" name="session">
                                                <option selected>
                                                  Select One</option>
                                              </select>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-8 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark"> @lang('exam_type.exam_type')  :</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control">
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-8 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark"> @lang('exam_type.compulsory_subject')  :</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control">
                                        </div>
                                  </div>
                                </div>
                                <div class="text-center mt-4 ">
                                    <button type="button" class="btn btn-secondary border-0" onClick="window.location.reload();">@lang('common.close')</button>
                                    <button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
                                </div>
                            </div>
                       
                      </form>
                      
                </div>
				
			</div> <!-- end card body-->
        </div>
		</div> <!-- end card -->
	</div><!-- end col-->
</div>



<script src="{{ asset('assets/js/vendor/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/demo.quilljs.js') }}"></script>



@endsection

    