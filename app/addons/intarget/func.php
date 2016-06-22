<?php
/**
 * Plugin Name: intarget - виджет авторизации через социальные сети
 * Plugin URI:  https://intarget.ru/
 * Description: intarget — это
 * Version:     1.0.0
 * Author:      inTargetTeam
 * Author URI:  https://intarget.ru/
 * License:     GPL3
 */
if (!defined('BOOTSTRAP')) {
    die('Access denied');
}
use Tygh\Registry;
use Tygh\Http;
use Tygh\Mailer;

function fn_intarget_decs() {
    return __('intarget.intarget_desc');
}

function fn_intarget_set_admin_notification()
{
    if (!empty(fn_intarget_id())) {
        $message = __('intarget_connect_notification', array('[addon_link]' => fn_url('addons.update&addon=intarget')));
        fn_set_notification('N', __('notice'), $message, 'S');
    }
}

function fn_intarget_delete_cart_product(&$cart, $cart_id, $full_erase) {
    if ($full_erase) {
        $intarget_del = "(function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('del-from-cart');
                console.log('del-from-cart');
            });
        })(window, 'inTargetCallbacks');";
        Tygh::$app['view']->assign('intarget_del', $intarget_del);
    }
}
function fn_intarget_order_notification(&$order_info, &$order_statuses, &$force_notification) {
    if (isset($order_info)) {
        $order_success = "(function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('success-order');
                console.log('success-order');
            });
        })(window, 'inTargetCallbacks');";
        Tygh::$app['view']->assign('intarget_sorder', $order_success);
    }
}

function fn_intarget_add_to_cart(&$cart, &$product_id, &$cart_id) {
    $intarget_add = "(function(w, c) {
            w[c] = w[c] || [];
            w[c].push(function(inTarget) {
                inTarget.event('add-to-cart');
                console.log('add-to-cart-ajax');
            });
        })(window, 'inTargetCallbacks');";
    Tygh::$app['view']->assign('intarget_add', $intarget_add);
}

function fn_intarget_get_reg($email, $key, $url) {
    if (($email == '') OR ($key == '') OR ($url == '')) {
        return false;
    }
    $ch = curl_init();
    $jsondata = json_encode(array('email' => $email, 'key' => $key, 'url' => $url, 'cms' => 'cscart'));
    $options = array(CURLOPT_HTTPHEADER => array('Content-Type:application/json', 'Accept: application/json'), CURLOPT_URL => "http://intarget-dev.lembrd.com/" . "/api/registration.json", CURLOPT_POST => 1, CURLOPT_POSTFIELDS => $jsondata, CURLOPT_RETURNTRANSFER => true,);
    curl_setopt_array($ch, $options);
    $json_result = json_decode(curl_exec($ch));
    curl_close($ch);
    return $json_result;
}

function fn_intarget_id() {
    $intarget_id = db_get_row("SELECT * FROM ?:intarget");
    return !empty($intarget_id) ? intval($intarget_id['project_id']) : '';
}

function fn_intarget_email() {
    $intarget_id = db_get_row("SELECT * FROM ?:intarget");
    return !empty($intarget_id) ? ($intarget_id['email']) : '';
}

function fn_intarget_key() {
    $intarget_id = db_get_row("SELECT * FROM ?:intarget");
    return !empty($intarget_id) ? ($intarget_id['key']) : '';
}

function fn_intarget_script($id) {
    return '
    (function(d, w, c) {
      w[c] = {
        projectId: ' . $id . '
      };
      var n = d.getElementsByTagName("script")[0],
      s = d.createElement("script"),
      f = function () { n.parentNode.insertBefore(s, n); };
      s.type = "text/javascript";
      s.async = true;
      s.src = "//rt.intarget-dev.lembrd.com/loader.js";
      if (w.opera == "[object Opera]") {
          d.addEventListener("DOMContentLoaded", f, false);
      } else { f(); }

    })(document, window, "inTargetInit");';
}