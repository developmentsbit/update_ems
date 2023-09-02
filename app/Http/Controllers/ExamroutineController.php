<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class ExamroutineController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table("examroutine")
        ->join('addclass','addclass.id','examroutine.class_id')
        ->select("examroutine.*",'addclass.class_name')
        ->get();
        return view('admin.examroutine.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = DB::table("addclass")->where('status',1)->get();
        return view('admin.examroutine.create',compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $data = array();
     $data['title']      = $request->title;
     $data['date']       = $request->date;
     $data['class_id']   = $request->class_id;
     $image              = $request->file('image');

     if ($image) {
        $image_name= rand(11111,99999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='examroutine_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        DB::table('examroutine')->insert($data);

    }
    else{
        DB::table('examroutine')->insert($data);
    }

    return redirect()->route('examroutine.index')->with('message','Exam Routine Added Successfully');
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
        $data = DB::table("examroutine")->where('id',$id)->first();
        $class = DB::table("addclass")->where('status',1)->get();
        return view('admin.examroutine.edit',compact('data','class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $data = array();
      $data['title']      = $request->title;
      $data['date']       = $request->date;
      $data['class_id']   = $request->class_id;
      $image              = $request->file('image');

      $old_image = DB::table("examroutine")->where('id',$id)->first();

      if ($image) {



        $image_name= rand(1111,9999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='examroutine_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        $update = DB::table('examroutine')->where('id', $id)->update($data);

    }else{
        $update = DB::table('examroutine')->where('id', $id)->update($data);
    }       

    if ($update) {
        return redirect()->route('examroutine.index')->with('message','Exam Routine Update Successfully');
    }
    else{
        return redirect()->route('examroutine.index')->with('error','Exam Routine Update Unsuccessfully');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table("examroutine")->where('id',$id)->first();

        if ($data) {

           DB::table("examroutine")->where("id",$id)->delete();
           return redirect()->route('examroutine.index')->with('message','Exam Routine Delete Successfully');
       }
       else{
        return redirect()->route('examroutine.index')->with('error','Exam Routine Delete Unsuccessfully');
    }
}
}
