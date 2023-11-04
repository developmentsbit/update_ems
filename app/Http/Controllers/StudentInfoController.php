<?php

namespace App\Http\Controllers;

use App\Models\studentInfo;
use Illuminate\Http\Request;

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
        return view('admin.student_info.create');
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
}
