<?php

	require_once '../_config/config.php';
	
	$currentDirectoryNames = explode('/', dirname($_SERVER['PHP_SELF']));
	
	define('CURRENT_DIRECTORY', end($currentDirectoryNames));
	$smarty->template_dir = APP_PATH . CURRENT_DIRECTORY. '/_templates/';
	$smarty->compile_dir = APP_PATH . CURRENT_DIRECTORY. '/_templates/_cache/';

	define('BASE_URL_ORIG', APP_URL);
	define('BASE_URL', APP_URL . 'admin/');
	print_r($_app_info['params']);
	$page = (isset($_app_info['params'][2]) ? $db->real_escape_string($_app_info['params'][2]) : '');
	$id = (isset($_app_info['params'][3]) ? $db->real_escape_string($_app_info['params'][3]) : 0);
	$extra = (isset($_app_info['params'][2]) ? $db->real_escape_string($_app_info['params'][2]) : '');
	
?>