@extends('layout.app')

@section('custom_css')
    <style>
        .cat-sub{
            margin-right: 15px;
        }
    </style>
@endsection

@section('breadcrump')
    <div class="page-header mobile-hidden lazy" data-src="{{asset('frontend/assets/img/hero-area.jpg')}}">
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
                            @include('parts.categories.categories-web',['categories'=>categoriesFilter(),'class'=>'categories-list'])
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
                                    {{-- @include('parts.ads.ad-list',['ads'=>$ads]) --}}
                                </div>
                            </div>
                            <div id="grid-view" class="tab-pane fade">
                                <div class="row">
                                    {{-- @include('parts.ads.ad-grid',['ads'=>$ads]) --}}
                                </div>
                            </div>
                            <div id="no_ads" class="section-btn text-center mt-3 mb-5 no-ads" style="display: none">
                                {{__('frontend.ads.no_ads_found')}}
                            </div>
                        </div>
                    </div>
                    <div class="section-btn text-center mt-3 mb-5">
                        <a href="javascript:;" id="loadMore" class="btn btn-common btn-lg text-white px-3" style="display: none">
                            <i class="lni-arrow-down"></i>
                            <span class="">{{__('frontend.ads.see_more')}}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
<script>
    (function () {
        var params = {
            category_id : '',
            title : '',
            city_id : '',
            page : 1,
            user_id : '{{auth()->guard('user')->user()?auth()->guard('user')->user()->id:""}}'
        };
        function callAjax(reload = false) {
            sendAjaxReq(params, "POST", "{{route('getAds')}}", function(data) {
                if (reload) {
                    $('#list-view .row').html(data.list);
                    $('#grid-view .row').html(data.grid);
                } else {
                    $('#list-view .row').append(data.list);
                    $('#grid-view .row').append(data.grid);
                }
                data.hasMorePages && $('#loadMore').show();
                !data.hasMorePages && $('#loadMore').hide();
                data.adsCount <= 0 && $('#no_ads').show();
                data.adsCount > 0 && $('#no_ads').hide();
                const { page,user_id, ...rest } = params
                setUrlFields(rest)
            },false,true)
        }
        fillParamsObjectFromUrl(params)
        callAjax()
        $('#titleSearch').keypress(function(e) {
            if (e.which == 13) {
                params.title = $('#titleSearch').val();
                params.page = 1;
                callAjax(true)
            }
        });
        $('#search-submit').click(function(){
            params.title = $('#titleSearch').val()
            params.page = 1
            callAjax(true)
        });
        $('#citySearch').on('change', function() {
            params.city_id = $('#citySearch').val()
            params.page = 1
            callAjax(true)
        })
        $('#loadMore').click(function(){
            params.page++
            callAjax()
        });
        $('.categorySearch').click(function(){
            var elem = this;
            if($(elem).data('type')=="mob"){
                var nextLevel = $(this).data('level')+1;
                console.log($('#owl-demo2').eq(nextLevel))
                nextLevel==2 && $('#owl-demo3').show()
                nextLevel==2 && $('#owl-demo3 .categorySearch').each(function() {
                    console.log("parentId",$(this).data('parentid'),"id",$(elem).data('id'))
                    if ($(this).data('parentid') == $(elem).data('id')) {
                        $(this).show()
                    }
                    else{
                        $(this).hide()
                    }
                })
                nextLevel==3 && $('#owl-demo4').show()
                nextLevel==3 && $('#owl-demo4 .categorySearch').each(function() {
                    if ($(this).data('parentid') == $(elem).data('id')) {
                        $(this).show()
                    }
                    else{
                        $(this).hide()
                    }
                })
                
            }
            $('.categorySearch').removeClass('active')
            $(this).addClass('active')
            params.category_id = $(elem).data('accumid');
            params.page = 1;
            callAjax(true)
        });
    }());
</script>
@endsection
