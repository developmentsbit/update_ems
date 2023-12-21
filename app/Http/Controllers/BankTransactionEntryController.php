<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bank_transaction_entry;
use App\Models\bank_info;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Auth;

class BankTransactionEntryController extends Controller
{
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
        $data = bank_transaction_entry::leftjoin("bank_infos",'bank_infos.id','bank_transaction_entries.bank_id')
        ->select("bank_transaction_entries.*",'bank_infos.*')
        ->with('admin')
        ->get();
        $i = 1;

        return view('admin.bank_transaction_entry.index',compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bank = bank_info::all();

        return view('admin.bank_transaction_entry.create',compact('bank'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = $this->getDate('/',$request->date);

        $data = array(
            'admin_id'=>Auth::user()->id,
            'bank_id'=>$request->bank_id,
            'transaction_type'=>$request->transaction_type,
            'cheque_no'=>$request->cheque_no,
            'amount'=>$request->amount,
            'date'=>$date,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
            'status'=>$request->status,
        );

        $insert = bank_transaction_entry::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('bank_transaction_entry.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('bank_transaction_entry.index'));
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
    public function destroy(string $bank_id)
    {
        bank_transaction_entry::where('bank_id',$bank_id)->delete();

        Toastr::success('Data Delete Successfully', 'success');
        return redirect(route('bank_transaction_entry.index'));
    }

    public function retrive_bank_transaction_entry($id)
    {
        bank_transaction_entry::where('id',$id)->withTrashed()->restore();
        return redirect()->route('bank_transaction_entry.index') ->with('message','Bank Transaction Entry List Restore Successfully');
    } 

    public function delete_bank_transaction_entry($id){

        bank_transaction_entry::where('id',$id)->withTrashed()->forceDelete();
        return redirect()->route('bank_transaction_entry.index') ->with('message','Bank Transaction Entry Permanently Deleted Successfully');
    }

    public function getBankBalance($id)
    {   
        $deposit = bank_transaction_entry::where('bank_id',$id)->where('transaction_type',1)->sum('amount');
        $withdraw = bank_transaction_entry::where('bank_id',$id)->where('transaction_type',2)->sum('amount');
        $cost = bank_transaction_entry::where('bank_id',$id)->where('transaction_type',3)->sum('amount');
        $interest = bank_transaction_entry::where('bank_id',$id)->where('transaction_type',4)->sum('amount');

        $result = ($deposit + $interest) - ($withdraw + $cost);
        return $result;

    }

    public function TransactionReport($cheque_no)
    {
        $data = bank_transaction_entry::leftjoin("bank_infos",'bank_infos.id','bank_transaction_entries.bank_id')
        ->select("bank_transaction_entries.*",'bank_infos.*')
        ->where('cheque_no',$cheque_no)->first();
        $chequeno_explode = str_split($cheque_no,1);

        return view('admin.bank_transaction_entry.transactionReport',compact('data','chequeno_explode'));
    }
}
