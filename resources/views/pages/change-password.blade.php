@extends('layout.app')

@section('breadcrump')
    <div class="page-header mobile-hidden" style="background: url({{asset('frontend/assets/img/hero-area.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">{{__('frontend.change_password.change')}}</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{route('frontend.home')}}">{{__('frontend.nav.home')}} /</a></li>
                            <li><a href="{{route('frontend.login')}}">{{__('frontend.nav.login')}} /</a></li>
                            <li class="current">{{__('frontend.change_password.change')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <section class="register my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-12 col-xs-12">
                    <div class="register-form login-area">
                        <h3>{{__('frontend.change_password.change')}}</h3>
                        <form class="login-form" action="{{route('frontend.reInitPasswordPost')}}" method="post">
                            @csrf
                            <p class="text-center mb-4 font-size-18">
                                {{ __('frontend.change_password.change_for_mobile') }}
                                <span class="text-primary">{{ session('mobile') }}</span>
                            </p>
                            <div class="form-group mb-4">
                                <div class="input-icon">
                                    <input type="password" class="form-control"  name="password" placeholder="{{__('frontend.register.password')}}" />
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="input-icon">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="{{__('frontend.register.password_confirmation')}}" />
                                </div>
                            </div>
                            <div class="text-center my-3">
                                <button type="submit" class="btn btn-common log-btn btn-block">{{__('frontend.change_password.confirm')}}</button>
                            </div>
                            <hr />
                            <div class="text-center mt-3">
                                <p class="text-bold">
                                    {{__('frontend.login.android_ios')}}
                                </p>
                                <div class="buttons d-flex justify-content-center mt-3">
                                    <a href=""><img src="{{asset('frontend/assets/img/google.png')}}" /></a>
                                    <a href=""><img src="{{asset('frontend/assets/img/apple.png')}}" /></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    {!! JsValidator::formRequest('App\Http\Requests\Website\ChangePasswordRequest'); !!}
@endsection