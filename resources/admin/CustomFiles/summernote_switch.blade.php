<script src="{{asset('assets/vendors/general/summernote/dist/summernote.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/summernote-rtl-plugin-master/summernote-ext-rtl.js')}}" type="text/javascript"></script>
<script>
    var myElement = $('.summernote');
    myElement.summernote({
        height: 150,
        placeholder: 'إدخل التفاصيل',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link','picture', 'video', 'hr']],
            ['view', ['fullscreen', 'codeview']]
        ],
        callbacks: {
            // Register the `onChnage` callback in order to listen to the changes of the
            // Summernote editor. You can also use the event `summernote.change` to handle
            // the change event as follow:
            //   myElement.summernote()
            //     .on("summernote.change", function(event, contents, $editable) {
            //       // ...
            //     });
            onChange: function(contents, $editable) {
                // Note that at this point, the value of the `textarea` is not the same as the one
                // you entered into the summernote editor, so you have to set it yourself to make
                // the validation consistent and in sync with the value.
                myElement.val(myElement.summernote('isEmpty') ? "" : contents);

                // You should re-validate your element after change, because the plugin will have
                // no way to know that the value of your `textarea` has been changed if the change
                // was done programmatically.
                v.element(myElement);
            }
        }
    });
</script>

