@extends('layouts.master')
@section('content')
<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />
<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('add_fee_title.title')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
            @if (\App\Traits\RolePermissionTrait::checkRoleHasPermission('role', 'create'))
                @slot('action_button1')
                   <i class="fa fa-eye"></i> @lang('common.view')
                @endslot
                @slot('action_button1_link')
                    {{ route('add_fee_title.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">

		<div class="card">
			<div class="card-body">
				<h3>@lang('add_fee_title.title')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('add_fee_title.store') }}" enctype="multipart/form-data">
					@csrf
                 
					<div class="row myinput">
                        <div class="form-group mb-3 col-md-4">
                            <label>@lang('common.title'): <span class="text-danger" style="font-size: 15px;">*</span></label>
                            <div class="input-group mt-2">
                                <input class="form-control form-control" type="text" name="title" id="title"  required="">
                            </div>
                        </div>
                        <div class="form-group mb-3 col-md-4">
                            <label>@lang('common.title_bn'):</label>
                            <div class="input-group mt-2">
                                <input class="form-control form-control" type="text" name="title_bn" id="title_bn"  required="">
                            </div>
                        </div>
                        <div class="form-group mb-3 col-md-4">
                            <label class="col-sm-4 col-form-label">@lang('add_fee_title.year') :</label>
                            <input type="text" name="year" class="form-control "value="2024" required>
						</div>
                        <div class="form-group mb-3 col-md-4">
							<label>@lang('expense_entry.amount'): </label><span class="text-danger">*</span>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="amount" id="amount"  required="">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-4">
                            <label>@lang('add_fee_title.class_name'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
                                <select class="form-control" name="class_id">
									@if(isset($class))
									@foreach($class as $i)
									<option value="{{ $i->id }}">{{ $i->class_name }}</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>
                        <div class="form-group mb-3 col-md-4">
                            <label>@lang('add_fee_title.month'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
                                <select class="form-control" name="month">
									<option value="1">@lang('month.january')</option>
									<option value="2">@lang('month.february')</option>
									<option value="3">@lang('month.march')</option>
									<option value="4">@lang('month.april')</option>
									<option value="5">@lang('month.may')</option>
									<option value="6">@lang('month.june')</option>
									<option value="7">@lang('month.june')</option>
									<option value="8">@lang('month.august')</option>
									<option value="9">@lang('month.september')</option>
									<option value="10">@lang('month.october')</option>
									<option value="11">@lang('month.november')</option>
									<option value="12">@lang('month.december')</option>
								</select>
							</div>
						</div>
                        
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('expense_entry.details'): </label>
							<div class="input-group mt-2">
								<textarea id="summernote" class="form-control w-100" rows="10" type="text" name="details" ></textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('expense_entry.details_bn'): </label>
							<div class="input-group mt-2">
								<textarea id="summernote1" class="form-control w-100" rows="10" type="text" name="details_bn" ></textarea>
							</div>
						</div>
						
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_fee_title.fee'): </label><span class="text-danger">*</span>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="fee" id="fee"  >
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('add_fee_title.feeType'): </label><span class="text-danger">*</span>
                            
							<div class="input-group mt-2">
                                
								<div class="form-check">
                                    <input class="form-check-input" type="radio" name="feeType" id="feeType1" value="0" checked> 
                                    <label class="form-check-label" for="feeType1">
                                        @lang('add_fee_title.commonfee')
                                    </label>
                                </div>
                               
                                  <div class="form-check ms-3" >
                                    <input class="form-check-input" type="radio" name="feeType" id="feeType2" value="1" >
                                    <label class="form-check-label" for="feeType2">
                                        @lang('add_fee_title.exfee')
                                    </label>
                                  </div>
							</div>
						</div>
						
                      				
						<div class="modal-footer border-0">
							<button type="button" class="btn btn-secondary border-0" onClick="window.location.reload();">@lang('common.close')</button>
							<button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
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

