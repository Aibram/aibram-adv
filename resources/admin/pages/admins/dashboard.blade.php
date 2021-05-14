@extends('admin::layout.app')

@section('css')
    <!--begin:: Global Optional Vendors -->
    <link href="./assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
    <link href="./assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
    <link href="./assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
    <link href="./assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="./assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="./assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
@endsection


@section('content')


    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{__('pages.dashboard.result_filter')}}
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form kt-form--label-right">
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
                    </form>

                    <!--end::Form-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__body">
                        <div class="kt-widget kt-widget--user-profile-2">
                            <div class="kt-widget__body">
                                <div class="kt-widget__section">
                                    {{__('pages.dashboard.breif_info')}}
                                </div>
                                <div class="kt-widget__content">
                                    <div class="kt-widget__stats kt-margin-r-30">
                                        <div class="kt-widget__icon">
                                            <i class="flaticon-avatar"></i>
                                        </div>
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__title">{{__('pages.dashboard.users_count')}}</span>
                                            <span class="kt-widget__value">{{$userCount}}</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__stats  kt-margin-r-30">
                                        <div class="kt-widget__icon">
                                            <i class="flaticon-users"></i>
                                        </div>
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__title">{{__('pages.dashboard.categories_count')}}</span>
                                            <span class="kt-widget__value">{{$delegatorCount}}</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__stats  kt-margin-r-30">
                                        <div class="kt-widget__icon">
                                            <i class="flaticon2-rectangular"></i>
                                        </div>
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__title">{{__('pages.dashboard.cities_count')}}</span>
                                            <span class="kt-widget__value">{{$delegationCount}}</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__stats  kt-margin-r-30">
                                        <div class="kt-widget__icon">
                                            <i class="flaticon2-file-1"></i>
                                        </div>
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__title">{{__('pages.dashboard.ads_count')}}</span>
                                            <span class="kt-widget__value">{{$adCount}}</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--End::Row-->

        <!--End::Dashboard 1-->
    </div>

@endsection

@section('scripts')
    <!--begin:: Global Optional Vendors -->
    <script src="./assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
    <script src="./assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
    <script src="./assets/vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
    <script src="./assets/vendors/custom/js/vendors/bootstrap-markdown.init.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/custom/js/vendors/bootstrap-notify.init.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
    <script src="./assets/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
    <script src="./assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
    <script src="./assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>

    <!--end:: Global Optional Vendors -->

    <!--begin::Page Vendors(used by this page) -->
    <script src="./assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
    <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
    <script src="./assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>

    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="./assets/js/demo1/pages/dashboard.js" type="text/javascript"></script>
    <!--end::Page Scripts -->
@endsection

