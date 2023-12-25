<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bank_transaction_entry;
use App\Models\bank_info;
use App\Traits\DateFormat;

class BankTransactionStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bank  = bank_info::get();

        return view('admin.bank_transaction_statement.index',compact('bank'));
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

    public function bankstatementreports(Request $request){
        $data = [];
        $data['bank'] = bank_info::find($request->bank_id);
        $data['report_type'] = $request->report_type;
        $data['date'] = $request->date;
        $data['from_date'] = $request->from_date;
        $data['to_date'] = $request->to_date;
        $data['month'] = $request->month;
        $data['year'] = $request->year;
        $data['data'] = bank_transaction_entry::findData(
            $request->bank_id,
            $request->report_type,
            $request->date,
            $request->from_date,
            $request->to_date,
            $request->month,
            $request->year
        );
		return view("admin.bank_transaction_statement.bankstatementreports",compact('data'));

	}
}
