@extends('admin.layout.app')

@section('css')

    <!--begin:: Global Optional Vendors -->
    <link href="{{asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />

@endsection


@section('content')

    @php
        $first = request()->segment(1);
        $all = $first=="admin" ? request()->root():request()->root().$first."/storage";
    @endphp
    <!-- end:: Content Head -->
    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                المعلومات الاساسية
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <!--begin::Section-->
                        <div class="kt-section">
                            <div class="kt-section__content">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                    <tr>
                                        <th scope="row">الإسم</th>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">الإسم الأخير</th>
                                        <td>{{$user->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">البريد الإلكترونى</th>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">الهاتف</th>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">العنوان</th>
                                        <td>{{$user->address}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">الحظر</th>
                                        <td>{{$user->blocked?"محظور":"غير محظور"}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">عدد عروض النقل</th>
                                        <td>{{count($user->delegations)}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">عدد الإعلانات</th>
                                        <td>{{count($user->ownedAds)}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">موعد الإنشاء</th>
                                        <td>{{$user->created_at}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!--end::Section-->
                    </div>

                    <!--end::Form-->
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                الصورة
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <img src="{{$all."/".$user->photo}}" id="icon" width="100px" height="100px" />
                    <!--end::Section-->
                    </div>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!--begin:: Global Optional Vendors -->
    <script src="{{asset('assets/vendors/general/block-ui/jquery.blockUI.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-switch.init.js')}}" type="text/javascript"></script>

    <!--end:: Global Optional Vendors -->

@endsection

