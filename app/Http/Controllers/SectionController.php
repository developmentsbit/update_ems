<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SectionController extends Controller
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
     $data = DB::table("addsection")
     ->leftjoin("addclass",'addclass.id','addsection.class_id')
     ->leftjoin("addgroup",'addgroup.id','addsection.group_id')
     ->select("addsection.*",'addclass.class_name','addgroup.group_name')
     ->get();
     return view('admin.addsection.index',compact('data'));
 }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = DB::table("addclass")->where('status',1)->get();
        return view('admin.addsection.create',compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $data = array();
     $data['class_id']      = $request->class_id;
     $data['group_id']      = $request->group_id;
     $data['section_name']  = $request->section_name;
     $data['status']        = $request->status;

     DB::table('addsection')->insert($data);


     return redirect()->route('addsection.index')->with('message','Section Added Successfully');
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
        $data = DB::table("addsection")->where('id',$id)->first();
        $class = DB::table("addclass")->where('status',1)->get();
        return view('admin.addsection.edit',compact('data','class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['class_id']      = $request->class_id;
        $data['group_id']      = $request->group_id;
        $data['section_name']  = $request->section_name;
        $data['status']        = $request->status;

        $update = DB::table('addsection')->where('id', $id)->update($data);

        if ($update) {
            return redirect()->route('addsection.index')->with('message','Section Update Successfully');
        }
        else{
            return redirect()->route('addsection.index')->with('error','Section Update Unsuccessfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $data = DB::table("addsection")->where('id',$id)->first();

       if ($data) {
           DB::table("addsection")->where("id",$id)->delete();
           return redirect()->route('addsection.index')->with('message','Section Delete Successfully');
       }
       else{
        return redirect()->route('addsection.index')->with('error','Section Delete Unsuccessfully');
    }
}

public function getgroup($class_id){

    $group  = DB::table("addgroup")->where("class_id",$class_id)->where("status",1)->get();

    if($group)
    {
        foreach($group as $v)
        {
            echo "<option value='".$v->id."'>".$v->group_name."</option>";
        }
    }

}


}
