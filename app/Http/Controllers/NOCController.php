<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\add_noc;

class NOCController extends Controller
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
        $data = add_noc::get();
        return view('admin.add_noc.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_noc.create');
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

            $file->move(public_path().'/assets/images/add_noc/',$imageName);

            $data['image'] = $imageName;

        }

        $insert = add_noc::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('add_noc.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Unsuccess');
            return redirect(route('add_noc.index'));
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
        $data = add_noc::find($id);

        $explode = explode('-',$data->date);

        $date = $explode['1'].'/'.$explode['2'].'/'.$explode[0];

        return view('admin.add_noc.edit',compact('data','date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $file = $request->file('image');

        if($file)
        {
            $pathImage = add_noc::find($id);

            $path = public_path().'/assets/images/add_noc/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }

        }

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/assets/images/add_noc/',$imageName);

            add_noc::where('id',$id)->update(['image'=>$imageName]);

        }

        $date = $this->getDate('/',$request->date);

        $update = add_noc::find($id)->update([
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
            return redirect(route('add_noc.index'));
        }
        else
        {
            Toastr::error('Data Update Error', 'success');
            return redirect(route('add_noc.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pathImage= add_noc::where('id',$id)->select('image')->first();

        $path=public_path().'/assets/images/add_noc/'.$pathImage->image;
        // return $path;
        if(file_exists($path))
        {
            unlink($path);
        }

        add_noc::where('id',$id)->delete();

        Toastr::success('Data Insert Success', 'success');
        return redirect(route('add_noc.index'));
    }

    // public function nocStatusChanged($id)
    // {
    //     $data = add_noc::find($id);
    //     if($data->status == 1)
    //     {
    //         add_noc::find($id)->update([
    //             'status' => 0,
    //         ]);
    //     }
    //     else
    //     {
    //         add_noc::find($id)->update([
    //             'status' => 1,
    //         ]);
    //     }

    //     return 1;
    // }
}
