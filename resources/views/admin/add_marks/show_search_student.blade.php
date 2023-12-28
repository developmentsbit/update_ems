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
table{
    width: 100%;
}
table, tr, td, th{
    border: 1px solid lightgray;
    padding : 5px;
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
                <div class="">
                    <form method="GET" action="{{ url('searchingStudent') }}">
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
                                            @lang('add_marks.select_class') :</label>
                                        <div class="col-sm-7">
                                            <select class="form-control form-control-sm" id="class_id" name="class_id" readonly>
                                                <option value="{{ $params['class']->id }}">{{$params['class']->class_name}}</option>
                                              </select>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-6 mt-2" id="">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark"> @lang('add_marks.exam_type')  :</label>
                                        <div class="col-sm-7" id="examTypeBox">
                                            <select class="form-control form-control-sm" id="exam_type_id" name="exam_type_id" readonly>
                                                <option value="{{ $params['exam']->id }}">
                                                  {{$params['exam']->exam_name}}</option>
                                              </select>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
                                            @lang('add_marks.select_subject_type') :</label>
                                        <div class="col-sm-7">
                                            <select class="form-control form-control-sm" id="subject_type" name="subject_type" readonly>
                                                @if($params['subject_type'] == 1)
                                                <option value="1">Compulsory Subject</option>
                                                @elseif($params['subject_type'] == 2)
                                                <option value="2">Group Subject</option>
                                                @else
                                                <option value="3">Optional Subject</option>
                                                @endif
                                              </select>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
                                            @lang('add_marks.select_group')  :</label>
                                        <div class="col-sm-7" id="groupData">
                                            <select class="form-control form-control-sm" id="group_id" name="group_id" onchange="">
                                                @if(isset($params['group']))
                                                <option value="{{ $params['group']->id }}">
                                                  {{$params['group']->group_name}}
                                                </option>
                                                @endif
                                              </select>
                                        </div>
                                  </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
                                            @lang('add_marks.subject_name') :</label>
                                        <div class="col-sm-7" id="subjectBox">
                                            <select class="form-control form-control-sm" id="subject_id" name="subject_id" required onchcange="" readonly>
                                                <option value="{{ $params['subject']->id }}">
                                                  {{$params['subject']->subject_name}}
                                                </option>
                                              </select>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
                                            @lang('add_marks.part_name') :</label>
                                        <div class="col-sm-7" id="subjectPartData">
                                            <select class="form-control form-control-sm" id="subject_part_id" name="subject_part_id" readonly>
                                                @if(isset($params['subject_part']))
                                                <option value="{{ $params['subject_part']->id }}">
                                                  {{$params['subject_part']->part_name}}
                                                </option>
                                                @endif
                                              </select>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
                                            @lang('add_marks.session') :</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="session" id="session" value="{{ $params['session'] }}" readonly class="form-control form-control-sm">
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="row ">
                                        <label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
                                            @lang('add_marks.section') :</label>
                                        <div class="col-sm-7" id="sectionBox">
                                            <select class="form-control form-control-sm" id="section_id" name="section_id" readonly>
                                                @if(isset($params['section']))
                                                <option value="{{ $params['section']->id }}">
                                                {{ $params['section']->section_name }}
                                                </option>
                                                @endif
                                              </select>
                                        </div>
                                  </div>
                                </div>
                            </div>
                            @php
                            $i= 1;
                            @endphp
                            <input type="hidden" id="limit_mcq" value="{{ $params['marks_entry']->mcq }}">
                            <input type="hidden" id="limit_written" value="{{ $params['marks_entry']->written }}">
                            <input type="hidden" id="limit_practical" value="{{ $params['marks_entry']->practical }}">
                            <input type="hidden" id="limit_count_asses" value="{{ $params['marks_entry']->count_asses }}">
                            <table class="">
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="form-control form-control-sm bg-danger" value="10" style="color:white;">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control form-control-sm bg-danger" value="20" style="color:white;">
                                    </td>
                                    <td colspan="5">
                                        <button class="btn btn-sm btn-success">
                                            <i class="fa fa-filter"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th rowspan="2" width="5%;">Sl No</th>
                                    <th rowspan="2" width="10%">Student ID</th>
                                    <th rowspan="2" width="15%">Name</th>
                                    <th rowspan="2" width="10%">Full Mark</th>
                                    <th colspan="4" style="text-align: center;">Marks</th>
                                    <th rowspan="2">Obtain Marks</th>
                                    <th rowspan="2">Letter Grade</th>
                                </tr>
                                <tr>
                                    <th>MCQ</th>
                                    <th>Written</th>
                                    <th>Practical</th>
                                    <th>Count Asses</th>
                                </tr>
                               <tbody>
                                @if ($params['student'])
                                @foreach ($params['student'] as $s)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        {{ $s->student_id }}
                                    </td>
                                    <td>
                                        {{ $s->student_name }}
                                    </td>
                                    <td>
                                        {{ $s->total }}
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" onkeyup="getTotalMarks({{ $s->student_id }});CheckingNumber({{ $s->student_id }})" id="mcq-{{ $s->student_id }}" name="mcq[]" value="{{ $s->mcq }}" required>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" onkeyup="getTotalMarks({{ $s->student_id }});CheckingNumber({{ $s->student_id }})" id="written-{{ $s->student_id }}" name="written[]" value="{{ $s->written }}" required>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" onkeyup="getTotalMarks({{ $s->student_id }});CheckingNumber({{ $s->student_id }})" id="practical-{{ $s->student_id }}" name="practical[]" value="{{ $s->practical }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" onkeyup="getTotalMarks({{ $s->student_id }});CheckingNumber({{ $s->student_id }})" id="count_asses-{{ $s->student_id }}" name="count_asses[]" value="{{ $s->count_asses }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm @if($s->total > 33) bg-success text-light @endif" id="obtain_marks-{{ $s->student_id }}" name="obtain_marks[]" value="{{ $s->total }}" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm @if($s->total > 33) bg-success text-light @endif " id="letter_grade-{{ $s->student_id }}" name="letter_grade[]" value="A+">
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                               </tbody>
                            </table>
                            </div>
                            <div class="text-center mt-2">
                                <button class="btn btn-sm btn-info"><i class="fa fa-save"></i> Save</button>
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

    function CheckingNumber(studentId)
    {
        let mcq = $('#mcq-'+studentId).val();
        let written = $('#written-'+studentId).val();
        let practical = $('#practical-'+studentId).val();
        let count_asses = $('#count_asses-'+studentId).val();

        let limit_mcq = $('#limit_mcq').val();
        let limit_written = $('#limit_written').val();
        let limit_practical = $('#limit_practical').val();
        let limit_count_asses = $('#limit_count_asses').val();
        if(parseInt(mcq) > parseInt(limit_mcq))
        {
            $('#mcq-'+studentId).val(limit_mcq);
        }

        if(written > limit_written)
        {
            $('#written-'+studentId).val(limit_written);
        }

        if(practical > limit_practical)
        {
            $('#practical-'+studentId).val(limit_practical);
        }

        if(count_asses > limit_count_asses)
        {
            $('#count_asses-'+studentId).val(limit_count_asses);
        }
    }

    function getTotalMarks(studentId)
    {
        let mcq = $('#mcq-'+studentId).val();
        let written = $('#written-'+studentId).val();
        let practical = $('#practical-'+studentId).val();
        let count_asses = $('#count_asses-'+studentId).val();

        let limit_mcq = $('#limit_mcq').val();
        let limit_written = $('#limit_written').val();
        let limit_practical = $('#limit_practical').val();
        let limit_count_asses = $('#limit_count_asses').val();



        let result;
        result = parseInt(mcq) + parseInt(written) + parseInt(practical) + parseInt(count_asses);
        let grade;
        if(result >= 80 && result <=  100)
        {
            grade = 'A+';
        }
        else if(result >= 70 && result <= 79)
        {
            grade = 'A';
        }
        else if(result >= 60 && result <= 69)
        {
            grade = 'A-';
        }
        else if(result >= 50 && result <= 59)
        {
            grade = 'B';
        }
        else if(result >= 40 && result <= 49)
        {
            grade = 'C';
        }
        else if(result >= 33 && result <= 39)
        {
            grade = 'D';
        }
        else
        {
            grade = 'F';
        }

        $('#letter_grade-'+studentId).val(grade);

        if(result >= 33)
        {
            $('#letter_grade-'+studentId).removeClass('bg-danger text-light');
            $('#letter_grade-'+studentId).addClass('bg-success text-light');
        }
        else if(result < 33)
        {

            $('#letter_grade-'+studentId).removeClass('bg-success text-light');
            $('#letter_grade-'+studentId).addClass('bg-danger text-light');

        }


        $('#obtain_marks-'+studentId).val(result);
        if(result < 33)
        {
            $('#obtain_marks-'+studentId).removeClass('bg-success');
            $('#obtain_marks-'+studentId).addClass('bg-danger');
        }
        else
        {
            $('#obtain_marks-'+studentId).removeClass('bg-danger');
            $('#obtain_marks-'+studentId).addClass('bg-success');

        }
    }
</script>

@endsection

