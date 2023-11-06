<?php

namespace App\Http\Controllers;

use App\Models\generateGPA;
use Illuminate\Http\Request;

class GenerateGPAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.generate_gpa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.generate_gpa.create');
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
    public function show(generateGPA $generateGPA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(generateGPA $generateGPA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, generateGPA $generateGPA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(generateGPA $generateGPA)
    {
        //
    }
}
