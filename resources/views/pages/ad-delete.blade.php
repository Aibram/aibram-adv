@extends('layout.app')
@section('custom_css')
    <link href="{{ asset('assets/bootstrap-taginput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .label-info {
            background-color: #0b8451;
            display: inline;
            padding: .2em .6em .3em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25em;
        }
        .bootstrap-tagsinput input{
            height: 40px;
        }

    </style>
@endsection
@section('breadcrump')

    <div class="page-header mobile-hidden lazy" data-src="{{asset('frontend/assets/img/hero-area.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">{{ __('frontend.ad_remove.remove_ad_header') }}</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('frontend.home') }}">{{ __('frontend.nav.home') }}/</a></li>
                            <li><a href="{{ route('frontend.ad.details',['slug'=>$ad->slug]) }}">{{ __('frontend.ad_remove.ad_details') }}/</a></li>
                            <li class="current">{{ __('frontend.ad_remove.remove_ad_header') }}</li>
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
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-12 col-xs-12">
                    <div class="register-form login-area">
                        <h3>{{ __('frontend.ad_remove.remove_ad',['title'=>$ad->title]) }}</h3>
                        <form class="login-form" action="{{route('frontend.ad.destroy',['id'=>$ad->id])}}" method="POST">
                            @csrf
                            <div class="text-center my-3">
                                <button type="submit" class="btn btn-danger log-btn btn-block">{{ __('frontend.ad_remove.confirm') }}</button>
                            </div>
                            <div class="text-center">
                                <a href="{{route('frontend.ad.details',['slug'=>$ad->slug])}}" class="btn btn-common log-btn btn-block font-size-14">{{ __('frontend.ad_remove.go_back') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    
@endsection
