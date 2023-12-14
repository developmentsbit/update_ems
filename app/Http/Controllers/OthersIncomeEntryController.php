<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\others_income_entry;
use App\Models\income_expense;
use Brian2694\Toastr\Facades\Toastr;
use App\Traits\Idgenerator;

class OthersIncomeEntryController extends Controller
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
        $data = others_income_entry::leftjoin("income_expenses",'income_expenses.id','others_income_entries.income_id')
        ->select("others_income_entries.*",'income_expenses.title','income_expenses.title_bn')
        ->get();
        $i = 1;

        return view('admin.others_income_entry.index',compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $income_expense = income_expense::where('type',1)->get();
        $others_income = others_income_entry::all();

        return view('admin.others_income_entry.create',compact('income_expense','others_income'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = $this->getDate('/',$request->date);
        $prefix = date('Y');
        $voucher_no = Idgenerator::autoId('others_income_entries','voucher_no',$prefix,'10');

        $data = array(
            'voucher_no'=>$voucher_no,
            'date'=>$date,
            'income_id'=>$request->income_id,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
            'amount'=>$request->amount,
            'receiver'=>$request->receiver,
            'address'=>$request->address,
            'status'=>$request->status,
        );

        $insert = others_income_entry::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('others_income_entry.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('others_income_entry.index'));
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
        $income_expense = income_expense::where('type',1)->get();
        $data = others_income_entry::where('id',$id)->first();

        $explode = explode('-',$data->date);

        $date = $explode['1'].'/'.$explode['2'].'/'.$explode[0];

        return view('admin.others_income_entry.edit',compact('income_expense','data','date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $date = $this->getDate('/',$request->date);

        $update = others_income_entry::find($id)->update([
            'date'=>$date,
            'income_id'=>$request->income_id,
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
            return redirect(route('others_income_entry.index'));
        }
        else
        {
            Toastr::error('Data Update Unsuccess', 'success');
            return redirect(route('others_income_entry.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        others_income_entry::where('id',$id)->delete();

        Toastr::success('Data Delete Successfully', 'success');
        return redirect(route('others_income_entry.index'));
    }

    public function retrive_others_income_entry($id)
    {
        others_income_entry::where('id',$id)->withTrashed()->restore();
        return redirect()->route('others_income_entry.index') ->with('message','Others Income Entry List Restore Successfully');
    } 

    public function delete_others_income_entry($id){

        others_income_entry::where('id',$id)->withTrashed()->forceDelete();
        return redirect()->route('others_income_entry.index') ->with('message','Others Income Entry List Permanently Deleted Successfully');
    }
}
