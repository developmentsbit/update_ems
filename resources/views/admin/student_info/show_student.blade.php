
<style>
    table{
        font-size: 14px;
    }
</style>
@if($lang == 'en')
<style>
    body{
        font-family: 'Poppins', sans-serif;
    }
</style>
@else
<style>
    body{
        font-family: 'Noto Serif Bengali', serif;
    }
</style>
@endif

    @php
    use App\Models\student_reg_info;
    @endphp

    <table class="table table-bordered" id="myTable">
        <thead>
            <tr class="table-active">
                <th colspan="8" style="text-align: center;">
                    Class : <span class="text-danger">{{ $data['class']->class_name }}</span> |
                    @if(isset($data['group']))
                    Group : <span class="text-danger">{{ $data['group']->group_name ?: '-' }}</span> |
                    @endif
                    Session : <span class="text-danger">{{ $data['session'] ?: '-' }}</span>
                </th>
            </tr>
            <tr>
                <th>#</th>
                <th>Student ID</th>
                <th>Name</th>
                <th>Father & Mother Name</th>
                <th>Gender</th>
                <th>Religion</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($data['data']))
            @foreach ($data['data'] as $v)
            @if($data['search_type'] == 'all')
            <tr>
                <td>
                    {{ $data['sl']++ }}
                </td>
                <td>
                    {{ $v->student_id }}
                </td>
                <td>
                    {{ $v->student_name }}
                </td>
                <td>
                    Father Name : {{$v->father_name}} <br>
                    Mother Name : {{$v->mother_name}}
                </td>
                <td>
                    {{$v->gender}}
                </td>
                <td>
                    {{$v->religion}}
                </td>
                <td>
                    <img src="{{ asset('student_image') }}/{{$v->image}}" alt="" style="height: 60px;width:60px;">
                </td>
                <td>
                    @php
                    $check = student_reg_info::where('student_id',$v->student_id)->where('class_id',$v->class_id)->count();
                    @endphp
                    @if($check == 0)
                    <a style="float: left;margin-bottom:4px;" href="{{ url('student_registration/'.$v->student_id) }}" class="btn btn-sm btn-success">Registration</a>
                    <form method="POST" action="{{ route('student_info.destroy',$v->student_id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">@lang('common.delete')</button>
                    </form>
                    @endif

                    <a style="float: left;margin-bottom:4px;" href="{{ url('student_info/edit/tab1/'.$v->student_id) }}" class="btn btn-sm btn-info">@lang('common.edit')</a>
                </td>
            </tr>
            @else
            @php
            $check = student_reg_info::where('student_id',$v->student_id)->where('class_id',$v->class_id)->count();
            @endphp
            @if($check == 0)
            <tr>
                <td>
                    {{ $data['sl']++ }}
                </td>
                <td>
                    {{ $v->student_id }}
                </td>
                <td>
                    {{ $v->student_name }}
                </td>
                <td>
                    Father Name : {{$v->father_name}} <br>
                    Mother Name : {{$v->mother_name}}
                </td>
                <td>
                    {{$v->gender}}
                </td>
                <td>
                    {{$v->religion}}
                </td>
                <td>
                    <img src="{{ asset('student_image') }}/{{$v->image}}" alt="" style="height: 60px;width:60px;">
                </td>
                <td>
                    @if($check == 0)
                    <a style="float: left;margin-bottom:4px;" href="{{ url('student_registration/'.$v->student_id) }}" class="btn btn-sm btn-success">Registration</a>
                    <form method="POST" action="{{ route('student_info.destroy',$v->student_id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">@lang('common.delete')</button>
                    </form>
                    @endif

                    <a style="float: left;margin-bottom:4px;" href="{{ url('student_info/edit/tab1/'.$v->student_id) }}" class="btn btn-sm btn-info">@lang('common.edit')</a>
                </td>
            </tr>
            @endif
            @endif
            @endforeach
            @endif
        </tbody>
    </table>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

