<?php
	
	$patient = new Patient;
	
	if($id==="add")
	{
		$data["patient_id"] = $extra;
		$patient_lifestyle = $patient->GetPatientLifestyle($data);
		if($patient_lifestyle)
		{
			redirect_to(BASE_URL.'patient-lifestyle/edit/'.$extra.'/');
		}
		
	}
	
	if($id==="delete")
	{
		if($patient->DeletePatient($extra))
		{
			redirect_to(BASE_URL.'patients/');
		}
	}
	
	if($id==="edit")
	{
		$data["patient_id"] = $extra;
		$patient_lifestyle = $patient->GetPatientLifestyle($data);
		
		if(!$patient_lifestyle)
		{
			redirect_to(BASE_URL.'page-unavailable/');
		}
		else {
				
			//printr($patient_lifestyle);	
			$smarty->assign('data',$patient_lifestyle);
			$smarty->assign('edit',True);
		}
	}
	
	if($_POST)
	{
		$data = escape($_POST);
		$data["patient_id"] = $extra;
		
		if(empty($errors))
		{
			if($id=='add')
			{
				if($patient->AddPatientLifestyle($data))
				{
					redirect_to(BASE_URL.'patients/');
				}
				else {
					$errors["error"] = "Some error occurred, Please Try again";
				}
			}
			if($id=='edit')
			{
				if($patient->UpdatePatientLifestyle($data))
				{
					redirect_to(BASE_URL.'patients/');
				}
				else {
					$errors["error"] = "Some error occurred, Please Try again";
				}
			}
			
			
			
		}
		
	$smarty->assign('data',$data);
	$smarty->assign('errors',$errors);
		
	}
	else {		
		$smarty->assign('errors',@$errors);
	}
	
	$patient_details = $patient->GetPatientDetails($extra);
	
	$smarty->assign('patient_details',$patient_details);
	$template = 'patients/add_patient_lifestyle.tpl';	
	
?>