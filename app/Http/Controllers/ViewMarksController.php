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

class ViewMarksController extends Controller
{
    public $path;
    public function __construct()
    {
        $this->path = 'admin.view_marks';
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
        return view('admin.view_marks.index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(viewMarks $viewMarks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(viewMarks $viewMarks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, viewMarks $viewMarks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(viewMarks $viewMarks)
    {
        //
    }

    public function searchMarksEntry(Request $request)
    {
        // return dd($request->all());

        $data = [];
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
        $data['student'] = marksheet::leftjoin('student_informations','student_informations.student_id','marksheets.student_id')
        ->where('marksheets.class_id',$request->class_id)
        ->where('marksheets.group_id',$request->group_id)
        ->where('marksheets.exam_id',$request->exam_type_id)
        ->where('marksheets.subject_id',$request->subject_id)
        ->where('marksheets.subject_part_id',$request->subject_part_id)
        ->where('marksheets.session',$request->session)
        ->select('student_informations.student_name','marksheets.*')
        ->take(10)
        ->get();

        return $this->view('show_search_student',$data);
    }

    public function searchStoredSerialStudent(Request $request)
    {
        $take = $request->to - $request->from;
        if($request->subject_part_id != NULL)
        {
            $data = marksheet::leftjoin('student_informations','student_informations.student_id','marksheets.student_id')
            ->where('marksheets.subject_id',$request->subject_id)
            ->where('marksheets.subject_part_id',$request->subject_part_id)
            ->where('marksheets.session',$request->session)
            ->select('student_informations.student_name','marksheets.*')
            ->skip($request->from)
            ->take($take)
            ->get();
        }
        else
        {
            $data= marksheet::leftjoin('student_informations','student_informations.student_id','marksheets.student_id')
            ->where('marksheets.exam_id',$request->exam_type_id)
            ->where('marksheets.subject_id',$request->subject_id)
            ->where('marksheets.subject_part_id',$request->subject_part_id)
            ->where('marksheets.session',$request->session)
            ->select('student_informations.student_name','marksheets.*')
            ->skip($request->from)
            ->take($take)
            ->get();
        }

        $i = $request->from;

        return view($this->path.'.show_search_searial_student',compact('data','i'));
    }
}
