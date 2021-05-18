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
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                    <h3 class="kt-portlet__head-title">
                        {{__('pages.admins.new')}}
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
                                        <input type="hidden" class="item-menu" name="admin_id" id="admin_id" value="{{Auth::guard('admin')->id()}}">
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
                                            <input data-switch="true" class="item-menu" type="checkbox" id="status" name="status" data-on-text="{{__('base.activated')}}" data-on-color="success" data-off-color="warning" data-off-text="{{__('base.deactivated')}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-lg-4 col-sm-12">{{__('pages.columns.home')}}</label>
                                            <input data-switch="true" class="item-menu" type="checkbox" id="home" name="home" data-on-text="{{__('base.activated')}}" data-on-color="success" data-off-color="warning" data-off-text="{{__('base.deactivated')}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label col-lg-4 col-sm-12">{{__('pages.columns.main')}}</label>
                                            <input data-switch="true" class="item-menu" type="checkbox" id="main" name="main" data-on-text="{{__('base.activated')}}" data-on-color="success" data-off-color="warning" data-off-text="{{__('base.deactivated')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="icon">الصورة الحالية</label>
                                            <img src="" class="item-menu" id="photo" width="100px" height="100px" />
                                        </div>
                                        <div class="form-group">
                                            <label for="photo">الصورة</label>
                                            <input name="image" class="item-menu" id="image" type="file">
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="btnUpdate" class="btn btn-primary"><i class="fas fa-sync-alt"></i>تعديل</button>
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
