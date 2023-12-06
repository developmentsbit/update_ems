@extends('frontend.index')
@section('content')



<div class="container">
  <div class="col-sm-12 col-12" id="mainpage">


   <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
    <ul class="list-group p-0">
      <li class="list-group-item font-weight-bold bg-success text-light" id="about">@lang('add_noc.noc')</li>
      <li class="list-group-item">

        <div class="table table-responsive">
          <table id="example" class="display table-bordered" style="width:100%">
            <thead>
              <tr style="font-size: 15px;">
                <th>@lang('add_noc.serial_no')</th>
                <th>@lang('add_noc.dates')</th>
                <th>@lang('add_noc.titles')</th>
                <th>@lang('add_noc.image')</th>
              </tr>
            </thead>
            <tbody>


              @php
              $i = 1;
              @endphp
              @if(isset($data))
              @foreach($data as $d)

              <tr style="font-size: 12px;">
                <td>{{ $i++ }}</td>
                <td><a style="text-decoration: none;color: black">{{ date('d M Y', strtotime($d->date)); }}</a></td>
                <td><a style="text-decoration: none;color: black">{{ $d->title }}</a></td>
                <td>
                    <a href="{{ url('nocdetails',$d->id) }}" class="btn btn-sm btn-danger" target="_blank"><span uk-icon="icon: file-pdf; ratio: 1"></span>Open</a>
                    <a href="{{ asset('/assets/images/add_noc/')}}/{{$d->image}}" class="btn btn-sm btn-danger" download="" ><span uk-icon="icon: download; ratio: 1"></span>Download</a>
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