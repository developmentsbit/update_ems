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
                @lang('add_subject.viewtitle')
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
                    {{ route('add_subject.create') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">

		<div class="card">
			<div class="card-body">

				<h3>@lang('add_subject.managetitle')</h3><br>

				<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
					<thead class="mythead">
						<tr>
							<th>#</th>
							<th>@lang('add_subject.classname')</th>
							<th>@lang('add_subject.groupname')</th>
							<th>@lang('add_subject.name')</th>
							<th>@lang('add_subject.status')</th>
							<th>@lang('common.action')</th>
						</tr>
					</thead>
					<tbody class="tbody" id="showtdata">

                        @php $i=1;  @endphp
						@if(isset($data))
						@foreach($data as $d)
						<tr id="tr{{ $d->id }}">
							<td>{{ $i++ }}</td>
							<td>
                                {{-- {{ $d->className->class_name }} --}}
                                @if($lang == 'en')
                                {{ $d->class_name ?: $d->class_name_bn}}
                                @else
                                {{$d->class_name_bn ?: $d->class_name}}
                                @endif
                            </td>

							<td>
                                @if($lang == 'en')
                                {{ $d->group_name ?: $d->group_name_bn}}
                                @else
                                {{$d->group_name_bn ?: $d->group_name}}
                                @endif
                            </td>
							<td>
                                @if($lang == 'en')
                                {{ $d->subject_name ?: $d->subject_name_bn}}
                                @else
                                {{$d->subject_name_bn ?: $d->subject_name}}
                                @endif</td>
							<td>
								<input  type="checkbox" id="status-{{$d->id}}" data-switch="none"/ @if($d->status == 1) checked @endif>
                                <label onclick="subjectStatusChange({{$d->id}})" for="status-{{$d->id}}" data-on-label="" data-off-label=""></label>
							</td>
							<td>
								<div class="btn-group">
									<a  class="btn btn-info border-0 edit text-light" data-toggle="modal" data-target="#exampleModalCenters" href="{{ route("add_subject.edit",$d->id) }}">@lang('common.edit')</a>
									<form action="{{ route('add_subject.destroy',$d->id) }}" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger" onClick="return confirm('Are You Sure?')">@lang('common.delete')</button>
									</form>
								</div>
							</td>
						</tr>
						@endforeach
						@endif
					</tbody>
				</table>
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


<script>
    function subjectStatusChange(id)
    {
        // alert(id);
        $.ajax({
            headers : {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },

            url : '{{ url('subjectStatusChanged') }}/'+id,

            type : 'GET',

            success : function(res)
            {
                toastr.success("Status Changed Successfully");
            }
        });
    }
</script>

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
