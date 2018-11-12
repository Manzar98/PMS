<?php /* Smarty version 2.6.26, created on 2012-08-04 17:04:24
         compiled from prescription/add_prescription.tpl */ ?>
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
		
		$(document).ready(function(){
			var test_count = 0;
			var medicine_count = 0;
			
			var medicines = \''; ?>
<select name="medicine_name[]"><?php $_from = $this->_tpl_vars['medicines']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?><option value="<?php echo $this->_tpl_vars['m']['medicine_id']; ?>
"><?php echo $this->_tpl_vars['m']['name']; ?>
(<?php echo $this->_tpl_vars['m']['formula']; ?>
)</option><?php endforeach; endif; unset($_from); ?></select><?php echo '\';
			
			
			$("#add_instruction").live("click", function(){
				
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
				
				
			});
			
			$("#instructions .close,#test_table .close,").live("click", function(){
				$(this).parents(\'tr\').remove();
			});
			
			$("#add_test").live("click", function(){
				
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
			
		});
</script>
'; ?>


		<div id="content">
				<h2><?php if ($this->_tpl_vars['edit']): ?> Edit<?php else: ?> Add a<?php endif; ?> Prescription</h2>
				
		
				
				<?php if ($this->_tpl_vars['errors']): ?>
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
					<select name="field" id="field" onchange="PatientLookUp(document.getElementById('q').value)">
						<option value="id" <?php if ($this->_tpl_vars['data']['field'] == 'id'): ?> selected="selected" <?php endif; ?>>Patient ID</option>
						<option value="name" <?php if ($this->_tpl_vars['data']['field'] == 'name'): ?> selected="selected" <?php endif; ?>>Patient Name</option>
						<option value="mobile" <?php if ($this->_tpl_vars['data']['field'] == 'mobile'): ?> selected="selected" <?php endif; ?>>Mobile No</option>
						<option value="phone" <?php if ($this->_tpl_vars['data']['field'] == 'phone'): ?> selected="selected" <?php endif; ?>>Phone No</option>
					</select>
					
					<input type="text" name="q" id="q" value="<?php echo $this->_tpl_vars['data']['q']; ?>
" maxlength="20" onkeyup="PatientLookUp(this.value)" />
					
					<input type="submit" value="Search" id="submit" />
				
					</fieldset>
			</form>	
			<div id="suggestion">
				
			</div>	
			<form id="add_prescription" class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
			<fieldset>
			<legend>Patient Information</legend>
			<label for="patient_id">Patient ID
						<input type="text" name="patient_id" id="patient_id" readonly="readonly" value="<?php echo $this->_tpl_vars['data']['patient_id']; ?>
" />
			</label>
			
			<a id="add_patient" href="javascript:void(0)">Add New Patient</a>
			
			<div id="add_new_patient" style="display: none;clear:both;">
				<label for="name">Name
					<input type="text" id="name" name="name"/>
				</label>
				
				<label for="mobile_number">Phone
					<input type="text" name="mobile_number" id="mobile_number" />
				</label>
				
					<label for="city">City
						<select name="city" id="city">
							<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
								
								<option <?php if ($this->_tpl_vars['data']['city_id'] == $this->_tpl_vars['city']['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $this->_tpl_vars['city']['id']; ?>
"><?php echo $this->_tpl_vars['city']['name']; ?>
</option>
							
							<?php endforeach; endif; unset($_from); ?>						
						</select>
					</label>
				
				<input type="button" id="submit_patient" value="Add" />				
			</div>
			</fieldset>			
			
	<fieldset id="medicines">
		<legend>Medicine Instructions</legend>
			<label>Medicine
				<select id="medicine" onchange="GetMedicineInstruction(this)">
				<option value="">Select Medicine First</option>
				<?php $_from = $this->_tpl_vars['medicines']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?>
					<option value="<?php echo $this->_tpl_vars['m']['id']; ?>
"><?php echo $this->_tpl_vars['m']['name']; ?>
 (<?php echo $this->_tpl_vars['m']['formula']; ?>
)</option>
				<?php endforeach; endif; unset($_from); ?>	
				</select>
			</label>
			
			<label>Instruction
				  <select class="medicine_instruction">
				  	
				  </select>
			</label>
			
			<label>Custom Instruction
				   <input type="text" id="custom_instruction" />
			</label>
			
				<input type="button" name="add_instruction" id="add_instruction" value="Add" />
					
		

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
			<label>Test Name
				<select id="test_name" onchange="GetTestOptions(this)">
					<option value="">Select Test</option>
					<?php $_from = $this->_tpl_vars['test_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['t']):
?>
						<option value="<?php echo $this->_tpl_vars['t']['id']; ?>
"><?php echo $this->_tpl_vars['t']['name']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</label>
			
			<label>Test Options
				  <select class="test_options">
						
				  </select>
			</label>
			
			<label> Test Result
				  <input type="text" id="test_result" />	
			</label>
			
			<input type="button" id="add_test" value="Add" />
			
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
			<label for="description">Description
				<textarea name="description" id="description" tabindex="21"></textarea>	
			</label>
			
			
			<label for="next_date">Next Date
				<input type="text" name="next_date" id="next_date" tabindex="22" />	
			</label>
			
			<label for="complain">Complain
				<input type="text" name="complain" tabindex="24"  />	
			</label>
			
			<label for="next_plan">Next Plan
				<textarea name="next_plan" id="next_plan" tabindex="23"></textarea>
			</label>
			
			
		
		
			
			<label for="complain_detail">Complain Detail
				<textarea name="complain_detail" id="complain_detail" tabindex="25"></textarea>	
			</label>
		
		
		
		</fieldset>
		
		<fieldset>
			<legend>Fee</legend>
			<label for="fee_received">Fee Received
				<input type="text" name="fee_received" id="fee_received" tabindex="26" />
			</label>
		</fieldset>	

	<label >
		<input type="submit" name="submit" id="submit" />
	</label>
			</form>
		</div><!-- #content -->

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