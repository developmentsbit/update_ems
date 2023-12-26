<?php

namespace App\Http\Controllers;

use App\Models\addMarks;
use Illuminate\Http\Request;
use App\Models\class_info;
use App\Models\subject_info;

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
}
