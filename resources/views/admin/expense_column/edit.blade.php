@extends('layouts.master')
@section('content')
<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />
<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('others_income.expense_column')
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
                    {{ route('expense_column.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">

		<div class="card">
			<div class="card-body">
				<h3>@lang('others_income.expense_column')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('expense_column.update',$data->id) }}" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
					<div class="row myinput">
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('common.sl'):</label><span class="text-danger">*</span>
							<div class="input-group mt-2">
								<input class="form-control form-control-sm" type="text" name="order_by" id="order_by" value="{{ $data->order_by }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('others_income.column_name'): </label><span class="text-danger">*</span>
							<div class="input-group mt-2">
								<input class="form-control form-control-sm" type="text" name="column_name" id="column_name"  required="" value="{{ $data->column_name }}">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('others_income.column_name_bn'): </label><span class="text-danger">*</span>
							<div class="input-group mt-2">
								<input class="form-control form-control-sm" type="text" name="column_name_bn" id="column_name_bn" value="{{ $data->column_name_bn }}"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('others_income.year'): </label><span class="text-danger">*</span>
							<div class="input-group mt-2">
								<input class="form-control form-control-sm" type="text" name="year" id="year"  required="" value="{{ $data->year }}">
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

