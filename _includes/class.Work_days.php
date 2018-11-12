<?php 

 Class Work_days

 {
   function addwork($day,$from,$to,$count,$u_id){

   	 global $db;
     if ($day=='unavail_on') {
     	$sql= 'INSERT INTO '.DB_PREFIX.'user_days(days,dt_from,dt_to,unavailable,user_id)VALUES("'.$day.'","'.$from.'","'.$to.'","on","'.$u_id.'")';
     }else{
     $sql= 'INSERT INTO '.DB_PREFIX.'user_days(days,dt_from,dt_to,hr_count,user_id)VALUES("'.$day.'","'.$from.'","'.$to.'","'.$count.'","'.$u_id.'")';
}
     return $db->Execute($sql);
   }

   function getWork($u_id){

   global $db;
   $sql = 'SELECT * FROM '.DB_PREFIX.'user_days WHERE user_id='.$u_id
;
return $db->QueryArray($sql);
   }

   function deleteWork($u_id){

    	global $db;

		$sql = 'DELETE FROM '.DB_PREFIX.'user_days WHERE user_id='.$u_id;

		return $db->Execute($sql);
   }
     function checkRecord($u_id){

   global $db;
   $sql = 'SELECT * FROM '.DB_PREFIX.'user_days WHERE user_id='.$u_id
;
return $db->QueryRow($sql);
   }

     function getTime($str,$id){

   global $db;
   $sql = 'SELECT * FROM '.DB_PREFIX.'user_days WHERE days="'.$str.'" AND user_id='.$id
;
// echo $sql;
   return $db->QueryRow($sql);
   }

 function GetDoctorTime($id){

    global $db;
    $sql = 'SELECT * FROM '.DB_PREFIX.'user_days WHERE user_id='.$id;
     // echo $sql;
    return $db->QueryArray($sql);
  }

  // function insertCities($city){
  //   global $db;

  //   $sql= 'INSERT INTO '.DB_PREFIX.'cities(name)VALUES("'.$city.'")';
  //   return $db->Execute($sql);
  // }
 	
 }


?>