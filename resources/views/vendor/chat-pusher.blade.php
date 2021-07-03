<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher("{{config('broadcasting.connections.pusher.key')}}", {
        cluster: "{{config('broadcasting.connections.pusher.options.cluster')}}"
    });

    var channel = pusher.subscribe("{{'user.'.auth()->guard('user')->id()}}");
    channel.bind('message_sent', function(data) {
        $('#sohbet').append(data.message.content.receiver_html);
        $("#sohbet").animate({
            scrollTop: $('#sohbet')[0].scrollHeight*100
        }, 1000);
    });
</script>