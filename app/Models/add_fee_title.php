<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class add_fee_title extends Model
{

    use HasFactory,SoftDeletes;
    protected $guarded = [];
    const CommonFee = 1;
    const ExceptionalFee = 2;

    public function class()
    {
        return $this->belongsTo('App\Models\class_info','class_id');
    }

    public function store($prepared_data)
    {
        return self::insert($prepared_data);
    }

    public function updateData($prepared_data,$id)
    {
        return self::where('id',$id)->update($prepared_data);
    }

    public function findById($id)
    {
       return self::where('id',$id)->first();
    }
    public function destroyFeeTitle($id)
    {
       return self::where('id',$id)->delete();
    }

    public function findByData($class_id = null,$year =null,$is_relation=false,$feeType = null)
    {
        $query = self::query();
        $query->when(!empty($class_id),fn($q) => $q->where('class_id',$class_id))
                ->when(!empty($year),fn($q)=>$q->where('year',$year))
                ->when(!empty($is_relation),fn($q)=>$q->with('class'))
                ->when(!empty($feeType),fn($q)=>$q->where('feeType',$feeType));

         return $query->get();
    }
    public function findByWhereNotIn(array $fee_id = [],$class_id = null,$year =null)
    {
        $query = self::query();
        $query->when(!empty($fee_id),fn($q) => $q->whereNotIn('id',$fee_id))
            ->when(!empty($class_id),fn($q) => $q->where('class_id',$class_id))
            ->when(!empty($year),fn($q)=>$q->where('year',$year));

         return $query->get();
    }
}
