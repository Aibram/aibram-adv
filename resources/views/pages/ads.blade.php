@extends('layout.app')

@section('breadcrump')
    <div class="page-header mobile-hidden" style="background: url({{asset('frontend/assets/img/hero-area.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">الاعلانات</h2>
                        <ol class="breadcrumb">
                            <li><a href="index.html">الرئيسية /</a></li>
                            <li class="current">الاعلانات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <div class="main-container mt-5">
        <div class="widget categories mobile desktop-hidden">
            <div class="container padding-30">
                <div id="owl-demo2" class="owl-carousel owl-theme">
                    <div class="item">
                        <a class="btn btn-border category"><i class="fa fa-car"></i> سيارات</a>
                    </div>
                    <div class="item">
                        <a class="btn btn-border category"><i class="fa fa-graduation-cap"></i> تعليم</a>
                    </div>
                    <div class="item">
                        <a class="btn btn-border category"><i class="fa fa-laptop"></i> حاسوب محمول
                        </a>
                    </div>
                    <div class="item">
                        <a class="btn btn-border category"><i class="fa fa-shopping-bag"></i> موضه</a>
                    </div>
                    <div class="item">
                        <a class="btn btn-border category">
                            <i class="fa fa-briefcase"></i> وظائف</a>
                    </div>
                    <div class="item">
                        <a class="btn btn-border category"><i class="fa fa-building"></i> عقارات</a>
                    </div>
                    <div class="item">
                        <a class="btn btn-border category">
                            <i class="fa fa-television"></i> إلكترونيات</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">
                    <aside>
                        <div class="widget_search">
                            <form role="search" id="search-form">
                                <input type="search" class="form-control" autocomplete="off" name="s"
                                    placeholder="ابحث عن اي شيء" id="search-input" value="" />
                                <button type="submit" id="search-submit" class="search-btn">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>

                        <div class="widget categories sticky mobile-hidden">
                            <h4 class="widget-title">التصنيفات</h4>
                            <ul class="categories-list">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-car"></i>
                                        سيارات
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-graduation-cap fa-hea"></i>
                                        تعليم
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-laptop"></i>
                                        حاسوب محمول
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-bag"></i>
                                        موضه
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-briefcase"></i>
                                        وظائف
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-building"></i>
                                        عقارات
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="lni-display"></i>
                                        إلكترونيات
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12 page-content">
                    <div class="product-filter d-flex align-items-center justify-content-between">
                        <div class="short-name">
                            <span>عرض الاعلانات </span>
                        </div>
                        <div>
                            <ul class="nav nav-tabs ml-0">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#list-view"><i
                                            class="fa fa-list"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a>
                                </li>
                            </ul>
                            <div class="Show-item">
                                <form class="woocommerce-ordering" method="post">
                                    <label>
                                        <select name="order" class="orderby">
                                            <option selected="selected" value="menu-order">
                                                المدينة
                                            </option>
                                            <option value="popularity">المدينة</option>
                                            <option value="popularity">المدينة</option>
                                        </select>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="adds-wrapper">
                        <div class="tab-content">
                            <div id="list-view" class="tab-pane fade active show">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="featured-box">
                                            <div class="figure">
                                                <div class="icon">
                                                    <span class="bg-green"><i class="fa fa-heart-o"></i></span>
                                                </div>
                                                <a href="ads-details.html"><img class="img-fluid"
                                                        src="{{asset('frontend/assets/img/featured/img-1.jpg')}}" alt="" /></a>
                                            </div>
                                            <div class="feature-content">
                                                <div class="product">
                                                    <a href="#">الكترونيات </a>
                                                </div>
                                                <h4>
                                                    <a href="ads-details.html">كانون اس اكس باورشوت ...</a>
                                                </h4>
                                                <div class="meta-tag">
                                                    <span>
                                                        <a href="profile.html"><i class="fa fa-user"></i>زين ال عمران</a>
                                                    </span>
                                                    <span>
                                                        <a><i class="fa fa-map-marker"></i> الدمام</a>
                                                    </span>

                                                    <span>
                                                        <a><i class="fa fa-clock-o"></i> منذ ساعتين</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="featured-box">
                                            <div class="figure">
                                                <div class="icon">
                                                    <span class="bg-green"><i class="fa fa-heart-o"></i></span>
                                                </div>
                                                <a href="ads-details.html"><img class="img-fluid"
                                                        src="{{asset('frontend/assets/img/featured/img-2.jpg')}}" alt="" /></a>
                                            </div>
                                            <div class="feature-content">
                                                <div class="product">
                                                    <a href="#">الكترونيات </a>
                                                </div>
                                                <h4>
                                                    <a href="ads-details.html">أبل ماك بوك برو ...</a>
                                                </h4>
                                                <div class="meta-tag">
                                                    <span>
                                                        <a href="profile.html"><i class="fa fa-user"></i> ابو فهد</a>
                                                    </span>
                                                    <span>
                                                        <a><i class="fa fa-map-marker"></i> مكة</a>
                                                    </span>

                                                    <span>
                                                        <a><i class="fa fa-clock-o"></i> منذ ساعتين</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="featured-box">
                                            <div class="figure">
                                                <div class="icon">
                                                    <span class="bg-green"><i class="fa fa-heart-o"></i></span>
                                                </div>
                                                <a href="ads-details.html"><img class="img-fluid"
                                                        src="{{asset('frontend/assets/img/featured/img-3.jpg')}}" alt="" /></a>
                                            </div>
                                            <div class="feature-content">
                                                <div class="product">
                                                    <a href="#">سيارات</a>
                                                </div>
                                                <h4>
                                                    <a href="ads-details.html">مرسيدس بنز E200 ...</a>
                                                </h4>
                                                <div class="meta-tag">
                                                    <span>
                                                        <a href="profile.html"><i class="fa fa-user"></i> ابو محمد
                                                            المهدي</a>
                                                    </span>
                                                    <span>
                                                        <a><i class="fa fa-map-marker"></i>المدينة</a>
                                                    </span>

                                                    <span>
                                                        <a><i class="fa fa-clock-o"></i> منذ ساعتين</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="featured-box">
                                            <div class="figure">
                                                <div class="icon">
                                                    <span class="bg-green"><i class="fa fa-heart-o"></i></span>
                                                </div>
                                                <a href="ads-details.html"><img class="img-fluid"
                                                        src="{{asset('frontend/assets/img/featured/img-1.jpg')}}" alt="" /></a>
                                            </div>
                                            <div class="feature-content">
                                                <div class="product">
                                                    <a href="#">الكترونيات </a>
                                                </div>
                                                <h4>
                                                    <a href="ads-details.html">كانون اس اكس باورشوت ...</a>
                                                </h4>
                                                <div class="meta-tag">
                                                    <span>
                                                        <a href="profile.html"><i class="fa fa-user"></i>زين ال عمران</a>
                                                    </span>
                                                    <span>
                                                        <a><i class="fa fa-map-marker"></i> الدمام</a>
                                                    </span>

                                                    <span>
                                                        <a><i class="fa fa-clock-o"></i> منذ ساعتين</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="grid-view" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="featured-box d-flex flex-column">
                                            <div class="figure w-100">
                                                <div class="icon">
                                                    <span class="bg-green"><i class="fa fa-heart-o"></i></span>
                                                </div>
                                                <a href="ads-details.html"><img class="img-fluid"
                                                        src="{{asset('frontend/assets/img/featured/img-1.jpg')}}" alt="" /></a>
                                            </div>
                                            <div class="feature-content order-2 order-md-1">
                                                <div class="product">
                                                    <a href="#">الكترونيات </a>
                                                </div>
                                                <h4>
                                                    <a href="ads-details.html">كانون اس اكس باورشوت ...</a>
                                                </h4>
                                                <div class="meta-tag">
                                                    <span>
                                                        <a href="profile.html"><i class="fa fa-user"></i>زين ال عمران</a>
                                                    </span>
                                                    <span>
                                                        <a><i class="fa fa-map-marker"></i> الدمام</a>
                                                    </span>

                                                    <span>
                                                        <a><i class="fa fa-clock-o"></i> منذ ساعتين</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="featured-box d-flex flex-column">
                                            <div class="figure w-100">
                                                <div class="icon">
                                                    <span class="bg-green"><i class="fa fa-heart-o"></i></span>
                                                </div>
                                                <a href="ads-details.html"><img class="img-fluid"
                                                        src="{{asset('frontend/assets/img/featured/img-2.jpg')}}" alt="" /></a>
                                            </div>
                                            <div class="feature-content order-2 order-md-1">
                                                <div class="product">
                                                    <a href="#">الكترونيات </a>
                                                </div>
                                                <h4>
                                                    <a href="ads-details.html">أبل ماك بوك برو ...</a>
                                                </h4>
                                                <div class="meta-tag">
                                                    <span>
                                                        <a href="profile.html"><i class="fa fa-user"></i> ابو فهد</a>
                                                    </span>
                                                    <span>
                                                        <a><i class="fa fa-map-marker"></i> مكة</a>
                                                    </span>

                                                    <span>
                                                        <a><i class="fa fa-clock-o"></i> منذ ساعتين</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="featured-box d-flex flex-column">
                                            <div class="figure">
                                                <div class="icon">
                                                    <span class="bg-green"><i class="fa fa-heart-o"></i></span>
                                                </div>
                                                <a href="ads-details.html"><img class="img-fluid"
                                                        src="{{asset('frontend/assets/img/featured/img-1.jpg')}}" alt="" /></a>
                                            </div>
                                            <div class="feature-content order-2 order-md-1">
                                                <div class="product">
                                                    <a href="#">الكترونيات </a>
                                                </div>
                                                <h4>
                                                    <a href="ads-details.html">كانون اس اكس باورشوت ...</a>
                                                </h4>
                                                <div class="meta-tag">
                                                    <span>
                                                        <a href="profile.html"><i class="fa fa-user"></i>زين ال عمران</a>
                                                    </span>
                                                    <span>
                                                        <a><i class="fa fa-map-marker"></i> الدمام</a>
                                                    </span>

                                                    <span>
                                                        <a><i class="fa fa-clock-o"></i> منذ ساعتين</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="featured-box d-flex flex-column">
                                            <div class="figure">
                                                <div class="icon">
                                                    <span class="bg-green"><i class="fa fa-heart-o"></i></span>
                                                </div>
                                                <a href="ads-details.html"><img class="img-fluid"
                                                        src="{{asset('frontend/assets/img/featured/img-3.jpg')}}" alt="" /></a>
                                            </div>
                                            <div class="feature-content order-2 order-md-1">
                                                <div class="product">
                                                    <a href="#">سيارات</a>
                                                </div>
                                                <h4>
                                                    <a href="ads-details.html">مرسيدس بنز E200 ...</a>
                                                </h4>
                                                <div class="meta-tag">
                                                    <span>
                                                        <a href="profile.html"><i class="fa fa-user"></i> ابو محمد
                                                            المهدي</a>
                                                    </span>
                                                    <span>
                                                        <a><i class="fa fa-map-marker"></i>المدينة</a>
                                                    </span>

                                                    <span>
                                                        <a><i class="fa fa-clock-o"></i> منذ ساعتين</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-btn text-center mt-3 mb-5">
                        <a class="btn btn-common btn-lg text-white px-3">
                            <i class="lni-arrow-down"></i>
                            <span class="">شاهد المزيد</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
@endsection
