<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\expense_entry;
use App\Models\income_expense;
use Brian2694\Toastr\Facades\Toastr;
use App\Traits\Idgenerator;

class ExpenseEntryController extends Controller
{
    use Idgenerator;
    public function getDate($sign,$value)
    {
        $explode = explode($sign,$value);

        $date = $explode[2].'-'.$explode[0].'-'.$explode[1];

        return $date;
    }

    public function getOriginalDate($sign,$value)
    {
        $explode = explode($sign,$value);

        $date = $explode[1].'-'.$explode[2].'-'.$explode[0];

        return $date;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = expense_entry::leftjoin("income_expenses",'income_expenses.id','expense_entries.expense_id')
        ->select("expense_entries.*",'income_expenses.title','income_expenses.title_bn')
        ->get();
        $i = 1;
        
        return view('admin.expense_entry.index',compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $income_expense = income_expense::where('type',2)->get();
        $expense = expense_entry::all();

        return view('admin.expense_entry.create',compact('income_expense','expense'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = $this->getDate('/',$request->date);
        $prefix = date('Y');
        $voucher_no = Idgenerator::autoId('expense_entries','voucher_no',$prefix,'10');

        $data = array(
            'voucher_no'=>$voucher_no,
            'date'=>$date,
            'expense_id'=>$request->expense_id,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
            'amount'=>$request->amount,
            'receiver'=>$request->receiver,
            'address'=>$request->address,
            'status'=>$request->status,
        );

        $insert = expense_entry::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('expense_entry.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('expense_entry.index'));
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
        $income_expense = income_expense::where('type',2)->get();
        $data = expense_entry::where('id',$id)->first();

        $explode = explode('-',$data->date);

        $date = $explode['1'].'/'.$explode['2'].'/'.$explode[0];

        return view('admin.expense_entry.edit',compact('income_expense','data','date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $date = $this->getDate('/',$request->date);

        $update = expense_entry::find($id)->update([
            'date'=>$date,
            'expense_id'=>$request->expense_id,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
            'amount'=>$request->amount,
            'receiver'=>$request->receiver,
            'address'=>$request->address,
            'status'=>$request->status,
        ]);

        if($update)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('expense_entry.index'));
        }
        else
        {
            Toastr::error('Data Update Unsuccess', 'success');
            return redirect(route('expense_entry.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        expense_entry::where('id',$id)->delete();

        Toastr::success('Data Delete Successfully', 'success');
        return redirect(route('expense_entry.index'));
    }

    public function retrive_expense_entry($id)
    {
        expense_entry::where('id',$id)->withTrashed()->restore();
        return redirect()->route('expense_entry.index') ->with('message','Expense Entry List Restore Successfully');
    } 

    public function delete_expense_entry($id){

        expense_entry::where('id',$id)->withTrashed()->forceDelete();
        return redirect()->route('expense_entry.index') ->with('message','Expense Entry List Permanently Deleted Successfully');
    }
}
