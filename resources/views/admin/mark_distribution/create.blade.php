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
input.form-control form-control-sm ,.form-select{
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
                @lang('mark_distribution.addtitle')
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
                    {{ route('mark_distribution.index') }}
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
				<form method="post" action="{{ route('mark_distribution.store') }}">
                    @csrf
					<div class="row">
						<div class="col-md-6 mt-2">
							<div class="row ">
								<label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
									@lang('mark_distribution.select_class') :</label>
								<div class="col-sm-7">
									<select class="form-control form-control-sm" id="class_id" name="class_id" onchange="getExamTypes();getMarksClassGropup();getMarksSubjects();" required="">
										<option value="">Select One</option>
                                        @if(isset($data['class']))
                                        @foreach ($data['class'] as $v)
                                        <option value="{{$v->id}}">@if($lang == 'en'){{$v->class_name ?: $v->class_name_bn}} @else {{ $v->class_name_bn ?: $v->class_name }} @endif</option>
                                        @endforeach
                                        @endif
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 mt-2">
							<div class="row ">
								<label for="exam_type_id" class="col-sm-4 col-form-label  text-md-end text-dark"> @lang('mark_distribution.exam_type')  :</label>
								<div class="col-sm-7" id="examTypeBox">
									<select class="form-control form-control-sm" id="exam_type_id" name="exam_type_id" required>
										<option value="">Select One</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 mt-2" id="groupFullBox">
							<div class="row ">
								<label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
									@lang('mark_distribution.select_group')  :</label>
								<div class="col-sm-7" id="groupData">
									<select class="form-control form-control-sm" id="group_id" name="group_id">
										<option value="">Select One</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 mt-2">
							<div class="row ">
								<label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
									@lang('mark_distribution.subject_type')  :</label>
								<div class="col-sm-7">
									<select class="form-control form-control-sm" id="subject_type" name="subject_type" onchange="getMarksSubjects()">
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
									@lang('mark_distribution.subject_name')  :</label>
								<div class="col-sm-7" id="subjectBox">
									<select class="form-control form-control-sm" id="subject_id" name="subject_id" onchange="getSubjectPart();getSubjectCode();" required>
										<option value="">Select One</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 mt-2" id="subjectPartBox">
							<div class="row ">
								<label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
								@lang('mark_distribution.subject_part_name') :</label>
								<div class="col-sm-7" id="subjectPartData">
									<select class="form-control form-control-sm" id="subject_part_id" name="subject_part_id" onchange="getSubjectpartCode()">
										<option value="">Select One</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 mt-2">
							<div class="row ">
								<label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
									@lang('mark_distribution.subject_code') :</label>
								<div class="col-sm-7">
									<input class="form-control form-control-sm border-dark" type="text" readonly name="subject_code" id="subject_code">
								</div>
							</div>
						</div>
                        <br>
                        <hr>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 15%;">@lang('mark_distribution.creative')</th>
                                    <th style="width: 15%;">@lang('mark_distribution.mcq')</th>
                                    <th style="width: 15%;">@lang('mark_distribution.practical')</th>
                                    <th style="width: 15%;">Cont. Asses.</th>
                                    <th style="width: 15%;">@lang('mark_distribution.total')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input class="form-control form-control-sm border-dark" type="number" name="written" id="written" value="0" onkeyup="getTotal()">
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm border-dark" type="number" name="mcq" id="mcq" value="0" onkeyup="getTotal()">
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm border-dark" type="number" name="practical" id="practical" value="0" onkeyup="getTotal()">
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm border-dark" type="number" name="count_asses" id="count_asses" value="0" onkeyup="getTotal()">
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm border-dark" type="number" name="total" id="total" value="0" readonly>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

						<div class="text-center mt-4 ">
							<button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
						</div>
					</div>
				</form>
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

<script>
     function getSubjectCode()
    {
        const subject_id = $('#subject_id').val();

        if(subject_id != '')
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}',
                },

                url : '{{ url('getSubjectCode') }}',

                type : "POST",

                data : {subject_id},

                beforeSend : function()
                {
                    $('#subject_code').val('Loadng...');
                },

                success : function(res)
                {
                    $('#subject_code').val(res);
                }
            });
        }
    }

    function getSubjectpartCode()
    {
        const subject_part_id = $('#subject_part_id').val();
        if(subject_part_id != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('getSubjectPartCode') }}',

                type : "POST",

                data : {subject_part_id},

                beforeSend : function()
                {
                    $('#subject_code').val('Loadng...');
                },

                success : function(res)
                {
                    $('#subject_code').val(res);
                }
            });
        }
    }
</script>

<script>
    function getTotal()
    {
        const mcq = $('#mcq').val();
        const written = $('#written').val();
        const practical = $('#practical').val();
        const count_asses = $('#count_asses').val();
        let total;
        total = parseInt(mcq) + parseInt(written) + parseInt(practical) + parseInt(count_asses);

        if(total > 100)
        {
            $('#mcq').val('0');
            $('#written').val('0');
            $('#practical').val('0');
            $('#count_asses').val('0');
            total = 0;
        }

        if(total > 0)
        {
            $('#total').addClass('bg-success');
        }
        else
        {
            $('#total').removeClass('bg-success');
        }



        $('#total').val(total);
    }
</script>

@endsection
