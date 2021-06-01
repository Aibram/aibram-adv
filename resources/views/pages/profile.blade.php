@extends('layout.app')
@section('custom_css')

@endsection
@section('breadcrump')

    <div class="page-header mobile-hidden" style="background: url({{asset('frontend/assets/img/hero-area.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">زين ال عمران</h2>
                        <ol class="breadcrumb">
                            <li><a href="index.html">الرئيسية /</a></li>
                            <li class="current">زين ال عمران</li>
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
                                    <button class="btn btn-common green w-110">
                                        <i class="fa fa-plus mx-1"></i>اضافة تقييم
                                    </button>
                                </div>
                                <div class="right-button">
                                    <button class="btn btn-common green w-110">
                                        <i class="fa fa-comment mx-1"></i>محادثة
                                    </button>
                                </div>
                                <div class="figure">
                                    <a href="#"><img src="assets/img/testimonial/img1.png" alt="" /></a>
                                </div>
                                <div class="usercontent">
                                    <h3>زين ال عمران</h3>
                                    <h4><span>مكة</span> - <span>منذ سنتين</span></h4>
                                </div>
                                <div class="user-statistics mt-3">
                                    <ul
                                        class="nav nav-bills d-flex flex-md-column justify-content-center align-items-center flex-nowrap flex-md-wrap">
                                        <li class="statistics-single w-100 p-0">
                                            <a class="btn active" data-toggle="tab" href="#home">
                                                <p>
                                                    <i class="fa fa-flag"></i><span>25</span>اعلان
                                                </p>
                                            </a>
                                        </li>
                                        <li class="statistics-single w-100 p-0 mr-2 mr-md-0 mt-0 mt-md-2">
                                            <a class="btn" data-toggle="tab" href="#menu1">
                                                <p>
                                                    <i class="fa fa-thumbs-up"></i><span>100</span>تقييم
                                                    إيجابي
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
                                        اعلانات المستخدم
                                    </h1>
                                    <div class="col-12">
                                        <div class="featured-box">
                                            <div class="figure">
                                                <div class="icon">
                                                    <span class="bg-green"><i class="fa fa-heart-o"></i></span>
                                                </div>
                                                <a href="ads-details.html"><img class="img-fluid"
                                                        src="assets/img/featured/img-1.jpg" alt="" /></a>
                                            </div>
                                            <div class="feature-content">
                                                <div class="product">
                                                    <a href="adlistinglist.html">الكترونيات </a>
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
                                                        src="assets/img/featured/img-2.jpg" alt="" /></a>
                                            </div>
                                            <div class="feature-content">
                                                <div class="product">
                                                    <a href="adlistinglist.html">الكترونيات </a>
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
                                                        src="assets/img/featured/img-3.jpg" alt="" /></a>
                                            </div>
                                            <div class="feature-content">
                                                <div class="product">
                                                    <a href="adlistinglist.html">سيارات</a>
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
                                                        src="assets/img/featured/img-1.jpg" alt="" /></a>
                                            </div>
                                            <div class="feature-content">
                                                <div class="product">
                                                    <a href="adlistinglist.html">الكترونيات </a>
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
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="page-content testimonial pt-0">
                                <div class="row">
                                    <div class="">
                                        <h1 class="section-title mx-auto desktop-hidden">
                                            تقييمات المستخدمين
                                        </h1>
                                        <div class="col-12 mt-4">
                                            <div class="item">
                                                <div class="testimonial-item">
                                                    <a href="profile.html" class="img-thumb">
                                                        <img src="assets/img/testimonial/img5.png" alt="" />
                                                    </a>

                                                    <div class="content">
                                                        <div class="info-text">
                                                            <h2>
                                                                <a href="profile.html">عمار البغدادي</a>
                                                            </h2>
                                                        </div>
                                                        <p class="description">
                                                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                                                            المساحة، لقد تم توليد هذا النص من مولد النص
                                                            العربى،
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="testimonial-item">
                                                    <a href="profile.html" class="img-thumb">
                                                        <img src="assets/img/testimonial/img5.png" alt="" />
                                                    </a>

                                                    <div class="content">
                                                        <div class="info-text">
                                                            <h2>
                                                                <a href="profile.html">عمار البغدادي</a>
                                                            </h2>
                                                        </div>
                                                        <p class="description">
                                                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                                                            المساحة، لقد تم توليد هذا النص من مولد النص
                                                            العربى،
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="testimonial-item">
                                                    <a href="profile.html" class="img-thumb">
                                                        <img src="assets/img/testimonial/img5.png" alt="" />
                                                    </a>

                                                    <div class="content">
                                                        <div class="info-text">
                                                            <h2>
                                                                <a href="profile.html">عمار البغدادي</a>
                                                            </h2>
                                                        </div>
                                                        <p class="description">
                                                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                                                            المساحة، لقد تم توليد هذا النص من مولد النص
                                                            العربى،
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="testimonial-item">
                                                    <a href="profile.html" class="img-thumb">
                                                        <img src="assets/img/testimonial/img5.png" alt="" />
                                                    </a>

                                                    <div class="content">
                                                        <div class="info-text">
                                                            <h2>
                                                                <a href="profile.html">عمار البغدادي</a>
                                                            </h2>
                                                        </div>
                                                        <p class="description">
                                                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                                                            المساحة، لقد تم توليد هذا النص من مولد النص
                                                            العربى،
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
