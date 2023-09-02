<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PagesController extends Controller
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
        $data = DB::table("pages")->get();
        return view('admin.pages.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


     $data = array();
     $data['title']      = $request->title;
     $data['details']    = $request->details;
     $image              = $request->file('image');

     if ($image) {
        $image_name= rand(11111,99999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='pages_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        DB::table('pages')->insert($data);

    }else{
        DB::table('pages')->insert($data);
    }

    return redirect()->route('pages.index')->with('message','Page Added Successfully');

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
       $data = DB::table("pages")->where('id',$id)->first();
       return view('admin.pages.edit',compact('data'));
   }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

       $data = array();
       $data['title']      = $request->title;
       $data['details']    = $request->details;
       $image              = $request->file('image');

       $old_image = DB::table("pages")->where('id',$id)->first();

       if ($image) {

      

        $image_name= rand(1111,9999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='pages_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        $update = DB::table('pages')->where('id', $id)->update($data);

    }else{
        $update = DB::table('pages')->where('id', $id)->update($data);
    }       

    if ($update) {
     return redirect()->route('pages.index')->with('message','Page Update Successfully');
 }
 else{
    return redirect()->route('pages.index')->with('error','Page Update Unsuccessfully');
}
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table("pages")->where('id',$id)->first();

        if ($data) {
     
           DB::table("pages")->where("id",$id)->delete();
           return redirect()->route('pages.index')->with('message','Page Delete Successfully');
       }
       else{
         return redirect()->route('pages.index')->with('error','Page Delete Unsuccessfully');
     }


 }
}






