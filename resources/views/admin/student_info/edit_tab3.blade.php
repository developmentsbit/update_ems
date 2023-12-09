@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />

<style>
    .bg-primary{
    background-color: #727cf5 !important;

    padding: 3px;
    /* font-size: 20px; */
}
input.form-control ,.select2, .form-check-input{
    /* border: 1px solid black !important; */
    border-radius: 0px !important;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
    /* border:1px solid #aaa; */
    border-radius: 0px;
}

</style>


<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('student_info.title')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
            @if (\App\Traits\RolePermissionTrait::checkRoleHasPermission('role', 'create'))
                @slot('action_button1')
                  <i class="fa fa-eye"></i>  @lang('common.view')
                @endslot
                @slot('action_button1_link')
                    {{ route('student_info.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
            <div class="container">
                <div class="from">
                    <div class="navigation mb-2">
                        <div class="navigation-box">
                            <div class="tab-link">
                                <a href="{{url('student_info/edit/tab1/'.$data->student_id)}}">
                                    <b>১. শিক্ষার্থীর তথ্য</b>
                                </a>
                            </div>
                            <div class="tab-link">
                                <a href="{{url('student_info/edit/tab2/'.$data->student_id)}}">
                                    <b>২. ঠিকানা</b>
                                </a>
                            </div>
                            <div class="tab-link active">
                                <a href="#">
                                    <b>৩. অভিভাবকের তথ্য</b>
                                </a>
                            </div>
                            <div class="tab-link disabled">
                                <a href="#">
                                    <b>৪. একাডেমিক তথ্য</b>
                                </a>
                            </div>
                        </div>
                    </div>

                    <form class="row g-3 mt-0" action="{{ url('studentInfoTab3Update/'.$data->student_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <div class="col-md-3 col-6 mt-1">
                            <label for="guardian_name" class="form-label">@lang('student_info.guardian_name') :</label>
                            <input type="text" class="form-control" id="guardian_name" name="guardian_name" value="{{ $data->guardian_name }}">
                          </div>
                          <div class="col-md-3 col-6 mt-1">
                            <label for="guardian_phone" class="form-label">@lang('student_info.guardian_contact') :</label>
                            <input type="text" class="form-control" id="guardian_phone" name="guardian_phone" value="{{ $data->guardian_phone }}">
                          </div>
                          <div class="col-md-3 col-6 mt-1">
                            <label for="guardian_email" class="form-label">@lang('student_info.guardian_email') :</label>
                            <input type="text" class="form-control" id="guardian_email" name="guardian_email" value="{{ $data->guardian_email }}">
                          </div>
                          <div class="col-md-3 col-6 mt-1">
                            <label for="guardian_relation" class="form-label">@lang('student_info.relation')</label>
                            <input type="text" class="form-control" id="guardian_relation" name="guardian_relation" value="{{ $data->guardian_relation }}">
                          </div>
                        <div class="text-center mt-4 ">
                            <a href="{{url('student_info/edit/tab2')}}/{{$data->student_id}}" type="" class="btn btn-secondary button border-0"><i class="fa fa-arrow-left"></i> @lang('common.previous')</a>
                            <button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
                            <a href="{{url('student_info/edit/tab4')}}/{{$data->student_id}}" type="" class="btn btn-primary button border-0">@lang('common.skip') <i class="fa fa-arrow-right"></i></a>
                        </div>
                      </form>

                </div>
				{{-- <h3>@lang('mpo_nationalization.addtitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('mpo_nationalization.store') }}" enctype="multipart/form-data">
					@csrf



				</form> --}}
			</div> <!-- end card body-->
        </div>
		</div> <!-- end card -->
	</div><!-- end col-->
</div>



<script src="{{ asset('assets/js/vendor/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/demo.quilljs.js') }}"></script>

@endsection

