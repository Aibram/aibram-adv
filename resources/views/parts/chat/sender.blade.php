<div class="balon1 p-2 m-0 position-relative">
    @if($message->message_type == "text")
        <a class="float-right sohbet2">
            {{$message->message_content}}
        </a>
    @else
        <a class="float-right image-popup-no-margins" href="{{$message->message_content}}">
            <img id="myImg" src="{{$message->message_content}}" />
        </a>
    @endif
    @if(is_null($message->read_at))
        <span><img src="{{ asset('frontend/assets/img/check.svg') }}" /> {{$message->sender->name}}- {{$message->created_at->format('h:i:s A')}}</span>
    @else
        <span><img src="{{ asset('frontend/assets/img/double-check.svg') }}" /> {{$message->sender->name}} - {{$message->created_at->format('h:i:s A')}}</span>
    @endif
</div>