<?php

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}
use Tygh\Registry;

/*
 * ������� ������ inTarget �� ����
 */
if ($mode == 'view') {
    Tygh::$app['session']['intarget']['cview'] = 'success';
}