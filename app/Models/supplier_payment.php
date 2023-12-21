<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class supplier_payment extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function supplier()
    {
        return $this->belongsTo('App\Models\supplier_info','supplier_id');
    }
}
