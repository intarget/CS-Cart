<?php

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}
use Tygh\Registry;

/*
 * Выводит скрипт inTarget на сайт
 */
if ($mode == 'view' || $mode == 'quick_view') {
    echo "<script>
        (function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('item-view');
                alert('item-view');
            });
        })(window, 'inTargetCallbacks');
        </script>
    ";
}
