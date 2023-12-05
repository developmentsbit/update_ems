<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\class_info;
use App\Models\add_exam_type;
use App\Models\subject_info;
use App\Models\subject_part;
use App\Models\group_info;
use Brian2694\Toastr\Facades\Toastr;

class SubjectPartController extends Controller
{
    protected $path;
    public function __construct()
    {
        $this->path = 'admin.add_subject_part';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = subject_part::leftjoin('addclass','addclass.id','subject_parts.class_id')
        ->leftjoin('addgroup','addgroup.id','subject_parts.group_id')
        ->leftjoin('add_exam_types','add_exam_types.id','subject_parts.exam_type_id')
        ->leftjoin('subject_infos','subject_infos.id','subject_parts.subject_id')
        ->select('subject_parts.*','addclass.class_name','addclass.class_name_bn','addgroup.group_name','addgroup.group_name_bn','subject_infos.subject_name','subject_infos.subject_name_bn','add_exam_types.exam_name','add_exam_types.exam_name_bn')
        ->get();
        return view($this->path.'.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['class'] = class_info::where('status',1)->get();
        return view($this->path.'.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array(
            'class_id' => $request->class_id,
            'group_id' => $request->group_id,
            'exam_type_id' => $request->exam_type_id,
            'subject_id' => $request->subject_id,
            'part_name' => $request->part_name,
            'part_name_bn' => $request->part_name_bn,
            'subject_type' => $request->subject_type,
            'part_code' => $request->part_code,
            'order_by' => $request->order_by,
            'status' => $request->status,
        );

        subject_part::create($data);
        Toastr::success(__('Subject Part Added Successfully'));
        return redirect()->route('add_subject_part.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['class'] = class_info::where('status',1)->get();
        $data['data'] = subject_part::find($id);
        $data['group'] = group_info::where('class_id',$data['data']->class_id)->get();
        $data['exam_type'] = add_exam_type::where('class_id',$data['data']->class_id)->get();
        $data['subject'] = subject_info::where('class_id',$data['data']->class_id)->where('group_id',$data['data']->group_id)->where('subject_type',$data['data']->subject_type)->get();
        $data['subject_info'] = subject_info::where('id',$data['data']->subject_id)->first();
        return view($this->path.'.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array(
            'class_id' => $request->class_id,
            'group_id' => $request->group_id,
            'exam_type_id' => $request->exam_type_id,
            'subject_id' => $request->subject_id,
            'part_name' => $request->part_name,
            'part_name_bn' => $request->part_name_bn,
            'subject_type' => $request->subject_type,
            'part_code' => $request->part_code,
            'order_by' => $request->order_by,
            'status' => $request->status,
        );

        subject_part::find($id)->update($data);
        Toastr::success(__('Subject Part Update Successfully'));
        return redirect()->route('add_subject_part.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        subject_part::find($id)->delete();
        Toastr::success(__('Subject Part Deleted Successfully'));
        return redirect()->route('add_subject_part.index');
    }

    public function getExams(Request $request)
    {
        // return $request->class_id;
        $exma_type = add_exam_type::where('class_id',$request->class_id)->where('status',1)->get();
        if(count($exma_type) == 0)
        {
            return '<p class="text-danger">This Class Dont Have Any Exam Type</p>';
        }

        $output = '<label>'.__('add_subject_part.exam_type').':</label>
        <div class="input-group mt-2">
            <select class="form-control form-control-sm" name="exam_type_id" id="exam_type_id" onchange="return getexam();">
                <option value="">'.__('common.select_one').'</option>';
        foreach($exma_type as $et)
        {
            if(config('app.locale') == 'en')
            {
                $exam_type_name = $et->exam_name ?: $et->exam_name_bn;
            }
            else
            {
                $exam_type_name = $et->exam_name_bn ?: $et->exam_name;
            }
            $output.='<option value="'.$et->id.'">'.$exam_type_name.'</option>';
        }
        $output.='</select>
        </div>';

        return $output;
    }

    public function getSubjects(Request $request)
    {
        // return $request->group_id;
        if($request->group_id != '')
        {
            $subject = subject_info::where('class_id',$request->class_id)
            ->where('group_id',$request->group_id)
            ->where('subject_type',$request->subject_type)
            ->where('status',1)
            ->get();

            $output = '<label>'.__('add_subject_part.subject_name').':</label>
            <div class="input-group mt-2">
                <select class="form-control form-control-sm" name="subject_id" id="subject_id" onchange="getSubjectInfo()">
                    <option value="">'.__('common.select_one').'</option>';
            if(count($subject) != 0)
            {
                foreach($subject as $s)
                {
                    if(config('app.locale') == 'en')
                    {
                        $subject_name = $s->subject_name ?: $s->subject_name_bn;
                    }
                    else
                    {
                        $subject_name = $s->subject_name_bn ?: $s->subject_name;
                    }
                    $output.='<option value="'.$s->id.'">'.$subject_name.'</option>';
                }
            }
            else
            {
                return '<b class="text-danger">No Subject Found</b>';
            }
            $output.='</select>
            </div>';

            return $output;
        }
        else
        {
            $subject = subject_info::where('class_id',$request->class_id)
            ->where('subject_type',$request->subject_type)
            ->where('status',1)
            ->get();

            $output = '<label>'.__('add_subject_part.subject_name').':</label>
            <div class="input-group mt-2">
                <select class="form-control form-control-sm" name="subject_id" id="subject_id"  onchange="getSubjectInfo()">
                    <option value="">'.__('common.select_one').'</option>';
            if(count($subject) != 0)
            {
                foreach($subject as $s)
                {
                    if(config('app.locale') == 'en')
                    {
                        $subject_name = $s->subject_name ?: $s->subject_name_bn;
                    }
                    else
                    {
                        $subject_name = $s->subject_name_bn ?: $s->subject_name;
                    }
                    $output.='<option value="'.$s->id.'">'.$subject_name.'</option>';
                }
            }
            else
            {
                return '<b class="text-danger">No Subject Found</b>';
            }
            $output.='</select>
            </div>';

            return $output;
        }
    }

    public function getSubjectInfo(Request $request)
    {
        $subject = subject_info::find($request->subject_id);
        if(config('app.locale') == 'en')
        {
            $subject_name = $subject->subject_name ?: $subject->subject_name_bn;
        }
        else
        {
            $subject_name = $subject->subject_name_bn ?: $subject->subject_name;
        }

        return $subject_name;
    }

    public function partStatusChange($id)
    {
        $check = subject_part::find($id);
        if($check->status == 1)
        {
            subject_part::makeInactive($id);
        }
        else
        {
            subject_part::makeActive($id);
        }

        return;
    }
}
