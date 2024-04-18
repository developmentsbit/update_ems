<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\character_certificate;

class CharacterCertificate extends Controller
{
    protected $path;
    public function __construct()
    {
        $this->path = 'admin.character_certificate';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = character_certificate::all();
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
            'date' => $request->date,
            'name' => $request->name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'village' => $request->village,
            'post_office' => $request->post_office,
            'upazila' => $request->upazila,
            'district' => $request->district,
            'passing_class' => $request->passing_class,
            'passing_year' => $request->passing_year,
            'group' => $request->group,
            'gpa' => $request->gpa,
            'roll_no' => $request->roll_no,
            'reg_no' => $request->reg_no,
            'birth_date' => $request->birth_date,
            'session' => $request->session,
        );

        try {
            character_certificate::create($data);
            return redirect()->back()->with('message','Data Created Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, $type)
    {

    }
    public function show_character_certificate(string $id, $type)
    {
        $data = character_certificate::find($id);
        // return $type;
        return view($this->path.'.show',compact('data','type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = character_certificate::find($id);
        return view($this->path.'.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array(
            'date' => $request->date,
            'name' => $request->name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'village' => $request->village,
            'post_office' => $request->post_office,
            'upazila' => $request->upazila,
            'district' => $request->district,
            'passing_class' => $request->passing_class,
            'passing_year' => $request->passing_year,
            'group' => $request->group,
            'gpa' => $request->gpa,
            'roll_no' => $request->roll_no,
            'reg_no' => $request->reg_no,
            'birth_date' => $request->birth_date,
            'session' => $request->session,
        );

        try {
            character_certificate::where('id',$id)->update($data);
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
        try {
            character_certificate::where('id',$id)->delete();
            return redirect()->back()->with('message','Data Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
