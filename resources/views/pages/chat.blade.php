@extends('layout.app')
@section('custom_css')
    <link href="{{ asset('assets/bootstrap-taginput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('breadcrump')
    <div class="page-header mobile-hidden" style="background: url({{asset('frontend/assets/img/hero-area.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">
                            محادثة مع <span class="text-primary">ابو راشد</span>
                        </h2>
                        <ol class="breadcrumb">
                            <li><a href="#">الرئيسية</a></li>
                            <li class="current">محادثة</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <div id="content" class="section-padding mt-5 mt-md-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 mx-auto">
                    <div class="page-content">
                        <div class="col-12 p-0">
                            <div class="card chat-box rounded p-0 box-shadow-none">
                                <div class="card-header fa-ch p-0 bg-transparent offers-user-online">
                                    <div class="offerer py-2 d-flex">
                                        <div class="figure">
                                            <img src="{{asset('frontend/assets/img/testimonial/img3.png')}}" alt="" />
                                            <span class="bolticon"></span>
                                        </div>

                                        <div class="user-name">
                                            <h3>ابو فهد</h3>
                                            <h4><a href="#">متاح</a></h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="card box-shadow-none border-0 m-0 p-0" style="height: 65vh">
                                    <div id="sohbet"
                                        class="card border-0 m-0 p-0 position-relative box-shadow-none bg-transparent"
                                        style="overflow-y: auto; height: 65vh">
                                        <div class="balon1 p-2 m-0 position-relative" data-is="">
                                            <a class="float-right"> مرحبا اخي الكريم </a>
                                            <span><img src="{{asset('frontend/assets/img/double-check.svg')}}" /> انت - 3:20
                                                pm</span>
                                        </div>

                                        <div class="balon2 p-2 m-0 position-relative">
                                            <a class="float-left sohbet2"> مرحبا </a>
                                            <span><img src="{{asset('frontend/assets/img/double-check.svg')}}" /> ابو فهد -
                                                3:22 pm</span>
                                        </div>

                                        <div class="balon1 p-2 m-0 position-relative">
                                            <a class="float-right">
                                                اريد ان اتواصل معك بخصوص اعلانك
                                            </a>
                                            <span><img src="{{asset('frontend/assets/img/double-check.svg')}}" /> انت - 3:20
                                                pm</span>
                                        </div>

                                        <div class="balon2 p-2 m-0 position-relative">
                                            <a class="float-left sohbet2"> تفضل </a>
                                            <span><img src="{{asset('frontend/assets/img/double-check.svg')}}" />ابو فهد -
                                                3:22 pm</span>
                                        </div>

                                        <div class="balon1 p-2 m-0 position-relative">
                                            <a class="float-right">
                                                اريد ان اشتري السفرة المعروضة في اعلانك</a>
                                            <span><img src="{{asset('frontend/assets/img/double-check.svg')}}" /> انت - 3:20
                                                pm</span>
                                        </div>

                                        <div class="balon2 p-2 m-0 position-relative">
                                            <a class="float-left sohbet2">
                                                يمكنك ان تتواصل معي علي الهاتف
                                            </a>
                                            <span><img src="{{asset('frontend/assets/img/double-check.svg')}}" />ابو فهد -
                                                3:22 pm</span>
                                        </div>
                                        <div class="balon1 p-2 m-0 position-relative">
                                            <a class="float-right image-popup-no-margins"
                                                href="/assets/img/product/img8.jpg">
                                                <img id="myImg" src="{{asset('frontend/assets/img/product/img8.jpg')}}" /></a>
                                            <span><img src="{{asset('frontend/assets/img/check.svg')}}" />انت - 3:20 pm</span>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="w-100 card-footer py-2 p-0 bg-transparent border-0 border border-bottom-0 border-left-0 border-right-0">
                                    <form class="m-0 p-0" action="" method="POST" autocomplete="off">
                                        <div class="d-flex m-0 p-0">
                                            <div class="m-0 p-1 flex-grow-1">
                                                <input id="text" class="mw-100 border rounded form-control" type="text"
                                                    name="text" placeholder="أرسل رد" required />
                                            </div>
                                            <div class="m-0 p-1 d-flex">
                                                <label for="tg-photogallery">
                                                    <span class="btn btn-border btn-icon ml-2"><i
                                                            class="fa fa-image"></i></span>

                                                    <input id="tg-photogallery" class="tg-fileinput" type="file"
                                                        name="file" />
                                                </label>

                                                <button class="btn btn-icon btn-common rounded w-100">
                                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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
