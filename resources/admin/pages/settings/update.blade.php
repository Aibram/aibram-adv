@extends('admin::layout.app')

@section('css')

    <!--begin:: Global Optional Vendors -->
    <link href="{{ asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/vendors/custom/vendors/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/custom/vendors/flaticon2/flaticon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/general/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/general/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"
        type="text/css" />
    <link
        href="{{ asset('assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet') }}"
        type="text/css" />
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
                        {{ __('pages.settings.update') }}
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
                    <form class="kt-form" action="{{ route('admin.settings.update', $data->id) }}" method="post"
                        accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="kt-portlet__body">
                            <div class="form-group">
                                <label
                                    class="col-form-label col-lg-4 col-sm-12">{{ __('pages.settings.columns.key_explained') }}</label>
                                {{ $data->key_explained }}
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-lg-4 col-sm-12">{{__('pages.settings.columns.default')}}</label>
                                <input type="text" class="form-control" value="{{$data->default}}" name="default" type="text">
                            </div>
                            <div class="form-group">
                                <label>{{ __('pages.settings.columns.value') }}</label>
                                @if ($data->type == 'select')
                                    <select class="form-control kt-selectpicker" name="value[]" multiple="multiple">
                                        @foreach ($data->choices as $choice)
                                            <option value="{{ $choice['value'] }}" @if(in_array($choice['value'],$data->value)) selected @endif>{{ $choice['value'] }}</option>
                                        @endforeach
                                    </select>
                                @elseif($data->type=="radio")
                                    <div class="kt-radio-inline">
                                        @foreach ($data->choices as $choice)
                                            <label class="kt-radio">
                                                <input type="radio" name="value" @if ($data->value == $choice['value']) checked="checked" @endif
                                                    value="{{ $choice['value'] }}"> {{ $choice['name'] }}
                                                <span></span>
                                            </label>
                                        @endforeach

                                    </div>
                                @elseif($data->type=="checkbox")
                                    <input data-switch="true" type="checkbox" name="value" @if ($data->value == 1) checked @endif
                                        data-on-text="{{ __('base.activated') }}" data-on-color="success"
                                        data-off-color="warning" data-off-text="{{ __('base.deactivated') }}">
                                @elseif($data->type=="textarea")
                                    <textarea class="form-control" name="value" rows="3">{{ $data->value }}</textarea>
                                @else
                                    <input type="text" class="form-control" value="{{ $data->value }}" name="value"
                                        type="text">

                                @endif
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
    <script src="{{ asset('assets/vendors/general/dompurify/dist/purify.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/general/summernote/dist/summernote.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/general/bootstrap-fileinput/bootstrap-fileinput.js') }}"
        type="text/javascript">
    </script>
    <!--end:: Global Optional Vendors -->
@endsection

@section('custom_scripts')

    {!! JsValidator::formRequest('App\Http\Requests\Admin\SettingsUpdate') !!}
    @include('admin::CustomFiles.selectPicker')

@endsection
