<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColumnWiseFeeSetups extends Model
{
    use HasFactory;

    protected $table = "column_wise_fee_setups";

    public function getData(){
        return self::all();
    }
    public function fee(){
       return $this->belongsTo('App\Models\add_fee_title','fee_id');
    }

    public function column(){
        return $this->belongsTo('App\Models\student_fee_column','column_id');
    }

    public function classInfo(){
        return $this->belongsTo('App\Models\class_info','class_id');
    }



    public function storeData($data, $CommonFee = [])
    {
        $preparedData = [];
        if (count($CommonFee) > 0) {
            foreach ($CommonFee as $fee_id) {
                $preparedData[] = [
                    'column_id' => $data['column_id'],
                    'year' => $data['year'],
                    'class_id' => $data['class_id'],
                    'fee_id' => $fee_id,
                ];
            }
                return self::insert($preparedData);
        }
    }

    public function findByData($class_id = null,$year =null,$is_relation = false)
    {
        $query = self::query();
        $query->when(!empty($class_id),fn($q) => $q->where('class_id',$class_id))
            ->when(!empty($year),fn($q)=>$q->where('year',$year))
            ->when(isset($is_relation),fn($q)=>$q->with(['column','fee','classInfo']));
        return $query->get();
    }

    public function destroyData($id){
        return  $query = self::where('id',$id)->delete();
    }
}
