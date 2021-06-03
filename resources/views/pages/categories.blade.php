@extends('layout.app')

@section('breadcrump')
    <div class="page-header mobile-hidden" style="background: url({{asset('frontend/assets/img/hero-area.jpg')}})">
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
                <h1 class="section-title mx-auto">{{__('frontend.nav.categories')}}</h1>
                <div class="row">
                    @foreach (allCategories() as $category)
                        <div class="col-6 col-lg-3 col-md-3">
                            <a href="{{route('frontend.ads')}}">
                                <div class="card">
                                    <div class="icon">
                                        <i class="{{'fa '.$category->icon_formatted}}"></i>
                                    </div>
                                    <h3>{{$category->name}}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
