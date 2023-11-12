<?php

namespace App\Http\Controllers;

use App\Models\studentInfo;
use Illuminate\Http\Request;
use App\Models\division_information;
use App\Models\district_information;
use App\Models\upazila_information;

class StudentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.student_info.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $division = division_information::all();
        return view('admin.student_info.create',compact('division'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(studentInfo $studentInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(studentInfo $studentInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, studentInfo $studentInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(studentInfo $studentInfo)
    {
        //
    }
    public function from()
    {
        return view('admin.student_info.from');
    }
    public function loadDistrict(Request $request)
    {
        $data = district_information::where('division_id',$request->division_id)->get();
        $output = '';
        foreach($data as $v)
        {
            $output .= '<option value="'.$v->id.'" >'.$v->district_name.'</option>';
        }
        return $output;
    }
    public function loadUpazilla(Request $request)
    {
        $data = upazila_information::where('district_id',$request->district_id)->get();
        $output = '';
        
        foreach($data as $v)
        {
            $output .= '<option value="'.$v->id.'" >'.$v->upazila_name.'</option>';
        }
        return $output;
    }
    public function loadParmanenetDistrict(Request $request)
    {
        $data = district_information::where('division_id',$request->division_id)->get();
        $output = '';
        foreach($data as $v)
        {
            $output .= '<option value="'.$v->id.'" >'.$v->district_name.'</option>';
        }
        return $output;
    }
    public function loadParmanenetUpazilla(Request $request)
    {
        $data = upazila_information::where('district_id',$request->district_id)->get();
        $output = '';
        
        foreach($data as $v)
        {
            $output .= '<option value="'.$v->id.'" >'.$v->upazila_name.'</option>';
        }
        return $output;
    }
}
