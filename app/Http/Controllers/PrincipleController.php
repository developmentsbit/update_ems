<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PrincipleController extends Controller
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
        $data = DB::table("principles")->get();
        return view('admin.principle.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.principle.create');
   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $validated = $request->validate([
        'type' => 'required|unique:principles|max:255',
    ]);

       $data = array();
       $data['name']       = $request->name;
       $data['details']    = $request->details;
       $data['type']       = $request->type;
       $image              = $request->file('image');

       if ($image) {
        $image_name= rand(11111,99999);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='principle_image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        DB::table('principles')->insert($data);

    }

    return redirect()->route('principle.index')->with('message','Principle Message Added Successfully');

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
     $data = DB::table("principles")->where('id',$id)->first();
     return view('admin.principle.edit',compact('data'));
 }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['name']       = $request->name;
        $data['details']    = $request->details;
        $data['type']       = $request->type;
        $image              = $request->file('image');

        $old_image = DB::table("principles")->where('id',$id)->first();
        
        if ($image) {

            unlink($old_image->image);

            $image_name= rand(1111,9999);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='principle_image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            $update = DB::table('principles')->where('id', $id)->update($data);
            
        }else{
            $update = DB::table('principles')->where('id', $id)->update($data);
        }       

        if ($update) {
           return redirect()->route('principle.index')->with('message','Principle Message Update Successfully');
        }
        else{
            return redirect()->route('principle.index')->with('error','Principle Message Update Unsuccessfully');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table("principles")->where("id",$id)->first();

        if ($data) {
            unlink($data->image);
            DB::table("principles")->where("id",$id)->delete();
            return redirect()->route('principle.index')->with('error','Principle Message Delete Successfully');
        }
        else{
         return redirect()->route('principle.index')->with('warning','Principle Message Delete Unsuccessfully');
     }



 }
}
