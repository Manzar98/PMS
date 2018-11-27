<?php

$users = new User;
$package = new Package;
// echo $id;
// print_r($page);
if (isset($_GET['img']) && $_GET['img']=='y') {
	
	$data = $_POST['image'];

// echo $data;
	list($type, $data) = explode(';', $data);
	list(, $data)      = explode(',', $data);
	$data = base64_decode($data);
	$imageName = time().'.png';
// echo $imageName;

	file_put_contents(APP_PATH . CURRENT_DIRECTORY.'/_templates/img/uploads/'.$imageName, $data);
	$storedimg='_templates/img/uploads/'.$imageName;

	echo $storedimg;


}
else if($_POST)
{


	$data = array();
	$data['name'] = $_POST['name'];
	$data['password'] = $_POST['password'];
	$data['email'] = $_POST['email'];
	$data['expire'] = $_POST['expire'];
	$data['F_name'] = $_POST['F_name'];
	$data['L_name'] = $_POST['L_name'];
	$data['city'] = $_POST['city'];
	$data['c_address'] = $_POST['c_address'];
	$data['quali'] = $_POST['quali'];
	$data['exprience'] = $_POST['exprience'];
	$data['mobile'] = $_POST['mobile'];
	$data['phone'] = $_POST['phone'];
	$data['specialist'] = $_POST['specialist'];
	$data['profile_img'] = $_POST['profile_img'];
	$data['package_id']=$_POST['package_id'];

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
			//redirect_to(BASE_URL.'users/');
			echo "Inserted";
			$emailArray=array('email'=>$data['email'],'username'=>$data['name'],"user_id"=>$db->insert_id,"password"=>$data['password']);
			$users->sendPasswordInEmail($emailArray);
		}
	}
	else {
		$smarty->assign('errors',$errors);
		$smarty->assign('data',$data);
	}

}else{
	$smarty->assign('cities', get_cities());
	$smarty->assign('packages',$package->getAllPackages());
}

if (!isset($_GET['img'])) {
	$template = 'users/add_user.tpl';
}



?>