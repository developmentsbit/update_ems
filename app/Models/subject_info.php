<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class subject_info extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function className()
    {
        return $this->belongsTo('App\Models\class_info','class_id');
    }

    public function groupName()
    {
        return $this->belongsTo('App\Models\group_info','group_id');
    }
}
