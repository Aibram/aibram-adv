function handleFavorite(elem) {
    var obj = {
        advertisement_id: $(elem).data('id'),
        user_id: $('meta[name=user_id]').attr('content')
    }
    if ($(elem).hasClass('fav-add')) {
        sendAjaxReq(obj, "POST", addFavoriteURL, function(data) {
            if ($(elem).hasClass('btn')) {
                $(elem).html(`
                    <i class="fa fa-heart ml-2"></i>${data.message}
                `);
            }
            $('#fav_number').html(
                `<p class="text-white text-bold" id="fav_number">
                    <i class="fa fa-heart ml-2"></i> ${data.count}
                    ${favWord}
                </p>`
            )
            $(elem).removeClass('fav-add').addClass('fav-remove')
        }, true, true)
    } else if ($(elem).hasClass('fav-remove')) {
        sendAjaxReq(obj, "POST", removeFavoriteURL, function(data) {
            if ($(elem).hasClass('btn')) {
                $(elem).html(`
                    <i class="fa fa-heart ml-2"></i>${data.message}
                `);
            }
            $('#fav_number').html(
                `<p class="text-white text-bold" id="fav_number">
                    <i class="fa fa-heart ml-2"></i> ${data.count}
                    ${favWord}
                </p>`
            )
            $(elem).removeClass('fav-remove').addClass('fav-add')
        }, true, true)
    }
}