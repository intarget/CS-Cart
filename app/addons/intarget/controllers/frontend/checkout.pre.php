<?php

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}
use Tygh\Registry;

/*
 * Выводит скрипт inTarget на сайт
 */
if ($mode == 'add') {
    echo "<script>
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('add-to-cart');
                alert('add-to-cart');
            });
        })(window, 'inTargetCallbacks');
        </script>
    ";
}

if ($mode == 'delete') {
    echo "<script>
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('del-from-cart');
                alert('del-from-cart');
            });
        })(window, 'inTargetCallbacks');
        </script>
    ";
}
