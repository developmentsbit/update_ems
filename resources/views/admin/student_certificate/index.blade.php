@extends('layouts.master')
@section('content')

@push('header_styles')
<!-- third party css -->
<link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css">
<!-- third party css end -->

@endpush


<link rel="stylesheet" type="text/css"
href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('student_certificate.index_title')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
            @if (\App\Traits\RolePermissionTrait::checkRoleHasPermission('role', 'create'))
                @slot('action_button1')
                    @lang('common.add_new')
                @endslot
                @slot('action_button1_link')
                    {{ route('student_certificate.create') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3>@lang('student_certificate.index_title')</h3><br>
                <div class="table-responsive">

				<table id="datatable-buttons" class="table  w-100">
					<thead class="mythead">
						<tr>
							<th>#</th>
							<th>@lang('student_certificate.name')</th>
							<th>@lang('student_certificate.class')</th>
							<th>@lang('student_certificate.roll')</th>
							<th>@lang('student_certificate.upazila')</th>
							<th>@lang('student_certificate.district')</th>
							<th>@lang('student_certificate.birth_date')</th>
							<th>@lang('common.action')</th>
						</tr>
					</thead>
					<tbody class="tbody" id="showtdata">
                        @php
                            $i = 1;
                        @endphp
                        @if(isset($data))
                        @foreach ($data as $d)
                        <tr>
                            <td>
                                {{ $i++ }}
                            </td>

                            <td>
                                {{ $d->name }}
                            </td>
                            <td>
                                {{$d->class}}
                            </td>
                            <td>
                                {{ $d->roll_no }}
                            </td>
                            <td>
                                {{ $d->upazila }}
                            </td>
                            <td>
                                {{ $d->district }}
                            </td>
                            <td>
                                {{ $d->birth_date }}
                            </td>
                            <td>
                                <a style="float: left;" target="_blank" class="btn btn-sm btn-success" href="{{ route('student_certificate.show',$d->id) }}" ><i class="fa fa-eye"></i></a>
                                <a class="btn btn-sm btn-info" href="{{ route('student_certificate.edit',$d->id) }}" ><i class="fa fa-edit"></i></a>
                                <form method="post" action="{{ route('student_certificate.destroy',$d->id) }}">
                                @csrf
                                @method('DELETE')
                                <button onClick="return confirm('Are You Sure?')" class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
					</tbody>
				</table>

            </div>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>










@push('footer_scripts')
<!-- third party js -->
<script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.select.min.js') }}"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>
<!-- end demo js-->


@endpush

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
	@if(Session::has('message'))
	toastr.options =
	{
		"closeButton" : true,
		"progressBar" : true
	}
	toastr.success("{{ session('message') }}");
	@endif

	@if(Session::has('error'))
	toastr.options =
	{
		"closeButton" : true,
		"progressBar" : true
	}
	toastr.error("{{ session('error') }}");
	@endif

	@if(Session::has('info'))
	toastr.options =
	{
		"closeButton" : true,
		"progressBar" : true
	}
	toastr.info("{{ session('info') }}");
	@endif

	@if(Session::has('warning'))
	toastr.options =
	{
		"closeButton" : true,
		"progressBar" : true
	}
	toastr.warning("{{ session('warning') }}");
	@endif
</script>





@endsection
