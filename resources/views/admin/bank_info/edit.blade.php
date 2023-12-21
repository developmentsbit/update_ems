@extends('layouts.master')
@section('content')
<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />
<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('bank_info.managetitle')
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
                    {{ route('bank_info.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">

		<div class="card">
			<div class="card-body">
				<h3>@lang('bank_info.addtitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('bank_info.update',$data->id) }}" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
					<div class="row myinput">
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('bank_info.bank_type'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control form-control-sm" name="type">
                                    <option @if($data->status == 1) selected @endif value="1">@lang('bank_info.bank')</option>
                                    <option @if($data->status == 2) selected @endif value="2">@lang('bank_info.bkash')</option>
								</select>
							</div>
						</div>	
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('bank_info.bank_name'): </label>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="bank_name" id="bank_name" value="{{ $data->bank_name }}">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('bank_info.account_number'): </label>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="account_number" id="account_number" value="{{ $data->account_number }}">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('bank_info.account_type'): </label>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="account_type" id="account_type" value="{{ $data->account_type }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('bank_info.address'): </label>
							<div class="input-group mt-2">
								<textarea id="summernote" class="form-control w-100" rows="10" type="text" name="address" >{{ $data->address }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('bank_info.address_bn'): </label>
							<div class="input-group mt-2">
								<textarea id="summernote1" class="form-control w-100" rows="10" type="text" name="address_bn" >{{ $data->address_bn }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('bank_info.contact'): </label>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="contact" id="contact" value="{{ $data->contact }}">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('addgroup.status'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control form-control-sm" name="status">
                                    <option @if($data->status == 1) selected @endif value="1">@lang('common.active')</option>
                                    <option @if($data->status == 2) selected @endif value="2">@lang('common.inactive')</option>
								</select>
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

