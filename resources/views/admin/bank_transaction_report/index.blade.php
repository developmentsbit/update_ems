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
    align-items: center;
    justify-content: center;
}
.expense_info {
    width: 344px;
    margin-left: 276px;
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
    padding : 7px;
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
    padding : 7px;
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
    $bankBalance = 0;
    @endphp

    <div class="page">
        <div class="page_box">
            <div class="page_header">
                    <div class="college_image">
                    </div>
                    <div class="college_info">
                    <img src="{{ asset($settings->image)}}" alt="" class="logo">
                    <h2>{{$settings->name}}</h2>
                    {{$settings->address}}<br>
                </div>
            </div>
            <hr>
            <div class="page_header">
                <div class="expense_info">
                    Bank Transaction Report<br>
                </div>
            </div>
            <hr>
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
                            <td>SL</td>
                            <td>Bank Name</td>
                            <td>Acount Type</td>
                            <td>Account Number</td>
                            <td>Deposit</td>
                            <td>Withdraw</td>
                            <td>Cost</td>
                            <td>Interest</td>
                            <td>Balance</td>
                        </tr>
                        @if($data['data'])
                        @foreach($data['data'] as $d)
                        <tr>
                            <td>
                                {{$data['i']++}}
                            </td>
                            <td>
                                {{ $d->bank_name}}
                            </td>
                            <td>
                            @if($d->type == 1)
                                Bank
                            @endif
                            @if($d->type == 2)
                                Bkash
                            @endif
                            </td>
                            <td>
                            {{ $d->account_number}}
                            </td>
                            <td>
                            @php
                            $total_deposit = 0;
                            foreach($d->transaction as $v)
                            {
                                if($v->transaction_type == 1)
                                {
                                    $total_deposit = $total_deposit + $v->amount;
                                }
                            }
                            @endphp

                            @if($total_deposit > 0)
                            {{ $total_deposit }}
                            @else 
                            -
                            @endif
                            </td>
                                
                            <td>
                            @php
                            $total_withdraw = 0;
                            foreach($d->transaction as $v)
                            {
                                if($v->transaction_type == 2)
                                {
                                    $total_withdraw = $total_withdraw + $v->amount;
                                }
                            }
                            @endphp
                            @if($total_withdraw)
                            {{ $total_withdraw }}
                            @else 
                            -
                            @endif
                            <td>
                            @php
                            $total_cost = 0;
                            foreach($d->transaction as $v)
                            {
                                if($v->transaction_type == 3)
                                {
                                    $total_cost = $total_cost + $v->amount;
                                }
                            }
                            @endphp
                            @if ($total_cost)
                            {{ $total_cost }}
                            @else
                            -
                            @endif
                            </td>
                            <td>
                            @php
                            $total_interest = 0;
                            foreach($d->transaction as $v)
                            {
                                if($v->transaction_type == 4)
                                {
                                    $total_interest = $total_interest + $v->amount;
                                }
                            }
                            @endphp
                            @if ($total_interest)
                            {{ $total_interest }}
                            @else
                            -
                            @endif
                            </td>
                            <td>
                            @php 
                            $total = ($total_deposit + $total_interest) - ($total_withdraw + $total_cost);
                            $bankBalance = $bankBalance + $total;
                            @endphp
                                {{ $total  }}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        <tr>
                            <th colspan="8">Total Bank Balance</th>
                            <th>{{$bankBalance}}</th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="page-footer">
                <div class="signature">
                    <span>Head Of Institute</span>
                    <span>Office Assistant</span>
                </div>
            </div>
        </div>
        <center style="font-size: 14px;margin-top: -17px;margin-bottom: 14px;margin-left: 285px;">
            Developed By: SBIT (www.sbit.com.bd)
        </center>
    </div>

</body>
</html>
