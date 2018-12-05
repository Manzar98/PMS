<?php

$appointment= new Appointment;
$patient = new Patient;
$users = new User;
// echo $id;
$smarty->assign("id",@$id);
if($id=="view" && $extra>0){

    $appoint=$appointment->getSingleApointments($extra);

    // print_r($appoint);
	$pat= $patient->singlePatient($appoint[0]['patient_id']);
	$doc= $users->GetUserInfo($_SESSION['AdminId']);

	$smarty->assign("appoint",@$appoint[0]);
	$smarty->assign("pat",@$pat);
	$smarty->assign("doc",@$doc);
	$smarty->assign('cities', get_cities());
	

}else{

	$lists=$appointment->getAllApointments($id);

	$getPat=array_column($lists, 'patient_id');
	$doc= $users->GetUserInfo($_SESSION['AdminId']);
	$Pat_Array= [];
	foreach ($getPat as $key => $value) {

		$result=$patient->singlePatient($value);
		array_push($Pat_Array, $result);
	}
    for ($i=0; $i<count($Pat_Array) ; $i++) { 
    	
    	// echo $Pat_Array[$i]['name'];
      $Pat_Array[$i]['ap_time'] = $lists[$i]['ap_time'];
      $Pat_Array[$i]['ap_date'] = $lists[$i]['ap_date'];
      $Pat_Array[$i]['a_id'] = $lists[$i]['id'];
      $Pat_Array[$i]['ap_number'] = $lists[$i]['ap_number'];
      $Pat_Array[$i]['online_manual'] = $lists[$i]['online_manual'];

    }

	
	$smarty->assign("pat_detials",@$Pat_Array);
	$smarty->assign("doc",@$doc);
	$smarty->assign('cities', get_cities());
}

$template = 'appointments/list_appointments.tpl';

?>