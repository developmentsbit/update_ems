<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bank_transaction_entry;
use App\Models\bank_info;

class BankTransactionReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data  = [];
        $data['i'] = 1;
        $data['data'] = bank_info::with('transaction')->get();

        return view('admin.bank_transaction_report.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
