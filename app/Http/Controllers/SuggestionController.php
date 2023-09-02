<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class SuggestionController extends Controller
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
        $data = DB::table("suggestion")
        ->join('addclass','addclass.id','suggestion.class_id')
        ->select("suggestion.*",'addclass.class_name')
        ->get();
        return view('admin.suggestion.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = DB::table("addclass")->where('status',1)->get();
        return view('admin.suggestion.create',compact('class'));
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
        $upload_path='suggestion_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        DB::table('suggestion')->insert($data);

    }
    else{
        DB::table('suggestion')->insert($data);
    }

    return redirect()->route('suggestion.index')->with('message','Suggestion Added Successfully');
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
        $data = DB::table("suggestion")->where('id',$id)->first();
        $class = DB::table("addclass")->where('status',1)->get();
        return view('admin.suggestion.edit',compact('data','class'));
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

      $old_image = DB::table("suggestion")->where('id',$id)->first();

      if ($image) {



        $image_name= rand(1111,9999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='suggestion_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        $update = DB::table('suggestion')->where('id', $id)->update($data);

    }else{
        $update = DB::table('suggestion')->where('id', $id)->update($data);
    }       

    if ($update) {
        return redirect()->route('suggestion.index')->with('message','Suggestion Update Successfully');
    }
    else{
        return redirect()->route('suggestion.index')->with('error','Suggestion Update Unsuccessfully');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table("suggestion")->where('id',$id)->first();

        if ($data) {

           DB::table("suggestion")->where("id",$id)->delete();
           return redirect()->route('suggestion.index')->with('message','Suggestion Delete Successfully');
       }
       else{
        return redirect()->route('suggestion.index')->with('error','Suggestion Delete Unsuccessfully');
    }
}
}
