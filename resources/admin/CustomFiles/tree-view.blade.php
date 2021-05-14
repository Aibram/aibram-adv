<script src="{{asset('assets/vendors/custom/jstree/jstree.bundle.js')}}" type="text/javascript"></script>
    <script>
        $(".kt_tree").jstree({
            "core": {
                "themes": {
                    "responsive": false
                },
                // so that create works
                "check_callback": true,
            },
            "defaults": {
                "contextmenu": {
                    "select_node": false,
                }
            },
            "contextmenu":{         
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
                                        //Get cat id from obj.a_attr
                                        //and get the name of new category from new_node
                                        //block UI of right side of categories untill
                                        //left side is finished and click save
                                        //then unblock it and clear left side
                                        //and the same thing for editing not creating
                                        console.log({

                                        });

                                    });
                                } catch (ex) {
                                    setTimeout(function () { inst.edit(new_node); },0);
                                }
                            });
                        }
                    },
                    "rename" : {
                        "separator_before"	: false,
                        "separator_after"	: false,
                        "_disabled"			: false, //(this.check("rename_node", data.reference, this.get_parent(data.reference), "")),
                        "label"				: "Rename",
                        /*!
                        "shortcut"			: 113,
                        "shortcut_label"	: 'F2',
                        "icon"				: "glyphicon glyphicon-leaf",
                        */
                        "action"			: function (data) {
                            var inst = $.jstree.reference(data.reference),
                                obj = inst.get_node(data.reference);
                            inst.edit(obj);
                        }
                    },
                    "remove" : {
                        "separator_before"	: false,
                        "icon"				: false,
                        "separator_after"	: false,
                        "_disabled"			: false, //(this.check("delete_node", data.reference, this.get_parent(data.reference), "")),
                        "label"				: "Delete",
                        "action"			: function (data) {
                            var inst = $.jstree.reference(data.reference),
                                obj = inst.get_node(data.reference);
                            if(inst.is_selected(obj)) {
                                inst.delete_node(inst.get_selected());
                            }
                            else {
                                inst.delete_node(obj);
                            }
                        }
                    },
                }
            },
            "types": {
                "default": {
                    "icon": "fa fa-folder kt-font-brand"
                },
                "file": {
                    "icon": "fa fa-file  kt-font-brand"
                }
            },
            "state": { "key": "demo2" },
            "plugins": ["contextmenu", "state", "types"]
        });
        console.log($.jstree.defaults.contextmenu.items);
    </script>