<?php /* Smarty version 2.6.31, created on 2018-11-15 12:24:47
         compiled from work_settings.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/clockpicker.css" /> 
 <script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/clockpicker.js" type="text/javascript"></script> 
<?php echo '
<script type="text/javascript">
    
	$(document).ready(function()
	{

    $(\'.dt_from\').prop(\'readonly\',true);
	$(\'.dt_to\').prop(\'readonly\',true);
    $(\'.mon_Div_Input\').hide();
    $(\'.tue_Div_Input\').hide();
    $(\'.wed_Div_Input\').hide();
    $(\'.thu_Div_Input\').hide();
    $(\'.fri_Div_Input\').hide();
    $(\'.sat_Div_Input\').hide();
    $(\'.sun_Div_Input\').hide();
    $(\'.unavail_Div_Input\').hide();

    $(\'.mon\').click(function(){
       //debugger;
       if ($(\'.mon\').prop(\'checked\')) {

    	  $(\'.mon_Div_Input\').show();
    	  $(\'.mondayHideInput\').val(\'mon_on\');
          $(\'.mon_Div_Input input\').prop(\'required\',true);
         
        }else{

          $(\'.mon_Div_Input\').hide();
          $(\'.mondayHideInput\').val(\'mon_off\');
          $(\'.mon_Div_Input input\').prop(\'required\',false);
          $(\'.mon_Div_Input input\').val(\'\');
        }
    })

    $(\'.tue\').click(function(){
      // debugger;
       if ($(\'.tue\').prop(\'checked\')) {

    	  $(\'.tue_Div_Input\').show();
    	  $(\'.tuesdayHideInput\').val(\'tue_on\');
          $(\'.tue_Div_Input input\').prop(\'required\',true);

        }else{

          $(\'.tue_Div_Input\').hide();
          $(\'.tuesdayHideInput\').val(\'tue_off\');
          $(\'.tue_Div_Input input\').prop(\'required\',false);
          $(\'.tue_Div_Input input\').val(\'\');
        }
    })

    $(\'.wed\').click(function(){
       //debugger;
       if ($(\'.wed\').prop(\'checked\')) {

    	  $(\'.wed_Div_Input\').show();
    	  $(\'.wednesdayHideInput\').val(\'wed_on\');
          $(\'.wed_Div_Input input\').prop(\'required\',true);

        }else{

          $(\'.wed_Div_Input\').hide();
          $(\'.wednesdayHideInput\').val(\'wed_off\');
          $(\'.wed_Div_Input input\').prop(\'required\',false);
          $(\'.wed_Div_Input input\').val(\'\');
        }
    })

    $(\'.thu\').click(function(){
       //debugger;
       if ($(\'.thu\').prop(\'checked\')) {

    	  $(\'.thu_Div_Input\').show();
    	  $(\'.thursdayHideInput\').val(\'thu_on\');
          $(\'.thu_Div_Input input\').prop(\'required\',true);

        }else{

          $(\'.thu_Div_Input\').hide();
          $(\'.thursdayHideInput\').val(\'thu_off\');
          $(\'.thu_Div_Input input\').prop(\'required\',false);
          $(\'.thu_Div_Input input\').val(\'\');

        }
    })

    $(\'.fri\').click(function(){
       //debugger;
       if ($(\'.fri\').prop(\'checked\')) {

    	  $(\'.fri_Div_Input\').show();
          $(\'.fri_Div_Input input\').prop(\'required\',true);

        }else{

          $(\'.fri_Div_Input\').hide();
          $(\'.fri_Div_Input input\').prop(\'required\',false);
          $(\'.fri_Div_Input input\').val(\'\');
        }
    })

    $(\'.sat\').click(function(){
       //debugger;
       if ($(\'.sat\').prop(\'checked\')) {

    	  $(\'.sat_Div_Input\').show();
          $(\'.sat_Div_Input input\').prop(\'required\',true);

        }else{

          $(\'.sat_Div_Input\').hide();
          $(\'.sat_Div_Input input\').prop(\'required\',false);
          $(\'.sat_Div_Input input\').val(\'\');
        }
    })

    $(\'.sun\').click(function(){
       //debugger;
       if ($(\'.sun\').prop(\'checked\')) {

    	  $(\'.sun_Div_Input\').show();
          $(\'.sun_Div_Input input\').prop(\'required\',true);

        }else{

          $(\'.sun_Div_Input\').hide();
          $(\'.sun_Div_Input input\').prop(\'required\',false);
          $(\'.sun_Div_Input input\').val(\'\');
        }
    })

    $(\'.unavail\').click(function(){
       //debugger;
       if ($(\'.unavail\').prop(\'checked\')) {

    	  $(\'.unavail_Div_Input\').show();
    	  $(\'.unavailHideInput\').val(\'unavail_on\');
          $(\'.unavail_Div_Input input\').prop(\'required\',true);
          $(\'.mon_Div_Input\').hide();
	      $(\'.tue_Div_Input\').hide();
	      $(\'.wed_Div_Input\').hide();
	      $(\'.thu_Div_Input\').hide();
	      $(\'.fri_Div_Input\').hide();
	      $(\'.sat_Div_Input\').hide();
	      $(\'.sun_Div_Input\').hide();
	      $(\'.daysWrap\').find(\'input[type="checkbox"]\').prop(\'checked\',false);
          $(\'.daysWrap\').find(\'input[type="checkbox"]\').prop(\'disabled\',true);
          $(\'.mon_Div_Input input\').val(\'\');
	      $(\'.tue_Div_Input input\').val(\'\');
	      $(\'.wed_Div_Input input\').val(\'\');
	      $(\'.thu_Div_Input input\').val(\'\');
	      $(\'.fri_Div_Input input\').val(\'\');
	      $(\'.sat_Div_Input input\').val(\'\');
	      $(\'.sun_Div_Input input\').val(\'\');
         
        }else{

          $(\'.unavail_Div_Input\').hide();
          $(\'.unavailHideInput\').val(\'unavail_off\');
          $(\'.unavail_Div_Input input\').prop(\'required\',false);
          $(\'.unavail_Div_Input input\').val(\'\');
          $(\'.daysWrap\').find(\'input\').prop(\'disabled\',false);
        }
    })

    $(\'.dt_from\').clockpicker({
    	donetext: \'Done\',
    	placement: \'top\',
    	autoclose: \'true\',
    	twelvehour: \'true\'
    });

    $(\'.dt_to\').clockpicker({
    	donetext: \'Done\',
    	placement: \'top\',
    	autoclose: \'true\',
    	twelvehour: \'true\'
    });
var today = new Date();
    $(\'.dateTo\').datepicker({
         minDate: today,
         dateFormat : "yy-mm-dd",
		 changeMonth: true,
		 changeYear: true,
		 readOnly: true

    });
        $(\'.dateFrom\').datepicker({
         minDate: today,
         dateFormat : "yy-mm-dd",
		 changeMonth: true,
		 changeYear: true,
		 readOnly: true

    });

   var days=$(\'#daysList\').val().split(\',\');
   var froms=$(\'#fromList\').val().split(\',\');
   var tos=$(\'#toList\').val().split(\',\');
   var counts=$(\'#countList\').val().split(\',\');

 for (var i = 0; i < days.length; i++) {
 	console.log(days[i])
 	if (days[i]=="mon_on") {

 		$(\'.mon\').prop(\'checked\',true);
 		$(\'.mon_Div_Input\').show();
    	$(\'.mondayHideInput\').val(\'mon_on\');
    	$(\'.from1\').val(froms[i]);
    	$(\'.to1\').val(tos[i]);
    	$(\'.count1\').val(counts[i]);

 	}
 	if (days[i]=="tue_on") {
       
        $(\'.tue\').prop(\'checked\',true);
 		$(\'.tue_Div_Input\').show();
    	$(\'.tuesdayHideInput\').val(\'tue_on\');
    	$(\'.from2\').val(froms[i]);
    	$(\'.to2\').val(tos[i]);
    	$(\'.count2\').val(counts[i]);
 	}
 	if (days[i]=="wed_on") {

 		$(\'.wed\').prop(\'checked\',true);
 		$(\'.wed_Div_Input\').show();
    	$(\'.wednesdayHideInput\').val(\'wed_on\');
    	$(\'.from3\').val(froms[i]);
    	$(\'.to3\').val(tos[i]);
    	$(\'.count3\').val(counts[i]);

 	}
 	if (days[i]=="thu_on") {
        
        $(\'.thu\').prop(\'checked\',true);
 		$(\'.thu_Div_Input\').show();
    	$(\'.thursdayHideInput\').val(\'thu_on\');
    	$(\'.from4\').val(froms[i]);
    	$(\'.to4\').val(tos[i]);
    	$(\'.count4\').val(counts[i]);
 	}
 	if (days[i]=="fri_on") {

        $(\'.fri\').prop(\'checked\',true);
 		$(\'.fri_Div_Input\').show();
    	$(\'.fridayHideInput\').val(\'fri_on\');
    	$(\'.from5\').val(froms[i]);
    	$(\'.to5\').val(tos[i]);
    	$(\'.count5\').val(counts[i]);
 	}
 	if (days[i]=="sat_on") {

 		$(\'.sat\').prop(\'checked\',true);
 		$(\'.sat_Div_Input\').show();
    	$(\'.saturdayHideInput\').val(\'sat_on\');
    	$(\'.from6\').val(froms[i]);
    	$(\'.to6\').val(tos[i]);
    	$(\'.count6\').val(counts[i]);
    
 	}
 	if (days[i]=="sun_on") {
        
        $(\'.sun\').prop(\'checked\',true);
 		$(\'.sun_Div_Input\').show();
    	$(\'.sundayHideInput\').val(\'sun_on\');
    	$(\'.from7\').val(froms[i]);
    	$(\'.to7\').val(tos[i]);
    	$(\'.count7\').val(counts[i]);
    	
 	}
 	if (days[i]=="unavail_on") {
       
        $(\'.unavail\').prop(\'checked\',true);
 		$(\'.unavail_Div_Input\').show();
    	$(\'.unavailHideInput\').val(\'unavail_on\');
    	$(\'.from8\').val(froms[i]);
    	$(\'.to8\').val(tos[i]);
        $(\'.daysWrap\').find(\'input[type="checkbox"]\').prop(\'checked\',false);
        $(\'.daysWrap\').find(\'input[type="checkbox"]\').prop(\'disabled\',true);
 	}
 }



});
</script>
<style type="text/css">

input[type="checkbox"]{
          margin: 0 auto !important;
	}
.daysWrap input[type="checkbox"]{
		margin-top: 18px !important;
	}
</style>
'; ?>


<div id="content">
	<div class="container-fluid checkboxWrap">
		<h2>Date & Time Settings</h2>
		<form class="box" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post" enctype="multipart/form-data">
		<fieldset>
		<legend>Date & Time</legend>
		<input type="hidden" name="" value="<?php echo $this->_tpl_vars['days']; ?>
" id="daysList">
		<input type="hidden" name="" value="<?php echo $this->_tpl_vars['from']; ?>
" id="fromList">
		<input type="hidden" name="" value="<?php echo $this->_tpl_vars['to']; ?>
" id="toList">
		<input type="hidden" name="" value="<?php echo $this->_tpl_vars['count']; ?>
" id="countList">
		<div class="daysWrap">
			<div class="row common-bottom">
				<div class="col-sm-1" style="margin-bottom: 30px;">
					<label>&nbsp;&nbsp;Monday</label>
					<input type="checkbox" name="" class="center-block mon">
					<input type="hidden" name="days[]" class="mondayHideInput" value="mon_off">
				</div>
				<div class="mon_Wrap">
				<div class="col-sm-2 common-bottom">
					<div class="mon_Div_Input">
					<label>From</label>
					<input type="text" name="dt_from[]" class="form-control input-field dt_from from1">
					</div>
				</div>
				<div class="col-sm-2 common-bottom">
					<div class="mon_Div_Input">
					<label>To</label>
					<input type="text" name="dt_to[]" class="form-control input-field dt_to to1">
					</div>
				</div>
				<div class="col-sm-1 common-bottom">
					<div class="mon_Div_Input">
					<label>Count</label>
					<input type="number" name="hr_count[]" class="form-control input-field count1">
					</div>
				</div>
				</div>
				<div class="col-sm-1" style="margin-bottom: 30px;">
					<label>Tuesday</label>
					<input type="checkbox" name="" class="center-block tue">
					<input type="hidden" name="days[]"  value="tue_off" class="tuesdayHideInput">
				</div>
				<div class="tue_Wrap">
				<div class="col-sm-2 common-bottom">
					<div class="tue_Div_Input">
					<label>From</label>
					<input type="text" name="dt_from[]" class="form-control input-field dt_from from2">
					</div>
				</div>
				<div class="col-sm-2 common-bottom">
					<div class="tue_Div_Input">
					<label>To</label>
					<input type="text" name="dt_to[]" class="form-control input-field dt_to to2">
					</div>
				</div>
				<div class="col-sm-1 common-bottom">
					<div class="tue_Div_Input">
					<label>Count</label>
					<input type="number" name="hr_count[]" class="form-control input-field count2">
					</div>
				</div>
				</div>
			</div>
			<div class="row common-bottom">
				<div class="col-sm-1" style="margin-bottom: 30px;">
					<label>Wednesday</label>
					<input type="checkbox" name="" class="center-block wed">
					<input type="hidden" name="days[]"  value="wed_off" class="wednesdayHideInput">
				</div>
				<div class="wed_wrap">
				<div class="col-sm-2 common-bottom">
					<div class="wed_Div_Input">
					<label>From</label>
					<input type="text" name="dt_from[]" class="form-control input-field dt_from from3">
					</div>
				</div>
				<div class="col-sm-2 common-bottom">
					<div class="wed_Div_Input">
					<label>To</label>
					<input type="text" name="dt_to[]" class="form-control input-field dt_to to3">
					</div>
				</div>
				<div class="col-sm-1 common-bottom">
					<div class="wed_Div_Input">
					<label>Count</label>
					<input type="number" name="hr_count[]" class="form-control input-field count3">
					</div>
				</div>
				</div>
				<div class="col-sm-1" style="margin-bottom: 30px;">
					<label>Thursday</label>
					<input type="checkbox" name="" class="center-block thu">
					<input type="hidden" name="days[]"  value="thu_off" class="thursdayHideInput">
				</div>
				<div class="thu_Wrap">
				<div class="col-sm-2 common-bottom">
					<div class="thu_Div_Input">
					<label>From</label>
					<input type="text" name="dt_from[]" class="form-control input-field dt_from from4">
					</div>
				</div>
				<div class="col-sm-2 common-bottom">
					<div class="thu_Div_Input">
					<label>To</label>
					<input type="text" name="dt_to[]" class="form-control input-field dt_to to4">
					</div>
				</div>
				<div class="col-sm-1 common-bottom">
					<div class="thu_Div_Input">
					<label>Count</label>
					<input type="number" name="hr_count[]" class="form-control input-field count4">
					</div>
				</div>
				</div>
			</div>
			<div class="row common-bottom">
				<div class="col-sm-1" style="margin-bottom: 30px;">
					<label>&nbsp;&nbsp;&nbsp;Friday</label>
					<input type="checkbox" name="" class="center-block fri">
					<input type="hidden" name="days[]"  value="fri_off" class="fridayHideInput">
				</div>
				<div class="fri_Wrap">
				<div class="col-sm-2 common-bottom">
					<div class="fri_Div_Input">
					<label>From</label>
					<input type="text" name="dt_from[]" class="form-control input-field dt_from from5">
					</div>
				</div>
				<div class="col-sm-2 common-bottom">
					<div class="fri_Div_Input">
					<label>To</label>
					<input type="text" name="dt_to[]" class="form-control input-field dt_to to5">
					</div>
				</div>
				<div class="col-sm-1 common-bottom">
					<div class="fri_Div_Input">
					<label>Count</label>
					<input type="number" name="hr_count[]" class="form-control input-field count5">
					</div>
				</div>
				</div>
				<div class="col-sm-1" style="margin-bottom: 30px;">
					<label>Saturday</label>
					<input type="checkbox" name="" class="center-block sat">
					<input type="hidden" name="days[]"  value="sat_off" class="saturdayHideInput">
				</div>
				<div class="Sat_Wrap">
				<div class="col-sm-2 common-bottom">
					<div class="sat_Div_Input">
					<label>From</label>
					<input type="text" name="dt_from[]" class="form-control input-field dt_from from6">
					</div>
				</div>
				<div class="col-sm-2 common-bottom">
					<div class="sat_Div_Input">
					<label>To</label>
					<input type="text" name="dt_to[]" class="form-control input-field dt_to to6">
					</div>
				</div>
				<div class="col-sm-1 common-bottom">
					<div class="sat_Div_Input">
					<label>Count</label>
					<input type="number" name="hr_count[]" class="form-control input-field count6">
					</div>
				</div>
				</div>
			</div>
			<div class="row common-bottom">
				<div class="col-sm-1" style="margin-bottom: 30px;">
					<label>&nbsp;&nbsp;Sunday</label>
					<input type="checkbox" name="" class="center-block sun">
					<input type="hidden" name="days[]" value="sun_off" class="sundayHideInput">
				</div>
				<div class="sun_Wrap">
				<div class="col-sm-2 common-bottom">
					<div class="sun_Div_Input">
					<label>From</label>
					<input type="text" name="dt_from[]" class="form-control input-field dt_from from7">
					</div>
				</div>
				<div class="col-sm-2 common-bottom">
					<div class="sun_Div_Input">
					<label>To</label>
					<input type="text" name="dt_to[]" class="form-control input-field dt_to to7">
					</div>
				</div>
				<div class="col-sm-1 common-bottom">
					<div class="sun_Div_Input">
					<label>Count</label>
					<input type="number" name="hr_count[]" class="form-control input-field count7">
					</div>
				</div>
				</div>
			</div>
		</div>
			<div class="row common-bottom">
				<div class="col-sm-1" style="margin-bottom: 30px;">
					<label>Unavailable Days</label>
					<input type="checkbox" name="" class="center-block unavail" >
					<input type="hidden" name="days[]" class="unavailHideInput" value="unavail_off">
				</div>
				<div class="unavail_Wrap">
				<div class="col-sm-2 common-bottom">
					<div class="unavail_Div_Input">
					<label>From</label>
					<input type="text" name="dt_from[]" class="form-control input-field dateFrom from8">
					</div>
				</div>
				<div class="col-sm-2 common-bottom">
					<div class="unavail_Div_Input">
					<label>To</label>
					<input type="text" name="dt_to[]" class="form-control input-field dateTo to8">
					</div>
				</div>
				<div class="col-sm-1 common-bottom">
					<!-- <div class="unavail_Div_Input">
					<label>Count</label>
					<input type="number" name="hr_count[]" class="form-control input-field">
					</div> -->
				</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
				<input type="submit" name="" value="Submit" class="form-control btn btn-primary">
				</div>
			</div>
		</fieldset>
		</form>
		<div style="margin-bottom: 50px;"></div>
	</div>
</div>

<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	