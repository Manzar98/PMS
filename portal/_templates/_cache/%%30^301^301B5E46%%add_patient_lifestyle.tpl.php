<?php /* Smarty version 2.6.31, created on 2018-08-15 17:06:16
         compiled from patients/add_patient_lifestyle.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="content">
	<div class="container-fluid">
		<h2><?php if (isset ( $this->_tpl_vars['edit'] )): ?> Edit<?php else: ?> Add a<?php endif; ?> Patient Lifestyle</h2>

		<?php if (isset ( $this->_tpl_vars['errors'] )): ?>
		<div class="fail">
			<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
			<?php echo $this->_tpl_vars['error']; ?>

			<?php endforeach; endif; unset($_from); ?>
		</div>
		<?php endif; ?>
		<p>
			ID: <strong><?php echo $this->_tpl_vars['patient_details']['id']; ?>
</strong><br/>
			Name: <strong><?php echo $this->_tpl_vars['patient_details']['name']; ?>
</strong><br/>
			Mobile No: <strong><?php echo $this->_tpl_vars['patient_details']['mobile']; ?>
</strong>
		</p>	
		<form id="add_patient" class="" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
			<fieldset>
				<div class="row
				">
				<!-- <div class="col-sm-3"></div> -->
				<div class="col-sm-6">
					<div class="form-check m-border">
						<input type="checkbox" name="tabacco" id="tabacco"  value="1" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['tabacco'] === '1' )): ?> checked="checked" <?php endif; ?>/>
						<label for="tabacco">Tabacco</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-check m-border">
						
						<input type="checkbox" name="coffee" id="coffee"  value="1" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['coffee'] === '1' )): ?> checked="checked" <?php endif; ?>/>
						<label for="coffee">Coffee</label>
					</div>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<div class="row
			">
			<!-- <div class="col-sm-3"></div> -->
			<div class="col-sm-6">
				<div class="form-check m-border">
					<input type="checkbox" name="alcohol" id="alcohol" maxlength="50" value="1" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['alcohol'] === '1' )): ?> checked="checked" <?php endif; ?> />
					<label for="alcohol">Alcohol</label>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-check m-border">
					<input type="checkbox" name="recreational_drugs" id="recreational_drugs" maxlength="50" value="1" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['recreational_drugs'] === '1' )): ?> checked="checked" <?php endif; ?> />
					<label for="recreational_drugs">Recreational Drugs</label>
				</div>
			</div>
		</div>
	</fieldset>
	<fieldset>
		<div class="row
		">
		<!-- <div class="col-sm-3"></div> -->
		<div class="col-sm-6">
			<div class="form-check m-border">
				<input type="checkbox" name="counseling" id="counseling" maxlength="50" value="1" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['counseling'] === '1' )): ?> checked="checked" <?php endif; ?> />
				<label for="counseling">Counseling</label>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-check m-border">
				<input type="checkbox" name="exercise_patterns" id="exercise_patterns" maxlength="50" value="1" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['exercise_patterns'] === '1' )): ?> checked="checked" <?php endif; ?> />
				<label for="exercise_patterns">Exercise Patterns</label>
			</div>
		</div>
	</div>
</fieldset>
<fieldset>
	<div class="row
	">
	<!-- <div class="col-sm-3"></div> -->
	<div class="col-sm-6">
		<div class="form-check m-border">
			<input type="checkbox" name="hazardous_activities" id="hazardous_activities" maxlength="50" value="1" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['hazardous_activities'] === '1' )): ?> checked="checked" <?php endif; ?> />
			<label for="hazardous_activities">Hazardous Activities</label>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-check m-border">
			<input type="checkbox" name="sleep_patterns" id="sleep_patterns" maxlength="50" value="1" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['sleep_patterns'] === '1' )): ?> checked="checked" <?php endif; ?> />
			<label for="sleep_patterns">Sleep Patterns</label>
		</div>
	</div>
</div>
</fieldset>
<fieldset>
	<div class="row
	">
	<!-- <div class="col-sm-3"></div> -->
	<div class="col-sm-6">
		<div class="form-check m-border">
			<input type="checkbox" name="seatbelt_use" id="seatbelt_use" maxlength="50" value="1" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['seatbelt_use'] === '1' )): ?> checked="checked" <?php endif; ?> />
			<label for="seatbelt_use">Seatbelt Use</label>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-check m-border">
			<input type="submit" name="submit" id="submit" value="<?php if (isset ( $this->_tpl_vars['edit'] )): ?> Update<?php else: ?> Add <?php endif; ?>"  class="btn btn-primary" />
			<label for="submit"></label>
		</div>
	</div>
</div> 
<div class="" style="margin-bottom: 20px;"></div>
</fieldset>


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