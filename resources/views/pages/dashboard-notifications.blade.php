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
                        <h2 class="product-title">{{ __('frontend.dashboard.notifications') }}</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">{{ __('frontend.nav.home') }} /</a></li>
                            <li class="current">{{ __('frontend.dashboard.notifications') }}</li>
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
                                @include('parts.dashboard.sidebar',['active'=>'notifications','user'=>auth()->guard('user')->user()])
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div id="list-view " class="page-content">
                        <div class="row">
                            <div class="testimonial pt-2">
                                <h1 class="section-title mx-auto desktop-hidden">
                                    {{ __('frontend.dashboard.ratings') }} ({{ count($notifications) }})
                                </h1>
                                <div class="col-12 mt-4">
                                    @forelse ($notifications as $item)
                                        <div class="item">
                                            <div class="testimonial-item">
                                                <div class="content @if($item->read_at) read @endif" style="min-width: 680px">
                                                    <p class="description">{{ $item->data['notification_title'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="section-btn text-center mt-3 mb-5 no-ads">
                                            {{ __('frontend.dashboard.no_notifications') }}
                                        </div>
                                    @endforelse

                                </div>
                            </div>
                        </div>
                        <div class="row" style="justify-content: center;">
                            {{$notifications->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')

@endsection
