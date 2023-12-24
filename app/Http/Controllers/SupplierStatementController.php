<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier_info;
use App\Models\supplier_payment;

use Brian2694\Toastr\Facades\Toastr;

class SupplierStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $supplier = supplier_info::get();
        $i=1;
        return view('admin.supplier_statement.index',compact('supplier','i'));
        // return view($this->path.'.show_student',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = [];
        // $data['year'] = $request->year;
        $data['sl'] = 1;
        $data['data'] = supplier_payment::where('supplier_id',$request->supplier_id)->get();
        $data['supplier'] = supplier_info::where('id',$request->supplier_id)->first();
        return view('admin.supplier_statement.statement',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
