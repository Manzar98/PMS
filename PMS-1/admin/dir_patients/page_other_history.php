<?php
	
	$patient = new Patient;

	if($id==="add")
	{
		$data["patient_id"] = $extra;
		$other_history = $patient->GetPatientOtherHistory($data);
		if($other_history)
		{
			redirect_to(BASE_URL.'patient-other-history/edit/'.$extra.'/');
		}
		
	}
		
	if($id==="edit")
	{
		$data["patient_id"] = $extra;
		$other_history = $patient->GetPatientotherHistory($data);
		
		if(!$other_history)
		{
			redirect_to(BASE_URL.'page-unavailable/');
		}
		else {
				
			//printr($other_history);	
			$smarty->assign('data',$other_history);
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
				if($patient->AddPatientOtherHistory($data))
				{
					redirect_to(BASE_URL.'patients/');
				}
				else {
					$errors["error"] = "Some error occurred, Please Try again";
				}
			}
			if($id=='edit')
			{
				if($patient->UpdatePatientOtherHistory($data))
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
	$template = 'patients/add_patient_other_history.tpl';	
	
?>