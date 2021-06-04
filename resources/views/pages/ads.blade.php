@extends('layout.app')

@section('custom_css')
    
@endsection

@section('breadcrump')
    <div class="page-header mobile-hidden" style="background: url({{asset('frontend/assets/img/hero-area.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">{{__("frontend.ads.ads")}}</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{route('frontend.home')}}">{{__('frontend.nav.home')}}/</a></li>
                            <li class="current">{{__('frontend.ads.ads')}}</li>
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
                @include('parts.categories.categories-mobile')
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">
                    <aside>
                        <div class="widget_search">
                            <input type="search" class="form-control" autocomplete="off"
                                    placeholder="{{__('frontend.ads.search_anything')}}" id="titleSearch" value="{{request()->get('title','')}}" />
                            <button type="button" id="search-submit" class="search-btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>

                        <div class="widget categories sticky mobile-hidden">
                            <h4 class="widget-title">{{__('frontend.ads.categories')}}</h4>
                            @include('parts.categories.categories-web')
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12 page-content">
                    <div class="product-filter d-flex align-items-center justify-content-between">
                        <div class="short-name">
                            <span>{{__('frontend.ads.show_ads')}}</span>
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
                                        <select name="city_id" id="citySearch" class="orderby">
                                            <option @if(empty(request()->get('city_id',''))) selected @endif value="">
                                                {{__('frontend.ads.city')}}
                                            </option>
                                            @foreach (getCitiesOfYemen() as $city)
                                                <option @if(request()->get('city_id','') == $city->id) selected @endif value="{{$city->id}}">
                                                    {{$city->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="m-wrapper">
                        <div class="tab-content">
                            <div id="list-view" class="tab-pane fade active show">
                                <div class="row">
                                    @foreach ($ads as $ad)
                                        @include('parts.ads.ad-list',['ad'=>$ad])
                                    @endforeach
                                </div>
                            </div>
                            <div id="grid-view" class="tab-pane fade">
                                <div class="row">
                                    @foreach ($ads as $ad)
                                        @include('parts.ads.ad-grid',['ad'=>$ad])
                                    @endforeach
                                </div>
                            </div>
                            @if(count($ads)==0)
                                <div class="section-btn text-center mt-3 mb-5 no-ads">
                                    {{__('frontend.ads.no_ads_found')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    @if($ads->hasMorePages())
                        <div class="section-btn text-center mt-3 mb-5">
                            <a href="javascript:;" id="loadMore" class="btn btn-common btn-lg text-white px-3">
                                <i class="lni-arrow-down"></i>
                                <span class="">{{__('frontend.ads.see_more')}}</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
<script>
    (function () {
        function setUrl(param,value){
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set(param,value)
            return window.location.origin + window.location.pathname + "?" + urlParams.toString();
        }
        $('#titleSearch').keypress(function(e) {
            if (e.which == 13) {
                window.location.href = setUrl('title',$('#titleSearch').val())
            }
        });
        $('#search-submit').click(function(){
            window.location.href = setUrl('title',$('#titleSearch').val())
        });
        $('#citySearch').on('change', function() {
            window.location.href = setUrl('city_id',$('#citySearch').val())
        })
        $('.categorySearch').click(function(){
            window.location.href = setUrl('category_id',$(this).data('id'))
        });
        $('#loadMore').click(function(){
            var currPage= {{request()->get('page',1)}}
            currPage++
            window.location.href = setUrl('page',currPage)
        });

    }());
</script>
@endsection
