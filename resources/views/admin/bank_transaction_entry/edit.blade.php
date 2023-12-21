@extends('layouts.master')
@section('content')
<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />
<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('bank_transaction_entry.managetitle')
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
                    {{ route('bank_transaction_entry.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">

		<div class="card">
			<div class="card-body">
				<h3>@lang('bank_transaction_entry.addtitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('bank_transaction_entry.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="row myinput">
                        <div class="form-group mb-3 col-md-6">
                            <label class="col-sm-4 col-form-label">@lang('common.date') :</label>
                            <input type="text" name="date" class="form-control form-control-sm date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" value="{{ old('date') }}" required>
                        </div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('bank_transaction_entry.account_number'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control form-control-sm" name="bank_id" id="bank_id" onchange="return getBankBalance()">
                                    <option value="">@lang('common.select_one')</option>
                                    @if(isset($bank))
                                    @foreach($bank as $b)
                                    <option value="{{ $b->id }}">{{ $b->bank_name}} ({{$b->account_number}})</option>
                                    @endforeach
                                    @endif
								</select>
							</div>
                            <span class="text-danger">Total Balance : <b id="total_balance"></b> </span>
						</div>
                        <!-- <div class="form-group mb-3 col-md-6">
							<label>@lang('bank_transaction_entry.total_balance'): </label>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="total_balance" id="total_balance" readonly>
							</div>
						</div> -->
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('bank_transaction_entry.transaction_type'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control form-control-sm" name="transaction_type">
									<option value="1">Deposit</option>
									<option value="2">Withdraw</option>
									<option value="3">Bank Account Cost</option>
									<option value="4">Bank Account Interest</option>
								</select>
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('bank_transaction_entry.cheque_no'): </label>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="cheque_no" id="cheque_no">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('bank_transaction_entry.amount'): </label>
							<div class="input-group mt-2">
								<input class="form-control form-control" type="text" name="amount" id="amount">
							</div>
						</div>
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('addgroup.status'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<select class="form-control form-control-sm" name="status">
									<option value="1">@lang('common.active')</option>
									<option value="2">@lang('common.inactive')</option>
								</select>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('bank_transaction_entry.details'): </label>
							<div class="input-group mt-2">
								<textarea id="summernote" class="form-control w-100" rows="10" type="text" name="details" ></textarea>
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('bank_transaction_entry.details_bn'): </label>
							<div class="input-group mt-2">
								<textarea id="summernote1" class="form-control w-100" rows="10" type="text" name="details_bn" ></textarea>
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

@push('footer_scripts')

<script>
    function getBankBalance()
    {
        const bank_id = $('#bank_id').val();

        if(bank_id != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{url('getBankBalance')}}/'+bank_id,

                type : 'GET',

                beforeSend : () => {
                    $('#total_balance').html('Loading...');
                },

                success : (res) => {
                    $('#total_balance').html(res);
                }
            }); 
        }

    }
</script>

@endpush


@endsection

