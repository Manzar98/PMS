<?php /* Smarty version 2.6.31, created on 2018-08-15 17:06:08
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
	<div class="container-fluid">
		<h2><?php if (( isset ( $this->_tpl_vars['edit'] ) && $this->_tpl_vars['edit'] )): ?> Edit<?php else: ?> Add a<?php endif; ?> Patient</h2>

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
				<div class="row">
					<div class="col-sm-4 common-bottom">
						<label for="name">Patient Name</label>
						<input type="text" name="name" id="name" maxlength="50" value="<?php echo $this->_tpl_vars['data']['name']; ?>
" class="form-control"/>
					</div>
					<div class="col-sm-4 common-bottom">
						<label for="gender">Gender</label>
						<select name="gender" id="gender" class="form-control">
							<option value="male" <?php if ($this->_tpl_vars['data']['gender'] == 'male'): ?> selected="selected" <?php endif; ?>>Male</option>
							<option value="female" <?php if ($this->_tpl_vars['data']['gender'] == 'female'): ?> selected="selected" <?php endif; ?>>Female</option>
							<option value="other" <?php if ($this->_tpl_vars['data']['gender'] == 'other'): ?> selected="selected" <?php endif; ?>>Other</option>
						</select>
					</div>
					<div class="col-sm-4 common-bottom">
						<label for="dob">Date of Birth</label>
						<input type="text" name="dob" id="dob" value="<?php echo $this->_tpl_vars['data']['dob']; ?>
" autocomplete="off" class="form-control"/>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 common-bottom">
						<label for="marital_status">Marital Status</label>
						<select name="marital_status" id="marital_status" class="form-control">
							<option value=""  selected="" disabled="">Select Status</option>
							<option value="married" <?php if ($this->_tpl_vars['data']['marital_status'] == 'married'): ?> selected="selected" <?php endif; ?>>Married</option>
							<option value="unmarried" <?php if ($this->_tpl_vars['data']['marital_status'] == 'unmarried'): ?> selected="selected" <?php endif; ?>>Unmarried</option>
							<option value="widow" <?php if ($this->_tpl_vars['data']['marital_status'] == 'widow'): ?> selected="selected" <?php endif; ?>>Widow</option>
							<option value="divorced" <?php if ($this->_tpl_vars['data']['marital_status'] == 'divorced'): ?> selected="selected" <?php endif; ?>>Divorced</option>
							<option value="seperated" <?php if ($this->_tpl_vars['data']['marital_status'] == 'seperated'): ?> selected="selected" <?php endif; ?>>Seperated</option>
						</select> 
					</div>
					<div class="col-sm-4 common-bottom">
						<label for="blood_group">Blood Group</label>
						<select name="blood_group" id="blood_group" class="form-control">
							<option value="" selected="" disabled="">Select Blood Group</option>
							<option value="a+" <?php if ($this->_tpl_vars['data']['blood_group'] == 'a+'): ?> selected="selected" <?php endif; ?> >A+</option>
							<option value="a-" <?php if ($this->_tpl_vars['data']['blood_group'] == 'a-'): ?> selected="selected" <?php endif; ?> >A-</option>
							<option value="b+" <?php if ($this->_tpl_vars['data']['blood_group'] == 'b+'): ?> selected="selected" <?php endif; ?> >B+</option>
							<option value="b-" <?php if ($this->_tpl_vars['data']['blood_group'] == 'b-'): ?> selected="selected" <?php endif; ?> >B-</option>
							<option value="ab+" <?php if ($this->_tpl_vars['data']['blood_group'] == 'ab+'): ?> selected="selected" <?php endif; ?> >AB+</option>
							<option value="ab-" <?php if ($this->_tpl_vars['data']['blood_group'] == 'ab-'): ?> selected="selected" <?php endif; ?> >AB-</option>
							<option value="o+" <?php if ($this->_tpl_vars['data']['blood_group'] == 'o+'): ?> selected="selected" <?php endif; ?> >O+</option>
							<option value="o-" <?php if ($this->_tpl_vars['data']['blood_group'] == 'o-'): ?> selected="selected" <?php endif; ?> >O-</option>
						</select>
					</div>
					<div class="col-sm-4 common-bottom">
						<label for="occupation">Occupation</label>
						<input type="text" name="occupation" id="occupation" value="<?php echo $this->_tpl_vars['data']['occupation']; ?>
" class="form-control" />
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend>Other Info</legend>
				<div class="row">
					<div class="col-sm-3 common-bottom">
						<label for="mobile">Mobile</label>
						<input type="text" name="mobile" id="mobile" value="<?php echo $this->_tpl_vars['data']['mobile']; ?>
" maxlength="50" class="form-control"/>
					</div>
					<div class="col-sm-3 common-bottom">
						<label for="phone">Phone</label>
						<input type="text" name="phone" id="phone" value="<?php echo $this->_tpl_vars['data']['phone']; ?>
" maxlength="50" class="form-control"/>	
					</div>
					<div class="col-sm-3 common-bottom">
						<label for="city">City</label>
						<select name="city" id="city" class="form-control">
							<option value="">Select City</option>
							<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
							<option <?php if ($this->_tpl_vars['data']['city_id'] == $this->_tpl_vars['city']['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $this->_tpl_vars['city']['id']; ?>
"><?php echo $this->_tpl_vars['city']['name']; ?>
</option>
							<?php endforeach; endif; unset($_from); ?>						
						</select>
					</div>
					<div class="col-sm-3 common-bottom">
						<label for="address">Address</label>
						<textarea  name="address" id="address" class="form-control"><?php echo $this->_tpl_vars['data']['address']; ?>
</textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 common-bottom">
						<label>Custom Field 1 Name</label>
						<input type="text" name="field1" id="field1" value="<?php echo $this->_tpl_vars['data']['field1']; ?>
" class="form-control"/>
					</div>
					<div class="col-sm-3 common-bottom">
						<label>Custom Field 1 Value</label>
						<input type="text" name="value1" id="value1" value="<?php echo $this->_tpl_vars['data']['value1']; ?>
" class="form-control"/>
					</div>
					<div class="col-sm-3 common-bottom">
						<label>Custom Field 2 Name</label>
						<input type="text" name="field2" id="field2" value="<?php echo $this->_tpl_vars['data']['field2']; ?>
" class="form-control"/>
					</div>
					<div class="col-sm-3 common-bottom">
						<label>Custom Field 2 Value</label>
						<input type="text" name="value2" id="value2" value="<?php echo $this->_tpl_vars['data']['value2']; ?>
" class="form-control"/>						</div>
					</div>
					<label for="submit"></label>
					<input type="submit" name="submit" id="submit" value="<?php if (( isset ( $this->_tpl_vars['edit'] ) && $this->_tpl_vars['edit'] )): ?> Update<?php else: ?> Add<?php endif; ?>" class="btn btn-primary" />

				</fieldset>
				<div class="" style="margin-bottom: 20px;"></div>
			</form>
		</div><!-- #content -->
	</div>
	<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
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