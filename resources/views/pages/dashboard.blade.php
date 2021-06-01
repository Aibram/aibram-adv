@extends('layout.app')
@section('custom_css')

@endsection
@section('breadcrump')

    <div class="page-header mobile-hidden" style="background: url({{asset('frontend/assets/img/hero-area.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">حسابي</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">الرئيسية /</a></li>
                            <li class="current">حسابي</li>
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
                                <div class="figure">
                                    <a href="#"><img src="assets/img/testimonial/img1.png" alt="" /></a>
                                </div>
                                <div class="usercontent">
                                    <h3>زين ال عمران</h3>
                                    <h4><span>مكة</span> - <span>منذ سنتين</span></h4>
                                </div>
                                <div class="tabs-list mobile-hidden d-flex flex-column mt-3">
                                    <div class="item mb-2">
                                        <a href="dashboard.html"
                                            class="btn btn-border category active btn-block d-flex align-items-center justify-content-center">
                                            <div class="icon ml-2 position-relative">
                                                <i class="fa fa-flag"></i>
                                            </div>
                                            اعلاناتي
                                        </a>
                                    </div>
                                    <div class="item mb-2">
                                        <a href="dashboard-offers.html"
                                            class="btn btn-border category btn-block d-flex align-items-center justify-content-center">
                                            <div class="icon ml-2 position-relative">
                                                <i class="fa fa-comment"></i>
                                            </div>
                                            محادثاتي
                                        </a>
                                    </div>
                                    <div class="item mb-2">
                                        <a href="dashboard-rating.html"
                                            class="btn btn-border category btn-block d-flex align-items-center justify-content-center">
                                            <div class="icon ml-2 position-relative">
                                                <i class="fa fa-thumbs-up"></i>
                                            </div>
                                            تقييماتي
                                        </a>
                                    </div>
                                    <div class="item mb-2">
                                        <a href="dashboard-favorites.html"
                                            class="btn btn-border category btn-block d-flex align-items-center justify-content-center">
                                            <div class="icon ml-2 position-relative">
                                                <i class="fa fa-heart"></i>
                                            </div>
                                            المفضلة
                                        </a>
                                    </div>
                                    <div class="item mb-2">
                                        <a href="dashboard-account.html"
                                            class="btn btn-border category btn-block d-flex align-items-center justify-content-center">
                                            <div class="icon ml-2 position-relative">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            بياناتي
                                        </a>
                                    </div>
                                </div>
                                <div id="owl-demo2" class="owl-carousel owl-theme dashboard-carousel desktop-hidden">
                                    <div class="item">
                                        <a href="dashboard.html" class="btn btn-border category d-flex active">
                                            <div class="icon ml-2 position-relative">
                                                <i class="fa fa-flag"></i>
                                            </div>
                                            اعلاناتي
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="dashboard-offers.html" class="btn btn-border category d-flex">
                                            <div class="icon ml-2 position-relative">
                                                <div class="circle">3</div>
                                                <i class="fa fa-comment"></i>
                                            </div>
                                            محادثاتي
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="dashboard-rating.html" class="btn btn-border category d-flex">
                                            <div class="icon ml-2 position-relative">
                                                <div class="circle">3</div>
                                                <i class="fa fa-thumbs-up"></i>
                                            </div>
                                            تقييماتي
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="dashboard-favorites.html" class="btn btn-border category d-flex">
                                            <div class="icon ml-2 position-relative">
                                                <i class="fa fa-heart"></i>
                                            </div>
                                            المفضلة
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="dashboard-account.html" class="btn btn-border category d-flex">
                                            <div class="icon ml-2 position-relative">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            بياناتي
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div id="list-view" class="page-content">
                        <div class="row">
                            <h1 class="section-title mx-auto desktop-hidden">
                                الاعلانات (5)
                            </h1>
                            <div class="col-12">
                                <div class="featured-box dashboard d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <div class="figure">
                                            <a href="ads-details.html"><img class="img-fluid"
                                                    src="assets/img/featured/img-1.jpg" alt="" /></a>
                                        </div>
                                        <div class="feature-content">
                                            <div class="product mobile-hidden">
                                                <a href="#">الكترونيات </a>
                                            </div>
                                            <h4>
                                                <a href="ads-details.html">كانون اس اكس باورشوت ...</a>
                                            </h4>
                                            <div class="meta-tag mobile-hidden">
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
                                    <div class="button pl-2">
                                        <a class="btn btn-common bordered font-size-14 py-2 px-2"><i
                                                class="fa fa-repeat"></i> تحديث اعلانك
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="featured-box dashboard d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <div class="figure">
                                            <a href="ads-details.html"><img class="img-fluid"
                                                    src="assets/img/featured/img-1.jpg" alt="" /></a>
                                        </div>
                                        <div class="feature-content">
                                            <div class="product mobile-hidden">
                                                <a href="#">الكترونيات </a>
                                            </div>
                                            <h4>
                                                <a href="ads-details.html">كانون اس اكس باورشوت ...</a>
                                            </h4>
                                            <div class="meta-tag mobile-hidden">
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
                                    <div class="button pl-2">
                                        <a class="btn btn-common bordered font-size-14 py-2 px-2"><i
                                                class="fa fa-repeat"></i> تحديث اعلانك
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="featured-box dashboard d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <div class="figure">
                                            <a href="ads-details.html"><img class="img-fluid"
                                                    src="assets/img/featured/img-1.jpg" alt="" /></a>
                                        </div>
                                        <div class="feature-content">
                                            <div class="product mobile-hidden">
                                                <a href="#">الكترونيات </a>
                                            </div>
                                            <h4>
                                                <a href="ads-details.html">كانون اس اكس باورشوت ...</a>
                                            </h4>
                                            <div class="meta-tag mobile-hidden">
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
                                    <div class="button pl-2">
                                        <a class="btn btn-common bordered font-size-14 py-2 px-2"><i
                                                class="fa fa-repeat"></i> تحديث اعلانك
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="featured-box dashboard d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <div class="figure">
                                            <a href="ads-details.html"><img class="img-fluid"
                                                    src="assets/img/featured/img-1.jpg" alt="" /></a>
                                        </div>
                                        <div class="feature-content">
                                            <div class="product mobile-hidden">
                                                <a href="#">الكترونيات </a>
                                            </div>
                                            <h4>
                                                <a href="ads-details.html">كانون اس اكس باورشوت ...</a>
                                            </h4>
                                            <div class="meta-tag mobile-hidden">
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
                                    <div class="button pl-2">
                                        <a class="btn btn-common bordered font-size-14 py-2 px-2"><i
                                                class="fa fa-repeat"></i> تحديث اعلانك
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="featured-box dashboard d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <div class="figure">
                                            <a href="ads-details.html"><img class="img-fluid"
                                                    src="assets/img/featured/img-1.jpg" alt="" /></a>
                                        </div>
                                        <div class="feature-content">
                                            <div class="product mobile-hidden">
                                                <a href="#">الكترونيات </a>
                                            </div>
                                            <h4>
                                                <a href="ads-details.html">كانون اس اكس باورشوت ...</a>
                                            </h4>
                                            <div class="meta-tag mobile-hidden">
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
                                    <div class="button pl-2">
                                        <a class="btn btn-common bordered font-size-14 py-2 px-2"><i
                                                class="fa fa-repeat"></i> تحديث اعلانك
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')

@endsection
