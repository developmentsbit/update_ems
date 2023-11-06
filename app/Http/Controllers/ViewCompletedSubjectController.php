<?php

namespace App\Http\Controllers;

use App\Models\viewCompletedSubject;
use Illuminate\Http\Request;

class ViewCompletedSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.view_completed_subject.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.view_completed_subject.create');
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
    public function show(viewCompletedSubject $viewCompletedSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(viewCompletedSubject $viewCompletedSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, viewCompletedSubject $viewCompletedSubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(viewCompletedSubject $viewCompletedSubject)
    {
        //
    }
}
