@extends('layout.app')

@section('breadcrump')
    <div class="page-header mobile-hidden lazy" data-src="/frontend/assets/img/hero-area.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">{{__('frontend.forget_password.forget')}}</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{route('frontend.home')}}">{{__('frontend.nav.home')}} /</a></li>
                            <li class="current">{{__('frontend.forget_password.forget')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <section class="section-padding mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-12 col-xs-12">
                    <div class="forgot login-area register-form">
                        <h3>{{__('frontend.forget_password.recover')}}</h3>
                        <form role="form" class="login-form" action="{{route('frontend.forgetPasswordPost')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-3 col-8 pl-0">
                                    <div class="input-icon">
                                        <i class="fa fa-plus"></i>
                                        <input class="form-control text-left placeholder-right" name="mobile" placeholder="{{__('frontend.register.mobile')}}"
                                            type="tel" />
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-4">
                                    <div class="input-icon phone-number">
                                        <i class="fa fa-plus text-grey"></i>
                                        <input class="form-control" type="tel" name="ext" value="967" />
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-3 mb-3">
                                <p class="text-bold font-size-14">
                                    {{__('frontend.register.ext_change')}}
                                </p>
                            </div>
                            <div class="text-center my-3">
                                <button type="submit" class="btn btn-common log-btn btn-block" name="provider" value="whatsapp">{{__('frontend.forget_password.whatsapp')}}</button>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-common bg-yellow log-btn btn-block font-size-14" name="provider" value="sms">{{__('frontend.forget_password.sms')}}</button>
                            </div>
                            <hr />
                            <div class="text-center mt-3">
                                <p class="text-bold">
                                    {{ __('frontend.login.android_ios') }}
                                </p>
                                <div class="buttons d-flex justify-content-center mt-3">
                                    <a href=""><img src="{{ asset('frontend/assets/img/google.png') }}" /></a>
                                    <a href=""><img src="{{ asset('frontend/assets/img/apple.png') }}" /></a>
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
    <script src="/frontend/assets/js/intlTelInput-jquery.min.js"></script>
    <script src="/frontend/assets/js/intlTelInput.min.js"></script>
    <script src="/frontend/assets/js/verification.js"></script>
    <script src="/frontend/assets/js/main-rtl.js"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Website\ForgetPasswordRequest') !!}
@endsection