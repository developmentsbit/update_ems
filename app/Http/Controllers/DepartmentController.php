<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DepartmentController extends Controller
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
     $data = DB::table("department")->get();
     return view('admin.department.index',compact('data'));
 }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('admin.department.create');
 }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $data = array();
     $data['department']      = $request->department;
     

     DB::table('department')->insert($data);


     return redirect()->route('department.index')->with('message','Department Added Successfully');
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
        $data = DB::table("department")->where('id',$id)->first();
        return view('admin.department.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['department']      = $request->department;
        

        $update = DB::table('department')->where('id', $id)->update($data);

        if ($update) {
            return redirect()->route('department.index')->with('message','Department Update Successfully');
        }
        else{
            return redirect()->route('department.index')->with('error','Department Update Unsuccessfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $data = DB::table("department")->where('id',$id)->first();

       if ($data) {
           DB::table("department")->where("id",$id)->delete();
           return redirect()->route('department.index')->with('message','Department Delete Successfully');
       }
       else{
        return redirect()->route('department.index')->with('error','Department Delete Unsuccessfully');
    }
}


}
