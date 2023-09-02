@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />




<div class="container mt-2">
	<div class="col-12">

		<div class="card">
			<div class="card-body">

				<h3>@lang('principle.addtitle')</h3><br>

				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif



				<form method="post" class="btn-submit" action="{{ route('vice_principal_message.store') }}" enctype="multipart/form-data">
					@csrf

					<div class="row myinput">





						<div class="form-group mb-3 col-md-8">
							<label>@lang('principle.name'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<input class="form-control" type="text" name="name" id="name"  required="" value="{{$data->name}}">
							</div>
						</div>

						<div class="form-group mb-3 col-md-12">
							<label>@lang('principle.details'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<textarea  class="form-control w-100" rows="10" type="text" name="details" required="">{!! $data->details !!}</textarea>
							</div>
						</div>

						<div class="form-group mb-3 col-md-12">
							<label>@lang('principle.image'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<input class="form-control" type="file" name="image" id="image"  required="">
							</div>
                            <img src="{{ asset('vice_principal_image') }}/{{$data->image}}" style="max-height: 100px;">
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

