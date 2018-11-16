<?php

$package = new Package;

if($id==='view')
{
	$smarty->assign('singleRecord',$package->getSinglePackage($extra));
}
elseif($id==="delete")
{
	if($package->deletePackage($extra))
	{
		redirect_to(BASE_URL.'packages/');
	}

}else{

	$record=$package->getAllPackages();
	$smarty->assign('record',$record);
}


$template = 'packages/packages.tpl';
?>