<?php

class Report{

 function GetResult($data){
  global $db;
// print_r($data);
  if (isset($data['colVal'])) {

    if ($data['colVal']=="1") {
      $sql='SELECT fee_received,created_on FROM '.DB_PREFIX.$data['parentTblName'].' where created_on between "'.$data['from'].'" and "'.$data['to'].'" AND user_id="'.$data['u_id'].'" AND '.$data['colName'].'!=0';
    }elseif ($data['colVal']=="0") {
     $sql='SELECT * FROM '.DB_PREFIX.$data['parentTblName'].' where created_on between "'.$data['from'].'" and "'.$data['to'].'" AND user_id="'.$data['u_id'].'" AND '.$data['colName'].'=0';
   }else{
    $sql='SELECT * FROM '.DB_PREFIX.$data['parentTblName'].' where created_on between "'.$data['from'].'" and "'.$data['to'].'" AND user_id="'.$data['u_id'].'" AND '.$data['colName'].'="'.$data['colVal'].'"';
  }

}else{

  if (isset($data['dist'])) {

   $sql='SELECT * FROM '.DB_PREFIX.$data['parentTblName'].' where created_on between "'.$data['from'].'" and "'.$data['to'].'" AND user_id="'.$data['u_id'].'" group by '.$data['dist'].'';
 }else{

   $sql='SELECT * FROM '.DB_PREFIX.$data['parentTblName'].' where created_on between "'.$data['from'].'" and "'.$data['to'].'" AND user_id="'.$data['u_id'].'"';
 }
}
// echo  $sql;
return $db->QueryArray($sql);
}

function getInfo($data,$id){
  global $db;
  $sql='SELECT * FROM '.DB_PREFIX.$data['childTblName'].' where id='.$id;
    //echo $sql;
  return $db->QueryRow($sql);
}


function getPrescriptionJoin($data){
  global $db;

  $sql='Select `medicine`.`name` as `med_name`, `instructions`.`medicine_id`,`instructions`.`user_id` as `ins_uid`,`instructions`.`created_on` as `ins_created_on`,`prescription_instructions`.`id` as `p_ins_id`,`prescription_instructions`.`prescription_id`,`prescription_instructions`.`instruction_id`,`prescription`.`patient_id`,`prescription`.`user_id` as `pre_user_id`,`prescription`.`created_on` as `pre_created_on`,`patient`.`user_id` as `pat_u_id`,`patient`.`created_on` as `pat_created_on`,`patient`.`name` from `instructions` INNER JOIN `prescription_instructions` on `instructions`.`id` = `prescription_instructions`.`instruction_id` INNER JOIN `prescription` on `prescription_instructions`.`prescription_id` = `prescription`.`id` INNER JOIN `patient` on `prescription`.`patient_id` = `patient`.`id` INNER JOIN `medicine` on `instructions`.`medicine_id`=`medicine`.`id` where `prescription`.`created_on` between "'.$data['from'].'" and "'.$data['to'].'" AND `instructions`.`medicine_id` = '.$data['medicine'].' AND `instructions`.`user_id`='.$data['u_id'].' group by `patient_id`';
  //echo $sql;

  return $db->QueryArray($sql);
}

function getTestJoin($data){

 global $db;

 $sql='Select `tests`.`name` as `test_name`, `prescription`.`created_on` as `pre_created_on`,`prescription_tests`.`prescription_id`,`prescription_tests`.`option_id`,`prescription`.`patient_id`,`prescription`.`user_id` as `pre_user_id`,`patient`.`user_id` as `pat_u_id`,`patient`.`created_on` as `pat_created_on`,`patient`.`name` from `test_options` INNER JOIN `prescription_tests` on `test_options`.`id` = `prescription_tests`.`option_id` INNER JOIN `prescription` on `prescription_tests`.`prescription_id` = `prescription`.`id` INNER JOIN `patient` on `prescription`.`patient_id` = `patient`.`id` INNER JOIN `tests` on `test_options`.`test_id`=`tests`.`id`where`prescription`.`created_on` between "'.$data['from'].'" and "'.$data['to'].'" AND `test_options`.`test_id` ="'.$data['testSelect'].'" AND `tests`.`user_id`='.$data['u_id'].' group by `patient_id`';
  
  //echo $sql;

 return $db->QueryArray($sql);
}

function GetSpecificData($data){
  global $db;
  $sql="";
  // print_r($data);
  if ($data['parameter']=="Free checkups") {

   $sql='SELECT fee_received FROM '.DB_PREFIX.$data['parentTblName'].' where created_on="'.$data['crntDate'].'" AND fee_received=0  AND user_id='.$data['u_id'];

 }elseif ($data['parameter']=="Total fee collected") {

   $sql='SELECT SUM(fee_received) FROM '.DB_PREFIX.$data['parentTblName'].' where created_on="'.$data['crntDate'].'" AND user_id='.$data['u_id'];

 }else{

//echo "manzar in sql";
  $grpBy="";
  if ($data['parameter']!="Prescriptions" && $data['parameter']!="Online appointments" && $data['parameter']!="Manual appointments") {
   $grpBy='group by `patient_id`';
 }

 $sql='SELECT * FROM '.DB_PREFIX.$data['parentTblName'].' where created_on="'.$data['crntDate'].'" AND user_id='.$data['u_id'].$grpBy ;
 

}
 //echo $sql;
return $db->QueryArray($sql);
}

function GetMonthData($data){

  global $db;
  $sql='SELECT SUM(fee_received) FROM '.DB_PREFIX.$data['parentTblName'].' where created_on between "'.$data['startDate'].'" and "'.$data['endDate'].'"';
  return $db->QueryArray($sql);
}
/*===================================
=====================================
      Comparison Function
=====================================
=====================================*/

function getAllComparisonData($data){

 global $db;
 if ($data['parentTblName']=='prescription' && isset($data['grpBy']) && $data['grpBy']=="Returning Patients") {

   $sql='SELECT * FROM '.DB_PREFIX.$data['parentTblName'].' where created_on between "'.$data['from_Comp'].'" and "'.$data['to_Comp'].'" AND user_id="'.$data['u_id'].'" group by `patient_id`';

 }else{

     $sql='SELECT * FROM '.DB_PREFIX.$data['parentTblName'].' where created_on between "'.$data['from_Comp'].'" and "'.$data['to_Comp'].'" AND user_id='.$data['u_id'];
 }
  

  //echo $sql;
  return $db->QueryArray($sql);
    
}


}//End of Class


/*One Inner Join Query*/
//Select * from `prescription` INNER JOIN `patient` on `prescription`.`patient_id` = `patient`.`id` where `prescription`.`created_on` BETWEEN "2018-09-01" AND "2018-10-29" AND `prescription`.`user_id`=16

/*Join Query for medicines */
 //Select * from `instructions` INNER JOIN `prescription_instructions` on `instructions`.`id` = `prescription_instructions`.`instruction_id` INNER JOIN `prescription` on `prescription_instructions`.`prescription_id` = `prescription`.`id` INNER JOIN `patient` on `prescription`.`patient_id` = `patient`.`id` where `instructions`created_on between "2018-09-29 00:00:00" and "2018-10-12 00:00:00" AND `instructions`.`medicine_id` = 109 AND `instructions`.`user_id`=16

/*Join Query for test count*/
//Select * from `test_options` INNER JOIN `prescription_tests` on `test_options`.`id` = `prescription_tests`.`option_id` INNER JOIN `prescription` on `prescription_tests`.`prescription_id` = `prescription`.`id` INNER JOIN `patient` on `prescription`.`patient_id` = `patient`.`id` where `test_options`.`test_id` = 50

//'SELECT * FROM '.DB_PREFIX'prescription where created_on between "2018-09-01 00:00:00" and "2018-10-30 00:00:00" AND user_id=16 AND fee_received!= 0';

?>