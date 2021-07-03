function sendAjaxReq(req, method = "POST", route, callback, showToaster = true, blockUI = false) {
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
    if (blockUI) {
        $.blockUI({ message: null });
    }
    $.ajax({
        ...ajaxJson,
        success: function(data) {
            if (blockUI) {
                $.unblockUI()
            }
            if (data.status != 200) {
                //Toaster Error
                if (showToaster)
                    toastr.error(data.message)
            } else {
                //Toaster Success
                if (showToaster)
                    toastr.success(data.message)
                callback(data.data)
            }
        }
    })
}

function setUrlFields(params) {
    const urlParams = new URLSearchParams(window.location.search);
    for (property in params) {
        urlParams.set(property, params[property])
    }
    var newUrl = window.location.origin + window.location.pathname + "?" + urlParams.toString();
    history.pushState({}, null, newUrl);
}

function fillParamsObjectFromUrl(params) {
    const urlParams = new URLSearchParams(window.location.search);
    for (var pair of urlParams.entries()) {
        if (pair[0] in params)
            params[pair[0]] = pair[1];
    }
}