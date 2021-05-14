@extends('admin::layout.app')

@section('css')

    <!--begin:: Global Optional Vendors -->
    <link href="{{asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/summernote/dist/summernote.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet')}}" type="text/css" />
    <style>
        .filter-option{
            text-align:right!important
        }
    </style>
@endsection


@section('content')


    <!-- end:: Content Head -->
    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->

        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                    <h3 class="kt-portlet__head-title">
                        {{__('pages.users.new')}}
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <div class="dropdown dropdown-inline">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-grid__item ">

                    <!--begin: Form Wizard Form-->
                    <form class="kt-form" action="{{route('admin.users.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>{{__('pages.users.columns.username')}}</label>
                                    <input name="username" type="text" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <label>{{__('pages.users.columns.mobile')}}</label>
                                    <input name="mobile" type="phone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>{{__('pages.users.columns.city_country_name')}}</label>
                                    <select class="form-control kt-selectpicker" data-live-search="true" name="city_id">
                                        @foreach(allCountries() as $country)
                                            <optgroup label="{{$country->name}}">
                                                @foreach($country->city()->active(1)->get() as $city)
                                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>{{__('pages.users.columns.gender')}}</label>
                                    <select class="form-control kt-selectpicker" name="gender">
                                        @foreach(getGenderTypes() as $value => $gender)
                                            <option value="{{$value}}">{{$gender}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>{{__('pages.users.columns.age')}}</label>
                                    <input id="kt_touchspin_2_validate" type="text" class="form-control" value="" name="age" type="text">
                                </div>
    
                                <div class="col-lg-6">
                                    <label>{{__('pages.users.columns.password')}}</label>
                                    <input name="password" type="password"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-lg-4 col-sm-12">{{__('pages.columns.status')}}</label>
                                <input data-switch="true" type="checkbox" name="status" checked data-on-text="{{__('base.activated')}}" data-on-color="success" data-off-color="warning" data-off-text="{{__('base.deactivated')}}">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-lg-4 col-sm-12">{{__('pages.users.columns.activated')}}</label>
                                <input data-switch="true" type="checkbox" name="activated" checked data-on-text="{{__('base.activated')}}" data-on-color="success" data-off-color="warning" data-off-text="{{__('base.deactivated')}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{__('pages.users.columns.photo')}}
                                </label>
                                <div class="col-md-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="height: 150px;">
                                            <img
                                                src="{{asset('https://via.placeholder.com/500.png')}}"
                                                alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                             style="max-height: 150px;"></div>
                                        <div>
                                        <span class="btn default btn-file">
                                            <span class="btn btn-primary fileinput-new">{{__('pages.users.choose_photo')}}</span>
                                            <span class="btn btn-dark fileinput-exists"> {{__('pages.users.update_photo')}} </span>
                                            <input type="file" name="photo" accept="image/*">
                                        </span>
                                        <a href="javascript:;" class="btn btn-danger default fileinput-exists"
                                            data-dismiss="fileinput">
                                            {{__('pages.users.remove_photo')}} </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">{{__('base.submit')}}</button>
                                <button type="reset" class="btn btn-secondary">{{__('base.cancel')}}</button>
                            </div>
                        </div>
                    </form>
                    <!--end: Form Wizard Form-->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\UserCreate'); !!}

    <!--begin:: Global Optional Vendors -->
    <script src="{{asset('assets/vendors/general/jquery-form/dist/jquery.form.min.js')}}'" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/block-ui/jquery.blockUI.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/summernote/dist/summernote.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-switch.init.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
    <script>
        $('#kt_touchspin_2_validate').TouchSpin({
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',
            min: 16,
            max: 100,
            step: 1,
            boostat: 5,
            maxboostedstep: 10,
        });
        var KTBootstrapSelect = function () {
    
        // Private functions
        var demos = function () {
            // minimum setup
            $('.kt-selectpicker').selectpicker(
                {
                    noneSelectedText: '{{ __('base.none') }}'

                }
            );
        }

        return {
            // public functions
            init: function() {
                demos(); 
            }
        };
        }();

        jQuery(document).ready(function() {
            KTBootstrapSelect.init();
        });
    </script>
    @include('admin::CustomFiles.summernote_switch')

    <!--end:: Global Optional Vendors -->

@endsection

