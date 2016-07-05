<?php

if ( !defined('AREA') ) { die('Access denied');    }

use Tygh\Registry;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($mode == 'intarget_connect') {
        $intarget = empty($_REQUEST['intarget']) ? array() : $_REQUEST['intarget'];

        Registry::set('intarget.email', $intarget['email']);
        Registry::set('intarget.key', $intarget['apikey']);

        $url = fn_get_storefront_url(fn_get_storefront_protocol());;
        $result = fn_intarget_get_reg($intarget['email'],$intarget['apikey'], $url);
        if (is_object($result)) {
            if (($result->status == 'OK') && (isset($result->payload))) {
                $intarget_id = db_get_row("SELECT * FROM ?:intarget");
                if(empty($intarget_id['project_id'])){
                    db_query("INSERT INTO ?:intarget ?e", array(
                        'project_id'=>$result->payload->projectId,
                        'email'=>$intarget['email'],
                        'key'=>$intarget['apikey'])
                    );
                } else {
                    db_query("UPDATE ?:intarget SET `project_id`=".$result->payload->projectId.", `email`=".$intarget['email'].", `key`=".$intarget['apikey']);
                }
                if(!empty($result->payload->projectId)){
                    fn_set_notification('N', __('intarget'), __('intarget.success'));
                } else fn_set_notification('E', __('intarget'), __('intarget.error_1'));
            } elseif ($result->status = 'error') {
                switch($result->code){
                    case '403':
                        fn_set_notification('E', __('intarget'), __('intarget.error_403'));
                        break;
                    case '404':
                        fn_set_notification('E', __('intarget'), __('intarget.error_404'));
                        break;
                    case '500':
                        fn_set_notification('E', __('intarget'), __('intarget.error_500'));
                        break;
                    default:
                        fn_set_notification('E', __('intarget'), __('intarget.error_0'));
                        break;
                }
            }
        }
        return array(CONTROLLER_STATUS_REDIRECT, 'addons.update?addon=intarget');
    }
} elseif ($mode == 'update') {
    if ($_REQUEST['addon'] == 'intarget') {
        Tygh::$app['view']->assign('intarget_email', fn_intarget_email());
        Tygh::$app['view']->assign('intarget_key', fn_intarget_key());
        Tygh::$app['view']->assign('intarget_id', fn_intarget_id());
    }
}

