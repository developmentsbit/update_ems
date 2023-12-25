<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\DateFormat;

class cash_transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function recivers()
    {
        return $this->belongsTo('App\Models\cash_receiver_info','receiver_id');
    }

    public static function deposit($id)
    {
        $payment = cash_transaction::where('receiver_id',$id)->sum('deposit');

        return $payment;
    }

    public static function withdraw($id)
    {
        $payment = cash_transaction::where('receiver_id',$id)->sum('withdraw');

        return $payment;
    }

    public static function findData(array $params)
    {
        if($params['report_type'] == 'All')
        {
            if($params['reciver_id'] == 'All')
            {
                $data = cash_transaction::all();
            }
            else
            {
                $data = cash_transaction::where('receiver_id',$params['reciver_id'])->get();
            }
        }
        elseif($params['report_type'] == 'Daily')
        {
            $date = DateFormat::DateToDb('/',$params['date']);
            if($params['reciver_id'] == 'All')
            {
                $data = cash_transaction::where('date',$date)->get();
            }
            else
            {
                $data = cash_transaction::where('receiver_id',$params['reciver_id'])->where('date',$date)->get();
            }
        }
        elseif($params['report_type'] == 'DateToDate')
        {
            $from_date = DateFormat::DateToDb('/',$params['from_date']);
            $to_date = DateFormat::DateToDb('/',$params['to_date']);
            if($params['reciver_id'] == 'All')
            {
                $data = cash_transaction::whereBetween('date',[$from_date,$to_date])->get();
            }
            else
            {
                $data = cash_transaction::where('receiver_id',$params['reciver_id'])->whereBetween('date',[$from_date,$to_date])->get();
            }
        }
        elseif($params['report_type'] == 'Monthly')
        {
            if($params['reciver_id'] == 'All')
            {
                $data = cash_transaction::whereMonth('date',$params['month'])->whereYear('date',$params['year'])->get();
            }
            else
            {
                $data = cash_transaction::where('receiver_id',$params['reciver_id'])->whereMonth('date',$params['month'])->whereYear('date',$params['year'])->get();
            }
        }
        elseif($params['report_type'] == 'Yearly')
        {
            if($params['reciver_id'] == 'All')
            {
                $data = cash_transaction::whereYear('date',$params['year'])->get();
            }
            else
            {
                $data = cash_transaction::where('receiver_id',$params['reciver_id'])->whereYear('date',$params['year'])->get();
            }
        }
        return $data;
    }
}
