<?php

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}
use Tygh\Registry;

/*
 * Выводит скрипт inTarget на сайт
 */

$id = fn_intarget_id();
if (!empty($id)) {
    $intarget_code = fn_intarget_script($id);
    Tygh::$app['view']->assign('intarget', $intarget_code);
}

if (Tygh::$app['session']['intarget_view_item']) {
    $add_item = "(function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('add-to-cart');
                console.log('add-to-cart');
            });
        })(window, 'inTargetCallbacks');";
    Tygh::$app['view']->assign('intarget_iview', $add_item);
    Tygh::$app['session']['intarget_view_item'] = false;
}