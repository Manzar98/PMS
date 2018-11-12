<?php

$Work_days= new Work_days;


if (isset($_POST['days'])) {
  
  $record= $Work_days->checkRecord($_SESSION['AdminId']);

  if ($record>0) {

    $Work_days->deleteWork($_SESSION['AdminId']);
  }

if ( $_POST['days'][0]=='mon_on' || $_POST['days'][1]=='tue_on' || $_POST['days'][2]=='wed_on' || $_POST['days'][3]=='thu_on' || $_POST['days'][4]=='fri_on' || $_POST['days'][5]=='sat_on' || $_POST['days'][6]=='sun_on' || $_POST['days'][7]=='unavail_on') 
{
  
    for ($i=0; $i<count($_POST['days']); $i++) {
       
          $Work_days->addwork($_POST['days'][$i],$_POST['dt_from'][$i],$_POST['dt_to'][$i],$_POST['hr_count'][$i],$_SESSION['AdminId']);    

 }
 redirect_to(BASE_URL.'settings/');
}
}
else{
 // echo "Manzar";
  $data= $Work_days->getWork($_SESSION['AdminId']);

   if (isset($data)) {
      # code...
    
   $days= implode(',', array_column($data, 'days'));
   $from= implode(',', array_column($data, 'dt_from'));
   $to= implode(',', array_column($data, 'dt_to'));
   $count = implode(',', array_column($data, 'hr_count'));

   $smarty->assign("days",@$days);
   $smarty->assign("from",@$from);
   $smarty->assign("to",@$to);
   $smarty->assign("count",@$count);
    }
   // echo $str;
}

  


$template = 'work_settings.tpl';
?>