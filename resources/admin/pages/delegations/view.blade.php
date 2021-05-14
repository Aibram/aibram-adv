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
        $offers = $delegation->delegatorsOffers;
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
                                        <th scope="row">العنوان</th>
                                        <td>{{$delegation->title}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">الطالب</th>
                                        <td>
                                            <a href="{{route('admin.users.show',$delegation->user->id)}}">{{$delegation->user->name}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">الوصف</th>
                                        <td>{{$delegation->description}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">العنوان من</th>
                                        <td>{{$delegation->from_address}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">العنوان إلى</th>
                                        <td>{{$delegation->to_address}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">موعد النقل</th>
                                        <td>{{$delegation->delegation_appointment}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">ملاحظات</th>
                                        <td>{{$delegation->notes}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">عدد العروض</th>
                                        <td>{{count($offers)}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">الهاتف</th>
                                        <td>{{$delegation->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">الإسم</th>
                                        <td>{{$delegation->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">عدد البضائع</th>
                                        <td>{{$delegation->to_address}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">العنوان إلى</th>
                                        <td>{{$delegation->to_address}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">الحالة</th>
                                        <td>{{$delegation->status}}</td>
                                    </tr>
                                    @if($delegation->status=="deleted")
                                    <tr>
                                        <th scope="row">سبب الحذف</th>
                                        <td>{{$delegation->cancellation_remark}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th scope="row">الفئة</th>
                                        <td>
                                            <a href="{{route('admin.categories.show',$delegation->category->id)}}">{{$delegation->category->name}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">موعد الإنشاء</th>
                                        <td>{{$delegation->created_at}}</td>
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
                                الصور
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: row">
                        @foreach($delegation->photos as $photo)
                            <img src="{{$all."/".$photo}}" id="icon" width="100px" height="100px" />
                        @endforeach
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
                                حالات النقل
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <!--begin::Section-->
                        <div class="kt-section">
                            <div class="kt-section__content">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>الحالة</th>
                                        <th>موعد تغيير الحالة</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($delegation->statuses as $status)
                                        <tr>
                                            <th scope="row">{{$status->status}}</th>
                                            <td>{{$status->created_at}}</td>
                                        </tr>
                                    @endforeach
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

        @if(count($offers)>0)
            <div class="row">
            <div class="col-md-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                عروض المناديب
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <!--begin::Section-->
                        <div class="kt-section">
                            <div class="kt-section__content">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>المندوب</th>
                                        <th>المبلغ</th>
                                        <th>ملاحظات</th>
                                        <th>مختار من الطالب</th>
                                        <th>تاريخ إضافة العرض</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($offers as $offer)
                                        <tr>
                                            <th scope="row">
                                                <a href="{{route('admin.delegators.edit',$offer->id)}}">{{$offer->name}}</a>
                                            </th>
                                            <td>{{$offer->pivot->price}}</td>
                                            <td>{{$offer->pivot->notes}}</td>
                                            <td>{{$offer->pivot->accepted?"مختار":"غير مختار"}}</td>
                                            <td>{{$offer->pivot->created_at}}</td>
                                        </tr>
                                    @endforeach
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
        @endif

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

