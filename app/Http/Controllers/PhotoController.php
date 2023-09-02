<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class PhotoController extends Controller
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
        $data = DB::table("photogallerys")->get();
        return view('admin.photogallerys.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('admin.photogallerys.create');
 }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = array();
       $data['title']      = $request->title;
       $data['slider']     = $request->slider;
       $image              = $request->file('image');

       if ($image) {
        $image_name= rand(11111,99999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='photogallerys_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        DB::table('photogallerys')->insert($data);

    }
    else{
        DB::table('photogallerys')->insert($data);
    }

    return redirect()->route('photogallerys.index')->with('message','Photo Added Successfully');
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
        $data = DB::table("photogallerys")->where('id',$id)->first();
     return view('admin.photogallerys.edit',compact('data'));
 }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $data = array();
      $data['title']      = $request->title;
      $data['slider']     = $request->slider;
      $image              = $request->file('image');

      $old_image = DB::table("photogallerys")->where('id',$id)->first();

      if ($image) {

        unlink($old_image->image);

        $image_name= rand(1111,9999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='photogallerys_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        $update = DB::table('photogallerys')->where('id', $id)->update($data);

    }else{
        $update = DB::table('photogallerys')->where('id', $id)->update($data);
    }       

    if ($update) {
       return redirect()->route('photogallerys.index')->with('message','Photo Update Successfully');
   }
   else{
    return redirect()->route('photogallerys.index')->with('error','Photo Update Unsuccessfully');
}
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table("photogallerys")->where('id',$id)->first();

       if ($data) {
         unlink($data->image);
         DB::table("photogallerys")->where("id",$id)->delete();
         return redirect()->route('photogallerys.index')->with('message','Photo Delete Successfully');
     }
     else{
       return redirect()->route('photogallerys.index')->with('error','Photo Delete Unsuccessfully');
   }
}
}
