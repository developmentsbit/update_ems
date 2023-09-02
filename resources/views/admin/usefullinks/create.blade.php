@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />




<div class="container mt-2">
	<div class="col-12">

		<div class="card">
			<div class="card-body">

				<h3>@lang('link.addtitle')</h3><br>


				<form method="post" class="btn-submit" action="{{ route('usefullink.store') }}" enctype="multipart/form-data">
					@csrf

					<div class="row myinput">

						<div class="form-group mb-3 col-md-12">
							<label>@lang('link.title'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<input class="form-control" type="text" name="title" id="title"  required="">
							</div>
						</div>


						<div class="form-group mb-3 col-md-12">
							<label>@lang('link.url'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<input class="form-control" type="url" name="linkurl" id="linkurl"  required="">
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

