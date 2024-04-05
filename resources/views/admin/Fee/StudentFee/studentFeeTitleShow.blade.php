<div>
   @if($type == 1)
    @forelse($commonFee as $title)
        <input type="checkbox" CHECKED name="fee_id[]" value="{{$title->id}}">{{$title->title??''}} &nbsp;
    @empty
       <span class="alert-danger"><strong>Sorry! You have no information!</strong></span>
    @endforelse
       @elseif($type == 2)
       <h1>{{$studentAccountInfoData[0]->student->student_name ?? ''}} @if($studentAccountInfoData)({{$studentAccountInfoData[0]->class->class_name?? ''}})@endif</h1>
    <table class="table table-hover table-bordered table-success table-striped">
        <thead>

        <tr style="font-weight: 700">
            <td>SL</td>
            <td>Fee Title</td>
            <td>Fee Type</td>
            <td>Year</td>
            <td>Amount</td>
            <td>Action</td>
        </tr>
        </thead>
<tbody>

            @forelse($studentAccountInfoData as $key=>$data)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$data->fee->title ?? ''}}</td>
            <td>Common</td>
            <td>{{$data->year ?? ''}}</td>
            <td>{{round($data->fee->amount,2) ?? ''}}</td>
            <td><i class="fa fa-trash" style="cursor: pointer" onclick="deleteStudentFeeTitle({{$data->id}})"></i></td>
        </tr>
            @empty
                <tr>
                   <td colspan="6">Sorry! You have no information!</td>

                </tr>
            @endforelse
</tbody>
    </table>
    @endif
</div>
