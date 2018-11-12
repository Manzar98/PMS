<?php 
Class User 

{

  function AddUser($data)
  {
  	global $db;
	   $sql = 'INSERT INTO '.DB_PREFIX.'admin 
	   		  (username,email,expire,d_join,password) VALUES (
			   "'.$data["name"].'",
			   "'.$data["email"].'",
			   "'.$data["expire"].'",
			   NOW(),
			   "'.md5($data["password"]).'") ';
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
       return $db->QueryRow($sql);

	}
	function deleteUser($id)
	{
		global $db;
		$sql = 'DELETE FROM '.DB_PREFIX.'admin WHERE id='.$id.' LIMIT 1';
		return $db->Execute($sql);
	}

	function updateUser($data)
	{
		global $db;
		$sql= 'UPDATE '.DB_PREFIX.'admin SET
			name="'.$data['name'].'",
			email="'.$data['email'].'",
			expire="'.$data['expire'].'"
			WHERE id='.$data['id'];

			return $db->Execute($sql);
	}



}



?>