@extends('layouts.master')
@section('content')
<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />
<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('others_income.income_expense')
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
                    {{ route('income_expense.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">

		<div class="card">
			<div class="card-body">
				<h3>@lang('others_income.tilte')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('income_expense.update',$data->id) }}" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
					<div class="row myinput">
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('common.sl'):</label><span class="text-danger">*</span>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="order_by" id="order_by" value="{{ $data->order_by }}">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
                            <label>@lang('teacherstaff.type'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
                                
								<select class="form-control" name="type" id="option_s2">
                                    @if($data->type == 1)
									<option value="1">Income</option>
									<option value="2">Expense</option>
									@else
									<option value="2">Expense</option>
									<option value="1">Income</option>

									@endif
									
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('common.title'): </label><span class="text-danger">*</span>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="title" id="title"  required="" value="{{ $data->title }}" >
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('common.title_bn'): </label><span class="text-danger">*</span>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="title_bn" id="title_bn" value="{{ $data->title_bn }}"  >
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

