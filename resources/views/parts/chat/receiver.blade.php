<div class="balon2 p-2 m-0 position-relative">
    @if($message->message_type == "text")
        <a class="float-left sohbet2">
            {{$message->message_content}}
        </a>
    @else
        <a class="float-left image-popup-no-margins" href="{{$message->message_content}}">
            <img id="myImg" src="{{$message->message_content}}" />
        </a>
    @endif
    @if(is_null($message->read_at))
        <span><img src="{{ asset('frontend/assets/img/check.svg') }}" /> {{__('base.me')}} - {{$message->created_at->format('h:i:s A')}}</span>
    @else
        <span><img src="{{ asset('frontend/assets/img/double-check.svg') }}" /> {{__('base.me')}} - {{$message->created_at->format('h:i:s A')}}</span>
    @endif
</div>