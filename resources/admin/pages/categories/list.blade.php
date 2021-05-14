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


    <!-- end:: Content Head -->
    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="float-left">الفئة الرئيسية</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">الإسم: {{$category->name}}</li>
                            <li class="list-group-item">فى الصفحة الرئيسية: {{$category->home?"متاح":"غير متاح"}}</li>
                            <li class="list-group-item">مفعل: {{$category->active? "متاح":"غير متاح"}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header"><h5 class="float-left">القائمة</h5>
                        <div class="float-right">
                            <form id="myForm" action="{{route('admin.categories.doStructure')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$category->id}}">
                                <input type="hidden" name="structure" id="structure" value="">
                                <button id="saveStructure" type="button" class="btn btn-success">حفظ</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul id="myEditor" class="sortableLists list-group">
                        </ul>
                    </div>
                </div>
{{--                <p>Click the Output button to execute the function <code>getString();</code></p>--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">JSON Output--}}
{{--                        <div class="float-right">--}}
{{--                            <button id="btnOutput" type="button" class="btn btn-success"><i class="fas fa-check-square"></i> Output</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="form-group"><textarea id="out" class="form-control" cols="50" rows="10"></textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="col-md-6">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-primary text-white">تعديل الفئة</div>
                    <div class="card-body">
                        <form id="frmEdit" class="form-horizontal">
                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <div class="input-group">
                                    <input type="text" class="form-control item-menu" name="name" id="name" placeholder="الإسم">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="active">متاح</label>
                                <select name="active" id="active" class="form-control item-menu">
                                    <option value="1">نعم</option>
                                    <option value="0">لا</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="home">صفحة رئيسية</label>
                                <select name="home" id="home" class="form-control item-menu">
                                    <option value="1">نعم</option>
                                    <option value="0">لا</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type">النوع</label>
                                <div class="form-control">
                                    {{$category->type=='store'?'نقل':'حراج'}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="icon">الصورة الحالية</label>
                                <img src="" id="icon" width="100px" height="100px" />
                            </div>
                            <div class="form-group">
                                <label for="photo">الصورة</label>
                                <input name="photo" id="photo" type="file">
                            </div>
                            <input type="hidden" class="item-menu" value="{{$category->type}}" id="type" name="type">
                            <input type="hidden" class="item-menu" value="{{$category->id}}" id="parent_id" name="parent_id">
                            @php
                                $first = request()->segment(1);
                                $all = $first=="admin" ? request()->root():request()->root().$first;
                            @endphp
                            <input type="hidden" value="{{$all.'/'}}" id="url" name="url">
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fas fa-sync-alt"></i>تعديل</button>
                        <button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> إضافة</button>
                    </div>
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
    @include('admin.CustomFiles.menu-list')

    <!--end:: Global Optional Vendors -->

@endsection

