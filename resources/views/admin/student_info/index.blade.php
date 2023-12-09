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
                @lang('student_info.addtitle')
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
                    {{ route('student_info.create') }}
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

                        <form method="GET"  action="showStudent" target="_blank">

                        <div class="form-group row">
                            <div class="col-md-4 col-4 mt-md-1 mt-3">
                                <label>@lang('student_info.class')</label>
                                <select class="form-control form-control-sm " name="class_id" id="class_id" onchange="loadGroups()" required>
                                    <option value="">@lang('common.select_one')</option>
                                    @if(isset($class))
                                    @foreach ($class as $c)
                                        <option value="{{ $c->id }}">
                                            @if($lang == 'en')
                                            {{ $c->class_name ?: $c->class_name_bn }}
                                            @else
                                            {{ $c->class_name_bn ?: $c->class_name }}
                                            @endif
                                        </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-4 col-4 mt-md-1 mt-3" id="groupBox">
                                <label>@lang('student_info.group')</label>
                                <select class="form-control form-control-sm " id="group_id" id="group_id">
                                    <option value="">@lang('common.select_one')</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-4 mt-md-1 mt-3">
                                <label for="" class="">@lang('student_info.session') :</label>
                                <select class="form-control form-control-sm" data-toggle="" id="session" name="session" required>
                                <option value="">Choose...</option>
                                @foreach ($session as $s)
                                <option value="{{ $s->session }}">{{$s->session}}</option>
                                @endforeach
                                </select>
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

    <script>
        function loadGroups()
        {
            let class_id = $('#class_id').val();
            if(class_id != '')
            {
                $.ajax({
                    headers : {
                        'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                    },

                    url : '{{ url('loadGroups') }}',

                    type : 'POST',

                    data : {class_id},

                    beforeSend : function()
                    {
                        $('#groupBox').html('Loading....');
                    },
                    success : function(res)
                    {
                        if(res == 'no_group')
                        {
                            $('#groupBox').hide();
                        }
                        else
                        {
                            $('#groupBox').show();
                            $('#groupBox').html(res);

                        }
                    }
                });
            }
            else
            {
                $('#groupBox').show();
                $('#groupBox').html('<b class="text-danger">Select Class First !</b>');
            }
        }
    </script>

@endpush
