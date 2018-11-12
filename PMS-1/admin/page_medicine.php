<?php
// echo 'medicine';
 $medicine = new Medicine;
 if($id==='add')
 {
 	$smarty->assign('add',true);
 }
 if($id==="delete")
{
	if($medicine->Delete($extra))
{
		redirect_to(BASE_URL.'medicine/');
}
 }
 if($id==="edit")
 {
$smarty->assign('add',true);
 	$data = $medicine->GetMedicineDetail($extra);
}

if ($_POST && isset($_GET['ajax'])) 
{

	// echo "Manzar";

	$data['name'] = $_POST['name'];
	$data['formula'] = $_POST['formula'];
	$data['type'] = $_POST['type'];
 	$data['dose'] = $_POST['dose'];
 	$data['company'] = $_POST['company'];
	
 	$data = escape($data);
	
 	if($data['name']=='')
 	{
 		$errors['name'] = 'Please Enter Name';
 	}
if(empty($errors))
 	{
 		if($id==='add')
 		{
 			if($medicine->AddMedicine($data))
 			{
 			   
 			   $res = $medicine->GetAllMedicineonrealtime($db->insert_id);
 			   
                echo json_encode($res);
 			}
 		}
 		
 		$smarty->assign('data',$data);
		
	}
 	else {

 		$smarty->assign('errors',$errors);
		$smarty->assign('data',$data);
	}
}

elseif($_POST)
 {
    echo "fahad guest";
 	$data['name'] = $_POST['name'];
	$data['formula'] = $_POST['formula'];
	$data['type'] = $_POST['type'];
 	$data['dose'] = $_POST['dose'];
 	$data['company'] = $_POST['company'];
	
 	$data = escape($data);
	
 	if($data['name']=='')
 	{
 		$errors['name'] = 'Please Enter Name';
 	}
	
 	if(empty($errors))
 	{
 		if($id==='add')
 		{
 			if($medicine->AddMedicine($data))
 			{
 				redirect_to(BASE_URL.'medicine/');
 			}
 		}
 		elseif($id==='edit')
 		{
 			if($medicine->UpdateMedicine($data))
 			{
 				redirect_to(BASE_URL.'medicine/');
 			}
		}
 		$smarty->assign('data',$data);
		
	}
 	else {
 		$smarty->assign('errors',$errors);
		$smarty->assign('data',$data);
	}
	
	
 }
 else {
		
		
 		$_GET = @escape($_GET);
 		$q = $_GET['q'];
 		$field = $_GET['field'];
		$group_by='';
 		if (isset($_GET['group_by'])) {

 			$group_by = $_GET['group_by'];
 		}
		
		
 		if($group_by=='')
 		{
 			$group_by = 'type';
 		}
 		$paginatorLink = BASE_URL . 'medicine/?q='.$q.'&field='.$field.'&group_by='.$group_by.'&' ;
		
 		if($q!='')			
 		{
			
 			$total_searched_medicine = $medicine->CountSearchedMedicine($q,$field);
	
 			$paginator = new Paginator($total_searched_medicine, PAGINATION, @$_REQUEST['p']);
 			$paginator->setLink($paginatorLink);
 			$paginator->paginate();
			
 			$firstLimit = $paginator->getFirstLimit();
 			$lastLimit = $paginator->getLastLimit();
				
 			$medicine_list = $medicine->GetMedicineBySearch($q,$field,$firstLimit,PAGINATION);
			
		$data["q"] = $q;
 			$data["field"] = $field;
 		}		
 		else {
 			$total_medicine = $medicine->CountMedicine();
 			$paginator = new Paginator($total_medicine, PAGINATION, @$_REQUEST['p']);
 			$paginator->setLink($paginatorLink);
 			$paginator->paginate();
			
 			$firstLimit = $paginator->getFirstLimit();
 			$lastLimit = $paginator->getLastLimit();
				
 			$medicine_list = $medicine->GetMedicine($firstLimit,PAGINATION);
 		}
		
 		$grouped_medicine = array();
			
 		$grouped_medicine = group_by($medicine_list, $group_by);
		
 		//printr($grouped_medicine);
		
 		$smarty->assign('group_by',$group_by);		
		$smarty->assign('pages',$paginator->pages_link);
 		$smarty->assign('medicine_list',$grouped_medicine);
		$smarty->assign('errors',@$errors);
	
 }

 $smarty->assign('data',@$data);
 if (!isset($_GET['ajax'])) {
 	$template = 'medicine.tpl';
 }
 

?>