<?php

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}
use Tygh\Registry;

/*
 * Выводит скрипт inTarget на сайт
 */
if ($mode == 'view') {
    Tygh::$app['session']['intarget']['iview'] = 'success';
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
