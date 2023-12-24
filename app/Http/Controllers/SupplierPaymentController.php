<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier_info;
use App\Models\supplier_payment;
use App\Models\purchase_entry;
use Brian2694\Toastr\Facades\Toastr;

class SupplierPaymentController extends Controller
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
        $data = supplier_payment::get();
        return view('admin.supplier_payment.index',compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplier = supplier_info::all();
        return view('admin.supplier_payment.create',compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $date = $this->getDate('/',$request->date);
        $data = array(

            'date'=>$date,
            'supplier_id'=>$request->supplier_id,
            'amount'=>$request->amount,
            'receiver'=>$request->receiver,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,


        );

        $insert = supplier_payment::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('supplier_payment.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('supplier_payment.index'));
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
        $data = supplier_payment::where('id',$id)->first();

        $supplier = supplier_info::all();

        $explode = explode('-',$data->date);

        $date = $explode['1'].'/'.$explode['2'].'/'.$explode[0];

        return view('admin.supplier_payment.edit',compact('supplier','data','date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $date = $this->getDate('/',$request->date);
        $data = array(

            'date'=>$date,
            'supplier_id'=>$request->supplier_id,
            'amount'=>$request->amount,
            'receiver'=>$request->receiver,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,


        );

        $update = supplier_payment::find($id)->update($data);

        if($update)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('supplier_payment.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('supplier_payment.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        supplier_payment::where('id',$id)->delete();
        Toastr::success('Data Delete Successfully', 'success');
            return redirect(route('supplier_payment.index'));
    }

    public function retrive_supplier_payment($id)
    {
        supplier_payment::where('id',$id)->withTrashed()->restore();
        return redirect()->route('supplier_payment.index') ->with('message','Others Income List Retrive Successfully');
    }

    public function delete_supplier_payment($id){

        supplier_payment::where('id',$id)->withTrashed()->forceDelete();
        return redirect()->route('supplier_payment.index') ->with('message','Others Income List Permanently Deleted Successfully');
    }

    public function getSupplierDue($id)
    {
        $purchase_amount = purchase_entry::purchaseAmount($id);
        $payment = supplier_payment::totalPayment($id);
        $due = $purchase_amount - $payment;
        return $due;
    }

}
