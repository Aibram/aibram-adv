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
                                @include('parts.dashboard.sidebar',['active'=>'favorites','user'=>auth()->guard('user')->user()])
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div id="list-view" class="page-content">
                      <div class="row">
                        <h1 class="section-title mx-auto desktop-hidden">
                            {{ __('frontend.dashboard.myfavorites') }} ({{ $favorites->total() }})
                        </h1>
                        @forelse ($favorites as $item)
                          <div class="col-12">
                            <div
                              class="featured-box dashboard d-flex justify-content-between align-items-center"
                            >
                              <div class="d-flex">
                                <div class="figure">
                                  <a href="{{route('frontend.ad.details',['slug'=>$item->advertisement->slug])}}"
                                    ><img
                                      class="img-fluid"
                                      src="{{$item->advertisement->photo}}"
                                      alt="{{$item->advertisement->title}}"
                                  /></a>
                                </div>
                                <div class="feature-content">
                                  <div class="product mobile-hidden">
                                    <a href="{{getFullLink(route('frontend.ads'),['category_id'=>$item->advertisement->category->category_hierarchy_ids])}}">{{$item->advertisement->category_name}}</a>
                                  </div>
                                  <h4>
                                    <a href="{{route('frontend.ad.details',['slug'=>$item->advertisement->slug])}}">{{$item->advertisement->title_formatted}} ...</a>
                                  </h4>
                                  <div class="meta-tag mobile-hidden">
                                    <span>
                                      <a href="{{getFullLink(route('frontend.profile',['id'=>$item->advertisement->user_id]),['id'=>$item->advertisement->id])}}"
                                        ><i class="fa fa-user"></i>{{$item->user->name}}</a
                                      >
                                    </span>
                                    <span>
                                      <a><i class="fa fa-map-marker"></i> {{$item->advertisement->city_name}}</a>
                                    </span>
          
                                    <span>
                                      <a><i class="fa fa-clock-o"></i>{{$item->created_at->diffForHumans()}}</a>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="icon-trash pl-2">
                                <a
                                  href="{{route('frontend.ad.remove_from_favorites',['id'=>$item->advertisement->id])}}"
                                  class="btn btn-danger btn-icon font-size-14 py-2 px-2"
                                  ><i class="fa fa-trash font-size-18"></i
                                ></a>
                              </div>
                            </div>
                          </div>
                        @empty
                          <div class="section-btn text-center mt-3 mb-5 no-ads">
                            {{__('frontend.dashboard.no_favorites')}}
                          </div>
                        @endforelse
                      </div>
                      <div class="row" style="justify-content: center;">
                        {{$favorites->links()}}
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')

@endsection
