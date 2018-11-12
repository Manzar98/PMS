<?php /* Smarty version 2.6.31, created on 2018-08-15 20:49:51
         compiled from prescription/add_prescription.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '

<script>
	$(function() {
		var today = new Date();
		$( "#next_date" ).datepicker({
			dateFormat : "yy-mm-dd",
			changeMonth: true,
			minDate: today,
		});
	});


	function PatientLookUp(q)
	{
		var field = $("#field").val();
		if(q!=\'\')
		{
			$.ajax({
				type: "POST",
				url: "'; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-prescription/suggest-patients/<?php echo '",
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
	}



	function GetMedicineInstruction(medicine)
	{
		
		var medicine_id = medicine.value;
		$.ajax({
			type: "POST",
			url: "'; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-prescription/get-medicine-instructions/<?php echo '",
			data: "medicine_id=" + medicine_id,
			success: function(msg) 
			{
				
				if (msg=="") {
					msg="<option>No instructions found</option>"
					$(\'.medicine_instruction\').html(msg);
				}else{
					$(\'.medicine_instruction\').html(msg);
				}
				

			}
		});
	}
	function GetTestOptions(test)
	{
		var test_id = test.value;
		
		$.ajax({
			type: "POST",
			url: "'; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-prescription/get-test-options/<?php echo '",
			data: "test_id=" + test_id,
			success: function(msg) 
			{
				// debugger
				if (msg=="") {

					msg="<option>No test found</option>";
					$(\'.test_options\').html(msg); 
				}else{
					$(\'.test_options\').html(msg);
				}
				
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

	$(document).ready(function(){
		var test_count = 0;
		var medicine_count = 0;

		var medicines = \''; ?>
<select name="medicine_name[]"><?php $_from = $this->_tpl_vars['medicines']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?><option value="<?php if (isset ( $this->_tpl_vars['m']['medicine_id'] )): ?><?php echo $this->_tpl_vars['m']['medicine_id']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['m']['name']; ?>
(<?php echo $this->_tpl_vars['m']['formula']; ?>
)</option><?php endforeach; endif; unset($_from); ?></select><?php echo '\';


		$("#add_instruction").on("click", function(){

			medicine_count = medicine_count + 1;

			if (medicine_count%2 == 0)
			{
				var lclass = "even";
			}
			else
			{
				var lclass="odd";
			}



			var medicine_id = $("#medicine").val();
			if (medicine_id!="") {
				var medicine_name = $("#medicine option:selected").text();

				var instruction_id = $(".medicine_instruction").val();
				var instruction_name = $(".medicine_instruction :selected").text();

				var custom_instruction = $("#custom_instruction").val();

				if(custom_instruction!="")
				{
					$.ajax({
						type: "POST",
						url: "'; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-prescription/add-instruction/<?php echo '",
						data: "medicine_id=" + medicine_id + "&instruction="+custom_instruction,
						success: function(msg) 
						{

							if(parseInt(msg)>0)
							{
								instruction_id = msg;
							}
							var instruction_data = \'<input type="hidden" name="instructions[\'+medicine_count+\'][medicine_id]" value="\' + medicine_id + \'"/> <input type="hidden" name="instructions[\'+medicine_count+\'][instruction_id]" value="\'+ instruction_id+\'"  />\';
							var instruction =\'<tr class="\'+lclass+\'"> <td>\' + medicine_name + \'</td><td>\' + custom_instruction + \'</td> <td><span class="close">X</span></td>\'+instruction_data+\' </tr>\';					
							$("#instructions").show();
							$("#instructions tbody").append(instruction);
							$("#custom_instruction").val(\'\');

						}	
					});
				}
				else
				{
					var instruction_data = \'<input type="hidden" name="instructions[\'+medicine_count+\'][medicine_id]" value="\' + medicine_id + \'"/> <input type="hidden" name="instructions[\'+medicine_count+\'][instruction_id]" value="\'+ instruction_id+\'"  />\';
					var instruction =\'<tr class="\'+lclass+\'"> <td>\' + medicine_name + \'</td><td>\' + instruction_name + \'</td> <td><span class="close">X</span></td>\'+instruction_data+\' </tr>\';					
					$("#instructions").show();
					$("#instructions tbody").append(instruction);

				}
			}

		});

		$("#instructions .close,#test_table .close").on("click", function(){
			$(this).parents(\'tr\').remove();
		});

		$("#add_test").on("click", function(){
			
			test_count = test_count + 1;

			var test_id = $("#test_name").val();
			var test_name = $("#test_name :selected").text();

			var option_id = $(".test_options").val();
			var option_name = $(".test_options :selected").text();

			var test_result = $("#test_result").val();

			if(test_result!="")
			{

				var test_data = \'<input type="hidden" name="test[\'+test_count+\'][test_id]" value="\' + test_id + \'"/> <input type="hidden" name="test[\'+test_count+\'][option_id]" value="\'+ option_id +\'" /> <input type="hidden" name="test[\'+test_count+\'][result]" value="\'+ test_result +\'" />\';
				var test =\'<tr> <td>\' + test_name + \'</td><td>\' + option_name + \'</td> <td class="bold"> \'+ test_result+\' </td> <td><span class="close">X</span></td>\'+test_data+\' </tr>\';					
				$("#test_table").show();
				$("#test_table tbody").append(test);	


			}


		});


		$("#add_patient").click(function(){
			$("#add_new_patient").toggle();
			
		});
		var flip = 0;
		$(\'#add_new_medicine\').click(function(){

			$(\'#add_medicine_wrap\').toggle(flip++ % 2 === 0);
		});
		$(\'#add_new_test\').click(function(){

			$(\'#add_test_wrap\').toggle(flip++ % 2 === 0);
		});

		$(\'#submit_medicine\').click(function(){

			medicine_name = $(\'#m_name\').val();
			medicine_formula = $(\'#m_formula\').val();
			medicine_type = $(\'#m_type\').val();
			medicine_dose = $(\'#m_dose\').val();
			medicine_company = $(\'#m_company\').val();
			medicine_instruct = $(\'#m_instruction\').val();

			if (medicine_name !="" && medicine_dose !="") {

				$.ajax({
					type: "POST",
					url:"http://pms.local/admin/medicine/add?ajax=y",
					data:"name="+medicine_name+"&formula="+medicine_formula+"&type="+medicine_type+"&dose="+medicine_dose+"&company="+medicine_company,
					success:function(msg){
						
						var data =JSON.parse(msg);
						
						var dropdown = "";
						dropdown+=\'<option class="topOpt" value="" selected disabled>Select Medicine First</option>\';
						$.each(data.id,function(k,v){
                             // console.log(v);
                             dropdown+=\'<option value="\'+v+\'">\'+data.medi[k]+\'</option>\';   
                         })
						
						$(\'#medicine\').html(\'\');
						$(\'#medicine\').html(dropdown);

						if(data.insertedId>0)
						{


							if (medicine_instruct!="") {
								
								$.ajax({

									type: "POST",
									url : "http://pms.local/admin/instructions/add?ajax=y",
									data: "medicine_id="+data.insertedId+"&instruction="+medicine_instruct,
									success:function (isnt_msg) {
										if (isnt_msg > 0) {

										}else{

										}
									}
								})
								
							}
							$("#add_medicine_wrap").hide();
							$("#add_medicine_wrap .empty-inpt").val(\'\');

						}
						else
						{
							alert(\'Some Error Occured\');
						}

					}
				})
			}
		});

		$(\'#submit_test\').click(function(){

			test_name = $(\'#t_name\').val();
			test_option = $(\'#t_option\').val();
			test_measurement = $(\'#measurement\').val();
			test_range = $(\'#normal_range\').val();

			if (test_name !="") {

				$.ajax({
					type: "POST",
					url:"http://pms.local/admin/tests/add/?ajax=y",
					data:"name="+test_name,
					success:function(msg){

						var data =JSON.parse(msg);
						
						var dropdown = "";
						dropdown+=\'<option class="topOpt" value="" selected disabled>Select Test</option>\';
						$.each(data.ids,function(k,v){
                             // console.log(v);
                             dropdown+=\'<option value="\'+v+\'">\'+data.test[k]+\'</option>\';   
                         })
						
						$(\'#test_name\').html(\'\');
						$(\'#test_name\').html(dropdown);
						
						if(data.insertedId>0)
						{
							if (test_option!="" || test_measurement!="" || test_range!="") {
								
								$.ajax({

									type: "POST",
									url : "http://pms.local/admin/test-options/add/"+data.insertedId+"?ajax=y",
									data: "name="+test_option+"&measurement="+test_measurement+"&normal_range="+test_range,
									success:function (opt_msg) {
										if (opt_msg > 0) {
											
										}else{

										}
									}
								})
								
							}
							$("#add_test_wrap").hide();
							$("#add_test_wrap .empty-inpt").val(\'\');
						}
						else
						{
							alert(\'Some Error Occured\');
						}

					}
				})
			}
		});


		$("#submit_patient").click(function(){
			
			patient_name = $("#name").val();
			mobile_number = $("#mobile_number").val();
			city = $("#city").val();


			if(patient_name !="" && mobile_number !="")
			{
				
				$.ajax({
					type: "POST",
					url: "'; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-prescription/add-patient/<?php echo '",
					data: "name="+patient_name+"&mobile_number="+mobile_number+"&city_id="+city,
					success: function(msg) 
					{

						if(msg>0)
						{
							$(\'#patient_id\').val(msg);
							$("#add_new_patient").hide();
							$("#add_new_patient .empty-inpt").val(\'\');
						}
						else
						{
							alert(\'Some Error Occured\');
						}
					}
				});
			}
			else
			{
				alert("please Enter name and phone");
			}
		});


$("#medicine").select2({
                    // placeholder: "Select a State",
                    allowClear: true
                });
$("#test_name").select2({
                    // placeholder: "Select a State",
                    allowClear: true
                });

	});


debugger
</script>
'; ?>

<div id="content">
	<div class="container-fluid">
		<h2>Add Prescription</h2>

		<?php if (( isset ( $this->_tpl_vars['errors'] ) && $this->_tpl_vars['errors'] )): ?>
		<div class="fail">
			<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
			<?php echo $this->_tpl_vars['error']; ?>

			<?php endforeach; endif; unset($_from); ?>
		</div>
		<?php endif; ?>
		<?php echo $_SERVER['REQUEST_URI']; ?>

		<form class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="get" enctype="multipart/form-data">

			<fieldset >
				
				<legend>Search Patient</legend>
				<div class="row">
					<div class="col-md-3 col-sm-12 search-top">
						<select name="field" class="form-control" id="field" onchange="PatientLookUp(document.getElementById('q').value)">
							<option value="id" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['field'] == 'id' )): ?> selected="selected" <?php endif; ?>>Patient ID</option>
							<option value="name" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['field'] == 'name' )): ?> selected="selected" <?php endif; ?>>Patient Name</option>
							<option value="mobile" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['field'] == 'mobile' )): ?> selected="selected" <?php endif; ?>>Mobile No</option>
							<option value="phone" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['field'] == 'phone' )): ?> selected="selected" <?php endif; ?>>Phone No</option>
						</select>
					</div>
					<div class="col-md-3 col-sm-12 search-top">
						<input type="text" class="form-control" name="q" id="q" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['q'] )): ?>value="<?php echo $this->_tpl_vars['data']['q']; ?>
"<?php endif; ?>  maxlength="20" onkeyup="PatientLookUp(this.value)" />
					</div>
					<div class="col-md-2 col-sm-12 search-top">
						<input class="btn btn-primary" type="submit" value="Search" id="submit" />
					</div>

				</div>
			</fieldset>
		</form>	
		<div id="suggestion">

		</div>	
		<form id="add_prescription" class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
			<fieldset>
				<legend>Patient Information</legend>
				<div class="row">
					<div class="col-sm-3">
						<label for="patient_id">Patient Id</label>
						<input type="text" class="form-control input-field" name="patient_id" id="patient_id" readonly="readonly" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['patient_id'] )): ?>value="<?php echo $this->_tpl_vars['data']['patient_id']; ?>
"<?php endif; ?> />
					</div>

					<div class="col-sm-2 addNewBtn">
						<a id="add_patient" href="javascript:void(0)">Add New Patient</a>
					</div>
				</div>

				<div class="row">
					<div id="add_new_patient" style="display: none; clear:both;">

						<div class="col-sm-3 common-top">
							<label for="name">Name</label>
							<input type="text" class="input-field form-control empty-inpt" id="name" name="name"/>
							
						</div>
						<div class="col-sm-3 common-top">
							<label for="mobile_number">Phone</label>
							<input type="text" class="form-control empty-inpt" name="mobile_number" id="mobile_number" />
							
						</div>
						<div class="col-sm-3 common-top">
							<label for="city">City</label>
							<select name="city" id="city" class="form-control empty-inpt">
								<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>

								<option <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['city_id'] == $this->_tpl_vars['city']['id'] )): ?> selected="selected" <?php endif; ?> value="<?php echo $this->_tpl_vars['city']['id']; ?>
"><?php echo $this->_tpl_vars['city']['name']; ?>
</option>

								<?php endforeach; endif; unset($_from); ?>						
							</select>
							
						</div>
						<div class="col-sm-2 addUp_btn">
							<input type="button"  class="btn btn-primary" id="submit_patient" value="Add" />
						</div>				
					</div>
				</div>
			</fieldset>			

			<fieldset id="medicines">

				<legend>Medicine Instructions</legend> 

				<div class="row">
					<div class="col-md-3 common-top">
						<label>Medicine</label>
						<select id="medicine" onchange="GetMedicineInstruction(this)" class="form-control">
							<option value="" disabled="" selected="">Select Medicine First</option>
							<?php $_from = $this->_tpl_vars['medicines']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?>
							<option value="<?php echo $this->_tpl_vars['m']['id']; ?>
"><?php echo $this->_tpl_vars['m']['name']; ?>
 (<?php echo $this->_tpl_vars['m']['formula']; ?>
)</option>
							<?php endforeach; endif; unset($_from); ?>	
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
					<div class="col-sm-1 addUp_btn">
						<input type="button" name="add_instruction" id="add_instruction" value="Add" class="btn btn-primary" />
					</div>
					<div class="col-sm-2 addNewBtn">
						<a id="add_new_medicine" class="pull-right ">Add New Medicine</a>
					</div>
				</div>
				<div class="row">
					<div id="add_medicine_wrap" style="display: none; clear:both;">
						<div class="col-md-3 common-top">
							<label for="m_name">Medicine Name</label>
							<input type="text" name="name" class="form-control empty-inpt" id="m_name"/>	
						</div>
						<div class="col-md-3 common-top">
							<label for="m_formula">Medicine Formula</label>
							<input type="text" name="formula" id="m_formula" class="form-control empty-inpt"/>
						</div>
						<div class="col-md-3 common-top">

							<label for="m_type">Type</label>
							<select name="type" id="m_type" class="form-control empty-inpt">
								<option value="" disabled="" selected="">Select</option>
								<option value="Tablet">Tablet</option>
								<option value="Capsule">Capsule</option>
								<option value="Syrup">Syrup</option>
								<option value="Injection">Injection</option>
								<option value="Cream">Cream</option>
								<option value="Drops">Drops</option>
							</select>
						</div>
						<div class="col-md-3 common-top">
							<label for="m_dose">Dose</label>
							<input type="text" class="form-control empty-inpt" name="dose" id="m_dose"/>
						</div>
						<div class="col-md-3 common-top">
							<label for="m_company">Company</label>
							<input type="text" name="company" id="m_company" class="form-control empty-inpt"/>
						</div>
						<div class="col-md-3 common-top">
							<label for="m_instruction">Instruction</label>
							<textarea  name="instruction" id="m_instruction" class="form-control empty-inpt"></textarea>
						</div>
						<div class="col-md-3 addUp_btn">
							<input type="button" id="submit_medicine" value="Add" class="btn btn-primary" />
						</div>
					</div>
				</div>


				<table style="clear:both;display: none;" id="instructions" class="zebra">
					<caption>Medicine Instructions</caption>
					<thead>
						<tr>
							<th>Medicine Name</th>
							<th>Instruction</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>

			</fieldset>



			<fieldset id="tests">
				<legend>Tests</legend>
				<div class="row">
					<div class="col-sm-3 common-top">
						<label>Test Name</label>
						<select id="test_name" onchange="GetTestOptions(this)" class="form-control">
							<option value="" disabled="" selected="">Select Test</option>
							<?php $_from = $this->_tpl_vars['test_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['t']):
?>
							<option value="<?php echo $this->_tpl_vars['t']['id']; ?>
"><?php echo $this->_tpl_vars['t']['name']; ?>
</option>
							<?php endforeach; endif; unset($_from); ?>
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
					<div class="col-sm-1 addUp_btn">

						<input type="button" id="add_test" class="btn btn-primary" value="Add" />
					</div>
					<div class="col-sm-2 addNewBtn">
						<a id="add_new_test" class="pull-right">Add New Test</a>
					</div>
				</div>

				<div class="row">
					<div  id="add_test_wrap" style="display: none;clear: both;">
						<div class="col-sm-3 common-top">
							<label for="t_name">Test Name</label>
							<input type="text" name="name" id="t_name" maxlength="100" class="form-control empty-inpt" />
						</div>
						<div class="col-sm-3 common-top">
							<label for="t_option">Option Name</label>
							<input type="text" name="name" id="t_option" maxlength="100" class="form-control empty-inpt" />
						</div>
						<div class="col-sm-3 common-top">
							<label for="measurement">Measurment</label>
							<input type="text" name="measurement" id="measurement" maxlength="100" class="form-control empty-inpt" />
						</div>
						<div class="col-sm-3 common-top">
							<label for="normal_range">Normal Range</label>
							<input type="text" name="normal_range" id="normal_range" class="form-control empty-inpt" />
						</div>
						<div class="col-sm-2 addUp_btn">
							<input type="button" id="submit_test" value="Add" class="btn btn-primary" />
						</div>
					</div>
				</div>
				<table style="clear:both;display: none;" id="test_table" class="zebra">
					<caption>Tests</caption>
					<thead>
						<tr>
							<th>Test Name</th>
							<th>Test Field</th>
							<th>Result</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</fieldset>




			<fieldset id="prescription">
				<legend> Prescription Info</legend>
				<div class="row">
					<div class="col-sm-3 common-top">
						<label for="description">Description</label>
						<textarea name="description" id="description" tabindex="21" class="form-control"></textarea>	
					</div>
					<div class="col-sm-3 common-top">
						<label for="next_date">Next Date</label>
						<input type="text" name="next_date" id="next_date" tabindex="22" class="form-control" />	
					</div>
					<div class="col-sm-3 common-top">
						<label for="complain">Complain</label>
						<input type="text" name="complain" tabindex="24"  class="form-control" />	
					</div>
					<div class="col-sm-3 common-top">
						<label for="next_plan">Next Plan</label>
						<textarea name="next_plan" id="next_plan" tabindex="23" class="form-control"></textarea>
					</div>
					<div class="col-sm-3 common-top">
						<label for="complain_detail">Complain Detail</label>
						<textarea name="complain_detail" id="complain_detail" tabindex="25" class="form-control"></textarea>	
					</div>

				</div>

			</fieldset>

			<fieldset>
				<legend>Fee</legend>
				<div class="col-sm-3">
					<label for="fee_received">Fee Received</label>
					<input type="text" name="fee_received" id="fee_received" tabindex="26" class="form-control" />
				</div>
			</fieldset>	

			<label >
				<input type="submit" class="btn btn-primary" name="submit" id="submit" />
			</label>
		</form>
	</div><!-- #content -->
</div>
<?php echo '

<script type="text/javascript">
	$(document).ready(function()
	{
		$(\'#name\').focus();
		$(\'#add_prescription\').validate({
			rules: {
				patient_id: { required: true }
			}
		});
	});
</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>