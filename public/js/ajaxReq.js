function sendAjaxReq(req, method = "POST", route, callback) {
    var ajaxJson = {
        url: route,
    }
    if (method != "GET") {
        var fd = new FormData();
        for (key in req) {
            fd.append(key, req[key]);
        }
        fd.append('ajax', true);
        fd.append('_token', "{{csrf_token()}}");
        if (method == "PUT") {
            fd.append('_method', "put");
            method = "POST"
        }
        if (method == "DELETE") {
            fd.append('_method', "delete");
            method = "POST"
        }
        ajaxJson['data'] = fd
        ajaxJson['processData'] = false
        ajaxJson['contentType'] = false
    } else {
        ajaxJson['dataType'] = 'json'
        ajaxJson['data'] = req
    }
    ajaxJson['type'] = method
    console.log(ajaxJson);
    $.ajax({
        ...ajaxJson,
        success: function(data) {
            if (data.status != 200) {
                //Toaster Error
                toastr.error(data.message)
            } else {
                //Toaster Success
                toastr.success(data.message)
                callback(data.data)
            }
        }
    })
}