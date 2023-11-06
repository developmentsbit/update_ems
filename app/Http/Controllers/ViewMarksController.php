<?php

namespace App\Http\Controllers;

use App\Models\viewMarks;
use Illuminate\Http\Request;

class ViewMarksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.view_marks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.view_marks.create');
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
    public function show(viewMarks $viewMarks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(viewMarks $viewMarks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, viewMarks $viewMarks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(viewMarks $viewMarks)
    {
        //
    }
}
