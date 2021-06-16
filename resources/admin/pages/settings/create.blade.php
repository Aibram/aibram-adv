@extends('admin::layout.app')

@section('css')

    <!--begin:: Global Optional Vendors -->
    <link href="{{asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />
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
                        {{__('pages.settings.new')}}
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
                    <form class="kt-form" action="{{route('admin.settings.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="kt-portlet__body">
                            <div class="form-group">
                                <label class="col-form-label col-lg-4 col-sm-12">{{__('pages.settings.columns.key')}}</label>
                                <input type="text" class="form-control" value="" name="key" type="text">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-lg-4 col-sm-12">{{__('pages.settings.columns.key_explained')}}</label>
                                <input type="text" class="form-control" value="" name="key_explained" type="text">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-lg-4 col-sm-12">{{__('pages.settings.columns.default')}}</label>
                                <input type="text" class="form-control" value="" name="default" type="text">
                            </div>
                            <div class="form-group">
                                <label>{{__('pages.settings.columns.type')}}</label>
                                <select class="form-control kt-selectpicker" id="typeSelect"  name="type">
                                    @foreach(getInputTypes() as $type => $lang)
                                        <option value="{{$type}}">{{$lang}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="my-repeater" id="choicesSelect" style="display: none">
                                <div class="form-group row">
                                    <div data-repeater-list="choices" class="col-lg-9">
                                        <div data-repeater-item class="kt-margin-b-10 mb-4 row">
                                            <div class="col-md-4">
                                                <div class="kt-form__group--inline">
                                                    <div class="kt-form__control">
                                                        <input type="text" class="form-control"
                                                            placeholder="{{ __('pages.settings.columns.choice_name') }}"
                                                            name="name">
                                                    </div>
                                                </div>
                                                <div class="d-md-none kt-margin-b-10"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="kt-form__group--inline">
                                                    <div class="kt-form__control">
                                                        <input type="text" class="form-control"
                                                            placeholder="{{ __('pages.settings.columns.choice_value') }}"
                                                            name="value">
                                                    </div>
                                                </div>
                                                <div class="d-md-none kt-margin-b-10"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="javascript:;" data-repeater-delete=""
                                                    class="btn btn btn-danger log-btn btn-block">
                                                    حذف
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div data-repeater-create="" class="btn btn btn-warning log-btn btn-block">
                                            إضافة
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
    @include('admin::CustomFiles.form-repeater')

    <!--begin:: Global Optional Vendors -->
    <script src="{{asset('assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $('#typeSelect').on('change', function() {
            type = $('#typeSelect').val()
            if(type=="select" || type=="radio"){
                $('#choicesSelect').show()
            }
            else{
                $('#choicesSelect').hide()
            }
        })
    </script>
    <!--end:: Global Optional Vendors -->

@endsection

@section('custom_scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\SettingsCreate'); !!}
@endsection