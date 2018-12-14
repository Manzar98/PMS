<?php
/**
 * @author     Shoaib Iqbal <http://www.facebook.com.pk> <shoaibik@gmail.com> 
  */

	// config
if(!file_exists('_config/config.php')) 
{
	die('[index.php] _config/config.php not found');
}

require_once '_config/config.php';
define('BASE_URL', APP_URL);




$translator = new Translator("en");
$translations = $translator->getTranslations();    

$smarty->assign('translator', $translator);
$smarty->assign('translations', $translations);

$flag = 0;

$meta_description = '';
$meta_keywords = '';

if(!isset($_SERVER['HTTP_REFERER'])) 
{
	$_SERVER['HTTP_REFERER'] = '';
}

switch($page)
{
	
		// home
	case '':
	require_once 'page_home.php';
	$paper_page=1;
	$template = 'home.tpl';
	$flag = 1;
	break;
	
	
	case 'videos':
	require_once 'page_videos.php';
	$template = 'videos.tpl';
	$flag = 1;
	break;	
		// 404 etc. error page
	case 'page-unavailable':
			// TO-DO: add suggestion if no trailing slash supplied
	$html_title = 'Page unavailable / ' . SITE_NAME;
	$template = 'error.tpl';
	$flag = 1;
	break;

	case 'appointments':
	require_once 'dir_appointments/appointments.php';
	$flag = 1;
	break;

	case 'add-appointment':
	require_once 'dir_appointments/add_appointment.php';
	$flag = 1;
	break;

	case 'history':
	require_once 'dir_appointments/search_history.php';
	$flag = 1;
	break;
	
	default: 
	$result = $db->query('
		SELECT 
		* 
		FROM 
		'.DB_PREFIX.'pages 
		WHERE 
		url = "' . $db->real_escape_string($page) . '"
		');
	$pageData = $result->fetch_assoc();
	if (is_array($pageData)) {
		require_once 'page_page.php';
		$html_title = $pageData['page_title'] . ' - ' . SITE_NAME;
		$meta_keywords = $pageData['keywords'];
		$meta_description = $pageData['description'];
		$template = 'page.tpl';
		$flag = 1;
	} else {
		$flag = 0;
	}
	break;
}
	// if page not found

if ($flag == 0)
{
	redirect_to(BASE_URL . 'page-unavailable/', '404');
}


$result = $db->query('
	SELECT 
	url, title, page_title 
	FROM 
	'.DB_PREFIX.'pages 
	ORDER BY 
	title ASC
	');
$web_pages = array();
while ($row = $result->fetch_assoc())
{
	$web_pages[] = $row;
}

$sanitizer = new Sanitizer();	

$smarty->assign('navigation', get_navigation());

$smarty->assign('web_pages',$web_pages);
$smarty->assign('THEME', THEME);	
$smarty->assign('SITE_NAME', SITE_NAME);
$smarty->assign('CURRENT_PAGE', $page);
$smarty->assign('CURRENT_ID', $id);
$smarty->assign('BASE_URL', BASE_URL);
$smarty->assign('HTTP_REFERER', $_SERVER['HTTP_REFERER']);

if (isset($html_title) && $html_title != '')
	$smarty->assign('html_title', $html_title);
if (isset($meta_description) && $meta_description != '')
	$smarty->assign('meta_description', $meta_description);
if (isset($meta_keywords) && $meta_keywords != '')
	$smarty->assign('meta_keywords', $meta_keywords);

if (isset($template) && $template != '')
	$smarty->display($template);
?>