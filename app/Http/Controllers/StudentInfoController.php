<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\division_information;
use App\Models\district_information;
use App\Models\upazila_information;
use App\Traits\DateFormat;
use App\Traits\Idgenerator;
use App\Models\student_information;
use Brian2694\Toastr\Facades\Toastr;
use Auth;

class StudentInfoController extends Controller
{
    protected $path;
    use DateFormat,Idgenerator;
    public function __construct()
    {
        $this->path = 'admin.student_info';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view($this->path.'.index');
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
        // dd($request->all());
        $admission_date = DateFormat::DateToDb('/',$request->admission_date);
        $autoId = Idgenerator::autoId('student_informations','student_id','2024','8');
        $data = array(
            'adminssion_date' =>$admission_date,
            'student_id' => $autoId,
            'student_name' => $request->student_name,
            'student_name_bn' => $request->student_name_bn,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'religion' => $request->religion,
            'blood_group' => $request->blood_group,
            'create_by' => Auth::user()->id,
        );

        $file = $request->file('image');

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/student_image/',$imageName);
            $data['image'] = $imageName;
        }
        $data = student_information::create($data);
        Toastr::success("First Step Is Done. Go On");
        return redirect()->to('student_info/edit/tab2/'.$autoId);
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
        $output .= '<option >Choose...</option>';
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
        $output .= '<option >Choose...</option>';
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
        $output .= '<option >Choose...</option>';
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
        $output .= '<option  >Choose...</option>';
        foreach($data as $v)
        {
            $output .= '<option value="'.$v->id.'" >'.$v->upazila_name.'</option>';
        }
        return $output;
    }

    public function tab2($student_id)
    {
        $division = division_information::all();
        $data = student_information::where('student_id',$student_id)->first();
        return view($this->path.'.edit_tab2',compact('data','division'));
    }
}
