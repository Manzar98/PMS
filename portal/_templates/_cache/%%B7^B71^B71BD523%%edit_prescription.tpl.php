<?php /* Smarty version 2.6.31, created on 2018-11-22 17:08:53
         compiled from prescription/edit_prescription.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'prescription/edit_prescription.tpl', 414, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
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

				$(\'.medicine_instruction\').html(msg);

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
				$(\'.test_options\').html(msg);          
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
			url: "'; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
edit-prescription/remove-instruction/<?php echo '",
			data: "id=" + id,
			success: function(msg) 
			{
				// debugger;
				if(msg==\'1\')
				{
					$(element).parents(\'tr\').remove();
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
			url: "'; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
edit-prescription/remove-test-option/<?php echo '",
			data: "id=" + id,
			success: function(msg) 
			{

				if(msg==\'1\')
				{
					$(element).parents(\'tr\').remove();
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

		var medicines = \''; ?>
<select name="medicine_name[]"><?php $_from = $this->_tpl_vars['medicines']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?><option value="<?php if (isset ( $this->_tpl_vars['m']['medicine_id'] )): ?><?php echo $this->_tpl_vars['m']['medicine_id']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['m']['name']; ?>
(<?php echo $this->_tpl_vars['m']['formula']; ?>
)</option><?php endforeach; endif; unset($_from); ?></select><?php echo '\';


		$("#add_instruction").on("click", function(){

			medicine_count = medicine_count + 1;

			var medicine_id = $("#medicine").val();
			var medicine_name = $("#medicine option:selected").text();

			var instruction_id = $(".medicine_instruction").val();
			var instruction_name = $(".medicine_instruction :selected").text();

			var custom_instruction = $("#custom_instruction").val();
      // debugger
			if(custom_instruction!="")
			{
//debugger
				$.ajax({
					type: "POST",
					url: "'; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-prescription/add-instruction/<?php echo '",
					data: "medicine_id=" + medicine_id + "&instruction="+custom_instruction,
					success: function(msg) 
					{
						console.log(msg);
                    //  debugger
						if(parseInt(msg)>0)
						{
							instruction_id = msg;
						}
						var instruction_data = \'<input type="hidden" name="instructions[\'+medicine_count+\'][medicine_id]" value="\' + medicine_id + \'"/> <input type="hidden" name="instructions[\'+medicine_count+\'][instruction_id]" value="\'+ instruction_id+\'"  /><input type="hidden" name="instructions[\'+medicine_count+\'][is_instructionChange]" value="true"  /> \';
						var instruction =\'<tr> <td>\' + medicine_name + \'</td><td>\' + custom_instruction + \'</td> <td><span class="close">X</span></td>\'+instruction_data+\' </tr>\';					

						$("#instructions").show();
						$("#instructions table").append(instruction);
						$("#custom_instruction").val(\'\');

$("#instructions").find(\'.close\').on("click", function(){
			$(this).parents(\'tr\').remove();
		});

					}	
				});

			}
			else
			{
				var instruction_data = \'<input type="hidden" name="instructions[\'+medicine_count+\'][medicine_id]" value="\' + medicine_id + \'"/> <input type="hidden" name="instructions[\'+medicine_count+\'][instruction_id]" value="\'+ instruction_id+\'"  /><input type="hidden" name="instructions[\'+medicine_count+\'][is_instructionChange]" value="true"  /> \';
				var instruction =\'<tr> <td>\' + medicine_name + \'</td><td>\' + instruction_name + \'</td><td><span class="close">X</span></td>\'+instruction_data+\' </tr>\';					
				$("#instructions").show();
				$("#instructions table").append(instruction);

				$("#instructions").find(\'.close\').on("click", function(){
			$(this).parents(\'tr\').remove();
		});
			}


		});

		$("#instructions").find(\'.close\').on("click", function(){
			$(this).parents(\'tr\').remove();
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

				var test_data = \'<input type="hidden" name="test[\'+test_count+\'][test_id]" value="\' + test_id + \'"/> <input type="hidden" name="test[\'+test_count+\'][option_id]" value="\'+ option_id +\'" /> <input type="hidden" name="test[\'+test_count+\'][result]" value="\'+ test_result +\'" /><input type="hidden" name="test[\'+test_count+\'][is_TestChange]" value="true" />\';
				var test =\'<tr> <td>\' + test_name + \'</td><td>\' + option_name + \'</td> <td> \'+ test_result+\' </td> <td><span class="close">X</span></td>\'+test_data+\' </tr>\';					
				$("#test_table").show();
				$("#test_table table").append(test);
				$("#test_table td .close").on("click", function(){
					$(this).parents(\'tr\').remove();
				});	


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
		$("#city").select2({
                    // placeholder: "Select a State",
                    allowClear: true
                });

	});

	function generateRandomNumber(){

		var d=new Date();
		var n=d.getTime();
		n = n.toString()
		m=n.substring(9,14)
		$(\'#security_key\').val(m);
	}
</script>
'; ?>

<div id="content">
	<div class="container-fluid">
		<h2>Edit Prescription</h2>

		<?php if (isset ( $this->_tpl_vars['errors'] )): ?>
		<div class="fail">
			<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
			<?php echo $this->_tpl_vars['error']; ?>

			<?php endforeach; endif; unset($_from); ?>
		</div>
		<?php endif; ?>
		
		<form class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="get" enctype="multipart/form-data">
			<fieldset >
				<legend>Search Patient</legend>
				<div class="row">
					<div class="col-md-3 col-sm-12 search-top">
						<select name="field" id="field" onchange="PatientLookUp(document.getElementById('q').value)" class="form-control">
							<option value="id" <?php if (( isset ( $this->_tpl_vars['data']['field'] ) && $this->_tpl_vars['data']['field'] == 'id' )): ?> selected="selected" <?php endif; ?>>Patient ID</option>
							<option value="name" <?php if (( isset ( $this->_tpl_vars['data']['field'] ) && $this->_tpl_vars['data']['field'] == 'name' )): ?> selected="selected" <?php endif; ?>>Patient Name</option>
							<option value="mobile" <?php if (( isset ( $this->_tpl_vars['data']['field'] ) && $this->_tpl_vars['data']['field'] == 'mobile' )): ?> selected="selected" <?php endif; ?>>Mobile No</option>
							<option value="phone" <?php if (( isset ( $this->_tpl_vars['data']['field'] ) && $this->_tpl_vars['data']['field'] == 'phone' )): ?> selected="selected" <?php endif; ?>>Phone No</option>
						</select>
					</div>
					<div class="col-md-3 col-sm-12 search-top">
						<input type="text" name="q" id="q" <?php if (isset ( $this->_tpl_vars['data']['q'] )): ?>value="<?php echo $this->_tpl_vars['data']['q']; ?>
"<?php endif; ?> maxlength="20" onkeyup="PatientLookUp(this.value)" class="form-control" />
					</div>
					<!-- <div class="col-md-3 col-sm-12 search-top">
						<input type="submit" value="Search" id="submit" class="btn btn-primary" />
					</div> -->
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
								<?php $_from = $this->_tpl_vars['medicines']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?>
								<option value="<?php echo $this->_tpl_vars['m']['id']; ?>
"><?php echo $this->_tpl_vars['m']['name']; ?>
 (<?php echo $this->_tpl_vars['m']['dose']; ?>
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
							<?php $_from = $this->_tpl_vars['data']['instructions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ins']):
?>
                            <!--  <?php echo $this->_tpl_vars['ins']['medicine_id']; ?>
 -->
							<tr>
								<td><?php echo $this->_tpl_vars['ins']['name']; ?>
 (<?php echo $this->_tpl_vars['ins']['formula']; ?>
)</td>
								<td><?php echo $this->_tpl_vars['ins']['instruction']; ?>
</td>
								<td><span class="remove" onclick="remove_instruction(this,<?php echo $this->_tpl_vars['ins']['pid']; ?>
)">X</span></td>

								<input type="hidden" name="instructions[1][medicine_id]" value="<?php echo $this->_tpl_vars['ins']['medicine_id']; ?>
">
								<input type="hidden" name="instructions[1][instruction_id]" value="<?php echo $this->_tpl_vars['ins']['id']; ?>
">

							</tr>
							<?php endforeach; endif; unset($_from); ?>
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

							<?php $_from = $this->_tpl_vars['data']['tests']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['test']):
?>

							<?php $_from = $this->_tpl_vars['test']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['option'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['option']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['option']):
        $this->_foreach['option']['iteration']++;
?>
							<tr>
								<td><?php echo $this->_tpl_vars['test']['test_name']; ?>
</td>
								<td><?php echo $this->_tpl_vars['option']['option_name']; ?>
 (<?php echo $this->_tpl_vars['option']['measurement']; ?>
) normal range -> (<?php echo $this->_tpl_vars['option']['normal_range']; ?>
)</td>
								<td><?php echo $this->_tpl_vars['option']['result']; ?>
</td>
								<td>
									<span class="remove" onclick="remove_test(this,<?php echo $this->_tpl_vars['option']['pid']; ?>
)">X</span>
									<input type="hidden" name="test[<?php echo ($this->_foreach['option']['iteration']-1)+1; ?>
][test_id]" value="<?php echo $this->_tpl_vars['test']['test_id']; ?>
" />
									<input type="hidden" name="test[<?php echo ($this->_foreach['option']['iteration']-1)+1; ?>
][option_id]" value="<?php echo $this->_tpl_vars['option']['option_id']; ?>
" />
									<input type="hidden" name="test[<?php echo ($this->_foreach['option']['iteration']-1)+1; ?>
][result]" value="<?php echo $this->_tpl_vars['option']['result']; ?>
" />
								</td>
							</tr>
							<?php endforeach; endif; unset($_from); ?>

							<?php endforeach; endif; unset($_from); ?>

						</table>
					</div>
				</div>

				<fieldset id="prescription">
					<legend> Prescription Info</legend>
					<div class="row">
						<div class="col-sm-3 common-top">
							<label for="description">Description</label>
							<textarea name="description" id="description" tabindex="21" class="form-control"><?php echo $this->_tpl_vars['data']['description']; ?>
</textarea>	
						</div>
						<div class="col-sm-3 common-top">
							<label for="next_date">Next Date</label>
							<input type="text" name="next_date" id="next_date" tabindex="22" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['next_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
"/>	
						</div>
						<div class="col-sm-3 common-top">
							<label for="complain">Complain</label>
							<input type="text" name="complain" tabindex="24"  class="form-control" value="<?php echo $this->_tpl_vars['data']['complain']; ?>
"/>	
						</div>
						<div class="col-sm-3 common-top">
							<label for="next_plan">Next Plan</label>
							<textarea name="next_plan" id="next_plan" tabindex="23" class="form-control"><?php echo $this->_tpl_vars['data']['next_plan']; ?>
</textarea>
						</div>
						<div class="col-sm-3 common-top">
							<label for="complain_detail">Complain Detail</label>
							<textarea name="complain_detail" id="complain_detail" tabindex="25" class="form-control"><?php echo $this->_tpl_vars['data']['complain_detail']; ?>
</textarea>	
						</div>

					</div>

				</fieldset>
				<fieldset>
					<legend>Fee</legend>
					<div class="col-sm-3">
						<label for="fee_received">Fee Received</label>
						<input type="text" name="fee_received" id="fee_received" tabindex="26" class="form-control" value="<?php echo $this->_tpl_vars['data']['fee_received']; ?>
"/>
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