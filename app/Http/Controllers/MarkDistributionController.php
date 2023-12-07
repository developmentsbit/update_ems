<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subject_info;
use App\Models\add_exam_type;
use App\Models\group_info;
use App\Models\subject_part;
use App\Models\class_info;
use App\Models\marks_distribution;
use Brian2694\Toastr\Facades\Toastr;

class MarkDistributionController extends Controller
{
    protected $path;
    public function __construct()
    {
        $this->path = 'admin.mark_distribution';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class = class_info::where('status',1)->get();
        return view($this->path.'.index',compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['class'] = class_info::where('status',1)->get();
        return view($this->path.'.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $check = marks_distribution::where('class_id',$request->class_id)->where('exam_id',$request->exam_type_id)->where('subject_id',$request->subject_id)->where('subject_part_id',$request->subject_part_id)->count();
        if($check == 0)
        {

            if($request->total == 0)
            {
                return 0;
            }
            $data = array(
                'class_id' => $request->class_id,
                'exam_id' => $request->exam_type_id,
                'group_id' => $request->group_id,
                'subject_type' => $request->subject_type,
                'subject_id' => $request->subject_id,
                'subject_part_id' => $request->subject_part_id,
                'subject_code' => $request->subject_code,
                'mcq' => $request->mcq,
                'written' => $request->written,
                'practical' => $request->practical,
                'count_asses' => $request->count_asses,
                'total' => $request->total,
            );
            marks_distribution::create($data);
            return 1;
        }
        else
        {
            return  'error';
        }
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
        $data = [];
        $data['class'] = class_info::where('status',1)->get();
        $data['data'] = marks_distribution::find($id);
        $data['group'] = group_info::where('class_id',$data['data']->class_id)->get();
        $data['exam_type'] = add_exam_type::where('status',1)->where('class_id',$data['data']->class_id)->get();
        $data['subject'] = subject_info::where('class_id',$data['data']->class_id)->where('subject_type',$data['data']->subject_type)->where('group_id',$data['data']->group_id)->get();
        $data['part'] = subject_part::where('subject_id',$data['data']->subject_id)->where('status',1)->get();
        return view($this->path.'.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->total == 0)
        {
            Toastr::error(__('Invalid Data Format'));
            return redirect()->back();
        }
        $data = array(
            'class_id' => $request->class_id,
            'exam_id' => $request->exam_type_id,
            'group_id' => $request->group_id,
            'subject_type' => $request->subject_type,
            'subject_id' => $request->subject_id,
            'subject_part_id' => $request->subject_part_id,
            'subject_code' => $request->subject_code,
            'mcq' => $request->mcq,
            'written' => $request->written,
            'practical' => $request->practical,
            'count_asses' => $request->count_asses,
            'total' => $request->total,
        );
        marks_distribution::find($id)->update($data);
        Toastr::success(__('Data Update Successfully'));
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        marks_distribution::find($id)->delete();
        Toastr::success(__('Data Delete Successfully'));
        return redirect()->back();
    }

    public function getExamType(Request $request)
    {
        $data = add_exam_type::where('status',1)->where('class_id',$request->class_id)->get();
        if(count($data) == 0)
        {
            return '<b class="text-danger">No Exam Type Found !</b>';
        }

        $output = '<select class="form-control form-control-sm" id="exam_type_id" name="exam_type_id" required>
        <option value="">Select One</option>';
        foreach($data as $v)
        {
            if(config('app.locale') == 'en')
            {
                $exam_type_name = $v->exam_name ?: $v->exam_name_bn;
            }
            else
            {
                $exam_type_name = $v->exam_name_bn ?: $v->exam_name;
            }

            $output .= '<option value="'.$v->id.'">'.$v->exam_code.' - '.$exam_type_name.'</option>';
        }
        $output.='</select>';

        return $output;
    }

    public function getMarksClassGropup(Request $request)
    {
        $data = group_info::where('status',1)->where('class_id',$request->class_id)->get();
        if(count($data) == 0)
        {
            return 'no_group';
        }

        $output='<select class="form-control form-control-sm" id="group_id" name="group_id" required>
        <option value="">Select One</option>';
        foreach($data as $v)
        {
            if(config('app.locale') == 'en')
            {
                $group_name = $v->group_name ?: $v->group_name_bn;
            }
            else
            {
                $group_name = $v->group_name_bn ?: $v->group_name;
            }

            $output .='<option value="'.$v->id.'">'.$group_name.'</option>';
        }
        $output .='</select>';

        return $output;
    }

    public function getMarksSubjects(Request $request)
    {
        if($request->group_id != '')
        {
            $data = subject_info::where('status',1)->where('class_id',$request->class_id)->where('subject_type',$request->subject_type)->where('group_id',$request->group_id)->get();
        }
        else
        {
            $data = subject_info::where('status',1)->where('class_id',$request->class_id)->where('subject_type',$request->subject_type)->get();
        }

        if(count($data) == 0)
        {
            return '<b class="text-danger">No Subjects Found !</b>';
        }

        $output = '<select class="form-control form-control-sm" id="subject_id" name="subject_id" onchange="getSubjectPart();getSubjectCode();" required>
        <option value="">Select One</option>';
        foreach($data as $v)
        {
            if(config('app.locale') == 'en')
            {
                $subject_name = $v->subject_name ?: $v->subject_name_bn;
            }
            else
            {
                $subject_name = $v->subject_name_bn ?: $v->subject_name;
            }
            $output .= '<option value="'.$v->id.'">'.$subject_name.'</option>';
        }
        $output .='</select>';

        return $output;
    }

    public function getSubjectPart(Request $request)
    {
        $data = subject_part::where('status',1)->where('subject_id',$request->subject_id)->get();
        if(count($data) == 0)
        {
            return 'no_part';

        }

        $output = '<select class="form-control form-control-sm" id="subject_part_id" name="subject_part_id" onchange="getSubjectpartCode()" required>
        <option value="">Select One</option>';
        foreach($data as $v)
        {
            if(config('app.locale') == 'en')
            {
                $part_name = $v->part_name ?: $v->part_name_bn;
            }
            else
            {
                $part_name = $v->part_name_bn ?: $v->part_name;
            }
            $output .= '<option value="'.$v->id.'">'.$part_name.'</option>';
        }
        $output .='</select>';

        return $output;
    }

    public function getSubjectCode(Request $request)
    {
        $data = subject_info::where('id',$request->subject_id)->first();
        return $data->subject_code;
    }
    public function getSubjectPartCode(Request $request)
    {
        $data = subject_part::where('id',$request->subject_part_id)->first();
        return $data->part_code;
    }

    public function showMarksDstribution(Request $request)
    {
        if($request->group_id != '')
        {
            $data = marks_distribution::leftjoin('subject_infos','subject_infos.id','marks_distributions.subject_id')
            ->leftjoin('subject_parts','subject_parts.id','marks_distributions.subject_part_id')
            ->where('marks_distributions.class_id',$request->class_id)
            ->where('marks_distributions.group_id',$request->group_id)
            ->where('marks_distributions.exam_id',$request->exam_type)
            ->select('marks_distributions.*','subject_infos.subject_name','subject_infos.subject_name_bn','subject_infos.subject_code','subject_parts.part_name','subject_parts.part_name_bn','subject_parts.part_code')
            ->get();
        }
        else
        {
            $data = marks_distribution::leftjoin('subject_infos','subject_infos.id','marks_distributions.subject_id')
            ->leftjoin('subject_parts','subject_parts.id','marks_distributions.subject_part_id')
            ->where('marks_distributions.class_id',$request->class_id)
            ->where('marks_distributions.exam_id',$request->exam_type)
            ->select('marks_distributions.*','subject_infos.subject_name','subject_infos.subject_name_bn','subject_infos.subject_code','subject_parts.part_name','subject_parts.part_name_bn','subject_parts.part_code')
            ->get();
        }

        return view($this->path.'.show_marks',compact('data'));
    }
}
