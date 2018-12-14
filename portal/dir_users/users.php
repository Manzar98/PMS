<?php

$users = new User;
$grouped_users="";
$package = new Package;

 // echo $extra;
if($id==="view" && $extra>0)
{
	$user_detail = $users->GetuserInfo($extra);
  $smarty->assign('cities', get_cities());
  $smarty->assign('packages',$package->getAllPackages());
    //print_r($user_detail);
  
  $smarty->assign('data',@$user_detail);   
  
}elseif ($id==="delete" && $extra>0) 
{
  
  $users->DeleteUser($extra);
  $_SESSION['flashAlert']="Doctor is Successfully Deleted!";
  redirect_to(BASE_URL.'users/');
}
elseif ($id==="reactivate" && $extra>0) 
{
  
 $users->ReactivateUser($extra);
 redirect_to(BASE_URL.'users/');
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
 $paginatorLink = BASE_URL . 'users/?q='.$q.'&field='.$field.'&group_by='.$group_by.'&' ;
 
 if($q!='')			
 {
   
  $total_searched_users = $users->CountSearchedUsers($q,$field);
  $paginator = new Paginator($total_searched_users, PAGINATION, @$_REQUEST['p']);
  $paginator->setLink($paginatorLink);
  $paginator->paginate();
  
  $firstLimit = $paginator->getFirstLimit();
  $lastLimit = $paginator->getLastLimit();
  
  $user_list = $users->GetUserBySearch($q,$field,$firstLimit,PAGINATION);
  $grouped_users = array();
  $grouped_users = group_by($user_list, $group_by);
  
  $search["q"] = $q;
  $search["field"] = $field;
  $smarty->assign('search',$search);
}		
else {


  $total_users = $users->CountUsers();
  $paginator = new Paginator($total_users, PAGINATION, @$_REQUEST['p']);
  $paginator->setLink($paginatorLink);
  $paginator->paginate();
  
  $firstLimit = $paginator->getFirstLimit();
  $lastLimit = $paginator->getLastLimit();
  
  $user_list = $users->GetUser($firstLimit,PAGINATION);

  $grouped_users = array();
  $grouped_users = group_by($user_list, $group_by);
}



$smarty->assign('group_by',$group_by);		
$smarty->assign('grouped_users',$grouped_users);
$smarty->assign('errors',@$errors);
	//var_dump($all_prescriptions);
}

$smarty->assign('id',$id);



	 // $smarty->assign('data',@$data);

$template = 'users/users.tpl';


?>