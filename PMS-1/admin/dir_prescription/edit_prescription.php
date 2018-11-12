<?php
  
  $patient = new Patient;
  $instruction = new Instruction;
  $test = new Test;
  $medicine = new Medicine;
  $prescription = new Prescription;
  if($id==="suggest-patients")
  {

  	if($_POST)
	{
		$data['q'] = $_POST['q'];
		$data['field'] = $_POST['field'];
		$data = escape($data);
		$patient_list = $patient->GetPatientsByQuery($data['q'],$data['field'],0,10);
		echo '<table class="list" cellpadding="5">
					<tr class="row" style="background-color: #000;color:#fff;">
						<td>ID</td>
						<td>Patient Name</td>
						<td>Mobile</td>
					</tr>
			';
		foreach($patient_list as $p)
		{
			echo '	<tr class="row {cycle values=\'odd,even\'}">
						<td width="45">'.$p['id'].'</td>
						<td><a href="javascript:void(0)" onclick="SelectPatient('.$p['id'].')"> '.$p['name'].' </a></td>
						<td width="100">'.$p['mobile'].'</td>
					</tr>';
					
				
		}
		echo '</table>';
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
		
		$data["name"] = $_POST['name'];
		$data['mobile'] = $_POST['mobile_number'];
		$data['city_id'] = $_POST['city_id'];
		
		$data = escape($data);
		if($patient->AddPatientBasic($data))
		{
			echo $db->insert_id;
		}
		exit;
	}
}
elseif($id==="remove-instruction")
{
	if($_POST)
	{
		
		$data["id"] = $_POST['id'];
		
		$data = escape($data);
		if($prescription->RemoveInstreuction($data['id']))
		{
			echo '1';
		}
		exit;
	}
}
elseif($id==="remove-test-option")
{
	if($_POST)
	{
		
		$data["id"] = $_POST['id'];
		
		$data = escape($data);
		if($prescription->RemoveTestOption($data['id']))
		{
			echo '1';
		}
		exit;
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
	$data['fee_received'] = $_POST['fee_received'];
	if (isset($id)) {
		
		$data['id']=$id;
	}
	$data = escape($data);
	
	if(empty($errors))
	{

		if($prescription->AddPrescription($data))
		{

			$data['prescription_id'] = $db->insert_id;
			
			if($prescription->AddPrescriptionInstructions($data) && $prescription->AddPrescriptionTests($data))
			{
				// redirect_to(BASE_URL.'add-prescription');
			}
			else {
				$errors['error'] = "Some Error Occured";
			}
			
		}
	}
	
	
}
elseif($id>0)
  {

	  $prescription_details = $prescription->GetPrescriptionInfo($id);
	  $prescription_details['patient'] = $patient->GetPatientDetails($prescription_details['patient_id']);
	 
  }
   // print_r($prescription_details);
   if (isset($prescription_details)) {
   	$smarty->assign('data',$prescription_details);
   }
  
  
  $smarty->assign("medicines",$medicine->GetMedicine());
  $test_list = $test->GetTestsBasic();
  $smarty->assign("test_list",$test_list);
  $smarty->assign('cities', get_cities());
  
  $template = "prescription/edit_prescription.tpl";
?>