<?php

$package = new Package;
$smarty->assign('id',$id);
if($id==='view')
{
	$smarty->assign('singleRecord',$package->getSinglePackage($extra));
}
elseif($id==="delete")
{
	if($package->deletePackage($extra))
	{
		$_SESSION['flashAlert']="Package is Successfully Deleted!";
		redirect_to(BASE_URL.'packages/');
	}
}else{

	$record=$package->getAllPackages();
	$smarty->assign('record',$record);
	
	//echo $id;
}


$template = 'packages/packages.tpl';
?>