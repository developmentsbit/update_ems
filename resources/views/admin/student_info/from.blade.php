@extends('layouts.master')
@section('content')



<link href="{{ asset('assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />

<style>
    .bg-info{
    background-color: #32dcdc !important;
    
    padding: 4px;
    font-size: 20px;
}
input.form-control ,.form-select{
    border: 1px solid black;
    border-radius: 0px;
}
</style>


<div class="container mt-2">
		@component('components.breadcrumb')
            @slot('title')
                @lang('mpo_nationalization.addtitle')
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
                    {{ route('mpo_nationalization.index') }}
                @endslot
            @endif
            @slot('action_button1_class')
                btn-primary
            @endslot
        @endcomponent
	<div class="col-12">
		<div class="card">
			<div class="card-body">
                <div class="main_from mt-3 ">
                    <h5 class="bg-info text-dark p-2 border-bottom border-3 border-drak rounded-bottom">STUDENT INFORMATION</h5>
                </div>
                <div class="from">
                 
                    <form class="row g-3 mt-1">
                      <div class="col-md-6">
                        <label  class="form-label text-dark">Addmission Date :</label>
                        <input type="date" class="form-control" name="admission_date" id="admission_date">
                      </div>
                        <div class="col-md-6">
                          <label for="" class="form-label text-dark">শিক্ষার্থীর নাম: <span class="text-danger" style="font-size: 15px;">*</span> </label>
                          <input type="text" class="form-control" id="" required>
                        </div>
                        <div class="col-md-6">
                          <label for="" class="form-label text-dark">শিক্ষার্থীর নাম:(ইংরেজি ) <span class="text-danger" style="font-size: 15px;">*</span></label>
                          <input type="text" class="form-control" id="" required>
                        </div>
                        <div class="col-md-6">
                          <label for="" class="form-label text-dark">Fathers Name : <span class="text-danger" style="font-size: 15px;">*</span> </label>
                          <input type="text" class="form-control" id="" required>
                        </div>
                        <div class="col-md-6">
                          <label for="" class="form-label text-dark">Mothers Name :	 <span class="text-danger" style="font-size: 15px;">*</span> </label>
                          <input type="text" class="form-control" id="" required>
                        </div>
                        
                        <div class="col-md-6">
                          <label  class="form-label text-dark">জন্ম তারিখ : <span class="text-danger" style="font-size: 15px;">*</span>  </label>
                          <input type="date" class="form-control" >
                        </div>
                    
                        <div class="col-md-6 mt-4">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label text-dark">জেন্ডার : <span class="text-danger" style="font-size: 15px;">*</span></label>
                                <div class="col-sm-8">
                                  <select class="form-select" id="autoSizingSelect">
                                    <option selected>Choose...</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Others</option>
                                  </select>
                                </div>
                          </div>
                        </div>
                        <div class="col-md-6 mt-4">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label text-dark">জাতীয়তা  : <span class="text-danger" style="font-size: 15px;">*</span></label>
                                <div class="col-sm-8">
                                  <select class="form-select" id="autoSizingSelect">
                                    <option selected>Choose...</option>
                                    <option value="1">Bangladeshi</option>
                                    
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label text-dark">ধর্ম : <span class="text-danger" style="font-size: 15px;">*</span></label>
                                <div class="col-sm-8">
                                  <select class="form-select" id="autoSizingSelect">
                                    <option selected>Choose...</option>
                                    <option value="1">Bangladeshi</option>
                                    
                                  </select>
                                </div>
                            </div>
                        </div>
                       
                        
                        <div class="col-md-6 ">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label text-dark">রক্তের গ্রুপ:</label>
                                <div class="col-sm-8">
                                  <select class="form-select" id="autoSizingSelect">
                                    <option selected>Choose...</option>
                                    <option value="1">Bangladeshi</option>
                                    
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <label for="" class="form-label text-dark">শিক্ষার্থীর ছবি (পাসপোর্ট সাইজ) :</label>
                          <input type="file" class="form-control" id="">
                        </div>

                  {{-- STUDENT'S ADDRESS   --}}
                        <div class="main_from mt-3 ">
                          <h5 class="bg-info p-2 text-dark border-bottom border-3 border-drak rounded-bottom">STUDENT'S ADDRESS:</h5>
                        </div>

                {{-- Present Address:  --}}

                        <div class="main_from mt-0">
                          <h6 class="bg-dark text-light border-bottom border-3 border-info rounded-bottom fs-5 p-2">Present Address:</h6>
                        </div>

                        <div class="col-md-4">
                          <label for="" class="form-label text-dark">House No./Name:</label>
                          <input type="text" class="form-control" id="">
                        </div>
                        <div class="col-md-4">
                          <label for="" class="form-label text-dark">Village:</label>
                          <input type="text" class="form-control" id="">
                        </div>
                        <div class="col-md-4">
                          <label for="" class="form-label text-dark">Post Office:</label>
                          <input type="text" class="form-control" id="">
                        </div>
                        <div class="col-md-4">
                          <label for="" class="form-label text-dark">Post Code:</label>
                          <input type="text" class="form-control" id="">
                        </div>
                        <div class="col-md-4">
                          <label for="" class="form-label text-dark">Upazilla:</label>
                          <input type="text" class="form-control" id="">
                        </div>
                        <div class="col-md-4">
                          <label for="" class="form-label text-dark">District:</label>
                          <input type="text" class="form-control" id="">
                        </div>

                        <div class="main_from mt-3 p-2">
                          <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                          <label class="form-check-label text-warning fs-5" for="flexCheckDefault">
                            If both address are same, Click the check box.
                          </label>

                 {{-- Parmanenet Address --}}

                        </div>
                        <div class="main_from mt-0">
                          <h6 class="bg-dark text-light border-bottom border-3 border-success rounded-bottom fs-5 p-2">Parmanenet Address :</h6>
                        </div>
                        <div class="col-md-4">
                          <label for="" class="form-label text-dark">House No./Name:</label>
                          <input type="text" class="form-control" id="">
                        </div>
                        <div class="col-md-4">
                          <label for="" class="form-label text-dark">Village:</label>
                          <input type="text" class="form-control" id="">
                        </div>
                        <div class="col-md-4">
                          <label for="" class="form-label text-dark">Post Office:</label>
                          <input type="text" class="form-control" id="">
                        </div>
                        <div class="col-md-4">
                          <label for="" class="form-label text-dark">Post Code:</label>
                          <input type="text" class="form-control" id="">
                        </div>
                        <div class="col-md-4">
                          <label for="" class="form-label text-dark">Upazilla:</label>
                          <input type="text" class="form-control" id="">
                        </div>
                        <div class="col-md-4">
                          <label for="" class="form-label text-dark">District:</label>
                          <input type="text" class="form-control" id="">
                        </div>
                        <div class="form-check">
                          
                        </div>

                   {{-- GUARDIAN'S INFORMATION --}}

                          <div class="main_from mt-3 ">
                            <h5 class="bg-info p-2 text-dark border-bottom border-3 border-drak rounded-bottom">GUARDIAN'S INFORMATION :</h5>
                          </div>
                          <div class="col-md-6">
                            <label for="" class="form-label text-dark">Guardian's Name :</label>
                            <input type="text" class="form-control" id="">
                          </div>
                          <div class="col-md-6">
                            <label for="" class="form-label text-dark">Guardian's Contact No:</label>
                            <input type="text" class="form-control" id="">
                          </div>
                          <div class="col-md-6">
                            <label for="" class="form-label text-dark">Guardian's Email:</label>
                            <input type="text" class="form-control" id="">
                          </div>
                          <div class="col-md-6">
                            <label for="" class="form-label text-dark">Relation With Student:</label>
                            <input type="text" class="form-control" id="">
                          </div>
                          <div class="main_from mt-3">
                            <h6 class="bg-dark text-light border-bottom border-3 border-warning rounded-bottom fs-5 p-2">Guardian's Address :</h6>
                          </div>
                          <div class="col-md-4">
                            <label for="" class="form-label text-dark">House No./Name:</label>
                            <input type="text" class="form-control" id="">
                          </div>
                          <div class="col-md-4">
                            <label for="" class="form-label text-dark">Village:</label>
                            <input type="text" class="form-control" id="">
                          </div>
                          <div class="col-md-4">
                            <label for="" class="form-label text-dark">Post Office:</label>
                            <input type="text" class="form-control" id="">
                          </div>
                          <div class="col-md-4">
                            <label for="" class="form-label text-dark">Post Code:</label>
                            <input type="text" class="form-control" id="">
                          </div>
                          <div class="col-md-4">
                            <label for="" class="form-label text-dark">Upazilla:</label>
                            <input type="text" class="form-control" id="">
                          </div>
                          <div class="col-md-4">
                            <label for="" class="form-label text-dark">District:</label>
                            <input type="text" class="form-control" id="">
                          </div>

                 {{-- ACADEMIC INFORMATION --}}

                          <div class="main_from mt-3 ">
                            <h5 class="bg-info p-2 text-dark border-bottom border-3 border-drak rounded-bottom">ACADEMIC INFORMATION :</h5>
                          </div>
                          <div class="col-md-4 mt-4">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-6 col-form-label text-dark">Admission Desire( Class) :</label>
                                <div class="col-sm-6">
                                  <select class="form-select" id="autoSizingSelect">
                                    <option selected>Choose...</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Others</option>
                                  </select>
                                </div>
                          </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-6 col-form-label text-dark">Admission Desire(Group) :</label>
                                <div class="col-sm-6">
                                  <select class="form-select" id="autoSizingSelect">
                                    <option selected>Choose...</option>
                                    <option value="1">Bangladeshi</option>
                                    
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label text-dark">Session :</label>
                                <div class="col-sm-8">
                                  <select class="form-select" id="autoSizingSelect">
                                    <option selected>Choose...</option>
                                    <option value="1">Bangladeshi</option>
                                    
                                  </select>
                                </div>
                            </div>
                        </div>

                          <div class="text-center mt-4 ">
                            <button type="button" class="btn btn-secondary border-0" onClick="window.location.reload();">@lang('common.close')</button>
                            <button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
                          </div>
          
                      </form>
                      
                </div>
				{{-- <h3>@lang('mpo_nationalization.addtitle')</h3><br>
				<form method="post" class="btn-submit" action="{{ route('mpo_nationalization.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="row myinput">
						
						<div class="form-group mb-3 col-md-6">
							<label>@lang('common.date'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="date" name="date" id="date"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('mpo_nationalization.subject'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="subject" id="subject"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('mpo_nationalization.subject_bn'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="subject_bn" id="subject_bn"  required="">
							</div>
						</div>	
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('mpo_nationalization.layer'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="layer" id="layer"  required="">
							</div>
						</div>	
                        <div class="form-group mb-3 col-md-6">
							<label>@lang('mpo_nationalization.layer_bn'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="layer_bn" id="layer_bn"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label>@lang('mpo_nationalization.memorial'): <span class="text-danger" style="font-size: 15px;">*</span></label>
							<div class="input-group mt-2">
								<input class="form-control" type="text" name="memorial_no" id="memorial_no"  required="">
							</div>
						</div>
						<div class="form-group mb-3 col-md-12">
							<label>@lang('admissioninfo.image'):</label>
							<div class="input-group mt-2">
								<input class="form-control" type="file" name="image" id="image">
							</div>
						</div>
						<div class="modal-footer border-0">
							<button type="button" class="btn btn-secondary border-0" onClick="window.location.reload();">@lang('common.close')</button>
							<button type="submit" class="btn btn-success button border-0">@lang('common.save')</button>
						</div>
					</div>
				</form> --}}
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>



<script src="{{ asset('assets/js/vendor/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/demo.quilljs.js') }}"></script>



@endsection

