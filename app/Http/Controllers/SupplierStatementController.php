<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier_info;
use App\Models\supplier_payment;
use App\Traits\DateFormat;

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
        $data['sl'] = 1;
        $data['supplier'] = supplier_info::where('id',$request->supplier_id)->first();
        $data['report_type'] = $request->report_type;
        if($request->report_type == 'All')
        {
            $data['data'] = supplier_payment::where('supplier_id',$request->supplier_id)->get();
        }
        elseif($request->report_type == 'Daily')
        {
            $data['date'] = $request->date;
            $date = DateFormat::DateToDb('/',$request->date);
            $data['data'] = supplier_payment::where('supplier_id',$request->supplier_id)->where('date',$date)->get();
        }
        elseif($request->report_type == 'DateToDate')
        {
            $data['from_date'] = $request->from_date;
            $data['to_date'] = $request->to_date;
            $from_date = DateFormat::DateToDb('/',$request->from_date);
            $to_date = DateFormat::DateToDb('/',$request->to_date);
            $data['data'] = supplier_payment::where('supplier_id',$request->supplier_id)->whereBetween('date',[$from_date,$to_date])->get();
        }
        elseif($request->report_type == 'Monthly')
        {
            $data['month'] = $request->month;
            $data['year'] = $request->year;
            $data['data'] = supplier_payment::where('supplier_id',$request->supplier_id)->whereMonth('date',$request->month)->whereYear('date',$request->year)->get();
        }
        elseif($request->report_type == 'Yearly')
        {
            $data['year'] = $request->year;
            $data['data'] = supplier_payment::where('supplier_id',$request->supplier_id)->whereYear('date',$request->year)->get();
        }
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
