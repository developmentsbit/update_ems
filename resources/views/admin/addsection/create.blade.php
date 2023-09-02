@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />




<div class="container mt-2">
	<div class="col-12">

		<div class="card">
			<div class="card-body">

				<h3>@lang('addsection.addtitle')</h3><br>


				<form method="post" class="btn-submit" action="{{ route('addsection.store') }}" enctype="multipart/form-data">
					@csrf

					<div class="row myinput">


						<div class="form-group mb-3 col-md-6">
							<label>@lang('addsection.classname'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<select class="form-control" name="class_id" id="class_id" onchange="return getgroup();">
									@if(isset($class))
									@foreach($class as $c)
									<option value="{{ $c->id }}">{{ $c->class_name }}</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>

						<div class="form-group mb-3 col-md-6">
							<label>@lang('addsection.groupname'):</label>
							<div class="input-group">
								<select class="form-control" name="group_id" id="group_id">

								</select>
							</div>
						</div>




						<div class="form-group mb-3 col-md-6">
							<label>@lang('addsection.name'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<input class="form-control" type="text" name="section_name" id="section_name" required="">
							</div>
						</div>


						<div class="form-group mb-3 col-md-6">
							<label>@lang('addsection.status'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<select class="form-control" name="status">
									<option value="1">Active</option>
									<option value="2">Inactive</option>
								</select>
							</div>
						</div>




						<div class="modal-footer border-0">
							<button type="button" class="btn btn-secondary border-0" onClick="window.location.reload();">@lang('actions.close')</button>
							<button type="submit" class="btn btn-success button border-0">@lang('actions.save')</button>
						</div>





					</div>
				</form>



			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>



<script src="{{ asset('assets/js/vendor/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/demo.quilljs.js') }}"></script>


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



@endsection

