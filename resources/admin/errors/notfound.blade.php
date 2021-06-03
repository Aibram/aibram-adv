@extends('admin::layout.app')

@section('css')

    <!--begin:: Global Optional Vendors -->
    <link href="{{asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/demo1/pages/error/error-1.rtl.css')}}" rel="stylesheet" type="text/css">
    <style>
        .kt-error-v1 .kt-error-v1__container .kt-error-v1__number {
            margin-top: 4rem!important;
        }
    </style>
@endsection


@section('content')


    <!-- end:: Content Head -->
    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->

        <div class="kt-portlet kt-portlet--mobile" id="portlet_card">
            <div class="kt-portlet__body">
                <div class="kt-grid__item  kt-error-v1">
                    <div class="kt-error-v1__container text-center">
                        <h1 class="kt-error-v1__number">404</h1>
                        <p class="kt-error-v1__desc">
                            {{__('base.not_found.went_wrong')}}
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <!--begin:: Global Optional Vendors -->
    <script src="{{asset('assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/summernote/dist/summernote.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-switch.init.js')}}" type="text/javascript"></script>
@endsection

@section('custom_scripts')
    @include('admin::CustomFiles.selectPicker')
    @include('admin::CustomFiles.tree-view')
@endsection
