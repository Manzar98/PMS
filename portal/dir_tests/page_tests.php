<?php

$test = new Test;
$users = new User;
$package = new Package;
// echo $_SESSION['selectedPkgId'];
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
	$data["userId"]= $_SESSION['AdminId'];
	$data['package_id']= $_SESSION['selectedPkgId'];
	if($data['name']=='')
	{
		$errors['name'] = 'Please Enter Name';
	}
	
	if(empty($errors))
	{
		if($isExist = $users->checkDoctorConsumptionExist($data["userId"])){

			$consumptionCount=$isExist['test_count'];
			$count = $package->getColumnCount($data['package_id'],"no_of_tests");
			$pkgCount= $count['no_of_tests'];

			if ($consumptionCount < $pkgCount) {

				$users->updateColumnCount($data["userId"],"test_count",$consumptionCount+1);

				if($id==='add' && $test->AddTest($data))
				{
			// $newinsertId=  'insertId'=>  $db->insert_id;
					$res=$test->GetTestsBasiconrealtime($db->insert_id);
					echo json_encode($res);
				}

			}else{

				echo json_encode("You Can't create the test. Because No of tests is full.");    
			}

		}else{

			$users->addColumnCount($data["userId"],"test_count",'1');
			if($id==='add' && $test->AddTest($data))
			{
			// $newinsertId=  'insertId'=>  $db->insert_id;
				$res=$test->GetTestsBasiconrealtime($db->insert_id);

				echo json_encode($res);

			}

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
	$data["userId"]= $_SESSION['AdminId'];
	$data['package_id']= $_SESSION['selectedPkgId'];
	if($data['name']=='')
	{
		$errors['name'] = 'Please Enter Name';
	}
	
	if(empty($errors))
	{
		if($isExist = $users->checkDoctorConsumptionExist($data["userId"])){

			$consumptionCount=$isExist['test_count'];
			$count = $package->getColumnCount($data['package_id'],"no_of_tests");
			$pkgCount= $count['no_of_tests'];

			if ($consumptionCount < $pkgCount) {

				$users->updateColumnCount($data["userId"],"test_count",$existCount+1);

				if($id==='add' && $test->AddTest($data))
				{
					redirect_to(BASE_URL.'test-options/'.$db->insert_id);
				}
				elseif($id==="edit" && $test->UpdateTest($data,$extra))
				{
					redirect_to(BASE_URL.'tests/');
				}

			}else{

				$smarty->assign('testsFull',"You Can't create the test. Because No of tests is full.");
				
			}

		}else{

			$users->addColumnCount($data["userId"],"test_count",'1');
			if($id==='add' && $test->AddTest($data))
			{
				redirect_to(BASE_URL.'test-options/'.$db->insert_id);
			}
			elseif($id==="edit" && $test->UpdateTest($data,$extra))
			{
				redirect_to(BASE_URL.'tests/');
			}

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