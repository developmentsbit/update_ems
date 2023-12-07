<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\others_income;
use Brian2694\Toastr\Facades\Toastr;

class othersIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = others_income::get();
        $i = 1;
        return view('admin.others_income.index',compact('data','i'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.others_income.create');
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

        $insert = others_income::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('others_income.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('others_income.index'));
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
        $data = others_income::where('id',$id)->first();
        return view('admin.others_income.edit',compact('data'));
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
        $update = others_income::find($id)->update($data);

        if($update)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('others_income.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Update Unsuccessfully');
            return redirect(route('others_income.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        others_income::where('id',$id)->delete();
        Toastr::success('Data Delete Successfully', 'success');
            return redirect(route('others_income.index'));
    }

    public function retrive_income($id)
    {
        others_income::where('id',$id)->withTrashed()->restore();
        return redirect()->route('others_income.index') ->with('message','Others Income List Retrive Successfully');
    } 

    public function delete_income($id){

        others_income::where('id',$id)->withTrashed()->forceDelete();
        return redirect()->route('others_income.index') ->with('message','Others Income List Permanently Deleted Successfully');
    }
}
