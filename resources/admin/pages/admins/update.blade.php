@extends('admin::layout.app')

@section('css')

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
                        {{__('pages.admins.update')}}
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
                    <form class="kt-form" action="{{route('admin.admins.update',$data->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <!--begin: Form Actions -->
                        @csrf
                        @method('put')
                        <div class="kt-portlet__body">
                            <div class="form-group">
                                <label>{{__('pages.admins.columns.first_name')}}</label>
                                <input name="first_name" class="form-control" aria-describedby="emailHelp" placeholder="{{__('pages.admins.columns.first_name')}}"  value="{{$data->first_name}}">
                            </div>
                            <div class="form-group">
                                <label>{{__('pages.admins.columns.last_name')}}</label>
                                <input name="last_name" class="form-control" aria-describedby="emailHelp" placeholder="{{__('pages.admins.columns.last_name')}}" value="{{$data->last_name}}">
                            </div>
                            <div class="form-group">
                                <label>{{__('pages.admins.columns.email')}}</label>
                                <input name="email"  class="form-control" aria-describedby="emailHelp" placeholder="{{__('pages.admins.columns.email')}}" value="{{$data->email}}">
                            </div>
                            <div class="form-group">
                                <label>{{__('pages.admins.columns.username')}}</label>
                                <input name="username" class="form-control" aria-describedby="emailHelp" placeholder="{{__('pages.admins.columns.username')}}" value="{{$data->username}}">
                            </div>
                            <div class="form-group">
                                <label>{{__('pages.columns.password')}}</label>
                                <input name="password" type="password"  class="form-control" aria-describedby="emailHelp" placeholder=" {{__('pages.columns.password')}}">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-lg-4 col-sm-12">{{__('pages.columns.status')}}</label>
                                <input data-switch="true" type="checkbox" name="status" data-on-text="{{__('base.activated')}}" @if($data->status==1) checked @endif data-on-color="success" data-off-color="warning" data-off-text="{{__('base.deactivated')}}">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-lg-4 col-sm-12">{{__('pages.superadmin')}}</label>
                                <input data-switch="true" type="checkbox" name="super" @if($super) checked @endif data-on-text="{{__('base.activated')}}" data-on-color="success" data-off-color="warning" data-off-text="{{__('base.deactivated')}}">
                                <h6 class="kt-font-sucess">{{__('pages.superadminDesc')}}</h6>
                            </div>
                            <h2 class="kt-font-sucess">{{__('pages.permissions')}}</h2>
                            @foreach(getPermissions() as $permissionItem)
                                <div class="form-group">
                                    <label>{{__('base.'.$permissionItem['name'])}}</label>
                                    <div class="kt-checkbox-inline">
                                        @foreach($permissionItem['children'] as $child)
                                            <label class="kt-checkbox kt-checkbox--success">
                                                <input type="checkbox" name="permissions[{{$permissionItem['name'].'.'.$child}}]" @if($data->hasPermissionTo($permissionItem['name'].'.'.$child,'admin')) checked @endif> {{__('base.'.$child).' '.__('base.'.$permissionItem['name'])}}
                                                <span></span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">{{__('base.submit')}}</button>
                                <button type="reset" class="btn btn-secondary">{{__('base.cancel')}}</button>
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
    <script src="{{asset('assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-switch.init.js')}}" type="text/javascript"></script>
    @include('admin::CustomFiles.summernote_switch')
    <!--end:: Global Optional Vendors -->
@endsection

@section('custom_scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\AdminUpdate'); !!}
@endsection
