@extends('layout.app')
@section('custom_css')

@endsection
@section('breadcrump')

@endsection


@section('content')
    <div class="page-header mobile-hidden" style="background: url({{asset('frontend/assets/img/hero-area.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">{{ __('frontend.report.report') }}</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{route('frontend.home')}}">{{__('frontend.nav.home')}}/</a></li>
                            <li class="current">{{ __('frontend.report.report') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="content" class="section-padding mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-12 col-xs-12">
                    <div class="register-form login-area">
                        <h3>{{ __('frontend.report.report_problem') }}</h3>
                        <form class="login-form" action="{{route('frontend.submitReport')}}" method="POST">
                            @csrf
                            <div class="form-group mb-4 inputwithicon">
                                <textarea class="form-control" name="comment" placeholder="{{ __('frontend.report.mention_problem') }}"></textarea>
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-common log-btn btn-block">
                                    {{ __('frontend.report.report') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
{!! JsValidator::formRequest('App\Http\Requests\Website\ReportRequest'); !!}
{{-- @include('admin::CustomFiles.social-sharing') --}}

@endsection
