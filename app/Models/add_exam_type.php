<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class add_exam_type extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function class()
    {
        return $this->belongsTo('App\Models\class_info','class_id');
    }

    public static function makeInactive($id)
    {
        add_exam_type::find($id)->update([
            'status' => 0,
        ]);
    }
    public static function makeActive($id)
    {
        add_exam_type::find($id)->update([
            'status' => 1,
        ]);
    }
}
