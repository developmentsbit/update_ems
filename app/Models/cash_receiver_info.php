<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cash_receiver_info extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function cash_trans()
    {
        return $this->hasMany('App\Models\cash_transaction','receiver_id');
    }
}
