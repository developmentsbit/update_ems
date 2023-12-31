<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bank_info extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo('App\Models\User','admin_id');
    }

    public function transaction()
    {
        return $this->hasMany('App\Models\bank_transaction_entry','bank_id');
    }
}
