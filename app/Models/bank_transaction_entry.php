<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bank_transaction_entry extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo('App\Models\User','admin_id');
    }
}
