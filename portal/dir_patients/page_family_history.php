<?php
	
	$patient = new Patient;

	if($id==="add")
	{
		$data["patient_id"] = $extra;
		$family_history = $patient->GetPatientFamilyHistory($data);
		if($family_history)
		{
			redirect_to(BASE_URL.'patient-family-history/edit/'.$extra.'/');
		}
		
	}
		
	if($id==="edit")
	{
		$data["patient_id"] = $extra;
		$family_history = $patient->GetPatientFamilyHistory($data);
		
		if(!$family_history)
		{
			redirect_to(BASE_URL.'page-unavailable/');
		}
		else {
				
			//printr($patient_relatives);	
			$smarty->assign('data',$family_history);
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
				if($patient->AddPatientFamilyHistory($data))
				{
					redirect_to(BASE_URL.'patients/');
				}
				else {
					$errors["error"] = "Some error occurred, Please Try again";
				}
			}
			if($id=='edit')
			{
				if($patient->UpdatePatientFamilyHistory($data))
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
	$template = 'patients/add_patient_family_history.tpl';	
	
?>