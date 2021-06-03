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
                                @include('parts.dashboard.sidebar',['active'=>'ratings','user'=>auth()->guard('user')->user()])
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div id="list-view " class="page-content">
                        <div class="row">
                            <div class="testimonial pt-2">
                                <h1 class="section-title mx-auto desktop-hidden">
                                    {{ __('frontend.dashboard.ratings') }} ({{count($ratings)}})
                                </h1>
                                <div class="col-12 mt-4">
                                    @foreach ($ratings as $item)
                                        <div class="item">
                                            <div class="testimonial-item">
                                                @if($item->stars>2)
                                                    <div class="rate-icon success">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </div>
                                                @else
                                                    <div class="rate-icon danger">
                                                        <i class="fa fa-thumbs-down"></i>
                                                    </div>
                                                @endif
                                                <div class="img-thumb">
                                                    <img src="{{ $item->ratedUser->photo }}"
                                                        alt="{{ $item->ratedUser->name }}" style="width: 44px;height:44px"/>
                                                </div>

                                                <div class="content" style="min-width: 680px">
                                                    <div class="info-text">
                                                        <h2><a href="#">{{ $item->ratedUser->name }}</a></h2>
                                                    </div>
                                                    <p class="description">{{ $item->comment }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')

@endsection
