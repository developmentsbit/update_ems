<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
