<?php /* Smarty version 2.6.31, created on 2018-12-05 18:07:29
         compiled from patients/add_patient_family_history.tpl */ ?>
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
				<li class="breadcrumb-item active text-capitalize"><?php if (isset ( $this->_tpl_vars['edit'] )): ?> Edit<?php else: ?> Add<?php endif; ?> Family History</li>
			</ol>
		</div>
		<h2 class="py-2"><?php if (isset ( $this->_tpl_vars['edit'] )): ?> Edit<?php else: ?> Add a<?php endif; ?> Patient Family History</h2>

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
		<form id="add_patient_family_history" class="box " action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
			<fieldset>
				<legend>Family History</legend>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="father">Father</label>
							<textarea name="father" id="father" class="form-control"><?php if (isset ( $this->_tpl_vars['data'] )): ?><?php echo $this->_tpl_vars['data']['father']; ?>
<?php endif; ?></textarea> 
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="mother">Mother</label>
							<textarea name="mother" id="mother" class="form-control"><?php if (isset ( $this->_tpl_vars['data'] )): ?><?php echo $this->_tpl_vars['data']['mother']; ?>
<?php endif; ?></textarea>
						</div> 
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="siblings">Siblings</label>
							<textarea name="siblings" id="siblings" class="form-control"><?php if (isset ( $this->_tpl_vars['data'] )): ?><?php echo $this->_tpl_vars['data']['siblings']; ?>
<?php endif; ?></textarea>  
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="spouse">Spouse</label>
							<textarea name="spouse" id="spouse" class="form-control"><?php if (isset ( $this->_tpl_vars['data'] )): ?><?php echo $this->_tpl_vars['data']['spouse']; ?>
<?php endif; ?></textarea> 
						</div> 
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="offspring">Offspring</label>
							<textarea name="offspring" id="offspring" class="form-control"><?php if (isset ( $this->_tpl_vars['data'] )): ?><?php echo $this->_tpl_vars['data']['offspring']; ?>
<?php endif; ?></textarea> 
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 mx-auto py-4">
							<input type="submit" name="submit" id="submit" value="<?php if (isset ( $this->_tpl_vars['edit'] )): ?> Update<?php else: ?> Add <?php endif; ?>" class="btn btn-primary form-control"/>
						
					</div> 
				</div>
			</fieldset>	
		</form>
		<div class="" style="margin-bottom: 20px;"></div>
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