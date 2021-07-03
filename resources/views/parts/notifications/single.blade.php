@if ($item->data['notification_type']=="reply_add_from"
  || $item->data['notification_type']=="reply_add_to" 
  || $item->data['notification_type']=="comment_add_from" 
  || $item->data['notification_type']=="comment_add_to" 
  || $item->data['notification_type']=="report" 
  || $item->data['notification_type']=="advertisement_created" 
  || $item->data['notification_type']=="advertisement_updated" 
  )
  
    <a href="{{route('frontend.ad.details',['slug'=>$item->data['slug']])}}" class="description" style="color:black;font-size:16px">{{ $item->data['notification_title'] }}</a>
@elseif($item->data['notification_type']=="message_received" || $item->data['notification_type']=="message_sent")
@php($otherPerson = currUser('user')->id != $item->data['sender_id'] ? $item->data['sender_id'] : $item->data['receiver_id'])
        <a href="{{route('frontend.chat.single',['id'=>$otherPerson])}}" class="description" style="color:black;font-size:16px">{{ $item->data['notification_title'] }}</a>
@else
        <p class="description" style="color:rgba(31, 30, 30, 0.562);font-size:16px">{{ $item->data['notification_title'] }}</p>
@endif