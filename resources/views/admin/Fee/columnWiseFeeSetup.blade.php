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
                @lang('add_fee_title.title')
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
                    {{ route('add_fee_title.create') }}
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

                        <form method="post"  action="{{route('columnwisefee.store')}}" >
                        @csrf
                            <div class="form-group row">
                                <div class="col-md-4 col-4 mt-md-1 mt-3">
                                    <label>@lang('common.fee column')</label>
                                    <select class="form-control form-control-sm " name="column_id" id="column_id"  required>
                                        <option value="">@lang('common.select_one')</option>
                                        @if(isset($columns))
                                            @foreach($columns as $column)
                                                <option value="{{ $column->id }}">{{ $lang == 'en'?$column->column_name:$column->column_name_bn }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                                <div class="col-md-4 col-4 mt-md-1 mt-3">
                                    <label>@lang('common.year')</label>
                                    <select class="form-control form-control-sm " name="year" id="year" onchange="return columnWiseFeeTitle()"   required>
                                        <option value="">@lang('common.select_one')</option>
                                        @foreach ($years as $year)
                                            <option value="{{$year}}" {{$year == date("Y") ? 'selected':''}}>{{$year}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-4 col-4 mt-md-1 mt-3">
                                    <label>@lang('common.class')</label>
                                    <select class="form-control form-control-sm " name="class_id" id="class_id" onchange="return columnWiseFeeTitle()"  required>
                                        <option value="">@lang('common.select_one')</option>
                                        @if(isset($classes))
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}">{{  $lang == 'en'?$class->class_name:$class->class_name_bn }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
{{--                                <div class="col-md-6 col-4 mt-md-1 mt-3">--}}
{{--                                    <label>@lang('common.student id')</label>--}}
{{--                                    <input type="text" class="form-control" name="student_id" id="student_id" value="{{old('student_id')}}">--}}
{{--                                </div>--}}


                                <div class="col-12 mt-2">
                                    <div class="row">
                                    <div class="feeTitleShow" align="center"></div>

                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <div class="col-2 mt-2">
                                            <button type="submit" class="btn btn-sm btn-success"><i
                                                    class="fa fa-eye"></i> @lang('common.add')</button>
                                        </div>

                                        <div class="col-2 mt-2">
                                            <a class="btn btn-sm btn-success" onclick="ShowcolumnWiseFeeTitle()"><i
                                                    class="fa fa-eye"></i> @lang('common.view')</a>
                                        </div>
                                    </div>
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
    @include('components.commonJs')
@endpush
