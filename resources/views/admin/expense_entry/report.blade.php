<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expense Voucher</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<style>
    body{
        font-family: 'Poppins', sans-serif;
    }
    .page{
        width: 210mm;
        height: 132mm;
        border: 1px solid lightgray;
        margin: auto;
        padding: 5px;
    }
    .page:first-child{
        border-bottom: dotted;
        margin-top: 1px;
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
    max-width: 80px;
    margin-left: 16px;
}

.college_info h2 {
    margin: 0px;
}

.expense_info {
    text-align: center;
    align-items: center;
    justify-content: center;
}
.expense_info {
    width: 328px;
    margin-left: 220px;
    font-size: 24px;
}

.expense_info h2 {
    margin: 0px;
}

.copy {
    text-align: right;
    width: 208px;
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
.college_image {
    width: 216px;
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
    top: -116px;
    left: 216px;
    z-index: -999;
    opacity: 0.10;
    max-width: 40%;
}
.page_box {
    width: 207mm;
    height: 129mm;
    position: relative;
}
.page-footer {
    margin-top: 35px;
}
.signature span {
    border-top: 2px solid black;
    border-top-style: dotted;
    padding: 0px 64px 0px 48px;
    margin-left: 28px;
}
p{
    margin: 0 !important;
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
    @php
    use App\Traits\DateFormat;
    @endphp

    @for ($x = 0; $x < 2; $x = $x+1)

    <div class="page">
        <div class="page_box">
            <div class="page_header">
                <div class="college_image">
                    <img src="{{ asset($settings->image)}}" alt="" class="logo">
                </div>
                <div class="college_info">
                    <h2>{{$settings->name}}</h2>
                    <b>{{$settings->address}}</b><br>
                </div>
                <div class="copy">
                    {{--<img src="{{ asset('student_image')}}/{{$data->image}}" alt="" class="student_image">--}}
                    <b><h2>
                        @if($x == 0)
                        Office Copy
                        @else
                        Reciver Copy
                        @endif
                    </h2></b>
                </div>
            </div>
            <hr>
            <div class="page_header">
                <div class="expense_info">
                    <b>Expense Voucher</b><br>
                </div>
            </div>
            <hr>
            <div class="page_body" style="margin-top: 0px;">
                <div class="body_header">
                    <div class="student_id">
                        <span>Voucher No :</span>
                        <b>
                            @for ($i = 0; $i < count($voucherno_explode); $i++)
                            <span class="reg_number">{{$voucherno_explode[$i]}}</span>
                            @endfor
                        </b>
                    </div>
                    <div class="academic_session">
                        Date : <b><span class="reg_number">
                           {{ DateFormat::DbtoDate('-',$data->date) }}
                        </span></b>
                    </div>
                </div>
                <br>
                <div class="body">
                    <img src="{{asset($settings->image)}}" alt="" id="watermark">
                    <table>
                        <tr>
                            <td>To</td>
                            <th style="text-transform: uppercase;" colspan="3">{{$data->receiver}}</th>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <th style="text-transform: uppercase;" colspan="3">{{ $data->address }}</th>
                        </tr>
                    </table>
                </div>
                <div class="body">
                    <table>
                        <tr>
                            <td colspan="2">SL</td>
                            <td colspan="3">Title</td>
                            <td colspan="2">Details</td>
                            <td colspan="2">Amount</td>
                        </tr>
                        <tr>
                            <th colspan="2" style="padding : 0px;">
                                <table>
                                    <tr>
                                        <th>{{$i++}}</th>
                                    </tr>
                                </table>
                            </th>
                            <th colspan="3" style="padding : 0px;">
                                <table>
                                    <tr>
                                        <th>@if($lang == 'en'){{ $data->title ?: $data->title_bn}}@else{{$data->title_bn ?: $data->title}}@endif</th>
                                    </tr>
                                </table>
                            </th>
                            <th colspan="2" style="padding : 0px;">
                                <table>
                                    <tr>
                                    <th>@if($lang == 'en'){!! $data->details ?: $data->details_bn !!}@elseif($lang == 'bn'){!! $data->details_bn ?: $data->details !!}@endif</th>
                                    </tr>
                                </table>
                            </th>
                            <th colspan="2" style="padding : 0px;">
                                <table>
                                    <tr>
                                        <th>{{ $data->amount}}</th>
                                    </tr>
                                </table>
                            </th>
                        </tr>
                    </table>
                </div>
                <div class="body">
                    <table>
                        <tr>
                            <td align="right"> <label style="float: right;">Total :</label>
                            <label>(In word): Tk.  One Hundred  Only</label>
                            </td>
                            <td width="100" align="center" style="padding: 0px 78px 0px 5px;font-weight: bold;">{{ $data->amount}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="page-footer">
                <div class="signature">
                    <span>Head Of Institute</span>
                    <span>Office Assistant</span>
                    <span>Receiver</span>
                </div>
            </div>
        </div>
    </div>

    @endfor

        <center style="font-size: 14px;margin-top: -32px;margin-bottom: 15px;margin-left:19px;">
            Developed By: SBIT (www.sbit.com.bd)
        </center>
        <center> 
            <input type="button" name="print" value="Print" class="print" style="height: 30px; width: 100px; background: GREEN; color: #fff; border: 0px;" onclick="window.print()">
        </center>


</body>
</html>
