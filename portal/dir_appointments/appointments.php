<?php

$appointment= new Appointment;
$users = new User;
  // echo $id;
  // echo $extra;
$smarty->assign('cities', get_cities());
if($id==="view" && $extra>0)
{
	$user_detail = $users->GetuserInfo($extra);

    // print_r($user_detail);
    
  $smarty->assign('data',@$user_detail); 
}

 else if ($page==="appointments") {
  	
  	$smarty->assign("doctors",@$appointment->GetAllDoctors());

  }
$template = 'appointments/appointments.tpl';
?>