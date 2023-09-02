@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />




<div class="container mt-2">
	<div class="col-12">

		<div class="card">
			<div class="card-body">

				<h3>@lang('addgroup.addtitle')</h3><br>


				<form method="post" class="btn-submit" action="{{ route('addgroup.store') }}" enctype="multipart/form-data">
					@csrf

					<div class="row myinput">


						<div class="form-group mb-3 col-md-6">
							<label>@lang('addgroup.classname'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<select class="form-control" name="class_id">
									@if(isset($class))
									@foreach($class as $c)
									<option value="{{ $c->id }}">{{ $c->class_name }}</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>



						<div class="form-group mb-3 col-md-6">
							<label>@lang('addgroup.name'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<input class="form-control" type="text" name="group_name" id="group_name" required="">
							</div>
						</div>


						<div class="form-group mb-3 col-md-6">
							<label>@lang('addgroup.status'): <span class="text-danger" style="font-size: 15px;">*</span></label>
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



@endsection

