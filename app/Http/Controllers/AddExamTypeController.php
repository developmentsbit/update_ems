<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Brian2694\Toastr\Facades\Toastr;
use App\Models\class_info;
use App\Models\add_exam_type;

class AddExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.add_exam_type.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = class_info::all();
       
        return view('admin.add_exam_type.create',compact('class'));
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
            'compulsory'=>$request->compulsory,
            'compulsory_bn'=>$request->compulsory_bn,     
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
