@extends('layout.app')
@section('custom_css')
    <style>
        .read{
            background-color:#0b84511f;
        }
        .page-item.active .page-link{
            background-color: #0b8451;
            border-color: #0b8451
        }
    </style>
@endsection
@section('breadcrump')

    <div class="page-header mobile-hidden lazy" data-src="{{asset('frontend/assets/img/hero-area.jpg')}}">
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
                                @include('parts.dashboard.sidebar',['active'=>'ads','user'=>auth()->guard('user')->user()])
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div id="list-view" class="page-content">
                        <div class="row">
                            <h1 class="section-title mx-auto desktop-hidden">
                                {{ __('frontend.dashboard.ads') }} ({{ $ads->total() }})
                            </h1>
                            @include('parts.ads.dashboard',['ads'=>collect($ads->items())->map->format(),'lazy' => true])
                        </div>
                        <div class="row" style="justify-content: center;">
                            {{$ads->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')

@endsection
