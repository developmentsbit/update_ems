<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VideoController extends Controller
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
      $data = DB::table("videogallerys")->get();
      return view('admin.videogallerys.index',compact('data'));
  }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.videogallerys.create');
   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = array();
       $data['title']      = $request->title;
       $data['linkurl']    = $request->linkurl;

       DB::table('videogallerys')->insert($data);


       return redirect()->route('videogallerys.index')->with('message','Video Added Successfully');
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

        $data = DB::table("videogallerys")->where('id',$id)->first();
        return view('admin.videogallerys.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $data = array();
      $data['title']      = $request->title;
      $data['linkurl']    = $request->linkurl;

      $update = DB::table('videogallerys')->where('id', $id)->update($data);

      if ($update) {
        return redirect()->route('videogallerys.index')->with('message','Video Update Successfully');
    }
    else{
        return redirect()->route('videogallerys.index')->with('error','Video Update Unsuccessfully');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
     $data = DB::table("videogallerys")->where('id',$id)->first();

     if ($data) {
         DB::table("videogallerys")->where("id",$id)->delete();
         return redirect()->route('videogallerys.index')->with('message','Video Delete Successfully');
     }
     else{
        return redirect()->route('videogallerys.index')->with('error','Video Delete Unsuccessfully');
    }
}
}
