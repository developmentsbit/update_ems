@extends('layouts.master')
@section('content')

@push('header_styles')
<!-- third party css -->
<link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css">
<!-- third party css end -->

@endpush


<link rel="stylesheet" type="text/css"
href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('mark_distribution.viewtitle')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
            @if (\App\Traits\RolePermissionTrait::checkRoleHasPermission('role', 'create'))
                @slot('action_button1')
                    @lang('common.add_new')
                @endslot
                @slot('action_button1_link')
                    {{ route('mark_distribution.create') }}
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
					<div class="row">
						<div class="ms-md-5">
							<div class="col-md-12 mt-2">
								<div class="row">
									<div class="col-md-3">
										<div class="row">
											<div class="col-sm-12">
												<label for="inputPassword3" class="col-sm-6 col-form-label text-md-end text-dark">
												@lang('mark_distribution.select_class')  :</label>
												<select class="form-select" id="class_id" name="class_id" onchange="getMarksClassGropup();getExamTypes()" required>
													<option value="">Select One</option>
                                                    @if(isset($class))
                                                    @foreach ($class as $c)
                                                    <option value="{{ $c->id }}">
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
										</div>
									</div>
									<div class="col-md-3" id="groupFullBox">
										<div class="row">
											<div class="col-sm-12">
												<label for="inputPassword3" class="col-sm-6 col-form-label text-md-end text-dark">
												@lang('mark_distribution.select_group')  :</label>
                                                <div id="groupData">
                                                    <select class="form-select" id="group_id" name="group_id">
                                                        <option value="">All</option>

                                                    </select>
                                                </div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-sm-12">
												<label for="inputPassword3" class="col-sm-6 col-form-label text-md-end text-dark">
												@lang('mark_distribution.exam_type')  :</label>
                                                <div id="examTypeBox">
                                                    <select class="form-select" id="exam_type_id" name="exam_type_id">
                                                        <option value="">Select One</option>

                                                    </select>
                                                </div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-sm-12 mt-4">
												<label for="inputPassword3" class="col-sm-3 col-form-label"></label>
												<button onclick="showMarksDstribution()" type="submit" class="btn btn-success button border-0"><i class="fa fa-eye"></i> @lang('common.show')</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <div class="mt-4" id="showData">

                        </div>
					</div>
				</div> <!-- end card body-->
        	</div>
		</div> <!-- end card -->
	</div><!-- end col-->
</div>










@push('footer_scripts')
<!-- third party js -->
<script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.select.min.js') }}"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>
<!-- end demo js-->
<script>
    function getMarksClassGropup()
    {
        const class_id = $('#class_id').val();
        // alert(class_id);
        if(class_id != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('getMarksClassGropup') }}',

                type : "POST",

                data : {class_id},

                beforeSend : function(){
                    $('#groupData').html('Loading...');
                },
                success : function(res){
                    if(res == 'no_group')
                    {
                        $('#groupFullBox').hide();
                    }
                    else
                    {
                        $('#groupFullBox').show();
                        $('#groupData').html(res);
                    }
                }
            });
        }
    }

    function getExamTypes()
    {
        const class_id = $('#class_id').val();
        if(class_id != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('getExamType') }}',

                type : "POST",

                data : {class_id},

                beforeSend : function(){
                    $('#examTypeBox').html('Loading...');
                },
                success : function(res){
                    $('#examTypeBox').html(res);
                }
            });
        }
    }


    function showMarksDstribution()
    {
        const class_id = $('#class_id').val();
        const group_id = $('#group_id').val();
        const exam_type = $('#exam_type_id').val();

        if(class_id != '' || exam_type != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('showMarksDstribution') }}',

                type : "POST",

                data : {class_id,group_id,exam_type},

                beforeSend : function()
                {
                    $('#showData').html('Loading...');
                },
                success : function(res)
                {
                    $('#showData').html(res);
                }
            });
        }
    }
</script>

@endpush

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
	@if(Session::has('message'))
	toastr.options =
	{
		"closeButton" : true,
		"progressBar" : true
	}
	toastr.success("{{ session('message') }}");
	@endif

	@if(Session::has('error'))
	toastr.options =
	{
		"closeButton" : true,
		"progressBar" : true
	}
	toastr.error("{{ session('error') }}");
	@endif

	@if(Session::has('info'))
	toastr.options =
	{
		"closeButton" : true,
		"progressBar" : true
	}
	toastr.info("{{ session('info') }}");
	@endif

	@if(Session::has('warning'))
	toastr.options =
	{
		"closeButton" : true,
		"progressBar" : true
	}
	toastr.warning("{{ session('warning') }}");
	@endif
</script>





@endsection
