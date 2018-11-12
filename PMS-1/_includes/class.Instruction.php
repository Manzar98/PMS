<?php
Class Instruction
{
	function AddInstruction($data)
	 {
	   global $db;
	   $sql = 'INSERT INTO '.DB_PREFIX.'instructions 
	   		  (medicine_id,instruction,created_on) VALUES (
			   "'.$data["medicine_id"].'",
			   "'.$data["instruction"].'",
			   NOW()) ';
       //echo $sql;
	   return $db->Execute($sql);
	 }
	 	 
	 
	  function GetInstructions($startIndex,$limit)
	  {
		global $db;
		$sql = 'SELECT medicine.id as medicine_id, medicine.name as medicine_name,instructions.id as id, instructions.instruction as instruction FROM '.DB_PREFIX.'instructions as instructions LEFT JOIN '.DB_PREFIX.'medicine as medicine ON instructions.medicine_id=medicine.id ORDER BY medicine.name ASC LIMIT '.$startIndex.', '.$limit.'';
		//echo $sql;
		return $db->QueryArray($sql);
	  }
	  
	  function GetInstructionsBasic($startIndex,$limit)
	  {
		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'instructions LIMIT '.$startIndex.', '.$limit.'';
		//echo $sql;
		return $db->QueryArray($sql);
	  }
	  function GetMedicineInstructions($medicine_id)
	  {
		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'instructions WHERE medicine_id="'.$medicine_id.'"';
		//echo $sql;
		return $db->QueryArray($sql);
	  }	  
	  
	  function GetInstructionsWithoutMedicine()
	  {
	  	global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'instructions WHERE medicine_id="" ';
		return $db->QueryArray($sql);
	  }	
		
	  function GetInstructionsDetail($id)
	  {
		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'instructions WHERE id="'.$id.'" LIMIT 1';
		return $db->QueryRow($sql);
	  }	  		  
	  
	  function DeleteInstructions($id)
	  {
	  	global $db;
		$sql = 'DELETE FROM '.DB_PREFIX.'instructions WHERE id="'.$id.'" LIMIT 1';
		return $db->Execute($sql);
	  }

   	 function CountInstructions()
	 {
	 	global $db;
		$sql = 'SELECT COUNT(id) FROM '.DB_PREFIX.'instructions LIMIT 1';
		return $db->QueryItem($sql);
	 }
	 
	  function GetInstructionsDetails($id)
	   {
		 global $db;
		 $sql = 'SELECT * FROM '.DB_PREFIX.' instructions as instructions, '.DB_PREFIX.' medicine as medicine WHERE medicine.id=instructions.medicine_id AND instructions.id="'.$id.'" LIMIT 1';
		 return $db->QueryRow($sql);
	   }
		
		function GetInstructionsBasicDetails($id)
	   {
		 global $db;
		 $sql = 'SELECT * FROM '.DB_PREFIX.' instructions WHERE id="'.$id.'" LIMIT 1'
		 ;
		 return $db->QueryRow($sql);
	   }
		
		function UpdateInstruction($data,$id)
		{
			global $db;
			$sql = 'UPDATE '.DB_PREFIX.'instructions SET instruction="'.$data["instruction"].'",
					medicine_id = "'.$data["medicine_id"].'"
					WHERE id="'.$id.'" LIMIT 1;
					'; 
			return $db->Execute($sql);
		}
		
		function CountSearchedInstructions($q,$field)
		{
			global $db;
			$sql = 'SELECT COUNT(id) FROM '.DB_PREFIX.'instructions WHERE "'.$field.'" LIKE "%'.$q.'%" LIMIT 1';
			return $db->QueryItem($sql);
		}
		  			 
		function GetInstructionsBySearch($q,$field, $startIndex,$limit)
		 {
		   global $db;
		   $sql = 'SELECT medicine.id as medicine_id, medicine.name as medicine_name,instructions.id as id, instructions.instruction as instruction FROM '.DB_PREFIX.'instructions as instructions LEFT JOIN '.DB_PREFIX.'medicine as medicine ON instructions.medicine_id=medicine.id WHERE '.$field.'  LIKE "%'.$q.'%" ORDER BY medicine.name LIMIT '.$startIndex.' ,'.$limit.'';
		  // echo $sql;
		   return $db->QueryArray($sql);
		 }
		
		
}
?>
