<?php
		if(!empty($_POST['action']) && $_POST['action'] == 'login')
		{

			$_POST = escape($_POST);
			$errors = array();
			
			$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['referer'] = BASE_URL;
			
			$username = $_POST["username"];
			$password = $_POST["password"];

			
			
			// validation
			if ($username == '')
			{
				$errors['username'] = 'Please enter your username.';
			}
			if ($password == '')
			{
				$errors['password'] = 'Please enter your password.';
			}
			
			// no errors, go to review page
			if (empty($errors))
			{
				require_once '_includes/class.Admin.php';
				$admin = new CAdmin();
				
				if($admin->login($username, $password) && $admin->getDelelte()!="on")
				{
					$_SESSION['AdminId'] = $admin->getId();
					$_SESSION['UserType'] = $admin ->getType();
			        $_SESSION['selectedPkgId'] = $admin->getSelectedPkg();

					 redirect_to(BASE_URL.'home/');
					
					exit;
				}
				elseif ($admin->getDelelte()=="on") {

					$errors['incorrect'] = 'Your account is deactivated';
					$smarty->assign('errors', $errors);
				}
				else
				{
					$errors['incorrect'] = 'Incorrect username or password';
					$smarty->assign('errors', $errors);
				}
			}
			// if errors exist, go back and edit the post
			else
			{
				$smarty->assign('errors', $errors);
			}
		}
		$template = 'login.tpl';
		
?>