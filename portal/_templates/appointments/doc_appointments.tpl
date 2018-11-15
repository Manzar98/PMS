{include file="header.tpl"} 

<div id="content" class="clientWrap">
	<input type="hidden" name="" value="{$exist_appoint}" id="exist_appoint">
	{if isset($printslip) && $printslip}
	<div class="appoint_Wrap"> 

		<div class="common-bottom text-center" style="margin-bottom: 40px;">
			<h4><b>APPOINTMENT CONFIRMATION</b></h4>
		</div>
		<div class="noprint btnW">
			<input type="button"class="btn btn-primary printBtn pull-right" value="Print" id="printPrescription">
		</div>
		<div class="row common-bottom">
			<div class="col-sm-10">
				<div class="ac">
					<span><b>Patient Name : </b><span>{$printslip.name}</span></span>
				</div>
				<div class="ac">

					<span><b>Patient Id : </b><span>{$printslip.pat_id}</span></span>
					
				</div>
				<div class="ac">
					{foreach from=$cities item=city}
					{if $printslip.city_id==$city.id}
					<span><b>City : </b><span>{$city.name}</span></span>
					{/if}
					{/foreach}
				</div> 
				<div class="ac">
					<span><b>Address : </b><span>{$printslip.address}</span></span>
				</div>
				<div class="ac">
					<span><b>Mobile No : </b><span>{$printslip.mobile}</span></span>
				</div>
				<div class="ac">
					<span><b>Gender : </b><span>{$printslip.gender}</span></span>
				</div>
				<div class="ac"><span><b>Email : </b><span>{$printslip.email}</span></span></div>
			</div>
			<div class="col-sm-2">
				<div width="100" height="100" style="border: 1px solid;"></div>
			</div>
		</div>
		<div class="row common-bottom bor">
			<div class="col-sm-8">
				<div class="common-bottom common-top">
					<span class="common-bottom"><b>Appointment No : </b><span>{$printslip.ap_number}</span></span>
				</div>
				<div class="common-bottom">
					<span class="common-bottom"><b>Appointment Date : </b><span>{$printslip.ap_date}</span></span>
				</div>
				<div class="common-bottom">
					<span class="common-bottom"><b>Appointment Time : </b><span>{$printslip.ap_time}</span></span>
				</div>
			</div>
			<div class="col-sm-4 ">
				<div class="docInfo">
					<div class="common-bottom">
						<span class="doci"><b>Doctor's Name : </b><span>{$printslip.doc_name}</span></span>
					</div>
					<div class="common-bottom">
						<span class="doci"><b>Clinic Phone Number: </b><span>{$printslip.doc_phne}</span></span> 
					</div>
					<div class="common-bottom">
						<span class="doci" ><b>Clinic Address : </b><span>{$printslip.doc_adr}</span></span>
					</div>
				</div> 
			</div>
		</div>
		<div class="note" style=" " >
			<p class="text-center common-bottom not_p">
				Note: Please reach the clinic on time otherwise your appointment would be cancelled.
			</p>
			<p class="text-center doci">idoctor.pk</p>
		</div>
	</div>
	{elseif isset($record) && record}

	<div class="alertWrap" title="Errors"></div>
	<form id="add_user" class="box style" action="{$smarty.server.REQUEST_URI}" method="post">
		<fieldset>
			<legend>Appointments</legend>
			<div>
				<input type="hidden" name="doc_name" value="{$smarty.get.doc_name}" id="doc_name">
				<input type="hidden" name="doc_adr" value="{$smarty.get.doc_adr}" id="doc_adr">
				<input type="hidden" name="doc_phne" value="{$smarty.get.doc_phne}" id="doc_phne">
				<input type="hidden" name="u_id" value="{$smarty.get.doc_id}" id="id"> 
				<input type="hidden" name="" value="{$unavail}" id="unavail"> 
				<input type="hidden" name="p_id" value="" id="" placeholder="For Condition true(input for condition only)"> 
				<input type="hidden" name="" value="{$from}" id="from"> 
				<input type="hidden" name="" value="{$to}" id="to">
				<input type="hidden" name="ap_number" id="ap_number"> 
				<input type="hidden" name="security_key" id="security_key" value="{$record.security_key}">
				<input type="hidden" name="" id="res_error" value="{$res_error}">
				<input type="hidden" name="name" id="" value="{$record.name}">
				<input type="hidden" name="patient_Id" id="" value="{$record.id}">
				<input type="hidden" name="address" id="" value="{$record.address}">
				<input type="hidden" name="mobile" id="" value="{$record.mobile}">
				<input type="hidden" name="gender" id="" value="{$record.gender}">
				<input type="hidden" name="email" id="" value="{$record.email}">
				<input type="hidden" name="online_manual" id="online_manual" value="manual">
				{foreach from=$cities item=city}
				{if $record.city_id==$city.id}
				<input type="hidden" name="city" id="" value="{$city.id}">
				{/if}
				{/foreach}

			</div>
			<div class="row">
				<div class="col-sm-3">
					<label for="dt" class="">Select Date</label>
					<input type="text" name="dt" id="dt" class="dt form-control" />
				</div>
				<div class="col-sm-3 common-bottom ">
					<div class="hideHr">
						<label for="hour">Select Hour</label>
						<input type="text" name="hour" id="hour" class="form-control"/>
					</div>
				</div>
				<div class="col-sm-3">
					<div style="margin-top: 24px;">
						<input type="submit" name="submit" id="submit" value="{if (isset($edit) && $edit )} Update{else} Add{/if}" class="btn btn-primary" />
					</div>
				</div>
			</div>

		</fieldset>
	</form>
	{elseif isset($smarty.get.exist)}

	<input type="hidden" name="" value="{$erorMsg}" id="errorId">
	<form id="check_patient" class="box style" action="{$smarty.server.REQUEST_URI}" method="post">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-6">
				<input type="hidden" name="doc_id" id="doc_id" class="doc_id form-control" value="{$smarty.get.doc_id}"/>
				<input type="hidden" name="doc_name" id="doc_name" class="doc_name form-control" value="{$smarty.get.doc_name}" />
				<label for="dt" class="">Patient Id</label>
				<input type="text" name="p_id" id="p_id" class="p_id form-control" />
			</div>
			<div class="col-sm-1" style="padding-top: 24px;">
				<input type="submit" class="btn btn-primary" value="Search" />
			</div>
			<div class="" style="padding-top: 24px;">
				<a href="{$BASE_URL_ADMIN}doc-appointments/{$smarty.get.doc_id}?doc_name={$smarty.get.doc_name}&doc_adr={$smarty.get.doc_adr}&doc_phne={$smarty.get.doc_phne}" class="btn btn-primary">New Patient</a>
			</div>
		</div>
	</form>
	{else}

	<div class="alertWrap" title="Errors"></div>
	<form id="add_user" class="box style" action="{$smarty.server.REQUEST_URI}" method="post">
		<fieldset>
			<legend>Appointments</legend>
			<input type="hidden" name="doc_name" value="{$smarty.get.doc_name}" id="doc_name">
			<input type="hidden" name="doc_adr" value="{$smarty.get.doc_adr}" id="doc_adr">
			<input type="hidden" name="doc_phne" value="{$smarty.get.doc_phne}" id="doc_phne">
			<input type="hidden" name="u_id" value="{$id}" id="id"> 
			<input type="hidden" name="" value="{$unavail}" id="unavail"> 
			<input type="hidden" name="" value="{$from}" id="from"> 
			<input type="hidden" name="" value="{$to}" id="to">
			<input type="hidden" name="ap_number" id="ap_number"> 
			<input type="hidden" name="security_key" id="security_key">
			<input type="hidden" name="" id="res_error" value="{$res_error}">
			<input type="hidden" name="online_manual" id="online_manual" value="manual">
			<div class="row">
				<div class="col-sm-3 common-bottom">
					<label for="name">Patient Name</label>
					<input type="text" name="name" id="name" maxlength="50" class="form-control" onclick="generateRandomNumber()"/>
				</div>
				<div class="col-sm-3 common-bottom">
					<label for="gender">Gender</label>
					<select name="gender" id="gender" class="form-control">
						<option value="male" {if $data.gender =='male'} selected="selected" {/if}>Male</option>
						<option value="female" {if $data.gender =='female'} selected="selected" {/if}>Female</option>
						<option value="other" {if $data.gender =='other'} selected="selected" {/if}>Other</option>
					</select>
				</div>
				<div class="col-sm-3 common-bottom">
					<label for="dob">Date of Birth</label>
					<input type="text" name="dob" id="dob" value="{$data.dob}" autocomplete="off" class="form-control"/>
				</div>
				<div class="col-sm-3 common-bottom">
					<label for="marital_status">Marital Status</label>
					<select name="marital_status" id="marital_status" class="form-control"><!-- 
						<option value="-1"  selected="" disabled="">Select Status</option> -->
						<option value="married">Married</option>
						<option value="unmarried" >Unmarried</option>
						<option value="widow">Widow</option>
						<option value="divorced">Divorced</option>
						<option value="seperated">Seperated</option>
					</select> 
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 common-bottom">
					<label for="mobile">Mobile</label>
					<input type="text" name="mobile" id="mobile" value="{$data.mobile}" maxlength="50" class="form-control"/>
				</div>
				<div class="col-sm-3 common-bottom">
					<label for="city">City</label>
					<select name="city" id="city" class="form-control">
						<option value="">Select City</option>
						{foreach from=$cities item=city}
						<option {if $data.city==$city.id} selected="selected" {/if} value="{$city.id}">{$city.name}</option>
						{/foreach}						
					</select>
				</div>
				<div class="col-sm-3 common-bottom">
					<label for="address">Address</label>
					<textarea  name="address" id="address" class="form-control">{$data.address}</textarea>
				</div>
				<div class="col-sm-3 common-top">
					<label for="email">Email Address</label>
					<input type="email" name="email"
					id="email" class="form-control">
				</div>
				
			</div>
			<div class="row">
				<div class="col-sm-3">
					<label for="dt" class="">Select Date</label>
					<input type="text" name="dt" id="dt" class="dt form-control" />
				</div>
				<div class="col-sm-3 common-bottom ">
					<div class="hideHr">
						<label for="hour">Select Hour</label>
						<input type="text" name="hour" id="hour" class="form-control"/>
					</div>
				</div>
				<div class="col-sm-3">
					<div style="margin-top: 24px;">
						<input type="submit" name="submit" id="submit" value="{if (isset($edit) && $edit )} Update{else} Add{/if}" class="btn btn-primary" />
					</div>
				</div>
			</div>
		</fieldset>
	</form>
	{/if} 
</div><!-- #content -->

<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
{literal}
<script type="text/javascript">
	$('.hideHr').hide();
	$(document).ready(function()
	{
		$("#check_patient").validate({
			rules:{
				p_id:{required: true},
			}
		});
		if ($('#errorId').val()) {
			alert($('#errorId').val());
		}

		if ($('#exist_appoint').val()) {

			alert($('#exist_appoint').val());
			$('#exist_appoint').val('');
		}else{
			
		$('#exist_appoint').val('');
}

		$("#printPrescription").click(function(){
			
			window.print();
		});

		$("#dt").attr("readonly","readonly");

		if ($('#res_error').val()) {
			debugger
			var responseArray = "";
			$.each($('#res_error').val().split(','),function(k,val){
				debugger
				responseArray += "<li style='color:red;'><i class='fa fa-times errordialog_x' aria-hidden='true' style='padding-right:10px;'></i>"+val+"</li>";
			})
			$('.alertWrap').html("<ul class='responseDialog' style='list-style: none;padding: 0px;font-size: 14px;'>"+responseArray+"</ul>") ;    
			$('.alertWrap').dialog();

			$('.alertWrap').on('dialogclose', function(event) {
				history.go(-1); 
			});
		}
		$("#add_user").validate({
			rules: {
				hour: { required: true },
				dt: { required: true },
			}
		});
		// $('.docWrap').remove();
		var unavail=  $('#unavail').val().split(',');
		var fromDate=  $('#from').val().split(',');
		var toDate=  $('#to').val().split(',');
		var today = new Date();
		var doc_id= $('#id').val();
		debugger
		var selected_Date="";
		var count="";
		$('#dt').trigger('click');


		if (unavail[7]==="on") {

			var check_in = [[fromDate[7], toDate[7]]];
			$('.dt').datepicker({
				dateFormat: 'yy-mm-dd',
				changeMonth: true,
				changeYear: true,
				minDate: today,
				beforeShowDay: function(date) {
					var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
					for (var i = 0; i < check_in.length; i++) {
						if (Array.isArray(check_in[i])) {
							var from = new Date(check_in[i][0]);
							var to = new Date(check_in[i][1]);
							var current = new Date(string);
							if (current >= from && current <= to) return false;
						}
					}
					return [check_in.indexOf(string) == -1]
				}
			});

		}else{

			var weekday=new Array(7);
			weekday[0]="Sun_on";
			weekday[1]="mon_on";
			weekday[2]="Tue_on";
			weekday[3]="Wed_on";
			weekday[4]="Thu_on";
			weekday[5]="Fri_on";
			weekday[6]="Sat_on";
			
			$( ".dt" ).datepicker({
				dateFormat : "yy-mm-dd",
				changeMonth: true,
				changeYear: true,
				minDate: today,
				onSelect: function(dateText, inst) {
					var date = $(this).datepicker('getDate');
					selected_Date=$('.dt').val();
					var dayOfWeek = weekday[date.getUTCDay()];
  // dayOfWeek is then a string containing the day of the week
  $.ajax({
  	type: "POST",
  	url: "{/literal}{$BASE_URL_ADMIN}doc-appointments/add?ajax=y{literal}",
  	data: "d_Str=" + dayOfWeek +"&doc_id="+doc_id ,
  	success: function(msg) 
  	{
  		debugger
  		$('#hour').timepicker('remove');
  		var time_st="";
  		var time_end="";
  		if (msg!="") {
  			$('.hideHr').show();
  			var res=JSON.parse(msg);
  			time_st=res.start;
  			time_end=res.end;
  			count=res.count;
  			$("#hour").timepicker({
  				
  				step: 60,
  				timeFormat: 'h:i A',
  				dynamic: false,
  				dropdown: true,
  				scrollbar: true,
  				disableTextInput: true,
  				minTime: time_st,
  				maxTime:  time_end
  			});

  		}else{   
  			$('.hideHr').hide();
  			alert("Doctor is not available on the selected date.");
  			$('#dt').val('');
  		}
  	}
  });
}
});		

		}

		$('#hour').on("change",function(){
			var hr = $('#hour').val();
                  // debugger;
                  $.ajax({ 
                  	type: "POST",
                  	url: "{/literal}{$BASE_URL_ADMIN}doc-appointments/add?appoint=y{literal}",
                  	data: "ap_time=" + hr +"&ap_date="+selected_Date+"&doc_id="+doc_id ,
                  	success: function(msg) 
                  	{
                  		debugger
                  		$('#ap_number').val(+msg + +1);

                  		if (msg >count) {

                  			$('#hour').val('');
                  			$('#hour').timepicker('hide');
                  			alert("The selected hour's slot if full, please choose another time.");

                  		}
                  	}
                  });

              });

		$( "#dob" ).datepicker({
			yearRange: "-100:+0",
			dateFormat : "yy-mm-dd",
			changeMonth: true,
			changeYear: true
		});


	});

function generateRandomNumber(){

	var d=new Date();
	var n=d.getTime();
	n = n.toString()
	m=n.substring(9,14)
	$('#security_key').val(m);
}


</script>
{/literal}

{include file="footer.tpl"}