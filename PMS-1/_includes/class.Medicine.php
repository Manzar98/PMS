<?php

Class Medicine
{
	
	function AddMedicine($data)
	{
		global $db;
		$sql = 'INSERT INTO '.DB_PREFIX.'medicine (name,formula,dose,type,company,created_on)
		VALUES(
		"'.$data["name"].'",
		"'.$data["formula"].'",
		"'.$data["dose"].'",
		"'.$data["type"].'",
		"'.$data["company"].'",
		NOW())';

		return  $db->Execute($sql);
		echo  $db->insert_id;


	}
	function CountMedicine()
	{
		global $db;
		$sql = 'SELECT COUNT(id) FROM '.DB_PREFIX.'medicine LIMIT 1';
		return $db->QueryItem($sql);
	}

	function GetMedicine($startIndex = 0,$limit = false)
	{
		global $db;
		$sql_limit = '';
		if($limit)
		{
			$sql_limit = 'LIMIT '.$startIndex.', '.$limit;
		}
		$sql = 'SELECT * FROM '.DB_PREFIX.'medicine ORDER BY name ASC '.$sql_limit;
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

	function GetAllMedicineonrealtime($insertedId)
	{

		global $db;
		$sqlSelect = 'SELECT * FROM '.DB_PREFIX.'medicine ORDER BY name ASC';

		$resEx=$db->query($sqlSelect);
		$Result= "";
		$id_array=[];
		$name_array=[];

		while ($Result = $resEx->fetch_assoc())
		{
			array_push($id_array, $Result['id']);
			array_push($name_array, $Result['name']);
		}
	
		$newMsgArr=array(
			"id"=> $id_array,
			"medi"=> $name_array,
			"insertedId" => $insertedId
		);
		 return $newMsgArr;


	}



	
	
}

?>