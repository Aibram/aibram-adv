@foreach ($ads as $item)
    <div class="item">
        <div class="product-item">
            <div class="carousel-thumb">
                @if($lazy)
                    <img loading="lazy" class="img-fluid" data-src="{{$item['photo']}}" alt="{{$item['title']}}" style="width: 340px;height:225px"/>
                @else
                    <img class="img-fluid" src="{{$item['photo']}}" alt="{{$item['title']}}" style="width: 340px;height:225px"/>
                @endif
                <div class="overlay">
                    <div>
                        <a class="btn btn-common" href="{{$item['detailsUrl']}}">{{__('frontend.home.show_details')}}</a>
                    </div>
                </div>
            </div>
            <div class="product-content">
                <h3 class="product-title">
                    <a href="{{$item['detailsUrl']}}">{{$item['title_formatted']}}</a>
                </h3>
                <a href="{{$item['searchCategoryUrl']}}">{{$item['category_name']}}</a>
                @if(checkLoggedIn('user'))
                    <a href="javascript:;" class="icon @if($item['favorited']) fav-remove @else fav-add @endif" data-id="{{$item['id']}}" onclick="handleFavorite(this)">
                        <span class="bg-green"><i class="fa fa-heart"></i></span>
                    </a>
                @else
                    <a href = "javascript:;" onClick = "openLogin();" class="icon fav-add">
                        <span class="bg-green"><i class="fa fa-heart"></i></span>
                    </a>
                @endif
                <div class="card-text">
                    <div class="float-left">
                        <span class="icon-wrap">
                            @for ($i = 0; $i < $item['avg_rate']; $i++)
                                <i class="lni-star-filled"></i>
                            @endfor
                            @for ($i = 0; $i < 5 - $item['avg_rate']; $i++)
                                <i class="lni-star"></i>
                            @endfor
                        </span>
                        <span class="count-review"> ({{$item['no_ratings']}} {{ __('frontend.home.rating') }}) </span>
                    </div>
                    <div class="float-right">
                        <a class="address" href="{{$item['detailsUrl']}}"><i class="fa fa-clock-o"></i> {{$item['created_at_human']}}</a>
                        <a class="address" href="{{$item['searchCityUrl']}}"><i class="fa fa-map-marker"></i> {{$item['city_name']}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach