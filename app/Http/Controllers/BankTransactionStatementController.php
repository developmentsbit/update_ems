<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bank_transaction_entry;
use App\Models\bank_info;

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

		$bank_id     = $request->bank_id;
		$type        = $request->Type;
		$all       = $request->all;
		$date1       = $request->start_date;
		$date2       = $request->end_date;
		$month       = $request->month;
		$year        = $request->year;

		if ($request->bank_id == "All") {
			
			if ($type == 1) {

				$data = bank_transaction_entry::join("bank_infos","bank_infos.id","bank_transaction_entries.bank_id")
				->select("bank_transaction_entries.*","bank_infos.bank_name","bank_infos.account_number","bank_infos.account_type")
				->where("bank_transaction_entries.transaction_type",$all)
				->get();				
			}
			if ($type == 2) {

				$data = bank_transaction_entry::join("bank_infos","bank_infos.id","bank_transaction_entries.bank_id")
				->select("bank_transaction_entries.*","bank_infos.bank_name","bank_infos.account_number","bank_infos.account_type")
				->where("bank_transaction_entries.transaction_type",$date1)
				->get();				
			}
			elseif($type == 3){

				$data = bank_transaction_entry::join("bank_infos","bank_infos.id","bank_transaction_entries.bank_id")
				->select("bank_transaction_entries.*","bank_infos.bank_name","bank_infos.account_number","bank_infos.account_type")
				->whereBetween("bank_transaction_entries.transaction_type",array($date1,$date2))
				->get();
			}
			elseif($type == 4){

				$data = bank_transaction_entry::join("bank_infos","bank_infos.id","bank_transaction_entries.bank_id")
				->select("bank_transaction_entries.*","bank_infos.bank_name","bank_infos.account_number","bank_infos.account_type")
				->whereMonth("bank_transaction_entries.transaction_type",$month)
				->whereYear("bank_transaction_entries.transaction_type",$year)
				->get();
			}
			elseif($type == 5){

				$data = bank_transaction_entry::join("bank_infos","bank_infos.id","bank_transaction_entries.bank_id")
				->select("bank_transaction_entries.*","bank_infos.bank_name","bank_infos.account_number","bank_infos.account_type")
				->whereYear("bank_transaction_entries.transaction_type",$year)
				->get();
			}
		}
		else{

			if ($type == 1) {

				$data = bank_transaction_entry::join("bank_infos","bank_infos.id","bank_transaction_entries.bank_id")
				->select("bank_transaction_entries.*","bank_infos.bank_name","bank_infos.account_number","bank_infos.account_type")
				->where("bank_transaction_entries.transaction_type",$all)
				
				->where("bank_transaction_entries.bank_id",$bank_id)
				->get();
			}
			
            if ($type == 2) {

				$data = bank_transaction_entry::join("bank_infos","bank_infos.id","bank_transaction_entries.bank_id")
				->select("bank_transaction_entries.*","bank_infos.bank_name","bank_infos.account_number","bank_infos.account_type")
				->where("bank_transaction_entries.transaction_type",$date1)
				
				->where("bank_transaction_entries.bank_id",$bank_id)
				->get();
			}

			elseif($type == 3){
				$data = bank_transaction_entry::join("bank_infos","bank_infos.id","bank_transaction_entries.bank_id")
				->select("bank_transaction_entries.*","bank_infos.bank_name","bank_infos.account_number","bank_infos.account_type")
				->whereBetween("bank_transaction_entries.transaction_type",array($date1,$date2))
				
				->where("bank_transaction_entries.bank_id",$bank_id)
				->get();
			}

			elseif($type == 4){
				$data = bank_transaction_entry::join("bank_infos","bank_infos.id","bank_transaction_entries.bank_id")
				->select("bank_transaction_entries.*","bank_infos.bank_name","bank_infos.account_number","bank_infos.account_type")
				->whereMonth("bank_transaction_entries.transaction_type",$month)
				->whereYear("bank_transaction_entries.transaction_type",$year)
				
				->where("bank_transaction_entries.bank_id",$bank_id)
				->get();
			}

			elseif($type == 5){
				
				$data = bank_transaction_entry::join("bank_infos","bank_infos.id","bank_transaction_entries.bank_id")
				->select("bank_transaction_entries.*","bank_infos.bank_name","bank_infos.account_number","bank_infos.account_type")
				->whereYear("bank_transaction_entries.transaction_type",$year)
				
				->where("bank_transaction_entries.bank_id",$bank_id)
				->get();
			}
		}

		return view("admin.bank_transaction_statement.bankstatementreports",compact('data','type','date1','date2','month','year'));

	}
}
