@extends('frontend.index')
@section('content')



<div class="container">
 <div class="col-sm-12 col-12" id="mainpage">
  <div class="row">

   <div class="col-sm-9 col-12">
    @if(count($data)>0)

     <div class="col-sm-12 col-12 p-0"  data-aos="fade-in" data-aos-duration="2000" >
       <ul class="list-group p-0">
        <li class="list-group-item font-weight-bold bg-success text-light" id="about">

          @if($data[0]->type == 3)
          পরিচালনা পর্ষদ তথ্য
          @elseif($data[0]->type == 2)
          সভাপতির তালিকা
          @elseif($data[0]->type == 1)
          প্রধান শিক্ষকদের তালিকা
          @elseif($data[0]->type == 4)
          দাতা সদস্যদের তালিকা
          @else
          প্রাক্তন সদস্যদের তালিকা
          @endif

        </li>
      </ul>
      <li class="list-group-item">


       <div class="col-sm-12 col-12 p-0">
        <div class="row">

          @if(isset($data))
          @foreach($data as $d)

          <div class="col-sm-6 col-12 mt-3" data-aos="fade-right" data-aos-duration="2000">
            <table class="table table-bordered " id="studenttable">
              <tr>
               <td rowspan="4">
                <center><img src="{{ asset($d->image) }}" class="img-fluid" id="" style="max-height: 100px;"><br></center>
              </td>
              <td>নাম</td>
              <td>{{ $d->name }}</td>
            </tr>

            <tr>
              <td>পদবী</td>
              <td>{{ $d->designation }}</td>
            </tr>

            <tr>
              <td>মোবাইল</td>
              <td>{{ $d->mobile }}</td>
            </tr>

            <tr>
              <td>ই-মেইল</td>
              <td>{{ $d->email }}</td>
            </tr>

            <tr>
              <td colspan="3"><center><a href="{{ url("memberdetails",$d->id) }}" class="btn btn-warning text-white btn-sm float-end">বিস্তারিত দেখুন</a></center></td> 
            </tr>               
          </table>
        </div><!-----------End Teacher Information----------------------->


        @endforeach
        @endif

      </li>



    </div>

    @else
     Not Found...
    @endif
  </div>



  @include('frontend.sidebar')





</div>
</div>
</div>





@endsection