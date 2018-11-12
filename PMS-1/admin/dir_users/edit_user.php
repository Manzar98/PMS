<?php
  
  // echo "Manzar";
  $users = new User;
  $user_list="";
 
if($_POST)
{
	echo "Manzar";
	
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
	if (isset($id)) {
		
		$data['id']=$id;
	}
	$data = escape($data);
	 
	if(empty($errors))
	{     
		echo "enter here";

		if($users->updateUser($data))
		{
			redirect_to(BASE_URL.'veiw/');
		}
	}	
}
elseif($id>0)
  {

	  $user_details = $users->GetUserInfo($id);
	 
  }
   if (isset($user_details)) {
   	$smarty->assign('data',$user_details);
   }

  
  $template = "users/edit_user.tpl";
?>