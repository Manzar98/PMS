<?php
	
	$patient = new Patient;

	if($id==="add")
	{
		$data["patient_id"] = $extra;
		$patient_relatives = $patient->GetPatientRelatives($data);
		if($patient_relatives)
		{
			redirect_to(BASE_URL.'patient-relatives/edit/'.$extra.'/');
		}
		
	}
		
	if($id==="edit")
	{
		$data["patient_id"] = $extra;
		$patient_relatives = $patient->GetPatientRelatives($data);
		
		if(!$patient_relatives)
		{
			redirect_to(BASE_URL.'page-unavailable/');
		}
		else {
				
			//printr($patient_relatives);	
			$smarty->assign('data',$patient_relatives);
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
				if($patient->AddPatientRelatives($data))
				{
					redirect_to(BASE_URL.'patients/');
				}
				else {
					$errors["error"] = "Some error occurred, Please Try again";
				}
			}
			if($id=='edit')
			{
				if($patient->UpdatePatientRelatives($data))
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
	$template = 'patients/add_patient_relatives.tpl';	
	
?>