<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Brian2694\Toastr\Facades\Toastr;
use App\Models\class_info;
use App\Models\add_exam_type;

class AddExamTypeController extends Controller
{
    protected $path;
    public function __construct()
    {
        $this->path = 'admin.add_exam_type';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = add_exam_type::with('class')->get();
        $i = 1;
        return view($this->path.'.index',compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = class_info::all();
        return view($this->path.'.create',compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array(
            'exam_code'=>$request->exam_code,
            'class_id'=>$request->class_id,
            'exam_name'=>$request->exam_name,
            'exam_name_bn'=>$request->exam_name_bn,
            'total_subject'=>$request->total_subject,
            'status'=>$request->status,
            'order_by'=>$request->order_by,
        );
        $insert = add_exam_type::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('add_exam_type.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('online_lecture_upload.index'));
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
        $data['class'] = class_info::all();
        $data['data'] = add_exam_type::where('id',$id)->with('class')->first();
        return view($this->path.'.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array(
            'exam_code'=>$request->exam_code,
            'class_id'=>$request->class_id,
            'exam_name'=>$request->exam_name,
            'exam_name_bn'=>$request->exam_name_bn,
            'total_subject'=>$request->total_subject,
            'status'=>$request->status,
            'order_by'=>$request->order_by,
        );
        $insert = add_exam_type::find($id)->update($data);

        if($insert)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('add_exam_type.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Update Unsuccessfully');
            return redirect(route('online_lecture_upload.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        add_exam_type::where('id',$id)->delete();
        Toastr::success('Data Delete Successfully', 'success');
            return redirect(route('add_exam_type.index'));
    }

    public function changeExamTypeStatus($id)
    {
        $check = add_exam_type::where('id',$id)->first();
        if($check->status == 1)
        {
            add_exam_type::makeInactive($id);
        }
        else
        {
            add_exam_type::makeActive($id);
        }

        return 1;
    }
}
