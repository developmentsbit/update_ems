<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bank_info;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use App\Traits\Idgenerator;
use Auth;

class BankInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = bank_info::with('admin')
        ->get();
        $i = 1;

        return view('admin.bank_info.index',compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bank_info.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array(
            'admin_id'=>Auth::user()->id,
            'type'=>$request->type,
            'bank_name'=>$request->bank_name,
            'account_number'=>$request->account_number,
            'account_type'=>$request->account_type,
            'address'=>$request->address,
            'address_bn'=>$request->address_bn,
            'contact'=>$request->contact,
            'status'=>$request->status,
        );

        $insert = bank_info::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('bank_info.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('bank_info.index'));
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
        $data = bank_info::where('id',$id)->first();

        return view('admin.bank_info.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = bank_info::find($id)->update([
            'admin_id'=>Auth::user()->id,
            'type'=>$request->type,
            'bank_name'=>$request->bank_name,
            'account_number'=>$request->account_number,
            'account_type'=>$request->account_type,
            'address'=>$request->address,
            'address_bn'=>$request->address_bn,
            'contact'=>$request->contact,
            'status'=>$request->status,
        ]);

        if($update)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('bank_info.index'));
        }
        else
        {
            Toastr::error('Data Update Unsuccess', 'success');
            return redirect(route('bank_info.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        bank_info::where('id',$id)->delete();

        Toastr::success('Data Delete Successfully', 'success');
        return redirect(route('bank_info.index'));
    }

    public function retrive_bank_info($id)
    {
        bank_info::where('id',$id)->withTrashed()->restore();
        return redirect()->route('bank_info.index') ->with('message','Bank Info List Restore Successfully');
    } 

    public function delete_bank_info($id){

        bank_info::where('id',$id)->withTrashed()->forceDelete();
        return redirect()->route('bank_info.index') ->with('message','Bank Info Permanently Deleted Successfully');
    }
}
