<?php

$users = new User;

echo $id;
// print_r($page);
if($_POST)
{
	$data = array();
	$data['name'] = $_POST['name'];
	$data['password'] = $_POST['password'];
	$data['email'] = $_POST['email'];
	$data['expire'] = $_POST['expire'];
	if($data['name']=='')
	{
		$errors['name'] = 'Please Enter Name';
	}

	if($data['password']=='')
	{
		$errors['password'] = 'Please Enter Password';
	}

	if($data['email']=='')
	{
		$errors['email'] = 'Please Enter Email address';
	}

	if($data['expire']=='')
	{
		$errors['expire'] = 'Please Enter Expiration Date';
	}
	
	if(empty($errors))
	{
		if($users->AddUser($data))
		{

			// redirect_to(BASE_URL);
			echo "Inserted Manzaer";
		}
		

	}
	else {
		$smarty->assign('errors',$errors);
		$smarty->assign('data',$data);
	}
	 
}


$template = 'users/add_user.tpl';


?>