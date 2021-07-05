@extends('layout.app')

@section('breadcrump')
    <div id="hero-area">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-9 col-xs-12 text-center">
                    <div class="contents">
                        <h1 class="head-title">
                            مرحبًا بكم في أكبر <span class="year">منصة للاعلانات</span>
                        </h1>
                        <p>قم ببيع وشراء كل شيء من موقعنا</p>
                        <div class="search-bar">
                            <div class="search-inner">
                                <form class="search-form" action="{{route('frontend.ads')}}">
                                    <div class="d-flex flex-column flex-md-row w-100">
                                        <div class="form-group inputwithicon">
                                            <input type="text" name="title" class="form-control"
                                                placeholder="ابحث عن اي شيء" />
                                            <i class="fa fa-search"></i>
                                        </div>
                                        <div class="d-flex w-100">
                                            <div class="form-group inputwithicon">
                                                <div class="select pl-2">
                                                    <select name="city_id">
                                                        <option value="">كل المدن</option>
                                                        @foreach (getCitiesOfYemen() as $city)
                                                            <option value="{{$city->id}}">
                                                                {{$city->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <div class="form-group inputwithicon">
                                                <div class="select">
                                                    <select name="category_id">
                                                        <option value="">جميع التصنيفات</option>
                                                        @foreach (categoriesFilter() as $item)
                                                            <option value="{{$item->category_hierarchy_ids}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <i class="fa fa-list-alt"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-common" type="submit">
                                        <i class="lni-search"></i> ابحث الان
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    @php($latestAds = getAds(['home'=>1],null,6))
    @if(count($latestAds)>0)
    <section class="featured section-padding">
        <div class="container">
            <h1 class="section-title">{{ __('frontend.home.recent_ads') }}</h1>
            <div class="row">
                @include('parts.ads.latest-home',['ads'=>$latestAds])
            </div>
            <div class="section-btn text-center mt-4">
                <a href="{{route('frontend.ads')}}" class="btn btn-common btn-lg text-white px-3">
                    <i class="lni-arrow-down"></i>
                    <span class="">{{ __('frontend.home.see_more') }}</span></a>
            </div>
        </div>
    </section>
    @endif
    @php($featuredAds = getFeaturedAds(currUser('user')))
    @if(count($featuredAds)>0)
        <section class="featured-lis section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
                        <h3 class="section-title">{{ __('frontend.home.featured_ads') }}</h3>
                        <div id="new-products" class="owl-carousel owl-theme">
                            @include('parts.ads.featured-home',['ads'=>$featuredAds])
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="works section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="section-title">كيف نعمل؟</h3>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="works-item">
                        <div class="icon-box">
                            <i class="fa fa-users"></i>
                        </div>
                        <p>انشئ حساب</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="works-item">
                        <div class="icon-box">
                            <i class="lni-bookmark-alt"></i>
                        </div>
                        <p>انشر إعلانك</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="works-item">
                        <div class="icon-box">
                            <i class="lni-thumbs-up"></i>
                        </div>
                        <p>اتمام الاتفاق</p>
                    </div>
                </div>
                <hr class="works-line" />
            </div>
        </div>
    </section>

    <section class="services bg-light section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="section-title">المميزات</h3>
                </div>

                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.2s">
                        <div class="icon">
                            <i class="fa fa-leaf"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">تصنيفات متنوعة</a></h3>
                            <p>
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                                توليد هذا النص من مولد النص العربى،
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.4s">
                        <div class="icon">
                            <i class="fa fa-desktop"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">سهولة في الاستخدام</a></h3>
                            <p>
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                                توليد هذا النص من مولد النص العربى،
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
                        <div class="icon">
                            <i class="lni-color-pallet"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">تصميم فريد</a></h3>
                            <p>
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                                توليد هذا النص من مولد النص العربى،
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial main section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="section-title">{{ __('frontend.home.testimonials') }}</h3>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="testimonials" class="owl-carousel">
                        @foreach (getTestimonials() as $item)
                            <div class="item">
                                <div class="img-thumb">
                                    <img src="{{$item->photo}}" alt="{{$item->name}}" style="width:44px;height:44px"/>
                                </div>
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p class="description">
                                            {{$item->content}}
                                        </p>
                                        <div class="info-text">
                                            <h2><a>{{$item->name}}</a></h2>
                                            <h4><a>{{$item->job}}</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
