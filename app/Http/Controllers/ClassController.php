<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClassController extends Controller
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
     $data = DB::table("addclass")->get();
     return view('admin.addclass.index',compact('data'));
 }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('admin.addclass.create');
 }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $data = array();
     $data['class_name']      = $request->class_name;
     $data['status']         = $request->status;

     DB::table('addclass')->insert($data);


     return redirect()->route('addclass.index')->with('message','New Class Added Successfully');
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
        $data = DB::table("addclass")->where('id',$id)->first();
        return view('admin.addclass.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['class_name']      = $request->class_name;
        $data['status']    = $request->status;

        $update = DB::table('addclass')->where('id', $id)->update($data);

        if ($update) {
            return redirect()->route('addclass.index')->with('message','New Class Update Successfully');
        }
        else{
            return redirect()->route('addclass.index')->with('error','New Class Update Unsuccessfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $data = DB::table("addclass")->where('id',$id)->first();

       if ($data) {
           DB::table("addclass")->where("id",$id)->delete();
           return redirect()->route('addclass.index')->with('message','New Class Delete Successfully');
       }
       else{
        return redirect()->route('addclass.index')->with('error','New Class Delete Unsuccessfully');
    }
}


}
