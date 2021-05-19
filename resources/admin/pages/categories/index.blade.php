@extends('admin::layout.app')

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
    <link href="{{asset('assets/vendors/custom/jstree/jstree.bundle.css')}}" rel="stylesheet" type="text/css" />

@endsection


@section('content')


    <!-- end:: Content Head -->
    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->

        <div class="kt-portlet kt-portlet--mobile" id="portlet_card">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        @can('categories.create', 'admin')
                            <button type="button" id="btnCreate" class="btn btn-primary">{{__('pages.categories.main_new')}}</button>
                        @endcan
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
                    <div class="row">
                        <div class="col-6">
                            <div class="kt_tree" id="treeCard">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-primary mb-3" id="formCard">
                                <div class="card-header bg-primary text-white">الفئة</div>
                                <div class="card-body">
                                    <form id="frmEdit" class="form-horizontal">
                                        <input type="hidden" class="item-menu" name="parent_id" id="parent_id">
                                        <div class="form-group">
                                            <label for="name">الاسم</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control item-menu" name="name" id="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">التفاصيل </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control item-menu" name="desc" id="desc">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-lg-4 col-sm-12">{{__('pages.columns.status')}}</label>
                                            <select name="status" id="status" class="form-control item-menu">
                                                <option value="1">{{__('base.activated')}}</option>
                                                <option value="0">{{__('base.deactivated')}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-lg-4 col-sm-12">{{__('pages.columns.home')}}</label>
                                            <select name="home" id="home" class="form-control item-menu">
                                                <option value="1">{{__('base.activated')}}</option>
                                                <option value="0">{{__('base.deactivated')}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-lg-4 col-sm-12">{{__('pages.columns.main')}}</label>
                                            <select name="main" id="main" class="form-control item-menu">
                                                <option value="1">{{__('base.activated')}}</option>
                                                <option value="0">{{__('base.deactivated')}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="icon">الصورة الحالية</label>
                                            <img src="{{asset('placeholder.jpg')}}" class="item-menu" id="photo" width="100px" height="100px" />
                                        </div>
                                        <div class="form-group">
                                            <label for="photo">الصورة</label>
                                            <input name="image" class="item-menu" id="image" type="file">
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    @can('categories.edit', 'admin')
                                        <button type="button" id="btnUpdate" class="btn btn-primary"><i class="fas fa-sync-alt"></i>تعديل</button>
                                    @endcan
                                </div>
                            </div>
            
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
    <script src="{{asset('assets/vendors/general/summernote/dist/summernote.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-switch.init.js')}}" type="text/javascript"></script>
@endsection

@section('custom_scripts')
    @include('admin::CustomFiles.selectPicker')
    @include('admin::CustomFiles.tree-view')
@endsection
