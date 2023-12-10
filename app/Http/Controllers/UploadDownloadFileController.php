<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\upload_download_file;

class UploadDownloadFileController extends Controller
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
        $data = upload_download_file::all();
        $sl = 1;
        return view('admin.upload_download_file.index',compact('data','sl'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.upload_download_file.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = $this->getDate('/',$request->date);

        $data = array(
            'date'=>$date,
            'title_en'=>$request->title_en,
            'title_bn'=>$request->title_bn,
            'status'=>$request->status,
        );

        $file = $request->file('image');

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/assets/images/upload_download_file/',$imageName);

            $data['image'] = $imageName;

        }

        $insert = upload_download_file::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('upload_download_file.index'));
        }
        else
        {
            Toastr::error('Congrats', 'Data Insert Error');
            return redirect(route('upload_download_file.index'));
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
        $data = upload_download_file::find($id);

        $explode = explode('-',$data->date);

        $date = $explode['1'].'/'.$explode['2'].'/'.$explode[0];

        return view('admin.upload_download_file.edit',compact('data','date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $file = $request->file('image');

        if($file)
        {
            $pathImage = upload_download_file::find($id);

            $path = public_path().'/assets/images/upload_download_file/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }

        }

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/assets/images/upload_download_file/',$imageName);

            upload_download_file::where('id',$id)->update(['image'=>$imageName]);

        }

        $date = $this->getDate('/',$request->date);

        $update = upload_download_file::find($id)->update([
            'date'=>$date,
            'title_en'=>$request->title_en,
            'title_bn'=>$request->title_bn,
            'status'=>$request->status,
        ]);

        if($update)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('upload_download_file.index'));
        }
        else
        {
            Toastr::error('Data Update Error', 'success');
            return redirect(route('upload_download_file.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pathImage= upload_download_file::where('id',$id)->select('image')->first();

        $path=public_path().'/assets/images/upload_download_file/'.$pathImage->image;

        if(file_exists($path))
        {
            unlink($path);
        }

        upload_download_file::where('id',$id)->delete();

        Toastr::success('Data Insert Success', 'success');
        return redirect(route('upload_download_file.index'));
    }
}
