<li>
    <div class="media">
        <div class="thumb-left">
            <a href="{{route('frontend.profile',['id'=>$comment->user_id])}}">
                <img class="img-fluid" src="{{$comment->user->photo}}" alt="" style="width: 80px;height:80px"/>
            </a>
        </div>
        <div class="info-body position-relative">
            <div class="media-heading">
                <a href="{{route('frontend.profile',['id'=>$comment->user_id])}}">
                    <h4 class="name">{{$comment->user->name}}</h4>
                </a>
                <span class="comment-date"><i class="fa fa-clock-o"></i> {{$comment->created_at}}</span>
                @if (auth()->guard('user')->user() && auth()->guard('user')->user()->id == $comment->advertisement->user_id)
                    <a href="javascript:;" data-id="{{$comment->id}}" class="reply-link reply_now"><i class="fa fa-reply"></i> {{__('frontend.details.reply')}}</a>
                @endif
            </div>
            <p>
                {{$comment->comment}}
            </p>
            @if (auth()->guard('user')->user())
            <a href="{{getFullLink(route('frontend.report'),['type'=>'Comment','id'=>$comment->id])}}" class="reply-link report-link"><i class="fa fa-warning"></i>
                {{__('frontend.details.report')}}</a>
            @endif
        </div>
    </div>
    <ul>
        @foreach ($comment->replies as $reply)
            <li>
                <div class="media">
                    <div class="thumb-left">
                        <a href="{{route('frontend.profile',['id'=>$reply->user_id])}}">
                            <img class="img-fluid" src="{{$reply->user->photo}}" style="width: 80px;height:80px" alt="" />
                        </a>
                    </div>
                    <div class="info-body">
                        <div class="media-heading">
                            <a href="{{route('frontend.profile',['id'=>$reply->user_id])}}">
                                <h4 class="name">{{$reply->user->name}}</h4>
                            </a>
                            <span class="comment-date"><i class="fa fa-clock-o"></i> {{$reply->created_at}}</span>
                        </div>
                        <p>
                            {{$reply->comment}}
                        </p>
                    </div>
                </div>
            </li>
        @endforeach
        
    </ul>
</li>