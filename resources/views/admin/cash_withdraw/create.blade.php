@extends('layouts.master')
@section('content')
<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />
<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
			@lang('supplier_info.cash_withdraw')
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
                    {{ route('cash_withdraw.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">

		<div class="card">
			<div class="card-body">
				<h3>@lang('supplier_info.cash_deposit')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('cash_withdraw.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="row myinput">
                        <div class="form-group mb-3 col-md-6">
                            <label class="col-sm-4 col-form-label">@lang('common.date') :</label>
                            <input type="text" name="date" class="form-control form-control-sm date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" value="{{ old('date') }}" required>
						</div>
                        <div class="form-group mb-3 col-md-6">
                            <label>@lang('supplier_info.supplier'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
                                <select class="form-control " name="receiver_id" id="receiver_id" onchange="return getReceiverDue()">
									<option>@lang('common.select_one')</option>
									@if(isset($receiver))
									@foreach($receiver as $i)
									<option value="{{ $i->id }}">@if($lang == 'en'){{ $i->name }}@else {{$i->name_bn}}@endif</option>
									@endforeach
									@endif
								</select>
							</div>
							<span class="text-danger">Total Withdraw : <b id="withdraw">0/-</b></span>
                            <input type="hidden" id="totalwithdraw" name="totalwithdraw">
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('expense_entry.amount'): </label><span class="text-danger">*</span>
							<div class="input-group mt-2">
								<input class="form-control form-control-sm" type="text" name="withdraw" id="withdraw" onkeyup="correctPyament()" required="">
								
							
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('expense_entry.receiver'): </label><span class="text-danger">*</span>
							<div class="input-group mt-2">
								<input class="form-control form-control-sm" type="text" name="receiver" id="receiver"  required="">
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

<script>
    function getReceiverDue()
    {
        let receiver_id = $('#receiver_id').val();
        if(receiver_id != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('getReceiverDue') }}/'+receiver_id,

                type : 'GET',

                beforeSend : () => {

                },

                success : (res) => {
                    $('#withdraw').html(res+'/-');
                    $('#totalwithdraw').val(res);
                }
            })
        }
        else
        {
            $('#withdraw').html('0/-');
            $('#totalwithdraw').val('0');
        }
    }

        function correctPyament()
        {
            let due = $('#totalwithdraw').val();
            let deposit = $('#amount').val();
            if(deposit > due)
            {
                $('#amount').val('');
            }
        }

</script>

@endsection

    