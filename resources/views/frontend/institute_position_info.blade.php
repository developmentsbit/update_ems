@extends('frontend.index')
@section('content')



<div class="container">
  <div class="col-sm-12 col-12" id="mainpage">


   <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
    <ul class="list-group p-0">
      <li class="list-group-item font-weight-bold bg-success text-light" id="about">@lang('institute_position_details.institute_position_details')</li>
      <li class="list-group-item">

        <div class="table table-responsive">
          <table id="example" class="display table-bordered" style="width:100%">
            <thead>
              <tr style="font-size: 15px;">
                <th>@lang('institute_position_details.serial_no')</th>
                <th>@lang('institute_position_details.dates')</th>
                <th>@lang('institute_position_details.titles')</th>
                <th>@lang('institute_position_details.image')</th>
              </tr>
            </thead>
            <tbody>


              @php
              $i = 1;
              @endphp
              @if(isset($data))
              @foreach($data as $d)

              <tr style="font-size: 12px;">
                <td>{{ $d->serial_no }}</td>
                <td><a style="text-decoration: none;color: black">{{ date('d M Y', strtotime($d->date)); }}</a></td>
                <td><a style="text-decoration: none;color: black">@if($lang == 'en'){{ Str::limit($d->title_en, 50) ?: Str::limit($d->title_bn, 50)}}@else {{Str::limit($d->title_bn, 40) ?: Str::limit($d->title_en, 50)}}@endif</a></td>
                <td>
                    <a href="{{ url('InstitutePositionDetails',$d->id) }}" class="btn btn-sm btn-danger" target="_blank"><span uk-icon="icon: file-pdf; ratio: 1"></span>Open</a>
                    <a href="{{ asset('/assets/images/institute_position_details/')}}/{{$d->image}}" class="btn btn-sm btn-danger" download="" ><span uk-icon="icon: download; ratio: 1"></span>Download</a>
                </td>
              </tr>


              @endforeach
              @endif



            </table>

          </div>

        </li>

      </ul>
    </div>
  </div>





</div>
</div>







@endsection