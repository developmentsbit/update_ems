@extends('layouts.master')

@push('header_styles')
    <!-- third party css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <!-- third party css end -->
@endpush

@section('content')
    <div class="container">

        @component('components.breadcrumb')
            @slot('title')
                @lang('bank_transaction_statement.addtitle')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
            @if (\App\Traits\RolePermissionTrait::checkRoleHasPermission('user', 'create'))
                @slot('action_button1')
                    @lang('common.add_new')
                @endslot
                @slot('action_button1_link')
                    {{ route('bank_transaction_statement.create') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form method="GET"  action="{{ url("bankstatementreports") }}" class="reloadform myinput" target="_blank">

                        <div class="form-group row">
                            <div class="col-md-3 col-3 mt-md-1 mt-3">
                                <label>@lang('bank_transaction_statement.bank_account')</label>
                                <select class="form-control form-control-sm " name="bank_id" id="bank_id" onchange="loadGroups()" required>
                                    <option value="">@lang('common.select_one')</option>
                                    @if($data['data'])
                                    @foreach($data['data'] as $d)
                                    <option value="{{ $d->id }}">{{ $d->bank_name}} ({{$d->account_number}})</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-3 col-3 mt-md-1 mt-3" id="groupBox">
                                <label>@lang('bank_transaction_statement.report_type')</label>
                                <select class="form-control form-control-sm" name="type" id="type" required="">
                                    <option value="">-- রিপোর্ট ধরণ নির্বাচন করুন --</option>
                                    <option value="1">দৈনিক</option>
                                    <option value="2">তারিখ থেকে তারিখ</option>
                                    <option value="3">মাসিক</option>
                                    <option value="4">বাৎসারিক</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-3 mt-md-1 mt-3" id="firstdate" style="display:none">
                                <label class="control-label">প্রথম তারিখ</label> <input type="date" class="form-control" placeholder="Start Date"  name="start_date" id="start_date" value="{{  date('d-m-Y') }}">
                            </div>


                            <div class="col-md-3 col-3 mt-md-1 mt-3"  id="seconddate" style="display:none">
                                <label class="control-label">শেষ তারিখ</label> <div class="controls"> <input type="date" class="form-control" placeholder="End Date"  name="end_date" id="end_date" value="{{  date('d-m-Y') }}"></div>
                            </div>


                            <div class="col-md-3 col-3 mt-md-1 mt-3" id="first">

                            </div>


                            <div class="col-md-3 col-3 mt-md-1 mt-3"  id="second">

                            </div>
                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-sm btn-success"> <i class="fa fa-eye"></i> @lang('common.show')</button>
                            </div>
                        </div>
                    </form>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

    </div>
@endsection

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
        $(function() {
            $('#datatable-users-all').DataTable();
        });
        $(function() {
            $('#datatable-users-deleted').DataTable();
        });
    </script>

    @include('components.delete_script')



@endpush
