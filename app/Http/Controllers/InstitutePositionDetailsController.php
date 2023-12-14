<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\institute_position_details;
use Brian2694\Toastr\Facades\Toastr;

class InstitutePositionDetailsController extends Controller
{
    public function getDate($sign,$value)
    {
        $explode = explode($sign,$value);

        $date = $explode[2].'-'.$explode[0].'-'.$explode[1];

        return $date;
    }

    public function getOriginalDate($sign,$value)
    {
        $explode = explode($sign,$value);

        $date = $explode[1].'-'.$explode[2].'-'.$explode[0];

        return $date;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = institute_position_details::get();

        return view('admin.institute_position_details.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.institute_position_details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = $this->getDate('/',$request->date);

        $data = array(
            'date'=>$date,
            'serial_no'=>$request->serial_no,
            'title'=>$request->title,
            'title_bn'=>$request->title_bn,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
            'status'=>$request->status,
        );

        $file = $request->file('image');

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/assets/images/institute_position_details/',$imageName);

            $data['image'] = $imageName;

        }

        $insert = institute_position_details::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('institute_position_details.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Unsuccess');
            return redirect(route('institute_position_details.index'));
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
        $data = institute_position_details::find($id);

        $explode = explode('-',$data->date);

        $date = $explode['1'].'/'.$explode['2'].'/'.$explode[0];

        return view('admin.institute_position_details.edit',compact('data','date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $file = $request->file('image');

        if($file)
        {
            $pathImage = institute_position_details::find($id);

            $path = public_path().'/assets/images/institute_position_details/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }

        }

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/assets/images/institute_position_details/',$imageName);

            institute_position_details::where('id',$id)->update(['image'=>$imageName]);

        }

        $date = $this->getDate('/',$request->date);

        $update = institute_position_details::find($id)->update([
            'date'=>$date,
            'serial_no'=>$request->serial_no,
            'title'=>$request->title,
            'title_bn'=>$request->title_bn,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
            'status'=>$request->status,
        ]);

        if($update)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('institute_position_details.index'));
        }
        else
        {
            Toastr::error('Data Update Error', 'success');
            return redirect(route('institute_position_details.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pathImage= institute_position_details::where('id',$id)->select('image')->first();

        $path=public_path().'/assets/images/institute_position_details/'.$pathImage->image;

        if(file_exists($path))
        {
            unlink($path);
        }

        institute_position_details::where('id',$id)->delete();

        Toastr::error('Data Delete Success', 'success');
        return redirect(route('institute_position_details.index'));
    }
}
