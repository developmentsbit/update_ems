<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\class_info;
use App\Models\group_info;
use App\Models\subject_info;
use Brian2694\Toastr\Facades\Toastr;

class AddSubjectController extends Controller
{
    protected $path;
    public function __construct()
    {
        $this->path = 'admin.add_subject';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = subject_info::leftjoin('addclass','addclass.id','subject_infos.class_id')
        ->leftjoin('addgroup','addgroup.id','subject_infos.group_id')
        ->select('subject_infos.*','addclass.class_name','addclass.class_name_bn','addgroup.group_name','addgroup.group_name_bn')
        ->get();
        // dd($data);
        return view($this->path.'.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['class'] = class_info::where('status',1)->get();
        return view($this->path.'.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =array(
            'serial'            => $request->serial,
            'class_id'          => $request->class_id,
            'group_id'          => $request->group_id,
            'subject_name'   => $request->subject_name_en,
            'subject_name_bn'   => $request->subject_name_bn,
            'subject_code'      => $request->subject_code,
            'subject_type'      => $request->subject_type,
            'status'            => $request->status,
        );

        $insert = subject_info::create($data);
        Toastr::success(__('Subject Create Successfully'));
        return redirect()->route('add_subject.create');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [];
        $data['class'] = class_info::where('status',1)->get();
        $data['data'] = subject_info::where('id',$id)->first();
        $data['group'] = group_info::where('class_id',$data['data']->class_id)->get();
        return view($this->path.'.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =array(
            'serial'            => $request->serial,
            'class_id'          => $request->class_id,
            'group_id'          => $request->group_id,
            'subject_name'      => $request->subject_name_en,
            'subject_name_bn'   => $request->subject_name_bn,
            'subject_code'      => $request->subject_code,
            'subject_type'      => $request->subject_type,
            'status'            => $request->status,
        );

        $insert = subject_info::find($id)->update($data);
        Toastr::success(__('Subject Update Successfully'));
        return redirect()->route('add_subject.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        subject_info::where('id',$id)->delete();
        Toastr::success(__('Subject Delete Successfully'));
        return redirect()->route('add_subject.index');
    }

    public function getClassGroup(Request $request)
    {
        $data = group_info::where('class_id',$request->class_id)->get();
        if(count($data) == 0)
        {
            return 'no_group';
        }
        $output = '<label>'.__("add_subject.groupname").':</label>
        <div class="input-group mt-2">
            <select class="form-control form-control-sm" name="group_id" id="group_id" onchange="">
        <option value="">== নির্বাচন করুন ==</option>';
        if($data)
        {
            foreach($data as $g)
            {
                $output .= '<option value="'.$g->id.'">'.$g->group_name.'</option>';
            }
        }

        $output.='</select>';

        return $output;
    }

    public function subjectStatusChanged($id)
    {
        $data = subject_info::find($id);
        if($data->status == 1)
        {
            subject_info::find($id)->update([
                'status' => 0,
            ]);
        }
        else
        {
            subject_info::find($id)->update([
                'status' => 1,
            ]);
        }

        return 1;
    }
}
