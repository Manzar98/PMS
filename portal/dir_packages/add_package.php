<?php

$package = new Package;

if($id==='edit'){

	$smarty->assign('singleRecord',$package->getSinglePackage($extra));
}

if ($_POST) {

	$data = array();
	$data['pkg_name']= $_POST['pkg_name'];
	$data['no_of_patients']= $_POST['no_of_patients'];
	$data['no_of_prescriptions']= $_POST['no_of_prescriptions'];
	$data['no_of_medicines']= $_POST['no_of_medicines'];
	$data['no_of_tests']= $_POST['no_of_tests'];
	$data['no_of_online_appointments']= $_POST['no_of_online_appointments'];
	$data['pkg_price']= $_POST['pkg_price'];

	if (isset($_POST['id'])) {

		$data['id']= $_POST['id'];
	}
	
	if ($package->addPackage($data)) {

		$_SESSION['flashAlert']="Package is Successfully Created";
		redirect_to(BASE_URL.'packages/');;
	}
}

$template = 'packages/add_package.tpl';
?>