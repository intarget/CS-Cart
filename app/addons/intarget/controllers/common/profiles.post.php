<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

if ($mode == 'add') {
    Tygh::$app['session']['intarget']['register'] = 'success';
}
