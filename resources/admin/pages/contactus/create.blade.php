@extends('admin::layout.app')

@section('css')

    <!--begin:: Global Optional Vendors -->
    <link href="{{asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/bootstrap-taginput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />

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
                        {{__('pages.advertisements.new')}}
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
                    <form class="kt-form" action="{{route('admin.advertisements.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="kt-portlet__body">
                            <div class="form-group">
                                <label>{{__('pages.advertisements.columns.title')}}</label>
                                <input name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>{{__('pages.advertisements.columns.city_id')}}</label>
                                <select class="form-control kt-selectpicker" data-live-search="true" name="city_id">
                                    @foreach(allCountries() as $country)
                                        <optgroup label="{{$country->name}}">
                                            @foreach($country->city()->active(1)->get() as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{__('pages.advertisements.columns.user_id')}}</label>
                                <select class="form-control kt-selectpicker" id="user_id" name="user_id">
                                    @foreach(allUsers() as $user)
                                        <option value="{{$user->id}}">{{$user->full_phone}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{__('pages.advertisements.columns.category_id')}}</label>
                                <select class="form-control kt-selectpicker" id="category_id" name="category_id">
                                    @foreach(allCategories() as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{__('pages.advertisements.columns.subCategory_id')}}</label>
                                <select class="form-control kt-selectpicker" id="subCategory_id" name="subCategory_id">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{__('pages.advertisements.columns.subSubCategory_id')}}</label>
                                <select class="form-control kt-selectpicker" id="subSubCategory_id" name="subSubCategory_id">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{__('pages.advertisements.columns.region')}}</label>
                                <input name="region" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>{{__('pages.advertisements.columns.address')}}</label>
                                <input name="address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>{{__('pages.advertisements.columns.price')}}</label>
                                <input name="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>{{__('pages.advertisements.columns.contact_method')}}</label>
                                <input name="contact_method" class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label>{{__('pages.users.columns.mobile')}}</label>
                                <input name="mobile" type="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-lg-4 col-sm-12">{{__('pages.columns.featured')}}</label>
                                <input data-switch="true" type="checkbox" name="featured" checked data-on-text="{{__('base.activated')}}" data-on-color="success" data-off-color="warning" data-off-text="{{__('base.deactivated')}}">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-lg-4 col-sm-12">{{__('pages.columns.home')}}</label>
                                <input data-switch="true" type="checkbox" name="home" checked data-on-text="{{__('base.activated')}}" data-on-color="success" data-off-color="warning" data-off-text="{{__('base.deactivated')}}">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-lg-4 col-sm-12">{{__('pages.columns.status')}}</label>
                                <input data-switch="true" type="checkbox" name="status" checked data-on-text="{{__('base.activated')}}" data-on-color="success" data-off-color="warning" data-off-text="{{__('base.deactivated')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea">{{__('pages.advertisements.columns.desc')}}</label>
                                <textarea class="form-control" name="desc" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea">{{__('pages.advertisements.columns.tags')}}</label>
                                <input type="text" name="desc" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput">
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">{{__('pages.advertisements.columns.photos')}}</label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <div class="kt-dropzone dropzone m-dropzone--success" action="inc/api/dropzone/upload.php" id="m-dropzone-three">
                                        <div class="kt-dropzone__msg dz-message needsclick">
                                            <h3 class="kt-dropzone__msg-title">Drop files here or click to upload.</h3>
                                            <span class="kt-dropzone__msg-desc">Only image, pdf and psd files are allowed for upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                            <div class="my-repeater">
                                <div class="form-group  row">
                                    <label class="col-lg-3 col-form-label">Contact:</label>
                                    <div data-repeater-list="" class="col-lg-6">
                                        <div data-repeater-item class="kt-margin-b-10">
                                            <div class="col-md-3">
                                                <div class="kt-form__group--inline">
                                                    <div class="kt-form__label">
                                                        <label>Name:</label>
                                                    </div>
                                                    <div class="kt-form__control">
                                                        <input type="email" class="form-control" placeholder="Enter full name">
                                                    </div>
                                                </div>
                                                <div class="d-md-none kt-margin-b-10"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="kt-form__group--inline">
                                                    <div class="kt-form__label">
                                                        <label class="kt-label m-label--single">Number:</label>
                                                    </div>
                                                    <div class="kt-form__control">
                                                        <input type="email" class="form-control" placeholder="Enter contact number">
                                                    </div>
                                                </div>
                                                <div class="d-md-none kt-margin-b-10"></div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="kt-radio-inline">
                                                    <label class="kt-checkbox kt-checkbox--state-success">
                                                        <input type="checkbox"> Primary
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
                                                    <i class="la la-trash-o"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col">
                                        <div data-repeater-create="" class="btn btn btn-warning">
                                            <span>
                                                <i class="la la-plus"></i>
                                                <span>Add</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <!--end:: Global Optional Vendors -->

@endsection

@section('custom_scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\AdvertisementCreate'); !!}
    @include('admin::CustomFiles.touchSpin')
    @include('admin::CustomFiles.form-repeater')
    @include('admin::CustomFiles.dropzone')
    @include('admin::CustomFiles.tag-input')
@endsection