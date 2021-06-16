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
                        {{__('pages.advertisements.update')}}
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
                    <form class="kt-form" action="{{route('admin.advertisements.update',$data->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        @method('put')
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
                            <div class="my-repeater mb-5">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">{{ __('pages.advertisements.columns.marketing.categorize') }}</label>
                                    <div class="col-lg-2">
                                        <div data-repeater-create="" class="btn btn btn-warning log-btn btn-block">
                                            إضافة
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-group-last row">
                                    <div data-repeater-list="marketing" class="col-lg-12">
                                        @forelse ($data->admarketing as $item)
                                            <div data-repeater-item class="kt-margin-b-10 mb-4 row">
                                                <div class="col-md-2">
                                                    <div class="kt-form__group--inline">
                                                        <div class="kt-form__control">
                                                            <input type="number" class="form-control" min="12" max="140"
                                                                placeholder="{{ __('pages.advertisements.columns.marketing.age_from') }}"
                                                                name="age_from" value="{{$item->age_from}}">
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="kt-form__group--inline">
                                                        <div class="kt-form__control">
                                                            <input type="number" class="form-control" min="12" max="140"
                                                                placeholder="{{ __('pages.advertisements.columns.marketing.age_to') }}"
                                                                name="age_to" value="{{$item->age_from}}">
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="kt-form__group--inline">
                                                        <div class="kt-form__control">
                                                            <select class="kt-selectpicker" data-live-search="true" data-width="90%" name="city_id">
                                                                @foreach(allCountries() as $country)
                                                                    <optgroup label="{{$country->name}}">
                                                                        @foreach($country->city()->active(1)->get() as $city)
                                                                            <option @if($item->city_id == $city->id) selected @endif value="{{$city->id}}">{{$city->name}}</option>
                                                                        @endforeach
                                                                    </optgroup>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="kt-form__group--inline">
                                                        <div class="kt-form__control">
                                                            <select class="form-control kt-selectpicker" data-width="90%" name="gender">
                                                                <option @if($item->gender == 'all') selected @endif value="all">{{__('pages.advertisements.columns.marketing.gender_all')}}</option>
                                                                @foreach(getGenderTypes() as $value => $gender)
                                                                    <option @if($item->gender == $value) selected @endif value="{{$value}}">{{$gender}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="javascript:;" data-repeater-delete=""
                                                        class="btn btn btn-danger log-btn btn-block">
                                                        حذف
                                                    </a>
                                                </div>
                                            </div>
                                        @empty
                                            <div data-repeater-item class="kt-margin-b-10 mb-4 row">
                                                <div class="col-md-2">
                                                    <div class="kt-form__group--inline">
                                                        <div class="kt-form__control">
                                                            <input type="number" class="form-control" min="12" max="140"
                                                                placeholder="{{ __('pages.advertisements.columns.marketing.age_from') }}"
                                                                name="age_from">
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="kt-form__group--inline">
                                                        <div class="kt-form__control">
                                                            <input type="number" class="form-control" min="12" max="140"
                                                                placeholder="{{ __('pages.advertisements.columns.marketing.age_to') }}"
                                                                name="age_to">
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="kt-form__group--inline">
                                                        <div class="kt-form__control">
                                                            <select class="kt-selectpicker" data-live-search="true" data-width="90%" name="city_id">
                                                                @foreach(allCountries() as $country)
                                                                    <optgroup label="{{$country->name}}">
                                                                        @foreach($country->city()->active(1)->get() as $city)
                                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                                        @endforeach
                                                                    </optgroup>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="kt-form__group--inline">
                                                        <div class="kt-form__control">
                                                            <select class="form-control kt-selectpicker" data-width="90%" name="gender">
                                                                <option @if($item->gender == 'all') selected @endif value="all">{{__('pages.advertisements.columns.marketing.gender_all')}}</option>
                                                                @foreach(getGenderTypes() as $value => $gender)
                                                                    <option value="{{$value}}">{{$gender}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="javascript:;" data-repeater-delete=""
                                                        class="btn btn btn-danger log-btn btn-block">
                                                        حذف
                                                    </a>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-lg-2 col-sm-12">{{__('pages.columns.status')}}</label>
                                <input data-switch="true" type="checkbox" name="status" @if($data->status==1) checked @endif data-on-text="{{__('base.activated')}}" data-on-color="success" data-off-color="warning" data-off-text="{{__('base.deactivated')}}">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-lg-2 col-sm-12">{{__('pages.columns.featured')}}</label>
                                <input data-switch="true" type="checkbox" name="featured" @if($data->featured==1) checked @endif data-on-text="{{__('base.activated')}}" data-on-color="success" data-off-color="warning" data-off-text="{{__('base.deactivated')}}">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-lg-2 col-sm-12">{{__('pages.columns.home')}}</label>
                                <input data-switch="true" type="checkbox" name="home" @if($data->home==1) checked @endif data-on-text="{{__('base.activated')}}" data-on-color="success" data-off-color="warning" data-off-text="{{__('base.deactivated')}}">
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

    @include('admin::CustomFiles.form-repeater')
<!--begin:: Global Optional Vendors -->
    <script src="{{asset('assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>
    <!--end:: Global Optional Vendors -->

@endsection

@section('custom_scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\AdvertisementUpdate'); !!}
    @include('admin::CustomFiles.selectPicker')

@endsection