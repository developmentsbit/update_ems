<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cash_deposit extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function receiver()
    {
        return $this->belongsTo('App\Models\cash_receiver_info','receiver_id');
    }
}
