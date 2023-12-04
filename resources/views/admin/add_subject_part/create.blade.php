@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />




<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('add_subject_part.addtitle')
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
                    {{ route('add_subject_part.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
                <div class="main_from mt-2">
                    <h6 class="bg-dark text-light border-bottom border-3 border-info rounded-bottom fs-5 p-2">@lang('add_subject_part.addtitle')</h6>
                </div>
				<form method="post" class="btn-submit" action="{{ route('add_subject_part.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="row myinput">
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject_part.classname'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control" name="class_id" id="class_id" onchange="return getgroup();">
                                    <option value="">@lang('common.select_one')</option>
									@if(isset($class))
									@foreach($class as $c)
									<option value="{{ $c->id }}">@if($lang == 'en'){{ $c->class_name }}@else {{$c->class_name_bn}}@endif</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject_part.exam_type'):</label>
							<div class="input-group mt-2">
								<select class="form-control" name="class_id" id="class_id" onchange="return getexam();">
                                    <option value="">@lang('common.select_one')</option>
									@if(isset($exam))
									@foreach($exam as $e)
									<option value="{{ $c->id }}">@if($lang == 'en'){{ $c->exam_name }}@else {{$c->exam_name_bn}}@endif</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject_part.groupname'):</label>
							<div class="input-group mt-2">
								<select class="form-control" name="class_id" id="class_id" onchange="return getgroup();">
                                    <option value="">@lang('common.select_one')</option>
									@if(isset($group))
									@foreach($group as $g)
									<option value="{{ $g->id }}">@if($lang == 'en'){{ $g->group_name }}@else {{$g->group_name_bn}}@endif</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject_part.subject_type'):</label>
							<div class="input-group mt-2">
								<select class="form-control" name="class_id" id="class_id" onchange="return getsubjecttype();">
                                    <option value="">@lang('common.select_one')</option>
									@if(isset($subject_type))
									@foreach($subject_type as $st)
									<option value="{{ $st->id }}">@if($lang == 'en'){{ $st->subject_type_name }}@else {{$g->subject_type_name_bn}}@endif</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject_part.subject_name'):</label>
							<div class="input-group mt-2">
								<select class="form-control" name="class_id" id="class_id" onchange="return getsubjecttype();">
                                    <option value="">@lang('common.select_one')</option>
									@if(isset($subject))
									@foreach($subject as $st)
									<option value="{{ $st->id }}">@if($lang == 'en'){{ $st->subject_name }}@else {{$g->subject_name_bn}}@endif</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject_part.subject_part_name'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="subject_part_name" id="subject_part_name" required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject_part.subject_code'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="number" name="subject_code" id="subject_code">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject_part.subject_serial_no'): </label>
							<div class="input-group mt-2">
								<input class="form-control" type="number" name="subject_serial_no" id="subject_serial_no">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_subject_part.status'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control" name="status">
									<option value="1">@lang('common.active')</option>
									<option value="2">@lang('common.inactive')</option>
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


<script type="text/javascript">
	function getgroup(){

		var class_id = $("#class_id").val();


		$.ajax({
			url: "{{ url("getgroup") }}/"+class_id,
			type: "get",
			success: function (response) {

				$("#group_id").html(response);

			}
		});
	}
</script>



@endsection

