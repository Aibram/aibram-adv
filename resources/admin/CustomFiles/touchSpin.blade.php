<script src="{{asset('assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
    <script>
        $('#{{ $id }}').TouchSpin({
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',
            min: 16,
            max: 100,
            step: 1,
            boostat: 5,
            maxboostedstep: 10,
        });
</script>