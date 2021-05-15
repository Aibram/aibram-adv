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
    <style>
        .kt-widget__stats{
            place-content: space-evenly;
        }
    </style>
@endsection


@section('content')


    <!-- end:: Content Head -->
    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->
        <div class="row">
            <div class="col-xl-4">
                <form class="kt-form kt-form--label-right">
                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    {{__('pages.dashboard.result_filter')}}
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
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>{{__('pages.dashboard.date_from')}}</label>
                                    <input type="date" class="form-control" name="from_date" @if(isset($_GET['from_date'])) value="{{$_GET['from_date']}}" @endif>
                                </div>
                                <div class="col-lg-6">
                                    <label class="">{{__('pages.dashboard.date_to')}}</label>
                                    <input type="date" class="form-control" name="to_date" @if(isset($_GET['to_date'])) value="{{$_GET['to_date']}}" @endif>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary">{{__('base.search')}}</button>
                                        <button type="reset" class="btn btn-secondary">{{__('base.clear_filter')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-4">

                <!--Begin::Portlet-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head kt-portlet__head--noborder">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{__('pages.dashboard.breif_info')}}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <!--begin::Widget -->
                        <div class="kt-widget kt-widget--user-profile-2">
                            <div class="kt-widget__body">
                                
                                <div class="kt-widget__content">
                                    <div class="kt-widget__stats kt-margin-r-20">
                                        <div class="kt-widget__icon">
                                            <i class="flaticon-users"></i>
                                        </div>
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__title">{{__('pages.dashboard.users_count')}}</span>
                                            <span class="kt-widget__value">{{$usersCount}}</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__stats  kt-margin-r-20">
                                        <div class="kt-widget__icon">
                                            <i class="flaticon-map"></i>
                                        </div>
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__title">{{__('pages.dashboard.categories_count')}}</span>
                                            <span class="kt-widget__value">{{$categoriesCount}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-widget kt-widget--user-profile-2">
                            <div class="kt-widget__body">
                                
                                <div class="kt-widget__content">
                                    <div class="kt-widget__stats kt-margin-r-20">
                                        <div class="kt-widget__icon">
                                            <i class="flaticon-home-2"></i>
                                        </div>
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__title">{{__('pages.dashboard.cities_count')}}</span>
                                            <span class="kt-widget__value">{{$citiesCount}}</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__stats  kt-margin-r-20">
                                        <div class="kt-widget__icon">
                                            <i class="flaticon2-notepad"></i>
                                        </div>
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__title">{{__('pages.dashboard.ads_count')}}</span>
                                            <span class="kt-widget__value">{{$adsCount}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--End::Portlet-->
            </div>
        </div>
        

    </div>

@endsection

@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\AdminUpdate'); !!}

    <!--begin:: Global Optional Vendors -->
    <script src="{{asset('assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-switch.init.js')}}" type="text/javascript"></script>
    

    <!--end:: Global Optional Vendors -->

@endsection

@section('custom_scripts')

@endsection