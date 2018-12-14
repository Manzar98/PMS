<?php

$patient = new Patient;
$instruction = new Instruction;
$test = new Test;
$medicine = new Medicine;
$prescription = new Prescription;
$users = new User;
$package = new Package;

 // echo $_SESSION['selectedPkgId'];

if($id==="suggest-patients")
{
	if($_POST)
	{
		$data['q'] = $_POST['q'];
		$data['field'] = $_POST['field'];
		$data = escape($data);
		$patient_list = $patient->GetPatientsByQuery($data['q'],$data['field'],0,10);

	// print_r($patient_list);
		if (!$patient_list) {
			return ;
		}
		echo '
		<table  class="table table-striped table-bordered">
		<caption>Patient List</caption>
		<thead>
		<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Mobile</th>
		</tr>
		</thead>
		<tbody>';
		foreach($patient_list as $p)
		{
			echo '	<tr class="{cycle values=\'odd,even\'}">
			<td width="45">'.$p['patient_id'].'</td>
			<td><a href="javascript:void(0)" onclick="SelectPatient(\''.$p['patient_id'].'\',\''.$p['patient_name'].'\')"> '.$p['patient_name'].' </a></td>
			<td width="100">'.$p['mobile'].'</td>
			</tr>';


		}
		echo '</tbody></table>';
		exit;

	}
}
elseif ($id==="get-medicine-instructions") {
	if($_POST)
	{
		$_POST = escape($_POST);
		$id = $_POST['medicine_id'];
		if($id==="")
		{
			$instructions = $instruction->GetInstructionsWithoutMedicine(); 
		}
		else {
			$instructions = $instruction->GetMedicineInstructions($id);
		}
		
		foreach($instructions as $ins)
		{
			echo '<option value="'.$ins["id"].'">'.$ins["instruction"].'</option>';
		}		
		exit;
	}
}
elseif ($id==="get-test-options") {
	if($_POST)
	{
		$_POST = escape($_POST);
		$id = $_POST['test_id'];
		$test_options = $test->GetTestOptions($id);
		
		foreach($test_options as $option)
		{
			echo '<option value="'.$option["id"].'">'.$option["name"].' ('.$option["measurement"].') Normal Range -> ('.$option["normal_range"].')</option>';
		}		
		exit;
	}
}
elseif($id==="add-instruction")
{
	if($_POST)
	{
		$data['medicine_id'] = $_POST['medicine_id'];
		$data['instruction'] = $_POST['instruction'];
		$data['userId'] = $_SESSION['AdminId'];
		$data = escape($data);
		if($instruction->AddInstruction($data))
		{
			echo $db->insert_id;
		}
		exit;
	}
}
elseif($id==="add-patient")
{
	if($_POST)
	{
		// print_r($_POST);
		$data["name"] = $_POST['name'];
		$data['mobile'] = $_POST['mobile_number'];
		$data['city_id'] = $_POST['city_id'];
		$data['security_key'] = $_POST['security_key'];
		$data['email'] = $_POST['email'];
		$data['userId'] = $_SESSION['AdminId'];
		$data['package_id'] = $_SESSION['selectedPkgId'];
		$data = escape($data);
		if($isExist = $users->checkDoctorConsumptionExist($data["userId"])){

			$consumptionCount=$isExist['patient_count'];
			$count = $package->getColumnCount($data['package_id'],"no_of_patients");
			$pkgCount= $count['no_of_patients'];

			if ($consumptionCount < $pkgCount) {

				$users->updateColumnCount($data["userId"],"patient_count",$consumptionCount+1);

				if($patient->AddPatientBasic($data))
				{
					echo $db->insert_id;
					$emailArray=array('email'=>$data['email'],'security_key'=>$data["security_key"],"patient_id"=>$db->insert_id);
			 // print_r($emailArray);
			//$patient->sendPasswordInEmail($emailArray);

				}
				exit;

			}else{

				echo "You Can't add the patient. Because No of patients is full.";
			}
			exit;
		}else{

			$users->addColumnCount($data["userId"],"patient_count",'1');
			if($patient->AddPatientBasic($data))
			{
				echo $db->insert_id;
				$emailArray=array('email'=>$data['email'],'security_key'=>$data["security_key"],"patient_id"=>$db->insert_id);
			 // print_r($emailArray);
			//$patient->sendPasswordInEmail($emailArray);

			}
			exit;
		}
	}
}

if($_POST)
{
	
	$data["patient_id"] = $_POST['patient_id'];
	$data['description'] = $_POST['description'];
	$data['complain'] = $_POST['complain'];
	$data['complain_detail'] = $_POST['complain_detail'];
	$data['next_plan'] = $_POST['next_plan'];
	$data['next_date'] = $_POST['next_date'];
	$data['userId'] = $_SESSION['AdminId'];
	$data['security_key'] = $_POST['security_key'];
	$data['package_id'] = $_SESSION['selectedPkgId'];
	if(isset($_POST['instructions'])){
		$data['instructions'] = $_POST['instructions'];
	}
	if(isset($_POST['test'])){
		$data['tests'] = $_POST['test'];
	}
	
	$data['fee_received'] = $_POST['fee_received'];
	
	$data = escape($data);
	
	if(empty($errors))
	{

		if($isExist = $users->checkDoctorConsumptionExist($data["userId"])){

			$consumptionCount=$isExist['prescription_count'];
			$count = $package->getColumnCount($data['package_id'],"no_of_prescriptions");
			$pkgCount= $count['no_of_prescriptions'];

			if ($consumptionCount < $pkgCount) {

				$users->updateColumnCount($data["userId"],"prescription_count",$consumptionCount+1);

				if($prescription->AddPrescription($data)){
					
					$data['prescription_id'] = $db->insert_id;

					if($prescription->AddPrescriptionInstructions($data) || $prescription->AddPrescriptionTests($data))
					{
						$_SESSION['flashAlert']="Prescription is Successfully Created!";
						redirect_to(BASE_URL.'prescriptions/view/'.$data['prescription_id'].'/');
					}else{

						$_SESSION['flashAlert']="Prescription is Successfully Created!";
						redirect_to(BASE_URL.'prescriptions/view/'.$data['prescription_id'].'/');
					}

				}else {
					$errors['error'] = "Some Error Occured";
				}

			}else{

				$smarty->assign('prescriptionFull', "You Can't create the prescription. Because No of prescriptions is full.");

			}

		}else{

			$users->addColumnCount($data["userId"],"prescription_count",'1');
			if($prescription->AddPrescription($data))
			{
				$data['prescription_id'] = $db->insert_id;

				if($prescription->AddPrescriptionInstructions($data) || $prescription->AddPrescriptionTests($data))
				{
					$_SESSION['flashAlert']="Prescription is Successfully Created!";
					redirect_to(BASE_URL.'prescriptions/view/'.$data['prescription_id'].'/');
				}else{
					
					$_SESSION['flashAlert']="Prescription is Successfully Created!";
					redirect_to(BASE_URL.'prescriptions/view/'.$data['prescription_id'].'/');
				}

			}else {
				$errors['error'] = "Some Error Occured";
			}
		}


	}
	
	
}

$smarty->assign("medicines",$medicine->GetMedicine());
$test_list = $test->GetTestsBasic();
$smarty->assign("test_list",$test_list);
$smarty->assign('cities', get_cities());

$template = "prescription/add_prescription.tpl";
?>