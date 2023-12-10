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
input.form-control ,.form-select{
    border: 1px solid black;
    border-radius: 0px;
}
</style>


<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('online_lecture_upload.edittitle')
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
                    {{ route('online_lecture_upload.index') }}
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
                <div class="main_from mt-1 ">
                    <h5 class="bg-dark text-light border-bottom border-3 border-info rounded-bottom fs-5 p-2">@lang('online_lecture_upload.addtitle')</h5>
                </div>
                <div class="form">
                    <form method="post" class="row g-3 mt-0 btn-submit" action="{{ route('online_lecture_upload.update',$data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 mt-3">
                            <label class="col-sm-4 col-form-label">@lang('common.date') :</label>
                            <input type="text" name="date" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true"  value="{{ $date }}" required>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                            <label class="col-sm-4 col-form-label">@lang('online_lecture_upload.class_name') : <span class="text-danger" style="font-size: 15px;">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="class_id" id="class_id" onchange="return getgroup();">
                                <option value="">@lang('common.select_one')</option>
                                @if(isset($class))
                                @foreach($class as $c)
                                <option @if($data->class_id == $c->id) selected @endif value="{{ $c->id }}">@if($lang == 'en'){{ $c->class_name }}@else {{$c->class_name_bn}}@endif</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                            <label class="col-sm-4 col-form-label" >@lang('online_lecture_upload.group_name') : <span class="text-danger" style="font-size: 15px;">*</span></label>
                            <select class="form-select select2" data-toggle="select2" name="group_id" id="group_id">
                                @if($group)
                                @foreach ($group as $g)
                                <option @if($g->id == $data->group_id) selected @endif value="{{$g->id}}">@if($lang == 'en'){{$g->group_name}}@else{{$g->group_name_bn}}@endif</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                            <label class="col-sm-4 col-form-label">@lang('online_lecture_upload.title_en')  : <span class="text-danger" style="font-size: 15px;">*</span> </label>
                            <input type="text" class="form-control" name="title_en" id="title_en" value="{{ $data->title_en }}" required>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                            <label class="col-sm-4 col-form-label">@lang('online_lecture_upload.title_bn')  :</label>
                            <input type="text" class="form-control" name="title_bn" id="title_bn" value="{{ $data->title_bn }}">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                            <label class="col-sm-4 col-form-label">@lang('online_lecture_upload.teacher_name_en')  : <span class="text-danger" style="font-size: 15px;">*</span> </label>
                            <input type="text" class="form-control" name="teacher_name_en" id="teacher_name_en" value="{{ $data->teacher_name_en }}" required>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                            <label class="col-sm-4 col-form-label">@lang('online_lecture_upload.teacher_name_bn')  :</label>
                            <input type="text" class="form-control" name="teacher_name_bn" id="teacher_name_bn" value="{{ $data->teacher_name_bn }}">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                            <label>@lang('online_lecture_upload.details'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
                                <textarea id="summernote"  class="form-control w-100" rows="10" type="text" name="details" required>{{ $data->details }}</textarea>
							</div>
						</div>
						<div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                            <label>@lang('online_lecture_upload.details_bn'): </label>
							<div class="input-group mt-2">
                                <textarea id="summernote1"  class="form-control w-100" rows="10" type="text" name="details_bn">{{ $data->details_bn }}</textarea>
							</div>
						</div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                            <label class="col-sm-4 col-form-label">@lang('online_lecture_upload.video_url')  : <span class="text-danger" style="font-size: 15px;">*</span> </label>
                            <input type="text" class="form-control" name="video_url" id="video_url" value="{{ $data->video_url }}">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-6 mt-3">
                            <label class="col-sm-4 col-form-label" >@lang('common.status') : <span class="text-danger" style="font-size: 15px;">*</span></label>
                            <select class="form-select select2" data-toggle="select2" name="status" id="status">
                                <option @if($data->status == 1) selected @endif value="1">@lang('common.active')</option>
								<option @if($data->status == 2) selected @endif value="2">@lang('common.inactive')</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-12 col-md-12 col-lg-12 mt-3">
                            <label class="col-sm-4 col-form-label">@lang('online_lecture_upload.image')  : <span class="text-danger" style="font-size: 15px;">*</span> </label>
                            <div class="input-group mt-2">
								<input class="form-control" type="file" name="image" id="image">
								<br>
							</div>
							<a href="{{ asset($data->image) }}" download="" class="btn btn-info">@lang('common.downloads')</a>
                        </div>
                        <div class="text-center mt-4 ">
                            <button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
                        </div>
                    </form>
                </div> <!-- end card body-->
            </div>
		</div> <!-- end card -->
	</div><!-- end col-->
</div>


<script type="text/javascript">
	function getgroup(){

		var class_id = $("#class_id").val();


		$.ajax({
			url: "{{ url("getgroup") }}/"+class_id,
			type: "get",
			success: function (response) {

				$("#group_id").html(response);

			}
		});
	}
</script>

<script src="{{ asset('assets/js/vendor/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/demo.quilljs.js') }}"></script>



@endsection

