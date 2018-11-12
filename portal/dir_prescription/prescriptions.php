<?php

$prescription = new Prescription;
$patient = new Patient;

if($id==="view" && $extra>0)
{
	$prescription_details = $prescription->GetPrescriptionInfo($extra);
	$prescription_details['patient'] = $patient->GetPatientDetails($prescription_details['patient_id']);
	  //printr($prescription_details);
	$smarty->assign('data',@$prescription_details);	  
}elseif ($id==="delete" && $extra>0) 
{
	$prescription->deletePrescription($extra);
	redirect_to(BASE_URL.'prescriptions/');
}
else {
	$_GET = @escape($_GET);
	$q = $_GET['q'];
	$field = $_GET['field'];
	$group_by = "";
	
	if(isset($_GET['group_by'])){
		$group_by =$_GET['group_by'];
	}
	
	if($group_by=='')
	{
		$group_by = 'date';
	}
	$paginatorLink = BASE_URL . 'prescriptions/?q='.$q.'&field='.$field.'&group_by='.$group_by.'&' ;		
	
	if($q!='')			
	{			
		$total_searched_prescriptions = $prescription->CountSearchedPrescriptions($q,$field,$_SESSION['AdminId']);	
		
		$paginator = new Paginator($total_searched_prescriptions, PAGINATION, @$_REQUEST['p']);
		$paginator->setLink($paginatorLink);
		$paginator->paginate();
		
		$firstLimit = $paginator->getFirstLimit();
		$lastLimit = $paginator->getLastLimit();
		
		$all_prescriptions = $prescription->GetSearchedPrescriptions($q, $field,$_SESSION['AdminId']);
		
		$grouped_prescriptions = array();
		
		$grouped_prescriptions = group_by($all_prescriptions, $group_by);
		
		
		
		$search["q"] = $q;
		$search["field"] = $field;
		$smarty->assign('search',$search);
	}		
	else {
		$total_prescriptions = $prescription->TotalPrescriptions($_SESSION['AdminId']);
		$paginator = new Paginator($total_prescriptions, PAGINATION, @$_REQUEST['p']);
		$paginator->setLink($paginatorLink);
		$paginator->paginate();
		
		$firstLimit = $paginator->getFirstLimit();
		$lastLimit = $paginator->getLastLimit();
		
		if (isset($id) && $id > 0 && is_numeric($id)) {

			$all_prescriptions = $prescription->ListOfPrescriptionsForSinglePatient($firstLimit,PAGINATION,$id);
		}else{

			 $all_prescriptions = $prescription->GetAllPrescriptions($firstLimit,PAGINATION,$_SESSION['AdminId']);
		}
		
		
		$grouped_prescriptions = array();
		
		$grouped_prescriptions = group_by($all_prescriptions, $group_by);
		
			 //printr($grouped_prescriptions);
		
	}
	$smarty->assign('group_by',$group_by);
	$smarty->assign("pages", $paginator->pages_link);
	$smarty->assign('grouped_prescriptions',$grouped_prescriptions);
	//var_dump($all_prescriptions);
}


$smarty->assign('id',$id);

$template = "prescription/prescriptions.tpl";

?>