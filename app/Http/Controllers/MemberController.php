<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class MemberController extends Controller
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
        $data = DB::table("members")->get();
        return view('admin.members.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.members.create');
   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $data = array();
     $data['type']           = $request->type;
     $data['name']           = $request->name;
     $data['father_name']    = $request->father_name;
     $data['mother_name']    = $request->mother_name;
     $data['designation']    = $request->designation;
     $data['profession']     = $request->profession;
     $data['duration']       = $request->duration;
     $data['mobile']         = $request->mobile;
     $data['email']          = $request->email;
     $data['address']        = $request->address;
     $data['status']         = $request->status;
     $image                  = $request->file('image');

     if ($image) {
        $image_name= rand(11111,99999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='members_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        DB::table('members')->insert($data);

    }
    else{
        DB::table('members')->insert($data);
    }

    return redirect()->route('members.index')->with('message','members Added Successfully');
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
        $data = DB::table("members")->where('id',$id)->first();
        return view('admin.members.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $data = array();
      $data['type']           = $request->type;
      $data['name']           = $request->name;
      $data['father_name']    = $request->father_name;
      $data['mother_name']    = $request->mother_name;
      $data['designation']    = $request->designation;
      $data['profession']     = $request->profession;
      $data['duration']       = $request->duration;
      $data['mobile']         = $request->mobile;
      $data['email']          = $request->email;
      $data['address']        = $request->address;
      $data['status']         = $request->status;
      $image              = $request->file('image');

      $old_image = DB::table("members")->where('id',$id)->first();

      if ($image) {

          

        $image_name= rand(1111,9999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='members_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        $update = DB::table('members')->where('id', $id)->update($data);

    }else{
        $update = DB::table('members')->where('id', $id)->update($data);
    }       

    if ($update) {
     return redirect()->route('members.index')->with('message','members Update Successfully');
 }
 else{
    return redirect()->route('members.index')->with('error','members Update Unsuccessfully');
}
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table("members")->where('id',$id)->first();

        if ($data) {
           
           DB::table("members")->where("id",$id)->delete();
           return redirect()->route('members.index')->with('message','members Delete Successfully');
       }
       else{
         return redirect()->route('members.index')->with('error','members Delete Unsuccessfully');
     }
 }
}
