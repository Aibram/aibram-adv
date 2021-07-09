@extends('layout.app')
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/intlTelInput.min.css" />

    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/font-awesome.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet"
        media="screen" />
@endsection
@section('breadcrump')
    <div class="page-header mobile-hidden lazy" data-src="/frontend/assets/img/hero-area.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">{{ __('frontend.verify_code.verify_account') }}</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('frontend.home') }}">{{ __('frontend.nav.home') }} /</a></li>
                            <li><a href="{{ route('frontend.login') }}">{{ __('frontend.nav.login') }} /</a></li>
                            <li><a href="{{ route('frontend.register') }}">{{ __('frontend.nav.register') }} /</a></li>
                            <li class="current">{{ __('frontend.verify_code.verify_account') }}</li>
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
                <div class="col-lg-5 col-md-12 col-xs-12">
                    <div class="register-form login-area">
                        <h3>{{ __('frontend.verify_code.verify_account') }}</h3>
                        <form class="login-form" action="{{ route('frontend.checkCodePost') }}" method="post">
                            @csrf
                            <p class="text-center mb-4 font-size-18">
                                {{ __('frontend.verify_code.we_sent_code') }}
                                <span class="text-primary">{{ session('mobile') }}</span>
                            </p>
                            <div class="form-group mb-4">
                                <div class="input-icon col-12">
                                    <div class="input-group">
                                        <input class="activation-code-input w-100"
                                            placeholder="{{ __('frontend.verify_code.code') }}" id="act_code" name="code" />
                                    </div>
                                </div>
                            </div>
                            <div class="button mb-5">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-common btn-block">{{ __('frontend.verify_code.activate') }}</button>
                                </div>
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
    {{-- {!! JsValidator::formRequest('App\Http\Requests\Website\CheckCodeRequest') !!} --}}
@endsection
