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
use App\Models\class_info;
use App\Models\group_info;
use App\Models\section_info;
use App\Models\subject_info;
use App\Models\session;
use App\Models\student_reg_info;
use App\Models\subject_reg_info;

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
        $session = session::where('status',1)->get();
        $class = class_info::where('status',1)->get();
        return view($this->path.'.index',compact('class','session'));
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
            'entry_date' => date('Y-m-d'),
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
    public function destroy($student_id)
    {
        student_information::where('student_id',$student_id)->delete();
        return redirect()->back();
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

    public function tab1($student_id)
    {
        $data = student_information::where('student_id',$student_id)->first();
        $admission_date = DateFormat::DbtoDate('-',$data->adminssion_date);
        // return $admission_date;
        return view($this->path.'.edit_tab1',compact('data','admission_date'));
    }
    public function tab2($student_id)
    {
        $division = division_information::all();
        $data = student_information::where('student_id',$student_id)->first();
        $district = district_information::where('division_id',$data->present_division)->get();
        $upazila = upazila_information::where('district_id',$data->present_district)->get();
        $per_district = district_information::where('division_id',$data->per_division)->get();
        $per_upazila = upazila_information::where('district_id',$data->per_district)->get();
        return view($this->path.'.edit_tab2',compact('data','division','district','upazila','per_district','per_upazila'));
    }

    public function tab3($student_id)
    {
        $data = student_information::where('student_id',$student_id)->first();
        return view($this->path.'.edit_tab3',compact('data'));
    }
    public function tab4($student_id)
    {
        $data = student_information::where('student_id',$student_id)->first();
        $class = class_info::where('status',1)->get();
        $groups = group_info::where('status',1)->where('class_id',$data->class_id)->get();
        $session = session::where('status',1)->get();
        return view($this->path.'.edit_tab4',compact('data','class','groups','session'));
    }

    public function studentInfoTab1Update(Request $request, $student_id)
    {
        $admission_date = DateFormat::DateToDb('/',$request->admission_date);
        $data = array(
            'adminssion_date' =>$admission_date,
            'entry_date' => date('Y-m-d'),
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
            $pathImage = student_information::where('student_id',$student_id)->first();
            $path = public_path().'/student_image/'.$pathImage->image;
            if(file_exists($path))
            {
                unlink($path);
            }

        }

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/student_image/',$imageName);
            $data['image'] = $imageName;
        }

        $data = student_information::where('student_id',$student_id)->update($data);
        Toastr::success("First Step Is Done. Go On");
        return redirect()->to('student_info/edit/tab2/'.$student_id);
    }

    public function studentInfoTab2Update(Request $request,$student_id)
    {
        // return $student_id;
        $data = array(
            'present_division' => $request->present_division,
            'present_district' => $request->present_district,
            'present_upazila' => $request->present_upazila,
            'present_po' => $request->present_po,
            'present_village' => $request->present_village,
            'present_home' => $request->present_home,
            'per_division' => $request->per_division,
            'per_district' => $request->per_district,
            'per_upazila' => $request->per_upazila,
            'per_po' => $request->per_po,
            'per_village' => $request->per_village,
            'per_home' => $request->per_home,
        );

        $data = student_information::where('student_id',$student_id)->update($data);
        Toastr::success("Second Step Is Done. Go On");
        return redirect()->to('student_info/edit/tab3/'.$student_id);
    }
    public function studentInfoTab3Update(Request $request,$student_id)
    {
        $data = array(
            "guardian_name" => $request->guardian_name,
            "guardian_phone" => $request->guardian_phone,
            "guardian_email" => $request->guardian_email,
            "guardian_relation" => $request->guardian_relation,
        );
        $data = student_information::where('student_id',$student_id)->update($data);
        Toastr::success("Third Step Is Done. Go On");
        return redirect()->to('student_info/edit/tab4/'.$student_id);
    }

    public function studentInfoTab4Update(Request $request, $student_id)
    {
        // dd($request->all());
        $data = array(
            'class_id' => $request->class_id,
            'group_id' => $request->group_id,
            'session' => $request->session
        );
        $data = student_information::where('student_id',$student_id)->update($data);

        Toastr::success("You Are All Set.");
        if($request->submit == 'save')
        {
            return redirect()->to('student_info');
        }
        else
        {
            return redirect()->to('student_registration/'.$student_id);
        }
    }

    public function loadGroups(Request $request)
    {
        $group = group_info::where('class_id',$request->class_id)->get();
        if(count($group) == 0)
        {
            return 'no_group';
        }
        $output = '<label for="" class="">'.__('student_info.admission_group') .':</label>
        <select class="form-control form-control-sm" id="group_id" name="group_id" >
        <option selected>Choose...</option>';
        foreach($group as $g)
        {
            if(config('app.locale'))
            {
                $group_name = $g->group_name ?: $g->group_name_bn;
            }
            else
            {
                $group_name = $g->group_name_bn ?: $g->group_name;
            }
            $output .= '<option value="'.$g->id.'">'.$g->group_name.'</option>';
        }
        $output.='</select>';

        return $output;
    }

    public function showStudent(Request $request)
    {
        $data = [];
        $data['sl'] = 1;
        $data['data'] = student_information::where('class_id',$request->class_id)->where('group_id',$request->group_id)->where('session',$request->session)->get();
        $data['class'] = class_info::where('id',$request->class_id)->first();
        $data['group'] = group_info::where('id',$request->group_id)->first();
        $data['session'] = $request->session;
        $data['search_type'] = $request->search_type;
        return view($this->path.'.show_student',compact('data'));
    }

    public function student_registration($student_id)
    {
        $data = student_information::where('student_id',$student_id)->first();
        $class = class_info::where('status',1)->get();
        $group = group_info::where('status',1)->where('class_id',$data->class_id)->get();
        $section = section_info::where('status',1)->where('class_id',$data->class_id)->get();

        $compulsory_subjects = subject_info::where('status',1)->where('class_id',$data->class_id)->where('subject_type',1)->get();

        $group_subject = subject_info::where('status',1)->where('class_id',$data->class_id)->where('group_id',$data->group_id)->where('subject_type',2)->get();

        $optional_subject = subject_info::where('status',1)->where('class_id',$data->class_id)->where('group_id',$data->group_id)->where('subject_type',3)->get();

        return view($this->path.'.registration',compact('data','class','group','section','compulsory_subjects','group_subject','optional_subject'));
    }

    public function loadRegistrationGroups(Request $request)
    {
        $data = group_info::where('class_id',$request->class_id)->get();
        if(count($data) == 0)
        {
            return '<b class="text-danger">No Groups Found !</b>';
        }
        else
        {
            $output = '<select class="form-control form-control-sm" name="group_id" id="group_id" onchange="loadGroupSubjects()">
            <option value="">'.__('common.select_one').'</option>';
            if(isset($data))
            {
                foreach($data as $v)
                {
                    if(config('app.locale') == 'en')
                    {
                        $group_name = $v->group_name ?: $v->group_name_bn;
                    }
                    else
                    {
                        $group_name = $v->group_name_bn ?: $v->group_name;
                    }
                    $output .= '<option value="'.$v->id.'">'.$group_name.'</option>';
                }
            }
        $output.='</select>';

        return  $output;
        }
    }

    public function loadClassSubject(Request $request)
    {
        $compulsory_subjects = subject_info::where('status',1)->where('class_id',$request->class_id)->where('subject_type',1)->get();
        if(count($compulsory_subjects) == 0)
        {
            return '<b class="text-danger">No Subject Founds !</b>';
        }
        else
        {
            $output ='';
            foreach($compulsory_subjects as $cs)
            {
                $output .= '<div class="form-check">
                    <label>
                        <input type="checkbox" name="subject_id[]" value="'.$cs->id.'" class="form-check-input" checked>
                        '.$cs->subject_name.' <span class="text-danger">( '.$cs->subject_code.' ) </span>
                    </label>
                </div>';
            }

            return $output;
        }
    }

    public function loadGroupSubjects(Request $request)
    {
        $data = [];
        $data['group'] ='';
        $data['optional'] = '';
        $group_subject = subject_info::where('status',1)->where('class_id',$request->class_id)->where('group_id',$request->group_id)->where('subject_type',2)->get();
        if(count($group_subject) == 0)
        {
            $data['group'] = '<b class="text-danger">No Group Subjects Found !</b>';
        }
        else
        {
            foreach($group_subject as $gs)
            {
                $data['group'] .= '<div class="form-check">
                    <label>
                        <input type="checkbox" name="subject_id[]" value="'.$gs->id.'" class="form-check-input">
                        '.$gs->subject_name.' <span class="text-danger">( '.$gs->subject_code.' ) </span>
                    </label>
                </div>';
            }
        }


        $optional_subject = subject_info::where('status',1)->where('class_id',$request->class_id)->where('group_id',$request->group_id)->where('subject_type',3)->get();

        if(count($optional_subject) == 0)
        {
            $data['optional'] = '<b class="text-danger">No Optional Subjects Found !</b>';
        }
        else
        {
            foreach($optional_subject as $os)
            {
                $data['optional'] .= '<div class="form-check">
                    <label>
                        <input type="radio" name="subject_id[]" value="'.$os->id.'" class="form-check-input">
                        '.$os->subject_name.' <span class="text-danger">( '.$os->subject_code.' ) </span>
                    </label>
                </div>';
            }
        }

        return $data;
    }


    public function studentRegistration(Request $request)
    {
        // dd($request->all());

        $student_reg_info = array(
            'student_id' => $request->student_id,
            'class_roll' => $request->class_roll,
            'class_id' => $request->class_id,
            'group_id' => $request->group_id,
            'section_id' => $request->section_id,
            'session' => $request->session,
            'year' => date('Y'),
        );

        student_reg_info::create($student_reg_info);

        for ($i=0; $i < count($request->subject_id) ; $i++)
        {
            subject_reg_info::create([
                'student_id' => $request->student_id,
                'class_id' => $request->class_id,
                'group_id' => $request->group_id,
                'subject_id' => $request->subject_id[$i],
            ]);
        }

        student_information::where('student_id',$request->student_id)->update([
            'class_id' => $request->class_id,
            'group_id' => $request->group_id,
        ]);
        Toastr::success("Student Registration Successfull");
        return redirect()->to(route('student_info.create'));
    }

    public function edit_registration($student_id)
    {
        $data = student_information::where('student_id',$student_id)->first();
        $class = class_info::where('status',1)->get();
        $group = group_info::where('status',1)->where('class_id',$data->class_id)->get();
        $section = section_info::where('status',1)->where('class_id',$data->class_id)->get();

        $compulsory_subjects = subject_info::where('status',1)->where('class_id',$data->class_id)->where('subject_type',1)->get();

        $group_subject = subject_info::where('status',1)->where('class_id',$data->class_id)->where('group_id',$data->group_id)->where('subject_type',2)->get();

        $optional_subject = subject_info::where('status',1)->where('class_id',$data->class_id)->where('group_id',$data->group_id)->where('subject_type',3)->get();

        $student_reg_info = student_reg_info::where('student_id',$student_id)->first();

        return view($this->path.'.edit_registration',compact('data','class','group','section','compulsory_subjects','group_subject','optional_subject','student_reg_info'));
    }

    public function editStudentRegistration(Request $request)
    {
        // dd($request->all());

        student_reg_info::where('student_id',$request->student_id)->where('class_id',$request->class_id)->delete();
        subject_reg_info::where('student_id',$request->student_id)->where('class_id',$request->class_id)->delete();

        $student_reg_info = array(
            'student_id' => $request->student_id,
            'class_roll' => $request->class_roll,
            'class_id' => $request->class_id,
            'group_id' => $request->group_id,
            'section_id' => $request->section_id,
            'session' => $request->session,
            'year' => date('Y'),
        );

        student_reg_info::create($student_reg_info);

        for ($i=0; $i < count($request->subject_id) ; $i++)
        {
            subject_reg_info::create([
                'student_id' => $request->student_id,
                'class_id' => $request->class_id,
                'group_id' => $request->group_id,
                'subject_id' => $request->subject_id[$i],
            ]);
        }

        student_information::where('student_id',$request->student_id)->update([
            'class_id' => $request->class_id,
            'group_id' => $request->group_id,
        ]);
        Toastr::success("Student Registration Update Successfull");
        return redirect()->back();
    }

    public function reg_student()
    {
        $session = session::where('status',1)->get();
        $class = class_info::where('status',1)->get();
        return view($this->path.'.reg_student',compact('class','session'));
    }

    public function showRegStudent(Request $request)
    {
        $data = [];
        $data['sl'] = 1;
        $data['class'] = class_info::where('id',$request->class_id)->first();
        $data['group'] = group_info::where('id',$request->group_id)->first();
        $data['session'] = $request->session;
        $data['data'] = student_reg_info::join('student_informations','student_informations.student_id','=','student_reg_infos.student_id')
        ->where('student_reg_infos.class_id',$request->class_id)
        ->where('student_reg_infos.group_id',$request->group_id)
        ->where('student_reg_infos.session',$request->session)
        ->select('student_informations.*')
        ->get();

        return view($this->path.'.show_reg_student',compact('data'));
    }

    public function view_std_info($student_id)
    {
        $data = student_information::where('student_id',$student_id)->first();
        $student_reg_info = student_reg_info::where('student_id',$student_id)
        ->leftjoin('addclass','addclass.id','student_reg_infos.class_id')
        ->leftjoin('addgroup','addgroup.id','student_reg_infos.group_id')
        ->select('addclass.class_name','addgroup.group_name','student_reg_infos.*')
        ->first();
        $studentid_explode = str_split($student_id,1);

        $comp_sub_info = subject_reg_info::leftjoin('subject_infos','subject_infos.id','subject_reg_infos.subject_id')
        ->where('subject_reg_infos.student_id',$student_id)
        ->where('subject_reg_infos.class_id',$data->class_id)
        ->where('subject_infos.subject_type',1)
        ->select('subject_infos.*')
        ->get();
        $group_sub_info = subject_reg_info::leftjoin('subject_infos','subject_infos.id','subject_reg_infos.subject_id')
        ->where('subject_reg_infos.student_id',$student_id)
        ->where('subject_reg_infos.class_id',$data->class_id)
        ->where('subject_infos.subject_type',2)
        ->select('subject_infos.*')
        ->get();
        $opt_sub_info = subject_reg_info::leftjoin('subject_infos','subject_infos.id','subject_reg_infos.subject_id')
        ->where('subject_reg_infos.student_id',$student_id)
        ->where('subject_reg_infos.class_id',$data->class_id)
        ->where('subject_infos.subject_type',3)
        ->select('subject_infos.*')
        ->get();

        return view($this->path.'.view_std_info',compact('data','studentid_explode','student_reg_info','comp_sub_info','group_sub_info','opt_sub_info'));
    }

}
