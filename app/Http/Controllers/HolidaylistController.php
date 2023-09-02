<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HolidaylistController extends Controller
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
        $data = DB::table("holidaylist")->get();
        return view('admin.holidaylist.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.holidaylist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


     $data = array();
     $data['title']      = $request->title;
     $data['date']       = $request->date;
     $image              = $request->file('image');

     if ($image) {
        $image_name= rand(11111,99999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='holidaylist_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        DB::table('holidaylist')->insert($data);

    }else{
        DB::table('holidaylist')->insert($data);
    }

    return redirect()->route('holidaylist.index')->with('message','Holiday List Added Successfully');

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
       $data = DB::table("holidaylist")->where('id',$id)->first();
       return view('admin.holidaylist.edit',compact('data'));
   }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

       $data = array();
       $data['title']      = $request->title;
       $data['date']       = $request->date;
       $image              = $request->file('image');

       $old_image = DB::table("holidaylist")->where('id',$id)->first();

       if ($image) {

      

        $image_name= rand(1111,9999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='holidaylist_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        $update = DB::table('holidaylist')->where('id', $id)->update($data);

    }else{
        $update = DB::table('holidaylist')->where('id', $id)->update($data);
    }       

    if ($update) {
     return redirect()->route('holidaylist.index')->with('message','Holiday List Update Successfully');
 }
 else{
    return redirect()->route('holidaylist.index')->with('error','Holiday List Update Unsuccessfully');
}
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table("holidaylist")->where('id',$id)->first();

        if ($data) {
     
           DB::table("holidaylist")->where("id",$id)->delete();
           return redirect()->route('holidaylist.index')->with('message','Holiday List Delete Successfully');
       }
       else{
         return redirect()->route('holidaylist.index')->with('error','Holiday List Delete Unsuccessfully');
     }


 }
}






