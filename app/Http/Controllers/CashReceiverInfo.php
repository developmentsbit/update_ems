<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cash_receiver_info;
use Brian2694\Toastr\Facades\Toastr;

class CashReceiverInfo extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $i = 1;
        $data = cash_receiver_info::get();
        return view('admin.cash_receiver_info.index',compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cash_receiver_info.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $data = array(

            'order_by'=>$request->order_by,
            'name'=>$request->name,
            'name_bn'=>$request->name_bn,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'address_bn'=>$request->address_bn,
            
        );

        $insert = cash_receiver_info::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('cash_receiver_info.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('cash_receiver_info.index'));
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
        $data = cash_receiver_info::where('id',$id)->first();
        return view('admin.cash_receiver_info.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array(

            'order_by'=>$request->order_by,
            'name'=>$request->name,
            'name_bn'=>$request->name_bn,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'address_bn'=>$request->address_bn,
            
        );

        $update = cash_receiver_info::find($id)->update($data);

        if($update)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('cash_receiver_info.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Update Unsuccessfully');
            return redirect(route('cash_receiver_info.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        cash_receiver_info::where('id',$id)->delete();
        Toastr::success('Data Delete Successfully', 'success');
            return redirect(route('cash_receiver_info.index'));
    }

    public function retrive_cash_receiver_info($id)
    {
        cash_receiver_info::where('id',$id)->withTrashed()->restore();
        return redirect()->route('cash_receiver_info.index') ->with('message','Others Income List Retrive Successfully');
    } 

    public function delete_cash_receiver_info($id){

        cash_receiver_info::where('id',$id)->withTrashed()->forceDelete();
        return redirect()->route('cash_receiver_info.index') ->with('message','Others Income List Permanently Deleted Successfully');
    }
}
