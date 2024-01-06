<?php

namespace App\Http\Controllers;

use App\Models\addMarks;
use Illuminate\Http\Request;
use App\Models\class_info;
use App\Models\subject_info;
use App\Models\session;
use App\Models\section_info;
use App\Models\group_info;
use App\Models\add_exam_type;
use App\Models\subject_part;
use App\Models\subject_reg_info;
use App\Models\marks_distribution;
use App\Models\marksheet;

class AddMarksController extends Controller
{
    public $path;
    public function __construct()
    {
        $this->path = 'admin.add_marks';
    }
    public function view($blade, array $params = NULL)
    {
        return view($this->path.'.'.$blade,compact('params'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $params = [];
        $params['class'] = class_info::all();
        $params['session'] = session::getActive();
        return $this->view('create',$params);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->student_id)
        {

            if($request->group_id)
            {
                $group_id = $request->group_id;
            }
            else{
                $group_id = NULL;
            }
            $count = count($request->student_id);
            if($count > 0)
            {
                for ($i=0; $i < $count ; $i++)
                {
                    $check = marksheet::where('class_id',$request->class_id)->where('exam_id',$request->exam_type_id)->where('student_id',$request->student_id[$i])->first();
                    if(isset($check))
                    {
                        marksheet::where('class_id',$request->class_id)->where('exam_id',$request->exam_type_id)->where('student_id',$request->student_id[$i])->delete();
                    }
                    marksheet::create([
                        'student_id' => $request->student_id[$i],
                        'class_id' => $request->class_id,
                        'group_id' => $group_id,
                        'exam_id' => $request->exam_type_id,
                        'subject_id' => $request->subject_type,
                        'subject_part_id' => $request->subject_part_id,
                        'session' => $request->session,
                        'mcq' => $request->mcq[$i],
                        'written' => $request->written[$i],
                        'practical' => $request->practical[$i],
                        'count_asses' => $request->count_asses[$i],
                        'obtain_mark' => $request->obtain_marks[$i],
                        'letter_grade' => $request->letter_grade[$i],
                        'gpa' => NULL,
                    ]);
                }

                return response()->json('Marks Added', 200);
            }
            else
            {
                return response()->json('No Student Found',200);
            }
        }
        else
        {
            return 0;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(addMarks $addMarks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(addMarks $addMarks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, addMarks $addMarks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(addMarks $addMarks)
    {
        //
    }

    public function loadGroupsSubject(Request $request)
    {
        $subject = subject_info::where('class_id',$request->class_id)->where('subject_type',$request->subject_type)->where('group_id',$request->group_id)->get();
        $output = '<select class="form-control form-control-sm" id="subject_id" name="subject_id" required>
        <option value="">
          Select One</option>';
        foreach($subject as $s)
        {
            if(config('app.locale') == 'en')
            {
                $subject_name = $s->subject_name ?: $s->subject_name_bn;
            }
            else
            {
                $subject_name = $s->subject_name_bn?: $s->subject_name;
            }
            $output.='<option value='.$s->id.'>'.$subject_name.'</option>';
        }
      $output .='</select>';

      return $output;
    }

    public function getSection(Request $request)
    {
        $data = section_info::where('class_id',$request->class_id)->get();
        if(count($data) > 0)
        {
            $output = '<select class="form-control form-control-sm" id="section_id" name="section_id">
            <option value="">Select One</option>';
            foreach($data as $d)
            {
                $output.= '<option value="'.$d->id.'">'.$d->section_name.'</option>';
            }
          $output.='</select>';

          return $output;
        }
        else
        {
            return '<b class="text-danger">No Section Found !</b>';
        }
    }

    public function searchingStudent(Request $request)
    {
        // dd($request->all());
        $data['class'] = class_info::where('id',$request->class_id)->first();
        $data['exam'] = add_exam_type::where('id',$request->exam_type_id)->first();
        $data['subject_type'] = $request->subject_type;
        if($request->group_id != NULL)
        {
            $data['group'] = group_info::where('id',$request->group_id)->first();
        }

        $data['subject'] = subject_info::find($request->subject_id);
        if($request->subject_part_id != NULL)
        {
            $data['marks_entry'] = marks_distribution::where('exam_id',$request->exam_type_id)
            ->where('subject_id',$request->subject_id)
            ->where('subject_part_id',$request->subject_part_id)
            ->first();
        }
        else
        {

            $data['marks_entry'] = marks_distribution::where('exam_id',$request->exam_type_id)
            ->where('subject_id',$request->subject_id)
            ->first();
        }

        if($request->subject_part_id != NULL)
        {
            $data['subject_part'] = subject_part::find($request->subject_part_id);
        }

        $data['session'] = $request->session;
        if($request->section_id != NULL)
        {
            $data['section'] = section_info::find($request->section_id);
        }

        if($request->subject_part_id != NULL)
        {
            $data['student'] = subject_reg_info::leftjoin('student_informations','student_informations.student_id','subject_reg_infos.student_id')
            ->leftjoin('student_reg_infos','student_reg_infos.student_id','subject_reg_infos.student_id')
            ->leftjoin('marks_distributions','marks_distributions.subject_id','subject_reg_infos.subject_id')
            ->where('marks_distributions.exam_id',$request->exam_type_id)
            ->where('marks_distributions.subject_id',$request->subject_id)
            ->where('marks_distributions.subject_part_id',$request->subject_part_id)
            ->where('student_reg_infos.session',$request->session)
            ->select('student_informations.student_name','student_informations.student_id','marks_distributions.*')
            ->take(10)
            ->get();
        }
        else
        {
            $data['student'] = subject_reg_info::leftjoin('student_informations','student_informations.student_id','subject_reg_infos.student_id')
            ->leftjoin('student_reg_infos','student_reg_infos.student_id','subject_reg_infos.student_id')
            ->leftjoin('marks_distributions','marks_distributions.subject_id','subject_reg_infos.subject_id')
            ->where('marks_distributions.exam_id',$request->exam_type_id)
            ->where('marks_distributions.subject_id',$request->subject_id)
            ->where('student_reg_infos.session',$request->session)
            ->select('student_informations.student_name','student_informations.student_id','marks_distributions.*')
            ->take(10)
            ->get();
        }
        return $this->view('show_search_student',$data);

    }

    public function searchSerialStudent(Request $request)
    {
        $take = $request->to - $request->from;
        if($request->subject_part_id != NULL)
        {
            $data = subject_reg_info::leftjoin('student_informations','student_informations.student_id','subject_reg_infos.student_id')
            ->leftjoin('student_reg_infos','student_reg_infos.student_id','subject_reg_infos.student_id')
            ->leftjoin('marks_distributions','marks_distributions.subject_id','subject_reg_infos.subject_id')
            ->where('marks_distributions.exam_id',$request->exam_type_id)
            ->where('marks_distributions.subject_id',$request->subject_id)
            ->where('marks_distributions.subject_part_id',$request->subject_part_id)
            ->where('student_reg_infos.session',$request->session)
            ->select('student_informations.student_name','student_informations.student_id','marks_distributions.*')
            ->skip($request->from)
            ->take($take)
            ->get();
        }
        else
        {
            $data= subject_reg_info::leftjoin('student_informations','student_informations.student_id','subject_reg_infos.student_id')
            ->leftjoin('student_reg_infos','student_reg_infos.student_id','subject_reg_infos.student_id')
            ->leftjoin('marks_distributions','marks_distributions.subject_id','subject_reg_infos.subject_id')
            ->where('marks_distributions.exam_id',$request->exam_type_id)
            ->where('marks_distributions.subject_id',$request->subject_id)
            ->where('student_reg_infos.session',$request->session)
            ->select('student_informations.student_name','student_informations.student_id','marks_distributions.*')
            ->skip($request->from)
            ->take($take)
            ->get();
        }

        $i = $request->from;

        return view($this->path.'.show_search_searial_student',compact('data','i'));
    }

    
}
