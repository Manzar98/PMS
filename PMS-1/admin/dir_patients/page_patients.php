<?php
	
	$patient = new Patient;
	$prescription = new Prescription;

	if($id==="delete")
	{
		   

			if ($prescription->deletePrescriptionByPatientId($extra)) {

				 if ($patient->DeletePatient($extra)) {

					redirect_to(BASE_URL.'patients/');
				 }	
			}
	
	}
	
	if($id==="edit")
	{
		$patient_details = $patient->GetPatientDetails($extra);		
		if(!$patient_details)
		{
			redirect_to(BASE_URL.'page-unavailable/');
		}
		else {
			$smarty->assign('edit',True);
		}
	}
	if($id==="view")
	{
		$info = $patient->GetPatientInfo($extra);
		
		$smarty->assign('info',$info);
	}
	
	if($_POST)
	{
		$data["name"] = $_POST["name"];
		$data["gender"] = $_POST["gender"];
		$data["dob"] = $_POST["dob"];
		$data["marital_status"] = $_POST["marital_status"];
		$data["blood_group"] = $_POST["blood_group"];
		$data["occupation"] = $_POST["occupation"];
		
		$data["mobile"] = $_POST["mobile"];
		$data["phone"] = $_POST["phone"];
		$data["city_id"] = $_POST["city"];
		$data["address"] = $_POST["address"];
		
		$data["field1"] = $_POST["field1"];
		$data["value1"] = $_POST["value1"];
		
		$data["field2"] = $_POST["field2"];
		$data["value2"] = $_POST["value2"];
		
		
		$data = escape($data);
		
		if($data["name"] == '')
		{
			$errors["name"] = "Please Enter Name";
		}
// var_dump($patient->AddPatient($data));
		if(empty($errors))
		{
			echo $id;
			if($id=='add')
			{
				if($patient->AddPatient($data))
				{
					redirect_to(BASE_URL.'patients/add');
				}
				else {
					$errors["error"] = "Some error occurred, Please Try again";
				}
			}
			if($id=='edit')
			{
				echo "im here";
				$data["id"] = $extra;
				if($patient->UpdatePatient($data))
				{
					// redirect_to(BASE_URL.'patients/');
				}
				else {
					$errors["error"] = "Some error occurred, Please Try again";
				}
			}
			
			
			
		}
		
		
	}
elseif($id=='') {
						
		
		$_GET = @escape($_GET);
		$q = $_GET['q'];
		$field = $_GET['field'];
$group_by="";
if (isset($_GET['group_by'])) {
	$group_by = $_GET['group_by'];
}
		
	    if($group_by=='')
		{
			$group_by = 'date';
		}
		$paginatorLink = BASE_URL . 'patients/?q='.$q.'&field='.$field.'&group_by='.$group_by.'&';
		
		if($q!='')			
		{
			
			$total_searched__patients = $patient->CountSearchedPatients($q,$field);
	
			$paginator = new Paginator($total_searched__patients, PAGINATION, @$_REQUEST['p']);
			$paginator->setLink($paginatorLink);
			$paginator->paginate();
			
			$firstLimit = $paginator->getFirstLimit();
			$lastLimit = $paginator->getLastLimit();
				
			$patients = $patient->GetPatientsByQuery($q,$field,$firstLimit,PAGINATION);
			
			$grouped_patients = group_by($patients, $group_by);
			$data["q"] = $q;
			$data["field"] = $field;
		}		
		else {
			$total_patients = $patient->CountPatients(TRUE);
			$paginator = new Paginator($total_patients, PAGINATION, @$_REQUEST['p']);
			$paginator->setLink($paginatorLink);
			$paginator->paginate();
			
			$firstLimit = $paginator->getFirstLimit();
			$lastLimit = $paginator->getLastLimit();
				
			$patients = $patient->GetPatients($firstLimit,PAGINATION);
			
			$grouped_patients = group_by($patients, $group_by);
				
			//printr($grouped_patients);
			
		}
		
		$smarty->assign('group_by',$group_by);
		$smarty->assign('grouped_patients',$grouped_patients);	
		$smarty->assign('pages',$paginator->pages_link);
			
		
		$smarty->assign('errors',@$errors);
	}
	
	
	$smarty->assign('data',@$data);
	$smarty->assign('errors',@$errors);
	

	if($id==='add' || $id==='edit')
	{
		if($id==="edit")
		{
			$smarty->assign('data',$patient_details);
		}
		$smarty->assign('cities', get_cities());
		$template = 'patients/add_patient.tpl';
	}
	elseif($id==="view"){
		$template = 'patients/patient_info.tpl';
	}
	else {
		$template = 'patients/patients.tpl';
	}	
	
?>