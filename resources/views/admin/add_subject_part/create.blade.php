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
				<form method="post" class="btn-submit" action="{{ route('add_subject_part.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="row myinput">
                        <div class="col-lg-4 col-md-4 col-12" style="border-right: 1px solid lightgray;">
                            <div class="row myinput">
                                <div class="form-group mb-3 col-md-12">
                                    <label>@lang('add_subject_part.classname'): <span class="text-danger" style="font-size: 15px;">*</span></label>
                                    <div class="input-group mt-2">
                                        <select class="form-control form-control-sm" name="class_id" id="class_id" onchange="getExams();getGroup();getSubjects();">
                                            <option value="">@lang('common.select_one')</option>
                                            @if(isset($data['class']))
                                            @foreach($data['class'] as $c)
                                            <option value="{{ $c->id }}">@if($lang == 'en'){{ $c->class_name }}@else {{$c->class_name_bn}}@endif</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-md-12" id="examTypeBox">
                                    <label>@lang('add_subject_part.exam_type'):</label>
                                    <div class="input-group mt-2">
                                        <select class="form-control form-control-sm" name="exam_type_id" id="exam_type_id" onchange="return getexam();">
                                            <option value="">@lang('common.select_one')</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-md-12" id="groupBox">
                                    <label>@lang('add_subject_part.groupname'):</label>
                                    <div class="input-group mt-2">
                                        <select class="form-control form-control-sm" name="group_id" id="group_id" onchange="return getgroup();">
                                            <option value="">@lang('common.select_one')</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-md-12">
                                    <label>@lang('add_subject_part.subject_type'):</label>
                                    <div class="input-group mt-2">
                                        <select class="form-control form-control-sm" name="subject_type" id="subject_type" onchange="return getSubjects();">
                                            <option value="">@lang('common.select_one')</option>
                                            <option value="1">Compulsory Subject</option>
                                            <option value="2">Group Subject</option>
                                            <option value="3">Optional Subject</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-md-12" id="subjectBox">
                                    <label>@lang('add_subject_part.subject_name'):</label>
                                    <div class="input-group mt-2">
                                        <select class="form-control form-control-sm" name="subject_id" id="subject_id" onchange="getSubjectInfo()">
                                            <option value="">@lang('common.select_one')</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-8 col-12">
                            <div class="row d-none" id="rightForm">
                                <div class="col-12">
                                    <input type="text" readonly value="" id="slectedSubject" class="form-control">
                                </div>
                                <hr>
                                <div class="form-group mb-3 col-md-6">
                                    <label>@lang('add_subject_part.subject_part_name'): <span class="text-danger" style="font-size: 15px;">*</span></label>
                                    <div class="input-group mt-2">
                                        <input class="form-control form-control-sm" type="text" name="part_name" id="part_name" required="">
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label>@lang('add_subject_part.subject_part_name_bn'): <span class="text-danger" style="font-size: 15px;">*</span></label>
                                    <div class="input-group mt-2">
                                        <input class="form-control form-control-sm" type="text" name="part_name_bn" id="part_name_bn" required="">
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label>@lang('add_subject_part.subject_code'): <span class="text-danger">*</span></label>
                                    <div class="input-group mt-2">
                                        <input class="form-control form-control-sm" type="number" name="part_code" id="part_code">
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label>@lang('add_subject_part.subject_serial_no'): </label>
                                    <div class="input-group mt-2">
                                        <input class="form-control form-control-sm" type="number" name="order_by" id="order_by">
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label>@lang('add_subject_part.status'): <span class="text-danger" style="font-size: 15px;">*</span></label>
                                    <div class="input-group mt-2">
                                        <select class="form-control form-control-sm" name="status">
                                            <option value="1">@lang('common.active')</option>
                                            <option value="2">@lang('common.inactive')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 text-right">
                                    <button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
                                </div>
                            </div>
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
    function getExams()
    {
        const class_id = $('#class_id').val();
        // alert(class_id);
        if(class_id != ' ')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('getExams') }}',

                type : 'POST',

                data : {class_id},

                beforeSend : function(){
                    $('#examTypeBox').html('Loading....');
                },

                success : function(res)
                {
                    $('#examTypeBox').html(res);
                }
            })
        }
    }
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
                $('#groupBox').html('Loading Groups..');
            },
            success : function(res)
            {
                // console.log(res);
                if(res == 'no_group')
                {
                    $('#groupBox').hide();
                }
                else
                {
                    $('#groupBox').show();
                }
                $('#groupBox').html(res);
            }
        });
    }

    function getSubjects()
    {
        const class_id = $('#class_id').val();
        const group_id = $('#group_id').val();
        const subject_type = $('#subject_type').val();

        if(class_id != ' ' || subject_type != ' ')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('getSubjects') }}',

                type : "POST",

                data : {class_id,group_id,subject_type},

                beforeSend : function(){
                    $('#subjectBox').html('Loading...');
                },

                success : function(res)
                {
                    $('#subjectBox').html(res);
                }
            })
        }

    }

    function getSubjectInfo()
    {
        const subject_id = $('#subject_id').val();
        if(subject_id != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },
                url : '{{url('getSubjectInfo')}}',
                type : 'POST',
                data : {subject_id},
                success : function(res)
                {
                    $('#rightForm').removeClass('d-none');
                    $('#slectedSubject').val('Your Selected Subject is : '+res);
                }
            })
        }
    }
</script>



@endsection

