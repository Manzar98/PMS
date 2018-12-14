<?php 
Class User 

{
  function AddUser($data)
  {
  	global $db;
	   $sql = 'INSERT INTO '.DB_PREFIX.'admin 
	   		  (username,email,expire,F_name,L_name,city,c_address,quali,exprience,mobile,phone,profile_img,d_join,password,specialist,package_id,c_fee,c_name) VALUES (
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
			   "'.$data['package_id'].'",
			   "'.$data['c_fee'].'" ,
			   "'.$data['c_name'].'" )';
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
			c_fee="'.$data['c_fee'].'",
			c_name="'.$data['c_name'].'",
			expire="'.$data['expire'].'"
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
			c_fee="'.$data['c_fee'].'",
			c_name="'.$data['c_name'].'",
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
			c_name="'.$data['c_name'].'",
			c_fee="'.$data['c_fee'].'"
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
			expire="'.$data['expire'].'",
			c_name="'.$data['c_name'].'",
			c_fee="'.$data['c_fee'].'"
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
	function sendPasswordInEmail($arrayObj){

  $to = $arrayObj['email']; // note the comma
  // if(isset($arrayObj['forget'])){
  //   $forget = true;
  // }

// Subject
  // if($forget){
  // $subject = 'Your New Password for login into Agent Time & Resource Management System(ATRMS).';

  // }else{
  $subject = 'Congratulation! Your Registertion is done successfully.';

  // }

// Message
  $message = '
  <html>
  <head>
    <title>Your Credential</title>
  </head>
  <body>
    <p>Here are your information!</p>
    <table>
      <tr>
        <th>User Name</th><th>Password</th><th>Email</th><th>User Id</th>
      </tr>
      <tr>
        <td>'.$arrayObj['username'].'</td> <td>'.$arrayObj['password'].'</td> <td>'.$arrayObj['email'].'</td> <td>'.$arrayObj['user_id'].'</td>
      </tr>
    </table>
  </body>
  </html>
  ';

// To send HTML mail, the Content-type header must be set
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
//$headers[] = 'To: '.$arrayObj['firstName'].' '.$arrayObj['lastName'].' '.$arrayObj['email'].'';
  $headers[] = 'From: HR Department <hr@undp.com>';
//$headers[] = 'Cc: birthdayarchive@example.com';
//$headers[] = 'Bcc: birthdaycheck@example.com';

// Mail it
 mail($to, $subject, $message, implode("\r\n", $headers));
}
}
?>