@foreach ($ads as $item)
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
        <div class="featured-box">
            <div class="figure">
                @if(checkLoggedIn('user'))
                    <a href="javascript:;" class="icon @if($item['favorited']) fav-remove @else fav-add @endif" data-id="{{$item['id']}}" onclick="handleFavorite(this)">
                        <span class="bg-green"><i class="fa fa-heart"></i></span>
                    </a>
                @else
                    <a href="#loginModal" data-toggle="modal" class="icon fav-add">
                        <span class="bg-green"><i class="fa fa-heart"></i></span>
                    </a>
                @endif
                <a href="{{$item['detailsUrl']}}">
                    <img class="img-fluid" src="{{$item['photo']}}" alt="{{$item['title']}}" style="width: 350px;height:225px"/>
                </a>
            </div>
            <div class="feature-content">
                <div class="product">
                    <a href="{{$item['searchCategoryUrl']}}">{{$item['category_name']}} </a>
                </div>
                <h4><a href="{{$item['detailsUrl']}}">{{$item['title_formatted']}}</a></h4>
                <div class="meta-tag">
                    <span>
                        <a href="{{$item['profileUrl']}}" class="text-blue"><i class="fa fa-user"></i>{{$item['user_name']}}</a>
                    </span>
                    <span>
                        <a href="{{$item['searchCityUrl']}}"><i class="fa fa-map-marker"></i> {{$item['city_name']}}</a>
                    </span>
                    <span>
                        <a href="{{$item['detailsUrl']}}"><i class="fa fa-clock-o"></i> {{$item['created_at_human']}}</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endforeach