<?php

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}
use Tygh\Registry;

/*
 * ������� ������ inTarget �� ����
 */
if ($mode == 'view') {
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