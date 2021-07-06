@extends('layout.app')

@section('breadcrump')
    <div class="page-header" style="background: url({{asset('frontend/assets/img/hero-area.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">{{__('frontend.nav.who_are_we')}}</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{route('frontend.home')}}">{{__('frontend.nav.home')}} /</a></li>
                            <li class="current">{{__('frontend.nav.who_are_we')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <section id="about" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xs-12">
                    <div class="about-wrapper">
                        <h2 class="intro-title">{{__('frontend.who_are_we.brief_desc')}}</h2>
                        <p class="intro-desc">
                            {{getSettings('whoAreWeBriefDesc','')}}
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xs-12">
                    <img class="img-fluid aboutUs-img" src="{{asset('frontend/assets/img/about/about.jpg')}}" alt="" />
                </div>
            </div>
        </div>
    </section>
    <section class="aboutus section-padding">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="frame">
                                <img src="{{asset('frontend/assets/img/blog/img-1.jpg')}}" class="img-responsive" />
                            </div>
                            <h4>{{__('frontend.who_are_we.our_vision')}}</h4>
                            <p>
                                {{getSettings('whoAreWeOurVision','')}}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="frame">
                                <img src="{{asset('frontend/assets/img/blog/img-2.jpg')}}" class="img-responsive" />
                            </div>
                            <h4>{{__('frontend.who_are_we.our_goal')}}</h4>
                            <p>
                                {{getSettings('whoAreWeOurGoal','')}}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="frame">
                                <img src="{{asset('frontend/assets/img/blog/img-3.jpg')}}" class="img-responsive" />
                            </div>
                            <h4>{{__('frontend.who_are_we.our_value')}}</h4>
                            <p>
                                {{getSettings('whoAreWeOurValue','')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="counter-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 work-counter-widget">
                    <div class="counter">
                        <div class="icon"><i class="lni-layers"></i></div>
                        <h2 class="counterUp">{{getSettings('adsCount','100')}}</h2>
                        <p>{{__('frontend.who_are_we.ad')}}</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 work-counter-widget">
                    <div class="counter">
                        <div class="icon"><i class="lni-users"></i></div>
                        <h2 class="counterUp">{{getSettings('usersCount','40')}}</h2>
                        <p>{{__('frontend.who_are_we.user')}}</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 work-counter-widget">
                    <div class="counter">
                        <div class="icon"><i class="lni-briefcase"></i></div>
                        <h2 class="counterUp">{{getSettings('categoriesCount','15')}}</h2>
                        <p>{{__('frontend.who_are_we.category')}}</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 work-counter-widget">
                    <div class="counter">
                        <div class="icon"><i class="lni-map"></i></div>
                        <h2 class="counterUp">{{getSettings('ratingsCount','12')}}</h2>
                        <p>{{__('frontend.who_are_we.rating')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
@endsection
