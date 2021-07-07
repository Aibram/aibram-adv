@extends('layout.app')
@section('custom_css')

@endsection
@section('breadcrump')

    <div class="page-header mobile-hidden lazy" data-src="{{asset('frontend/assets/img/hero-area.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">{{$user->name}}</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{route('frontend.home')}}">{{__('frontend.nav.home')}}/</a></li>
                            <li class="current">{{$user->name}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <div id="content" class="section-padding mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-5 col-lg-4 page-sidebar">
                    <aside>
                        <div class="sidebar-box">
                            <div class="user">
                                <div class="left-button">
                                    @if(checkLoggedIn('user'))
                                        @if(ratedBefore(currUser('user'),$user['id']))
                                            <a href="#" class="btn btn-common green w-110">
                                                <i class="fa fa-plus ml-2 "></i>
                                                {{ __('frontend.profile.rated_before') }}
                                            </a>
                                        @else
                                            <a class="btn btn-common green w-110" href="#myModal" data-toggle="modal">
                                                <i class="fa fa-plus ml-2"></i>
                                                {{ __('frontend.profile.add_rating') }}
                                            </a>
                                        @endif
                                    @else
                                        <a class="btn btn-common green w-110" href = "javascript:;" onClick = "openLogin();">
                                            <i class="fa fa-plus ml-2"></i>
                                            {{ __('frontend.profile.add_rating') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="right-button">
                                    @if(checkLoggedIn('user'))
                                        <a class="btn btn-common green w-110" href="{{route('frontend.chat.single',['id'=>$user->id])}}">
                                            <i class="fa fa-comment"></i>{{ __('frontend.profile.chat') }}
                                        </a>
                                    @else
                                        <a class="btn btn-common green w-110" href = "javascript:;" onClick = "openLogin();">
                                            <i class="fa fa-comment"></i>{{ __('frontend.profile.chat') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="figure">
                                    <a><img src="{{$user->photo}}" alt="{{$user->name}}" /></a>
                                </div>
                                <div class="usercontent">
                                    <h3 style="color:#1d89e4">{{$user->name}}</h3>
                                    <h4><span>{{$user->city->name}}</span> - <span>{{$user->created_at->diffForHumans()}}</span></h4>
                                </div>
                                <div class="user-statistics mt-3">
                                    <ul
                                        class="nav nav-bills d-flex flex-md-column justify-content-center align-items-center flex-nowrap flex-md-wrap">
                                        <li class="statistics-single w-100 p-0">
                                            <a class="btn active" data-toggle="tab" href="#home">
                                                <p>
                                                    <i class="fa fa-flag"></i><span>{{$user->no_ads}}</span>{{ __('frontend.profile.ad') }}
                                                </p>
                                            </a>
                                        </li>
                                        <li class="statistics-single w-100 p-0 mr-2 mr-md-0 mt-0 mt-md-2">
                                            <a class="btn" data-toggle="tab" href="#menu1">
                                                <p>
                                                    <i class="fa fa-thumbs-up"></i><span>{{$user->no_ratings}}</span>{{ __('frontend.profile.rating') }}
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-md-7 col-lg-8">
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div id="list-view" class="page-content">
                                <div class="row">
                                    <h1 class="section-title mx-auto desktop-hidden">
                                        {{ __('frontend.profile.user_ads') }}
                                    </h1>
                                    @include('parts.ads.ad-list',['ads'=>$user->advertisements->map->format(),'lazy' => true])
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="page-content testimonial pt-0">
                                <div class="row">
                                    <div class="">
                                        <h1 class="section-title mx-auto desktop-hidden">
                                            {{ __('frontend.profile.users_ratings') }}
                                        </h1>
                                        <div class="col-12 mt-4">
                                            @foreach ($ratings as $item)
                                                <div class="item">
                                                    <div class="testimonial-item">
                                                        <a href="#" class="img-thumb">
                                                            <img src="{{$item->ratedUser->photo}}" alt="{{$item->ratedUser->name}}" />
                                                        </a>

                                                        <div class="content">
                                                            <div class="info-text">
                                                                <h2>
                                                                    <a href="#">{{$item->ratedUser->name}}</a>
                                                                </h2>
                                                            </div>
                                                            <p class="description">
                                                                {{$item->comment}}
                                                            </p>
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
        </div>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <form id="ratingForm" action="{{route('frontend.add_rating',['id'=>$user->id])}}" method="GET">
                        <div class="modal-header">
                            <h4 class="modal-title">{{__('frontend.profile.add_rating')}}</h4>
                            <button class="ml-0 mr-auto p-0 bg-transparent btn font-size-18" type="button"
                                class="close" data-dismiss="modal">
                                &times;
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group inputwithicon d-flex justify-content-center mb-4">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="male" name="recommended" value="y"/>
                                    <label class="custom-control-label font-size-18 text-blue" for="male"><i
                                            class="fa fa-thumbs-up ml-2"></i>{{__('frontend.profile.recommended')}}</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="recommended" class="custom-control-input"
                                        id="female"  value="n"/>
                                    <label class="custom-control-label font-size-18 text-danger" for="female"><i
                                            class="fa fa-thumbs-down ml-2"></i> {{__('frontend.profile.not_recommended')}}</label>
                                </div>
                            </div>
                            <section class="rating-widget">
                                <!-- Rating Stars Box -->
                                <div class="rating-stars text-center mb-3">
                                    <ul id="stars">
                                        <li class="star" title="Poor" data-value="1">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="star" title="Fair" data-value="2">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="star" title="Good" data-value="3">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="star" title="Excellent" data-value="4">
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li class="star" title="WOW!!!" data-value="5">
                                            <i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <input type="hidden" name="stars" class="custom-control-input" id="stars_input" />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" height="300" name="comment" placeholder="{{__('frontend.profile.your_rating')}}"></textarea>
                                </div>
                            </section>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="submit" class="btn btn-common mx-auto">
                                {{__('frontend.profile.rate')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    @include('admin::CustomFiles.social-sharing')

@endsection
