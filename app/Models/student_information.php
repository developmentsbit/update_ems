<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student_information extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function marksheet()
    {
        return $this->hasMany('App\Models\marksheet','student_id');
    }
}
