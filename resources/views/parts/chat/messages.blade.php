@foreach (array_reverse($messages) as $message)
    @if($message->sender_id != auth()->guard('user')->user()->id)
        @include('parts.chat.receiver',['message'=>$message])
    @else
        @include('parts.chat.sender',['message'=>$message])
    @endif
@endforeach