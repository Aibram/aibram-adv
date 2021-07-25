<script src="{{asset('assets/vendors/general/jquery.repeater/src/lib.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/jquery.repeater/src/jquery.input.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/jquery.repeater/src/repeater.js')}}" type="text/javascript"></script>
<script>
    $('{{$selector}}').repeater({
            initEmpty: {{$initEmpty}},
           
            defaultValues: {
                'text-input': 'foo'
            },
             
            show: function() {
                $(this).slideDown();
                $('.kt-selectpicker').selectpicker(
                    {
                        noneSelectedText: '{{ __('base.none') }}'

                    }
                );                         
            },

            hide: function(deleteElement) {                 
                if(confirm('هل أنت متأكد من الحذف')) {
                    $(this).slideUp(deleteElement);
                }                                
            }      
    });
</script>