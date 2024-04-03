<?php

namespace App\Http\Controllers;

use App\Service\ApiService;
use App\Service\FeeService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = FeeService::addStudentFeeIndex();
        return view('admin.Fee.StudentFee.addFeeInStudentAC',$response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 0;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $response = FeeService::storeStudentFee($request);

        if($response['status_code'] == ApiService::API_SERVICE_SUCCESS_CODE){
            Toastr::success($response['status_message'], 'success');

        }else{
            Toastr::success($response['status_message'], 'danger');

        }
        return redirect()->back();
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