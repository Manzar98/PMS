<?php

$prescription = new Prescription;
$patient = new Patient;
if ($id==="view" && $extra>0) {
	
$prescription_details = $prescription->GetPrescriptionInfo($extra);
	$prescription_details['patient'] = $patient->GetPatientDetails($prescription_details['patient_id']);
	  //printr($prescription_details);
	$smarty->assign('data',@$prescription_details);
}
if ($_POST) {

 if ($res=$patient->isPatientExist($_POST['p_id'],$_POST['key'])) {
     
	 $record=$prescription->GetPatientRecord($_POST['p_id']);
   // echo "1";
	 $smarty->assign('record',@$record);
 }else{

 	 $res="Either the patient ID or the secure key is invalid.";
 	 $smarty->assign('resp',@$res);

 }


}
$template = 'appointments/search_history.tpl';

?>