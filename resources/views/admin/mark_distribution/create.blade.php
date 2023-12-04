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
/* .from{
    width: 1000px;
    margin-left: 8%;
} */
</style>


<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('mark_distribution.addtitle')
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
                    {{ route('mark_distribution.index') }}
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
				<form>
					<div class="row">
						<div class="col-md-6 mt-2">
							<div class="row ">
								<label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
									@lang('mark_distribution.select_class') :</label>
								<div class="col-sm-7">
									<select class="form-select" id="session" name="session">
										<option selected>Select One</option>
										
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 mt-2">
							<div class="row ">
								<label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark"> @lang('mark_distribution.exam_type')  :</label>
								<div class="col-sm-7">
									<select class="form-select" id="session" name="session">
										<option selected>Select One</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 mt-2">
							<div class="row ">
								<label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
									@lang('mark_distribution.select_group')  :</label>
								<div class="col-sm-7">
									<select class="form-select" id="session" name="session">
										<option selected>Select One</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 mt-2">
							<div class="row ">
								<label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
									@lang('mark_distribution.subject_type')  :</label>
								<div class="col-sm-7">
									<select class="form-select" id="session" name="session">
										<option selected>Select One</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 mt-2">
							<div class="row ">
								<label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
									@lang('mark_distribution.subject_name')  :</label>
								<div class="col-sm-7">
									<input class="form-control border-dark" type="text" name="subject_name" id="subject_name">
								</div>
							</div>
						</div>
						<div class="col-md-6 mt-2">
							<div class="row ">
								<label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
								@lang('mark_distribution.subject_part_name') :</label>
								<div class="col-sm-7">
									<input class="form-control border-dark" type="text" name="subject_part_name" id="subject_part_name">
								</div>
							</div>
						</div>
						<div class="col-md-6 mt-2">
							<div class="row ">
								<label for="inputPassword3" class="col-sm-4 col-form-label  text-md-end text-dark">
									@lang('mark_distribution.subject_code') :</label>
								<div class="col-sm-7">
									<input class="form-control border-dark" type="text" name="subject_code" id="subject_code">
								</div>
							</div>
						</div>

						<div class="ms-md-5">
							<div class="col-md-12 mt-2">
							<label for="inputPassword3" class="col-form-label text-md-end text-dark">@lang('mark_distribution.marks')  :</label>
								<div class="row">
									<div class="col-md-2">
										<div class="row">
											<div class="col-sm-12">
												<label for="inputPassword3" class="col-sm-4 col-form-label text-md-end text-dark">
													@lang('mark_distribution.mcq')  :</label>
												<input class="form-control border-dark" type="number" name="mcq" id="mcq" placeholder="00">
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="row">
											<div class="col-sm-12">
												<label for="inputPassword3" class="col-sm-4 col-form-label text-md-end text-dark">
													@lang('mark_distribution.creative')  :</label>
												<input class="form-control border-dark" type="number" name="creative" id="creative" placeholder="00">
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="row">
											<div class="col-sm-12">
												<label for="inputPassword3" class="col-sm-5 col-form-label text-md-end text-dark">
													@lang('mark_distribution.practical')  :</label>
												<input class="form-control border-dark" type="number" name="practical" id="practical" placeholder="00">
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="row">
											<div class="col-sm-12">
												<label for="inputPassword3" class="col-sm-5 col-form-label text-md-end text-dark">
													@lang('mark_distribution.count_asses')  :</label>
												<input class="form-control border-dark" type="number" name="count_asses" id="count_asses" placeholder="00">
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="row">
											<div class="col-sm-12">
												<label for="inputPassword3" class="col-sm-4 col-form-label text-md-end text-dark">
													@lang('mark_distribution.total')  :</label>
												<input class="form-control border-dark" type="number" name="total" id="total" placeholder="00">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="text-center mt-4 ">
							<button type="button" class="btn btn-secondary border-0" onClick="window.location.reload();">@lang('common.close')</button>
							<button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
						</div>
					</div>
				</form>
				</div> <!-- end card body-->
        	</div>
		</div> <!-- end card -->
	</div><!-- end col-->
</div>



<script src="{{ asset('assets/js/vendor/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/demo.quilljs.js') }}"></script>



@endsection