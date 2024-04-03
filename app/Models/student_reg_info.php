<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_reg_info extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student(){
        return $this->belongsTo(student_information::class,'student_id','student_id');
    }


    public function getByData($search=[],$is_relation=false){
        $query = self::query();
        if(isset($search['student_roll']) && !empty($search['student_roll'])){
            $query->where('class_roll',$search['student_roll']);
        }
        if(isset($search['student_id']) && !empty($search['student_id'])){
            $query->where('student_id',$search['student_id']);
        }
        if(isset($search['class_id']) && !empty($search['class_id'])){
            $query->where('class_id',$search['class_id']);
        }
        if(isset($search['year']) && !empty($search['year'])){
            $query->where('year',$search['year']);
        }
        if($is_relation){
            $query->with('student');
        }

        return $query->get();

    }
}
