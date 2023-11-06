<?php

namespace App\Http\Controllers;

use App\Models\ViewTotalSubjectMarksEntry;
use Illuminate\Http\Request;

class ViewTotalSubjectMarksEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.view_total _subject_marks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.view_total _subject_marks.create');
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
    public function show(ViewTotalSubjectMarksEntry $viewTotalSubjectMarksEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ViewTotalSubjectMarksEntry $viewTotalSubjectMarksEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ViewTotalSubjectMarksEntry $viewTotalSubjectMarksEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ViewTotalSubjectMarksEntry $viewTotalSubjectMarksEntry)
    {
        //
    }
}
