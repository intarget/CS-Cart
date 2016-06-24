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

function fn_intarget_delete_cart_product(&$cart, $cart_id, $full_erase) {
    if ($full_erase) {
        setcookie('INTARGET_DEL', 'Y', '', '/');
    }
}

function fn_intarget_get_reg($email, $key, $url) {
    if (($email == '') OR ($key == '') OR ($url == '')) {
        return false;
    }
    $ch = curl_init();
    $jsondata = json_encode(array('email' => $email, 'key' => $key, 'url' => $url, 'cms' => 'cscart'));
    $options = array(
        CURLOPT_HTTPHEADER => array('Content-Type:application/json',
            'Accept: application/json'),
        CURLOPT_URL => "https://intarget.ru/" . "/api/registration.json",
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $jsondata,
        CURLOPT_RETURNTRANSFER => true
    );
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
      s.src = "//rt.intarget.ru/loader.js";
      if (w.opera == "[object Opera]") {
          d.addEventListener("DOMContentLoaded", f, false);
      } else { f(); }

    })(document, window, "inTargetInit");';
}
