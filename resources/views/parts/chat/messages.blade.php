@foreach (array_reverse($messages) as $message)
    <div class="@if($message->sender_id != auth()->guard('user')->user()->id) balon2 @else balon1 @endif p-2 m-0 position-relative">
        @if($message->message_type == "text")
            <a class="@if($message->sender_id != auth()->guard('user')->user()->id) float-left @else float-right @endif sohbet2">
                {{$message->message_content}}
            </a>
        @else
            <a class="@if($message->sender_id != auth()->guard('user')->user()->id) float-left @else float-right @endif image-popup-no-margins" href="{{$message->message_content}}">
                <img id="myImg" src="{{$message->message_content}}" />
            </a>
        @endif
        @if(is_null($message->read_at))
            <span><img src="{{ asset('frontend/assets/img/check.svg') }}" /> @if($message->sender_id == auth()->guard('user')->user()->id) {{__('base.me')}} @else {{$message->sender->name}} @endif - {{$message->created_at->format('h:i:s A')}}</span>
        @else
            <span><img src="{{ asset('frontend/assets/img/double-check.svg') }}" /> @if($message->sender_id == auth()->guard('user')->user()->id) {{__('base.me')}} @else {{$message->sender->name}} @endif - {{$message->created_at->format('h:i:s A')}}</span>
        @endif
    </div>
@endforeach
