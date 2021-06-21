@extends('admin::layout.app')

@section('css')
    <!--begin:: Global Optional Vendors -->
    <link href="{{asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/bootstrap-taginput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .bootstrap-tagsinput input{
            height: 40px;
        }
        .bootstrap-tagsinput .tag {
            color: #ff2424!important;
        }
    </style>
@endsection


@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-container kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    {{__('pages.prohibited_words.get')}}
                </h3>
            </div>
            <div class="kt-subheader__toolbar">
                <div class="kt-subheader__wrapper">
                    
                </div>
            </div>
        </div>
    </div>


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
                        {{__('pages.prohibited_words.all')}}
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
                    <form class="kt-form" action="{{ route('admin.prohibited_words.updateAll') }}" method="post"
                        accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="kt-portlet__body">
                            
                            <div class="form-group">
                                <label class="col-form-label col-lg-2 col-sm-12">{{__('pages.prohibited_words.columns.words')}}</label>
                                <input type="text" data-role="tagsinput" name="words" class="form-control" placeholder="{{ __('pages.prohibited_words.more') }}*" value="{{$data}}">
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">{{ __('base.submit') }}</button>
                                <button type="reset" class="btn btn-secondary">{{ __('base.cancel') }}</button>
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
    <!--begin:: Global Optional Vendors -->
    <script src="{{asset('assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/custom/js/vendors/sweetalert2.init.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}" type="text/javascript"></script>
    <!--end:: Global Optional Vendors -->


    <!--begin::Page Vendors(used by this page) -->
    
@endsection

@section('custom_scripts')
    @include('admin::CustomFiles.tag-input')
@endsection