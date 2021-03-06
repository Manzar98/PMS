{include file="header.tpl"}
<!-- <link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/clockpicker.css" /> -->
<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/timedropper.css" /> 
<div id="" class="content-wrapper">
	<div class="container-fluid checkboxWrap">
		<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Date & Time</li>
				
			</ol>
		</div>
		{if (isset($smarty.session.flashAlert))}
		<div class="fail text-center ">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{$smarty.session.flashAlert}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="{php} unset($_SESSION['flashAlert']); {/php}">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>		
		</div>
		{/if}
		<h2 class="pt-3">Date & Time Settings</h2>
		<form class="box" action="{$smarty.server.REQUEST_URI}" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Date & Time</legend>
				<input type="hidden" name="" value="{$days}" id="daysList">
				<input type="hidden" name="" value="{$from}" id="fromList">
				<input type="hidden" name="" value="{$to}" id="toList">
				<input type="hidden" name="" value="{$count}" id="countList">
				<div class="daysWrap">
					<div class="row mx-auto clear-fix">
						<div class="col-sm-1"></div>
						<div class="col-sm-2" style="margin-bottom: 44px;">
							<div class="form-group">
								<div class="form-check">
									<label class="m_lbl days_lbl">Monday</label>
									<input type="checkbox" name="" class="center-block mon form-check-input">
									<input type="hidden" name="days[]" class="mondayHideInput" value="mon_off">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="mon_Div_Input form-group">
								<label>From</label>
								<input type="text" name="dt_from[]" class="form-control input-field dt_from from1" value="">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="mon_Div_Input form-group">
								<label>To</label>
								<input type="text" name="dt_to[]" class="form-control input-field dt_to to1">
							</div>
						</div>
						<div class="col-sm-2">
							<div class="mon_Div_Input form-group">
								<label>Count</label>
								<input type="number" name="hr_count[]" class="form-control input-field count1">
							</div>
						</div>
					</div>
					<div class="row mx-auto clear-fix">
						<div class="col-sm-1"></div>
						<div class="col-sm-2" style="margin-bottom: 44px;">
							<div class="form-group">
								<div class="form-check">
									<label class="tu_lbl days_lbl">Tuesday</label>
									<input type="checkbox" name="" class="center-block tue form-check-input">
									<input type="hidden" name="days[]"  value="tue_off" class="tuesdayHideInput">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="tue_Div_Input form-group">
								<label>From</label>
								<input type="text" name="dt_from[]" class="form-control input-field dt_from from2">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="tue_Div_Input form-group">
								<label>To</label>
								<input type="text" name="dt_to[]" class="form-control input-field dt_to to2">
							</div>
						</div>
						<div class="col-sm-2">
							<div class="tue_Div_Input form-group">
								<label>Count</label>
								<input type="number" name="hr_count[]" class="form-control input-field count2">
							</div>
						</div>
					</div>
					<div class="row  mx-auto clear-fix">
						<div class="col-sm-1"></div>
						<div class="col-sm-2" style="margin-bottom: 44px;">
							<div class="form-group">
								<div class="form-check">
									<label class="w_lbl days_lbl">Wednesday</label>
									<input type="checkbox" name="" class="center-block wed form-check-input" style="right: 57px;">
									<input type="hidden" name="days[]"  value="wed_off" class="wednesdayHideInput 
									">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="wed_Div_Input form-group">
								<label>From</label>
								<input type="text" name="dt_from[]" class="form-control input-field dt_from from3">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="wed_Div_Input form-group">
								<label>To</label>
								<input type="text" name="dt_to[]" class="form-control input-field dt_to to3">
							</div>
						</div>
						<div class="col-sm-2">
							<div class="wed_Div_Input form-group">
								<label>Count</label>
								<input type="number" name="hr_count[]" class="form-control input-field count3">
							</div>
						</div>
					</div>
					<div class="row mx-auto clear-fix">
						<div class="col-sm-1"></div>
						<div class="col-sm-2" style="margin-bottom: 44px;">
							<div class="form-group">
								<div class="form-check">
									<label class="th_lbl days_lbl">Thursday</label>
									<input type="checkbox" name="" class="center-block thu form-check-input">
									<input type="hidden" name="days[]"  value="thu_off" class="thursdayHideInput">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="thu_Div_Input form-group">
								<label>From</label>
								<input type="text" name="dt_from[]" class="form-control input-field dt_from from4">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="thu_Div_Input form-group">
								<label>To</label>
								<input type="text" name="dt_to[]" class="form-control input-field dt_to to4">
							</div>
						</div>
						<div class="col-sm-2">
							<div class="thu_Div_Input form-group">
								<label>Count</label>
								<input type="number" name="hr_count[]" class="form-control input-field count4">
							</div>
						</div>					
					</div>
					<div class="row mx-auto clear-fix">
						<div class="col-sm-1"></div>
						<div class="col-sm-2" style="margin-bottom: 44px;">
							<div class="form-group">
								<div class="form-check">
									<label class="f_lbl days_lbl">Friday</label>
									<input type="checkbox" name="" class="center-block fri form-check-input" style="right: 9px;">
									<input type="hidden" name="days[]"  value="fri_off" class="fridayHideInput">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="fri_Div_Input form-group">
								<label>From</label>
								<input type="text" name="dt_from[]" class="form-control input-field dt_from from5">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="fri_Div_Input form-group">
								<label>To</label>
								<input type="text" name="dt_to[]" class="form-control input-field dt_to to5">
							</div>
						</div>
						<div class="col-sm-2">
							<div class="fri_Div_Input form-group">
								<label>Count</label>
								<input type="number" name="hr_count[]" class="form-control input-field count5">
							</div>
						</div>
					</div>
					<div class="row mx-auto clear-fix">
						<div class="col-sm-1"></div>
						<div class="col-sm-2" style="margin-bottom: 44px;">
							<div class="form-group">
								<div class="form-check">
									<label class="st_lbl days_lbl">Saturday</label>
									<input type="checkbox" name="" class="center-block sat form-check-input">
									<input type="hidden" name="days[]"  value="sat_off" class="saturdayHideInput">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="sat_Div_Input form-group">
								<label>From</label>
								<input type="text" name="dt_from[]" class="form-control input-field dt_from from6">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="sat_Div_Input form-group">
								<label>To</label>
								<input type="text" name="dt_to[]" class="form-control input-field dt_to to6">
							</div>
						</div>
						<div class="col-sm-2">
							<div class="sat_Div_Input form-group">
								<label>Count</label>
								<input type="number" name="hr_count[]" class="form-control input-field count6">
							</div>
						</div>
					</div>
					<div class="row mx-auto clear-fix">
						<div class="col-sm-1"></div>
						<div class="col-sm-2" style="margin-bottom: 44px;">
							<div class="form-group">
								<div class="form-check">
									<label class="su_lbl days_lbl">Sunday</label>
									<input type="checkbox" name="" class="center-block sun form-check-input" style="right: 23px;">
									<input type="hidden" name="days[]" value="sun_off" class="sundayHideInput">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="sun_Div_Input form-group">
								<label>From</label>
								<input type="text" name="dt_from[]" class="form-control input-field dt_from from7">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="sun_Div_Input form-group">
								<label>To</label>
								<input type="text" name="dt_to[]" class="form-control input-field dt_to to7">
							</div>
						</div>
						<div class="col-sm-2">
							<div class="sun_Div_Input form-group">
								<label>Count</label>
								<input type="number" name="hr_count[]" class="form-control input-field count7">
							</div>
						</div>
					</div>
				</div>
				<div class="row mx-auto clear-fix">
					<div class="col-sm-1"></div>
					<div class="col-sm-2" style="margin-bottom: 44px;">
						<div class="form-group">
							<div class="form-check">
								<label class="un_lbl">Unavailable Days</label>
								<input type="checkbox" name="" class="center-block unavail form-check-input" >
								<input type="hidden" name="days[]" class="unavailHideInput" value="unavail_off">
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="unavail_Div_Input form-group">
							<input type="text" name="dt_from[]" id="actualFrom">
							<label>From</label>
							<input type="text" name="" class="form-control input-field dateFrom from8 datedropper" data-large-mode="true"  data-lang="en" data-min-year="2018" data-max-year="2020"  data-format="Y-m-d">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="unavail_Div_Input form-group">
							<input type="text" name="dt_to[]" id="actualTo">
							<label>To</label>
							<input type="text" name="" class="form-control input-field dateTo to8 datedropper" data-lang="en" data-min-year="2018" data-max-year="2020" data-large-mode="true" data-format="Y-m-d">
						</div>
					</div>
					<div class="col-sm-1">
						<div class="unavail_Div_Input form-group">
							<i class="fa fa-plus-square text-primary" aria-hidden="true" id="m_does"></i>
						</div>
					</div>
				</div>
				<div class="fieldsRenderingWrap">
					

				</div>
				<div class="row">
					<div class="col-sm-6 mx-auto">
						<input type="submit" name="" value="Submit" class="form-control btn btn-primary">
					</div>
				</div>
			</fieldset>
		</form>
		<div style="margin-bottom: 50px;"></div>
	</div>
</div>
{include file="footer.tpl"}	
<!-- <script src="{$BASE_URL_ADMIN}_templates/js/clockpicker.js" type="text/javascript"></script>  -->
<script src="{$BASE_URL_ADMIN}_templates/js/timedropper.js" type="text/javascript"></script> 
{literal}
<script type="text/javascript">
	
	$(document).ready(function()
	{

		$('.dt_from').prop('readonly',true);
		$('.dt_to').prop('readonly',true);
		$('.mon_Div_Input').hide();
		$('.tue_Div_Input').hide();
		$('.wed_Div_Input').hide();
		$('.thu_Div_Input').hide();
		$('.fri_Div_Input').hide();
		$('.sat_Div_Input').hide();
		$('.sun_Div_Input').hide();
		$('.unavail_Div_Input').hide();

		$('.mon').click(function(){
       //debugger;
       if ($('.mon').prop('checked')) {

       	$('.mon_Div_Input').show();
       	$('.mondayHideInput').val('mon_on');
       	$('.m_lbl').css('color','green');
       	$('.mon_Div_Input input').prop('required',true);
       	
       }else{

       	$('.mon_Div_Input').hide();
       	$('.mondayHideInput').val('mon_off');
       	$('.mon_Div_Input input').prop('required',false);
       	$('.mon_Div_Input input').val('');
       	$('.m_lbl').css('color','black');
       }
   })

		$('.tue').click(function(){
      // debugger;
      if ($('.tue').prop('checked')) {

      	$('.tue_Div_Input').show();
      	$('.tuesdayHideInput').val('tue_on');
      	$('.tu_lbl').css('color','green');
      	$('.tue_Div_Input input').prop('required',true);

      }else{

      	$('.tue_Div_Input').hide();
      	$('.tuesdayHideInput').val('tue_off');
      	$('.tue_Div_Input input').prop('required',false);
      	$('.tue_Div_Input input').val('');
      	$('.tu_lbl').css('color','black');
      }
  })

		$('.wed').click(function(){
       //debugger;
       if ($('.wed').prop('checked')) {

       	$('.wed_Div_Input').show();
       	$('.wednesdayHideInput').val('wed_on');
       	$('.w_lbl').css('color','green');
       	$('.wed_Div_Input input').prop('required',true);

       }else{

       	$('.wed_Div_Input').hide();
       	$('.wednesdayHideInput').val('wed_off');
       	$('.wed_Div_Input input').prop('required',false);
       	$('.wed_Div_Input input').val('');
       	$('.w_lbl').css('color','black');
       }
   })

		$('.thu').click(function(){
       //debugger;
       if ($('.thu').prop('checked')) {

       	$('.thu_Div_Input').show();
       	$('.thursdayHideInput').val('thu_on');
       	$('.th_lbl').css('color','green');
       	$('.thu_Div_Input input').prop('required',true);

       }else{

       	$('.thu_Div_Input').hide();
       	$('.thursdayHideInput').val('thu_off');
       	$('.thu_Div_Input input').prop('required',false);
       	$('.thu_Div_Input input').val('');
       	$('.th_lbl').css('color','black');

       }
   })

		$('.fri').click(function(){
       //debugger;
       if ($('.fri').prop('checked')) {

       	$('.fri_Div_Input').show();
       	$('.f_lbl').css('color','green');
       	$('.fri_Div_Input input').prop('required',true);

       }else{

       	$('.fri_Div_Input').hide();
       	$('.f_lbl').css('color','black');
       	$('.fri_Div_Input input').prop('required',false);
       	$('.fri_Div_Input input').val('');
       }
   })

		$('.sat').click(function(){
       //debugger;
       if ($('.sat').prop('checked')) {

       	$('.sat_Div_Input').show();
       	$('.st_lbl').css('color','green');
       	$('.sat_Div_Input input').prop('required',true);

       }else{

       	$('.sat_Div_Input').hide();
       	$('.st_lbl').css('color','black');
       	$('.sat_Div_Input input').prop('required',false);
       	$('.sat_Div_Input input').val('');
       }
   })

		$('.sun').click(function(){
       //debugger;
       if ($('.sun').prop('checked')) {

       	$('.sun_Div_Input').show();
       	$('.su_lbl').css('color','green');
       	$('.sun_Div_Input input').prop('required',true);

       }else{

       	$('.sun_Div_Input').hide();
       	$('.su_lbl').css('color','black');
       	$('.sun_Div_Input input').prop('required',false);
       	$('.sun_Div_Input input').val('');
       }
   })

		$('.unavail').click(function(){
       //debugger;
       if ($('.unavail').prop('checked')) {

       	$('.unavail_Div_Input').show();
       	$('.un_lbl').css('color','green');
       	$('.days_lbl').css('color','black');
       	$('.unavailHideInput').val('unavail_on');
       	$('.unavail_Div_Input input').prop('required',true);
       	
       }else{
       	$('.un_lbl').css('color','black');
       	$('.unavail_Div_Input').hide();
       	$('.unavailHideInput').val('unavail_off');
       	$('.unavail_Div_Input input').prop('required',false);
       	$('.unavail_Div_Input input').val('');
       	$('.daysWrap').find('input').prop('disabled',false);
       }
   })

		$('.dt_from').timeDropper({meridians:true,
	                               setCurrentTime:false});
		$('.dt_to').timeDropper({meridians:true,
	                               setCurrentTime:false});
		$('.dateTo').dateDropper();
		$('.dateFrom').dateDropper();

		$('.dateFrom').on("change",function(){
			var fromVals= []
			$.each($('.dateFrom'),function(){
                    // console.log(this.value)
                    fromVals.push(this.value);
                })
            	//debugger
            	$('#actualFrom').val(fromVals.toString())
            	//console.log(fromVals.toString());
            })
		$('.dateTo').on("change",function(){
			var toVals= [];
			$.each($('.dateTo'),function(){
                    // console.log(this.value)
                    toVals.push(this.value);
                })
            	//debugger
            	$('#actualTo').val(toVals.toString())
            })


		var days=$('#daysList').val().split(',');
		var froms=$('#fromList').val().split(',');
		var tos=$('#toList').val().split(',');
		var counts=$('#countList').val().split(',');

		for (var i = 0; i < days.length; i++) {
			console.log(days[i])
			if (days[i]=="mon_on") {

				$('.mon').prop('checked',true);
				$('.mon_Div_Input').show();
				$('.mondayHideInput').val('mon_on');
				$('.m_lbl').css('color','green');
				$('.from1').val(froms[i]);
				$('.to1').val(tos[i]);
				$('.count1').val(counts[i]);

			}
			if (days[i]=="tue_on") {
				
				$('.tue').prop('checked',true);
				$('.tue_Div_Input').show();
				$('.tu_lbl').css('color','green');
				$('.tuesdayHideInput').val('tue_on');
				$('.from2').val(froms[i]);
				$('.to2').val(tos[i]);
				$('.count2').val(counts[i]);
			}
			if (days[i]=="wed_on") {

				$('.wed').prop('checked',true);
				$('.wed_Div_Input').show();
				$('.w_lbl').css('color','green');
				$('.wednesdayHideInput').val('wed_on');
				$('.from3').val(froms[i]);
				$('.to3').val(tos[i]);
				$('.count3').val(counts[i]);

			}
			if (days[i]=="thu_on") {
				
				$('.thu').prop('checked',true);
				$('.thu_Div_Input').show();
				$('.th_lbl').css('color','green');
				$('.thursdayHideInput').val('thu_on');
				$('.from4').val(froms[i]);
				$('.to4').val(tos[i]);
				$('.count4').val(counts[i]);
			}
			if (days[i]=="fri_on") {

				$('.fri').prop('checked',true);
				$('.fri_Div_Input').show();
				$('.f_lbl').css('color','green');
				$('.fridayHideInput').val('fri_on');
				$('.from5').val(froms[i]);
				$('.to5').val(tos[i]);
				$('.count5').val(counts[i]);
			}
			if (days[i]=="sat_on") {

				$('.sat').prop('checked',true);
				$('.sat_Div_Input').show();
				$('.st_lbl').css('color','green');
				$('.saturdayHideInput').val('sat_on');
				$('.from6').val(froms[i]);
				$('.to6').val(tos[i]);
				$('.count6').val(counts[i]);
				
			}
			if (days[i]=="sun_on") {
				
				$('.sun').prop('checked',true);
				$('.sun_Div_Input').show();
				$('.su_lbl').css('color','green');
				$('.sundayHideInput').val('sun_on');
				$('.from7').val(froms[i]);
				$('.to7').val(tos[i]);
				$('.count7').val(counts[i]);
				
			}
			if (days[i]=="unavail_on") {
				
				$('.unavail').prop('checked',true);
				$('.unavail_Div_Input').show();
				$('.un_lbl').css('color','green');
				$('.unavailHideInput').val('unavail_on');
				$('.from8').val(froms[i]);
				$('.to8').val(tos[i]);
			}
		}
		var max_fields      = 5;
		var wrapper    = $(".fieldsRenderingWrap");
		var x = 1; 
		$('#m_does').click(function(e){
			e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append(`<div class="row mx-auto clear-fix mainWrap"><div class="col-sm-3"></div><div class="col-sm-3">
            	<div class="unavail_Div_Input form-group">
            	<label>From</label>
            	<input type="text" name="" class="form-control input-field dateFrom from8" data-format="Y-m-d">
            	</div>
            	</div>
            	<div class="col-sm-3">
            	<div class="unavail_Div_Input form-group">
            	<label>To</label><i class="fa fa-times remove_field pull-right" aria-hidden="true"></i>
            	<input type="text" name="" class="form-control input-field dateTo to8" data-format="Y-m-d">
            	</div>
					</div><div class="col-sm-1"></div></div>`); //add input box

            $('.remove_field').on("click",function(e){
            	e.preventDefault(); 
            	$(this).parents('.mainWrap').remove(); x--;
            })
            $('.dateTo').dateDropper();
            $('.dateFrom').dateDropper();

            $('.dateFrom').on("change",function(){
            	var fromVals= []
            	$.each($('.dateFrom'),function(){
                    // console.log(this.value)
                    fromVals.push(this.value);
                })
            	//debugger
            	$('#actualFrom').val(fromVals.toString())
            	//console.log(fromVals.toString());
            })
            $('.dateTo').on("change",function(){
            	var toVals= [];
            	$.each($('.dateTo'),function(){
                    // console.log(this.value)
                    toVals.push(this.value);
                })
            	//debugger
            	$('#actualTo').val(toVals.toString())
            })

        } 


        $('.dateTo').change(function(){

        	debugger
        })



    })
		

 // $(wrapper).on("click",".remove_field", function(e){ //user click on remove text

	//  })

});
</script>
<style type="text/css">

input[type="checkbox"]{
	margin: 0 auto !important;
}
.daysWrap input[type="checkbox"] {
	position: relative;
	top: 40px;
	right: 35px;
}
.unavail{
	position: relative;
	top: 40px;
	left: -86px;
}
#m_does{
	font-size: 30px;
	margin-top: 35px;
	cursor: pointer;
}
.remove_field{
	cursor: pointer;
}
</style>
{/literal}