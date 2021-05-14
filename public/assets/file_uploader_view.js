function checkPhotos(input,sectionID) {
    if($(sectionID + " > img").length===0){
        $(input).val('');
        var content = {};
        content.message = "بعض الصور لم تطابق الطول والعرض المطلوبين او الحجم المطلوب";
        content.title = 'خطأ';
        var notify = $.notify(content, {
            type: 'danger',
            allow_dismiss: false,
            newest_on_top: true,
            mouse_over:  true,
            showProgressbar:  false,
            spacing: 12,
            timer: 1500,
            placement: {
                from: 'bottom',
                align: 'right'
            },
            offset: {
                x: 30,
                y: 30
            },
            delay: 1000,
            z_index: 100000,
            animate: {
                enter: 'animated shake',
                exit: 'animated tada'
            }
        });

    }

}

$( ".img-view" ).change(function() {
    readURL(".img-view","#images");
    setTimeout( function(){
        checkPhotos(".img-view","#images");
    }, 200 );
});

function readURL(input,sectionID) {
    $(sectionID).empty();
    files=$(input).prop('files');
    if (files) {
        var changes=false;
        for(let i=0;i<files.length;i++){
            if(files[i].size/1024 > 2048){
                console.log(files[i].size);
                continue;
            }
            var reader = new FileReader();
            reader.readAsDataURL(files[i]);
            reader.onload = function (e) {
                var image = new Image();
                image.src = e.target.result;
                var imageChange=false;
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    console.log(height + " " + width);
                    if (height < 800 || width < 1600) {
                        console.log('Dimension Problem');
                        imageChange=changes=true;
                        return false;
                    }
                    else{
                        $(sectionID).append('<img class="col-md-4" src="'+image.src+'" />');
                    }
                };
            };
        }
    }
}
