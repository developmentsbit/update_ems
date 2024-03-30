<?php

namespace App\Http\Controllers;

use App\Service\ApiService;
use App\Service\FeeService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class ColumnWiseFeeSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = FeeService::columnWiseSetupIndex();

        return view('admin.Fee.columnWiseFeeSetup',$response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = FeeService::columnWiseSetupIndex();

        return view('admin.Fee.columnWiseFeeSetup',$response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = FeeService::columnWiseSetupStore($request);

        if($response['status_code'] == ApiService::API_SERVICE_SUCCESS_CODE)
        {
            Toastr::success($response['status_message'], 'success');
            return redirect()->back();
        }
        else
        {
            Toastr::error($response['status_message'], 'success');
            return redirect()->back();
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
    public function destroy(Request $request)
    {
       return $response  =  FeeService::columnFeeClassWiseDestroy($request->id ?? '');

    }

    public function columnFeeClassWise(Request $request){
        $response  = FeeService::columnFeeClassWise($request);
        $view = view('admin.Fee.feeTitleShow',$response)->render();
        return response()->Json(['data'=>$response,'view'=>$view]);
    }
}
