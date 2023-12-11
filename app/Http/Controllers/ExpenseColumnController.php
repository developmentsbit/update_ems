<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\expense_column;
use Brian2694\Toastr\Facades\Toastr;

class ExpenseColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = expense_column::get();
        $i = 1;
        return view('admin.expense_column.index',compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.expense_column.create');
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

        $insert = expense_column::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('expense_column.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('expense_column.index'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = expense_column::where('id',$id)->first();
        return view('admin.expense_column.edit',compact('data'));
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

        $update = expense_column::find($id)->update($data);

        if($update)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('expense_column.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Update Unsuccessfully');
            return redirect(route('expense_column.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        expense_column::where('id',$id)->delete();
        Toastr::success('Data Delete Successfully', 'success');
            return redirect(route('expense_column.index'));
    }

    public function retrive_expense($id)
    {
        expense_column::where('id',$id)->withTrashed()->restore();
        return redirect()->route('expense_column.index') ->with('message','Expense Column List Retrive Successfully');
    } 

    public function delete_expense($id){

        expense_column::where('id',$id)->withTrashed()->forceDelete();
        return redirect()->route('expense_column.index') ->with('message','Expense Column List Permanently Deleted Successfully');
    }
}
