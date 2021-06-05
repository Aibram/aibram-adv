@extends('admin::layout.app')

@section('css')

    <!--begin:: Global Optional Vendors -->
    <link href="{{asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />

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
                        {{__('pages.contactus.view')}}
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
                    <div class="kt-portlet__body">
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.contactus.columns.name')}}</label>
                            {{$data->name}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.contactus.columns.mobile')}}</label>
                            {{$data->mobile}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.contactus.columns.subject')}}</label>
                            {{$data->subject}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.contactus.columns.message')}}</label>
                            {{$data->message}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.contactus.columns.contacted')}}</label>
                            {{getContactUsStatuses()[$data->contacted]['text']}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.contactus.columns.contacted_at')}}</label>
                            {{$data->contacted_at ? $data->contacted_at->diffForHumans(): __('base.not_contacted')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <!--begin:: Global Optional Vendors -->
    <script src="{{asset('assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>
    <!--end:: Global Optional Vendors -->

@endsection

@section('custom_scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\AdvertisementUpdate'); !!}
@endsection