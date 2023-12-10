<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\session;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = session::all();
        return view('admin.session.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.session.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array(
            'session'=>$request->session,
            'status'=>$request->status,
        );

        $insert = session::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('session.index'));
        }
        else
        {
            Toastr::error('Congrats', 'Data Insert Unsuccess');
            return redirect(route('session.index'));
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
        $data = session::find($id);

        return view('admin.session.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $update = session::find($id)->update([
            'session'=>$request->session,
            'status'=>$request->status,
        ]);

        if($update)
        {
            Toastr::success('Data Update Success','success');
            return redirect(route('session.index'));
        }
        else {
            Toastr::error(__('Data Update Unsuccess'));
            return redirect()->route('session.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        session::find($id)->delete();

        Toastr::error('Data Delete Success', 'success');
        return redirect(route('session.index'));
    }
}
