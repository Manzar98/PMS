<?php
  
	define('APP_PATH', str_replace(DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, str_replace('_config', '', dirname(__FILE__)) . DIRECTORY_SEPARATOR));

	// Environments setup
	// echo APP_PATH;
	require_once APP_PATH . '_config/config.envs.php';


	if(isset($_SERVER['SCRIPT_NAME'])) 
	{
		# on Windows _APP_MAIN_DIR becomes \ and abs url would look something like HTTP_HOST\/restOfUrl, so \ should be trimed too
		
		$app_main_dir = rtrim(dirname($_SERVER['SCRIPT_NAME']),'/\\');	
		define('_APP_MAIN_DIR', $app_main_dir);
  	} 
	else 
	{
		die('[config.php] Cannot determine APP_MAIN_DIR, please set manual and comment this line');
  	}
	
	
	// Function and classes includes

			
	require_once APP_PATH . '_includes/class.Translator.php';
	require_once APP_PATH . '_includes/class.EmailTranslator.php';
	require_once APP_PATH . '_includes/function.validate_email.php';
	require_once APP_PATH . '_includes/function.redirect_to.php';
	require_once APP_PATH . '_includes/function.printr.php';
	require_once APP_PATH . '_includes/function.escape.php';
	require_once APP_PATH . '_includes/functions.php';
	require_once APP_PATH . '_includes/recaptchalib.php';
	require_once APP_PATH . '_includes/class.phpmailer.php';
	require_once APP_PATH . '_includes/class.Postman.php';
	require_once APP_PATH . '_includes/class.Sanitizer.php';
	//require_once APP_PATH . '_includes/class.Db.php';
	// comment the previous line and uncomment the next line if you get a Class 'mysqli' not found error
	require_once APP_PATH . '_includes/class.Db.MySql.php';
	require_once APP_PATH . '_includes/class.Paginator.php';
	require_once APP_PATH . '_includes/class.Settings.php';
	require_once APP_PATH . '_includes/class.FormValidator.php';
	require_once APP_PATH . '_includes/smarty/libs/Smarty.class.php';


	require_once APP_PATH . '_includes/class.Patient.php';
	require_once APP_PATH . '_includes/class.Medicine.php';
	require_once APP_PATH . '_includes/class.Test.php';
	require_once APP_PATH . '_includes/class.Instruction.php';
	require_once APP_PATH . '_includes/class.Prescription.php';
	require_once APP_PATH . '_includes/class.Users.php';
	require_once APP_PATH . '_includes/class.Work_days.php';
	require_once APP_PATH . '_includes/class.Appointment.php';
	require_once APP_PATH . '_includes/class.Report.php';
	require_once APP_PATH . '_includes/class.Packages.php';
	// Setup database connection
	try 
	{
		$db = new Db(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
		$db->Execute('SET NAMES UTF8');
	}
	catch(ConnectException $exception) 
	{
		if (ENVIRONMENT == 'dev')
		{
			echo "Database Connection Error:<br />";
			printr($exception->getMessage());	
		}
	}
	
	
	// Load the Site-Specific Settings
	$website_settings = new WebsiteSettings();
	$settings = $website_settings->GetSettings();
	
	require_once APP_PATH . '_config/config.settings.php';
	// Setup Smarty
	$smarty = new Smarty();
	$smarty->template_dir = APP_PATH . '_templates' . DIRECTORY_SEPARATOR . THEME . DIRECTORY_SEPARATOR;
	$smarty->compile_dir = APP_PATH .'_templates' . DIRECTORY_SEPARATOR . THEME . DIRECTORY_SEPARATOR . '_cache';
	


	// Split URL - get parameters
	$_app_info['params'] = array();
	
	if (isset($_SERVER['HTTP_X_ORIGINAL_URL']))
	{
		$_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_ORIGINAL_URL'];
	}
	if (isset($_SERVER['HTTP_X_REWRITE_URL']))
	{
		$_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_REWRITE_URL'];
	}		
	// if server is Apache:	
	if(REWRITE_MODE == 'apache_mod_rewrite' || REWRITE_MODE == 'iis_isapi_rewrite')
	{
		$newUrl = str_replace('/', '\/', _APP_MAIN_DIR);
	    $pattern = '/'.$newUrl.'/';   
	    $_url = preg_replace($pattern, '', $_SERVER['REQUEST_URI'], 1);
		$_tmp = explode('?', $_url);
		$_url = $_tmp[0];	
		
		if ($_url = explode('/', $_url))
		{
			foreach ($_url as $tag)
			{
				if ($tag)
				{
					$_app_info['params'][] = $tag;
				}
			}
		}
	}
	elseif(REWRITE_MODE == 'iis_url_rewrite')
	{
		if(isset($_GET['page']))
			$_app_info['params'][]  = $_GET['page'];
		if(isset($_GET['id']))
			$_app_info['params'][]  = $_GET['id'];
		if(isset($_GET['extra']))
			$_app_info['params'][]  = $_GET['extra'];
	}
	
	$page = (isset($_app_info['params'][0]) ? $db->real_escape_string($_app_info['params'][0]) : '');
	$id = (isset($_app_info['params'][1]) ? $db->real_escape_string($_app_info['params'][1]) : 0);
	$extra = (isset($_app_info['params'][2]) ? $db->real_escape_string($_app_info['params'][2]) : '');
	
	
	date_default_timezone_set('Asia/Karachi');
	header('Content-Type: text/html; charset=UTF-8');
	session_start();
?>