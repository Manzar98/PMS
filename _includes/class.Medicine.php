<?php

Class Medicine
{
	
	function AddMedicine($data)
	{
		global $db;

		// print_r($data);
		for ($i=0; $i <count($data['dose']) ; $i++) {

			$sql = 'INSERT INTO '.DB_PREFIX.'medicine (name,user_id,formula,dose,type,company,created_on)
			VALUES(
			"'.$data["name"].'",
			"'.$_SESSION['AdminId'].'",
			"'.$data["formula"].'",
			"'.$data["dose"][$i].'",
			"'.$data["type"].'",
			"'.$data["company"].'",
			NOW())';
			$res= $db->Execute($sql);
		}
		return  $res;
		// echo  $db->insert_id;


	}
	function CountMedicine()
	{
		global $db;
		$sql = 'SELECT COUNT(id) FROM '.DB_PREFIX.'medicine WHERE user_id='.$_SESSION['AdminId'].' LIMIT 1';
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
		$sql = 'SELECT * FROM '.DB_PREFIX.'medicine WHERE user_id='.$_SESSION['AdminId'].' ORDER BY name ASC '.$sql_limit;
		// echo $sql;
		return $db->QueryArray($sql);
	}
	function GetAllMedicine()
	{
		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'medicine WHERE user_id='.$_SESSION['AdminId'].' ORDER BY name ASC';
// echo $sql;
		return $db->QueryArray($sql);
	}
	function CountSearchedMedicine($q,$field)
	{
		global $db;
		$sql = 'SELECT COUNT(id) FROM '.DB_PREFIX.'medicine WHERE user_id='.$_SESSION['AdminId'].' AND '.$field.' LIKE "%'.$q.'%" LIMIT 1';
		return $db->QueryItem($sql);
	}

	function GetMedicineBySearch($q,$field, $startIndex,$limit)
	{
		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'medicine WHERE user_id='.$_SESSION['AdminId'].' AND '.$field.'  LIKE "%'.$q.'%" LIMIT '.$startIndex.' ,'.$limit;
		   //echo $sql;
		return $db->QueryArray($sql);
	}

	function GetMedicineDetail($id)
	{
		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'medicine WHERE user_id='.$_SESSION['AdminId'].' AND id='.$id.' LIMIT 1';
		return $db->QueryRow($sql);
	}

	function UpdateMedicine($data)
	{
		global $db;
		for ($i=0; $i <count($data['dose']) ; $i++) {
            // echo $data['dose'][$i];
			if (!empty($data["id"])) {
				$sql = 'UPDATE '.DB_PREFIX.'medicine SET
				name = "'.$data["name"].'",
				formula = "'.$data["formula"].'",
				type = "'.$data["type"].'",
				dose = "'.$data["dose"][$i].'",
				company = "'.$data["company"].'"

				WHERE id='.$data["id"].' LIMIT 1
				';
			}else{

				$sql = 'INSERT INTO '.DB_PREFIX.'medicine (name,user_id,formula,dose,type,company,created_on)
				VALUES(
				"'.$data["name"].'",
				"'.$_SESSION['AdminId'].'",
				"'.$data["formula"].'",
				"'.$data["dose"][$i].'",
				"'.$data["type"].'",
				"'.$data["company"].'",
				NOW())';
			}

			$res=	$db->Execute($sql);
		}
		return $res;

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
		$sqlSelect = 'SELECT * FROM '.DB_PREFIX.'medicine WHERE user_id='.$_SESSION['AdminId'].' ORDER BY name ASC';

		$resEx=$db->query($sqlSelect);
		$Result= "";
		$id_array=[];
		$name_array=[];
		$dose_array=[];

		while ($Result = $resEx->fetch_assoc())
		{
			array_push($id_array, $Result['id']);
			array_push($name_array, $Result['name']);
			array_push($dose_array, $Result['dose']);
		}

		$newMsgArr=array(
			"id"=> $id_array,
			"medi"=> $name_array,
			"dose"=> $dose_array,
			"insertedId" => $insertedId
		);
		return $newMsgArr;
	}
	
}

?>