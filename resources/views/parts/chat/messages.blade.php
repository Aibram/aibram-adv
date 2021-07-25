@foreach (array_reverse($messages) as $message)
    @if($message->sender_id != currUser('user')->id)
        @include('parts.chat.receiver',['message'=>$message])
    @else
        @include('parts.chat.sender',['message'=>$message])
    @endif
@endforeach