<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier_info;
use Brian2694\Toastr\Facades\Toastr;

class SupplierInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $i = 1;
        $data = supplier_info::get();
        return view('admin.supplier_info.index',compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
       
        return view('admin.supplier_info.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $data = array(

            'order_by'=>$request->order_by,
            'name'=>$request->name,
            'name_bn'=>$request->name_bn,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'address_bn'=>$request->address_bn,
            
        );

        $insert = supplier_info::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('supplier_info.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('supplier_info.index'));
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
        $data = supplier_info::where('id',$id)->first();
        return view('admin.supplier_info.edit',compact('data'));
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

        $update = supplier_info::find($id)->update($data);

        if($update)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('supplier_info.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Update Unsuccessfully');
            return redirect(route('supplier_info.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        supplier_info::where('id',$id)->delete();
        Toastr::success('Data Delete Successfully', 'success');
            return redirect(route('supplier_info.index'));
    }

    public function retrive_supplier_info($id)
    {
        supplier_info::where('id',$id)->withTrashed()->restore();
        return redirect()->route('supplier_info.index') ->with('message','Others Income List Retrive Successfully');
    } 

    public function delete_supplier_info($id){

        supplier_info::where('id',$id)->withTrashed()->forceDelete();
        return redirect()->route('supplier_info.index') ->with('message','Others Income List Permanently Deleted Successfully');
    }
}
