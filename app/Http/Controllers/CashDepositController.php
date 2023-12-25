<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cash_receiver_info;
use App\Models\cash_transaction;
use Brian2694\Toastr\Facades\Toastr;

class CashDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getDate($sign,$value)
    {
        $explode = explode($sign,$value);

        $date = $explode[2].'-'.$explode[0].'-'.$explode[1];

        return $date;
    }

    public function index()
    {
        $i = 1;
        $data = cash_transaction::where('deposit','!=',NULL)->get();
        
        return view('admin.cash_deposit.index',compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $receiver = cash_receiver_info::all();
        return view('admin.cash_deposit.create',compact('receiver'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = $this->getDate('/',$request->date);
        $data = array(

            'date'=>$date,
            'receiver_id'=>$request->receiver_id,
            'deposit'=>$request->deposit,
            'receiver'=>$request->receiver,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
           
            
        );

        $insert = cash_transaction::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('cash_deposit.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('cash_deposit.index'));
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
        $data = cash_transaction::where('id',$id)->first();
        
        $receiver = cash_receiver_info::all();
        // dd($receiver);
        $explode = explode('-',$data->date);

        $date = $explode['1'].'/'.$explode['2'].'/'.$explode[0];
        return view('admin.cash_deposit.edit',compact('receiver','data','date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $date = $this->getDate('/',$request->date);
        $data = array(

            'date'=>$date,
            'receiver_id'=>$request->receiver_id,
            'deposit'=>$request->deposit,
            'receiver'=>$request->receiver,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
           
            
        );

        $update = cash_transaction::find($id)->update($data);

        if($update)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('cash_deposit.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('cash_deposit.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        cash_transaction::where('id',$id)->delete();
        Toastr::success('Data Delete Successfully', 'success');
            return redirect(route('cash_deposit.index'));
    }

    public function retrive_cash_deposit($id)
    {
        cash_transaction::where('id',$id)->withTrashed()->restore();
        return redirect()->route('cash_deposit.index') ->with('message','Others Income List Retrive Successfully');
    } 

    public function delete_cash_deposit($id){

        cash_transaction::where('id',$id)->withTrashed()->forceDelete();
        return redirect()->route('cash_deposit.index') ->with('message','Others Income List Permanently Deleted Successfully');
    }
}
