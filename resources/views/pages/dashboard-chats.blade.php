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
                                @include('parts.dashboard.sidebar',['active'=>'chats','user'=>auth()->guard('user')->user()])
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div id="list-view " class="page-content">
                        <div class="row">
                            <h1 class="section-title mx-auto desktop-hidden">
                                {{ __('frontend.dashboard.chats') }} (0)
                            </h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')

@endsection
