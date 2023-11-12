<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\online_lecture_upload;
use App\Models\class_info;
use App\Models\group_info;

class OnlineLectureUploadController extends Controller
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
    public function index(Request $request)
    {
        $data = online_lecture_upload::leftjoin("addclass",'addclass.id','online_lecture_uploads.class_id')
        ->leftjoin("addgroup",'addgroup.id','online_lecture_uploads.group_id')
        ->select("online_lecture_uploads.*",'addclass.class_name','addgroup.group_name','addclass.class_name_bn','addgroup.group_name_bn')
        ->get();
        $sl=1;
        return view('admin.online_lecture_upload.index',compact('sl','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = class_info::all();
        $group = group_info::all();

        return view('admin.online_lecture_upload.create',compact('class','group'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = $this->getDate('/',$request->date);

        $data = array(
            'date'=>$date, 
            'class_id'=>$request->class_id,
            'group_id'=>$request->group_id,
            'title_en'=>$request->title_en,
            'title_bn'=>$request->title_bn,
            'teacher_name_en'=>$request->teacher_name_en,
            'teacher_name_bn'=>$request->teacher_name_bn,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
            'video_url'=>$request->video_url,
            'status'=>$request->status,
        );

        $file = $request->file('image');

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/assets/images/online_lecture_upload/',$imageName);

            $data['image'] = $imageName;

        }

        $insert = online_lecture_upload::create($data);

        if($insert)
        {
            Toastr::success('Data Insert Success', 'success');
            return redirect(route('online_lecture_upload.index'));
        }
        else
        {
            Alert::error('Congrats', 'Data Insert Error');
            return redirect(route('online_lecture_upload.index'));
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
    public function edit(Request $request, string $id)
    {
        $data = online_lecture_upload::find($id);
        $class = class_info::all();
        $group = group_info::all();

        $explode = explode('-',$data->date);

        $date = $explode['1'].'/'.$explode['2'].'/'.$explode[0];

        return view('admin.online_lecture_upload.edit',compact('data','class','group','date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $file = $request->file('image');

        if($file)
        {
            $pathImage = online_lecture_upload::find($id);

            $path = public_path().'/assets/images/online_lecture_upload/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }

        }

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/assets/images/online_lecture_upload/',$imageName);

            online_lecture_upload::where('id',$id)->update(['image'=>$imageName]);

        }

        $date = $this->getDate('/',$request->date);

        $update = online_lecture_upload::find($id)->update([
            'date'=>$date,
            'class_id'=>$request->class_id,
            'group_id'=>$request->group_id,
            'title_en'=>$request->title_en,
            'title_bn'=>$request->title_bn,
            'teacher_name_en'=>$request->teacher_name_en,
            'teacher_name_bn'=>$request->teacher_name_bn,
            'details'=>$request->details,
            'details_bn'=>$request->details_bn,
            'video_url'=>$request->video_url,
            'status'=>$request->status,
        ]);

        if($update)
        {
            Toastr::success('Data Update Success', 'success');
            return redirect(route('online_lecture_upload.index'));
        }
        else
        {
            Toastr::error('Data Update Error', 'success');
            return redirect(route('online_lecture_upload.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        online_lecture_upload::find($id)->delete();

        Toastr::error('Data Delete Success', 'success');
        return redirect(route('online_lecture_upload.index'));
    }
}
