@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />




<div class="container mt-2">
	<div class="col-12">

		<div class="card">
			<div class="card-body">

				<h3>@lang('addgroup.edittitle')</h3><br>


				<form method="post" class="btn-submit" action="{{ route('addgroup.update',$data->id) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')

					<div class="row myinput">

						<div class="form-group mb-3 col-md-6">
							<label>@lang('addgroup.classname'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<select class="form-control" name="class_id">
									@if(isset($class))
									@foreach($class as $c)
									<option value="{{ $c->id }}" <?php if ($c->id == $data->class_id) {
										echo "selected";
									} ?>>{{ $c->class_name }}</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>



						<div class="form-group mb-3 col-md-6">
							<label>@lang('addgroup.name'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<input class="form-control" type="text" name="group_name" id="group_name" required="" value="{{ $data->group_name }}">
							</div>
						</div>



						<div class="form-group mb-3 col-md-6">
							<label>@lang('addgroup.status'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<select class="form-control" name="status">
									@if($data->status == 1)
									<option value="1">Active</option>
									<option value="2">Inactive</option>
									@else
									<option value="2">Inactive</option>
									<option value="1">Active</option>
									
									@endif
								</select>
							</div>
						</div>







						<div class="modal-footer border-0">
							<button type="button" class="btn btn-secondary border-0" onClick="window.location.reload();">@lang('actions.close')</button>
							<button type="submit" class="btn btn-success button border-0">@lang('actions.update')</button>
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

