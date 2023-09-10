@extends('layouts.master')

@section('content')

<div class="container">

        @component('components.breadcrumb')
            @slot('title')
                @lang('teaching_permission.edittitle')
            @endslot
            @slot('breadcrumb1')
                @lang('common.dashboard')
            @endslot
            @slot('breadcrumb1_link')
                {{ route('dashboard') }}
            @endslot
            @if (\App\Traits\RolePermissionTrait::checkRoleHasPermission('role', 'create'))
                @slot('action_button1')
                  <i class="fa fa-eye"></i>  @lang('common.view')
                @endslot
                @slot('action_button1_link')
                    {{ route('teaching_permission.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
        
        <form class="row" method="post" action="{{route('teaching_permission.update',$data->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">@lang('notices.edittitle')</h4>
                        <div class="tab-content">
                            <div class="row">
                                <div class="form-groupform-group col-sm-12 col-md-12 col-lg-6 mt-3 mt-3">
                                    <label class="mb-2">@lang('common.date') :</label>
                                    <input type="text" name="date" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true"  value="{{ $date }}" required>
                                </div>
                                <div class="form-groupform-group col-sm-12 col-md-12 col-lg-6 mt-3 mt-3">
                                    <label class="mb-2">@lang('teaching_permission.subject') :</label>
                                    <input type="text" name="subject" class="form-control" placeholder="@lang('teaching_permission.subject')" value="{{ $data->subject }}" required>
                                </div>
                                <div class="form-groupform-group col-sm-12 col-md-12 col-lg-6 mt-3 mt-3">
                                    <label class="mb-2">@lang('teaching_permission.part') :</label>
                                    <input type="text" name="part" class="form-control" placeholder="@lang('teaching_permission.part')" value="{{ $data->part }}" required>
                                </div>
                                <div class="form-groupform-group col-sm-12 col-md-12 col-lg-6 mt-3 mt-3">
                                    <label class="mb-2">@lang('teaching_permission.memorial_no') :</label>
                                    <input type="text" name="memorial_no" class="form-control" placeholder="@lang('teaching_permission.memorial_no')" value="{{ $data->memorial_no }}" required>
                                </div>
                                <div class="form-group col-md-12 mt-3">
                                    <label class="mb-2">@lang('common.image_pdf') :</label>
                                    <input type="file" class="form-control" name="image" value="{{ old('image') }}">
                                    <img src="{{ asset('assets/images/teaching_permission/')}}/{{$data->image}}" style="max-height: 100px;">>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="update" class="btn btn-success btn-sm button">@lang('common.update')</button>
                                </div>
                            </div>
                        </div> <!-- end tab-content-->
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </form>
    </div>

@endsection