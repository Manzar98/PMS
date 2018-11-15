<?php

$test = new Test;

if($extra && $id!='add')
{
	$details = $test->GetTestOptionsDetail($extra);
	$test_id = $details['test_id'];
	$smarty->assign('test_id',$test_id);	
}
elseif($extra && $id==='add')
{
	$smarty->assign('test_id',$extra);	
}
elseif(is_numeric($id) && $id > 0)
{
	$smarty->assign('test_id',$id);
}


if($id==='edit')
{
	$smarty->assign('data',$test->GetTestOptionsDetail($extra));
}
elseif($id==="delete")
{
	
	if($test->DeleteTestOption($extra))
	{
		redirect_to(BASE_URL.'test-options/'.$test_id.'/');
	}
}

$smarty->assign($id,true);

if ($_POST && isset($_GET['ajax'])) {
	$data = array();
	
	$data['name'] = $_POST['name'];
	$data['measurement'] = $_POST['measurement'];
	$data['normal_range'] = $_POST['normal_range'];
	
	if($data['name']=='')
	{
		$errors['name'] = 'Please Enter Name';
	}
	
	if(empty($errors))
	{
		if($id==='add' && $test->AddTestOptions($data,$extra))
		{
			// redirect_to(BASE_URL.'test-options/'.$extra.'/');
			echo "Successfully Test Option inserted";
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
	$data['measurement'] = $_POST['measurement'];
	$data['normal_range'] = $_POST['normal_range'];
	
	if($data['name']=='')
	{
		$errors['name'] = 'Please Enter Name';
	}
	
	if(empty($errors))
	{
		if($id==='add' && $test->AddTestOptions($data,$extra))
		{
			redirect_to(BASE_URL.'test-options/'.$extra.'/');
		}
		elseif($id==="edit" && $test->UpdateTestOptions($data,$extra))
		{
			redirect_to(BASE_URL.'test-options/'.$test_id.'/');
		}

	}
	else {
		$smarty->assign('errors',$errors);
		$smarty->assign('data',$data);
	}

}
else {
	$options_list = $test->GetTestOptions($id);
	$smarty->assign('options',$options_list);
}

if (!isset($_GET['ajax'])) {

	$template = 'tests/test_options.tpl';

}
?>