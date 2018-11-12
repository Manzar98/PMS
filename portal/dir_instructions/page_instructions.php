<?php

$instruction = new Instruction;
$medicine = new Medicine;
$smarty->assign('medicine_list',$medicine->GetAllMedicine());

if($id==='edit')
{
	$smarty->assign('data',$instruction->GetInstructionsDetails($extra));
}
elseif($id==="delete")
{
	if($instruction->DeleteInstructions($extra))
	{
		redirect_to(BASE_URL.'instructions/');
	}
}

$smarty->assign($id,true);
if ($_POST && isset($_GET['ajax'])) {
	
	$data = array();
	$data['instruction'] = $_POST['instruction'];
	$data['userId'] = $_SESSION['AdminId'];
	if($data['instruction']=='')
	{
		$errors['instruction'] = 'Please Enter Instruction';
	}
	$data['medicine_id'] = $_POST['medicine_id'];
	if(empty($errors))
	{
		if($id==='add' && $instruction->AddInstruction($data))
		{
			// redirect_to(BASE_URL.'instructions/');
			echo 'success';
		}
	}
	else {
		$smarty->assign('errors',$errors);
		$smarty->assign('data',$data);
	}
}
elseif($_POST)
{
	$data = array();
	$data['instruction'] = $_POST['instruction'];
	$data['userId'] = $_SESSION['AdminId'];
	if($data['instruction']=='')
	{
		$errors['instruction'] = 'Please Enter Instruction';
	}
	$data['medicine_id'] = $_POST['medicine_id'];
	if(empty($errors))
	{
		if($id==='add' && $instruction->AddInstruction($data))
		{
			redirect_to(BASE_URL.'instructions/');
		}
		elseif($id==="edit" && $instruction->UpdateInstruction($data,$extra))
		{
			redirect_to(BASE_URL.'instructions/');
		}

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
	$group_by ="";
	if (isset($_GET['group_by'])) {
		$group_by = $_GET['group_by'];
	}


	if($group_by=='')
	{
		$group_by = 'medicine_name';
	}
	$paginatorLink = BASE_URL.'instructions/?q='.$q.'&field='.$field.'&group_by='.$group_by.'&' ;

	if($q!='')			
	{

		$total_searched_instructions = $instruction->CountSearchedInstructions($q,$field,$_SESSION['AdminId']);

		$paginator = new Paginator($total_searched_instructions, PAGINATION, @$_REQUEST['p']);
		$paginator->setLink($paginatorLink);
		$paginator->paginate();

		$firstLimit = $paginator->getFirstLimit();
		$lastLimit = $paginator->getLastLimit();

		$instruction_list = $instruction->GetInstructionsBySearch($q,$field,$firstLimit,PAGINATION,$_SESSION['AdminId']);

		$data["q"] = $q;
		$data["field"] = $field;
	}
	else {
		$count = $instruction->CountInstructions();
		$paginator = new Paginator($count, PAGINATION, @$_REQUEST['p']);
		$paginator->setLink($paginatorLink);
		$paginator->paginate();

		$firstLimit = $paginator->getFirstLimit();
		$lastLimit = $paginator->getLastLimit();

		$instruction_list = $instruction->GetInstructions($firstLimit,PAGINATION,$_SESSION['AdminId']);

	}	

	   // var_dump($instruction_list);

	$grouped_instructions =group_by($instruction_list,$group_by);
	$smarty->assign('grouped_instructions',$grouped_instructions);
	$smarty->assign('pages',$paginator->pages_link);
}



if (!isset($_GET['ajax'])) {
	$template = 'instructions/instructions.tpl';
}



?>