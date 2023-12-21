@extends('layouts.master')
@section('content')
<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />
<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('expense_entry.managetitle')
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
                    {{ route('supplier_info.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">

		<div class="card">
			<div class="card-body">
				<h3>@lang('supplier_info.title')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('supplier_info.update',$data->id) }}" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
					<div class="row myinput">
                      
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('common.sl'): </label><span class="text-danger">*</span>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="order_by" id="order_by"  required="" value="{{ $data->order_by }}">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('common.name'): </label><span class="text-danger">*</span>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="name" id="name"  required="" value="{{ $data->name }}">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('common.name_bn'): </label>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="name_bn" id="name_bn"  required="" value="{{ $data->name_bn }}">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('common.phone'): </label><span class="text-danger">*</span>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="phone" id="phone"  required="" value="{{ $data->phone }}">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('common.address'): </label> <span class="text-danger">*</span>
							<div class="input-group mt-2">
								<textarea id="summernote" class="form-control w-100" rows="10" type="text" name="address" >{{ $data->address }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('common.address_bn'): </label>
							<div class="input-group mt-2">
								<textarea id="summernote1" class="form-control w-100" rows="10" type="text" name="address_bn" >{{ $data->address_bn }}</textarea>
							</div>
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

