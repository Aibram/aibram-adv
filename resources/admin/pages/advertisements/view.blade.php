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
                        {{__('pages.advertisements.view')}}
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
                            <label class="col-lg-2">{{__('pages.advertisements.columns.title')}}</label>
                            {{$data->title}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.advertisements.columns.user')}}</label>
                            {{$data->user->name}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.advertisements.columns.category_id')}}</label>
                            {{$data->category_name}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.advertisements.columns.subcategory_id')}}</label>
                            {{$data->category->name}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.advertisements.columns.city_id')}}</label>
                            {{$data->city_name}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.advertisements.columns.region')}}</label>
                            {{$data->region}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.advertisements.columns.price')}}</label>
                            {{$data->price}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.advertisements.columns.mobile')}}</label>
                            {{$data->ad_mobile}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.advertisements.columns.desc')}}</label>
                            {{$data->desc}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.advertisements.columns.properties')}}</label>
                            @foreach ($data->properties as $item)
                                <div class="col-5">
                                    {{$item->property}}
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.advertisements.columns.tags')}}</label>
                            {{$data->allTagsList()}}
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2">{{__('pages.categories.columns.photo')}}</label>
                            <img src="{{$data->photo}}" class="item-menu" id="photo" width="100px" height="100px" />
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.advertisements.columns.photos')}}</label>
                            <div class="col-lg-10 row">
                                @forelse ($data->secondary_photos as $photo)
                                    <img src="{{$photo}}" class="item-menu col-lg-3 mb-3" id="photo" width="100px" height="100px" />                                
                                @empty
                                    {{__('pages.advertisements.no_photos')}}
                                @endforelse
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <table id="properties-datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{__('pages.advertisements.properties')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table id="statuses-datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{__('pages.advertisements.statuses')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    @include('admin::CustomFiles.form-repeater')
<!--begin:: Global Optional Vendors -->
    <script src="{{asset('assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>
    <!--end:: Global Optional Vendors -->

@endsection

@section('custom_scripts')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
    $(function () {
        var table = $('#properties-datatable').DataTable({
            processing: true,
            serverSide: true,
            "dom": 'rtip',
            ajax: "{{ route('admin.advertisements.getAdProperties',['id'=>$data->id]) }}",
            columns: [
                {data: 'property', name: "property"},
            ]
        });
        var table = $('#statuses-datatable').DataTable({
            processing: true,
            serverSide: true,
            "dom": 'rtip',
            ajax: "{{ route('admin.advertisements.getAdStatuses',['id'=>$data->id]) }}",
            columns: [
                {data: 'status', name: "status"},
            ]
        });
    });
    </script>
    @include('admin::CustomFiles.selectPicker')

@endsection