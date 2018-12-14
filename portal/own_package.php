<?php
$package = new Package;
$users = new User;
$resArray="";

$pkgResult= $package->getPackageDetail($_SESSION['selectedPkgId']);
 $smarty->assign('pkg_name',$pkgResult['pkg_name']);
$conResult= $package->getConsumptionDetail($_SESSION['AdminId']);

$docResult= $users->GetUserInfo($_SESSION['AdminId']);
//print_r($conResult);

$resArray['Patients']=array($pkgResult['no_of_patients'],$conResult['patient_count']);

$resArray['Prescriptions']=array($pkgResult['no_of_prescriptions'],$conResult['prescription_count']);

$resArray['Medicines']=array($pkgResult['no_of_medicines'],$conResult['medicine_count']);

$resArray['Tests']=array($pkgResult['no_of_tests'],$conResult['test_count']);

$resArray['Online Appointments']=array($pkgResult['no_of_online_appointments'],$conResult['online_appointment_count']);

$smarty->assign('Result',$resArray);
$smarty->assign('docDetails', $docResult);
$template = 'own_package.tpl';
?>