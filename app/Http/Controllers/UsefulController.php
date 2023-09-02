<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsefulController extends Controller
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
     $data = DB::table("usefullinks")->get();
     return view('admin.usefullinks.index',compact('data'));
 }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('admin.usefullinks.create');
 }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $data = array();
     $data['title']      = $request->title;
     $data['linkurl']    = $request->linkurl;

     DB::table('usefullinks')->insert($data);


     return redirect()->route('usefullinks.index')->with('message','Link Added Successfully');
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
        $data = DB::table("usefullinks")->where('id',$id)->first();
        return view('admin.usefullinks.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['title']      = $request->title;
        $data['linkurl']    = $request->linkurl;

        $update = DB::table('usefullinks')->where('id', $id)->update($data);

        if ($update) {
            return redirect()->route('usefullink.index')->with('message','Link Update Successfully');
        }
        else{
            return redirect()->route('usefullink.index')->with('error','Link Update Unsuccessfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $data = DB::table("usefullinks")->where('id',$id)->first();

       if ($data) {
           DB::table("usefullinks")->where("id",$id)->delete();
           return redirect()->route('usefullink.index')->with('message','Link Delete Successfully');
       }
       else{
        return redirect()->route('usefullink.index')->with('error','Link Delete Unsuccessfully');
    }
}


}
