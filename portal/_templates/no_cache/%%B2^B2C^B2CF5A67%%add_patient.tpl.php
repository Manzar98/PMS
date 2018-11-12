<?php /* Smarty version 2.6.26, created on 2012-06-26 20:46:33
         compiled from patients/add_patient.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
	$(function() {
		$( "#dob" ).datepicker({
			yearRange: "-100:+0",
			dateFormat : "yy-mm-dd",
			changeMonth: true,
			changeYear: true
		});
	});
</script>
'; ?>


		<div id="content">
				<h2><?php if ($this->_tpl_vars['edit']): ?> Edit<?php else: ?> Add a<?php endif; ?> Patient</h2>
				
				<?php if ($this->_tpl_vars['errors']): ?>
					<div class="fail">
						<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
							<?php echo $this->_tpl_vars['error']; ?>

						<?php endforeach; endif; unset($_from); ?>
					</div>
				<?php endif; ?>
			
			<form id="add_patient" class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
				<fieldset>
					<legend>Add Patient Info</legend>
					<label for="name">Patient Name
						<input type="text" name="name" id="name" maxlength="50" value="<?php echo $this->_tpl_vars['data']['name']; ?>
" />
					</label>
					
					<label for="gender">Gender
						<select name="gender" id="gender">
							<option value="male" <?php if ($this->_tpl_vars['data']['gender'] == 'male'): ?> selected="selected" <?php endif; ?>>Male</option>
							<option value="female" <?php if ($this->_tpl_vars['data']['gender'] == 'female'): ?> selected="selected" <?php endif; ?>>Female</option>
							<option value="other" <?php if ($this->_tpl_vars['data']['gender'] == 'other'): ?> selected="selected" <?php endif; ?>>Other</option>
						</select>
					</label>
					
					<label for="dob">Date of Birth
						<input type="text" name="dob" id="dob" value="<?php echo $this->_tpl_vars['data']['dob']; ?>
" autocomplete="off" />
					</label>
					<br class="clear"/>
					<label for="marital_status">Marital Status
						<select name="marital_status" id="marital_status">
							
							<option value="">Select Status</option>
							
							<option value="married" <?php if ($this->_tpl_vars['data']['marital_status'] == 'married'): ?> selected="selected" <?php endif; ?>>Married</option>
							<option value="unmarried" <?php if ($this->_tpl_vars['data']['marital_status'] == 'unmarried'): ?> selected="selected" <?php endif; ?>>Unmarried</option>
							<option value="widow" <?php if ($this->_tpl_vars['data']['marital_status'] == 'widow'): ?> selected="selected" <?php endif; ?>>Widow</option>
							<option value="divorced" <?php if ($this->_tpl_vars['data']['marital_status'] == 'divorced'): ?> selected="selected" <?php endif; ?>>Divorced</option>
							<option value="seperated" <?php if ($this->_tpl_vars['data']['marital_status'] == 'seperated'): ?> selected="selected" <?php endif; ?>>Seperated</option>
							
							
							
						</select> 
					</label>
	
					<label for="blood_group">Blood Group
						<select name="blood_group" id="blood_group">
							<option value="">Select Blood Group</option>
							<option value="a+" <?php if ($this->_tpl_vars['data']['blood_group'] == 'a+'): ?> selected="selected" <?php endif; ?> >A+</option>
							<option value="a-" <?php if ($this->_tpl_vars['data']['blood_group'] == 'a-'): ?> selected="selected" <?php endif; ?> >A-</option>
							<option value="b+" <?php if ($this->_tpl_vars['data']['blood_group'] == 'b+'): ?> selected="selected" <?php endif; ?> >B+</option>
							<option value="b-" <?php if ($this->_tpl_vars['data']['blood_group'] == 'b-'): ?> selected="selected" <?php endif; ?> >B-</option>
							<option value="ab+" <?php if ($this->_tpl_vars['data']['blood_group'] == 'ab+'): ?> selected="selected" <?php endif; ?> >AB+</option>
							<option value="ab-" <?php if ($this->_tpl_vars['data']['blood_group'] == 'ab-'): ?> selected="selected" <?php endif; ?> >AB-</option>
							<option value="o+" <?php if ($this->_tpl_vars['data']['blood_group'] == 'o+'): ?> selected="selected" <?php endif; ?> >O+</option>
							<option value="o-" <?php if ($this->_tpl_vars['data']['blood_group'] == 'o-'): ?> selected="selected" <?php endif; ?> >O-</option>
						</select>
					</label>
	
					<label for="occupation">Occupation
							<input type="text" name="occupation" id="occupation" value="<?php echo $this->_tpl_vars['data']['occupation']; ?>
"  />
					</label>
				
				</fieldset>
				
				<fieldset>
					<legend>Other Info</legend>
					<label for="mobile">Mobile
						<input type="text" name="mobile" id="mobile" value="<?php echo $this->_tpl_vars['data']['mobile']; ?>
" maxlength="50" />	
					</label>

					<label for="phone">Phone
						<input type="text" name="phone" id="phone" value="<?php echo $this->_tpl_vars['data']['phone']; ?>
" maxlength="50" />	
					</label>


					<label for="city">City
						<select name="city" id="city">
							<option value="">Select City</option>
							<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
								
								<option <?php if ($this->_tpl_vars['data']['city_id'] == $this->_tpl_vars['city']['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $this->_tpl_vars['city']['id']; ?>
"><?php echo $this->_tpl_vars['city']['name']; ?>
</option>
							
							<?php endforeach; endif; unset($_from); ?>						
						</select>
					</label>
					
					<label for="address">Address
							<textarea style="height: 84px;" name="address" id="address"><?php echo $this->_tpl_vars['data']['address']; ?>
</textarea>
					</label>
					
					
					<label>
							<p>Custom Field 1 Name
								<input type="text" name="field1" id="field1" value="<?php echo $this->_tpl_vars['data']['field1']; ?>
" />
							</p>
							<p>Custom Field 1 Value
								<input type="text" name="value1" id="value1" value="<?php echo $this->_tpl_vars['data']['value1']; ?>
" />		
							</p>
					</label>
					
					<br/>
					
					<label> 
							<p>Custom Field 2 Name
								<input type="text" name="field2" id="field2" value="<?php echo $this->_tpl_vars['data']['field2']; ?>
" />
							</p>
							<p>Custom Field 2 Value
								<input type="text" name="value2" id="value2" value="<?php echo $this->_tpl_vars['data']['value2']; ?>
" />		
							</p>
					</label>
					
										
					<label for="submit">
						<input type="submit" name="submit" id="submit" value="<?php if ($this->_tpl_vars['edit']): ?> Update<?php else: ?> Add<?php endif; ?>" />
					</label>
					
					
				</fieldset>
					
			</form>
		</div><!-- #content -->

	<?php echo '
		<script type="text/javascript">
			$(document).ready(function()
			{
				$(\'#name\').focus();
				
				$("#add_patient").validate({
					rules: {
						name: { required: true }
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