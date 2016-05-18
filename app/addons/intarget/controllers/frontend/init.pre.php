<?php

if(!defined('BOOTSTRAP')) {
	die('Access denied');
}
use Tygh\Registry;

/*
 * Выводит скрипт inTarget на сайт
 */
$intarget_code = fn_intarget_script();
echo $intarget_code;

