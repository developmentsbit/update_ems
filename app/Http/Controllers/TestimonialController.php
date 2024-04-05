<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\DateFormat;
use App\Models\Testimonial;
use App\Traits\Idgenerator;

class TestimonialController extends Controller
{
    protected $path;
    use DateFormat,Idgenerator;
    public function __construct()
    {
        $this->path = 'admin.testimonial';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['student_type'] = Testimonial::groupBy('student_type')->select('student_type')->get();
        $data['data'] = Testimonial::orderBy('date','DESC')->get();
        // return $data['data'];
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
        // return $request->all();
        $prefix = date('Y');
        $data =array(
            'sl_no' => Idgenerator::autoId('testimonials','sl_no',$prefix,10),
            'student_type' => $request->student_type,
            'date' => $request->date,
            'title' => $request->title,
            'group_subject' => $request->group,
            'session' => $request->session,
            'year' => $request->year,
            'student_status' => $request->student_status,
            'student_name' => $request->student_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'gender' => $request->gender,
            'roll_no' => $request->roll_no,
            'reg_no' => $request->reg_no,
            'gpa' => $request->gpa,
            'birth_date' => $request->birth_date,
        );

        try {
            Testimonial::create($data);
            return redirect()->back()->with('message','Data Created Successfully');
        } catch (\Throwable $th) {
            // return $th->getMessage();
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Testimonial::find($id);
        return view($this->path.'.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['data'] = Testimonial::find($id);
        return view($this->path.'.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =array(
            'student_type' => $request->student_type,
            'date' => $request->date,
            'title' => $request->title,
            'group_subject' => $request->group,
            'session' => $request->session,
            'year' => $request->year,
            'student_status' => $request->student_status,
            'student_name' => $request->student_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'gender' => $request->gender,
            'roll_no' => $request->roll_no,
            'reg_no' => $request->reg_no,
            'gpa' => $request->gpa,
            'birth_date' => $request->birth_date,
        );

        try {
            Testimonial::where('id',$id)->update($data);
            return redirect()->back()->with('message','Data Updated Successfully');
        } catch (\Throwable $th) {
            // return $th->getMessage();
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Testimonial::where('id',$id)->delete();
            return redirect()->back()->with('message','Data Deleted Successfully');
        } catch (\Throwable $th) {
            // return $th->getMessage();
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
