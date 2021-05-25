@extends('layout.app')

@section('breadcrump')
    <div class="page-header mobile-hidden" style="background: url({{asset('frontend/assets/img/hero-area.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">{{__('frontend.nav.login')}}</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{route('frontend.home')}}">{{__('frontend.nav.home')}} /</a></li>
                            <li class="current">{{__('frontend.nav.login')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <section class="login my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-12 col-xs-12">
                    <div class="login-form login-area spacing">
                        <h3 class="text-bold">{{__('frontend.login.login_now')}}</h3>
                        <form role="form" class="login-form" action="{{route('frontend.loginPost')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-3 col-8 pl-0">
                                    <div class="input-icon">
                                        <i class="fa fa-phone"></i>

                                        <input class="form-control text-left phone-text placeholder-right"
                                            placeholder="{{__('frontend.login.mobile')}}" name="mobile" type="tel" />
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <div class="input-icon">
                                        <i class="fa fa-plus text-grey"></i>
                                        <input class="form-control phone-number" type="tel" name="ext" value="967" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <div class="input-icon">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" class="form-control" name="password" placeholder="{{__('frontend.login.password')}}" />
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="checkedall" />
                                    <label class="custom-control-label" for="checkedall">{{__('frontend.login.remember')}}</label>
                                </div>
                            </div>
                            <div class="text-center">
                                {{-- <a href="javascript:;" class="btn btn-common log-btn text-white btn-block" onclick="$('form').click();">
                                    {{__('frontend.nav.login')}}
                                </a> --}}
                                <button class="btn btn-common log-btn text-white btn-block" type="submit">
                                    {{__('frontend.nav.login')}}
                                </button>
                            </div>
                            <div class="separator mx-auto text-center my-3">
                                <span class="text-bold">{{__('frontend.login.or')}}</span>
                            </div>
                            <div class="text-center my-3">
                                <a href="{{route('frontend.register')}}" class="btn btn-common bg-blue log-btn btn-block">
                                    {{__('frontend.login.register')}}
                                </a>
                            </div>
                            <div class="text-center">
                                <a href="{{route('frontend.forgetPassword')}}" class="btn btn-common bg-yellow log-btn btn-block">
                                    {{__('frontend.login.forget_password')}}
                                </a>
                            </div>
                            <div class="text-center my-3">
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
    {!! JsValidator::formRequest('App\Http\Requests\Website\UserLoginRequest'); !!}
@endsection
