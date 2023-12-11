<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Information</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<style>
    body{
        font-family: 'Poppins', sans-serif;
    }
    .page{
        width: 210mm;
        height: 297mm;
        border: 1px solid lightgray;
        margin: auto;
        padding: 5px;
    }
    .page_box{
        border : 1px solid black;
        padding: 5px;
        /* border-radius: 10px; */
    }
    .page_header {
    display: flex;
}

.college_info {
    text-align: center;
    align-items: center;
    justify-content: center;
}
.college_info {
    width: 328px;
}
.logo {
    max-width: 74px;
}

.college_info h2 {
    margin: 0px;
}

.std_image {
    text-align: right;
    width: 233px;
}
    @page {
  size: A4;
  margin: 0;
}
.student_image {
    height: 110px;
    width: 110px;
    border: 1px solid lightgray;
    outline: 0px;
    /* float: right; */
    margin-top: 32px;
}
b.page_title {
    font-size: 19px;
    border: 1px solid black;
    padding: 5px;
    border-radius: 100px;
}
span.reg_number {
    border: 1px solid black;
    padding: 2px 10px;
    margin-right: -4px;
}
.body_header {
    display: flex;
}

.student_id {
    text-align: left;
    width: 60%;
}

.academic_session {
    text-align: right;
    width: 37%;
}
.body {
    /* border: 1px solid black; */
    padding: 2px;
    position: relative;
}

table {
    width: 100%;
}
table, tr, th, td{
    border: 1px solid black;
    border-collapse: collapse;
}
th, td{
    text-align: left !important;
    padding : 7px;
}
.qr_code {
    width: 216px;
    margin-top: 31px;
}
li#sub_col {
    display: block;
    list-style: none;
    border-bottom: 1px solid black;
}
table{
    font-size: 13px;
}
img#watermark {
    position: absolute;
    top: -58px;
    left: 216px;
    z-index: -999;
    opacity: 0.10;
    max-width: 44%;
}
.page_box {
    width: 207mm;
    height: 294mm;
    position: relative;
}
.page-footer {
    position: absolute;
    right: 19px;
    bottom: 19px;
}
.signature span {
    border-top: 1px solid black;
    padding-top: 7px;
}
@media print {
  html, body {
    width: 210mm;
    height: 297mm;
  }
  /* ... the rest of the rules ... */
}
</style>
<body>

    <div class="page">
        <div class="page_box">
            <div class="page_header">
                <div class="qr_code">
                    {!! QrCode::size(100)->generate($data->student_id); !!}
                </div>
                <div class="college_info">
                    <img src="{{ asset($settings->image)}}" alt="" class="logo">
                    <h2>{{$settings->name}}</h2>
                    <b>{{$settings->address}}</b><br>
                </div>
                <div class="std_image">
                    <img src="{{ asset('student_image')}}/{{$data->image}}" alt="" class="student_image">
                </div>
            </div>
            <hr>
            <div class="page_body" style="margin-top: 10px;">
                <div class="body_header">
                    <div class="student_id">
                        <span>Student ID :</span>
                        <b>
                            @for ($i = 0; $i < count($studentid_explode); $i++)
                            <span class="reg_number">{{$studentid_explode[$i]}}</span>
                            @endfor
                        </b>
                    </div>
                    <div class="academic_session">
                        Academic Session : <b><span class="reg_number">{{$data->session}}</span></b>
                    </div>
                </div>
                <br>
                <div class="body">
                    <img src="{{asset($settings->image)}}" alt="" id="watermark">
                    <table>
                        <tr>
                            <td>Student's Name</td>
                            <th style="text-transform: uppercase;" colspan="6">{{$data->student_name}}</th>
                        </tr>
                        <tr>
                            <td>Father's Name</td>
                            <th style="text-transform: uppercase;" colspan="6">{{$data->father_name}}</th>
                        </tr>
                        <tr>
                            <td>Mother's Name</td>
                            <th style="text-transform: uppercase;" colspan="6">{{$data->mother_name}}</th>
                        </tr>
                        <tr>
                            <td>Class</th>
                            <th style="text-transform: uppercase;" colspan="4">{{$student_reg_info->class_name}}</th>
                            <td>Group</td>
                            <th style="text-transform: uppercase;">{{$student_reg_info->group_name ?: '-'}}</th>
                        </tr>
                        <tr>
                            <td>Class Roll</td>
                            <th style="text-transform: uppercase;" colspan="6">{{$student_reg_info->class_roll}}</th>
                        </tr>
                        <tr>
                            <td>Guardian Name</td>
                            <th style="text-transform: uppercase;" colspan="4">{{$data->guardian_name}}</th>
                            <td>Guardian Contact</td>
                            <th style="text-transform: uppercase;" colspan="4">{{$data->guardian_phone}}</th>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <th style="text-transform: uppercase;" colspan="6">{{$data->gender}}</th>
                        </tr>
                        <tr>
                            <td>Blood Group</td>
                            <th style="text-transform: uppercase;" colspan="6">{{$data->blood_group}}</th>
                        </tr>
                        <tr>
                            <td>Religion</td>
                            <th style="text-transform: uppercase;" colspan="6">{{$data->religion}}</th>
                        </tr>
                        <tr>
                            <td>Nationality</td>
                            <th style="text-transform: uppercase;" colspan="6">{{$data->nationality}}</th>
                        </tr>
                        <tr>
                            <th colspan="7">
                                Subjects & Codes :
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2">Compulsory Subject</td>
                            <td colspan="3">Group Subject</td>
                            <td colspan="2">Optional Subject</td>
                        </tr>
                        <tr>
                            <th colspan="2" style="padding : 0px;">
                                <table>
                                    @foreach ($comp_sub_info as $s)
                                    @if($s->subject_type == 1)
                                    <tr>
                                        <th>{{ $s->subject_name }} ({{ $s->subject_code}})</th>
                                    </tr>
                                    @endif
                                    @endforeach
                                </table>
                            </th>
                            <th colspan="3" style="padding : 0px;">
                                <table>
                                    @foreach ($group_sub_info as $s)
                                    @if($s->subject_type == 2)
                                    <tr>
                                        <th>{{ $s->subject_name }} ({{ $s->subject_code}})</th>
                                    </tr>
                                    @endif
                                    @endforeach
                                </table>
                            </th>
                            <th colspan="2" style="padding : 0px;">
                                <table>
                                    @foreach ($opt_sub_info as $s)
                                    @if($s->subject_type == 3)
                                    <tr>
                                        <th>{{ $s->subject_name }} ({{ $s->subject_code}})</th>
                                    </tr>
                                    <tr>
                                        <th>-</th>
                                    </tr>
                                    <tr>
                                        <th>-</th>
                                    </tr>
                                    @endif
                                    @endforeach
                                </table>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="page-footer">
                <div class="signature">
                    <span>Head Of Institute</span>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
