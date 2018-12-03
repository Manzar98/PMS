<?php /* Smarty version 2.6.31, created on 2018-12-02 14:49:20
         compiled from packages/add_package.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="content">
	<h2><?php if (isset ( $this->_tpl_vars['singleRecord'] )): ?>Edit<?php else: ?>Add<?php endif; ?> Package</h2>
	<form id="add_package" class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
		<fieldset>
			<legend><?php if (isset ( $this->_tpl_vars['singleRecord'] )): ?>Edit<?php else: ?>Add<?php endif; ?> Package</legend>
			<div class="row">
				<input type="hidden" name="id" id="" class="" <?php if (( isset ( $this->_tpl_vars['singleRecord'] ) && $this->_tpl_vars['singleRecord']['id'] )): ?>value="<?php echo $this->_tpl_vars['singleRecord']['id']; ?>
"<?php endif; ?>/>
				<div class="col-sm-4 common-bottom">
					<label>Package Name</label>
					<input type="text" name="pkg_name" id="pkg_name" class="form-control" <?php if (( isset ( $this->_tpl_vars['singleRecord'] ) && $this->_tpl_vars['singleRecord']['pkg_name'] )): ?>value="<?php echo $this->_tpl_vars['singleRecord']['pkg_name']; ?>
"<?php endif; ?>/>
				</div>
				<div class="col-sm-4 common-bottom">
					<label>Number Of Patients</label>
					<input type="number" name="no_of_patients" id="no_of_patients" class="form-control" <?php if (( isset ( $this->_tpl_vars['singleRecord'] ) && $this->_tpl_vars['singleRecord']['no_of_patients'] )): ?>value="<?php echo $this->_tpl_vars['singleRecord']['no_of_patients']; ?>
"<?php endif; ?>/>
				</div>
				<div class="col-sm-4 common-bottom">
					<label>Number Of Prescriptions</label>
					<input type="number" name="no_of_prescriptions" id="no_of_prescriptions" class="form-control" <?php if (( isset ( $this->_tpl_vars['singleRecord'] ) && $this->_tpl_vars['singleRecord']['no_of_prescriptions'] )): ?>value="<?php echo $this->_tpl_vars['singleRecord']['no_of_prescriptions']; ?>
"<?php endif; ?>/>
				</div>
			</div>
			<div class="row"> 
				<div class="col-sm-4 common-bottom">
					<label>Number Of Medicines</label>
					<input type="number" name="no_of_medicines" id="no_of_medicines" class="form-control" <?php if (( isset ( $this->_tpl_vars['singleRecord'] ) && $this->_tpl_vars['singleRecord']['no_of_medicines'] )): ?>value="<?php echo $this->_tpl_vars['singleRecord']['no_of_medicines']; ?>
"<?php endif; ?>/>
				</div>
				<div class="col-sm-4 common-bottom">
					<label>Number Of Tests</label>
					<input type="number" name="no_of_tests" id="no_of_tests" class="form-control" <?php if (( isset ( $this->_tpl_vars['singleRecord'] ) && $this->_tpl_vars['singleRecord']['no_of_tests'] )): ?>value="<?php echo $this->_tpl_vars['singleRecord']['no_of_tests']; ?>
"<?php endif; ?>/>
				</div>
				<div class="col-sm-4 common-bottom">
					<label>Number Of Online Appointments</label>
					<input type="number" name="no_of_online_appointments" id="no_of_online_appointments" class="form-control" <?php if (( isset ( $this->_tpl_vars['singleRecord'] ) && $this->_tpl_vars['singleRecord']['no_of_online_appointments'] )): ?>value="<?php echo $this->_tpl_vars['singleRecord']['no_of_online_appointments']; ?>
"<?php endif; ?>/>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 common-bottom">
					<label>Package Price</label>
					<input type="text" name="pkg_price" id="pkg_price"class="form-control" <?php if (( isset ( $this->_tpl_vars['singleRecord'] ) && $this->_tpl_vars['singleRecord']['pkg_price'] )): ?>value="<?php echo $this->_tpl_vars['singleRecord']['pkg_price']; ?>
"<?php endif; ?>/>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4 common-bottom text-center" style="padding-top: 25px;">
					<input type="submit" name="submit" id="submit" class="btn btn-primary form-control"  <?php if (isset ( $this->_tpl_vars['singleRecord'] )): ?>value="Update Package"<?php else: ?>value="Add Package"<?php endif; ?>  />
				</div>
			</div>
		</fieldset>
	</form>
</div><!-- #content -->
<?php echo '
<script type="text/javascript">
	$(\'#add_package\').validate({

		rules: {
			pkg_name: { required: true },
			no_of_patients: { required: true },
			no_of_prescriptions: { required: true },
			no_of_medicines: { required: true },
			no_of_tests: { required: true },
			no_of_instructions: { required: true },
			no_of_online_appointments: { required: true },
			pkg_price: { required: true },
		}
	});
</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>