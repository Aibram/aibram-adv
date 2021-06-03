<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="featured-box d-flex flex-column">
        <div class="figure">
            <div class="icon">
                <span class="bg-green"><i class="fa fa-heart-o"></i></span>
            </div>
            <a href="{{route('frontend.ad.details',['slug'=>$ad->slug])}}">
                <img class="img-fluid" src="{{$ad->photo}}" alt="{{$ad->title}}" style="width: 400px;height: 250px;"/>
            </a>
        </div>
        <div class="feature-content order-2 order-md-1">
            <div class="product">
                <a href="{{getFullLink(route('frontend.ads'),['category_id'=>$ad->category->category_hierarchy_ids])}}">{{$ad->category_name}}</a>
            </div>
            <h4>
                <a href="{{route('frontend.ad.details',['slug'=>$ad->slug])}}">{{$ad->title_formatted}}</a>
            </h4>
            <div class="meta-tag">
                <span>
                    <a href="{{getFullLink(route('frontend.profile',['id'=>$ad->user_id]),['id'=>$ad->id])}}"><i class="fa fa-user"></i>{{$ad->user->name}}</a>
                </span>
                <span>
                    <a><i class="fa fa-map-marker"></i>{{$ad->city_name}}</a>
                </span>

                <span>
                    <a><i class="fa fa-clock-o"></i>{{$ad->created_at->diffForHumans()}}</a>
                </span>
            </div>
        </div>
    </div>
</div>