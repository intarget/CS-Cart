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
    echo $intarget_code;

    if (Tygh::$app['session']['intarget']['delete']) {
        unset(Tygh::$app['session']['intarget']['delete']);
        echo "<script type='text/javascript'>
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('del-from-cart');
                console.log('del-from-cart');
            });
        })(window, 'inTargetCallbacks');
        </script>";
    }

    if (Tygh::$app['session']['intarget']['order']) {
        unset(Tygh::$app['session']['intarget']['order']);
        echo "<script type='text/javascript'>
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('success-order');
                console.log('success-order');
            });
        })(window, 'inTargetCallbacks');
        </script>";
    }

    if (Tygh::$app['session']['intarget']['register']) {
        unset(Tygh::$app['session']['intarget']['register']);
        echo "<script type='text/javascript'>
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('user-reg');
                console.log('user-reg');
            });
        })(window, 'inTargetCallbacks');
        </script>";
    }

    if (Tygh::$app['session']['intarget']['add']) {
        unset(Tygh::$app['session']['intarget']['add']);
        echo "<script type='text/javascript'>
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('add-to-cart');
                console.log('add-to-cart');
            });
        })(window, 'inTargetCallbacks');
        </script>";
    }

    if (Tygh::$app['session']['intarget']['iview']) {
        unset(Tygh::$app['session']['intarget']['iview']);
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

    if (Tygh::$app['session']['intarget']['cview']) {
        unset(Tygh::$app['session']['intarget']['cview']);
        echo "<script type='text/javascript'>
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('cat-view');
                console.log('cat-view');
            });
        })(window, 'inTargetCallbacks');
        </script>";
    }
}