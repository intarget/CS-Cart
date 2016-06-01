<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

fn_register_hooks(
    'add_to_cart',
    'order_notification',
    'delete_cart_product'
);