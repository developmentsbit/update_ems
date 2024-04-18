<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student_certificate;

class StudentCertificateController extends Controller
{
    protected $path;
    public function __construct()
    {
        $this->path = 'admin.student_certificate';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = student_certificate::all();
        return view($this->path.'.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->path.'.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'village' => $request->village,
            'post_office' => $request->post_office,
            'upazila' => $request->upazila,
            'district' => $request->district,
            'class' => $request->class,
            'roll_no' => $request->roll,
            'birth_date' => $request->birth_date,
            'birth_date_text' => $request->birth_date_text,
        );

        try {
            student_certificate::create($data);
            return redirect()->back()->with('message','Data Created Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = student_certificate::find($id);
        return view($this->path.'.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = student_certificate::find($id);
        return view($this->path.'.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array(
            'name' => $request->name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'village' => $request->village,
            'post_office' => $request->post_office,
            'upazila' => $request->upazila,
            'district' => $request->district,
            'class' => $request->class,
            'roll_no' => $request->roll,
            'birth_date' => $request->birth_date,
            'birth_date_text' => $request->birth_date_text,
        );

        try {
            student_certificate::where('id',$id)->update($data);
            return redirect()->back()->with('message','Data Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            student_certificate::where('id',$id)->delete();
            return redirect()->back()->with('success','Data Delete Successfully');
        } catch(\Throwable $th)
        {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
