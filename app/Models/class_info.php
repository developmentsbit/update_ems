<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class class_info extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'addclass';

    protected $guarded = [];

    public function group()
    {
        return $this->hasMany('App\Models\group_info','class_id');
    }

    public function examType()
    {
        return $this->hasMany('App\Models\add_exam_type','class_id');
    }
}
