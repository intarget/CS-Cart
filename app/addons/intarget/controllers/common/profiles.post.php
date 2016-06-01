<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

if ($mode == 'add') {
    $intarget_reg = "(function(w, c) {
        w[c] = w[c] || [];
            w[c].push(function(inTarget) {
            inTarget.event('user-reg');
            console.log('user-reg');
        });
        })(window, 'inTargetCallbacks')";
    Tygh::$app['view']->assign('intarget_reg', $intarget_reg);
}
