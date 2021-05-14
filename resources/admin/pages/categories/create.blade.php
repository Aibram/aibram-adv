@extends('admin.layout.app')

@section('css')

    <!--begin:: Global Optional Vendors -->
    <link href="{{asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/summernote/dist/summernote.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />

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
                        إنشاء فئة جديدة
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
                    <form class="kt-form" action="{{route('admin.categories.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="kt-portlet__body">
                            <div class="form-group">
                                <label for="name">اسم الفئة</label>
                                <div class="input-group">
                                    <input type="text" class="form-control item-menu" name="name" id="name" placeholder="الإسم">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="type">النوع</label>
                                <select name="type" id="type" class="form-control item-menu">
                                    <option value="store">حراج</option>
                                    <option value="delegation">نقل</option>
                                </select>
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
                                <label class="control-label col-md-3">الصورة
                                </label>
                                <div class="col-md-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="height: 150px;">
                                            <img
                                                src="{{asset('https://via.placeholder.com/500.png')}}"
                                                alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                             style="max-height: 150px;"></div>
                                        <div>
                            <span class="btn default btn-file">
                                <span class="btn btn-primary fileinput-new">اختر الصورة</span>
                                <span class="btn btn-dark fileinput-exists"> عدل </span>
                                <input type="file" name="photo" accept="image/*">
                            </span>
                                            <a href="javascript:;" class="btn btn-danger default fileinput-exists"
                                               data-dismiss="fileinput">
                                                احذف </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="parent_id" value="0">
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">تأكيد</button>
                                <button type="reset" class="btn btn-secondary">إلغاء</button>
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
    {!! JsValidator::formRequest('App\Http\Requests\Backend\CategoryCreate'); !!}

    <!--begin:: Global Optional Vendors -->
    <script src="{{asset('assets/vendors/general/jquery-form/dist/jquery.form.min.js')}}'" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/block-ui/jquery.blockUI.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/summernote/dist/summernote.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-switch.init.js')}}" type="text/javascript"></script>
    @include('admin.CustomFiles.summernote_switch')

    <!--end:: Global Optional Vendors -->

@endsection

