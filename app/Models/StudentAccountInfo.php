<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAccountInfo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student(){
        return $this->belongsTo(student_information::class,'student_id','student_id');
    }

    public function fee(){
        return $this->belongsTo(add_fee_title::class,'fee_id');
    }

    public function class(){
        return $this->belongsTo(class_info::class,'class_id');
    }

    public function getData()
    {
        return self::all();
    }

    public function createOrUpdateData($p_data, $auth_id = null, $student, $common_fee)
    {
        $admin_id = [
            'created_at' => Carbon::today(),
            'updated_at' => Carbon::today(),
            'admin_id' => $auth_id
        ];
        if (!empty($p_data['student_id'])) {
            foreach ($student as $studentData) {
                foreach ($common_fee as $fee) {
                    $pre_data = [
                        'student_id' => $studentData->student_id ?? '',
                        'class_id' => $p_data['class_id'] ?? '',
                        'fee_id' => $fee->id ?? '',
                        'year' => $p_data['year'] ?? ''
                    ];
                    $data[] = $pre_data;
                    $this->deleteData($pre_data);
                }
            }
        } else {
            if (count($student) > 0) {
                $data = [];
                foreach ($student as $studentData) {
                    foreach ($common_fee as $fee) {
                        $pre_data = [
                            'student_id' => $studentData->student_id ?? '',
                            'class_id' => $p_data['class_id'] ?? '',
                            'fee_id' => $fee->id ?? '',
                            'year' => $p_data['year'] ?? ''
                        ];
                        $data[] = $pre_data;

                        $this->deleteData($pre_data);

                    }
                }
            }
        }
        $data = array_map(function ($data) use ($admin_id) {
            return array_merge($data, $admin_id);
        }, $data);
        return self::insert($data);
    }

    public function deleteData($data)
    {
        return $this->where($data)->delete();
    }

    public function findByData($class_id = null,$year =null,$student_id=null)
    {
        $query = self::query();
        $query->when(!empty($class_id),fn($q) => $q->where('class_id',$class_id))
            ->when(!empty($year),fn($q)=>$q->where('year',$year))
            ->when(!empty($student_id),fn($q)=>$q->where('student_id',$student_id))
            ->with(['student','fee','class']);

        return $query->get();
    }
}
