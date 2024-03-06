<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class add_fee_title extends Model
{

    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function class()
    {
        return $this->belongsTo('App\Models\class_info','class_id');
    }

    public function store($prepared_data) : bool
    {
        return self::insert($prepared_data);
    }
}
