<?php /* Smarty version 2.6.31, created on 2018-12-03 22:52:59
         compiled from patients/add_patient_other_history.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<style>
.form textarea 
{
	/*height: 100px;*/
}
</style>
'; ?>

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
				<li class="breadcrumb-item active text-capitalize"><?php if (isset ( $this->_tpl_vars['edit'] )): ?> Edit<?php else: ?> Add<?php endif; ?> Other History</li>
			</ol>
		</div>
		<h2><?php if (isset ( $this->_tpl_vars['edit'] )): ?> Edit<?php else: ?> Add a<?php endif; ?> Patient Other History</h2>
		
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
			ID: &nbsp;<strong class="text-dark"><?php echo $this->_tpl_vars['patient_details']['id']; ?>
</strong><br/>
			Name: &nbsp;<strong  class="text-dark"><?php echo $this->_tpl_vars['patient_details']['name']; ?>
</strong><br/>
			Mobile No: &nbsp;<strong  class="text-dark"><?php echo $this->_tpl_vars['patient_details']['mobile']; ?>
</strong>
		</p>	
		<form id="add_patient_other_history" class="" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<div class="other-border">
								<label for="field1">Field 1</label>
								<input type="text" name="field1" id="field1" <?php if (isset ( $this->_tpl_vars['data'] )): ?>value="<?php echo $this->_tpl_vars['data']['field1']; ?>
"<?php endif; ?> class="form-control"/>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<div class="other-border">
								<label for="value1">Value 1</label>
								<textarea name="value1" id="value1" class="form-control textarea-height"><?php if (isset ( $this->_tpl_vars['data'] )): ?><?php echo $this->_tpl_vars['data']['value1']; ?>
<?php endif; ?></textarea> 
							</div>
						</div>
					</div>
				</div>
			</fieldset>	
			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<div class="other-border">
								<label for="field2">Field 2</label>
								<input type="text" name="field2" id="field2" <?php if (isset ( $this->_tpl_vars['data'] )): ?>value="<?php echo $this->_tpl_vars['data']['field2']; ?>
"<?php endif; ?> class="form-control "/> 	
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<div class="other-border">
								<label for="value2">Value 2</label>
								<textarea name="value2" id="value2" class="form-control textarea-height"><?php if (isset ( $this->_tpl_vars['data'] )): ?><?php echo $this->_tpl_vars['data']['value2']; ?>
<?php endif; ?></textarea>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
			
			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<div class="other-border">
								<label for="additional_history">Additional History</label>
								<textarea name="additional_history" id="additional_history" class="form-control textarea-height"><?php if (isset ( $this->_tpl_vars['data'] )): ?><?php echo $this->_tpl_vars['data']['additional_history']; ?>
<?php endif; ?></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 mx-auto mt-5">
						<input type="submit" name="submit" id="submit" value="<?php if (isset ( $this->_tpl_vars['edit'] )): ?> Update<?php else: ?> Add <?php endif; ?>" class="btn btn-primary form-control"/>
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
	});
</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>