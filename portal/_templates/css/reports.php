<?php

$reports= new Report;
$medicine = new Medicine;


if ($_POST && isset($_GET['ajax'])) {

	$result= $medicine->GetAllMedicineonrealtime("insertedId");
	$Mediname= array_column($result, 'name');
	echo json_encode($result); 
    // echo implode(',', $Mediname);
}elseif ($_POST) {

	$cnt="";
	$currentDate="";
	$totalFee ="";			
	$resArray="";
	$feeNum = 0;
	$getMonth=explode('-', $_POST['from']);
  // echo $_POST['parameter'];
	$data['from']=$_POST['from'];
	$data['to']=$_POST['to'];
	$data['parameter']=$_POST['parameter'];
	$data['u_id']=$_SESSION['AdminId'];
	$data['filter']=$_POST['filter'];

	if ($_POST['parameter']=="New Patients" || $_POST['parameter']=="Returning patients") {
		
    $data['thName'] = array("Patient Name","Mobile Number","Email Address","Registration Date");
    $data['tdName'] = array("name","mobile","email","created_on");

    if ($_POST['parameter']=="New Patients") {

      $data['heading']="Total Patients";
      $data['parentTblName']= "patient";

    }else{

      $data['heading']="Total Returning Patients";
      $data['parentTblName']= "prescription";
      $data['dist']="patient_id";
      $data['childTblName']="patient";
    }


  }elseif ($_POST['parameter']=="Medicines") {

    $data['heading']="Total Medicines";
    $data['parentTblName']= "medicine";
    $data['thName'] = array("Medicine Name","Doze","Formula","Company","Date Added");
    $data['tdName'] = array("name","dose","formula","company","created_on");

  }elseif ($_POST['parameter']=="Tests") {

    $data['heading']="Total Tests";
    $data['parentTblName']= "tests";
    $data['thName'] = array("Test Name","Date Added","Patients took this test");
    $data['tdName'] = array("name","created_on","testcount");
		# code...
  }elseif ($_POST['parameter']=="Prescriptions") {

    $data['heading']="Total Prescriptions";
    $data['parentTblName']= "prescription";
    $data['childTblName']="patient";
    $data['thName'] = array("Patient's Name","Date Created");
    $data['tdName'] = array("name","created_on");
		# code...
  }elseif ($_POST['parameter']=="Online appointments" || $_POST['parameter']=="Manual appointments") {

    $data['heading']="Total Appointments";
    $data['parentTblName']="appointments";
    $data['colName']="online_manual";
    $data['childTblName']="patient";
    $data['thName'] = array("Patient's Name
     ","Appointment Date","Appointment Time");
    $data['tdName'] = array("name","ap_date","ap_time");

    if ($_POST['parameter']=="Online appointments") {

      $data['colVal']="online";
    }else{

      $data['colVal']="manual";
    }

  }elseif ($_POST['parameter']=="Medicine prescribed to number of patients") {

    $data['heading']="Total Patients against this medicine";
    $data['medicine']=$_POST['medicine'];
    $data['thName'] = array("Patient's Name
     ","Registration Date");
    $data['tdName'] = array("name","created_on");


  }elseif ($_POST['parameter']=="Total fee collected" || $_POST['parameter']=="Free checkups") {


    $data['parentTblName']="prescription";
    $data['colName']="fee_received";

    if ($_POST['parameter']=="Total fee collected") {

      $data['heading']="Total Amount";
      $data['colVal']="1";
    }else{
      $data['heading']="Total Free Checkups";
      $data['colVal']="0";
    }

	}//End of parameter conditions




	if (isset($_POST['medicine'])) {

		$result=$reports->getPrescriptionJoin($data);
		// print_r($result);
   foreach ($result as $k => $v) {

     if ($_POST['filter']=="months") {

       if(preg_match("/-".$getMonth[1]."-/", $v['created_on'])){

        $dateObj   = DateTime::createFromFormat('!m', $getMonth[1]);
                        $monthName = $dateObj->format('F'); // March
                        $resArray["".$monthName.""][] = $v['name'];
                       // echo $v['name'];
                      }else{

                        $getMonth= explode('-', $v['created_on']);
                        $dateObj   = DateTime::createFromFormat('!m', $getMonth[1]);
                        $monthName = $dateObj->format('F'); // March
                        $resArray["".$monthName.""][] = $v['name'];

                      }

                    }elseif ($_POST['filter']=="years") {

                      if(preg_match("/".$getMonth[0]."-/", $v['created_on'])){

                        $resArray["".$getMonth[0].""][] = $v['name'];
                        //echo $v['name'];
                      }else{

                        $resArray["".$getMonth[0].""][] = $v['name'];

                      }
                    }

                  }


                  $cnt= count($result);
                 // print_r($resArray);
                  $smarty->assign("feerecord",@$resArray);
                  $data['totalCount']=$cnt;
                  $smarty->assign("record",@$result);
                  $smarty->assign("data",@$data);

        }elseif (!isset($_POST['medicine']) && $result=$reports->GetResult($data)) {



                  if (isset($data['childTblName'])) {
                    $Pat_Array=[];
                    $ar= array_column($result, 'patient_id');
        // print_r($ar);
                    foreach ($ar as $k => $v) {

                      $res = $reports->GetInfo($data,$v);
                      array_push($Pat_Array, $res[0]);
                    }
                //print_r($Pat_Array);
                    for ($i=0; $i<count($result) ; $i++) { 

          // echo $Pat_Array[$i]['name'];
                      $result[$i]['name'] = $Pat_Array[$i]['name'];
                      $result[$i]['mobile'] = $Pat_Array[$i]['mobile'];
                      $result[$i]['email'] = $Pat_Array[$i]['email'];

                      if ($_POST['parameter']!="Prescriptions" && $_POST['parameter']!="Returning patients") {
                      // echo $_POST['parameter'];
                        $result[$i]['created_on'] = $Pat_Array[$i]['created_on'];
                       // echo "Reached ";
                      }


                    }
                  }
  // print_r($result);
                  if ($_POST['parameter']=="Tests") {

                   $test_array=[];
                   $testIds= array_column($result, 'id');
			//print_r($result);
                   foreach ($result as $k => $v) {
                    if ($_POST['filter']=="days") {

                     $testCount= $reports->GetTestsCount($v['id']);
				    // echo $testCount;
                     array_push($test_array, $testCount);

                   }elseif($_POST['filter']=="months"){

                     if(preg_match("/-".$getMonth[1]."-/", $v['created_on'])){

                      $dateObj   = DateTime::createFromFormat('!m', $getMonth[1]);
                        $monthName = $dateObj->format('F'); // March
                        $resArray["".$monthName.""][] = $v['name'];
                        //echo $v['name'];
                      }else{

                       $getMonth= explode('-', $v['created_on']);
                       $dateObj   = DateTime::createFromFormat('!m', $getMonth[1]);
                        $monthName = $dateObj->format('F'); // March
                        $resArray["".$monthName.""][] = $v['name'];

                      }

                    }else{

                     if(preg_match("/-".$getMonth[0]."-/", $v['created_on'])){

                      $resArray["".$getMonth[0].""][] = $v['name'];
                       // echo $v['name'];
                    }else{

                     $getMonth= explode('-', $v['created_on']);
                     $resArray["".$getMonth[0].""][] = $v['name'];

                   }
                 }

               }
               //print_r($resArray);
               $smarty->assign("feerecord",@$resArray);
               for ($i=0; $i<count($result) ; $i++) { 

                 if ($_POST['filter']=="days") {
                  $result[$i]['testcount'] = $test_array[$i];	
                }

              }

            }elseif ($_POST['parameter']=="Total fee collected") {

             foreach ($result as $key => $value) {

              if ($_POST['filter']=="days") {

               if ($value['created_on'] != $currentDate) {

                $currentDate =$value['created_on'];
                $data['crntDate']=$currentDate;
                $subResult=$reports->GetSpecificData($data);

                foreach ($subResult[0] as $key => $total) {

                 $totalFee += $total;
                 $resArray[]= array("date"=>$data['crntDate'],
                  "fee"=>$total  );
               }
             }

           }elseif ($_POST['filter']=="months") {

             if(preg_match("/-".$getMonth[1]."-/", $value['created_on'])){

              $feeNum += $value['fee_received'];
              $dateObj   = DateTime::createFromFormat('!m', $getMonth[1]);
                        $monthName = $dateObj->format('F'); // March
                        $resArray["".$monthName.""] = $feeNum;
                        $totalFee+=$value['fee_received'];
                      }else{

                       $getMonth= explode('-', $value['created_on']);
                       $totalFee+=$value['fee_received'];
                       $feeNum=0;
                       $feeNum += $value['fee_received'];
                       $dateObj   = DateTime::createFromFormat('!m', $getMonth[1]);
                        $monthName = $dateObj->format('F'); // March
                        $resArray["".$monthName.""] = $feeNum;
                      }

                    }else{

                     if(preg_match("/".$getMonth[0]."-/", $value['created_on'])){

                      $feeNum += $value['fee_received'];
                      $resArray["".$getMonth[0].""] = $feeNum;
                      $totalFee+=$value['fee_received'];

                    }else{

                      $getMonth= explode('-', $value['created_on']);
                      $totalFee+=$value['fee_received'];
                      $feeNum=0;
                      $feeNum += $value['fee_received'];
                      $resArray["".$getMonth[0].""] = $feeNum;
                    }

                  }
            }//End of Foreach

            $cnt=$totalFee;
            $smarty->assign("feerecord",@$resArray);
           // print_r($resArray);

          }elseif($_POST['parameter']=="Free checkups"){

           foreach ($result as $key => $value) {

            if ($_POST['filter']=="days") {

             if ($value['created_on'] != $currentDate) {

              $currentDate =$value['created_on'];
              $data['crntDate']=$currentDate;
              $subResult=$reports->GetSpecificData($data);
              $resArray[]= array("date"=>$data['crntDate'],
               "fee"=>   count($subResult));
            }

          }elseif ($_POST['filter']=="months") {

           if(preg_match("/-".$getMonth[1]."-/", $value['created_on'])){

            $feeNum += count($value['fee_received']);
            $dateObj   = DateTime::createFromFormat('!m', $getMonth[1]);
                        $monthName = $dateObj->format('F'); // March
                        $resArray["".$monthName.""] = $feeNum;
                        $totalFee+=$value['fee_received'];
                      }else{

                       $getMonth= explode('-', $value['created_on']);
                       $totalFee+=$value['fee_received'];
                       $feeNum=0;
                       $feeNum += count($value['fee_received']);
                       $dateObj   = DateTime::createFromFormat('!m', $getMonth[1]);
                        $monthName = $dateObj->format('F'); // March
                        $resArray["".$monthName.""] = $feeNum;

                      }

                    }else{

                      if(preg_match("/".$getMonth[0]."-/", $value['created_on'])){

                        $feeNum += count($value['fee_received']);
                        $resArray["".$getMonth[0].""] = $feeNum;
                        $totalFee+=$value['fee_received'];

                      }else{

                       $getMonth= explode('-', $value['created_on']);
                       $totalFee+=$value['fee_received'];
                       $feeNum=0;
                       $feeNum += count($value['fee_received']);
                       $resArray["".$getMonth[0].""] = $feeNum;

                     }


                   }

        	}//End of Foreach
        	$cnt= count($result);
        	$smarty->assign("feerecord",@$resArray);
        	//print_r($resArray);

        }elseif ($_POST['parameter']=="New Patients" || $_POST['parameter']=="Returning patients" || $_POST['parameter']=="Medicines" || $_POST['parameter']=="Prescriptions" || $_POST['parameter']=="Online appointments" || $_POST['parameter']=="Manual appointments") {

          if ($_POST['filter']=="months") {

            foreach ($result as $k => $v) {
              if(preg_match("/-".$getMonth[1]."-/", $v['created_on'])){

                $dateObj   = DateTime::createFromFormat('!m', $getMonth[1]);
                        $monthName = $dateObj->format('F'); // March
                        $resArray["".$monthName.""][] = $v['name'];
                        //echo $v['name'];

                      }else{
                       $getMonth= explode('-', $v['created_on']);
                       $dateObj   = DateTime::createFromFormat('!m', $getMonth[1]);
                        $monthName = $dateObj->format('F'); // March
                        $resArray["".$monthName.""][] = $v['name'];

                      }
                    }

                  }elseif ($_POST['filter']=="years") {

                    foreach ($result as $k => $v) {
                      if(preg_match("/".$getMonth[0]."-/", $v['created_on'])){

                        $resArray["".$getMonth[0].""][] = $v['name'];
                       // echo $v['name'];

                      }else{

                       $getMonth= explode('-', $v['created_on']);
                       $resArray["".$getMonth[0].""][] = $v['name'];

                     }
                   }
                 }

                 $cnt= count($result);
                 $smarty->assign("feerecord",@$resArray);
                // print_r($resArray);
               }else{

                 $cnt= count($result);
               }

               $data['totalCount']=$cnt;


        //print_r($result);
               $smarty->assign("record",@$result);
               $smarty->assign("data",@$data);
               $smarty->assign('cities', get_cities());

             }else{
               $errorDetail['from']= $_POST['from'];
               $errorDetail['to']= $_POST['to'];
               $errorDetail['parameter']= $_POST['parameter'];
               $smarty->assign("data",@$errorDetail);
               $error= "No records found";
               $smarty->assign("error",@$error);

             }


}//POST End


/*============Custom Function=================*/


if (!isset($_GET['ajax'])) {
	$template = 'reports/reports.tpl';
}
?>