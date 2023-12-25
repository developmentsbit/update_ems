<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\DateFormat;

class bank_transaction_entry extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo('App\Models\User','admin_id');
    }

    public static function findData($bank_id, $type, $request_date, $request_from_date = NULL, $request_to_date = NULL, $month = NULL, $year = NULL)
    {
        if($type == 'All')
        {
            $data = bank_transaction_entry::where('bank_id',$bank_id)->get();
        }
        elseif($type == 'Daily')
        {
            $date = DateFormat::DateToDb('/',$request_date);
            $data = bank_transaction_entry::where('bank_id',$bank_id)->where('date',$date)->get();
        }
        elseif($type == 'DateToDate')
        {
            $from_date = DateFormat::DateToDb('/',$request_from_date);
            $to_date = DateFormat::DateToDb('/',$request_to_date);
            $data = bank_transaction_entry::where('bank_id',$bank_id)->whereBetween('date',[$from_date,$to_date])->get();
        }
        elseif($type == 'Monthly')
        {
            $data = bank_transaction_entry::where('bank_id',$bank_id)->whereMonth('date',$month)->whereYear('date',$year)->get();
        }
        else
        {
            $data = bank_transaction_entry::where('bank_id',$bank_id)->whereYear('date',$year)->get();
        }

        return $data;
    }
}
