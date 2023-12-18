<?php

namespace App\Http\Controllers;
use App\Models\class_info;
use Illuminate\Http\Request;
use App\Models\add_fee_title;
use Brian2694\Toastr\Facades\Toastr;

class AddFeeTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class = class_info::all();
        return view('admin.add_fee_title.index',compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $class = class_info::all();
        return view('admin.add_fee_title.create',compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array(
            
            'title'=>$request->title,
            'title_bn'=>$request->title_bn,
            'year'=>$request->year,
            'amount'=>$request->amount,
            'class_id'=>$request->class_id,
            'month'=>$request->month,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
            'fee'=>$request->fee,
            'feeType'=>$request->feeType,
           
        );
        $insert = add_fee_title::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('add_fee_title.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
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
        $class = class_info::all();
        $data = add_fee_title::where('id',$id)->first();
        return view('admin.add_fee_title.edit',compact('data','class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array(
            
            'title'=>$request->title,
            'title_bn'=>$request->title_bn,
            'year'=>$request->year,
            'amount'=>$request->amount,
            'class_id'=>$request->class_id,
            'month'=>$request->month,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
            'fee'=>$request->fee,
            'feeType'=>$request->feeType,
           
        );
        $insert = add_fee_title::find($id)->update($data);

        if($insert)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('add_fee_title.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Update Unsuccessfully');
            return redirect(route('add_fee_title.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        add_fee_title::where('id',$id)->delete();
        Toastr::success('Data Delete Successfully', 'success');
            return redirect(route('add_exam_type.index'));
    }
    public function showFreeTitle(Request $request)
    {
        $data = [];
        $data['year'] = $request->year;
        $data['sl'] = 1;
        $data['data'] = add_fee_title::where('class_id',$request->class_id)->where('year',$request->year)->with('class')->get();
        $data['class'] = class_info::where('id',$request->class_id)->first();
        
        return view('admin.add_fee_title.show_fee',compact('data'));
        // return view($this->path.'.show_student',compact('data'));
    }
}
