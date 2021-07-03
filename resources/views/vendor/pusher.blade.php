<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    function updateCount(data){
        if($('.notification').find('.circle').length > 0) {
            count = parseInt($('.notification .circle').html())
            $('.notification .circle').html(count+1)
        }else{
            $('.notification .icon').prepend(
                `<div class="circle">1</div>`
            )
        }
        count = parseInt($('.notification .circle').html())
        $('.notification .circle').html(count+1)
        toastr.success(data.message.title,'',{positionClass: "toast-bottom-full-width"})
    }
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher("{{config('broadcasting.connections.pusher.key')}}", {
        cluster: "{{config('broadcasting.connections.pusher.options.cluster')}}"
    });

    var channel = pusher.subscribe('{{'user.'.auth()->guard('user')->id()}}');
    channel.bind('message_sent', function(data) {
        updateCount(data)
    });
    channel.bind('comment_added', function(data) {
        updateCount(data)
    });
    channel.bind('reply_added', function(data) {
        updateCount(data)
    });
</script>