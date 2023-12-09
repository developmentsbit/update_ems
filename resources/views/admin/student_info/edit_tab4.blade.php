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
                            <div class="tab-link">
                                <a href="{{url('student_info/edit/tab3/'.$data->student_id)}}">
                                    <b>৩. অভিভাবকের তথ্য</b>
                                </a>
                            </div>
                            <div class="tab-link active">
                                <a href="#">
                                    <b>৪. একাডেমিক তথ্য</b>
                                </a>
                            </div>
                        </div>
                    </div>

                    <form class="row g-3 mt-0" action="{{ url('studentInfoTab4Update/'.$data->student_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4 col-4 mt-1">
                            <label for="" class="">@lang('student_info.admission_class')  :</label>
                            <select class="form-select select2" data-toggle="select2" id="class_id" name="class_id" onchange="loadGroups()">
                            <option value="">Choose...</option>
                            @if(isset($class))
                            @foreach ($class as $c)
                                <option @if($data->class_id == $c->id) selected @endif value="{{ $c->id }}">
                                    @if($lang == 'en')
                                    {{ $c->class_name ?: $c->class_name_bn }}
                                    @else
                                    {{ $c->class_name_bn ?: $c->class_name }}
                                    @endif
                                </option>
                            @endforeach
                            @endif
                            </select>
                        </div>
                        <div class="col-md-4 col-4 mt-1" id="groupBox">
                            <label for="" class="">@lang('student_info.admission_group') :</label>
                            <select class="form-select select2" data-toggle="select2" id="group_id" name="group_id">
                            <option selected>Choose...</option>
                            @if($groups)
                            @foreach ($groups as $g)
                            <option @if($data->group_id == $g->id) selected @endif value="{{ $g->id }}">
                                @if($lang == 'en')
                                {{ $g->group_name ?: $g->group_name_bn }}
                                @else
                                {{ $g->group_name_bn ?: $g->group_name }}
                                @endif
                            </option>
                            @endforeach
                            @endif
                            </select>
                        </div>
                        <div class="col-md-4 col-4 mt-md-1 mt-3">
                            <label for="" class="">@lang('student_info.session') :</label>
                            <select class="form-select select2" data-toggle="select2" id="session" name="session">
                            <option value="">Choose...</option>
                                @foreach ($session as $s)
                                <option @if($data->session == $s->session) selected @endif value="{{ $s->session }}">{{$s->session}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center mt-4 ">
                            <a href="{{url('student_info/edit/tab3')}}/{{$data->student_id}}" type="" class="btn btn-secondary button border-0"><i class="fa fa-arrow-left"></i> @lang('common.previous')</a>
                            <button name="submit" value="save" type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
                            <button name="submit" value="save_with_reg" type="submit" class="btn btn-info button border-0">@lang('common.save_with_reg')</button>
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

<script>
    function loadGroups()
    {
        let class_id = $('#class_id').val();
        if(class_id != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('loadGroups') }}',

                type : 'POST',

                data : {class_id},

                beforeSend : function()
                {
                    $('#groupBox').html('Loading....');
                },
                success : function(res)
                {
                    if(res == 'no_group')
                    {
                        $('#groupBox').hide();
                    }
                    else
                    {
                        $('#groupBox').show();
                        $('#groupBox').html(res);

                    }
                }
            });
        }
        else
        {
            $('#groupBox').show();
            $('#groupBox').html('<b class="text-danger">Select Class First !</b>');
        }
    }
</script>

@endsection

