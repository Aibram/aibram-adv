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

    <div class="page-header mobile-hidden lazy" data-src="/frontend/assets/img/hero-area.jpg">
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
                                @include('parts.dashboard.sidebar',['active'=>'ratings','user'=>currUser('user')])
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div id="list-view " class="page-content">
                        <div class="row">
                            <div class="testimonial pt-2 w-100">
                                <h1 class="section-title mx-auto desktop-hidden">
                                    {{ __('frontend.dashboard.ratings') }} ({{ $ratings->total() }})
                                </h1>
                                <div class="col-12 mt-4">
                                    @forelse ($ratings as $item)
                                        <div class="item">
                                            <div class="testimonial-item">
                                                @if ($item->stars > 2)
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
                                                        alt="{{ $item->ratedUser->name }}"
                                                        style="width: 44px;height:44px" />
                                                </div>

                                                <div class="content">
                                                    <div class="info-text">
                                                        <h2><a href="#">{{ $item->ratedUser->name }}</a></h2>
                                                    </div>
                                                    <p class="description">{{ $item->comment }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="section-btn text-center mt-3 mb-5 no-ads">
                                            {{ __('frontend.dashboard.no_ratings') }}
                                        </div>
                                    @endforelse

                                </div>
                            </div>
                        </div>
                        <div class="row" style="justify-content: center;">
                            {{$ratings->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')

@endsection
