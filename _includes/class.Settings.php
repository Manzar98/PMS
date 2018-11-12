<?php
 // session_start();
  

class WebsiteSettings
{
	
	var $mSettings = false;
		// echo $u_id;
  

function getId(){
  $ids = array();


  if(isset($_GET['id']) || isset($_GET['c_id'])){

    $ids[] = array('id' => $_GET['id'], 'c_id' => $_GET['c_id']);
    return $ids;
  }
  	
}


	function __construct()
	{
		 // session_start();;
		global $db;
		// $crntVar =$smarty->getTemplateVars();
		// print_r($smarty);
		// global $id;
		$u_id=$this->getId();

		 print_r($u_id);
		if (isset($u_id[0]['id'])) {
		 $sql = 'SELECT * FROM '.DB_PREFIX.' settings WHERE user_id='.$u_id[0]['id'].' ORDER BY id ASC';
		}else{
			 $sql = 'SELECT * FROM '.DB_PREFIX.' settings ORDER BY id ASC';
		}
		 
		$result = $db->QueryRow($sql);

if ($result==0) {
	$settings = array();
	$u_id=$this->getId();

	if ($u_id[0]['c_id']==1) {
		// echo ('cat-1');
	 	$settings['site_name'] =array(
	 		'name' => 'site_name',
	 		'title' => 'Clinic Name',
	 		'description' => 'Name of Clinic/Hospital',
	 		'data_type'=> NULL,
	 		'input_type' => NULL,
	 		'input_options' => NULL,
	 		'validation' => NULL,
	 		'value'=> NULL,
	 		'category_id' => $u_id[0]['c_id']
	 	);
	 $settings['pagination'] =array(
	 		'name' => 'pagination',
	 		'title' => 'Pagination',
	 		'description' => NULL,
	 		'data_type'=> 'integer',
	 		'input_type' =>NULL,
	 		'input_options' => NULL,
	 		'validation' => 'not_empty',
	 		'value'=> NULL,
	 		'category_id' => $u_id[0]['c_id']
	 	);
	}else if($u_id[0]['c_id']==2){
	// echo ('cat-2');
	 $settings['default_fee'] =array(
	 		'name' => 'default_fee',
	 		'title' => 'Default Fee',
	 		'description' => 'Default Fee in Your Currency',
	 		'data_type'=> 'integer',
	 		'input_type' =>NULL,
	 		'input_options' => NULL,
	 		'validation' => 'not_empty',
	 		'value'=> NULL,
	 		'category_id' => $u_id[0]['c_id']
	 	);
	 $settings['fee_display'] =array(
	 		'name' => 'fee_display',
	 		'title' => 'Display fee on print',
	 		'description' => 'Default settings to print fee.',
	 		'data_type'=> 'boolean',
	 		'input_type' =>'radiobutton',
	 		'input_options' => 'No/Yes',
	 		'validation' => NULL,
			'value'=> NULL,
	 		'category_id' => $u_id[0]['c_id']
	 	);
	}
}else{

		$result = $db->query($sql);
		
		$settings = array();
		
		while ($row = $result->fetch_assoc())
		{
			// Setting temporary variable names for the 'value' and 'fieldtype' fields
			$value = $row['value']; 
			$data_type = $row['data_type'];
			$input_type = $row['input_type'];
			$input_options = $row['input_options'];
			$validation = explode('|', $row['validation']); 
				
			// Apply certain actions on special fields 
			if ($input_type == 'checkbox' || $input_type == 'select' || $input_type == 'radiobutton')
				$input_options = explode('|', $input_options);
			elseif ($input_type == 'available_themes')
			{
				$input_type = 'select';	$themes = array();
				$dir = APP_PATH.'_templates/';
				if ($dh = opendir($dir)) {
				    while (($file = readdir($dh)) !== false) { if (filetype($dir . $file) != 'file' && $file != '.' && $file != '..' && $file != '.svn' && $file != '_cache') $themes[] = $file; }
					closedir($dh);
				}
				$input_options = $themes;
			}
			if ($data_type == 'boolean' && $value != 1) $value = false;
				
			// Add the row to the setting array
			$settings[$row['name']] = array(
				'name' => $row['name'], 
				'title' => $row['title'], 
				'description' => $row['description'],
				'data_type' => $data_type,
				'input_type' => $input_type,
				'input_options' => $input_options,
				'validation' => $validation,
				'value' => stripslashes($value), 
				'category_id' => $row['category_id'] 
				);
		}
		
	}
		
		$this->mSettings = $settings;

	}
	
	public function GetSettingsCategories()
	{
	    global $db;
	    $sql = 'SELECT id, name, var_name, description  
				FROM '.DB_PREFIX.'settings_categories 
				ORDER BY id ASC';

  
	    	$result = $db->query($sql);

	    $settings_category = array();
		
		while ($row = $result->fetch_assoc())
		{
			$settings_category[] = array('name' => $row['name'], 'var_name' => $row['var_name'], 'description' => $row['description'], 'id' => $row['id']);
		}
		
 // print_r($settings_category);
 return $settings_category;
	}

	public function GetSettingsCategoryNameById($id)
	{
		global $db;
	    $sql = 'SELECT name 
				FROM '.DB_PREFIX.'settings_categories 
				WHERE id = ' . $id;
	    $result = $db->query($sql);
	    $row = $result->fetch_assoc();
		return $row['name'];
	}
	
	public function GetSettingsCategoryIdByVarname($var_name)
	{
		global $db;
	    $sql = 'SELECT id 
				FROM '.DB_PREFIX.'settings_categories 
				WHERE var_name = "' . $var_name . '"';
				// echo $sql;
	    $result = $db->query($sql);
	    $row = $result->fetch_assoc();
		return $row['id'];
	}

	public function GetSetting($name, $advanced = false)
	{
		$settings = $this->mSettings;
		if (!empty($settings[$name]))
		{
			if ($advanced == true) return $settings[$name];
			else return $settings[$name]['value'];
		}
		else
			return false;
	}
	
	public function GetSettings($setting_names = false, $advanced = false)
	{
		$settings = $this->mSettings;
		$settings_array = array();
		
		if (!empty($setting_names))
		{
			$i = 0; while($i < count($setting_names))
			{
				if (!empty($settings[$setting_names[$i]]) && $advanced == true) 
					$settings_array[$setting_names[$i]] = $settings[$setting_names[$i]];
				elseif (!empty($settings[$setting_names[$i]]))
					$settings_array[$setting_names[$i]] = $settings[$setting_names[$i]]['value'];
				$i++;
			}
			return $settings_array;
		}
		elseif ($advanced == false)
		{
			foreach ($settings as $setting)
			{
				$settings_array[$setting['name']] = $setting['value'];
			}
			return $settings_array;
		}
		else return $settings;
	}
	
	public function GetSettingsByCategory($category_id, $advanced = false)
	{
		global $db;
		$sql = 'SELECT name
				FROM '.DB_PREFIX.'settings
				WHERE category_id = ' . $category_id . ' AND user_id='.$_SESSION['AdminId'].' ORDER BY ordering ASC';
				// echo $sql;
		$result = $db->query($sql);
		
		$settings_list = array();
		
		while ($row = $result->fetch_assoc()) {	$settings_list[] = $row['name']; }

		$settings = $this->GetSettings($settings_list, $advanced);

		return $settings;
	}

	public function UpdateSettings($settings_array,$settings_category_id)
	{
		 
		 $res=$this->getRecord();

  // echo $result;
    if ($res == 0) {
    	$settings = $this->mSettings; $i = 0;
		
		while($i < count($settings_array))
		{
			$value = $settings_array[$i]['value'];
			$name = $settings_array[$i]['name'];
			
			if ($value != $settings[$name]['value'])
			{
				$sql = 'UPDATE '.DB_PREFIX.'settings SET value = "' . $value . '" WHERE name = "' . $name . '"';
				$db->query($sql);
			}
			$i++;
		}

    }else{

    	echo "Inserted Manzar";
    }
		
		
	}

	public function getRecord($settings_category_id){

		$u_id=$this->getId();
		global $db;
     // print_r($settings_array);
     $sql = 'SELECT * FROM '.DB_PREFIX.'settings WHERE user_id='.$_SESSION['AdminId'].' AND category_id='.$settings_category_id;
      echo $sql;
       return $db->QueryRow($sql);
	}
}
?>