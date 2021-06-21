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
                            <label class="col-lg-2">{{__('pages.users.columns.ext')}}</label>
                            {{$data->ext}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.users.columns.mobile')}}</label>
                            {{$data->mobile}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.users.columns.name')}}</label>
                            {{$data->name}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.users.columns.country')}}</label>
                            {{$data->country->name}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.users.columns.city')}}</label>
                            {{$data->city->name}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.users.columns.no_ads')}}</label>
                            {{$data->no_ads}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.users.columns.no_chats')}}</label>
                            {{$data->no_chats}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.users.columns.no_ratings')}}</label>
                            {{$data->no_ratings}}
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">{{__('pages.users.columns.no_favorites')}}</label>
                            {{$data->no_favorites}}
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2">{{__('pages.categories.columns.photo')}}</label>
                            <img src="{{$data->photo}}" class="item-menu" id="photo" width="100px" height="100px" />
                        </div>
                        <div class="form-group row">
                            <h4 class="col-lg-12 kt-link kt-link--state kt-link--success">{{__('pages.users.favorites.all')}}</h4>
                            <div class="col-lg-12">
                                <table id="favorite-datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{__('pages.users.favorites.ad')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <h4 class="col-lg-12 kt-link kt-link--state kt-link--success">{{__('pages.users.ratings.all')}}</h4>
                            <div class="col-lg-12">
                                <table id="user-rating-datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{__('pages.users.ratings.user_id')}}</th>
                                            <th>{{__('pages.users.ratings.stars')}}</th>
                                            <th>{{__('pages.users.ratings.comment')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <h4 class="col-lg-12 kt-link kt-link--state kt-link--success">{{__('pages.users.my_ratings.all')}}</h4>
                            <div class="col-lg-12">
                                <table id="given-rating-datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{__('pages.users.my_ratings.user_id')}}</th>
                                            <th>{{__('pages.users.my_ratings.stars')}}</th>
                                            <th>{{__('pages.users.my_ratings.comment')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <h4 class="col-lg-12 kt-link kt-link--state kt-link--success">{{__('pages.users.advertisements.all')}}</h4>
                            <div class="col-lg-12">
                                <table id="advertisement-datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{__('pages.users.advertisements.id')}}</th>
                                            <th>{{__('pages.users.advertisements.title')}}</th>
                                            <th>{{__('pages.users.advertisements.category_id')}}</th>
                                            <th>{{__('pages.users.advertisements.city_id')}}</th>
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
        var basicOptions = {
            processing: true,
            serverSide: true,
            dom: 'rtip',
        }
        var table = $('#favorite-datatable').DataTable({
            ...basicOptions,
            ajax: "{{ route('admin.users.getFavorites',['id'=>$data->id]) }}",
            columns: [
                {data: 'advertisement_id', name: "advertisement_id"},
            ]
        });
        var table = $('#user-rating-datatable').DataTable({
            ...basicOptions,
            ajax: "{{ route('admin.users.getUserRatings',['id'=>$data->id]) }}",
            columns: [
                {data: 'rated_user_id', name: "rated_user_id"},
                {data: 'stars', name: "stars"},
                {data: 'comment', name: "comment"},
            ]
        });
        var table = $('#given-rating-datatable').DataTable({
            ...basicOptions,
            ajax: "{{ route('admin.users.getGivenRatings',['id'=>$data->id]) }}",
            columns: [
                {data: 'user_id', name: "user_id"},
                {data: 'stars', name: "stars"},
                {data: 'comment', name: "comment"},
            ]
        });
        var table = $('#advertisement-datatable').DataTable({
            ...basicOptions,
            ajax: "{{ route('admin.users.getAdvertisements',['id'=>$data->id]) }}",
            columns: [
                {data: 'id', name: "id"},
                {data: 'title', name: "title"},
                {data: 'category_name', name: "category_name"},
                {data: 'city_name', name: "city_name"},
            ]
        });
    });
    </script>
    @include('admin::CustomFiles.selectPicker')

@endsection