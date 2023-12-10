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
                @lang('session.addtitle')
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
                    {{ route('session.index') }}
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
                    <div class="form">
                        <form method="post" class="row g-3 mt-0 btn-submit" action="{{ route('session.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row myinput">
                                <div class="form-group mb-3 col-md-6">
                                    <label>@lang('session.session'): <span class="text-danger" style="font-size: 15px;">*</span></label>
                                    <div class="input-group mt-2">
                                        <input class="form-control form-control-sm" type="text" name="session" id="session" required="">
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label>@lang('common.status') : <span class="text-danger" style="font-size: 15px;">*</span></label>
                                    <div class="input-group mt-2">
                                        <select class="form-select select2" data-toggle="select2" name="status" id="status">
                                            <option value="1">@lang('common.active')</option>
                                            <option value="2">@lang('common.inactive')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
                                </div>
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

