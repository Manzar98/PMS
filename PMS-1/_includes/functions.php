<?php

function group_by($array, $index)
{
	// {$foo|@print_r}

	$new_array = array();
	
if(!$array){
   return ;
}
	foreach($array as $item)
	{    
		
		if (@!array_key_exists($item,  strtoupper($item[$index]))) 
		{
			
			$new_array[strtoupper($item[$index])][] = $item;
		}				
	}
	
	
	
	return $new_array;
}

function get_medicine_instructions()
{
	global $db;
	$sql = 'SELECT m.id as medicine_id, m.name as name, m.formula as formula, m.dose as dose, 
	m.type as type,m.company as company,i.id as instruction_id, i.instruction as instruction 
	FROM '.DB_PREFIX.'medicine m LEFT JOIN '.DB_PREFIX.'instructions i ON m.id=i.medicine_id 
	        ORDER BY m.name ASC';
	return $db->QueryArray($sql);
}

function get_articles()
{
	global $db;
	$articles = array();
	$sql = 'SELECT id, title, page_title, url 
	               FROM '.DB_PREFIX.'pages
	               ORDER BY title ASC';
	$result = $db->query($sql);
	while ($row = $result->fetch_assoc())
	{
		$articles[$row['url']] = $row;
	}
	return $articles;
}


function get_cities()
{
	global $db;
	
	$cities = array();
	
	$sql = 'SELECT id, name, ascii_name
	               FROM '.DB_PREFIX.'cities
	               ORDER BY name ASC';
	
	$result = $db->query($sql);
	
	while ($row = $result->fetch_assoc())
	{
		$cities[] = array('id' => $row['id'], 'name' => $row['name'], 'ascii_name' => $row['ascii_name']);
	}
	
	return $cities;
}
function get_navigation($menu = false)
{
	global $db;
	
	$conditions = '';
	
	if (isset($menu) && ($menu == 'primary' || $menu == 'secondary' || $menu == 'footer1' || $menu == 'footer2' || $menu == 'footer3'))
		$conditions = ' WHERE menu = \''.$menu.'\'';
	
	$navigation = array();

	$sql = 'SELECT id, url, name, title, menu
				FROM '.DB_PREFIX.'links
				' . $conditions . '
				ORDER BY link_order ASC';

	$result = $db->query($sql);
	while ($row = $result->fetch_assoc())
	{
		$url_check = substr($row['url'], 0, 4);
		if ($url_check == 'http' || $url_check == 'www.') $outside = 1; else $outside = 0; 
		
		$navigation[$row['menu']][] = array(
								'id' => $row['id'],
								'url' => $row['url'],
								'name' => $row['name'],
								'title' => $row['title'],
								'menu' => $row['menu'],
								'outside' => $outside);
	}
	return $navigation;
}

function iniSectionsToJSON($iniSections)
{
	$translationsJson = "{";
	$sectionsCount = 0;
		
	foreach ($iniSections as $section => $sectionMessages)
	{
		$translationsJson = $translationsJson . "\"" . $section . "\": {";
		$sectionMessagesCount = 0;
		
		foreach ($sectionMessages as $messageKey => $messageText)
		{
			$translationsJson = $translationsJson . "\"".$messageKey . "\":\"" . preg_replace("/\r?\n/", "\\n", addslashes($messageText)) . "\"";
			
			$sectionMessagesCount++;
			
			if ($sectionMessagesCount < count($sectionMessages))
				$translationsJson .= ",";
		}
		$translationsJson .= "}";
		
		$sectionsCount++;

		if ($sectionsCount < count($iniSections))
			$translationsJson .= ",";
	}
	
	$translationsJson = $translationsJson."}";
	
	return $translationsJson;
}

function build_category_from_result_set_row($row)
{
	return array('id' => $row['id'], 'name' => $row['name'], 'var_name' => $row['var_name'], 
			     'title' => $row['title'], 'description' => $row['description'],
			     'keywords' => $row['keywords'], 'category_order' => $row['category_order']);
}

function generate_sitemap($type)
{
    global $db;
    $sanitizer = new Sanitizer;

    // Get all links
    $result = $db->query('SELECT url FROM '.DB_PREFIX.'links');
    while ($row = $result->fetch_assoc()) if (!strstr($row['url'], 'http://')) $sitemap[BASE_URL . $row['url'] . '/'] = 1;
    
    // Get all custom pages
    $result = $db->query('SELECT url FROM '.DB_PREFIX.'pages');
    while ($row = $result->fetch_assoc()) $sitemap[BASE_URL . $row['url'] . '/'] = 1; 
    
    if ($type == 'xml')
    {
        header('Content-Type: text/xml; charset="utf-8"');
        
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        foreach ($sitemap as $url => $value)
        {
            echo '<url><loc>'.$url.'</loc></url>';
        }
        echo '</urlset>';
    }
    else
    {
        foreach ($sitemap as $url => $value)
        {
            echo $url.'<br />';
        }        
    }

}


?>