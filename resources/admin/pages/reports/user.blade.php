@extends('admin::layout.app')

@section('css')
    <!--begin:: Global Optional Vendors -->
    <link href="{{asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />

@endsection


@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-container kt-container--fluid ">
            
        </div>
    </div>


    <!-- end:: Content Head -->
    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        {{__('pages.reports.user.get')}}
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
                <form class="kt-form kt-form--label-right" id="filterForm">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label>{{__('pages.reports.ad.name')}}</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="col-lg-6">
                            <label class="">{{__('pages.reports.ad.city')}}</label>
                            <select class="form-control" name="city_id">
                                <option value="" selected>{{ __('frontend.ad_create.choose_city') }}</option>
                                @foreach (getCitiesOfYemen() as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <label>{{__('pages.reports.ad.category')}}</label>
                            <select class="form-control" name="category_id">
                                <option value="" selected>{{ __('frontend.ad_create.category') }}</option>
                                @include('parts.categories.categories-option-input',['categories'=>categoriesFilter(),'level'=>1,'value' => null,'key' => 'category_hierarchy_ids'])
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label class="">{{__('pages.reports.ad.user')}}</label>
                            <select class="form-control" name="user_id">
                                <option value="" selected>{{ __('frontend.ad_create.user') }}</option>
                                @foreach (getActiveUsers() as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <label class="">{{__('pages.reports.ad.price_from')}}</label>
                            <input type="number" class="form-control" name="price_from">
                        </div>
                        <div class="col-lg-6">
                            <label class="">{{__('pages.reports.ad.price_to')}}</label>
                            <input type="number" class="form-control" name="price_to">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <label>{{__('pages.reports.ad.date_from')}}</label>
                            <input type="date" class="form-control" name="from_date">
                        </div>
                        <div class="col-lg-6">
                            <label class="">{{__('pages.reports.ad.date_to')}}</label>
                            <input type="date" class="form-control" name="to_date">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary">{{__('base.search')}}</button>
                        </div>
                        <div class="col-lg-6">
                            <button type="reset" class="btn btn-secondary">{{__('base.clear_filter')}}</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{__('pages.reports.ad.get')}}
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
                {!! $dataTable->table(['class' => 'table table-bordered']) !!}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!--begin:: Global Optional Vendors -->
    <script src="{{asset('assets/vendors/general/block-ui/jquery.blockUI.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/custom/js/vendors/sweetalert2.init.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}" type="text/javascript"></script>
    <!--end:: Global Optional Vendors -->


    <!--begin::Page Vendors(used by this page) -->
    
@endsection

@section('custom_scripts')
    {!! $dataTable->scripts() !!}
    <script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('vendor/datatables/buttons.server-side.js')}}"></script>
    <script>
        $("form").submit(function (event) {
            console.log("form");
            $('#advertisementsdatatable-table').DataTable().draw(true);
            event.preventDefault();
        });
    </script>
@endsection
