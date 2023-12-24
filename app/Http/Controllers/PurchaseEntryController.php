<?php

namespace App\Http\Controllers;
use App\Models\supplier_info;
use App\Models\supplier_payment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class PurchaseEntryController extends Controller
{
    public function getDate($sign,$value)
    {
        $explode = explode($sign,$value);

        $date = $explode[2].'-'.$explode[0].'-'.$explode[1];

        return $date;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = supplier_payment::leftjoin("supplier_infos",'supplier_infos.id','supplier_payments.supplier_id')
        ->where('supplier_payments.payable','!=',NULL)
        ->select("supplier_payments.*",'supplier_infos.name','supplier_infos.name_bn')
        ->get();

        $i = 1;
        return view('admin.purchase_entry.index',compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplier = supplier_info::all();
        return view('admin.purchase_entry.create',compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        $date = $this->getDate('/',$request->date);
        $data = array(

            'date'=>$date,
            'supplier_id'=>$request->supplier_id,
            'payable'=>$request->amount,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,


        );

        $insert = supplier_payment::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('purchase_entry.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('purchase_entry.index'));
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
        return view('admin.purchase_entry.edit',compact('supplier','data','date'));
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
            'payable'=>$request->amount,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,


        );

        $update = supplier_payment::find($id)->update($data);

        if($update)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('purchase_entry.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('purchase_entry.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        supplier_payment::where('id',$id)->delete();
        Toastr::success('Data Delete Successfully', 'success');
            return redirect(route('purchase_entry.index'));
    }

    public function retrive_purchase_entry($id)
    {
        supplier_payment::where('id',$id)->withTrashed()->restore();
        return redirect()->route('purchase_entry.index') ->with('message','Others Income List Retrive Successfully');
    }

    public function delete_purchase_entry($id){

        supplier_payment::where('id',$id)->withTrashed()->forceDelete();
        return redirect()->route('purchase_entry.index') ->with('message','Others Income List Permanently Deleted Successfully');
    }
}
