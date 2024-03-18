<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Students</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    @if($lang == 'bn')
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@100;200;300;400;500;600;700;800;900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @endif
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
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
<body class="p-2">
    @php

    use App\Models\class_info;
    @endphp

    <table class="table table-bordered" id="myTable">
        <thead>
            <tr class="table-active">
                <th colspan="10" style="text-align: center;">
                    Class : <span class="text-danger">{{ $data['class']->class_name }}</span> |  Year : <span class="text-danger">{{  $data['year'] }}</span>

                </th>
            </tr>
            <tr>
                <th>#</th>
                <th>title</th>
                <th>year</th>
                <th>amount</th>
                <th>class</th>
                <th>month</th>
                <th>details</th>
                <th>fee</th>
                <th>feeType</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($data['data']))
            @foreach ($data['data'] as $v)
            <tr>
                <td>
                    {{ $data['sl']++ }}
                </td>
                <td>
                    {{ $v->title }}
                </td>
                <td>
                    {{ $v->year }}
                </td>
                <td>
                    {{ $v->amount }}
                </td>

                <td>
                    {{ $v->class->class_name }}
                </td>
                <td>
                    {{$v->month}}
                </td>
                <td>
                    {{$v->details}}
                </td>
                <td>
                    {{$v->fee}}
                </td>
                <td>
                  @if($v->feeType == 1)
                  Common Fee
                  @else
                    Exceptional Fee
                    @endif
                </td>

                <td>
                    <a style="float: left;margin-bottom:4px;" href="{{ route('add_fee_title.edit',$v->id) }}" class="btn btn-sm btn-info me-2">@lang('common.edit')</a>
                    <form method="POST" action="{{ route('add_fee_title.destroy',$v->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">@lang('common.delete')</button>
                    </form>



                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
    "></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</body>
</html>
