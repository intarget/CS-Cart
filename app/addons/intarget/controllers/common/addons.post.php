<?php

use Tygh\Registry;
use Tygh\Http;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($mode == 'update' && $_REQUEST['addon'] == 'intarget') {
		$key = Registry::get('addons.intarget.intarget_apikey');
		$email = Registry::get('addons.intarget.intarget_email');
		$url = fn_get_storefront_url(fn_get_storefront_protocol());
		$result = fn_intarget_get_reg($email, $key, $url);
		if (is_object($result)) {
			if (($result->status == 'OK') && (isset($result->payload))) {
				$intarget_id = db_get_row("SELECT * FROM ?:intarget");
				$intarget_id = fn_intarget_script($intarget_id['project_id']);

				if(empty($intarget_id)){
					db_query("INSERT INTO ?:intarget ?e", array('project_id'=>$result->payload->projectId));
				} else db_query("UPDATE ?:intarget SET ?e", array('project_id'=>$result->payload->projectId));

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
	}
}