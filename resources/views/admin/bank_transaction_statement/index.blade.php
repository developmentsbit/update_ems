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
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="get" action="{{ url("bankstatementreports") }}" class="reloadform myinput" target="_blank">
                            @csrf
                            <div class="col-md-12 p-0 row">
                                <div class="col-md-4 col-4 mt-md-1 mt-3">
                                    <label>@lang('bank_transaction_statement.bank_name')</label>
                                    <div class="input-group">
                                        <select class="form-control" name="bank_id" id="bank_id" required="">
                                            <option value="">@lang('common.select_one')</option>
                                            @if(isset($bank))
                                            @foreach($bank as $c)
                                            <option value="{{ $c->id }}">{{ $c->bank_name }}-{{ $c->account_number }}</option>
                                            @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3 col-3 mt-md-1 mt-3">
                                    <label>@lang('bank_transaction_statement.report_type')</label>
                                    <select  name ="Type"  id="Type" class="form-control textfill select2_demo_1" onchange="showReport()" required="">
                                        <option value="">@lang('common.select_one')</option>
                                        <option value="1">@lang('bank_transaction_statement.all')</option>
                                        <option value="2">@lang('bank_transaction_statement.daily')</option>
                                        <option value="3">@lang('bank_transaction_statement.date_date')</option>
                                        <option value="4">@lang('bank_transaction_statement.monthly')</option>
                                        <option value="5">@lang('bank_transaction_statement.yearly')</option>
                                    </select>
                                </div>

                                <div class="col-md-2 col-2 mt-md-1 mt-3" id="firstdate" style="display:none">
                                    <label class="control-label">@lang('bank_transaction_statement.first_date')</label> <input type="date" class="form-control" placeholder="Start Date"  name="start_date" id="start_date" value="{{  date('d-m-Y') }}">
                                </div>

                                <div class="col-md-2 col-2 mt-md-1 mt-3"  id="seconddate" style="display:none">
                                    <label class="control-label">@lang('bank_transaction_statement.last_date')</label> <div class="controls"> <input type="date" class="form-control" placeholder="End Date"  name="end_date" id="end_date" value="{{  date('d-m-Y') }}"></div>
                                </div>

                                <div class="col-md-2 col-2 mt-md-1 mt-3" id="first">

                                </div>

                                <div class="col-md-2 col-2 mt-md-1 mt-3"  id="second">

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

    <script type="text/javascript">

        function showReport(){

            $('#second').html('');
            $('#first').html('');
            var type = $('#Type').val();
            if(type==''){
                $('#second').html('');
                $('#first').html('');
            }
            else{
                if(type==='1'){

                    $('#second').html('');
                    $('#first').html('');
                    $('#firstdate').css('display','none');
                    $('#seconddate').css('display','none');

                }
                if(type==='2'){

                    $('#second').html('');
                    $('#first').html('');
                    $('#firstdate').css('display','block');
                    $('#seconddate').css('display','none');

                }
                else if(type==='4'){
                    $('#firstdate').css('display','none');
                    $('#seconddate').css('display','none');
                    $('#second').html('');
                    $('#first').html('');

                    $('#first').append('<label class="control-label ">@lang('bank_transaction_statement.select_month')</label> <div class="controls"> <select  name="month"  id="month" class="form-control select2_demo_1"><option value="01">January</option><option value="02">February</option><option value="03">March</option> <option value="04">April</option> <option value="05">May</option> <option value="06">June</option> <option value="07">July</option><option value="08">August </option> <option value="09">September </option> <option value="10">October </option> <option value="11">November </option>  <option value="12">December </option></select></div>');

                    $('#second').append('<label class="control-label">@lang('bank_transaction_statement.year')</label><div class="controls"><input type="text" name="year" id="year"   class=" form-control" value="{{date('Y')}}"> </div>');
                }
                else if(type==='5')
                {
                    $('#firstdate').css('display','none');
                    $('#seconddate').css('display','none');

                    $('#second').html('');
                    $('#first').html('');
                    $('#first').append('<label class="control-label">@lang('bank_transaction_statement.year')</label><div class="controls"><input type="text" name="year"  id="year"  placeholder="2021" class=" form-control" value="{{date('Y')}}"> </div>');

                }
                else if(type==='3')
                {
                    $('#first').html('');
                    $('#second').html('');

                    $('#firstdate').css('display','block');
                    $('#seconddate').css('display','block');

                }
                else{

                    $('#second').html('');
                    $('#first').html('');
                }
            }
        }

        function resetledger()
        {
            location.reload();

        }

    </script>


@endpush
