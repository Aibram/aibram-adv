<script src="{{asset('social-share/assets/js/socialshare.js')}}"></script>
<script>
    (function () {
            $('#social-sharing').hide();
            $('#share-ext').click(function(){
                $('#social-sharing').toggle();
            });
            $('.reply_now').click(function(){
                $('#respond').show()
                $('#comment_parent_input').val($(this).data('id'));
                console.log($('#comment_parent_input').val())
                $( 'html, body' ).animate({
                        scrollTop: $( '#respond' ).offset().top-100
                }, '600' );
            });
            $('.star').click(function(){
                $('#stars_input').val($(this).data('value'));
                console.log($('#stars_input').val())
            });
            
        }());
</script>