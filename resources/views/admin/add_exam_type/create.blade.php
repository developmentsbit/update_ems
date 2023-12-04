@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />




<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('add_exam_type.add_exam_type')
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
                    {{ route('add_exam_type.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">

		<div class="card">
			<div class="card-body">
				<h3>@lang('add_exam_type.add_exam_type')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('add_exam_type.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="row myinput">
						<div class="form-group mb-3 col-md-4">
							<label>@lang('add_exam_type.examcode'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="exam_code" id="exam_code"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('syllabus.classname'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control" name="class_id" id="class_id">
									@if(isset($class))
									@foreach($class as $c)
									<option value="{{ $c->id }}">@if($lang == 'en'){{ $c->class_name }}@else {{$c->class_name_bn}}@endif</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('add_exam_type.examname'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="exam_name" id="exam_name"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('add_exam_type.examname_bn'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="exam_name_bn" id="exam_name_bn"  >
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('add_exam_type.compulsory'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="compulsory" id="compulsory"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('add_exam_type.compulsory'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="compulsory_bn" id="compulsory_bn"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('addgroup.status'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control" name="status">
									<option value="1">@lang('common.active')</option>
									<option value="2">@lang('common.inactive')</option>
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('common.sl'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="order_by" id="order_by">
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

