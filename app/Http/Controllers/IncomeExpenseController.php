<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\income_expense;
use Brian2694\Toastr\Facades\Toastr;

class IncomeExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = income_expense::get();
        $i = 1;
        return view('admin.income_expense.index',compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.income_expense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array(

            'order_by'=>$request->order_by,
            'title'=>$request->title,
            'title_bn'=>$request->title_bn,
            'type'=>$request->type,   
            
        );

        $insert = income_expense::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('income_expense.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('income_expense.index'));
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
        $data = income_expense::where('id',$id)->first();
        return view('admin.income_expense.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array(

            'order_by'=>$request->order_by,
            'title'=>$request->title,
            'title_bn'=>$request->title_bn,
            'type'=>$request->type,   
            
        );
        $update = income_expense::find($id)->update($data);

        if($update)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('income_expense.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Update Unsuccessfully');
            return redirect(route('income_expense.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        income_expense::where('id',$id)->delete();
        Toastr::success('Data Delete Successfully', 'success');
            return redirect(route('income_expense.index'));
    }

    public function retrive_income_expense($id)
    {
        income_expense::where('id',$id)->withTrashed()->restore();
        return redirect()->route('income_expense.index') ->with('message','Income Expense List Retrive Successfully');
    } 

    public function delete_income_expense($id){

        income_expense::where('id',$id)->withTrashed()->forceDelete();
        return redirect()->route('income_expense.index') ->with('message','Income Expense List Permanently Deleted Successfully');
    }
}
