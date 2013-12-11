<?php

require_once( dirname(__FILE__) . '/../../civicrm.settings-private.php');

$_REQUEST['name'] = HEWEB_TECHADMIN_USER; 
$_REQUEST['pass'] = HEWEB_TECHADMIN_PASSWORD;
$_REQUEST['key'] = CIVICRM_SITE_KEY; 
$_GET['key'] = CIVICRM_SITE_KEY; 

include( dirname(__FILE__) . '/cron.php');

?>