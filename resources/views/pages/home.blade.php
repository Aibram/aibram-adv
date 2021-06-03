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
                                <form class="search-form">
                                    <div class="d-flex flex-column flex-md-row w-100">
                                        <div class="form-group inputwithicon">
                                            <input type="text" name="customword" class="form-control"
                                                placeholder="ابحث عن اي شيء" />
                                            <i class="fa fa-search"></i>
                                        </div>
                                        <div class="d-flex w-100">
                                            <div class="form-group inputwithicon">
                                                <div class="select pl-2">
                                                    <select>
                                                        <option value="none">المدينة</option>
                                                        <option value="none">الدمام</option>
                                                        <option value="none">المدينة</option>
                                                        <option value="none">جدة</option>
                                                    </select>
                                                </div>
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <div class="form-group inputwithicon">
                                                <div class="select">
                                                    <select>
                                                        <option value="none">حدد التصنيف</option>
                                                        <option value="none">سيارات</option>
                                                        <option value="none">تعليم</option>
                                                        <option value="none">حاسوب محمول</option>
                                                        <option value="none">موضه</option>
                                                        <option value="none">وظائف</option>
                                                        <option value="none">عقارات</option>
                                                        <option value="none">إلكترونيات</option>
                                                    </select>
                                                </div>
                                                <i class="fa fa-list-alt"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-common" type="button">
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
    <section class="featured section-padding">
        <div class="container">
            <h1 class="section-title">{{ __('frontend.home.recent_ads') }}</h1>
            <div class="row">
                @foreach (getAds([],null,6) as $item)
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="featured-box">
                            <div class="figure">
                                <div class="icon">
                                    <span class="bg-green"><i class="fa fa-heart-o"></i></span>
                                </div>
                                <a href="{{route('frontend.ad.details',['slug'=>$item->slug])}}">
                                    <img class="img-fluid" src="{{$item->photo}}" alt="{{$item->title}}" style="width: 350px;height:225px"/>
                                </a>
                            </div>
                            <div class="feature-content">
                                <div class="product">
                                    <a href="{{getFullLink(route('frontend.ads'),['category_id'=>$item->category->category_hierarchy_ids])}}">{{$item->category_name}} </a>
                                </div>
                                <h4><a href="{{route('frontend.ad.details',['slug'=>$item->slug])}}">{{$item->title_formatted}}</a></h4>
                                <div class="meta-tag">
                                    <span>
                                        <a href="{{getFullLink(route('frontend.profile',['id'=>$item->user_id]),['id'=>$item->id])}}"><i class="fa fa-user"></i>{{$item->user->name}}</a>
                                    </span>
                                    <span>
                                        <a><i class="fa fa-map-marker"></i> {{$item->city_name}}</a>
                                    </span>

                                    <span>
                                        <a><i class="fa fa-clock-o"></i> {{$item->created_at->diffForHumans()}}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="section-btn text-center mt-4">
                <a href="{{route('frontend.ads')}}" class="btn btn-common btn-lg text-white px-3">
                    <i class="lni-arrow-down"></i>
                    <span class="">{{ __('frontend.home.see_more') }}</span></a>
            </div>
        </div>
    </section>

    <section class="featured-lis section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
                    <h3 class="section-title">{{ __('frontend.home.featured_ads') }}</h3>
                    <div id="new-products" class="owl-carousel owl-theme">
                        @foreach (getAds(['home'=>1],null,6) as $item)
                            <div class="item">
                                <div class="product-item">
                                    <div class="carousel-thumb">
                                        <img class="img-fluid" src="{{$item->photo}}" alt="{{$item->title}}" style="width: 340px;height:225px"/>
                                        <div class="overlay">
                                            <div>
                                                <a class="btn btn-common" href="{{route('frontend.ad.details',['slug'=>$item->slug])}}">عرض التفاصيل</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="product-title">
                                            <a href="{{route('frontend.ad.details',['slug'=>$item->slug])}}">{{$item->title_formatted}}</a>
                                        </h3>
                                        <a href="{{getFullLink(route('frontend.ads'),['category_id'=>$item->category->category_hierarchy_ids])}}">{{$item->category_name}}</a>
                                        <a href="{{route('frontend.ad.add_to_fav',['id'=>$item->id])}}" class="icon">
                                            <span><i class="fa fa-heart-o"></i></span>
                                        </a>
                                        <div class="card-text">
                                            <div class="float-left">
                                                <span class="icon-wrap">
                                                    @for ($i = 0; $i < $item->avg_rate; $i++)
                                                        <i class="lni-star-filled"></i>
                                                    @endfor
                                                    @for ($i = 0; $i < 5 - $item->avg_rate; $i++)
                                                        <i class="lni-star"></i>
                                                    @endfor
                                                </span>
                                                <span class="count-review"> ({{$item->no_ratings}} {{ __('frontend.home.rating') }}) </span>
                                            </div>
                                            <div class="float-right">
                                                <a class="address"><i class="fa fa-clock-o"></i> {{$item->created_at->diffForHumans()}}</a>
                                                <a class="address"><i class="fa fa-map-marker"></i> {{$item->city_name}}</a>
                                            </div>
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
                    <h3 class="section-title">اراء العملاء</h3>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="testimonials" class="owl-carousel">
                        <div class="item">
                            <div class="img-thumb">
                                <img src="assets/img/testimonial/img1.png" alt="" />
                            </div>
                            <div class="testimonial-item">
                                <div class="content">
                                    <p class="description">
                                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                                        توليد هذا النص من مولد النص العربى،
                                    </p>
                                    <div class="info-text">
                                        <h2><a href="#">عمار البغدادي</a></h2>
                                        <h4><a href="#">مهندس مدني</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item">
                                <div class="img-thumb">
                                    <img src="assets/img/testimonial/img5.png" alt="" />
                                </div>
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p class="description">
                                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد
                                            تم توليد هذا النص من مولد النص العربى،
                                        </p>
                                        <div class="info-text">
                                            <h2><a href="#">عمار البغدادي</a></h2>
                                            <h4><a href="#">مهندس مدني</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item">
                                <div class="img-thumb">
                                    <img src="assets/img/testimonial/img3.png" alt="" />
                                </div>
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p class="description">
                                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد
                                            تم توليد هذا النص من مولد النص العربى،
                                        </p>
                                        <div class="info-text">
                                            <h2><a href="#">عمار البغدادي</a></h2>
                                            <h4><a href="#">مهندس مدني</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item">
                                <div class="img-thumb">
                                    <img src="assets/img/testimonial/img5.png" alt="" />
                                </div>
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p class="description">
                                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد
                                            تم توليد هذا النص من مولد النص العربى،
                                        </p>
                                        <div class="info-text">
                                            <h2><a href="#">عمار البغدادي</a></h2>
                                            <h4><a href="#">مهندس مدني</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
