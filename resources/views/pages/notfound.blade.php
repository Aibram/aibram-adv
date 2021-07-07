@extends('layout.app')

@section('breadcrump')

@endsection


@section('content')
    <div class="page-header mobile-hidden lazy" data-src="{{asset('frontend/assets/img/hero-area.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">404</h2>
                        <ol class="breadcrumb">
                            <li><a href="index.html">الرئيسية/</a></li>
                            <li class="current">404</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="error">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="error-content">
                        <div class="error-message">
                            <h2>404</h2>
                            <h3>معذرةً ، لم نتمكن من العثور على الصفحة التي تبحث عنها.</h3>
                        </div>

                        <div class="description d-flex justify-content-center">
                            <p class="font-size-18">اذهب الى</p>
                            <a href="{{route('frontend.home')}}" class="mx-2 font-size-18 text-blue">الصفحة الرئيسية</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
