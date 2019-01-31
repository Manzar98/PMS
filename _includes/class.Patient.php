<?php
Class Patient
{
	
	function GetPatientInfo($id)
	{
		global $db;
		$sql = '
		SELECT p.id as patient_id, p.name as patient_name, p.phone,
		p.mobile, p.gender, p.address, p.dob, p.blood_group, p.marital_status,
		p.occupation, p.field1, p.field2,p.value1, p.value2,p.created_on,DATE(p.created_on) as date,

		f.father , f.mother, f.siblings, f.spouse, f.offspring,

		l.tabacco, l.coffee, l.alcohol, l.recreational_drugs, l.counseling, 
		l.exercise_patterns, l.hazardous_activities, l.sleep_patterns,l.seatbelt_use,

		oh.field1 as other_history_field1, oh.value1 as other_history_value1, oh.field2 as other_history_field2,
		oh.value2 as other_history_value2, oh.additional_history as other_additional_history,

		r.cancer, r.diabetes, r.epilepsy, r.heart, r.high_blood_pressure, r.mental_illness, r.stroke, r.suicide, r.tuberculosis,

		c.name as city_name, c.id as city_id


		FROM      '.DB_PREFIX.'patient p 
		LEFT JOIN '.DB_PREFIX.'family_history f ON p.id = f.patient_id
		LEFT JOIN '.DB_PREFIX.'lifestyle l ON p.id = l.patient_id
		LEFT JOIN '.DB_PREFIX.'other_history oh ON p.id = oh.patient_id
		LEFT JOIN '.DB_PREFIX.'relatives r ON p.id = r.patient_id
		LEFT JOIN '.DB_PREFIX.'cities c ON p.city_id = c.id

		WHERE p.id = '.$id.' LIMIT 1';
		// echo $sql;
		return $db->QueryRow($sql);
	}
	
	function AddPatient($data)
	{
		global $db;
		echo $sql = 'INSERT INTO '.DB_PREFIX.'patient 
		(name,user_id,gender,dob,marital_status,blood_group,occupation,
		mobile,phone,city_id,address,field1,value1,field2,value2,p_image,security_key,email,created_on) VALUES (
		"'.$data["name"].'",
		"'.$data["userId"].'",
		"'.$data["gender"].'",
		"'.$data["dob"].'",
		"'.$data["marital_status"].'",
		"'.$data["blood_group"].'",
		"'.$data["occupation"].'",
		"'.$data["mobile"].'",
		"'.$data["phone"].'",
		"'.$data["city_id"].'",
		"'.$data["address"].'",
		"'.$data["field1"].'",
		"'.$data["value1"].'",
		"'.$data["field2"].'",
		"'.$data["value2"].'",
		"'.$data["profile_img"].'",
		"'.$data["security_key"].'",
		"'.$data["email"].'",
		NOW())	
		';
		return $db->Execute($sql);
	}

	function AddPatBasic($data)
	{
		global $db;
		$sql = 'INSERT INTO '.DB_PREFIX.'patient 
		(name,user_id,gender,dob,marital_status,
		mobile,city_id,address,security_key,email,created_on) VALUES (
		"'.$data["name"].'",
		"'.$data["id"].'",
		"'.$data["gender"].'",
		"'.$data["dob"].'",
		"'.$data["marital_status"].'",
		"'.$data["mobile"].'",
		"'.$data["city_id"].'",
		"'.$data["address"].'",
		"'.$data["security_key"].'",
		"'.$data["email"].'",
		NOW())	
		';
	 echo $sql;
		return $db->Execute($sql);
	}

	function AddPatientBasic($data)
	{
		global $db;
		$sql = 'INSERT INTO '.DB_PREFIX.'patient 
		(name,user_id,mobile,city_id,security_key,email,created_on) VALUES (
		"'.$data["name"].'",
		"'.$data["userId"].'",
		"'.$data["mobile"].'",
		"'.$data["city_id"].'",
		"'.$data["security_key"].'",
		"'.$data["email"].'",
		NOW())	
		';
		return $db->Execute($sql);
	}	 

	function GetPatients($startIndex,$id,$limit)
	{
		global $db;
		$sql = 'SELECT id FROM '.DB_PREFIX.'patient WHERE user_id='.$id.' ORDER BY created_on DESC LIMIT '.$startIndex.', '.$limit;
		//echo $sql;
		
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$patients[] = $this->GetPatientInfo($row['id']);
		}
		if (isset($patients)) {

			return $patients;
		}
		
	}

	function DeletePatient($id)
	{
		global $db;
		$sql = 'DELETE FROM '.DB_PREFIX.'patient WHERE id='.$id.' LIMIT 1';
		return $db->Execute($sql);
		
	}


	function CountPatients()
	{
		global $db;
		$sql = 'SELECT COUNT(id) FROM '.DB_PREFIX.'patient LIMIT 1';
		return $db->QueryItem($sql);
	}

	function getPatientsCount($user_id){
		global $db;
		$sql='SELECT count(*) From'.DB_PREFIX.' patient WHERE user_id='.$user_id;
		return $db->QueryItem($sql);
	}

	function GetPatientDetails($id)
	{
		global $db;
		$sql = 'SELECT p.*, c.id as city_id, c.name as city_name FROM '.DB_PREFIX.'patient p LEFT JOIN '.DB_PREFIX.'cities c ON p.city_id = c.id WHERE p.id='.$id.' LIMIT 1';
		 //echo $sql;
		return $db->QueryRow($sql);
	}

	function UpdatePatient($data)
	{
		global $db;

		if (!empty($data['profile_img'])) {
			$sql = 'UPDATE '.DB_PREFIX.'patient SET
			name = "'.$data["name"].'",
			gender = "'.$data["gender"].'",
			dob = "'.$data["dob"].'",
			marital_status = "'.$data["marital_status"].'",
			blood_group = "'.$data["blood_group"].'",
			occupation = "'.$data["occupation"].'",
			mobile = "'.$data["mobile"].'",
			phone = "'.$data["phone"].'",
			city_id = "'.$data["city_id"].'",
			address = "'.$data["address"].'",
			field1 = "'.$data["field1"].'",
			value1 = "'.$data["value1"].'",
			field2 = "'.$data["field2"].'",
			value2 = "'.$data["value2"].'",
			p_image= "'.$data['profile_img'].'",
			updated_on = NOW()
			WHERE  id="'.$data["id"].'" LIMIT 1 ';

		}else{

			$sql = 'UPDATE '.DB_PREFIX.'patient SET
			name = "'.$data["name"].'",
			gender = "'.$data["gender"].'",
			dob = "'.$data["dob"].'",
			marital_status = "'.$data["marital_status"].'",
			blood_group = "'.$data["blood_group"].'",
			occupation = "'.$data["occupation"].'",
			mobile = "'.$data["mobile"].'",
			phone = "'.$data["phone"].'",
			city_id = "'.$data["city_id"].'",
			address = "'.$data["address"].'",
			field1 = "'.$data["field1"].'",
			value1 = "'.$data["value1"].'",
			field2 = "'.$data["field2"].'",
			value2 = "'.$data["value2"].'",
			updated_on = NOW()
			WHERE  id="'.$data["id"].'" LIMIT 1 ';


		}
			   //echo $sql;
		return $db->Execute($sql);
	}

	function CountSearchedPatients($q,$field)
	{
		global $db;
		$sql = 'SELECT COUNT(id) FROM '.DB_PREFIX.'patient WHERE user_id='.$_SESSION['AdminId'].' AND '.$field.' LIKE "%'.$q.'%" LIMIT 1';
		return $db->QueryItem($sql);
	}

	function GetPatientsByQuery($q,$field, $startIndex,$limit)
	{
		global $db;
		$sql = 'SELECT id FROM '.DB_PREFIX.'patient WHERE user_id='.$_SESSION['AdminId'].' AND '.$field.'  LIKE "%'.$q.'%" LIMIT '.$startIndex.' ,'.$limit;
		   // echo $sql;
		$result = $db->query($sql);

		$patients="";

		while ($row = $result->fetch_assoc())
		{

			$patients[] = $this->GetPatientInfo($row['id']);
		}

		return $patients;

	}


		/////// Patient Lifestyle //////

	function AddPatientLifestyle($data)
	{
		global $db;
		$sql = 'INSERT INTO  '.DB_PREFIX.'lifestyle (
		patient_id ,tabacco ,coffee ,alcohol ,recreational_drugs ,counseling ,
		exercise_patterns ,hazardous_activities ,sleep_patterns ,seatbelt_use )
		VALUES (
		"'.$data["patient_id"].'",
		"'.$data["tabacco"].'",
		"'.$data["coffee"].'",
		"'.$data["alcohol"].'",
		"'.$data["recreational_drugs"].'",
		"'.$data["counseling"].'",
		"'.$data["exercise_patterns"].'",
		"'.$data["hazardous_activities"].'",
		"'.$data["sleep_patterns"].'",
		"'.$data["seatbelt_use"].'"
	)';
			//echo $sql;
	return $db->Execute($sql);
}

function UpdatePatientLifestyle($data)
{
	global $db;
	$sql = 'UPDATE '.DB_PREFIX.'lifestyle SET
	tabacco = "'.$data["tabacco"].'",
	coffee = "'.$data["coffee"].'",
	alcohol = "'.$data["alcohol"].'",
	recreational_drugs = "'.$data["recreational_drugs"].'",
	counseling = "'.$data["counseling"].'",
	exercise_patterns = "'.$data["exercise_patterns"].'",
	hazardous_activities = "'.$data["hazardous_activities"].'",
	sleep_patterns = "'.$data["sleep_patterns"].'",
	seatbelt_use = "'.$data["seatbelt_use"].'"

	WHERE patient_id='.$data["patient_id"].' LIMIT 1';
	return $db->Execute($sql);
}

function GetPatientLifestyle($data)
{
	global $db;
	$sql = 'SELECT * FROM '.DB_PREFIX.'lifestyle WHERE patient_id='.$data["patient_id"].' LIMIT 1';
	return $db->QueryRow($sql);
}

	/////////// Patient Relatives /////////////


function AddPatientRelatives($data)
{
	global $db;
	$sql = 'INSERT INTO  '.DB_PREFIX.'relatives (
	patient_id ,cancer ,diabetes ,epilepsy ,heart ,high_blood_pressure,
	mental_illness,stroke ,suicide , tuberculosis )
	VALUES (
	"'.$data["patient_id"].'",
	"'.$data["cancer"].'",
	"'.$data["diabetes"].'",
	"'.$data["epilepsy"].'",
	"'.$data["heart"].'",
	"'.$data["high_blood_pressure"].'",
	"'.$data["mental_illness"].'",
	"'.$data["stroke"].'",
	"'.$data["suicide"].'",
	"'.$data["tuberculosis"].'"
)';
			//echo $sql;
return $db->Execute($sql);
}

function UpdatePatientRelatives($data)
{
	global $db;
	$sql = 'UPDATE '.DB_PREFIX.'relatives SET
	cancer = "'.$data["cancer"].'",
	diabetes = "'.$data["diabetes"].'",
	epilepsy = "'.$data["epilepsy"].'",
	heart = "'.$data["heart"].'",
	high_blood_pressure = "'.$data["high_blood_pressure"].'",
	mental_illness = "'.$data["mental_illness"].'",
	stroke = "'.$data["stroke"].'",
	suicide = "'.$data["suicide"].'",
	tuberculosis = "'.$data["tuberculosis"].'"					
	WHERE patient_id='.$data["patient_id"].' LIMIT 1';
	return $db->Execute($sql);
}

function GetPatientRelatives($data)
{
	global $db;
	$sql = 'SELECT * FROM '.DB_PREFIX.'relatives WHERE patient_id='.$data["patient_id"].' LIMIT 1';
	return $db->QueryRow($sql);
}

		//////// Family History ////////


function AddPatientFamilyHistory($data)
{
	global $db;
	$sql = 'INSERT INTO  '.DB_PREFIX.'family_history (
	patient_id ,father ,mother ,siblings ,spouse ,offspring)
	VALUES (
	"'.$data["patient_id"].'",
	"'.$data["father"].'",
	"'.$data["mother"].'",
	"'.$data["siblings"].'",
	"'.$data["spouse"].'",
	"'.$data["offspring"].'"
)';
		   //echo $sql;
return $db->Execute($sql);
}

function UpdatePatientFamilyHistory($data)
{
	global $db;
	$sql = 'UPDATE '.DB_PREFIX.'family_history SET
	father = "'.$data["father"].'",
	mother = "'.$data["mother"].'",
	siblings = "'.$data["siblings"].'",
	spouse = "'.$data["spouse"].'",
	offspring = "'.$data["offspring"].'"			
	WHERE patient_id='.$data["patient_id"].' LIMIT 1';
	return $db->Execute($sql);
}

function GetPatientFamilyHistory($data)
{
	global $db;
	$sql = 'SELECT * FROM '.DB_PREFIX.'family_history WHERE patient_id='.$data["patient_id"].' LIMIT 1';
	return $db->QueryRow($sql);
}

		//////// Other History ////////


function AddPatientOtherHistory($data)
{
	global $db;
	$sql = 'INSERT INTO  '.DB_PREFIX.'other_history (
	patient_id ,field1 ,value1 ,field2 ,value2 ,additional_history)
	VALUES (
	"'.$data["patient_id"].'",
	"'.$data["field1"].'",
	"'.$data["value1"].'",
	"'.$data["field2"].'",
	"'.$data["value2"].'",
	"'.$data["additional_history"].'"
)';
		   //echo $sql;
return $db->Execute($sql);
}

function UpdatePatientOtherHistory($data)
{
	global $db;
	$sql = 'UPDATE '.DB_PREFIX.'other_history SET
	field1 = "'.$data["field1"].'",
	value1 = "'.$data["value1"].'",
	field2 = "'.$data["field2"].'",
	value2 = "'.$data["value2"].'",
	additional_history = "'.$data["additional_history"].'"			
	WHERE patient_id='.$data["patient_id"].' LIMIT 1';
	return $db->Execute($sql);
}

function GetPatientOtherHistory($data)
{
	global $db;
	$sql = 'SELECT * FROM '.DB_PREFIX.'other_history WHERE patient_id='.$data["patient_id"].' LIMIT 1';
		   //echo $sql;
	return $db->QueryRow($sql);
}

function isPatientExist($p_id,$key)
{
	global $db;
	$sql = 'SELECT * FROM '.DB_PREFIX.'patient WHERE id='.$p_id.' AND security_key="'.$key.'" LIMIT 1';
		   // echo $sql;
	return $db->QueryRow($sql);
}
function checkPatient($data)
{
	global $db;
	$sql = 'SELECT * FROM '.DB_PREFIX.'patient WHERE id='.$data['p_id'].' AND user_id="'.$data['doc_id'].'"AND security_key='.$data['sec_key'];
		  // echo $sql;
	return $db->QueryRow($sql);
}

function singlePatient($id)
{
	global $db;
	$sql = 'SELECT * FROM '.DB_PREFIX.'patient WHERE id='.$id;
		  // echo $sql;
	return $db->QueryRow($sql);
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
  <title>New Patient Security Key</title>
  </head>
  <body>
  <p>Here are your secure key information!</p>
  <table>
  <tr>
  <th>Email</th><th>Security Key</th><th>Patient Id</th>
  </tr>
  <tr>
  <td>'.$arrayObj['email'].'</td> <td>'.$arrayObj['security_key'].'</td> <td>'.$arrayObj['patient_id'].'</td>
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

function checkSecKeyPatient($data)
{
	global $db;
	$sql = 'SELECT * FROM '.DB_PREFIX.'patient WHERE id='.$data['p_id'].' AND user_id="'.$data['doc_id'].'"AND email="'.$data['email'].'"';
		  //echo $sql;
   	
	if ($db->QueryRow($sql)==0) {
		
	}
	 return ;

}

function updateSeckey($data){

global $db;
	$sql = 'UPDATE '.DB_PREFIX.'patient SET
	security_key = "'.$data["sec_key"].'"			
	WHERE id='.$data["p_id"].' LIMIT 1';
	return $db->Execute($sql);
}

}
?>
