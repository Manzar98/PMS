<?php
 
  $users = new User;
  $user_list="";
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
	$data['name'] = $_POST['name'];
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
	if (isset($_POST['profile_img'])) {

		$data['profile_img'] = $_POST['profile_img'];
	}
	
	if($data['name']=='')
	{
		$errors['name'] = 'Please Enter Name';
	}
	if($data['email']=='')
	{
		$errors['email'] = 'Please Enter Email address';
	}

	if($data['expire']=='')
	{
		$errors['expire'] = 'Please Enter Expiration Date';
	}
	if (isset($id)) {
		
		$data['id']=$id;
	}
	$data = escape($data);
	 
	if(empty($errors))
	{     
		// echo "enter here";

		if($users->updateUser($data))
		{
			// print_r($getId);
			if (isset($_SESSION['UserType']) && $_SESSION['UserType']=='S_admin') {
				redirect_to(BASE_URL.'users/');
			}else{

				redirect_to(BASE_URL.'users/view/'.$_SESSION['AdminId'].'/');
			 
		}
			}
	}	
}
elseif($id>0)
  {

	  $user_details = $users->GetUserInfo($id);
	 
  }
   if (isset($user_details)) {
   	$smarty->assign('data',$user_details);
   	$smarty->assign('cities', get_cities());
   }

  if (!isset($_GET['img'])) {

  $template = "users/edit_user.tpl";
}
?>