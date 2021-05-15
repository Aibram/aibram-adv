<script src="{{asset('assets/vendors/custom/jstree/jstree.bundle.js')}}" type="text/javascript"></script>

    <script>
        blockSection('#formCard',{
                overlayColor: '#000000',
                type: '',
                state: 'success',
                message: '{{__("pages.categories.click_first")}}'
            })
        function sendAjaxReq(req={},method="POST",route,callback){
            var fd = new FormData();
            if(Object.keys(req).length > 0){
                for(key in req){
                    fd.append( key,req[key] );
                }
            }
            else{
                $('#frmEdit').find('.item-menu').each(function(){
                    console.log($(this).attr('name') , $(this).val());
                    fd.append( $(this).attr('name'), $(this).val() );
                });
                if($('#photo')[0].files.length>0)
                    fd.append('photo', $('#photo')[0].files[0]);
            }
            if(method!="POST"){
                fd.append('_method', "put");
            }
            fd.append('ajax', true);
            fd.append('_token', "{{csrf_token()}}");
            $.ajax({
                url: route,
                data: fd,
                processData: false,
                contentType: false,
                type: method,
                success: function(data){
                    callback('.item-menu',data.data)
                }
            });
        }
        function getCategoryDetails(route,id,callback){
            
            $.ajax({ 
                type: 'GET',
                url: route,
                data: {id},
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    unblockSection('#formCard')
                    callback('.item-menu',data)
                }
            });
        }
        function unblockSection(id){
            KTApp.unblock(id);
        }
        function blockSection(id,options){
            KTApp.block(id, options);
        }
        function setItemVal(elem, controlType, newVal) {
            switch (controlType) {
                case 'INPUT':
                    if (elem.type && elem.type === 'checkbox')
                        $(elem).prop("checked", newVal);
                    else
                        $(elem).val(newVal);
                    break; 
                case 'SELECT':
                    // Set the value for select list
                    $(elem).val(newVal);
                    break;
                case 'IMG':
                    // Set the value for Img list
                    $(elem).attr("src",newVal);
                break;
            }
        }
        function setFormWithData(itemClass,dataJSon){
            $(itemClass).each(function(i, obj) {
                // console.log(obj,obj.tagName,dataJSon[obj.name])
                setItemVal(obj,obj.tagName,dataJSon[obj.name])
            });
        }
        $(".kt_tree").jstree({
            "core": {
                "themes": {
                    "responsive": false
                },
                // so that create works
                "check_callback": true,
                'data': {
                    'url': function(node) {
                        return '{{route("catList")}}';
                    },
                    'data': function(node) {
                        return { 'parent_id': node.id=="#"?null:node.id };
                    }
                }
            },
            "contextmenu":{        
                "select_node": false,
                "items": {
                    "create" : {
                        "separator_before"	: false,
                        "separator_after"	: true,
                        "_disabled"			: false, //(this.check("create_node", data.reference, {}, "last")),
                        "label"				: "{{ __('pages.categories.new') }}",
                        "action"			: function (data) {
                            var inst = $.jstree.reference(data.reference),
                                obj = inst.get_node(data.reference);
                            inst.create_node(obj, {}, "last", function (new_node) {
                                try {
                                    inst.edit(new_node,"rrr",function(){
                                        blockSection('#treeCard',{
                                            overlayColor: '#000000',
                                            type: '',
                                            state: 'success',
                                            message: '{{__("pages.categories.wait")}}'
                                        })
                                        serverObj = {
                                            parent_id: obj.id,
                                            name: new_node.text,
                                            desc: 'desc'
                                        }
                                        // setFormWithData('.item-menu',serverObj);
                                        
                                        // setTimeout(function() {
                                        //     $(".kt_tree").jstree(true).refresh();
                                        // }, 200);
                                        sendAjaxReq(serverObj,'POST','{{route("insertCat")}}',function() {
                                            unblockSection('#treeCard')
                                            $(".kt_tree").jstree(true).refresh();
                                        })
                                        // KTApp.unblock('#block_cat');

                                        //Get cat id from obj.a_attr
                                        //and get the name of new category from new_node
                                        //block UI of right side of categories until
                                        //creatng a new one with ajax and click save
                                        //then unblock it and clear left side
                                        //and the same thing for editing not creating
                                        console.log(serverObj);

                                    });
                                } catch (ex) {
                                    setTimeout(function () { inst.edit(new_node); },0);
                                }
                            });
                        }
                    },
                }
            },
            "state": { "key": "selected" },
            "plugins": ["contextmenu", "state"]
        });
        $(".kt_tree").on(
            "select_node.jstree", function(evt, data){
                blockSection('#formCard',{
                    overlayColor: '#000000',
                    type: '',
                    state: 'success',
                    message: '{{__("pages.categories.click_first")}}'
                })
                getCategoryDetails('{{route("getSingleCatList")}}',data.node.id,setFormWithData)
            }
        );
        $("#btnUpdate").click(function(){
            var fd = new FormData();
            $('.item-menu').each(function(){
                // console.log($(this).attr('name') , $(this).val());
                fd.append( $(this).attr('name'), $(this).val() );
            });
            if($('#photo')[0].files.length>0)
                fd.append('photo', $('#photo')[0].files[0]);
            fd.append('ajax', true);
            fd.append('_token', "{{csrf_token()}}");
            // fd.append('_method', "put");
            var id = editor.getCurrentItem().data().id;
            fd.append('id', id);
            $.ajax({
                url: '{{route("updateCat")}}',
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

    </script>