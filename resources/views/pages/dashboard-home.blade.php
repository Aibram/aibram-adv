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
                                @include('parts.dashboard.sidebar',['active'=>'ads','user'=>auth()->guard('user')->user()])
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div id="list-view" class="page-content">
                        <div class="row">
                            <h1 class="section-title mx-auto desktop-hidden">
                                {{ __('frontend.dashboard.ads') }} ({{ count($ads) }})
                            </h1>
                            @forelse ($ads as $ad)
                                <div class="col-12">
                                    <div class="featured-box dashboard d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <div class="figure">
                                                <a href="{{ route('frontend.ad.details', ['slug' => $ad->slug]) }}">
                                                    <img class="img-fluid" src="{{ $ad->photo }}"
                                                        alt="{{ $ad->title }}" style="width:220px;height:140px" /></a>
                                            </div>
                                            <div class="feature-content">
                                                <div class="product mobile-hidden">
                                                    <a
                                                        href="{{ getFullLink(route('frontend.ads'), ['category_id' => $ad->category->category_hierarchy_ids]) }}">{{ $ad->category_name }}
                                                    </a>
                                                </div>
                                                <h4>
                                                    <a
                                                        href="{{ route('frontend.ad.details', ['slug' => $ad->slug]) }}">{{ $ad->title_formatted }}</a>
                                                </h4>
                                                <div class="meta-tag mobile-hidden">
                                                    <span>
                                                        <a
                                                            href="{{ getFullLink(route('frontend.profile', ['id' => $ad->user_id]), ['id' => $ad->id]) }}"><i
                                                                class="fa fa-user"></i>{{ $ad->user->name }}</a>
                                                    </span>
                                                    <span>
                                                        <a><i class="fa fa-map-marker"></i> {{ $ad->city_name }}</a>
                                                    </span>

                                                    <span>
                                                        <a><i class="fa fa-clock-o"></i>
                                                            {{ $ad->created_at->diffForHumans() }}</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button pl-2">
                                            <a href="{{ route('frontend.ad.edit', ['id' => $ad->id]) }}"
                                                class="btn btn-common bordered font-size-14 py-2 px-2"><i
                                                    class="fa fa-repeat"></i> {{ __('frontend.dashboard.update_ad') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="section-btn text-center mt-3 mb-5 no-ads">
                                    {{ __('frontend.dashboard.no_ads') }}
                                </div>
                            @endforelse
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
