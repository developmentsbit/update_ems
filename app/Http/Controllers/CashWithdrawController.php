<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\cash_receiver_info;
use App\Models\cash_transaction;
use Brian2694\Toastr\Facades\Toastr;


class CashWithdrawController extends Controller
{
    public function getDate($sign,$value)
    {
        $explode = explode($sign,$value);

        $date = $explode[2].'-'.$explode[0].'-'.$explode[1];

        return $date;
    }
    /**
     * 
     * Display a listing of the resource.
     */
    public function index()
    {
        $i = 1;
        $data = cash_transaction::where('withdraw','!=',NULL)->with('recivers')->get();

        // dd($data);
      
        return view('admin.cash_withdraw.index',compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $receiver = cash_receiver_info::all();
        return view('admin.cash_withdraw.create',compact('receiver'));
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
            'receiver'=>$request->receiver,
            'withdraw'=>$request->withdraw,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
           
            
        );

        $insert = cash_transaction::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('cash_withdraw.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('cash_withdraw.index'));
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
        return view('admin.cash_withdraw.edit',compact('receiver','data','date'));
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
            'withdraw'=>$request->withdraw,
            'receiver'=>$request->receiver,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
           
            
        );

        $update = cash_transaction::find($id)->update($data);

        if($update)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('cash_withdraw.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('cash_withdraw.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        cash_transaction::where('id',$id)->delete();
        Toastr::success('Data Delete Successfully', 'success');
            return redirect(route('cash_withdraw.index'));
    }

    public function retrive_cash_withdraw($id)
    {
        cash_transaction::where('id',$id)->withTrashed()->restore();
        return redirect()->route('cash_withdraw.index') ->with('message','Cash Withdraw List Retrive Successfully');
    } 

    public function delete_cash_withdraw($id){

        cash_transaction::where('id',$id)->withTrashed()->forceDelete();
        return redirect()->route('cash_withdraw.index') ->with('message','Cash Withdraw List Permanently Deleted Successfully');
    }

    public function getReceiverDue($id)
    {
        $purchase_amount = cash_transaction::deposit($id);
        $payment = cash_transaction::withdraw($id);
        $due = $purchase_amount - $payment;
        return $due;
    }
}
