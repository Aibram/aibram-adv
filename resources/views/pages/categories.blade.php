@extends('layout.app')

@section('breadcrump')
    <div class="page-header mobile-hidden" style="background: url(assets/img/hero-area.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">{{__('frontend.nav.categories')}}</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{route('frontend.home')}}">{{__('frontend.nav.home')}} /</a></li>
                            <li class="current">{{__('frontend.nav.categories')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <div class="main-container mt-5">
        <section class="categories">
            <div class="container">
                <h1 class="section-title mx-auto">{{__('frontend.nav.categories')}}</</h1>
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-3">
                        <a href="adlistinglist.html">
                            <div class="card">
                                <div class="icon">
                                    <i class="fa fa-car"></i>
                                </div>
                                <h3>سيارات</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-6">
                        <a href="adlistinglist.html">
                            <div class="card">
                                <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <h3>تعليم</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3">
                        <a href="adlistinglist.html">
                            <div class="card">
                                <div class="icon">
                                    <i class="fa fa-laptop"></i>
                                </div>
                                <h3>حاسوب محمول</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-6">
                        <a href="adlistinglist.html">
                            <div class="card">
                                <div class="icon">
                                    <i class="fa fa-shopping-bag"></i>
                                </div>
                                <h3>موضه</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3">
                        <a href="adlistinglist.html">
                            <div class="card">
                                <div class="icon">
                                    <i class="fa fa-briefcase"></i>
                                </div>
                                <h3>وظائف</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-6">
                        <a href="adlistinglist.html">
                            <div class="card">
                                <div class="icon">
                                    <i class="fa fa-building"></i>
                                </div>
                                <h3>عقارات</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3">
                        <a href="adlistinglist.html">
                            <div class="card">
                                <div class="icon">
                                    <i class="fa fa-television"></i>
                                </div>
                                <h3>إلكترونيات</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
