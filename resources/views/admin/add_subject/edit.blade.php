@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />




<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('add_subject.addtitle')
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
                    {{ route('add_subject.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form method="post" class="btn-submit" action="{{ route('add_subject.update',$data['data']->id )}}" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
					<div class="row myinput">
                        <div class="form-group mb-3 col-md-4">
							<label>@lang('add_subject.subject_serial_no'): </label>
							<div class="input-group mt-2">
								<input class="form-control form-control-sm" type="number" name="serial" id="serial" value="{{ $data['data']->serial }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('add_subject.classname'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control form-control-sm" name="class_id" id="class_id" onchange="return getGroup();" required>
                                    <option value="">@lang('common.select_one')</option>
									@if(isset($data['class']))
									@foreach($data['class'] as $c)
									<option @if($data['data']->class_id == $c->id) selected @endif value="{{ $c->id }}">@if($lang == 'en'){{ $c->class_name }}@else {{$c->class_name_bn}}@endif</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-4" id="groupBox">
							<label>@lang('add_subject.groupname'):</label>
							<div class="input-group mt-2">
								<select class="form-control form-control-sm" name="group_id" id="group_id" onchange="" required>
                                    <option value="">@lang('common.select_one')</option>
                                    @foreach ($data['group'] as $g)
                                    <option @if($data['data']->group_id == $g->id) selected @endif value="{{$g->id}}">
                                        @if($lang == 'en')
                                        {{$g->group_name ?: $g->group_name_bn}}
                                        @else
                                        {{$g->group_name_bn ?: $g->group_name}}

                                        @endif
                                    </option>
                                    @endforeach
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('add_subject.subject_name_en'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control form-control-sm" type="text" name="subject_name_en" id="subject_name_en" required="" value="{{ $data['data']->subject_name }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('add_subject.subject_name_bn'): </label>
							<div class="input-group mt-2">
								<input class="form-control form-control-sm" type="text" name="subject_name_bn" id="subject_name_bn" value="{{ $data['data']->subject_name_bn }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('add_subject.subject_code'): </label>
							<div class="input-group mt-2">
								<input class="form-control form-control-sm" type="text" name="subject_code" id="subject_code" value="{{ $data['data']->subject_code }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('add_subject.select_subject_type'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control form-control-sm" name="subject_type">
									<option @if($data['data']->subject_type == 1) selected @endif value="1">@lang('add_subject.compulsory_subject')</option>
									<option @if($data['data']->subject_type == 2) selected @endif value="2">@lang('add_subject.group_subject')</option>
									<option @if($data['data']->subject_type == 3) selected @endif value="3">@lang('add_subject.optional_subject')</option>
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-4">
							<label>@lang('add_subject.status'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control form-control-sm" name="status">
									<option @if($data['data']->status == '1') selected @endif value="1">@lang('common.active')</option>
									<option @if($data['data']->status == '0') selected @endif value="0">@lang('common.inactive')</option>
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

<script type="text/javascript">
	function getGroup()
    {
        // alert();
        let class_id = $('#class_id').val();
        // let laoding = '';
        // alert(class_id);
        $.ajax({
            headers : {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },
            url : '{{ url('getClassGroup') }}',

            type : 'POST',

            data : {class_id},

            beforeSend : function()
            {
                $('#groupBox').html('Loading Groups.......');
            },
            success : function(res)
            {
                // console.log(res);
                $('#groupBox').html(res);
            }
        });
    }
</script>

<script src="{{ asset('assets/js/vendor/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/demo.quilljs.js') }}"></script>



@endsection

