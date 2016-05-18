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

function fn_intarget_intarget_reg_info() {
    $storefront_url = fn_get_storefront_url(fn_get_storefront_protocol());
    if (!empty($storefront_url)) {
        return __('intarget.auth', array('[http_location]' => $storefront_url, '[reg_intarget]' => fn_url('intarget.auth'),));

    } else {
        return __('intarget.text_fill_fields');
    }
}

function fn_intarget_decs() {
    return __('intarget.intarget_desc');
}

function fn_intarget_help1() {
    return __('intarget.intarget_help1');
}

function fn_intarget_help2() {
    return __('intarget.intarget_help2');
}

function fn_intarget_help3() {
    return __('intarget.intarget_help3');
}

function fn_intarget_help4() {
    return __('intarget.intarget_help4');
}

function fn_intarget_get_reg($email, $key, $url) {
    if (($email == '') OR ($key == '') OR ($url == '')) {
        return false;
    }
    $ch = curl_init();
    $jsondata = json_encode(array('email' => $email, 'key' => $key, 'url' => $url, 'cms' => 'wordpress'));
    $options = array(CURLOPT_HTTPHEADER => array('Content-Type:application/json', 'Accept: application/json'), CURLOPT_URL => "http://intarget-dev.lembrd.com/" . "/api/registration.json", CURLOPT_POST => 1, CURLOPT_POSTFIELDS => $jsondata, CURLOPT_RETURNTRANSFER => true,);
    curl_setopt_array($ch, $options);
    $json_result = json_decode(curl_exec($ch));
    curl_close($ch);
    if (isset($json_result->status)) {
        if (($json_result->status == 'OK') && (isset($json_result->payload))) {
        } elseif ($json_result->status = 'error') {
        }
    }
    return $json_result;
}

function fn_intarget_script() {
    $id = db_get_row("SELECT * FROM ?:intarget");
    $id = $id['project_id'];
    return '
  <script type="text/javascript">
    (function(d, w, c) {
      w[c] = {
        projectId: '. $id .'
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

    })(document, window, "inTargetInit");
  </script>';
}