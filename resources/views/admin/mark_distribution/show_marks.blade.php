<style>
    table{
        width: 100%;
    }
    table, tr, th, td{
        border: 1px solid black;
    }
    tr, td, th{
        padding: 5px !important;
    }
    th{
        text-align: center;
    }
</style>


<table>
     <tr>
         <td rowspan="2">Subject Name (Subject Code)</td>
         <td rowspan="2">Subject Part (Part Code)</td>
         <td colspan="5" style="text-align: center;">Marks</td>
         <td rowspan="2">Actions</td>
     </tr>
     <tr>
         <td>Creative</td>
        <td>MCQ</td>
        <td>Practical</td>
        <td>Count. Asses.</td>
        <td>Total</td>
    </tr>
    @if(count($data) == 0)
    @else
    @foreach ($data as $v)
    <tr>
        <td>
            @if($lang == 'en')
            {{ $v->subject_name ?: $v->subject_name_bn}} ({{$v->subject_code}})
            @else
            {{ $v->subject_name_bn ?: $v->subject_name }} ({{$v->subject_code}})
            @endif
        </td>
        <td>
            @if($lang == 'en')
            {{ $v->part_name ?: $v->part_name_bn}} ({{$v->part_code}})
            @else
            {{ $v->part_name_bn ?: $v->part_name }} ({{$v->part_code}})
            @endif
        </td>
        <td>
            {{$v->written}}
        </td>
        <td>
            {{$v->mcq}}
        </td>
        <td>
            {{$v->practical}}
        </td>
        <td>
            {{$v->count_asses}}
        </td>
        <td>
            <b>{{$v->total}}</b>
        </td>
        <td>Delete</td>
    </tr>
    @endforeach
    @endif

</table>
