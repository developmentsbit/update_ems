<?php

namespace App\Http\Controllers;
use App\Models\class_info;
use Illuminate\Http\Request;
use App\Models\add_fee_title;
use App\Service\ApiService;
use App\Service\feeService;
use Brian2694\Toastr\Facades\Toastr;

class AddFeeTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class = (new class_info())->getData();
        return view('admin.add_fee_title.index',compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class =(new class_info())->getData();
        return view('admin.add_fee_title.create',compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $response = FeeService::storeFeeTitle($request);

        if($response['status_code'] == ApiService::API_SERVICE_SUCCESS_CODE)
        {
            Toastr::success($response['status_message'], 'success');
            return redirect(route('add_fee_title.index'));
        }
        else
        {
            Alert::error('Congrats', $response['status_message']);
            return redirect(route('add_fee_title.index'));
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
        $data = feeService::edit($id);
        return view('admin.add_fee_title.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $response = FeeService::storeFeeTitle($request,$id);

        if($response['status_code'] == ApiService::API_SERVICE_SUCCESS_CODE)
        {
            Toastr::success($response['status_message'], 'success');
            return redirect(route('add_fee_title.index'));
        }
        else
        {
            Alert::error('Congrats', $response['status_message']);
            return redirect(route('add_fee_title.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $response =  (new add_fee_title())->destroyFeeTitle($id);
       if($response){
        Toastr::success('Data Delete Successfully', 'success');

       }else{
        Toastr::success('Data Delete not Successfully', 'danger');

       }
            return redirect(route('add_exam_type.index'));
    }
    public function showFreeTitle(Request $request)
    {
        $data = [];
        $data['year'] = $request->year??'';
        $data['sl'] = 1;
        $data['data'] = (new add_fee_title())->findByData($request->class_id??'',$request->year??'',true);
        $data['class'] = (new class_info())->findByClassId($request->class_id ?? '');

        return view('admin.add_fee_title.show_fee',$data);
        // return view($this->path.'.show_student',compact('data'));
    }
}
