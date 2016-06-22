<?php

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}
use Tygh\Registry;

/*
 * Выводит скрипт inTarget на сайт
 */
if ($mode == 'view') {
    $item_view = "(function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('item-view');
                console.log('item-view');
            });
        })(window, 'inTargetCallbacks')";
    Tygh::$app['view']->assign('intarget_iview', $item_view);
}


if ($mode == 'quick_view') {
    if (defined('AJAX_REQUEST')) {
        Tygh::$app['session']['intarget_view_item'] = true;
    }
}
