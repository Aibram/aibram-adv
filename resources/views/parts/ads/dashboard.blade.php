@forelse ($ads as $item)
    <div class="col-12">
        <div class="featured-box dashboard d-flex justify-content-between align-items-center">
            <div class="d-flex">
                <div class="figure">
                    <a href="{{$item['detailsUrl']}}">
                        @if($lazy)
                            <img loading="lazy" class="img-fluid" data-src="{{$item['photo']}}"
                            alt="{{$item['title']}}" style="width:220px;height:140px" />
                        @else
                            <img class="img-fluid" src="{{$item['photo']}}"
                            alt="{{$item['title']}}" style="width:220px;height:140px" />
                        @endif
                    </a>
                </div>
                <div class="feature-content">
                    <div class="product mobile-hidden">
                        <a href="{{$item['searchCategoryUrl']}}">{{$item['category_name']}}</a>
                    </div>
                    <h4>
                        <a href="{{$item['detailsUrl']}}">{{$item['title_formatted']}}</a>
                    </h4>
                    <div class="meta-tag mobile-hidden">
                        <span>
                            <a href="{{$item['profileUrl']}}" class="text-blue"><i class="fa fa-user"></i>{{$item['user_name']}}</a>
                        </span>
                        <span>
                            <a href="{{$item['searchCityUrl']}}"><i class="fa fa-map-marker"></i>{{$item['city_name']}}</a>
                        </span>
                        <span>
                            <a href="{{$item['detailsUrl']}}"><i class="fa fa-clock-o"></i>{{$item['created_at_human']}}</a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="button pl-2">
                <a href="{{ route('frontend.ad.edit', ['id' => $item['id']]) }}"
                    class="btn btn-common bordered font-size-14 py-2 px-2"><i
                        class="fa fa-repeat"></i> {{ __('frontend.dashboard.update_ad') }}
                </a>
            </div>
        </div>
    </div>
@empty
    <div class="section-btn text-center mt-3 mb-5 no-ads">
        {{ __('frontend.dashboard.no_ads') }}
    </div>
@endforelse