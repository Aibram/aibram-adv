<script src="{{asset('assets/vendors/custom/jstree/jstree.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('js/ajaxReq.js')}}" type="text/javascript"></script>

    <script>
        // console.log($.jstree.defaults.core);
        blockSection('#formCard',{
                overlayColor: '#000000',
                type: '',
                state: 'success',
                message: '{{__("pages.categories.click_first")}}'
        })
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
                    else{
                        console.log(newVal);
                        $(elem).val(newVal);
                        newVal && typeof newVal == "string" && newVal.includes("fa-") && $('.icp-auto').data('iconpicker').update(newVal, true);
                    }
                    break; 
                case 'SELECT':
                    // Set the value for select list
                    $(elem).val(newVal);
                    break;
                case 'IMG':
                    // Set the value for Img list
                    if(!newVal)
                        newVal = "{{asset('placeholder.jpg')}}"
                    $(elem).attr("src",newVal);
                break;
            }
        }
        function getItemVal(elem, controlType) {
            val=''
            switch (controlType) {
                case 'INPUT':
                    if (elem.type && elem.type === 'checkbox')
                        val = $(elem).is(":checked");
                    else if(elem.type && elem.type === 'file')
                        val = $(elem)[0].files[0]?$(elem)[0].files[0]:null
                    else
                        val = $(elem).val();
                    break; 
                case 'SELECT':
                    // Set the value for select list
                    val = $(elem).val();
                    break;
            }
            return val;
        }
        function setFormWithData(itemClass,dataJSon){
            $(itemClass).each(function(i, obj) {
                // console.log(obj,obj.tagName,dataJSon[obj.name])
                setItemVal(obj,obj.tagName,dataJSon[obj.id])
            });
        }
        function unblockPage(refresh=true) {
            unblockSection('#portlet_card')
            refresh && $(".kt_tree").jstree(true).refresh();
        }
        function blockPage() {
            blockSection('#portlet_card',{
                overlayColor: '#000000',
                type: '',
                state: 'success',
                message: '{{__("pages.categories.loading")}}'
            })
        }
        function clearInput(id){
            $(id).each(function(i, obj) {
                setItemVal(obj,obj.tagName,'')
            });
        }
        $(".kt_tree").jstree({
            "core": {
                "themes": {
                    "responsive": false
                },
                // so that create works
                'check_callback' : function (operation, node, node_parent, node_position, more) {
                    if (operation === 'move_node' && node.parent !== node_parent.id) {
                        return false;
                    }

                    return true;
                },
                'data': {
                    'url': function(node) {
                        return '{{route("catList")}}';
                    },
                    'dataFilter' : function (data) {
                        newData = JSON.parse(data);
                        // process the data any way you want (console.log(data) to see what you have, transform it and return the new object)
                        // keep in mind for some jQuery versions (older ones) you will have to return a string and not an object - if that is the case "return JSON.stringify(new_data);" will do
                        return JSON.stringify(newData.data);
                    },
                    'data': function(node) {
                        return { 
                            'parent_id': node.id=="#"?null:node.id,
                            'admin_id': "{{Auth::guard('admin')->id()}}"
                        };
                    }
                }
            },
            "contextmenu":{        
                "select_node": false,
                "items": {
                    @can('categories.edit', 'admin')
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
                                    inst.edit(new_node,"تصنيف جديد",function(){
                                        blockPage()
                                        sendAjaxReq({
                                            parent_id: obj.id,
                                            admin_id: "{{Auth::guard('admin')->id()}}",
                                            name: new_node.text,
                                            desc: new_node.text
                                        },'POST','{{route("insertCat")}}',function(){
                                            unblockPage()
                                        })
                                    });
                                } catch (ex) {
                                    setTimeout(function () { inst.edit(new_node); },0);
                                }
                            });
                        }
                    },
                    @endcan
                    @can('categories.destroy', 'admin')
                    "remove": {
                        "separator_before": false,
                        "separator_after": false,
                        "label": "{{ __('pages.categories.delete') }}",
                        "action": function (data) { 
                            var ref = $.jstree.reference(data.reference),
                                        node = ref.get_node(data.reference);
                            console.log(node)
                            ref.delete_node(node);
                            blockPage()
                            sendAjaxReq({
                                id: node.id,
                                admin_id: "{{Auth::guard('admin')->id()}}"
                            },'DELETE','{{route("deleteCat")}}',function(){
                                unblockPage()
                            })
                        }
                    }
                    @endcan
                }
            },
            "types": {
                "max_depth": 3,
            },
            "state": { "key": "selected" },
            "plugins": ["contextmenu", "state","types","dnd"]
        }).bind("move_node.jstree", function(e, data) {
            console.log("Drop node " + data.node.id + " to " + data.parent);
        });;
        $(".kt_tree").on(
            "select_node.jstree", function(evt, data){
                clearInput('.item-menu')
                unblockSection('#formCard')
                blockPage()
                console.log(data.node.id);
                sendAjaxReq(
                    {
                        id:data.node.id,
                        admin_id: "{{Auth::guard('admin')->id()}}"
                    },'GET','{{route("getSingleCatList")}}',function(data){
                    console.log("dsfsdf");
                    setFormWithData('.item-menu',data);
                    unblockPage(false)
                },false)
            }
        );
        $("#btnUpdate").click(function(){
            itemClass = '.item-menu';
            var fd = new FormData();
            var req = {}
            $(itemClass).each(function(i, obj){
                req[obj.id] = getItemVal(obj,obj.tagName);
            });
            req['admin_id'] = "{{Auth::guard('admin')->id()}}";
            console.log($(".kt_tree").jstree("get_selected"));
            req['id'] = $(".kt_tree").jstree("get_selected")[0];
            sendAjaxReq(req,'PUT','{{route("updateCat")}}',function(){
                clearInput(itemClass)
                (".kt_tree").jstree().deselect_all(true);
            });
        });
        $("form").submit(function(e){
            itemClass = '.item-menu';
            var fd = new FormData();
            var req = {}
            $(itemClass).each(function(i, obj){
                req[obj.id] = getItemVal(obj,obj.tagName);
            });
            req['admin_id'] = "{{Auth::guard('admin')->id()}}";
            console.log($(".kt_tree").jstree("get_selected"));
            req['id'] = $(".kt_tree").jstree("get_selected")[0];
            sendAjaxReq(req,'PUT','{{route("updateCat")}}',function(){
                clearInput(itemClass)
                (".kt_tree").jstree().deselect_all(true);
            });
        });
        $('#btnCreate').click(function() {

        $(".kt_tree").jstree().create_node('#', {
        "id": "",
        "text": ""
        }, "last", function(new_node) {
            // console.log(new_node)
            $(".kt_tree").jstree().edit(new_node,"تصنيف جديد",function(){
                console.log(new_node)
                blockPage()
                sendAjaxReq({
                    parent_id: null,
                    admin_id: "{{Auth::guard('admin')->id()}}",
                    name: new_node.text,
                    desc: new_node.text
                },'POST','{{route("insertCat")}}',function(){
                    unblockPage()
                })
            });
        });
        });

    </script>