@extends('layouts.master')
@section('content')
<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />
<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('others_income_entry.edittitle')
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
                    {{ route('others_income_entry.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">

		<div class="card">
			<div class="card-body">
				<h3>@lang('others_income_entry.edittitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('others_income_entry.update',$data->id) }}" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
					<div class="row myinput">
                        <div class="form-group mb-3 col-md-6">
                            <label class="col-sm-4 col-form-label">@lang('common.date') :</label>
                            <input type="text" name="date" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true"  value="{{ $date }}" required>
						</div>
                        <div class="form-group mb-3 col-md-6">
                            <label>@lang('others_income_entry.title'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
                                <select class="form-control" name="income_id">
                                    @if(isset($income_expense))
									@foreach($income_expense as $i)
									<option value="{{ $i->id }}" <?php if ($i->id == $data->income_id) {
										echo "selected";
									} ?>>@if($lang == 'en'){{ $i->title }}@else{{$i->title_bn}}@endif</option>
									@endforeach
									@endif
								</select>
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('others_income_entry.details'): </label>
							<div class="input-group mt-2">
								<textarea id="summernote" class="form-control w-100" rows="10" type="text" name="details" >{{ $data->details }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('others_income_entry.details_bn'): </label>
							<div class="input-group mt-2">
								<textarea id="summernote1" class="form-control w-100" rows="10" type="text" name="details_bn" >{{ $data->details_bn }}</textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('others_income_entry.amount'): </label><span class="text-danger">*</span>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="amount" id="amount" value="{{ $data->amount }}" required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('others_income_entry.receiver'): </label><span class="text-danger">*</span>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="receiver" id="receiver" value="{{ $data->receiver }}" >
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('others_income_entry.address'): </label>
							<div class="input-group mt-2">
								<textarea id="summernote" class="form-control" rows="0" type="text" name="address" >{{ $data->address }}</textarea>
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('addgroup.status'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
                                <select class="form-select select2" data-toggle="select2" name="status" id="status">
                                    <option @if($data->status == 1) selected @endif value="1">@lang('common.active')</option>
                                    <option @if($data->status == 2) selected @endif value="2">@lang('common.inactive')</option>
                                </select>
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

