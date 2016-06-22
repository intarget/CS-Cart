(function (_, $) {
    $(document).on('click', 'button[type=submit][name^="dispatch[checkout.add"]', function () {
        document.cookie = "INTARGET_ADD=Y; path=/;";
        console.log('cookie-add-to-cart');
    });

    $.ceEvent('on', 'ce.ajaxdone', function (elms, inline_scripts, params, data) {
        if (data['html']['product_quick_view']) {
            document.cookie = "INTARGET_IVIEW=Y; path=/;";
            console.log('cookie-ajax-item-view');
        }
    });
})(Tygh, Tygh.$);