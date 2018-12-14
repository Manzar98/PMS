<?php

if(!file_exists('config.php')) 
{
	die('[index.php] config.php not found');
}

require_once 'config.php';

$translator = new Translator(LANG_CODE);
$translations = $translator->getTranslations();

$smarty->assign('translations', $translations);

$flag = 0;
$js = array();
if(!isset($_SERVER['HTTP_REFERER'])) {
	$_SERVER['HTTP_REFERER'] = '';
}
	 // echo $page;
// print_r($_SESSION);
switch($page)
{
		// home		
	case '':
			#show login page only if the admin is not logged in
			#else show homepage
	if(!isset($_SESSION['AdminId']))
	{
		require_once 'page_login.php';			
	}
	else
	{				
		require_once 'page_home.php';
	}
	$flag = 1;
	break;
	case 'logout':
	$flag = 1;
	if (isset($_SESSION['AdminId']))
	{			
		unset($_SESSION['AdminId']);
		redirect_to(BASE_URL);
		exit;
	}
	break;

	case 'home':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'page_home.php';
	$flag = 1;
	break;

	case 'doc-appointments':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_appointments/doc_appointments.php';
	$flag = 1;
	break;

	case 'list-appointments':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_appointments/list_appointments.php';
	$flag = 1;
	break;
	
	case 'reports':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_reports/reports.php';
	$flag = 1;
	break;

	case 'patients':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_patients/page_patients.php';
	$flag = 1;
	break;

	case 'patient-lifestyle':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_patients/page_patient_lifestyle.php';;
	$flag = 1;
	break;
	case 'patient-relatives':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_patients/page_patient_relatives.php';;
	$flag = 1;
	break;	
	case 'patient-family-history':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_patients/page_family_history.php';;
	$flag = 1;
	break;			
	case 'patient-other-history':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_patients/page_other_history.php';;
	$flag = 1;
	break;
	case 'add-prescription':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_prescription/add_prescription.php';;
	$flag = 1;
	break;	
	case 'edit-prescription':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_prescription/edit_prescription.php';;
	$flag = 1;
	break;			
	case 'prescriptions':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_prescription/prescriptions.php';;
	$flag = 1;
	break;						
	case 'medicine':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'page_medicine.php';
	$flag = 1;
	break;

	case 'tests':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_tests/page_tests.php';
	$flag = 1;
	break;

	case 'test-options':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_tests/page_test_options.php';
	$flag = 1;
	break;
	case 'instructions':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_instructions/page_instructions.php';
	$flag = 1;
	break;
	
	case 'page-unavailable':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	$html_title = 'Page unavailable / ' . SITE_NAME;
	$template = 'error.tpl';
	$flag = 1;
	break;


	case 'pages':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'page_pages.php';
	$flag = 1;
	break;

	case 'password':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'page_password.php';
	$html_title = 'Change password / ' . SITE_NAME;
	$template = 'password.tpl';
	$flag = 1;
	break;

	case 'add-users':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}elseif (empty($_SESSION['UserType'])) {
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_users/add_users.php';
	$flag = 1;
	break;

	case 'edit-users':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_users/edit_user.php';
	$flag = 1;
	break;

	case 'users':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_users/users.php';
	$flag = 1;
	break;

	case 'packages':
	print_r($_SESSION);
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}elseif (empty($_SESSION['UserType'])) {
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_packages/packages.php';
	$flag = 1;
	break;

	case 'add-package':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}elseif (empty($_SESSION['UserType'])) {
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'dir_packages/add_package.php';
	$flag = 1;
	break;
	
	case 'own-package':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'own_package.php';
	$flag = 1;
	break;
	
	case 'links':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'page_links.php';
	$flag = 1;
	break;
	case 'settings':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'page_settings.php';
	$flag = 1;
	break;

	case 'work-settings':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'work_settings.php';
	$flag = 1;
	break;

	case 'googlemaps':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'page_googlemaps.php';
	$flag = 1;
	break;
	case 'applications':
	if(!isset($_SESSION['AdminId']))
	{
		redirect_to(BASE_URL);
		exit;
	}
	require_once 'page_applications.php';
	$flag = 1;
	break;			
	default: 
	$flag = 0;	
	break;
}
	// if page not found
if ($flag == 0)
{
		//redirect_to(BASE_URL . 'page-unavailable/');
}

// create a JSON string from the translations array, but only for the "js" section
$smarty->assign('translationsJson', iniSectionsToJSON(array("js" => $translations['js'])));

	// get job categories and cities
$smarty->assign('settings_categories', $website_settings->GetSettingsCategories());

$smarty->assign('SITE_NAME', $settings['site_name']);	
$smarty->assign('THEME', THEME);
$smarty->assign('CURRENT_PAGE', $page);
$smarty->assign('CURRENT_ID', $id);
$smarty->assign('CURRENT_DIRECTORY', CURRENT_DIRECTORY);
$smarty->assign('BASE_URL', BASE_URL_ORIG);
$smarty->assign('BASE_URL_ADMIN', BASE_URL);
$smarty->assign('HTTP_REFERER', $_SERVER['HTTP_REFERER']);
if(isset($_SESSION['AdminId']))
	$smarty->assign('isAuthenticated', 1);
else
	$smarty->assign('isAuthenticated', 0);
$smarty->assign('js', $js);
if (isset($template) && $template != '')
	$smarty->display($template);
?>