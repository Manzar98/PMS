<?php 
Class User 

{

  function AddUser($data)
  {
  	global $db;
	   $sql = 'INSERT INTO '.DB_PREFIX.'admin 
	   		  (username,email,expire,F_name,L_name,city,c_address,quali,exprience,mobile,phone,profile_img,d_join,password,specialist,package_id) VALUES (
			   "'.$data["name"].'",
			   "'.$data["email"].'",
			   "'.$data["expire"].'",
			   "'.$data["F_name"].'",
			   "'.$data["L_name"].'",
			   "'.$data["city"].'",
			   "'.$data["c_address"].'",
			   "'.$data["quali"].'",
			   "'.$data["exprience"].'",
			   "'.$data["mobile"].'",
			   "'.$data["phone"].'",
			   "'.$data["profile_img"].'",
			   NOW(),
			   "'.md5($data["password"]).'",
			   "'.$data["specialist"].'",
			   "'.$data['package_id'].'" )';
			  // echo $sql;
	   return $db->Execute($sql);
  }

  function GetAllUsers(){

  	global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'admin ORDER BY username ASC ';
		// echo $sql;
		return $db->QueryArray($sql);
  }

  function CountSearchedUsers($q,$field)
	{
		global $db;
		$sql = 'SELECT COUNT(id) FROM '.DB_PREFIX.'admin WHERE '.$field.' LIKE "%'.$q.'%" LIMIT 1';
		return $db->QueryItem($sql);
	}

	function GetUserBySearch($q,$field, $startIndex,$limit)
	{
		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'admin WHERE '.$field.'  LIKE "%'.$q.'%" LIMIT '.$startIndex.' ,'.$limit;
		   //echo $sql;
		return $db->QueryArray($sql);
	}

	function CountUsers()
	{
		global $db;
		$sql = 'SELECT COUNT(id) FROM '.DB_PREFIX.'admin LIMIT 1';
		return $db->QueryItem($sql);
	}

	function GetUser($startIndex = 0,$limit = false)
	{
		global $db;
		$sql_limit = '';
		if($limit)
		{
			$sql_limit = 'LIMIT '.$startIndex.', '.$limit;
		}
		$sql = 'SELECT * FROM '.DB_PREFIX.'admin ORDER BY username ASC '.$sql_limit;
		return $db->QueryArray($sql);
	}

	function GetUserInfo($id)
	{
        global $db;
        $sql = 'SELECT * FROM '.DB_PREFIX.'admin WHERE id='.$id;
        // echo $sql;
       return $db->QueryRow($sql);
       
	}
	

	function updateUser($data)
	{
		global $db;

		if (!empty($data['profile_img'])) {
			$sql= 'UPDATE '.DB_PREFIX.'admin SET
			username="'.$data['name'].'",
			email="'.$data['email'].'",
			F_name="'.$data["F_name"].'",
			L_name="'.$data["L_name"].'",
			city="'.$data["city"].'",
			c_address="'.$data["c_address"].'",
			quali="'.$data["quali"].'",
			exprience="'.$data["exprience"].'",
			mobile="'.$data["mobile"].'",
			phone="'.$data["phone"].'",
			profile_img="'.$data['profile_img'].'",
			specialist="'.$data['specialist'].'",
			package_id="'.$data['package_id'].'",
			expire="'.$data['expire'].'",
			WHERE id='.$data['id'];
		}else{
			$sql= 'UPDATE '.DB_PREFIX.'admin SET
			username="'.$data['name'].'",
			email="'.$data['email'].'",
			F_name="'.$data["F_name"].'",
			L_name="'.$data["L_name"].'",
			city="'.$data["city"].'",
			c_address="'.$data["c_address"].'",
			quali="'.$data["quali"].'",
			exprience="'.$data["exprience"].'",
			mobile="'.$data["mobile"].'",
			phone="'.$data["phone"].'",
			specialist="'.$data['specialist'].'",
			package_id="'.$data['package_id'].'",
			expire="'.$data['expire'].'"
			WHERE id='.$data['id'];
		}
		
        // echo $sql;
			return $db->Execute($sql);
	}
		function updateOwnProfile($data)
	{
		global $db;

		if (!empty($data['profile_img'])) {
			$sql= 'UPDATE '.DB_PREFIX.'admin SET
			username="'.$data['name'].'",
			email="'.$data['email'].'",
			F_name="'.$data["F_name"].'",
			L_name="'.$data["L_name"].'",
			city="'.$data["city"].'",
			c_address="'.$data["c_address"].'",
			quali="'.$data["quali"].'",
			exprience="'.$data["exprience"].'",
			mobile="'.$data["mobile"].'",
			phone="'.$data["phone"].'",
			profile_img="'.$data['profile_img'].'",
			specialist="'.$data['specialist'].'",
			expire="'.$data['expire'].'",
			WHERE id='.$data['id'];
		}else{
			$sql= 'UPDATE '.DB_PREFIX.'admin SET
			username="'.$data['name'].'",
			email="'.$data['email'].'",
			F_name="'.$data["F_name"].'",
			L_name="'.$data["L_name"].'",
			city="'.$data["city"].'",
			c_address="'.$data["c_address"].'",
			quali="'.$data["quali"].'",
			exprience="'.$data["exprience"].'",
			mobile="'.$data["mobile"].'",
			phone="'.$data["phone"].'",
			specialist="'.$data['specialist'].'",
			expire="'.$data['expire'].'"
			WHERE id='.$data['id'];
		}
		
        // echo $sql;
			return $db->Execute($sql);
	}

	function DeleteUser($id)
	{
		global $db;
		$sql= 'UPDATE '.DB_PREFIX.'admin SET
			is_delete="on"
			WHERE id='.$id;

			return $db->Execute($sql);
	}


function ReactivateUser($id)
	{
		global $db;
		$sql= 'UPDATE '.DB_PREFIX.'admin SET
			is_delete="off"
			WHERE id='.$id;

			return $db->Execute($sql);
	}

	function checkDoctorConsumptionExist($user_id){

		global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'doctor_consumption WHERE user_id='.$user_id;

		return $db->QueryRow($sql);
	}

	function addColumnCount($user_id,$colName,$colVal){

		global $db;
		$sql = 'INSERT INTO '.DB_PREFIX.'doctor_consumption(user_id,'.$colName.')VALUES("'.$user_id.'","'.$colVal.'")';
		//echo $sql;
		return $db->Execute($sql);
	}

	function updateColumnCount($user_id,$colName,$colVal){

       global $db;
       $sql= 'UPDATE '.DB_PREFIX.'doctor_consumption SET
			'.$colName.'="'.$colVal.'"
			WHERE user_id='.$user_id;

			return $db->Execute($sql);
	}


}



?>