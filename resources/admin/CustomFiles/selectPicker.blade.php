<script>
    $('.kt-selectpicker').selectpicker(
            {
                noneSelectedText: '{{ __('base.none') }}'

            }
    );
    $('.icp-auto').iconpicker({
        title: '{{ __('base.choose_icon') }}',
        showFooter:false,
        templates: {
            popover: '<div class="iconpicker-popover popover show"><div class="arrow"></div>' + '<div class="popover-title"></div><div class="popover-content"></div></div>',
            iconpickerItem: '<a role="button" href="javascript:;" class="iconpicker-item"><i></i></a>'
        }
    });
</script>