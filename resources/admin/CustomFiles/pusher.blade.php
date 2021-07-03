<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    function updateCount(parentId,data){
        if($('#'+parentId).find('.kt-badge').length > 0) {
            count = parseInt($('#'+parentId+' .kt-badge').html())
            $('#'+parentId+' .kt-badge').html(count+1)
        }else{
            $('#'+parentId).append(
                `<span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill">${1}</span>`
            )
        }
        toastr.success(data.title,'',{positionClass: "toast-bottom-full-width"})
    }
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher("{{config('broadcasting.connections.pusher.key')}}", {
        cluster: "{{config('broadcasting.connections.pusher.options.cluster')}}"
    });

    var channel = pusher.subscribe('admin');
    channel.bind('user_registered', function(data) {
        updateCount('users-ref',data.message)
    });
    channel.bind('ad_created', function(data) {
        updateCount('advertisements-ref',data.message)
    });
    channel.bind('ad_report_created', function(data) {
        updateCount('reports-ref',data.message)
    });
    channel.bind('comment_report_created', function(data) {
        updateCount('reports-ref',data.message)
    });
    channel.bind('contactus_request', function(data) {
        updateCount('contactus-ref',data.message)
    });
</script>