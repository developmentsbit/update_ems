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

    public function storeData($data,$CommonFee){
        $preparedData = [];
//        $preparedWhere = [];
        foreach ($CommonFee as $fee){
            $preparedData[] =[
                'column_id'=>$data['column_id'],
                'year'=>$data['year'],
                'class_id'=>$data['class_id'],
                'fee_id'=>$fee['id'],
            ];
//            $preparedWhere[] =[
//                'column_id'=>$data['column_id'],
//                'year'=>$data['year'],
//                'class_id'=>$data['class_id']
//            ];
        }
//        $this->destroyData($preparedWhere);
        return self::insert($preparedData);
    }
}
