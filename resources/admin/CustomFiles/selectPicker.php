<script>
    var KTBootstrapSelect = function () {
    
    // Private functions
    var demos = function () {
        // minimum setup
        $('.kt-selectpicker').selectpicker(
            {
                noneSelectedText: '{{ __('base.none') }}'

            }
        );
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
    }();

    jQuery(document).ready(function() {
        KTBootstrapSelect.init();
    });
</script>