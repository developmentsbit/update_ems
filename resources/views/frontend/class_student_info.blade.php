@extends('frontend.index')
@section('content')

<style>
    table {
        width: 100%;
    }
    table tr td{
        padding : 3px !important;
        /* border: 1px solid black !important; */
    }
</style>

<div class="container">
 <div class="col-sm-12 col-12" id="mainpage">
  <div class="row">

   <div class="col-sm-12 col-12">

      <ul class="list-group p-0">
       <li class="list-group-item">
        <span class="student">@lang('frontend.class_wise_student') </span>
      </li>

      @php
        $i = 1;
      @endphp

      <li class="list-group-item">
        <div class="col-12">
            <table class="table table-bordered" style="font-size: 13px;">
                <thead>
                    <tr>
                        <th>@lang('frontend.sl')</th>
                        <th>@lang('frontend.image')</th>
                        <th>@lang('frontend.student_id')</th>
                        <th>@lang('frontend.roll_no')</th>
                        <th>@lang('frontend.group')</th>
                        <th>@lang('frontend.name')</th>
                        <th>@lang('frontend.father_name')</th>
                        <th>@lang('frontend.mother_name')</th>
                        <th>@lang('frontend.phone')</th>
                        <th>@lang('frontend.gender')</th>
                        <th>@lang('frontend.religion')</th>
                        <th>@lang('frontend.details')</th>
                    </tr>
                </thead>
                <tbody>
                    @if($student)
                    @foreach($student as $s)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>
                            @php
                            $path = base_path().'/ems/others_img/'.$s->student_id.'.jpg';
                            @endphp
                            @if(file_exists($path))
                            <img src="{{base_path().'/ems/others_img'}}/{{$s->student_id.'.jpg'}}" alt="" style="height: 60px;width:60px;">
                            @else
                            <img src="https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o=" alt="" style="height:60px;width:60px;">
                            @endif
                        </td>
                        <td>
                            {{$s->student_id}}
                        </td>
                        <td>
                            {{$s->class_roll}}
                        </td>
                        <td>
                            {{$s->group_name}}
                        </td>
                        <td>{{$s->student_name}}</td>
                        <td>{{$s->father_name}}</td>
                        <td>{{$s->mother_name}}</td>
                        <td>{{$s->contact_no}}</td>
                        <td>{{$s->gender}}</td>
                        <td>{{$s->religious}}</td>
                        <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            {{ $student->links() }}
        </div>
    </li>
  </ul>
  <br>

</div>






</div>
</div>
</div>





@endsection