{include file="header.tpl"}

{literal}
<script>

	$(function() {
		$( "#next_date" ).datepicker({
			dateFormat : "yy-mm-dd",
			changeMonth: true,
		});
	});


	function PatientLookUp(q)
	{
		var field = $("#field").val();
		$.ajax({
			type: "POST",
			url: "{/literal}{$BASE_URL_ADMIN}add-prescription/suggest-patients/{literal}",
			data: "q=" + q + "&field="+field,
			success: function(msg) 
			{
				if(msg!="")
				{
					$("#suggestion").show();
					$("#suggestion").html(msg);
				}
			}
		});
	}



	function GetMedicineInstruction(medicine)
	{
		var medicine_id = medicine.value;
		$.ajax({
			type: "POST",
			url: "{/literal}{$BASE_URL_ADMIN}add-prescription/get-medicine-instructions/{literal}",
			data: "medicine_id=" + medicine_id,
			success: function(msg) 
			{

				$('.medicine_instruction').html(msg);

			}
		});
	}
	function GetTestOptions(test)
	{
		var test_id = test.value;

		$.ajax({
			type: "POST",
			url: "{/literal}{$BASE_URL_ADMIN}add-prescription/get-test-options/{literal}",
			data: "test_id=" + test_id,
			success: function(msg) 
			{
				$('.test_options').html(msg);          
			}
		});
	}

	function SelectPatient(thisValue)
	{
		if(thisValue)
		{
			$("#patient_id").val(thisValue);
			$("#suggestion").hide();
		}

	}

	function remove_instruction(element,id)
	{
		$.ajax({
			type: "POST",
			url: "{/literal}{$BASE_URL_ADMIN}edit-prescription/remove-instruction/{literal}",
			data: "id=" + id,
			success: function(msg) 
			{
				debugger;
				if(msg=='1')
				{
					$(element).parents('tr').remove();
				}
				else
				{
					alert("some error occurred");
				}
			}
		});
	}
	function remove_test(element,id)
	{
		$.ajax({
			type: "POST",
			url: "{/literal}{$BASE_URL_ADMIN}edit-prescription/remove-test-option/{literal}",
			data: "id=" + id,
			success: function(msg) 
			{

				if(msg=='1')
				{
					$(element).parents('tr').remove();
				}
				else{
					alert("some error occurred");
				}

			}
		});
	}		
	$(document).ready(function(){
		var test_count = 0;
		var medicine_count = 0;

		var medicines = '{/literal}<select name="medicine_name[]">{foreach from=$medicines item=m}<option value="{if isset($m.medicine_id)}{$m.medicine_id}{/if}">{$m.name}({$m.formula})</option>{/foreach}</select>{literal}';


		$("#add_instruction").on("click", function(){

			medicine_count = medicine_count + 1;

			var medicine_id = $("#medicine").val();
			var medicine_name = $("#medicine option:selected").text();

			var instruction_id = $(".medicine_instruction").val();
			var instruction_name = $(".medicine_instruction :selected").text();

			var custom_instruction = $("#custom_instruction").val();
       debugger
			if(custom_instruction!="")
			{
debugger
				$.ajax({
					type: "POST",
					url: "{/literal}{$BASE_URL_ADMIN}add-prescription/add-instruction/{literal}",
					data: "medicine_id=" + medicine_id + "&instruction="+custom_instruction,
					success: function(msg) 
					{
						console.log(msg);
                       debugger
						if(parseInt(msg)>0)
						{
							instruction_id = msg;
						}
						var instruction_data = '<input type="hidden" name="instructions['+medicine_count+'][medicine_id]" value="' + medicine_id + '"/> <input type="hidden" name="instructions['+medicine_count+'][instruction_id]" value="'+ instruction_id+'"  /><input type="hidden" name="instructions['+medicine_count+'][is_instructionChange]" value="true"  /> ';
						var instruction ='<tr> <td>' + medicine_name + '</td><td>' + custom_instruction + '</td> <td><span class="close">X</span></td>'+instruction_data+' </tr>';					debugger;
						$("#instructions").show();
						$("#instructions table").append(instruction);
						$("#custom_instruction").val('');

$("#instructions").find('.close').on("click", function(){
			$(this).parents('tr').remove();
		});

					}	
				});

			}
			else
			{
				var instruction_data = '<input type="hidden" name="instructions['+medicine_count+'][medicine_id]" value="' + medicine_id + '"/> <input type="hidden" name="instructions['+medicine_count+'][instruction_id]" value="'+ instruction_id+'"  /><input type="hidden" name="instructions['+medicine_count+'][is_instructionChange]" value="true"  /> ';
				var instruction ='<tr> <td>' + medicine_name + '</td><td>' + instruction_name + '</td><td><span class="close">X</span></td>'+instruction_data+' </tr>';					
				$("#instructions").show();
				$("#instructions table").append(instruction);

				$("#instructions").find('.close').on("click", function(){
			$(this).parents('tr').remove();
		});
			}


		});

		$("#instructions").find('.close').on("click", function(){
			$(this).parents('tr').remove();
		});



		$("#add_test").on("click", function(){

			test_count = test_count + 1;

			var test_id = $("#test_name").val();
			var test_name = $("#test_name :selected").text();

			var option_id = $(".test_options").val();
			var option_name = $(".test_options :selected").text();

			var test_result = $("#test_result").val();

			if(option_name!="")
			{

				var test_data = '<input type="hidden" name="test['+test_count+'][test_id]" value="' + test_id + '"/> <input type="hidden" name="test['+test_count+'][option_id]" value="'+ option_id +'" /> <input type="hidden" name="test['+test_count+'][result]" value="'+ test_result +'" /><input type="hidden" name="test['+test_count+'][is_TestChange]" value="true" />';
				var test ='<tr> <td>' + test_name + '</td><td>' + option_name + '</td> <td> '+ test_result+' </td> <td><span class="close">X</span></td>'+test_data+' </tr>';					
				$("#test_table").show();
				$("#test_table table").append(test);
				$("#test_table td .close").on("click", function(){
					$(this).parents('tr').remove();
				});	


			}


		});


		$("#add_patient").click(function(){
			$("#add_new_patient").toggle();
		});


		$("#submit_patient").click(function(){

			patient_name = $("#name").val();
			mobile_number = $("#mobile_number").val();
			city = $("#city").val();
			var	s_key = $("#security_key").val();
			var	email = $("#email").val();


			if(patient_name !="" && mobile_number !="")
			{
				$.ajax({
					type: "POST",
					url: "{/literal}{$BASE_URL_ADMIN}add-prescription/add-patient/{literal}",
					data: "name="+patient_name+"&mobile_number="+mobile_number+"&city_id="+city+"&security_key="+s_key+"&email="+email,
					success: function(msg) 
					{
						if(msg>0)
						{
							$('#patient_id').val(msg);
							$("#add_new_patient").hide();
						}
						else
						{
							alert('Some Error Occured');
						}
					}
				});
			}
			else
			{
				alert("please Enter name and phone");
			}
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
<div id="content">
	<div class="container-fluid">
		<h2>Edit Prescription</h2>

		{if isset($errors)}
		<div class="fail">
			{foreach from=$errors item=error}
			{$error}
			{/foreach}
		</div>
		{/if}
		<!-- {$edit|@print_r} -->

		<form class="box style" action="{$smarty.server.REQUEST_URI}" method="get" enctype="multipart/form-data">
			<fieldset >
				<legend>Search Patient</legend>
				<div class="row">
					<div class="col-md-3 col-sm-12 search-top">
						<select name="field" id="field" onchange="PatientLookUp(document.getElementById('q').value)" class="form-control">
							<option value="id" {if (isset($data.field) && $data.field=='id')} selected="selected" {/if}>Patient ID</option>
							<option value="name" {if (isset($data.field) && $data.field=='name')} selected="selected" {/if}>Patient Name</option>
							<option value="mobile" {if (isset($data.field) && $data.field=='mobile')} selected="selected" {/if}>Mobile No</option>
							<option value="phone" {if (isset($data.field) && $data.field=='phone')} selected="selected" {/if}>Phone No</option>
						</select>
					</div>
					<div class="col-md-3 col-sm-12 search-top">
						<input type="text" name="q" id="q" {if isset($data.q)}value="{$data.q}"{/if} maxlength="20" onkeyup="PatientLookUp(this.value)" class="form-control" />
					</div>
					<!-- <div class="col-md-3 col-sm-12 search-top">
						<input type="submit" value="Search" id="submit" class="btn btn-primary" />
					</div> -->
				</div>
			</fieldset>
		</form>
		<div id="suggestion">
			
		</div>	
		<form id="add_prescription" class="box style" action="{$smarty.server.REQUEST_URI}" method="post">
			<fieldset>
				<legend>Patient Information</legend>
				<div class="row">
					<div class="col-sm-3">
						<label for="patient_id">Patient Id</label>
						<input type="text" class="form-control input-field" name="patient_id" id="patient_id" readonly="readonly" {if (isset($data) && $data.patient_id)}value="{$data.patient_id}"{/if} />
					</div>

					<div class="col-sm-2 addNewBtn">
						<a id="add_patient" href="javascript:void(0)">Add New Patient</a>
					</div>
				</div>

				<div class="row">
					<div id="add_new_patient" style="display: none; clear:both;">
						<input type="hidden" name="security_key" id="security_key">
						<div class="col-sm-3 common-top">
							<label for="name">Name</label>
							<input type="text" class="input-field form-control" id="name" name="name"/>
							
						</div>
						<div class="col-sm-3 common-top">
							<label for="mobile_number">Phone</label>
							<input type="text" class="form-control" name="mobile_number" id="mobile_number" />
							
						</div>
						<div class="col-sm-3 common-top">
							<label for="city">City</label>
							<select name="city" id="city" class="form-control">
								{foreach from=$cities item=city}

								<option {if (isset($data) && $data.city_id==$city.id)} selected="selected" {/if} value="{$city.id}">{$city.name}</option>

								{/foreach}						
							</select>
						</div>
						<div class="col-sm-2 common-top">
							<label for="email">Email Address</label>
							<input type="email" name="email"
							id="email" class="form-control">
						</div>
						<div class="col-sm-1 addUp_btn">
							<input type="button"  class="btn btn-primary" id="submit_patient" value="Add" />
						</div>				
					</div>
				</div>
			</fieldset>	

			<div id="accordion">

				<fieldset id="medicines">

					<legend>Medicine</legend> 

					<div class="row">
						<div class="col-md-3 common-top">
							<label>Medicine</label>
							<select id="medicine" onchange="GetMedicineInstruction(this)" class="form-control">
								<option value="" disabled="" selected="">Select Medicine First</option>
								{foreach from=$medicines item=m}
								<option value="{$m.id}">{$m.name} ({$m.dose})</option>
								{/foreach}	
							</select>
						</div>
						<div class="col-md-3 common-top">
							<label>Instruction</label>
							<select class="medicine_instruction form-control" >

							</select>
						</div>
						<div class="col-md-3 common-top">
							<label>Custom Instruction</label>
							<input type="text" id="custom_instruction" class="form-control" />

						</div>
						<div class="col-sm-3 addUp_btn">
							<input type="button" name="add_instruction" id="add_instruction" value="Add" class="btn btn-primary" />
						</div>
					</div>
				</fieldset>
				
				<div id="medicines">
					<div style="clear:both;" id="instructions">
						<table class="table table-striped half-tbl" >
							<tr class="" style="background-color: #000;color:#fff;">
								<td>Medicine Name</td>
								<td>Instruction</td> 
								<td></td>
							</tr>
							{foreach from=$data.instructions item=ins}
                             {$ins.medicine_id}
							<tr>
								<td>{$ins.name} ({$ins.formula})</td>
								<td>{$ins.instruction}</td>
								<td><span class="remove" onclick="remove_instruction(this,{$ins.pid})">X</span></td>

								<input type="hidden" name="instructions[1][medicine_id]" value="{$ins.medicine_id}">
								<input type="hidden" name="instructions[1][instruction_id]" value="{$ins.id}">

							</tr>
							{/foreach}
						</table>
					</div>
				</div>

				<fieldset id="tests">
					<legend>Tests</legend>
					<div class="row">
						<div class="col-sm-3 common-top">
							<label>Test Name</label>
							<select id="test_name" onchange="GetTestOptions(this)" class="form-control">
								<option value="" disabled="" selected="">Select Test</option>
								{foreach from=$test_list item=t}
								<option value="{$t.id}">{$t.name}</option>
								{/foreach}
							</select>
						</div>
						<div class="col-sm-3 common-top">
							<label>Test Options</label>
							<select class="test_options form-control">

							</select>
						</div>
						<div class="col-sm-3 common-top">

							<label> Test Result</label>
							<input type="text" class="form-control" id="test_result" />	
						</div>
						<div class="col-sm-3 addUp_btn">

							<input type="button" id="add_test" class="btn btn-primary" value="Add" />
						</div>
					</div>
				</fieldset>

				<div id="tests">

					<div style="clear:both;" id="test_table">
						<table class="table table-striped half-tbl">
							<tr style="background-color: #000;color:#fff;">
								<td>Test Name</td>
								<td>Option</td>
								<td>Result</td>
								<td></td>
							</tr>

							{foreach from=$data.tests item=test}

							{foreach from=$test.options item=option name=option}
							<tr>
								<td>{$test.test_name}</td>
								<td>{$option.option_name} ({$option.measurement}) normal range -> ({$option.normal_range})</td>
								<td>{$option.result}</td>
								<td>
									<span class="remove" onclick="remove_test(this,{$option.pid})">X</span>
									<input type="hidden" name="test[{$smarty.foreach.option.index+1}][test_id]" value="{$test.test_id}" />
									<input type="hidden" name="test[{$smarty.foreach.option.index+1}][option_id]" value="{$option.option_id}" />
									<input type="hidden" name="test[{$smarty.foreach.option.index+1}][result]" value="{$option.result}" />
								</td>
							</tr>
							{/foreach}

							{/foreach}

						</table>
					</div>
				</div>

				<fieldset id="prescription">
					<legend> Prescription Info</legend>
					<div class="row">
						<div class="col-sm-3 common-top">
							<label for="description">Description</label>
							<textarea name="description" id="description" tabindex="21" class="form-control">{$data.description}</textarea>	
						</div>
						<div class="col-sm-3 common-top">
							<label for="next_date">Next Date</label>
							<input type="text" name="next_date" id="next_date" tabindex="22" class="form-control" value="{$data.next_date|date_format:"%Y-%m-%d"}"/>	
						</div>
						<div class="col-sm-3 common-top">
							<label for="complain">Complain</label>
							<input type="text" name="complain" tabindex="24"  class="form-control" value="{$data.complain}"/>	
						</div>
						<div class="col-sm-3 common-top">
							<label for="next_plan">Next Plan</label>
							<textarea name="next_plan" id="next_plan" tabindex="23" class="form-control">{$data.next_plan}</textarea>
						</div>
						<div class="col-sm-3 common-top">
							<label for="complain_detail">Complain Detail</label>
							<textarea name="complain_detail" id="complain_detail" tabindex="25" class="form-control">{$data.complain_detail}</textarea>	
						</div>

					</div>

				</fieldset>
				<fieldset>
					<legend>Fee</legend>
					<div class="col-sm-3">
						<label for="fee_received">Fee Received</label>
						<input type="text" name="fee_received" id="fee_received" tabindex="26" class="form-control" value="{$data.fee_received}"/>
					</div>
				</fieldset>	

				<label>
					<input type="submit" class="btn btn-primary" name="submit" id="submit" value="Update" />
				</label>

			</div><!-- #accrodion -->
			
		</form>
	</div><!-- #content -->
</div>
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
{literal}
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#name').focus();
		$('#add_prescription').validate({
			rules: {
				patient_id: { required: true }
			}
		});
	});
</script>
{/literal}

{include file="footer.tpl"}