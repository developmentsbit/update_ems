<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testimonial</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: "Poppins", sans-serif;
        }
        table{
            font-size: 15px;
        }
        table, tr, th, td{
            /* border: 1px solid black; */
            /* border-collapse: collapse; */
        }
        td{
            padding : 10px;
        }
        table {
            width: 100%;
        }
        .left-data {
    width: 402px;
    float: left;
    border-right: 1px solid lightgray;
}
.testimonial_title span {
    background: #11116d;
    color: white;
    padding: 5px 16px;
    border-radius: 20px;
}

.testimonial_title {
    margin-bottom: 10px;
}

.background{
    background: url('{{ url('tm_bg.jpg') }}');
}
.background {
    width: 100%;
    height: 633px;
    background-repeat: no-repeat;
    position: relative;
}

.right-data {
    margin-left: 411px;
}

.right-data {
    width: 850px;
    /* overflow: hidden; */
}
.water_mark_logo {
    background: url('{{url($settings->image)}}');;
    background-size: 250px 287px;
    height: 286px;
    width: 250px;
    background-repeat: no-repeat;
    position: absolute;
    top: 190px;
    left: 303px;
    opacity: 0.1;
}
.logo {
    float: left;
}

.header-content {
    position: absolute;
    top: 50px;
    color: black;
    width: 351px;
}

.logo img {
    height: 143px;
}

.header-content {
    width: 744px;
}
.header-content {
    left: 57px;
}

.titles {
    width: 628px;
    padding-top: 7px;
}
.middle-content {
    position: absolute;
    align-items: center;
    margin: auto;
    left: 370px;
    top: 130px;
}
table.paper_texts {
    position: absolute;
    left: 68px;
    width: 710px;
    top: 189px;
}
.highlight{
    text-transform: uppercase;
    font-size: 16px;
}
p.texts {
    line-height: 26px;
}
td.sign b {
    border-top: 1px dashed black;
    padding: 6px 17px;
}

    </style>
</head>
<body>
    @php
        if($data->title == 'SSC')
        {
            $exam_name = 'Secondary School Certificate';
        }
        else

        {
            $exam_name = 'Higher Secondary School Certificate';
        }

        if($data->gender == '1')
        {
            $gender = 'He';
        }
        else {
            $gender = 'She';
        }

    @endphp
    <div class="container-fluid">
        <div class="row">
            <div class="left-data">
                <div class="tables">
                    <div style="text-align: center;" class="testimonial_title">
                        <span>Testimonial</span>
                    </div>
                    <table>
                        <tr>
                            <td>Sl No : {{ $data->sl_no }}</td>
                            <td>{{ date('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <td><i>Name Of Student</i></td>
                            <td style="text-transform: uppercase">
                                {{ $data->student_name }}
                            </td>
                        </tr>
                        <tr>
                            <td><i>Father Name</i></td>
                            <td style="text-transform: uppercase">
                                {{ $data->father_name }}
                            </td>
                        </tr>
                        <tr>
                            <td><i>Mother Name</i></td>
                            <td style="text-transform: uppercase">
                                {{ $data->mother_name }}
                            </td>
                        </tr>
                        <tr>
                            <td><i>Year</i></td>
                            <td style="text-transform: uppercase">
                                {{ $data->year }}
                            </td>
                        </tr>
                        <tr>
                            <td><i>Group/Subject</i></td>
                            <td style="text-transform: uppercase">
                                {{ $data->group_subject }}
                            </td>
                        </tr>
                        <tr>
                            <td><i>Roll No</i></td>
                            <td style="text-transform: uppercase">
                                {{ $data->roll_no }}
                            </td>
                        </tr>
                        <tr>
                            <td><i>Reg No</i></td>
                            <td style="text-transform: uppercase">
                                {{ $data->reg_no }}
                            </td>
                        </tr>
                        <tr>
                            <td><i>Sesion</i></td>
                            <td style="text-transform: uppercase">
                                {{ $data->session }}
                            </td>
                        </tr>
                        <tr>
                            <td><i>Result</i></td>
                            <td style="text-transform: uppercase">
                                GPA : {{ $data->gpa }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="right-data">
                <div class="background">
                    <div class="water_mark_logo" style=""></div>
                    <div class="header-content">
                        <div class="logo">
                            <img src="{{ asset($settings->image) }}" class="logo">
                        </div>
                        <div class="titles" style="text-align: center;">
                            <h2 style="color : red;margin:0px;">{{ $settings->name }}</h2>
                            <span>{{ $settings->address }}</span><br>

                        </div>
                    </div>
                    <div class="middle-content">
                        <div style="text-align: center;" class="testimonial_title">
                            <span>Testimonial</span>
                        </div>
                    </div>
                    <div class="texts">
                        <table class="paper_texts">
                            <tr>
                                <td>Sl No : {{ $data->sl_no }}</td>
                                <td style="text-align: right;">Date : {{ date('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p class="texts">
                                        @if($data->title == 'SSC')
                                        <i>
                                            This is to certify that <b class="highlight">  {{ $data->student_name }}  </b> S/O.: <b class="highlight">  {{ $data->father_name }}  </b> & <b style="text-transform: uppercase;font-size:16px ;">  {{ $data->mother_name }}  </b>  Duly passed the {{ $exam_name }} @if($data->student_type == 2) (Vocational) @endif Examination in <b class="highlight"> {{ $data->year }} </b> in <b class="highlight">{{ $data->group_subject }}</b> Group from this {{$settings->type}} under the B.I.S.E. Comilla bearing Roll No. : <b class="highlight">{{ $data->roll_no }}</b>, Registration No.: <b class="highlight">{{ $data->reg_no }}</b>, Session.: <b class="highlight">{{ $data->session }}</b> and Secured GPA : <b class="highlight">{{ $data->gpa }}</b>.<br>
                                            <span style="padding-left : 15px;">According to</span> admission Register his date of birth is <b class="highlight">{{ App\Traits\DateFormat::DbtoDate('-',$data->birth_date) }}</b>.<br>
                                            So far my knowledge, {{$gender}} bears a good moral character and is not known to have taken part any activity against the school descipline.<br>
                                            I wish him every success in life.
                                        </i>
                                        @elseif ($data->title == 'HSC')
                                        <i>
                                            This is to certify that <b class="highlight">  {{ $data->student_name }}  </b> S/O.: <b class="highlight">  {{ $data->father_name }}  </b> & <b style="text-transform: uppercase;font-size:16px ;">  {{ $data->mother_name }}  </b>  was a student of {{ $data->title }} @if($data->student_type == 2) (Vocational) @endif during the academic session <b class="highlight"> {{ $data->year }} </b> in <b class="highlight">{{ $data->group_subject }}</b> Group from this college under the Board of intermediate and Secondery Education, Comilla bearing Roll Feni-1, No. : <b class="highlight">{{ $data->roll_no }}</b>, Registration No.: <b class="highlight">{{ $data->reg_no }}</b>, Session.: <b class="highlight">{{ $data->session }}</b> and Secured GPA : <b class="highlight">{{ $data->gpa }}</b> in the scale of GPA 5.00.<br>
                                            {{-- <span style="padding-left : 15px;">According to</span> admission Register his date of birth is <b class="highlight">{{ App\Traits\DateFormat::DbtoDate('-',$data->birth_date) }}</b>.<br> --}}
                                            So far my knowledge, {{$gender}} bears a good moral character and is not known to have taken part any activity against the school descipline.<br>
                                            I wish him every success in life.
                                        </i>
                                        @endif
                                    </p>

                                </td>
                            </tr>
                            <tr>
                                <td class="sign">

                                    <b>Compared By</b>
                                </td>
                                <td style="text-align: right;" class="sign">
                                    <b>Head Of Institute</b>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
