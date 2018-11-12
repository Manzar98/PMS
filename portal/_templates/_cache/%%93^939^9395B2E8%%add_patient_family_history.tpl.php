<?php /* Smarty version 2.6.31, created on 2018-08-15 17:06:24
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

<div id="content">
	<div class="container-fluid">
		<h2><?php if (isset ( $this->_tpl_vars['edit'] )): ?> Edit<?php else: ?> Add a<?php endif; ?> Patient Family History</h2>

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
		<form id="add_patient_family_history" class="" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="family-border">
							<label for="father">Father</label>
							<textarea name="father" id="father" class="form-control"><?php if (isset ( $this->_tpl_vars['data'] )): ?><?php echo $this->_tpl_vars['data']['father']; ?>
<?php endif; ?></textarea> 
						</div>
					</div>
					<div class="col-sm-6">
						<div class="family-border">
							<label for="mother">Mother</label>
							<textarea name="mother" id="mother" class="form-control"><?php if (isset ( $this->_tpl_vars['data'] )): ?><?php echo $this->_tpl_vars['data']['mother']; ?>
<?php endif; ?></textarea>
						</div> 
					</div>
				</div>
			</fieldset>

			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="family-border">
							<label for="siblings">Siblings</label>
							<textarea name="siblings" id="siblings" class="form-control"><?php if (isset ( $this->_tpl_vars['data'] )): ?><?php echo $this->_tpl_vars['data']['siblings']; ?>
<?php endif; ?></textarea>  
						</div>
					</div>
					<div class="col-sm-6">
						<div class="family-border">
							<label for="spouse">Spouse</label>
							<textarea name="spouse" id="spouse" class="form-control"><?php if (isset ( $this->_tpl_vars['data'] )): ?><?php echo $this->_tpl_vars['data']['spouse']; ?>
<?php endif; ?></textarea> 
						</div> 
					</div>
				</div>
			</fieldset>

			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="family-border">
							<label for="offspring">Offspring</label>
							<textarea name="offspring" id="offspring" class="form-control"><?php if (isset ( $this->_tpl_vars['data'] )): ?><?php echo $this->_tpl_vars['data']['offspring']; ?>
<?php endif; ?></textarea> 
						</div>
					</div>
					<div class="col-sm-6">
						<div class="family-border">
							<label for="submit"></label>
							<input type="submit" name="submit" id="submit" value="<?php if (isset ( $this->_tpl_vars['edit'] )): ?> Update<?php else: ?> Add <?php endif; ?>" class="btn btn-primary" style="margin-top: 20px;" />
						</div>
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