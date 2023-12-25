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
                @lang('cash_statement.add_title')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="get" action="{{ url("cash_satement") }}" class="reloadform myinput" target="_blank">
                            <div class="col-md-12 p-0 row">
                                <div class="col-md-4 col-4 mt-md-1 mt-3">
                                    <label>@lang('cash_statement.reciver')</label>
                                    <div class="input-group">
                                        <select class="form-control form-control-sm" name="reciver_id" id="reciver_id" required="">
                                            <option value="All">All</option>
                                            @if(isset($reciver))
                                            @foreach($reciver as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-6 mt-md-1 mt-3">
                                    <label>@lang('supplier_info.report_type')</label>
                                    <select class="form-control form-control-sm" name="report_type" id="report_type" required onchange="reportStat()">
                                        <option value="All">@lang('report.all')</option>
                                        <option value="Daily">@lang('report.daily')</option>
                                        <option value="DateToDate">@lang('report.date_to_date')</option>
                                        <option value="Monthly">@lang('report.monthly')</option>
                                        <option value="Yearly">@lang('report.yearly')</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-6 mt-md-1 mt-3" id="DateBox">
                                    <label>@lang('common.date') :</label>
                                    <input type="text" name="date" id="date" class="form-control form-control-sm datepicker" value="{{ date('d/m/Y') }}" required>
                                </div>
                                <div class="col-md-6 col-6 mt-md-1 mt-3" id="DateToDate1">
                                    <label>@lang('common.from_date') :</label>
                                    <input type="text" name="from_date" id="from_date" class="form-control form-control-sm datepicker" value="{{ date('d/m/Y') }}" required>
                                </div>
                                <div class="col-md-6 col-6 mt-md-1 mt-3" id="DateToDate2">
                                    <label>@lang('common.to_date') :</label>
                                    <input type="text" name="to_date" id="to_date" class="form-control form-control-sm datepicker" value="{{ date('d/m/Y') }}" required>
                                </div>
                                <div class="col-md-6 col-6 mt-md-1 mt-3" id="MonthBox">
                                    <label>@lang('common.month')</label>
                                    <select class="form-control form-control-sm" name="month" required>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-6 mt-md-1 mt-3" id="YearBox">
                                    <label>@lang('common.year') :</label>
                                    <input type="text" name="year" id="year" class="form-control form-control-sm" value="{{ date('Y') }}" required>
                                </div>
                            </div>

                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-sm btn-success"> <i class="fa fa-eye"></i> @lang('common.show')</button>
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

    <script>
        $('#DateBox').hide();
        $('#DateToDate1').hide();
        $('#DateToDate2').hide();
        $('#MonthBox').hide();
        $('#YearBox').hide();

        function reportStat()
        {
            let report_type = $('#report_type').val();
            if(report_type == 'All')
            {
                $('#DateBox').hide();
                $('#DateToDate1').hide();
                $('#DateToDate2').hide();
                $('#MonthBox').hide();
                $('#YearBox').hide();
            }
            else if(report_type == 'Daily')
            {
                $('#DateBox').show();
                $('#DateToDate1').hide();
                $('#DateToDate2').hide();
                $('#MonthBox').hide();
                $('#YearBox').hide();
            }
            else if(report_type == 'DateToDate')
            {
                $('#DateBox').hide();
                $('#DateToDate1').show();
                $('#DateToDate2').show();
                $('#MonthBox').hide();
                $('#YearBox').hide();
            }
            else if(report_type == 'Monthly')
            {
                $('#DateBox').hide();
                $('#DateToDate1').hide();
                $('#DateToDate2').hide();
                $('#MonthBox').show();
                $('#YearBox').show();
            }
            else if(report_type == 'Yearly')
            {
                $('#DateBox').hide();
                $('#DateToDate1').hide();
                $('#DateToDate2').hide();
                $('#MonthBox').hide();
                $('#YearBox').show();
            }
        }

    </script>


@endpush
