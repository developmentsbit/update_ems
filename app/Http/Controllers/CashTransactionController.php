<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cash_receiver_info;
use App\Models\cash_transaction;

class CashTransactionController extends Controller
{
    public $path;
    public function __construct()
    {
        $this->path = 'admin.cash_trans_report';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reciver = cash_receiver_info::all();
        return view($this->path.'.index',compact('reciver'));
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

    public function cash_statement(Request $request)
    {
        $data =[];
        $data['reciver_id'] = $request->reciver_id;
        $data['report_type'] = $request->report_type;
        $data['date'] = $request->date;
        $data['from_date'] = $request->from_date;
        $data['to_date'] = $request->to_date;
        $data['month'] = $request->month;
        $data['year'] = $request->year;
        $params = [];

        $params['reciver_id']= $request->reciver_id;
        $params['report_type'] = $request->report_type;
        $params['date'] = $request->date;
        $params['from_date'] = $request->from_date;
        $params['to_date'] = $request->to_date;
        $params['month'] = $request->month;
        $params['year'] = $request->year;
        if($request->reciver_id != 'All')
        {

            $data['reciver'] = cash_receiver_info::find($request->reciver_id);
        }

        $data['data'] = cash_transaction::findData($params);

        return view($this->path.'.cash_statement',compact('data'));
    }
}
