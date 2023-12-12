<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student_fee_column;
use Brian2694\Toastr\Facades\Toastr;

class StudentFeeColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = student_fee_column::get();
        $i = 1;
        return view('admin.student_fee_column.index',compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student_fee_column.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array(
            
            'order_by'=>$request->order_by,
            'column_name'=>$request->column_name,
            'column_name_bn'=>$request->column_name_bn,
            'year'=>$request->year,   
            
        );

        $insert = student_fee_column::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('student_fee_column.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('student_fee_column.index'));
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
        $data = student_fee_column::where('id',$id)->first();
        return view('admin.student_fee_column.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array(
            'order_by'=>$request->order_by,
            'column_name'=>$request->column_name,
            'column_name_bn'=>$request->column_name_bn,
            'year'=>$request->year,   
            
        );
        $update = student_fee_column::find($id)->update($data);

        if($update)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('student_fee_column.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Update Unsuccessfully');
            return redirect(route('student_fee_column.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        student_fee_column::where('id',$id)->delete();
        Toastr::success('Data Delete Successfully', 'success');
            return redirect(route('student_fee_column.index'));
    }

    public function retrive_student_fee($id)
    {
        student_fee_column::where('id',$id)->withTrashed()->restore();
        return redirect()->route('student_fee_column.index') ->with('message','Others Income List Retrive Successfully');
    } 

    public function delete_student_fee($id){

        student_fee_column::where('id',$id)->withTrashed()->forceDelete();
        return redirect()->route('student_fee_column.index') ->with('message','Others Income List Permanently Deleted Successfully');
    }
}
