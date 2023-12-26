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
input.form-control ,.form-control form-control-sm{
    border: 1px solid black;
    border-radius: 0px;
}
/* .from{
    width: 1000px;
    margin-left: 8%;
} */
</style>


<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('result_entry.add_mark')
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
                    {{ route('add_marks.index') }}
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
                <div class="from ms-md-5 ">
                    <form class="">
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
                                            @lang('add_marks.select_class') :</label>
                                        <div class="col-sm-7">
                                            <select class="form-control form-control-sm" id="class_id" name="class_id" onchange="getExamTypes();getMarksClassGropup();getMarksSubjects()">
                                                <option value="">Select One</option>
                                                @if($params['class'])
                                                @foreach ($params['class'] as $v)
                                                <option value="{{ $v->id }}">
                                                    @if($lang == 'en')
                                                    {{ $v->class_name ?: $v->class_name_bn }}
                                                    @else
                                                    {{ $v->class_name_bn ?: $v->class_name }}
                                                    @endif
                                                </option>
                                                @endforeach
                                                @endif
                                              </select>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-6 mt-2" id="">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark"> @lang('add_marks.exam_type')  :</label>
                                        <div class="col-sm-7" id="examTypeBox">
                                            <select class="form-control form-control-sm" id="exam_type_id" name="exam_type_id">
                                                <option value="">
                                                  Select One</option>
                                              </select>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
                                            @lang('add_marks.select_subject_type') :</label>
                                        <div class="col-sm-7">
                                            <select class="form-control form-control-sm" id="subject_type" name="subject_type">
                                                <option value="1">Compulsory Subject</option>
                                                <option value="2">Group Subject</option>
                                                <option value="3">Optional Subject</option>
                                              </select>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
                                            @lang('add_marks.select_group')  :</label>
                                        <div class="col-sm-7" id="groupData">
                                            <select class="form-control form-control-sm" id="group_id" name="group_id" onchange="loadGroupsSubject()">
                                                <option value="">
                                                  Select One</option>
                                              </select>
                                        </div>
                                  </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
                                            @lang('add_marks.subject_name') :</label>
                                        <div class="col-sm-7" id="subjectBox">
                                            <select class="form-control form-control-sm" id="subject_id" name="subject_id" required onchcange="getSubjectPart()">
                                                <option value="">
                                                  Select One</option>
                                              </select>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
                                            @lang('add_marks.part_name') :</label>
                                        <div class="col-sm-7" id="subjectPartData">
                                            <select class="form-control form-control-sm" id="subject_part_id" name="subject_part_id">
                                                <option selected>
                                                  Select One</option>
                                              </select>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
                                            @lang('add_marks.session') :</label>
                                        <div class="col-sm-7">
                                            <select class="form-control form-control-sm" id="session" name="session">
                                                <option selected>
                                                  Select One</option>
                                              </select>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
                                            @lang('add_marks.section') :</label>
                                        <div class="col-sm-7">
                                            <select class="form-control form-control-sm" id="session" name="session">
                                                <option selected>
                                                  Select One</option>
                                              </select>
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


<script>
    function getExamTypes()
    {
        const class_id = $('#class_id').val();
        if(class_id != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('getExamType') }}',

                type : "POST",

                data : {class_id},

                beforeSend : function(){
                    $('#examTypeBox').html('Loading...');
                },
                success : function(res){
                    $('#examTypeBox').html(res);
                }
            });
        }
    }

    function getMarksClassGropup()
    {
        const class_id = $('#class_id').val();
        // alert(class_id);
        if(class_id != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('getMarksClassGropup') }}',

                type : "POST",

                data : {class_id},

                beforeSend : function(){
                    $('#groupData').html('Loading...');
                },
                success : function(res){
                    if(res == 'no_group')
                    {
                        $('#groupFullBox').hide();
                    }
                    else
                    {
                        $('#groupFullBox').show();
                        $('#groupData').html(res);
                    }
                }
            });
        }
    }

    function getMarksSubjects()
    {
        const class_id = $('#class_id').val();
        const group_id = $('#group_id').val();
        const subject_type = $('#subject_type').val();

        $.ajax({
            headers : {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },

            url : '{{ url('getMarksSubjects') }}',

            type : "POST",

            data : {class_id,group_id,subject_type},

            beforeSend : function()
            {
                $('#subjectBox').html('Loading...');
            },

            success : function(res)
            {
                $('#subjectBox').html(res);
            }
        })
    }

    function loadGroupsSubject()
    {
        let class_id = $('#class_id').val();
        let subject_type = $('#subject_type').val();
        let group_id = $('#group_id').val();
        $.ajax({
            headers : {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },

            url : '{{ url('loadGroupsSubject') }}',

            type : 'POST',

            data : { class_id, subject_type, group_id },

            beforeSend : function()
            {
                $('#subjectBox').html('Loading...');
            },

            success : function(res)
            {
                $('#subjectBox').html(res);
            }
        });
    }

    function getSubjectPart()
    {
        const subject_id = $('#subject_id').val();
        if(subject_id != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('getSubjectPart') }}',

                type : "POST",

                data : {subject_id},

                beforeSend : function(){
                    $('#subjectPartData').html('Loading....');
                },

                success : function(res)
                {
                    if(res == 'no_part')
                    {
                        $('#subjectPartBox').hide();
                    }
                    else
                    {
                        $('#subjectPartBox').show();
                        $('#subjectPartData').html(res);
                    }
                }
            })
        }
    }

</script>


@endsection

