@extends('layout.app')
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('social-share/assets/css/socialshare.css') }}">
    <link rel="stylesheet" href="{{ asset('social-share/assets/icons/all.css') }}">
    <style>
        .dropdown-menu{
            white-space: normal!important;
        }
        #comments .comments-list .media .thumb-left{
            width:auto!important
        }
    </style>
@endsection
@section('breadcrump')
    <div class="page-header mobile-hidden" style="background: url({{ asset('frontend/assets/img/hero-area.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">{{ $ad->category_name }}</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('frontend.home') }}">{{ __('frontend.nav.home') }} / </a></li>
                            <li><a href="{{ route('frontend.ads') }}">{{ __('frontend.nav.ads') }} / </a></li>
                            <li class="current">{{ $ad->category_name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <div class="mt-5">
        <div class="container">
            <div class="product-info row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="ads-details-wrapper position-relative">
                        <div id="owl-demo" class="owl-carousel owl-theme">
                            @foreach ($ad->secondary_photos as $photo)
                                <div class="item">
                                    <a href="{{ $photo }}" class="product-img image-popup-no-margins">
                                        <img class="img-fluid" id="myImg" src="{{$photo}}" alt="{{ $ad->title }}" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="details-box yellow mt-2">
                        <div class="ads-details-info mb-0">
                            <h2 class="text-primary">
                                {{ $ad->title }}
                            </h2>
                            <div class="details-meta">
                                <div class="agent-inner d-flex p-0 justify-content-between align-items-center pb-0 mb-0">
                                    <div class="agent-title w-100 mb-0 p-0">
                                        <ul class="agent-photo">
                                            <li>
                                                <a href="{{route('frontend.profile',['id'=>$ad->user_id])}}" class="d-flex align-items-center">
                                                    <img src="{{ $ad->user->photo }}" /><span class="text-blue">
                                                        {{ $ad->user->name }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-center">
                                                    <i class="fa fa-map-marker"></i><span>{{ $ad->city_name }}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-center">
                                                    <i
                                                        class="fa fa-clock-o"></i><span>{{ $ad->created_at->diffForHumans() }}</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="button p-0 d-flex flex-column align-items-end">
                                        <span class="btn-common btn">
                                            <p class="text-white text-bold">
                                                <i class="fa fa-thumbs-up ml-2"></i> {{ $ad->ratedUsers()->count() }}
                                                {{ __('frontend.details.rating') }}
                                            </p>
                                        </span>
                                        @if(ratedBefore(auth()->guard('user')->user(),$ad))
                                            <a class="btn-common btn">
                                                <p class="text-white text-bold">
                                                    <i class="fa fa-plus ml-2 "></i>
                                                    {{ __('frontend.details.rated_before') }}
                                                </p>
                                            </a>
                                        @else
                                            <a class="btn-common btn" href="#myModal" data-toggle="modal">
                                                <p class="text-white text-bold">
                                                    <i class="fa fa-plus ml-2"></i>
                                                    {{ __('frontend.details.add_rating') }}
                                                </p>
                                            </a>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="details-box border mt-2">
                        <div class="ads-details-info mb-0">
                            <p class="mb-4">
                                {{ $ad->desc }}
                            </p>
                            <h4 class="title-small mb-3">{{ __('frontend.details.properties') }}:</h4>
                            <ul class="list-specification">
                                @foreach ($ad->properties as $property)
                                    <li>
                                        <i class="fa fa-check-circle"></i> {{ $property->property }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget contact p-0">
                        <ul class="ad-contact">
                            <li class="single-contact green">
                                <a href="{{ toWhatsappGateway($ad->ad_mobile) }}"><i class="fa fa-whatsapp"></i>
                                    <p>{{ __('frontend.details.contact_whatsapp') }}</p>
                                </a>
                            </li>
                            @if (auth()->guard('user')->user() && auth()->guard('user')->user()->id != $ad->user_id)
                                <li class="single-contact yellow">
                                    <a href="{{route('frontend.ad.chat',['id'=>$ad->id])}}"><i class="fa fa-comment"></i>
                                        <p>{{ __('frontend.details.contact_website') }}</p>
                                    </a>
                                </li>
                            @endif
                            <li class="single-contact blue">
                                <a href="{{ 'tel:' . $ad->ad_mobile }}"><i class="fa fa-phone"></i>
                                    <p>{{ __('frontend.details.call') }} <span>{{ $ad->ad_mobile }}</span></p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tag-bottom my-4">
                        <div class="">
                            <div class="share d-flex justify-content-center flex-wrap">
                                <a href="javascript:;" class="btn btn-border ml-2" id="share-ext"><i class="fa fa-share-alt ml-2"></i>{{__('frontend.details.share')}}</button>
                                @if(favoritedBefore(auth()->guard('user')->user(),$ad))
                                    <a class="btn btn-common text-white ml-2"><i class="fa fa-heart ml-2 color-danger"></i>{{__('frontend.details.favorited_before')}}</a>
                                @else
                                    <a class="btn btn-common text-white ml-2" href="{{route('frontend.ad.add_to_fav',['id'=>$ad->id])}}"><i class="fa fa-heart-o ml-2"></i>{{__('frontend.details.add_to_favorite')}}</a>
                                @endif
                                <a class="btn btn-warning"  href="{{route('frontend.ad.report',['id'=>$ad->id])}}"><i class="fa fa-flag ml-2"></i>{{__('frontend.details.report')}}</a>
                                @if (auth()->guard('user')->user() && auth()->guard('user')->user()->id ==$ad->user_id)
                                    <div class="d-flex w-100 mt-4">
                                        <a href="{{route('frontend.ad.edit',['id'=>$ad->id])}}"
                                            class="btn col btn-block btn-common bg-blue text-white mr-0 mr-md-2"><i
                                                class="fa fa-edit ml-2"></i>{{__('frontend.details.update_ad')}}</a>
                                        <a class="btn col btn-block btn-danger text-white mr-2 mt-0" href="{{route('frontend.ad.delete',['id'=>$ad->id])}}"><i class="fa fa-trash ml-2"></i>{{__('frontend.details.remove_ad')}}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="font-size-18 text-center">
                            <strong>{{__('frontend.details.ad_id')}}:</strong>
                            <a href="#" class="text-primary">#{{$ad->id}}</a>
                        </p>
                    </div>

                    <hr />
                    <div id="comments" class="comment-box">
                        <h3>{{__('frontend.details.comments')}}</h3>
                        <ol class="comments-list">
                            @foreach ($comments as $comment)
                                @include('parts.comment',['comment'=>$comment])                            
                            @endforeach
                        </ol>
                        <div id="respond" class="mb-5">
                            <h2 class="respond-title">{{__('frontend.details.your_comment')}}</h2>
                            <form id="commentForm" action="{{route('frontend.ad.add_comment',['id'=>$ad->id])}}" method="GET">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12col-xs-12">
                                        <input name="parent_id" id="comment_parent_input" type="hidden"/>
                                        <div class="form-group">
                                            <textarea id="comment" class="form-control" name="comment" cols="45" rows="8"
                                                placeholder="{{__('frontend.details.message')}}"></textarea>
                                        </div>
                                        <button type="submit" id="submit" class="btn btn-common">
                                            {{__('frontend.details.send')}}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <aside class="details-sidebar">
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <form id="ratingForm" action="{{route('frontend.ad.add_rating',['id'=>$ad->id])}}" method="GET">
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{__('frontend.details.add_rating')}}</h4>
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
                                                            class="fa fa-thumbs-up ml-2"></i>{{__('frontend.details.recommended')}}</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" name="recommended" class="custom-control-input"
                                                        id="female"  value="n"/>
                                                    <label class="custom-control-label font-size-18 text-danger" for="female"><i
                                                            class="fa fa-thumbs-down ml-2"></i> {{__('frontend.details.not_recommended')}}</label>
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
                                                    <textarea class="form-control" height="300" name="comment" placeholder="{{__('frontend.details.your_rating')}}"></textarea>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <button type="submit" class="btn btn-common mx-auto">
                                                {{__('frontend.details.rate')}}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">{{__('frontend.details.familiar_ads')}}</h4>
                            <ul class="posts-list">
                                @foreach (getAds(['category_id'=>$ad->category_id],$ad->id) as $item)
                                    <li>
                                        <div class="widget-thumb">
                                            <a href="{{route('frontend.ad.details',['slug'=>$item->slug])}}"><img src="{{$item->photo}}" alt="" /></a>
                                        </div>
                                        <div class="widget-content">
                                            <h4><a href="{{route('frontend.ad.details',['slug'=>$item->slug])}}">{{$item->title}}</a></h4>
                                            <div class="meta-tag">
                                                <span>
                                                    <a href="{{route('frontend.profile',['id'=>$item->user_id])}}"><i class="fa fa-user"></i> {{$item->user->name}}</a>
                                                </span>
                                                <span>
                                                    <a href="{{route('frontend.ads')}}"><i class="fa fa-map-marker fa-map-marker"></i>{{$item->city_name}}</a>
                                                </span>
                                                <span>
                                                    <a href="{{route('frontend.ads')}}"><i class="fa fa-tag"></i> {{$item->category_name}}</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <div class="social-share social-share-sticky" id="social-sharing"
        data-social-share="{'iconSrc': 'assets/icons/', title': 'Page Title', 'description': 'Page Description'}">
        <div class="btn-group dropright">
            <button class="btn btn-outline-success dropdown-toggle" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="text-uppercase social-share-btn" aria-hidden="true">
                    <span>{{__('frontend.details.share')}}</span>
                    <span class="fas fa-share-alt"></span>
                </span>
                <span class="sr-only">Share this page</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-multi">
                <div class="dropdown-row"></div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    {!! JsValidator::formRequest('App\Http\Requests\Website\AdvertisementComment', '#commentForm') !!}
    {!! JsValidator::formRequest('App\Http\Requests\Website\AdvertisementRating', '#ratingForm') !!}
    @include('admin::CustomFiles.social-sharing')
    {{-- <script src="{{ asset('social-share/assets/js/socialshare.js') }}"></script> --}}
@endsection
