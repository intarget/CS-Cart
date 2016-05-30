<?php

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}
use Tygh\Registry;

/*
 * Выводит скрипт inTarget на сайт
 */
if ($mode == 'view') {
    echo "<script type='text/javascript'>
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('item-view');
                console.log('item-view');
            });
        })(window, 'inTargetCallbacks');
        </script>";
}

if ($mode == 'quick_view') {
    if (defined('AJAX_REQUEST')) {
        echo "<script type='text/javascript'>
            (function($){
               inTarget.event('item-view');
               console.log('item-view');
            })($);
        </script>";
    }
}
