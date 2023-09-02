<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GroupController extends Controller
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
     $data = DB::table("addgroup")
     ->leftjoin("addclass",'addclass.id','addgroup.class_id')
     ->select("addgroup.*",'addclass.class_name')
     ->get();
     return view('admin.addgroup.index',compact('data'));
 }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = DB::table("addclass")->where('status',1)->get();
        return view('admin.addgroup.create',compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $data = array();
     $data['class_id']      = $request->class_id;
     $data['group_name']    = $request->group_name;
     $data['status']         = $request->status;

     DB::table('addgroup')->insert($data);


     return redirect()->route('addgroup.index')->with('message','Group Added Successfully');
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
        $data = DB::table("addgroup")->where('id',$id)->first();
        $class = DB::table("addclass")->where('status',1)->get();
        return view('admin.addgroup.edit',compact('data','class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['class_id']      = $request->class_id;
        $data['group_name']    = $request->group_name;
        $data['status']        = $request->status;

        $update = DB::table('addgroup')->where('id', $id)->update($data);

        if ($update) {
            return redirect()->route('addgroup.index')->with('message','Group Update Successfully');
        }
        else{
            return redirect()->route('addgroup.index')->with('error','Group Update Unsuccessfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $data = DB::table("addgroup")->where('id',$id)->first();

       if ($data) {
           DB::table("addgroup")->where("id",$id)->delete();
           return redirect()->route('addgroup.index')->with('message','Group Delete Successfully');
       }
       else{
        return redirect()->route('addgroup.index')->with('error','Group Delete Unsuccessfully');
    }
}


}
