<?php

Class Package
{

	function addPackage($data){
		global $db;
		if (isset($data['id']) && !empty($data['id'])) {
			
			$sql = 'UPDATE '.DB_PREFIX.'packages SET 
			pkg_name="'.$data['pkg_name'].'",
			no_of_patients="'.$data['no_of_patients'].'",
			no_of_prescriptions="'.$data['no_of_prescriptions'].'",
			no_of_medicines="'.$data['no_of_medicines'].'",
			no_of_tests="'.$data['no_of_tests'].'",
			no_of_instructions="'.$data['no_of_instructions'].'",
			no_of_online_appointments="'.$data['no_of_online_appointments'].'",
			pkg_price="'.$data['pkg_price'].'" WHERE id='.$data['id'];

		}else{

			$sql ='INSERT INTO '.DB_PREFIX.'packages(pkg_name,no_of_patients,no_of_prescriptions,no_of_medicines,no_of_tests,no_of_instructions,no_of_online_appointments,pkg_price,created_on)VALUES("'.$data['pkg_name'].'","'.$data['no_of_patients'].'","'.$data['no_of_prescriptions'].'","'.$data['no_of_medicines'].'","'.$data['no_of_tests'].'","'.$data['no_of_instructions'].'","'.$data['no_of_online_appointments'].'","'.$data['pkg_price'].'",NOW())';

		}
  //echo $sql;

		return  $db->Execute($sql);

	}

	function getAllPackages(){
		global $db;

		$sql='SELECT * FROM '.DB_PREFIX.'packages';

		return $db->QueryArray($sql);

	}

	function getSinglePackage($id){

		global $db;

		$sql='SELECT * FROM '.DB_PREFIX.'packages where id='.$id;

		return $db->QueryRow($sql);
	}

	function deletePackage($id)
	{
		global $db;

		$sql = 'DELETE FROM '.DB_PREFIX.'packages WHERE id='.$id.' LIMIT 1';
		
		return $db->Execute($sql);
	}

	function getColumnCount($pkg_id,$col){

		global $db;
		$sql='SELECT '.$col.' FROM '.DB_PREFIX.'packages where id='.$pkg_id;
		//echo $sql;
		return $db->QueryRow($sql);

	}

}
?>