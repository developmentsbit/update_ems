<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank Transaction Report</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<style>
    body{
        font-family: 'Poppins', sans-serif;
    }
    .page{
        width: 240mm;
        height: 132mm;
        margin: auto;
        padding: 5px;
    }
    .page_box{
        padding: 5px;
        /* border-radius: 10px; */
    }
    .page_header {
    /* display: flex; */
    text-align: center;
}

.college_info {
    text-align: center;
    align-items: center;
    justify-content: center;
}
.college_info {

}
.logo {
    max-width: 60px;
    margin-left: 16px;
    margin-top: 5px;
}

.college_info h2 {
        margin: 0px;
    font-size: 21px;
    font-weight: 300;
}

.expense_info {
    text-align: center;
}
.expense_info {
    font-size: 22px;
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
    border: 1px solid #c6c6c6;
    border-collapse: collapse;
}
th, td{
    text-align: left !important;
    padding : 5px;
}
.college_image {
    width: 280px;
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
    left: 320px;
    z-index: -999;
    opacity: 0.10;
    max-width: 40%;
}
.page_box {
    width: 250mm;
    height: 129mm;
    position: relative;
}
.page-footer {
    margin-top: 24mm;
}
.signature span {
    border-top: 2px solid black;
    border-top-style: dotted;
    padding: 0px 64px 0px 48px;
    margin-left: 18px;
}

.signature span:last-child {
    float: right;
}
p{
    margin: 0 !important;
}
th{
    /* border: 0 !important; */
}
td{
    padding : 5px;
}
@media print {
    .print{
        display: none;
    }
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
    $bankBalance = 0;
    $payable =0;
    $payment = 0;
    @endphp

    <div class="page">
        <div class="page_box">
            <div class="page_header">
                <div class="college_info">
                    <img src="{{ asset($settings->image)}}" alt="" class="logo">
                    <h2>{{$settings->name}}</h2>
                    {{$settings->address}}<br>
                </div>
            </div>
            <hr>
            <div class="page_header">
                <div class="expense_info">
                    Supplier Statement<br>
                </div>
            </div>
            <div class="report_type" style="text-align: center">
                @if($data['report_type'] == 'All')
                {{ $data['report_type'] }}
                @elseif($data['report_type'] == 'Daily')
                Daily ({{$data['date']}})
                @elseif($data['report_type'] == "DateToDate")
                From  {{$data['from_date']}} - {{ $data['to_date'] }}
                @elseif($data['report_type'] == 'Monthly')
                {{ DateFormat::getMonth($data['month']) }} - {{ $data['year'] }}
                @elseif ($data['report_type'] == 'Yearly')
                For The Year - {{ $data['year'] }}
                @endif
            </div>

            <div class="page_body" style="margin-top: 0px;">
                    {{--<div class="academic_session">
                        Date : <b><span class="reg_number">
                           {{ DateFormat::DbtoDate('-',$data->date) }}
                        </span></b>
                    </div>
                </div>
                <br>--}}
                <div class="body">
                    <img src="{{asset($settings->image)}}" alt="" id="watermark">
                </div>
                <div class="body">
                    <table>
                        <tr>
                            <th>Name :</th>
                            <th>{{ $data['supplier']->name }}</th>
                            <th>Address :</th>
                            <th>{{ $data['supplier']->address }}</th>
                        </tr>
                        <tr>
                            <th>Phone :</th>
                            <th>+880{!!  $data['supplier']->phone !!}</th>
                            <th>Print Date :</th>
                            <th>{{ date('d-m-Y || h:i:s a') }}</th>
                        </tr>
                    </table>
                    <table style="margin-top: 20px">
                        <tr>
                            <td>SL</td>
                            <td>Date</td>
                            <td>Reciver</td>
                            <td>Payable Amount</td>
                            <td>Paid Amount</td>
                            <td>Details</td>
                        </tr>
                        @if($data['data'])
                        @foreach($data['data'] as $d)
                        <tr>
                            <td>
                                {{$data['sl']++}}
                            </td>

                            <td>
                                {{DateFormat::DbToMonthDate('-',$d->date)}}
                            </td>

                            <td>
                                {{ $d->receiver}}
                            </td>

                            <td>
                                {{ $d->payable }}
                                @php
                                $payable = $payable + $d->payable;
                                @endphp
                            </td>

                            <td>
                            {{ $d->payment}}
                            @php
                            $payment = $payment + $d->payment;
                            @endphp
                            </td>

                            <td>
                            {!! $d->details !!}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        <tr>
                            <td colspan="3">
                                Total
                            </td>
                            <th>
                                {{$payable}}
                            </th>
                            <th>
                                {{ $payment }}
                            </th>
                        </tr>
                        <tr>
                            <th colspan="6">Total Supplier Balance : <u>{{ $payable - $payment }}</u></th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="page-footer">
                <div class="signature">
                    <span>Head Of Institute</span>
                    <span>Office Assistant</span>
                </div>
                <center>
                    <button class="print" onclick="window.print();">Print</button>
                </center>
            </div>
        </div>
    </div>

</body>
</html>
