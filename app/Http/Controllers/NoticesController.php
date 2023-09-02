<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class NoticesController extends Controller
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
        $data = DB::table("notices")->get();
        return view('admin.notices.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('admin.notices.create');
 }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = array();
       $data['type']       = $request->type;
       $data['title']      = $request->title;
       $data['date']       = $request->date;
       $data['details']    = $request->details;
       $image              = $request->file('image');

       if ($image) {
        $image_name= rand(11111,99999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='notices_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        DB::table('notices')->insert($data);

    }
    else{
        DB::table('notices')->insert($data);
    }

    return redirect()->route('notices.index')->with('message','Notices Added Successfully');
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
        $data = DB::table("notices")->where('id',$id)->first();
     return view('admin.notices.edit',compact('data'));
 }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $data = array();
      $data['type']       = $request->type;
      $data['title']      = $request->title;
      $data['date']       = $request->date;
      $data['details']    = $request->details;
      $image              = $request->file('image');

      $old_image = DB::table("notices")->where('id',$id)->first();

      if ($image) {

      

        $image_name= rand(1111,9999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='notices_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        $update = DB::table('notices')->where('id', $id)->update($data);

    }else{
        $update = DB::table('notices')->where('id', $id)->update($data);
    }       

    if ($update) {
       return redirect()->route('notices.index')->with('message','Notices Update Successfully');
   }
   else{
    return redirect()->route('notices.index')->with('error','Notices Update Unsuccessfully');
}
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table("notices")->where('id',$id)->first();

       if ($data) {
         
         DB::table("notices")->where("id",$id)->delete();
         return redirect()->route('notices.index')->with('message','Notices Delete Successfully');
     }
     else{
       return redirect()->route('notices.index')->with('error','Notices Delete Unsuccessfully');
   }
}
}
