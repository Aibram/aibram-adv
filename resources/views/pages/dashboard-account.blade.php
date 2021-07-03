@extends('layout.app')
@section('custom_css')

@endsection
@section('breadcrump')

    <div class="page-header mobile-hidden" style="background: url({{ asset('frontend/assets/img/hero-area.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">{{ __('frontend.dashboard.myaccount') }}</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">{{ __('frontend.nav.home') }} /</a></li>
                            <li class="current">{{ __('frontend.dashboard.myaccount') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <div id="content" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 page-sidebar">
                    <aside>
                        <div class="sidebar-box">
                            <div class="user">
                                @include('parts.dashboard.sidebar',['active'=>'account','user'=>auth()->guard('user')->user()])
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div id="list-view " class="page-content">
                        <div class="row">
                            <div class="register-form login-area border-0 m-0">
                                <h1 class="section-title mx-auto desktop-hidden">
                                    {{ __('frontend.dashboard.your_account') }}</h1>
                                <form class="login-form pt-0" action="{{ route('frontend.dashboard.updateAccount') }}"
                                    method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="font-size-16 font-weight-bold">{{ __('frontend.dashboard.name') }}
                                        </label>
                                        <div class="input-icon">
                                            <i class="fa fa-userr"></i>
                                            <input type="text" id="Name" class="form-control" name="name"
                                                value="{{ $user->name }}"
                                                placeholder="{{ __('frontend.dashboard.username') }}" />
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="font-size-16 font-weight-bold">{{ __('frontend.register.city') }}
                                        </label>
                                        <div class="select">
                                            <select class="form-control" name="city_id" placeholder="{{__('frontend.register.city')}}">
                                                @foreach (getCities(getfirstCountry()->id) as $city)
                                                    <option @if($user->city_id == $city->id) @endif value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            class="font-size-16 font-weight-bold">{{ __('frontend.dashboard.mobile') }}</label>
                                        <div class="row">
                                            <div class="form-group mb-0 col-8 pl-0">
                                                <div class="input-icon">
                                                    <div class="input-group">
                                                        <input class="form-control" name="mobile"
                                                            placeholder="{{ __('frontend.dashboard.mobile') }}"
                                                            type="tel" value="{{ $user->mobile }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0 col-4">
                                                <div class="input-icon">
                                                    <i class="fa fa-plus text-grey"></i>
                                                    <input class="form-control" name="ext" type="tel" value="{{ $user->ext }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label
                                            class="font-size-16 font-weight-bold">{{ __('frontend.dashboard.profile_picture') }}</label>
                                        <label class="form-control upload d-flex align-items-center" for="tg-photogallery">
                                            <div class="placeholder d-flex justify-content-between w-100">
                                                <span class="font-size-18">{{ __('frontend.dashboard.photo') }}</span>
                                                <i class="fa fa-upload text-primary"></i>
                                            </div>

                                            <input id="tg-photogallery" class="tg-fileinput" type="file" name="photo" />
                                        </label>
                                    </div>

                                    <div class="button">
                                        <button class="btn btn-common text-white btn-block" type="submit">
                                          {{ __('frontend.dashboard.save') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    {!! JsValidator::formRequest('App\Http\Requests\Website\UpdateProfile') !!}

@endsection
