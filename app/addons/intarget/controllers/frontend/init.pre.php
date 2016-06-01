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