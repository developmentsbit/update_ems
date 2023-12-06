@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />




<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('add_noc.edittitle')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
            @if (\App\Traits\RolePermissionTrait::checkRoleHasPermission('role', 'create'))
                @slot('action_button1')
                    @lang('common.view')
                @endslot
                @slot('action_button1_link')
                    {{ route('add_noc.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3>@lang('add_noc.edittitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('add_noc.update',$data->id) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row myinput">
						<div class="form-group mb-3 col-md-6">
							<label>@lang('common.date') <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
                                <input type="text" name="date" class="form-control form-control-sm date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" value="{{ $date }}" required>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_noc.serial_no'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control form-control-sm" type="text" name="serial_no" id="serial_no"  required="" value="{{ $data->serial_no }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_noc.title_en'): </label>
							<div class="input-group mt-2">
								<input class="form-control form-control-sm" type="text" name="title" id="title"  value="{{ $data->title }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_noc.title_bn'): </label>
							<div class="input-group mt-2">
								<input class="form-control form-control-sm" type="text" name="title_bn" id="title_bn"  value="{{ $data->title_bn }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_noc.details_en'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<textarea id="summernote"  class="form-control form-control-sm w-100" rows="10" type="text" name="details">{{ $data->details }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_noc.details_bn'): </label>
							<div class="input-group mt-2">
								<textarea id="summernote1"  class="form-control form-control-sm w-100" rows="10" type="text" name="details_bn">{{ $data->details_bn }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_noc.image'):</label>
							<div class="input-group mt-2">
								<input class="form-control form-control-sm" type="file" name="image" id="image">
								<br>
							</div>
							<a href="{{ asset($data->image) }}" download="" class="btn btn-info">@lang('common.downloads')</a>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('common.status'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control form-control-sm" name="status">
                                    <option @if($data->status == 1) selected @endif value="1">@lang('common.active')</option>
                                    <option @if($data->status == 0) selected @endif value="0">@lang('common.inactive')</option>
                                </select>
							</div>
						</div>
						<div class="modal-footer border-0">
							<button type="button" class="btn btn-secondary border-0" onClick="window.location.reload();">@lang('common.close')</button>
							<button type="submit" class="btn btn-success button border-0">@lang('common.update')</button>
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

