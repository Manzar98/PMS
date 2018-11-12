<?php

$reports= new Report;
$medicine = new Medicine;
$test = new Test;

if ($_POST && isset($_GET['ajax'])) {

	$result= $medicine->GetAllMedicineonrealtime("insertedId");
	$Mediname= array_column($result, 'name');
	echo json_encode($result); 
    // echo implode(',', $Mediname);
}elseif ($_POST && isset($_GET['testajax'])) {

  $result= $test->GetTestsBasiconrealtime("insertedId");
  $Mediname= array_column($result, 'name');

  echo json_encode($result);

}elseif ($_POST && isset($_POST['parameter_Comp'])) {

       $pieChartData=[];
       $pieresArray="";
       $grandTotal="";
       $data['parameter_Comp'] = $_POST['parameter_Comp'];
       $data['from_Comp'] = $_POST['from_Comp'];
       $data['to_Comp'] = $_POST['to_Comp'];
       $data['u_id'] = $_SESSION['AdminId'];
       $Pat_Array=[];
       $resArray="";
       if ($_POST['parameter_Comp']=="New Vs Returning Patients") {
          
           $data['parentTblName']=array( "New Patients"=>"patient","Returning Patients"=>"prescription");
             

           foreach ($data['parentTblName'] as $key => $value) {
                  $data['parentTblName']=$value;
                  $data['grpBy']=$key;
                if ($result=$reports->getAllComparisonData($data)) {

                  $chartData[]= array("label"=> "".$key."",
                                  "value"=> "".count($result)."");
                  $grandTotal+=count($result);
                 
                  if ($data['grpBy']=="Returning Patients") {

                   $data['childTblName'] ="patient";
                    $ar= array_column($result, 'patient_id');
                    foreach ($ar as $k => $v) {
                      $res = $reports->GetInfo($data,$v);
                          array_push($Pat_Array,$res);//Error on this line
                     } 
                     for ($i=0; $i<count($result) ; $i++) { 

                          $result[$i]['name'] = $Pat_Array[$i]['name'];

                      }    
            }
            $id="";
                   foreach ($result as $k => $v) {
                    if ($data['grpBy']=="New Patients") {
                      $id=$v['id'];
                    }else{
                      $id=$v['patient_id'];
                    }
                    $resArray["".$key.""][] = $v['name'] . " (".$id.")" ;
              }//End of foreach
                    
                }else{
                 //echo "manzar else";
                   $error= "No records found"; 
                }
                    
           }
           
           $data['totalCount']=$grandTotal;
           $smarty->assign("data",@$data);
           $smarty->assign("error",@$error);
           $smarty->assign("resRecord",@$resArray);
           $smarty->assign("pieChart",@json_encode($chartData));
          
    
       }elseif ($_POST['parameter_Comp']=="Paid Vs Free Checkups") {

           $data['parentTblName']= "prescription";
           $smarty->assign("data",@$data);
           $freeCheckup="";
           if ($result= $reports->getAllComparisonData($data)) {
           $totalCheckup=count($result);
           
           foreach ($result as $k => $v) {

                   $filterBy = "".$v['fee_received'].""; 
                   $new = array_filter($result, function ($var) use ($filterBy) {
                    return ($var['fee_received'] == $filterBy);
                   });

                   if ($v['fee_received'] == "0") {

                      $freeCheckup=  count($new);
                      $pieresArray['Free Checkups '] = $freeCheckup;
                   }else{

                     $pieresArray['Paid Checkups '] = $totalCheckup - $freeCheckup;;
                   }
             }
            foreach ($pieresArray as $key => $value) {

                     $chartData[]= array("label"=> "".$key."",
                                  "value"=> "".$value."");
             } 

              $data['childTblName'] ="patient";
                    $ar= array_column($result, 'patient_id');
                    foreach ($ar as $k => $v) {
                      $res = $reports->GetInfo($data,$v);
                      //print_r($res)."</br>";
                          array_push($Pat_Array,$res);//Error on this line
                     } 
                     for ($i=0; $i<count($result) ; $i++) { 

                          $result[$i]['name'] = $Pat_Array[$i]['name'];

                      }    
                   $id="";
                   foreach ($result as $k => $v) {
                    
                      $id=$v['patient_id'];
                      if ($v['fee_received']=="0") {

                        $resArray["Free Checkups"][] = $v['name'] . " (".$id.")" ;

                      }else{

                        $resArray["Paid Checkups"][] = $v['name'] . " (".$id.")" ;
                      }
                     
              }//End of foreach
             $data['totalCount']=$totalCheckup;
             $smarty->assign("resRecord",@$resArray);
             $smarty->assign("data",@$data);
             $smarty->assign("pieChart",@json_encode($chartData));

           }else{

                  $error= "No records found";
                  $smarty->assign("error",@$error);
           }

       }elseif ($_POST['parameter_Comp']=="Manual Vs Online Appointments") {
         
           $data['parentTblName']= "appointments";
           $onlineAppoint="";
         if ($result= $reports->getAllComparisonData($data)) {
           $totalAppoint=count($result);
           foreach ($result as $k => $v) {

                   $filterBy = "".$v['online_manual'].""; 
                   $new = array_filter($result, function ($var) use ($filterBy) {
                    return ($var['online_manual'] == $filterBy);
                   });

                   if ($v['online_manual'] == "online") {

                      $onlineAppoint=  count($new);
                      $pieresArray['Online Appointments'] = $onlineAppoint;
                   }else{

                     $pieresArray['Manual Appointments'] = $totalAppoint - $onlineAppoint;
                   }
             }
            foreach ($pieresArray as $key => $value) {

                     $chartData[]= array("label"=> "".$key."",
                                  "value"=> "".$value."");
             }
             
              $data['childTblName'] ="patient";
                    $ar= array_column($result, 'patient_id');
                    foreach ($ar as $k => $v) {
                      $res = $reports->GetInfo($data,$v);
                          array_push($Pat_Array,$res);//Error on this line
                     } 
                     for ($i=0; $i<count($result) ; $i++) { 

                          $result[$i]['name'] = $Pat_Array[$i]['name'];

                      }    
                   $id="";
                   foreach ($result as $k => $v) {
                    
                      $id=$v['patient_id'];
                      if ($v['online_manual']=="manual") {

                        $resArray["Online Appointments"][] = $v['name'] . " (".$id.")" ;

                      }else{

                        $resArray["Manual Appointments"][] = $v['name'] . " (".$id.")" ;
                      }
                     
              }//End of foreach
             $data['totalCount']=$totalAppoint;
             $smarty->assign("resRecord",@$resArray);
             $smarty->assign("data",@$data);
             $smarty->assign("pieChart",@json_encode($chartData));
         }else{

              $error= "No records found";
              $smarty->assign("error",@$error);
       }

       }



  
}elseif ($_POST) {

	$cnt="";
	$currentDate="";
	$totalFee ="";			
	$resArray="";
	$feeNum = 0;
  $chartData=[];
  $allDates="";
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
    $data['thName'] = array("Patient's Name
     ","Prescribed Date");
    $data['tdName'] = array("name","pre_created_on");
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


    $data['medicine']=$_POST['medicine'];
    $data['thName'] = array("Patient's Name
     ","Prescribed Date");
    $data['tdName'] = array("name","pre_created_on");


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

   medicinePost($smarty,$reports,$data,$resArray,$currentDate);
   
 }elseif (isset($_POST["testSelect"])) {

   testPost($smarty,$reports,$data,$resArray);

 }elseif (!isset($_POST['medicine']) && $result=$reports->GetResult($data)) {

    //print_r($result)."</br>";

  if ($_POST['parameter']=="Online appointments" || $_POST['parameter']=="Manual appointments") {

    $allDates=array_column($result, 'created_on');
  }

  if (isset($data['childTblName'])) {

    $Pat_Array=[];
    $ar= array_column($result, 'patient_id');
            // print_r($ar);
    foreach ($ar as $k => $v) {

      $res = $reports->GetInfo($data,$v);
                          // print_r($res)."</br>";
                          array_push($Pat_Array,$res);//Error on this line
                        } 
                  //print_r($Pat_Array);
                        for ($i=0; $i<count($result) ; $i++) { 

              // echo $Pat_Array[$i]['name'];
                          $result[$i]['name'] = $Pat_Array[$i]['name'];
                          $result[$i]['mobile'] = $Pat_Array[$i]['mobile'];
                          $result[$i]['email'] = $Pat_Array[$i]['email'];

                          if ($_POST['parameter']!="Prescriptions" && $_POST['parameter']!="Returning patients" && $_POST['parameter']!="Online appointments" && $_POST['parameter']!="Manual appointments") {
                          // echo $_POST['parameter'];
                            $result[$i]['created_on'] = $Pat_Array[$i]['created_on'];
                           // echo "Reached ";
                          }
                        }
                      }//------End of childTable-------

  // print_r($result);
                      if ($_POST['parameter']=="Total fee collected") {

                        $getMonth= explode('-', $_POST['from']);

                        if ($_POST['filter']=="days") {

                          foreach ($result as $key => $value) {

                           if ($value['created_on'] != $currentDate) {

                            $currentDate =$value['created_on'];
                            $data['crntDate']=$currentDate;
                            $subResult=$reports->GetSpecificData($data);

                            foreach ($subResult[0] as $key => $total) {

                             $totalFee += $total;
                             $resArray[]= array("date"=>$data['crntDate'],
                              "fee"=>$total  );

                             $chartData[]= array("label"=> "".$data['crntDate']."",
                              "value"=> "".$total."");
                           }
                         }
               }//End of foreach
               $smarty->assign('charts',@json_encode($chartData));

             }elseif ($_POST['filter']=="months") {

               foreach ($result as $key => $value) {

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
                   }//End of foreach
                     chartsDataForFreePaid($resArray,$smarty);//
                   }else{
                     foreach ($result as $key => $value) {

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

                  }//End of Foreach

                  chartsDataForFreePaid($resArray,$smarty);//
                }

                $cnt=$totalFee;
                $smarty->assign("feerecord",@$resArray);
           // print_r($resArray);

              }elseif($_POST['parameter']=="Free checkups"){

                $getMonth=explode('-', $_POST['from']);

                if ($_POST['filter']=="days") {

                  foreach ($result as $key => $value) {

                   if ($value['created_on'] != $currentDate) {

                    $currentDate =$value['created_on'];
                    $data['crntDate']=$currentDate;
                    $subResult=$reports->GetSpecificData($data);
                    $resArray[]= array("date"=>$data['crntDate'],
                     "fee"=>   count($subResult));

                    $chartData[]= array("label"=> "".$data['crntDate']."",
                      "value"=> "".count($subResult)."");
                  }

           }//End of foreach
           $smarty->assign('charts',@json_encode($chartData));

         }elseif ($_POST['filter']=="months") {

          foreach ($result as $key => $value) {

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
                  }//End of foreach

                      chartsDataForFreePaid($resArray,$smarty);//

                    }else{

                      foreach ($result as $key => $value) {

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

                   }//End of Foreach
            chartsDataForFreePaid($resArray,$smarty);//
          }
          $cnt= count($result);
          $smarty->assign("feerecord",@$resArray);

          

        }elseif ($_POST['parameter']=="New Patients" || $_POST['parameter']=="Returning patients" || $_POST['parameter']=="Medicines" || $_POST['parameter']=="Prescriptions" || $_POST['parameter']=="Online appointments" || $_POST['parameter']=="Manual appointments") {

          if ($_POST['filter']=="days") {

           /*------For days Graph logic Start-------*/
                 //print_r($result);
           if ($_POST['parameter']!="Online appointments" && $_POST['parameter']!="Manual appointments") {

            $allDates=array_column($result, 'created_on');
          }
         // print_r($allDates);
          $distDates=array_unique($allDates);
         // print_r($distDates);
          foreach ($distDates as $k => $v) {

           $data['crntDate']= $v;
           $subResult=$reports->GetSpecificData($data);
           $chartData[]= array("label"=> "".$v."",
             "value"=> "".count($subResult)."");
         }
         $smarty->assign('charts',@json_encode($chartData));

         /*--------For days Graph logic End----------*/

       }elseif ($_POST['filter']=="months") {
//print_r($result);
        $id="";
        foreach ($result as $k => $v) {

         if ($_POST['parameter']=="New Patients") {
                 //echo "first";
           $id=$v['id'];
         }elseif($_POST['parameter']=="Medicines"){

          $id=$v['dose'];
        }else{
               //echo "second";
          $id=$v['patient_id'];
        }
        $getMonth= explode('-', $v['created_on']);
        $dateObj   = DateTime::createFromFormat('!m', $getMonth[1]);
                          $monthName = $dateObj->format('F'); // March
                          $resArray["".$monthName.""][] = $v['name'] . " (".$id.")" ;
                    }//End of foreach
                    
                    chartsData($resArray,$smarty);//funtion for graphs


                  }elseif ($_POST['filter']=="years") {
                    $id="";
                    foreach ($result as $k => $v) {
                      if ($_POST['parameter']=="New Patients") {
                 //echo "first";
                       $id=$v['id'];
                     }elseif($_POST['parameter']=="Medicines"){

                      $id=$v['dose'];
                    }else{
               //echo "second";
                      $id=$v['patient_id'];
                    }
                    $getMonth= explode('-', $v['created_on']);
                    $resArray["".$getMonth[0].""][] = $v['name'] . " (".$id.")" ;
                       }//End of foreach

                       chartsData($resArray,$smarty);//funtion for graphs
                     }
                     $cnt= count($result);
                     $smarty->assign("feerecord",@$resArray);



                   }else{

                     $cnt= count($result);

                   }

                   $data['totalCount']=$cnt;
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

function chartsData($resArray,$smarty){
//print_r($resArray);
 foreach ($resArray as $key => $value) {
  // print_r($value) ."</br>";
   $chartData[]= array("label"=> "".$key."",
     "value"=> "".sizeof($value)."");
 }
 //print_r($chartData);
 $smarty->assign("charts",@json_encode($chartData));

}

function chartsDataForFreePaid($resArray,$smarty){
//print_r($resArray);
 foreach ($resArray as $key => $value) {

  $chartData[]= array("label"=> "".$key."",
   "value"=> "".$value."");
}

$smarty->assign("charts",@json_encode($chartData));

// echo json_encode($chartData);
}

function medicinePost($smarty,$reports,$data,$resArray,$currentDate){

          $result=$reports->getPrescriptionJoin($data);
          //print_r($result);
          $data['heading']="Total Patients against ".$result[0]['med_name']."";
          if($_POST['filter']=="days"){

           foreach ($result as $k => $v) {

            $filterBy = "".$v['pre_created_on'].""; // or Finance etc.
            $new = array_filter($result, function ($var) use ($filterBy) {
              return ($var['pre_created_on'] == $filterBy);
            });
          if ($v['pre_created_on'] != $currentDate) {

              $currentDate= $filterBy;
              $chartData[]= array("label"=> "".$currentDate."",
                "value"=> "".count($new)."");
            }

          }

          $smarty->assign('charts',@json_encode($chartData));

             }elseif ($_POST['filter']=="months") {

              foreach ($result as $k => $v) {

                $getMonth= explode('-', $v['pre_created_on']);
                $dateObj   = DateTime::createFromFormat('!m', $getMonth[1]);
                                    $monthName = $dateObj->format('F'); // March
                                    $resArray["".$monthName.""][] = $v['name'];

             }//End of foreach
             chartsData($resArray,$smarty);
            }elseif ($_POST['filter']=="years") {

             foreach ($result as $k => $v) {

               $getMonth= explode('-', $v['pre_created_on']);
               $resArray["".$getMonth[0].""][] = $v['name'];

                                 }//End of foreach
                                 chartsData($resArray,$smarty);
                               }

                   $cnt= count($result);
                  // print_r($resArray);
                   $smarty->assign("feerecord",@$resArray);
                   $data['totalCount']=$cnt;
                   $smarty->assign("record",@$result);
                   $smarty->assign("data",@$data);

}

function testPost($smarty,$reports,$data,$resArray){

                  $data['testSelect']=$_POST['testSelect'];
                  $result=$reports->getTestJoin($data);
  //print_r($result);
                  $data['heading']="Total Patients against ".$result[0]['test_name']."";

                  if($_POST['filter']=="days"){

                   foreach ($result as $k => $v) {

    $filterBy = "".$v['pre_created_on'].""; // or Finance etc.
    $new = array_filter($result, function ($var) use ($filterBy) {
      return ($var['pre_created_on'] == $filterBy);
    });

    if ($v['pre_created_on'] != $currentDate) {
      $currentDate= $filterBy;
      $chartData[]= array("label"=> "".$currentDate."",
        "value"=> "".count($new)."");
    }
  }

  $smarty->assign('charts',@json_encode($chartData));

}elseif ($_POST['filter']=="months") {

  foreach ($result as $k => $v) {

    $getMonth= explode('-', $v['pre_created_on']);
    $dateObj   = DateTime::createFromFormat('!m', $getMonth[1]);
                        $monthName = $dateObj->format('F'); // March
                        $resArray["".$monthName.""][] = $v['name'];

 }//End of foreach
 chartsData($resArray,$smarty);
}elseif ($_POST['filter']=="years") {

 foreach ($result as $k => $v) {

   $getMonth= explode('-', $v['pre_created_on']);
   $resArray["".$getMonth[0].""][] = $v['name'];

                     }//End of foreach
                     chartsData($resArray,$smarty);
                   }


                   $cnt= count($result);
                   print_r($resArray);
                   $smarty->assign("feerecord",@$resArray);
                   $data['totalCount']=$cnt;
                   $smarty->assign("record",@$result);
                   $smarty->assign("data",@$data);
                 }

function pieRelateInfo($result,$smarty,$Pat_Array,$reports){
                    
 //print_r($result);
}
                 
                 if (!isset($_GET['ajax']) && !isset($_GET['testajax'])) {
                   $template = 'reports/reports.tpl';
                 }
                 ?>


