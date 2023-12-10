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
input.form-control ,.select2, .form-check-input{
    border-radius: 0px !important;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
    /* border:1px solid #aaa; */
    border-radius: 0px;
}

</style>

@php
use App\Models\subject_reg_info;
@endphp

<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('student_info.registration')
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
                    {{ route('student_info.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
		<div class="card-body">
            <form method="POST" action="{{ url('editStudentRegistration') }}">
                @csrf

            <div class="form row">
                <div class="col-lg-4 col-md-4 col-12">
                    <label>@lang('student_info.student_id')</label>
                    <input type="text" class="form-control form-control-sm" readonly name="student_id" value="{{$data->student_id}}">
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <label>@lang('student_info.name')</label>
                    <input type="text" class="form-control form-control-sm" readonly name="name" value="{{$data->student_name}}">
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <label>@lang('student_info.session')</label>
                    <input type="text" class="form-control form-control-sm" readonly name="session" value="{{$data->session}}">
                </div>
            </div>
            <div class="main-form mt-2">
                <table class="table table-bordered">
                    <tr>
                        <td>@lang('student_info.roll')</td>
                        <td>
                            <input type="text" name="class_roll" class="form-control form-control-sm" required placeholder="Class Roll" value="{{ $student_reg_info->class_roll }}">
                        </td>
                        <td>@lang('student_info.class')</td>
                        <td>
                            <select class="form-control form-control-sm" name="class_id" id="class_id" onchange="loadRegistrationGroups();loadClassSubject()">
                                <option value="">@lang('common.select_one')</option>
                                @if(isset($class))
                                @foreach ($class as $c)

                                <option @if($c->id == $data->class_id) selected @endif value="{{ $c->id }}">
                                    @if($lang == 'en')
                                    {{ $c->class_name ?: $c->class_name_bn }}
                                    @else
                                    {{ $c->class_name_bn ?: $c->class_name }}
                                    @endif
                                </option>

                                @endforeach
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>@lang('student_info.group')</td>
                        <td id="groupsBox">
                            <select class="form-control form-control-sm" name="group_id" id="group_id" onchange="loadGroupSubjects()">
                                <option value="">@lang('common.select_one')</option>
                                @if(isset($group))
                                @foreach ($group as $g)
                                <option @if($g->id == $data->group_id) selected @endif value="{{ $g->id }}">
                                @if($lang == 'en')
                                {{ $g->group_name ?: $g->group_name_bn }}
                                @else
                                {{ $g->group_name_bn ?: $g->group_name_en }}
                                @endif
                                </option>
                                @endforeach
                                @endif
                            </select>
                        </td>
                        <td>@lang('student_info.section')</td>
                        <td>
                            <select class="form-control form-control-sm" name="section_id" id="section_id">
                                <option value="">@lang('common.select_one')</option>
                                @if(isset($section))
                                @foreach ($section as $s)
                                <option @if($student_reg_info->section_id == $s->id) selected @endif value="{{ $s->id }}">{{ $s->section_name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-success">@lang('student_info.compulsory')</th>
                        <th class="table-primary">@lang('student_info.group_subject')</th>
                        <th class="table-info" colspan="2">@lang('student_info.optional')</th>
                    </tr>
                    <tr>
                        <td id="csBox">
                            @if($compulsory_subjects)
                            @foreach ($compulsory_subjects as $cs)
                            <div class="form-check">
                                <label>
                                    <input type="checkbox" name="subject_id[]" value="{{ $cs->id }}" class="form-check-input" checked>
                                    {{$cs->subject_name}} <span class="text-danger">( {{$cs->subject_code}} ) </span>
                                </label>
                            </div>
                            @endforeach
                            @endif
                        </td>
                        <td id="gsBox">
                            @if($group_subject)
                            @foreach ($group_subject as $gs)

                            @php
                            $group_subject = subject_reg_info::where('student_id',$data->student_id)->where('subject_id',$gs->id)->pluck('subject_id')->first();
                            @endphp

                            <div class="form-check">
                                <label>
                                    <input type="checkbox" name="subject_id[]" value="{{ $gs->id }}" class="form-check-input" @if($group_subject == $gs->id) checked @endif>
                                    {{$gs->subject_name}} <span class="text-danger">( {{$gs->subject_code}} ) </span>
                                </label>
                            </div>
                            @endforeach
                            @endif
                        </td>
                        <td id="osBox">
                            @if($optional_subject)
                            @foreach ($optional_subject as $os)
                            @php
                            $optional_subject = subject_reg_info::where('student_id',$data->student_id)->where('subject_id',$os->id)->pluck('subject_id')->first();
                            @endphp
                            <div class="form-check">
                                <label>
                                    <input type="radio" name="subject_id[]" value="{{ $os->id }}" class="form-check-input" @if($optional_subject == $os->id) checked @endif>
                                    {{$os->subject_name}} <span class="text-danger">( {{$os->subject_code}} ) </span>
                                </label>
                            </div>
                            @endforeach
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            <div class="submit_box mt-2" style="text-align: center;">
                <button type="submit" class="btn btn-success btn-sm">@lang('common.save')</button>
            </div>
            </form>
        </div>
		</div> <!-- end card -->
	</div><!-- end col-->
</div>

<script src="{{ asset('assets/js/vendor/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/demo.quilljs.js') }}"></script>

<script>
    function loadRegistrationGroups()
    {
        const class_id = $('#class_id').val();
        if(class_id != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },
                url : '{{ url('loadRegistrationGroups') }}',

                type : "POST",

                data : {class_id},

                beforeSend : function(){
                    $('#groupsBox').html('Loading...');
                },
                success : function(res)
                {
                    $('#groupsBox').html(res);
                }
            });
        }
        else
        {
            alert('Select Class First');
            $('#groupsBox').html('');
            $('#csBox').html('');
            $('#gsBox').html('');
            $('#osBox').html('');
        }
    }

    function loadClassSubject()
    {
        const class_id = $('#class_id').val();
        if(class_id != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('loadClassSubject') }}',

                type : 'POST',

                data : {class_id},

                beforeSend : function()
                {
                    $('#csBox').html('Loading...');
                },
                success : function(res)
                {
                    $('#csBox').html(res);
                    $('#gsBox').html('');
                    $('#osBox').html('');
                }
            })
        }
    }

    function loadGroupSubjects()
    {
        const class_id = $('#class_id').val();
        const group_id = $('#group_id').val();
        if(group_id != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },
                url : '{{ url('loadGroupSubjects') }}',

                type : "POST",

                data : {class_id,group_id},

                beforeSend : function()
                {
                    $('#gsBox').html('Loading...');
                    $('#osBox').html('Loading...');
                },

                success : function(res)
                {
                    console.log(res);
                    $('#gsBox').html(res['group']);
                    $('#osBox').html(res['optional']);
                }
            });
        }
        else
        {
            $('#gsBox').html('');
            $('#osBox').html('');
        }
    }
</script>

@endsection

