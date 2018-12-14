<?php

$test = new Test;
$users = new User;
$package = new Package;
$grouped_test="";
// echo $_SESSION['selectedPkgId'];
if($id==='edit')
{
	$smarty->assign('data',$test->GetTestBasicDetails($extra));
}
elseif($id==="delete")
{
	if($test->DeleteTest($extra))
	{
		$_SESSION['flashAlert']="Test is Successfully Deleted!";
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

				$users->updateColumnCount($data["userId"],"test_count",$consumptionCount+1);

				if($id==='add' && $test->AddTest($data))
				{
					$_SESSION['flashAlert']="Test is Successfully Created!";
					redirect_to(BASE_URL.'test-options/'.$db->insert_id);
				}
				elseif($id==="edit" && $test->UpdateTest($data,$extra))
				{
					$_SESSION['flashAlert']="Test is Successfully Updated!";
					redirect_to(BASE_URL.'tests/');
				}

			}else{

				$smarty->assign('testsFull',"You Can't create the test. Because No of tests is full.");
				
			}

		}else{

			$users->addColumnCount($data["userId"],"test_count",'1');
			if($id==='add' && $test->AddTest($data))
			{
				$_SESSION['flashAlert']="Test is Successfully Created!";
				redirect_to(BASE_URL.'test-options/'.$db->insert_id);
			}
		}
		if($id==="edit" && $test->UpdateTest($data,$extra))
		{
			$_SESSION['flashAlert']="Test is Successfully Updated!";
			redirect_to(BASE_URL.'tests/');
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
	$group_by='';
	if (isset($_GET['group_by'])) {
		$group_by = $_GET['group_by'];
	}


	if($group_by=='')
	{
		$group_by = 'id';
	}
	$paginatorLink = BASE_URL . 'tests/?q='.$q.'&field='.$field.'&group_by='.$group_by.'&' ;

	if($q!='')			
	{

		$total_searched_tests = $test->CountSearchedTest($q,$field);
		$paginator = new Paginator($total_searched_tests, PAGINATION, @$_REQUEST['p']);
		$paginator->setLink($paginatorLink);
		$paginator->paginate();

		$firstLimit = $paginator->getFirstLimit();
		$lastLimit = $paginator->getLastLimit();

		$test_list = $test->GetTestBySearch($q,$field,$firstLimit,PAGINATION);
		
		$search["q"] = $q;
		$search["field"] = $field;
		$smarty->assign('search',$search);
	}		
	else {


		$count = $test->CountTests();
		$paginator = new Paginator($count, PAGINATION, @$_REQUEST['p']);
		$paginator->setLink($paginatorLink);
		$paginator->paginate();

		$firstLimit = $paginator->getFirstLimit();
		$lastLimit = $paginator->getLastLimit();

		$test_list = $test->GetTestsBasic($firstLimit,PAGINATION);
		
	}

	$grouped_test = array();

	$grouped_test = group_by($test_list, $group_by);
     // print_r($grouped_test);
	$smarty->assign('group_by',$group_by);		
	$smarty->assign('pages',$paginator->pages_link);
	$smarty->assign('tests',$grouped_test);
	$smarty->assign('errors',@$errors);

	



}



if (!isset($_GET['ajax'])) {
	
	$template = 'tests/tests.tpl';
}


?>