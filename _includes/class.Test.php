<?php
Class Test
{
	function AddTest($data)
	 {
	   global $db;
	   $sql = 'INSERT INTO '.DB_PREFIX.'tests 
	   		  (name,user_id,created_on) VALUES (
			   "'.$data["name"].'",
			   "'.$_SESSION['AdminId'].'",
			   NOW()) ';
	   return $db->Execute($sql);
	 }
	 
	 function AddTestOptions($data,$test_id)
	 {
	   global $db;
	   $sql = 'INSERT INTO '.DB_PREFIX.'test_options 
	   		  (name,measurement,normal_range,test_id) VALUES (
			   "'.$data["name"].'",
			   "'.$data["measurement"].'",
			   "'.$data["normal_range"].'",
			   "'.$test_id.'"
				)';
	   return $db->Execute($sql);
	 }
	 
	 
	  function GetTests($startIndex,$limit)
	  {
		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'tests as tests, '.DB_PREFIX.'test_options as test_options WHERE tests.id=test_options.test_id AND tests.user_id='.$_SESSION['AdminId'].' ORDER BY tests.name ASC LIMIT '.$startIndex.', '.$limit;
		// echo $sql;
		return $db->QueryArray($sql);
	  }
	  
	  function GetTestsBasic($startIndex = 0,$limit = false)
	  {
		global $db;
		$sql_limit = '';
		if($limit)
		{
			$sql_limit = 'LIMIT '.$startIndex.', '.$limit;
		}
		$sql = 'SELECT * FROM '.DB_PREFIX.'tests WHERE user_id='.$_SESSION['AdminId'].' ORDER BY name ASC '.$sql_limit;
		// echo $sql;
		return $db->QueryArray($sql);
	  }
	  
	  
	  
	  function GetTestOptions($test_id)
	  {
		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'test_options WHERE test_id='.$test_id.' ORDER BY name ASC';
		return $db->QueryArray($sql);
	  }	  
		
	  function GetTestOptionsDetail($id)
	  {
		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'test_options WHERE id='.$id.' LIMIT 1';
		return $db->QueryRow($sql);
	  }	  		  
	  
	  function DeleteTest($id)
	  {
	  	global $db;
		$sql = 'DELETE FROM '.DB_PREFIX.'tests WHERE id='.$id.' LIMIT 1';
		return $db->Execute($sql);
	  }
	  function DeleteTestOption($id)
	  {
	  	global $db;
		$sql = 'DELETE FROM '.DB_PREFIX.'test_options WHERE id='.$id.' LIMIT 1';
		return $db->Execute($sql);
	  }
  
   	 function CountTests()
	 {
	 	global $db;
		$sql = 'SELECT COUNT(id) FROM '.DB_PREFIX.'tests WHERE user_id='.$_SESSION['AdminId'].' LIMIT 1';
		return $db->QueryItem($sql);
	 }
	 
	 function CountTestOptions($test_id)
	 {
	 	global $db;
		$sql = 'SELECT COUNT(id) FROM '.DB_PREFIX.'test_option WHERE test_id='.$test_id.' LIMIT 1';
		return $db->QueryItem($sql);
	 }
	 
		
	  function GetTestDetails($id)
	   {
		 global $db;
		 $sql = 'SELECT * FROM '.DB_PREFIX.'tests as tests, '.DB_PREFIX.'test_options as test_options WHERE tests.id=test_options.test_id AND tests.id='.$id.' LIMIT 1';
		 return $db->QueryRow($sql);
	   }
		
		function GetTestBasicDetails($id)
	   {
		 global $db;
		 $sql = 'SELECT * FROM '.DB_PREFIX.'tests WHERE id='.$id.' AND user_id='.$_SESSION['AdminId'].' LIMIT 1';

		 return $db->QueryRow($sql);
	   }
		
		function UpdateTest($data,$id)
		{
			global $db;
			$sql = 'UPDATE '.DB_PREFIX.'tests SET name="'.$data["name"].'"
					WHERE id='.$id.' LIMIT 1;
					'; 
			return $db->Execute($sql);
		}
		
		function UpdateTestOptions($data,$id)
		{
			global $db;
			$sql = 'UPDATE '.DB_PREFIX.'test_options SET 
					name="'.$data["name"].'",
					measurement="'.$data["measurement"].'",
					normal_range="'.$data["normal_range"].'"
					WHERE id='.$id.' LIMIT 1
					'; 
			//echo $sql;
			return $db->Execute($sql);
		}


		function GetTestsBasiconrealtime($insertedId)
	  {
		global $db;
		
		$sqlSelect = 'SELECT * FROM '.DB_PREFIX.'tests WHERE user_id='.$_SESSION['AdminId'].' ORDER BY name ASC ';
		// echo $sql;
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
			"ids"=> $id_array,
			"test"=> $name_array,
			"insertedId" => $insertedId
		);
		 return $newMsgArr;

	  }	

	 function GetTestBySearch($q,$field, $startIndex,$limit)
	{
		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'tests WHERE '.$field.'  LIKE "%'.$q.'%" LIMIT '.$startIndex.' ,'.$limit;
		   //echo $sql;
		return $db->QueryArray($sql);
	}
	  function CountSearchedTest($q,$field)
	{
		global $db;
		$sql = 'SELECT COUNT(id) FROM '.DB_PREFIX.'tests WHERE user_id='.$_SESSION['AdminId'].' AND '.$field.' LIKE "%'.$q.'%" LIMIT 1';
		// echo $sql;
		return $db->QueryItem($sql);

	}

	
}
?>
