<?php

$appointment= new Appointment;
$Work_days= new Work_days;
$patient = new Patient;
$users = new User;
$package = new Package;
if($id==="view" && $extra>0 && !$_POST)
{
  $data =$Work_days->GetDoctorTime($extra);
  $days= implode(',', array_column($data, 'days'));
  $from= implode(',', array_column($data, 'dt_from'));
  $to= implode(',', array_column($data, 'dt_to'));
  $unavail = implode(',', array_column($data, 'unavailable'));
    // $count = implode(',', array_column($data, 'hr_count'));
  $smarty->assign("id",@$id);
  $smarty->assign("days",@$days);
  $smarty->assign("from",@$from);
  $smarty->assign("to",@$to);
  $smarty->assign("unavail",@$unavail);
    // $smarty->assign("count",@$count);

  $user_detail = $users->GetuserInfo($extra);
    // print_r($user_detail);
  $smarty->assign('noOfPatients',$patient->getPatientsCount($extra)); 
  $smarty->assign('cities', get_cities());
  $smarty->assign('data',@$user_detail); 

}elseif ($_POST && isset($_GET['yjax'])) {

  $data['doc_id']=$_POST['doc_id'];
  $data['p_id']=$_POST['pat_id'];
  $data['sec_key']=$_POST['sec_key'];
  $data['email']=$_POST['email'];
  
  
  if ($record=$patient->checkSecKeyPatient($data)) {

    $response = array(
      'status'=>true,
      'msg'=>"Security Key successfully send"
    );

    $patient->updateSeckey($data);
    $emailArray=array('email'=>$data['email'],'security_key'=>$data["sec_key"],"patient_id"=>$data['p_id']);
   // $patient->sendPasswordInEmail($emailArray);
    echo json_encode($response);
  }else{

    $response = array(
      'status'=>false,
      'msg'=>"This patient does not exist in Dr.".$_POST['doc_name']." database"
    );
    echo json_encode($response);
  }

}elseif ($_POST && isset($_GET['ejax'])) {

  $result=$Work_days->getTime($_POST['d_Str'],$_POST['doc_id']);
  if ($result['dt_from'] && $result['dt_to']) {
    $res= array(
      "start"=>$result['dt_from'],
      "end"=>  $result['dt_to'],
      "count"=>$result['hr_count']
    );
    echo json_encode($res) ;
  }

}elseif ($_POST && isset($_GET['ajax'])) {
  //echo "Reached Here";
  $data['doc_id']=$_POST['doc_id'];
  $data['p_id']=$_POST['p_id'];
  $data['sec_key']=$_POST['sec_key'];
  
  if ($record=$patient->checkPatient($data)) {

    $response = array(
      'status'=>true,
      'msg'=>$record
    );
    echo json_encode($response);

  }else{

    $response = array(
      'status'=>false,
      'msg'=>"This patient does not exist in Dr.".$_POST['doc_name']." database"
    );
    echo json_encode($response);
  }
}else if($_POST && isset($_GET['appoint'])){
         // 
  $count= $appointment->checkAppoint($_POST['ap_time'],$_POST['ap_date'],$_POST['doc_id']);

  echo count($count);

}else if($_POST){

  if (isset($_POST['dt'])) {
    $data['ap_date'] = date("Y-m-d", strtotime($_POST['dt']));
    //echo $data['ap_date'];
  }

  if (isset($_POST['p_id'])) {

    $data['p_id']=$_POST['p_id'];
    if (isset($_POST['doc_id'])) {

      $data['doc_id']=$_POST['doc_id'];
    }
    $data["marital_status"]= $_POST["marital_status"];
    $data["address"] = $_POST["address"];
    $data["ap_number"]       = $_POST['ap_number'];
    $data["security_key"]       = $_POST['security_key'];
    $data['doc_name']= $_POST['doc_name'];
    $data['doc_adr']= $_POST['doc_adr'];
    $data['doc_phne']= $_POST['doc_phne'];
    $data['pat_id'] = $_POST['pat_id'];
    $data["city_id"] = $_POST["city"];
    $data["gender"] = $_POST["gender"];
    $data['online_manual'] =$_POST['online_manual'];
    $is_check=true;
    $responseArray=[];

    if (empty($_POST["name"])) {

     $is_check=false;
     array_push($responseArray,"Patient name is required");
   }else{

    $data["name"] = $_POST["name"];
  }
  if (empty($_POST["gender"])) {

   $is_check=false;
   array_push($responseArray,"Gender is required");
 }else{

  if (empty($_POST["mobile"])) {

   $is_check=false;
   array_push($responseArray,"Mobile field is required");

 }elseif (!is_numeric($_POST["mobile"])) {

   $is_check=false;
   array_push($responseArray,"Mobile field should only contain numbers.");
 }else{

  $data["mobile"] = $_POST["mobile"];
}
if (empty($_POST["dt"])) {

  $is_check=false;
  array_push($responseArray,"Appointment date is required");

}elseif (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$data["ap_date"])) {

  $is_check=false;
  array_push($responseArray,"Appointment date is invalid");
}
else{

  $data["ap_date"] = $data["ap_date"];
    // echo "here";
}

if (empty($_POST["hour"])) {

  $is_check=false;
  array_push($responseArray,"Appointment time is required");

} elseif (!preg_match("/^(?:0[1-9]|1[0-2]):[0-5][0-9] (am|pm|AM|PM)$/",$_POST["hour"])) {

  $is_check=false;
  array_push($responseArray,"Appointment time is invalid");
}else{

  $data["ap_time"] = $_POST['hour'];

}

if ($_POST["u_id"]<1) {
 $is_check=false;
 // array_push($responseArray,"Doctor id is required");
}else{

 $data["id"]       = $_POST['u_id'];
}

if (empty($_POST['email'])) {
 $is_check=false;
 array_push($responseArray,"Email address is required");

}elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

 $is_check=false;
 array_push($responseArray,"Email address is invalid");
}else{
  $data["email"]       = $_POST['email'];
}

$errorMsgs=implode(",",$responseArray);


if ($is_check==true) {

  if (isset($_POST['pat_id']) && !empty($_POST['pat_id'])) {

   if (!$appointment->existAppointment($data)) {

     $appointment->getAppoint($data,$data['pat_id']);
     
  // redirect_to(BASE_URL.'appointments/');
     $emailArray=array('email'=>$data['email'],'security_key'=>$data["security_key"],"patient_id"=>$data['pat_id']);
           // $patient->sendPasswordInEmail($emailArray);
     $smarty->assign('cities', get_cities());
     $smarty->assign("printslip",@$data);
   }else{

     $exist_appoint="Appointment for this patient already exists on this date.";
     $smarty->assign("existAppointment",@$exist_appoint);
   // echo "manzar23141";
   }

 }else{
  if($isExist = $users->checkDoctorConsumptionExist($data["id"])){

   $consumptionPatientCount=$isExist['patient_count'];

   $patientCount = $package->getColumnCount($_SESSION['selectedPkgId'],"no_of_patients");

   $pkgPatientCount= $patientCount['no_of_patients'];

   if ($consumptionPatientCount < $pkgPatientCount) {

    $users->updateColumnCount($data["id"],"patient_count",$consumptionPatientCount+1);
    if ($patient->AddPatBasic($data)) {
      $pat_id= $db->insert_id;
      $appointment->getAppoint($data,$pat_id);
      $data['pat_id'] = $pat_id;
               // redirect_to(BASE_URL.'appointments/');
      $emailArray=array('email'=>$data['email'],'security_key'=>$data["security_key"],"patient_id"=>$pat_id);
          // $patient->sendPasswordInEmail($emailArray);
      $smarty->assign("printslip",@$data);
      $smarty->assign('cities', get_cities());

    }

  }else{

    $smarty->assign('appointmentFull', "You Can't book the appointment. Because No of patients is full.");
  }

}else{

  $users->addColumnCount($data["id"],"patient_count",'1');
  if ($patient->AddPatBasic($data)) {
    $pat_id= $db->insert_id;
    $appointment->getAppoint($data,$pat_id);
    $data['pat_id'] = $pat_id;
               // redirect_to(BASE_URL.'appointments/');
    $emailArray=array('email'=>$data['email'],'security_key'=>$data["security_key"],"patient_id"=>$pat_id);
          // $patient->sendPasswordInEmail($emailArray);
    $smarty->assign("printslip",@$data);
    $smarty->assign('cities', get_cities());

  }

}


}

}else{
  $smarty->assign("res_error",@$errorMsgs);

}

}



} 
}

else{

 $data =$Work_days->GetDoctorTime($id);

 $days= implode(',', array_column($data, 'days'));
 $from= implode(',', array_column($data, 'dt_from'));
 $to= implode(',', array_column($data, 'dt_to'));
 $unavail = implode(',', array_column($data, 'unavailable'));
 $count = implode(',', array_column($data, 'hr_count'));

 $smarty->assign("id",@$id);
 $smarty->assign("days",@$days);
 $smarty->assign("from",@$from);
 $smarty->assign("to",@$to);
 $smarty->assign("unavail",@$unavail);
 $smarty->assign("count",@$count);
 $smarty->assign('cities', get_cities());

}
if (!isset($_GET['ajax']) && !isset($_GET['ejax']) && !isset($_GET['appoint']) && !isset($_GET['yjax'])) {

  $template = 'appointments/doc_appointments.tpl';
}

?>