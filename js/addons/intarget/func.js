(function (_, $) {
    $(document).on('click', 'button[type=submit][name^="dispatch[checkout.add"]', function () {
        inTarget.event('add-to-cart');
        console.log('add-to-cart');
    });

    $.ceEvent('on', 'ce.ajaxdone', function (elms, inline_scripts, params, data) {
        if (data['html']['product_quick_view']) {
            inTarget.event('ajax-item-view');
            console.log('ajax-item-view');
        }
    });
}(Tygh, jQuery));