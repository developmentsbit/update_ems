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
            @lang('bank_transaction_entry.viewtitle')
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
                    {{ route('bank_transaction_entry.create') }}
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

                        <h4 class="header-title">  @lang('bank_transaction_entry.managetitle')</h4>
                        <ul class="nav nav-tabs nav-bordered mb-3">
                            <li class="nav-item">
                                <a href="#users-tab-all" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                    @lang('common.all')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#users-tab-deleted" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                    @lang('common.deleted_list')
                                </a>
                            </li>
                        </ul> <!-- end nav-->
                        <div class="tab-content">
                            <div class="tab-pane show active" id="users-tab-all">
                                <table id="datatable-users-all" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('bank_transaction_entry.cheque_no')</th>
                                            <th>@lang('bank_transaction_entry.bank_name')</th>
                                            <th>@lang('bank_transaction_entry.account_number')</th>
                                            <th>@lang('bank_transaction_entry.transaction_type')</th>
                                            <th>@lang('bank_transaction_entry.amount')</th>
                                            <th>@lang('bank_transaction_entry.admin_name')</th>
                                            <th>@lang('bank_transaction_entry.report')</th>
                                            <th>@lang('common.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data)
                                        @foreach ($data as $v)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$v->cheque_no}}</td>
                                            <td>{{$v->bank_name}}</td>
                                            <td>{{$v->account_number}}</td>
                                            <td>
                                                @if($v->transaction_type == 1)
                                                    Deposit
                                                @endif
                                                @if($v->transaction_type == 2)
                                                    Withdraw
                                                @endif
                                                @if($v->transaction_type == 3)
                                                    Bank Account Cost
                                                @endif
                                                @if($v->transaction_type == 4)
                                                    Bank Account Interest
                                                @endif
                                            </td>
                                            <td>{{$v->amount}}</td>
                                            <td>{{$v->admin->name}}</td>
                                            <td>
                                                <a style="float: left;margin-bottom:4px;" href="{{ url('transactionReport/'.$v->cheque_no) }}" class="btn btn-sm btn-success" target="blank">View Report</a>
											</td>
                                            <td>
                                                <a style="float: left;" class="btn btn-sm btn-info" href="{{route('bank_transaction_entry.edit',$v->id)}}"><i class="fa fa-edit"></i></a>
                                                <form method="post" action="{{route('bank_transaction_entry.destroy',$v->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are You Sure ?')"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                       @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div> <!-- end all-->
                            @php
                            use App\Models\bank_transaction_entry;
                            $deleted = bank_transaction_entry::leftjoin("bank_infos",'bank_infos.id','bank_transaction_entries.bank_id')
                            ->select("bank_transaction_entries.*",'bank_infos.*')
                            ->onlyTrashed()->get();
                            $i = 1;
                            @endphp
                            <div class="tab-pane" id="users-tab-deleted">
                                <table id="datatable-users-deleted" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('bank_transaction_entry.cheque_no')</th>
                                            <th>@lang('bank_transaction_entry.bank_name')</th>
                                            <th>@lang('bank_transaction_entry.account_number')</th>
                                            <th>@lang('bank_transaction_entry.transaction_type')</th>
                                            <th>@lang('bank_transaction_entry.amount')</th>
                                            <th>@lang('bank_transaction_entry.admin_name')</th>
                                            <th>@lang('common.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($deleted)
                                        @foreach ($deleted as $v)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$v->cheque_no}}</td>
                                            <td>{{$v->bank_name}}</td>
                                            <td>{{$v->account_number}}</td>
                                            <td>
                                                @if($v->transaction_type == 1)
                                                    Deposit
                                                @endif
                                                @if($v->transaction_type == 2)
                                                    Withdraw
                                                @endif
                                                @if($v->transaction_type == 3)
                                                    Bank Account Cost
                                                @endif
                                                @if($v->transaction_type == 4)
                                                    Bank Account Interest
                                                @endif
                                            </td>
                                            <td>{{$v->amount}}</td>
                                            <td>{{$v->admin->name}}</td>
                                            <td>
                                                <a href="{{ url('retrive_bank_transaction_entry') }}/{{ $v->id }}" class="btn btn-sm btn-warning">@lang('common.restore')</a>

                                                <a href="{{ url('delete_bank_transaction_entry') }}/{{ $v->id }}" class="btn btn-danger btn-sm">@lang('common.permenantly_delete')</a>
                                            </td>
                                        </tr>
                                        
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div> <!-- end tab-content-->
                        

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
