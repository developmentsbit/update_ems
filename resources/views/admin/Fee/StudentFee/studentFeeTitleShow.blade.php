<div>
   @if($type == 1)
    @forelse($commonFee as $title)
        <input type="checkbox" CHECKED name="fee_id[]" value="{{$title->id}}">{{$title->title??''}} &nbsp;
    @empty
       <span class="alert-danger"><strong>Sorry! You have no information!</strong></span>
    @endforelse
       @elseif($type == 2)
       <h1>{{$columnWiseFeeSetupsData[0]->classInfo->class_name ?? ''}}</h1>
    <table class="table">
        <thead>

        <tr>
            <td>Column name</td>
            <td>Fee Title</td>
            <td>Action</td>
        </tr>
        </thead>
<tbody>

            @forelse($columnWiseFeeSetupsData as $data)
        <tr>
            <td>{{$data->column->column_name}}</td>
            <td>{{$data->fee->title}}</td>
            <td><i class="fa fa-trash" onclick="deleteColumnFeeTitle({{$data->id}})"></i></td>
        </tr>
            @empty
            @endforelse
</tbody>
    </table>
    @endif
</div>
