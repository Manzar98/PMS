<?php /* Smarty version 2.6.26, created on 2012-04-28 12:21:52
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
		height: 100px;
	}
</style>
'; ?>

		<div id="content">
				<h2><?php if ($this->_tpl_vars['edit']): ?> Edit<?php else: ?> Add a<?php endif; ?> Patient Other History</h2>
				
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
			<form id="add_patient_other_history" class="form" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
				<fieldset>
					
					<label for="field1">Field 1
						<input type="text" name="field1" id="field1" value="<?php echo $this->_tpl_vars['data']['field1']; ?>
" /> 
					</label>
					
					<label for="value1">Value 1
						<textarea name="value1" id="value1" ><?php echo $this->_tpl_vars['data']['value1']; ?>
</textarea> 
					</label>
					
					<label for="field2">Field 2
						<input type="text" name="field2" id="field2" value="<?php echo $this->_tpl_vars['data']['field2']; ?>
" /> 						
					</label>
					<label for="value2">Value 2
						<textarea name="value2" id="value2" ><?php echo $this->_tpl_vars['data']['value2']; ?>
</textarea> 
					</label>
				</fieldset>
				<fieldset>
					
					
					<label for="additional_history">Additional History
						<textarea name="additional_history" id="additional_history" ><?php echo $this->_tpl_vars['data']['additional_history']; ?>
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