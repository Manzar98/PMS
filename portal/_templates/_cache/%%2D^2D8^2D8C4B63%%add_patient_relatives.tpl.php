<?php /* Smarty version 2.6.31, created on 2018-12-03 23:09:15
         compiled from patients/add_patient_relatives.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="" class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
">Dashboard</a>
				</li>
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/">Patients</a>
				</li>
				<li class="breadcrumb-item active text-capitalize"><?php if (( isset ( $this->_tpl_vars['edit'] ) && $this->_tpl_vars['edit'] )): ?>Edit<?php else: ?> Add<?php endif; ?> Relatives</li>
			</ol>
		</div>
		<h2><?php if (( isset ( $this->_tpl_vars['edit'] ) && $this->_tpl_vars['edit'] )): ?> Edit<?php else: ?> Add a<?php endif; ?> Patient Relatives</h2>

		<?php if ($this->_tpl_vars['errors']): ?>
		<div class="fail">
			<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
			<?php echo $this->_tpl_vars['error']; ?>

			<?php endforeach; endif; unset($_from); ?>
		</div>
		<?php endif; ?>
		<p>
			ID: <strong class="text-dark"><?php echo $this->_tpl_vars['patient_details']['id']; ?>
</strong><br/>
			Name: <strong class="text-dark"><?php echo $this->_tpl_vars['patient_details']['name']; ?>
</strong><br/>
			Mobile No: <strong class="text-dark"><?php echo $this->_tpl_vars['patient_details']['mobile']; ?>
</strong>
		</p>	
		<form id="add_patient_relatives" class="" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<div class="relative-border">
								<label for="cancer">Cancer</label>
								<input type="text" name="cancer" id="cancer" maxlength="2" value="<?php echo $this->_tpl_vars['data']['cancer']; ?>
" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<div class="relative-border">
								<label for="diabetes">Diabetes</label>
								<input type="text" name="diabetes" id="diabetes" maxlength="2" value="<?php echo $this->_tpl_vars['data']['diabetes']; ?>
" class="form-control"/>
							</div>
						</div>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<div class="relative-border">
								<label for="epilepsy">Epilepsy</label>
								<input type="text" name="epilepsy" id="epilepsy" maxlength="2" value="<?php echo $this->_tpl_vars['data']['epilepsy']; ?>
" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<div class="relative-border">
								<label for="heart">Heart</label>
								<input type="text" name="heart" id="heart" maxlength="2" value="<?php echo $this->_tpl_vars['data']['heart']; ?>
" class="form-control"/>
							</div>
						</div>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<div class="relative-border">
								<label for="high_blood_pressure">High Blood Pressure</label>
								<input type="text" name="high_blood_pressure" id="high_blood_pressure" maxlength="2" value="<?php echo $this->_tpl_vars['data']['high_blood_pressure']; ?>
" class="form-control" />
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<div class="relative-border">
								<label for="mental_illness">Mental illness</label>
								<input type="text" name="mental_illness" id="mental_illness" maxlength="2" value="<?php echo $this->_tpl_vars['data']['mental_illness']; ?>
" class="form-control"/>
							</div>
						</div>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<div class="relative-border">
								<label for="stroke">Stroke</label>
								<input type="text" name="stroke" id="stroke" maxlength="2" value="<?php echo $this->_tpl_vars['data']['stroke']; ?>
" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<div class="relative-border">
								<label for="suicide">Suicide</label>
								<input type="text" name="suicide" id="suicide" maxlength="2" value="<?php echo $this->_tpl_vars['data']['suicide']; ?>
" class="form-control"/>
							</div>
						</div>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<div class="relative-border">
								<label for="tuberculosis">Tuberculosis</label>
								<input type="text" name="tuberculosis" id="tuberculosis" maxlength="2" value="<?php echo $this->_tpl_vars['data']['tuberculosis']; ?>
" class="form-control" />
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 mt-3 mx-auto">
						<label for="submit"></label>
						<input type="submit" name="submit" id="submit" value="<?php if ($this->_tpl_vars['edit']): ?> Update<?php else: ?> Add <?php endif; ?>" class="btn btn-primary form-control"/>
					</div>
				</div>
			</fieldset>
		</form>
	</div><!-- #content -->
</div>
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
<?php echo '
<script type="text/javascript">
	$(document).ready(function()
	{
		$(\'#cancer\').focus();

		$("#add_patient_relatives").validate({
			rules: {
				cancer: { number:true }
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