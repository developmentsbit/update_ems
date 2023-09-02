@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />




<div class="container mt-2">
	<div class="col-12">

		<div class="card">
			<div class="card-body">

				<h3>@lang('admissioninfo.addtitle')</h3><br>


				<form method="post" class="btn-submit" action="{{ route('admissioninfo.store') }}" enctype="multipart/form-data">
					@csrf

					<div class="row myinput">

						<div class="form-group mb-3 col-md-3">
							<label>@lang('admissioninfo.type'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<select class="form-control" name="type" required="">
									<option value="1">প্রসপেক্টাস</option>
									<option value="2">ভর্তির নিয়মাবলী</option>
									<option value="3">ভর্তির পদ্ধতি</option>
									<option value="4">ভর্তি পরীক্ষার ফলাফল</option>
									<option value="5">ভর্তির পরীক্ষার প্রশ্নপত্র</option>
								</select>
							</div>
						</div>


						<div class="form-group mb-3 col-md-4">
							<label>@lang('admissioninfo.date'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<input class="form-control" type="date" name="date" id="date"  required="">
							</div>
						</div>


						<div class="form-group mb-3 col-md-12">
							<label>@lang('admissioninfo.title'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group">
								<input class="form-control" type="text" name="title" id="title"  required="">
							</div>
						</div>



						<div class="form-group mb-3 col-md-12">
							<label>@lang('admissioninfo.image'):</label>
							<div class="input-group">
								<input class="form-control" type="file" name="image" id="image" required="">
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

