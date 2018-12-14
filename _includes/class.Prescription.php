<?php

Class Prescription
{
	
	function GetPrescriptionInfo($id)
	{
		global $db;
		$data = $this->GetPrescriptionDetails($id);
		$data['instructions'] = $this->GetPrescriptionInstructions($id);
		$data['tests'] = $this->GetPrescriptionTests($id);
		
		$result = array();
		$tests = $data['tests'];
		$result = array();
		
		foreach($tests as $element) {
			$id = $element['test_id'];
		   //If that id hasn't been seen yet, create the out element.
			if(!isset($result[$id])){
				$result[$id] = array(
					'test_id' => $element['test_id'],
					'test_name' => $element['test_name'],
					'options' => array()
				);
			}

		   //Add that action to the out element
			$result[$id]['options'][] = array(
				'pid'          => $element['pid'],
				'option_id'    => $element['option_id'],
				'option_name'  => $element['option_name'],
				'measurement'  => $element['measurement'],
				'result'       => $element['result'],
				'normal_range' => $element['normal_range']		     
			);
		}
		$data['tests'] = $result;	
		return $data;
	}	

	function GetAllPrescriptions($startIndex,$limit,$id)
	{
		global $db;
		$sql = '
		SELECT pt.id as patient_id,pt.name as patient_name, p.id as id, p.description as description, p.complain as complain, 
		p.next_date as next_date, p.created_on as created_on,DATE(p.created_on) as date,  p.updated_on as updated_on				

		FROM  '.DB_PREFIX.'prescription p 
		LEFT JOIN '.DB_PREFIX.'patient pt ON p.patient_id = pt.id WHERE p.user_id='.$id.'

		ORDER BY created_on DESC

		LIMIT '.$startIndex.', '.$limit;
		// echo $sql;
		return $db->QueryArray($sql);
	}

	function TotalPrescriptions($id)
	{
		global $db;
		$sql = '
		SELECT COUNT(p.id)				

		FROM  '.DB_PREFIX.'prescription p 
		LEFT JOIN '.DB_PREFIX.'patient pt ON p.patient_id = pt.id WHERE p.user_id='.$id;

		 // echo $sql;
		return $db->QueryItem($sql);
	}	
	function CountSearchedPrescriptions($q,$field,$id)
	{
		global $db;
		
		
		if($field=="id" || $field=="complain" || $field=="created_on")
		{
			if($field=="id")
			{
				$sql = 'SELECT COUNT(p.id) FROM '.DB_PREFIX.'prescription p WHERE p.id='.$q.' AND user_id='.$id.' LIMIT 1';
			}
			elseif($field=="created_on")
			{
				$sql = 'SELECT COUNT(p.id) FROM '.DB_PREFIX.'prescription p WHERE p.created_on = '.$q.' AND user_id='.$id.' LIMIT 1';
			}
			else {
				$sql = 'SELECT COUNT(p.id) FROM '.DB_PREFIX.'prescription p WHERE user_id='.$id.' AND '.$field.' LIKE "%'.$q.'%" LIMIT 1';			
			}
		}
		elseif($field=="patient_name") {
			$sql = '
			SELECT COUNT(p.id)				

			FROM  '.DB_PREFIX.'prescription p 
			LEFT JOIN '.DB_PREFIX.'patient pt ON p.patient_id = pt.id

			WHERE user_id='.$id.' AND pt.name LIKE "%'.$q.'%"
			';

		}
		elseif($field=="patient_id")
		{
			$sql = '
			SELECT COUNT(p.id)				

			FROM  '.DB_PREFIX.'prescription p 
			LEFT JOIN '.DB_PREFIX.'patient pt ON p.patient_id = pt.id

			WHERE pt.id="'.$q.'" AND user_id='.$id;
		}
		//echo $sql;
		return $db->QueryItem($sql);
	}



	function GetSearchedPrescriptions($q,$field,$id)
	{
		global $db;
		
		
		if($field=="id" || $field=="complain" || $field=="created_on")
		{
			if($field=="id")
			{
				$sql = 'SELECT pt.id as patient_id,pt.name as patient_name, p.id as id, p.description as description, p.complain as complain, 
				p.next_date as next_date, p.created_on as created_on, p.updated_on as updated_on
				FROM  '.DB_PREFIX.'prescription p 
				LEFT JOIN '.DB_PREFIX.'patient pt ON p.patient_id = pt.id  WHERE p.id='.$q.' AND pt.user_id='.$id;
			}
			elseif($field=="created_on")
			{
				$sql = 'SELECT pt.id as patient_id,pt.name as patient_name, p.id as id, p.description as description, p.complain as complain, 
				p.next_date as next_date, p.created_on as created_on, p.updated_on as updated_on
				FROM  '.DB_PREFIX.'prescription p 
				LEFT JOIN '.DB_PREFIX.'patient pt ON p.patient_id = pt.id WHERE p.created_on = '.$q.' AND pt.user_id='.$id;
			}
			else {
				$sql = 'SELECT pt.id as patient_id,pt.name as patient_name, p.id as id, p.description as description, p.complain as complain, 
				p.next_date as next_date, p.created_on as created_on, p.updated_on as updated_on
				FROM  '.DB_PREFIX.'prescription p 
				LEFT JOIN '.DB_PREFIX.'patient pt ON p.patient_id = pt.id WHERE pt.user_id='.$id.' AND '.$field.' LIKE "%'.$q.'%"';			
			}
		}
		elseif($field=="patient_name") {
			$sql = '
			SELECT pt.id as patient_id,pt.name as patient_name, p.id as id, p.description as description, p.complain as complain, 
			p.next_date as next_date, p.created_on as created_on, p.updated_on as updated_on			

			FROM  '.DB_PREFIX.'prescription p 
			LEFT JOIN '.DB_PREFIX.'patient pt ON p.patient_id = pt.id

			WHERE  pt.user_id='.$id.' AND  pt.name LIKE "%'.$q.'%"
			';

		}
		elseif($field=="patient_id")
		{
			$sql = '
			SELECT pt.id as patient_id,pt.name as patient_name, p.id as id, p.description as description, p.complain as complain, 
			p.next_date as next_date, p.created_on as created_on, p.updated_on as updated_on				

			FROM  '.DB_PREFIX.'prescription p 
			LEFT JOIN '.DB_PREFIX.'patient pt ON p.patient_id = pt.id

			WHERE pt.id="'.$q.'" AND pt.user_id='.$id;
		}
		// echo $sql;
		return $db->QueryArray($sql);
	}

	function GetPrescriptionDetails($id)
	{
		global $db;
		$sql = '
		SELECT p.id as id, p.patient_id as patient_id, p.description as description, p.complain as complain, p.complain_detail as complain_detail,
		p.next_plan as next_plan, p.next_date as next_date,p.fee_received as fee_received, p.created_on as created_on, p.updated_on as updated_on				

		FROM  '.DB_PREFIX.'prescription p 

		WHERE p.id = '.$id.' LIMIT 1';
		//echo $sql;
		return $db->QueryRow($sql);
	}
	
	
	function GetPrescriptionTests($id)
	{
		global $db;
		$sql = '
		SELECT pt.option_id as option_id, pt.result as result,
		pt.id as pid,
		t.id as test_id, t.name as test_name, 
		test_options.normal_range as normal_range,
		test_options.name as option_name,
		test_options.measurement as measurement

		FROM  '.DB_PREFIX.'prescription_tests pt    
		INNER JOIN '.DB_PREFIX.'test_options test_options ON pt.option_id = test_options.id 
		INNER JOIN '.DB_PREFIX.'tests t ON test_options.test_id = t.id  


		WHERE pt.prescription_id = '.$id.' ';
		//echo $sql;
		return $db->QueryArray($sql);
	}
	function GetPrescriptionInstructions($id)
	{
		global $db;
		$sql = '
		SELECT  i.id as id,i.instruction as instruction,
		m.id as medicine_id, m.name as name, m.formula as formula, 
		m.dose as dose, pi.id as pid


		FROM  '.DB_PREFIX.'instructions i      
		INNER JOIN '.DB_PREFIX.'medicine m ON i.medicine_id = m.id 
		INNER JOIN '.DB_PREFIX.'prescription_instructions pi ON pi.instruction_id = i.id  

		WHERE pi.prescription_id = '.$id.' ';
		//echo $sql;
		return $db->QueryArray($sql);
	}
	function AddPrescription($data)
	{
		global $db;
		if (isset($data['id'])) {

			$sql= 'UPDATE '.DB_PREFIX.'prescription SET
			patient_id="'.$data['patient_id'].'",
			description="'.$data['description'].'",
			complain="'.$data['complain'].'",
			complain_detail="'.$data['complain_detail'].'",
			next_plan="'.$data['next_plan'].'",
			next_date="'.$data['next_date'].'",
			fee_received="'.$data['fee_received'].'",
			updated_on=NOW()
			WHERE id='.$data['id'];
		}else{
		
		  $sql = 'INSERT INTO '.DB_PREFIX.'prescription 
		 (patient_id,user_id,description,complain,complain_detail,next_plan,next_date,fee_received,created_on,updated_on)
		 VALUES(
		 "'.$data["patient_id"].'",
		 "'.$data["userId"].'",
		 "'.$data["description"].'",
		 "'.$data["complain"].'",
		 "'.$data["complain_detail"].'",
		 "'.$data["next_plan"].'",
		 "'.$data["next_date"].'",
		 "'.$data["fee_received"].'",
		 NOW(),
		 NOW())';
		 }
		//echo $sql;
		return $db->Execute($sql);
	}
	
	
	function RemoveInstruction($id)
	{
		global $db;
		$sql = 'DELETE FROM '.DB_PREFIX.'prescription_instructions WHERE id='.$id.' LIMIT 1';
		return $db->Execute($sql);
	}
	function RemoveTestOption($id)
	{
		global $db;
		$sql = 'DELETE FROM '.DB_PREFIX.'prescription_tests WHERE id='.$id.' LIMIT 1';
		return $db->Execute($sql);
	}	
	
	
	function AddPrescriptionInstructions($data)
	{
		global $db;
		
		if(isset($data['instructions']) && is_array($data['instructions']))
		{
			foreach($data['instructions'] as $ins)
			{
				$instructions[] = '("'.$data["prescription_id"].'","'.$ins["instruction_id"].'")';
			}

			$instructions = implode(",", $instructions);
			
			$sql = 'INSERT INTO '.DB_PREFIX.'prescription_instructions 
			(prescription_id,instruction_id)
			VALUES
			'.$instructions.';
			';
			// echo $sql;
			return $db->Execute($sql);

		}
	}
	
	function AddPrescriptionTests($data)
	{
		global $db;
		
		if(isset($data['tests']) && is_array($data['tests']))
		{
			foreach($data['tests'] as $test)
			{
				$tests[] = '("'.$data["prescription_id"].'","'.$test["option_id"].'","'.$test["result"].'")';
			}
			
			$tests = implode(",", $tests);
			
			$sql = 'INSERT INTO '.DB_PREFIX.'prescription_tests
			(prescription_id,option_id,result)
			VALUES
			'.$tests.';
			';
			//echo $sql;
			return $db->Execute($sql);
			
		}
	}	
	
	
	
	function CountMedicine()
	{
		global $db;
		$sql = 'SELECT COUNT(id) FROM '.DB_PREFIX.'medicine LIMIT 1';
		return $db->QueryItem($sql);
	}

	function GetMedicine($startIndex,$limit)
	{
		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'medicine ORDER BY name ASC LIMIT '.$startIndex.', '.$limit;
		return $db->QueryArray($sql);
	}
	function GetAllMedicine()
	{
		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'medicine ORDER BY name ASC';
		return $db->QueryArray($sql);
	}
	function CountSearchedMedicine($q,$field)
	{
		global $db;
		$sql = 'SELECT COUNT(id) FROM '.DB_PREFIX.'medicine WHERE '.$field.' LIKE "%'.$q.'%" LIMIT 1';
		return $db->QueryItem($sql);
	}

	function GetMedicineBySearch($q,$field, $startIndex,$limit)
	{
		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'medicine WHERE '.$field.'  LIKE "%'.$q.'%" LIMIT '.$startIndex.' ,'.$limit;
		   //echo $sql;
		return $db->QueryArray($sql);
	}

	function GetMedicineDetail($id)
	{
		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'medicine WHERE id='.$id.' LIMIT 1';
		return $db->QueryRow($sql);
	}

	function UpdateMedicine($data)
	{
		global $db;
		$sql = 'UPDATE '.DB_PREFIX.'medicine SET
		name = "'.$data["name"].'",
		formula = "'.$data["formula"].'",
		type = "'.$data["type"].'",
		dose = "'.$data["dose"].'",
		company = "'.$data["company"].'"

		WHERE id='.$data["id"].' LIMIT 1
		';
		return $db->Execute($sql);
	}

	function Delete($id)
	{
		global $db;
		$sql = 'DELETE FROM '.DB_PREFIX.'medicine WHERE id='.$id.' LIMIT 1';
		return $db->Execute($sql);
	}
	
	function deletePrescriptionByPatientId($id)
	{
		global $db;
		$sqlSelect='SELECT * FROM '.DB_PREFIX.'prescription WHERE patient_id='.$id;
		$resEx=$db->query($sqlSelect);
		
		$id_Result= "";
		$str_array=[];

		while ($id_Result = $resEx->fetch_assoc())
		{
			array_push($str_array, $id_Result['id']);
		} 
		 foreach ($str_array as $key ) {

		 	 $this->RemoveInstruction($key);
		 	 $this->RemoveTestOption($key);
		 }

			  $sql = 'DELETE FROM '.DB_PREFIX.'prescription WHERE patient_id='.$id;
			   return $db->Execute($sql);
		}


    function deletePrescription($id){
          global $db;
             $this->RemoveInstruction($id);
		 	 $this->RemoveTestOption($id);

		 	  $sql = 'DELETE FROM '.DB_PREFIX.'prescription WHERE id='.$id;
			   return $db->Execute($sql);
    }

    function ListOfPrescriptionsForSinglePatient($startIndex,$limit,$id)
	{
		global $db;
		$sql = '
		SELECT pt.id as patient_id,pt.name as patient_name, p.id as id, p.description as description, p.complain as complain, 
		p.next_date as next_date, p.created_on as created_on,DATE(p.created_on) as date,  p.updated_on as updated_on				

		FROM  '.DB_PREFIX.'prescription p 
		LEFT JOIN '.DB_PREFIX.'patient pt ON p.patient_id = pt.id WHERE p.patient_id='.$id.'

		ORDER BY created_on DESC

		LIMIT '.$startIndex.', '.$limit;
		//echo $sql;
		return $db->QueryArray($sql);
	}

   function GetPatientRecord($id){
      
        global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'prescription WHERE patient_id='.$id;
		
		return $db->QueryArray($sql);
   }


	}

	?>