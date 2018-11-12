<?php

$appointment= new Appointment;
$Work_days= new Work_days;
$patient = new Patient;
if ($_POST && isset($_GET['ajax'])) {



  $result=$Work_days->getTime($_POST['d_Str'],$_POST['doc_id']);
  if ($result['dt_from'] && $result['dt_to']) {
   $res= array(
     "start"=>$result['dt_from'],
     "end"=>  $result['dt_to'],
     "count"=>$result['hr_count']
   );
   echo json_encode($res) ;
 }

}else if($_POST && isset($_GET['appoint'])){
         // 
  $count= $appointment->checkAppoint($_POST['ap_time'],$_POST['ap_date'],$_POST['doc_id']);

  echo count($count);

}else if($_POST){



  if (isset($_POST['p_id'])) {

    $data['p_id']=$_POST['p_id'];
    if (isset($_POST['doc_id'])) {

      $data['doc_id']=$_POST['doc_id'];
    }
    

    if (!empty($_POST['p_id'])) {

      if ($record=$patient->checkPatient($data)) {

        $data =$Work_days->GetDoctorTime($data['doc_id']);
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
        $smarty->assign('cities', get_cities());
         // print_r($record);
        $smarty->assign("record",@$record);
        $smarty->assign("docDetail",@$docDetail);
      }else{

        $erorMsg= "This patient does not exist in Dr.".$_POST['doc_name']." database";
        $smarty->assign("erorMsg",@$erorMsg);

      }
    }else{

      $data["address"] = $_POST["address"];
      $data["ap_number"]       = $_POST['ap_number'];
      $data["security_key"]       = $_POST['security_key'];
      $data['doc_name']= $_POST['doc_name'];
      $data['doc_adr']= $_POST['doc_adr'];
      $data['doc_phne']= $_POST['doc_phne'];
      $data['pat_id'] = $_POST['patient_Id'];
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
 }elseif (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_POST["dt"])) {

  $is_check=false;
  array_push($responseArray,"Appointment date is invalid");
}
else{
 $data["ap_date"] = $_POST['dt'];
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

  if (!$appointment->existAppointment($data)) {
    
   $appointment->getAppoint($data,$data['pat_id']);
   
  // redirect_to(BASE_URL.'appointments/');
   $emailArray=array('email'=>$data['email'],'security_key'=>$data["security_key"],"patient_id"=>$data['pat_id']);
           // $patient->sendPasswordInEmail($emailArray);
   $smarty->assign('cities', get_cities());
   $smarty->assign("printslip",@$data);
 }else{

  $exist_appoint="Appointment is already exists against this patient";
  $smarty->assign("exist_appoint",@$exist_appoint);

}


}else{
  $smarty->assign("res_error",@$errorMsgs);

}


}


}


}else{


  $data["marital_status"]= $_POST["marital_status"];
  $data["city_id"] = $_POST["city"];
  $data["address"] = $_POST["address"];
  $data["ap_number"]       = $_POST['ap_number'];
  $data["security_key"]       = $_POST['security_key'];
  $data['doc_name']= $_POST['doc_name'];
  $data['doc_adr']= $_POST['doc_adr'];
  $data['doc_phne']= $_POST['doc_phne'];
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

  $data["gender"] = $_POST["gender"];
} 
if (empty($_POST["dob"])) {
 $is_check=false;
 array_push($responseArray,"Date of birth is required");
}else{

  $data["dob"] = $_POST["dob"];
}
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
}elseif (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_POST["dt"])) {

  $is_check=false;
  array_push($responseArray,"Appointment date is invalid");
}
else{
 $data["ap_date"] = $_POST['dt'];
}

if (empty($_POST["hour"])) {

 $is_check=false;
 array_push($responseArray,"Appointment time is required");

}elseif (!preg_match("/^(?:0[1-9]|1[0-2]):[0-5][0-9] (am|pm|AM|PM)$/",$_POST["hour"])) {

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
     # code...
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

  $smarty->assign("res_error",@$errorMsgs);
  
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


if (!isset($_GET['ajax']) && !isset($_GET['appoint'])) {

  $template = 'appointments/add_appointment.tpl';
}

?>