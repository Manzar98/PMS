<?php

 class Appointment{


 	 function GetAllDoctors(){

  	global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'admin WHERE usertype="" AND is_delete!="on" ORDER BY username ASC ';
		 // echo $sql;
		return $db->QueryArray($sql);
  }
   function checkAppoint($time,$date,$id){

  	global $db;
		$sql = 'SELECT * FROM '.DB_PREFIX.'appointments WHERE user_id='.$id.' AND ap_time="'.$time.'" AND ap_date="'.$date.'"';
		  // echo $sql;

		return $db->QueryArray($sql);
  }
  // function getSingleDoctor($id){
  //   global $db;
  //  $sql ='SELECT * FROM '.DB_PREFIX.'admin WHERE id='.$id;
  //  return $db->QueryRow($sql);
  // }

  function getAppoint($data,$p_id){

    global $db;
      $sql = 'INSERT INTO '.DB_PREFIX.'appointments(ap_time,ap_date,user_id,patient_id,ap_number,online_manual,created_on)VALUES("'.$data['ap_time'].'","'.$data['ap_date'].'","'.$data['id'].'","'.$p_id.'","'.$data['ap_number'].'","'.$data['online_manual'].'",NOW()) ';
  // echo $sql;
      return $db->Execute($sql);
  }
 function getAllApointments($id){
   global $db;
   $sql ='SELECT * FROM '.DB_PREFIX.'appointments WHERE user_id='.$id;
   return $db->QueryArray($sql);
 }

 function getSingleApointments($id){
   global $db;
   $sql ='SELECT * FROM '.DB_PREFIX.'appointments WHERE id='.$id;
   
   return $db->QueryArray($sql);
 }

 function existAppointment($data){
  global $db;
  $sql='SELECT * FROM '.DB_PREFIX.'appointments WHERE ap_date="'.$data['ap_date'].'" AND patient_id="'.$data['pat_id'].'" AND user_id="'.$data['id'].'"';

  // echo  $sql;
  return $db->QueryArray($sql);
 }
 }

?>