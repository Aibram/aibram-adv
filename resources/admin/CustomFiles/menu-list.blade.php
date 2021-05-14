<script type="text/javascript" src="{{asset('assets/js/jquery-menu-editor.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js')}}"></script><script>
    jQuery(document).ready(function () {
        /* =============== DEMO =============== */
        // menu items
        // [{"href":"http://home.com","icon":"fas fa-home","text":"Home", "target": "_top", "title": "My Home"},{"icon":"fas fa-chart-bar","text":"Opcion2"},{"icon":"fas fa-bell","text":"Opcion3"},{"icon":"fas fa-crop","text":"Opcion4"},{"icon":"fas fa-flask","text":"Opcion5"},{"icon":"fas fa-map-marker","text":"Opcion6"},{"icon":"fas fa-search","text":"Opcion7","children":[{"icon":"fas fa-plug","text":"Opcion7-1","children":[{"icon":"fas fa-filter","text":"Opcion7-1-1"}]}]}]
        var arrayjson = @json($category->children);
        // icon picker options
        var iconPickerOptions = {searchText: "Buscar...", labelHeader: "{0}/{1}"};
        // sortable list options
        var sortableListOptions = {
            placeholderCss: {'background-color': "#cccccc"}
        };
        var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions});

        editor.setForm($('#frmEdit'));
        editor.setUpdateButton($('#btnUpdate'));
        editor.setData(arrayjson);
        $('#btnOutput').on('click', function () {
            var str = editor.getString();
            $("#out").text(str);
        });

        $("#btnUpdate").click(function(){
            var fd = new FormData();
            editor.getForm().find('.item-menu').each(function(){
                console.log($(this).attr('name') , $(this).val());
                fd.append( $(this).attr('name'), $(this).val() );
            });
            if($('#photo')[0].files.length>0)
                fd.append('photo', $('#photo')[0].files[0]);
            fd.append('ajax', true);
            fd.append('_token', "{{csrf_token()}}");
            // fd.append('_method', "put");
            console.log( editor.getCurrentItem().data());
            var id = editor.getCurrentItem().data().id;
            fd.append('id', id);
            $.ajax({
                url: "{{route('admin.categories.updateCat')}}",
                data: fd,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                    console.log(data);
                    editor.update(data.category);
                    $('#icon').attr("src","");
                }
            });
        });

        $('#btnAdd').click(function(){
            var fd = new FormData();
            editor.getForm().find('.item-menu').each(function(){
                console.log($(this).attr('name') , $(this).val());
                fd.append( $(this).attr('name'), $(this).val() );
            });
            if($('#photo')[0].files.length>0)
                fd.append('photo', $('#photo')[0].files[0]);
            fd.append('ajax', true);
            fd.append('_token', "{{csrf_token()}}");
            $.ajax({
                url: "{{route('admin.categories.store')}}",
                data: fd,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                    console.log(data);
                    editor.add(data.category);
                }
            });

        });
        $('.btnRemove').click(function(e){
            e.preventDefault();

            if (confirm('سوف يتم حذف هذا العنصر')) {
                var elem = $(this);
                console.log(elem);
                var fd = new FormData();
                var id = $(this).closest('li').data().id;
                fd.append('_token', "{{csrf_token()}}");
                fd.append('id', id);
                $.ajax({
                    url: "{{route('admin.categories.removeCat')}}",
                    data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(data){
                        editor.remove(elem);
                    }
                });
            }
        });
        $('#saveStructure').click(function(){
            $('#structure').val(editor.getString());
            $('#myForm').submit();
        });

        /* ====================================== */

        /** PAGE ELEMENTS **/
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
