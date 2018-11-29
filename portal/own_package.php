<?php
$package = new Package;
$resArray="";

$pkgResult= $package->getPackageDetail($_SESSION['selectedPkgId']);
//print_r($pkgResult);
$conResult= $package->getConsumptionDetail($_SESSION['AdminId']);
//print_r($conResult);

$resArray['Patients']=array($pkgResult['no_of_patients'],$conResult['patient_count']);

$resArray['Prescriptions']=array($pkgResult['no_of_prescriptions'],$conResult['prescription_count']);

$resArray['Medicines']=array($pkgResult['no_of_medicines'],$conResult['medicine_count']);

$resArray['Tests']=array($pkgResult['no_of_tests'],$conResult['test_count']);

$resArray['Online Appointments']=array($pkgResult['no_of_online_appointments'],$conResult['online_appointment_count']);

//print_r($resArray);
$smarty->assign('Result',$resArray);

$template = 'own_package.tpl';
?>