@foreach ($ads as $ad)
    <div class="col-12">
        <div class="featured-box">
            <div class="figure">
                @if(checkLoggedIn('user'))
                    <div class="icon @if($ad['favorited']) fav-remove @else fav-add @endif" data-id="{{$ad['id']}}" onclick="handleFavorite(this)">
                        <span class="bg-green"><i class="fa fa-heart"></i></span>
                    </div>
                @else
                    <a href = "javascript:;" onClick = "openLogin();" class="icon fav-add">
                        <span class="bg-green"><i class="fa fa-heart"></i></span>
                    </a>
                @endif
                <a href="{{ $ad['detailsUrl'] }}">
                    <img class="img-fluid" src="{{ $ad['photo'] }}" alt="{{ $ad['title'] }}"
                        style="width: 246px;height: 150px;" />
                </a>
            </div>
            <div class="feature-content">
                <div class="product">
                    <a
                        href="{{ $ad['searchCategoryUrl'] }}">{{ $ad['category_name'] }}</a>
                </div>
                <h4>
                    <a href="{{ $ad['detailsUrl'] }}">{{ $ad['title_formatted'] }}</a>
                </h4>
                <div class="meta-tag">
                    <span>
                        <a href="{{ $ad['profileUrl'] }}" class="text-blue"><i class="fa fa-user"></i>{{ $ad['user_name'] }}</a>
                    </span>
                    <span>
                        <a href="{{ $ad['searchCityUrl'] }}"><i class="fa fa-map-marker"></i>{{ $ad['city_name'] }}</a>
                    </span>

                    <span>
                        <a><i class="fa fa-clock-o"></i>{{ $ad['created_at_human'] }}</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endforeach
