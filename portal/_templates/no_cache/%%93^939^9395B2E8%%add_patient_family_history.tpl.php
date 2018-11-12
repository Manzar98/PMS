<?php /* Smarty version 2.6.26, created on 2012-04-30 18:22:28
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
		height: 100px;
	}
</style>
'; ?>

		<div id="content">
				<h2><?php if ($this->_tpl_vars['edit']): ?> Edit<?php else: ?> Add a<?php endif; ?> Patient Family History</h2>
				
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
				ID: <strong><?php echo $this->_tpl_vars['patient_details']['id']; ?>
</strong><br/>
				Name: <strong><?php echo $this->_tpl_vars['patient_details']['name']; ?>
</strong><br/>
				Mobile No: <strong><?php echo $this->_tpl_vars['patient_details']['mobile']; ?>
</strong>
			</p>	
			<form id="add_patient_family_history" class="form" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
				<fieldset>
					
					<label for="father">Father
						<textarea name="father" id="father" ><?php echo $this->_tpl_vars['data']['father']; ?>
</textarea> 
					</label>
					
					<label for="mother">Mother
						<textarea name="mother" id="mother" ><?php echo $this->_tpl_vars['data']['mother']; ?>
</textarea> 
					</label>
					
					<label for="siblings">Siblings
						<textarea name="siblings" id="siblings" ><?php echo $this->_tpl_vars['data']['siblings']; ?>
</textarea> 
					</label>
				</fieldset>
				<fieldset>
					<label for="spouse">Spouse
						<textarea name="spouse" id="spouse" ><?php echo $this->_tpl_vars['data']['spouse']; ?>
</textarea> 
					</label>
					
					<label for="offspring">Offspring
						<textarea name="offspring" id="offspring" ><?php echo $this->_tpl_vars['data']['offspring']; ?>
</textarea> 
					</label>
					
					<label for="submit">
						<input type="submit" name="submit" id="submit" value="<?php if ($this->_tpl_vars['edit']): ?> Update<?php else: ?> Add <?php endif; ?>" />
					</label>
				</fieldset>
									
			</form>
		</div><!-- #content -->

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