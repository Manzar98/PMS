<?php

$test = new Test;

if($id==='edit')
{
	$smarty->assign('data',$test->GetTestBasicDetails($extra));
}
elseif($id==="delete")
{
	if($test->DeleteTest($extra))
	{
		redirect_to(BASE_URL.'tests/');
	}
}

$smarty->assign($id,true);

if ($_POST && isset($_GET['ajax'])) {
	
    $data = array();
	$data['name'] = $_POST['name'];
	if($data['name']=='')
	{
		$errors['name'] = 'Please Enter Name';
	}
	
	if(empty($errors))
	{
		if($id==='add' && $test->AddTest($data))
		{
			// $newinsertId=  'insertId'=>  $db->insert_id;
			$res=$test->GetTestsBasiconrealtime($db->insert_id);
     
			echo json_encode($res);

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
	$data['name'] = $_POST['name'];
	if($data['name']=='')
	{
		$errors['name'] = 'Please Enter Name';
	}
	
	if(empty($errors))
	{
		if($id==='add' && $test->AddTest($data))
		{
			redirect_to(BASE_URL.'test-options/'.$db->insert_id);
		}
		elseif($id==="edit" && $test->UpdateTest($data,$extra))
		{
			redirect_to(BASE_URL.'tests/');
		}

	}
	else {
		$smarty->assign('errors',$errors);
		$smarty->assign('data',$data);
	}
	 
}
else {
		$paginatorLink = BASE_URL.'tests/';
		$count = $test->CountTests();
		$paginator = new Paginator($count, PAGINATION, @$_REQUEST['p']);
		$paginator->setLink($paginatorLink);
		$paginator->paginate();
		
		$firstLimit = $paginator->getFirstLimit();
		$lastLimit = $paginator->getLastLimit();
			
		$test_list = $test->GetTestsBasic($firstLimit,PAGINATION);
		$smarty->assign('pages',$paginator->pages_link);
		$smarty->assign('tests',$test_list);
}



if (!isset($_GET['ajax'])) {
	
	$template = 'tests/tests.tpl';
}


?>