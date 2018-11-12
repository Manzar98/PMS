<?php
     // $u_id=$extra;

     // echo $u_id;
	// Check if a valid category id is given
	$settings_category_id = $website_settings->GetSettingsCategoryIdByVarname($id);
	// echo $settings_category_id;
	// Get setting names from a category OR show available categories
	if (isset($settings_category_id) && is_numeric($settings_category_id))
	{
		$settings_form = $website_settings->GetSettingsByCategory($settings_category_id, true);
   
    // print_r($settings_form);
		$smarty->assign('category_name', $website_settings->GetSettingsCategoryNameById($settings_category_id));
		// print_r($setting_);
		$smarty->assign('settings_form', $settings_form);
	}
	else $smarty->assign('settings_categories', $website_settings->GetSettingsCategories());
	
	// Process a form (if given) to save the settings
	if (!empty($_POST))
	{	
		$_POST = escape($_POST);
		
		$fv = new FormValidator();
		$setting_array = array();
		
		 $res=$website_settings->getRecord($settings_category_id);

		 if ($res!=0) {
		 	
		

		// Looping all given fields and values
		foreach ($settings_form as $setting)
		{
			// If field value is an array, convert it to a string for DB storage
			if (is_array($_POST[$setting['name']]))
			{
				$a = 0; $new_value = '';
				while($a < count($_POST[$setting['name']]))
				{
					if ($_POST[$setting['name']][$a] != '_hidden' && $new_value == '') $new_value .= $_POST[$setting['name']][$a];
					elseif ($_POST[$setting['name']][$a] != '_hidden' ) $new_value .= '|' . $_POST[$setting['name']][$a];
					$a++;
				}
				$_POST[$setting['name']] = $new_value;
			}
			
			// Validate the fields if needed
			if (!empty($setting['validation']))
			{
				$a = 0; while($a < count($setting['validation']))
				{
					if ($setting['validation'][$a] == 'not_empty')
						$fv->isEmpty($setting['name']);
					if ($setting['validation'][$a] == 'is_number' || $setting['data_type'][$a] == 'integer')
						$fv->isNumber($setting['name']);
					if ($setting['validation'][$a] == 'is_url_string')
						$fv->isUrlString($setting['name']);
					if ($setting['validation'][$a] == 'is_email')
						$fv->isEmailAddress($setting['name']);
					$a++;
				}
			}
			if ($setting['data_type'] == 'integer') $fv->isNumber($setting['name']);

			$setting_array[] = array('name'=> $setting['name'], 'value' => $_POST[$setting['name']]);
		}

		 }
		
		if ($fv->isError())
		{

			// echo "MAsndafaf";
			// Give the fields their changed input, so the user doesn't need to type it in again
			foreach ($settings_form as $setting)
			{
				if ($setting['input_type'] == 'checkbox')
				{
					$new_value = explode('|', $_POST[$setting['name']]);
					$settings_form[$setting['name']]['value'] = $new_value;
				}
				else
				{
					$settings_form[$setting['name']]['value'] = $_POST[$setting['name']];
				}
			}
			
			// Assign error list to SMARTY and load template
			$errors = $fv->getErrorList();
			$smarty->assign('errors', $errors);
		    $smarty->assign('settings_form', $settings_form);
			$template = 'settings.tpl';
		}
		else
		{
			$website_settings->UpdateSettings($setting_array,$settings_category_id);
			// redirect_to(BASE_URL.'settings/'. $id . '/');
		}
	} 
	
	 $smarty->assign('current_category', 'settings');
	$template = 'settings.tpl';
	
?>