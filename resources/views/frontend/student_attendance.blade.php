@extends('frontend.index')
@section('content')

<style>
    table {
        width: 100%;
    }
    table tr td{
        padding : 3px !important;
        border: 1px solid black !important;
    }
</style>

<div class="container">
 <div class="col-sm-12 col-12" id="mainpage">
  <div class="row">

   <div class="col-sm-9 col-12">

      <ul class="list-group p-0">
       <li class="list-group-item">
        <span class="student">@if($lang == 'en'){{ $data->title }}@elseif($lang == 'bn'){{$v->title_bn}}@endif </span>
      </li>

      <li class="list-group-item">

        <div class="col-12">
            {!! $data->details !!}
            

        </div>

    </li>
  </ul>
  <br>

</div>



  @include('frontend.sidebar')





</div>
</div>
</div>





@endsection
