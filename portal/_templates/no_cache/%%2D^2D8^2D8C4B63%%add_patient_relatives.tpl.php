<?php /* Smarty version 2.6.26, created on 2012-04-28 09:40:22
         compiled from patients/add_patient_relatives.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

		<div id="content">
				<h2><?php if ($this->_tpl_vars['edit']): ?> Edit<?php else: ?> Add a<?php endif; ?> Patient Relatives</h2>
				
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
			<form id="add_patient_relatives" class="form" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
				<fieldset>
					
					<label for="cancer">Cancer
						<input type="text" name="cancer" id="cancer" maxlength="2" value="<?php echo $this->_tpl_vars['data']['cancer']; ?>
" />
					</label>
					
					<label for="diabetes">Diabetes
						<input type="text" name="diabetes" id="diabetes" maxlength="2" value="<?php echo $this->_tpl_vars['data']['diabetes']; ?>
" />
					</label>
					<label for="epilepsy">Epilepsy
						<input type="text" name="epilepsy" id="epilepsy" maxlength="2" value="<?php echo $this->_tpl_vars['data']['epilepsy']; ?>
" />
					</label>
					<label for="heart">Heart
						<input type="text" name="heart" id="heart" maxlength="2" value="<?php echo $this->_tpl_vars['data']['heart']; ?>
" />
					</label>
					<label for="high_blood_pressure">High Blood Pressure
						<input type="text" name="high_blood_pressure" id="high_blood_pressure" maxlength="2" value="<?php echo $this->_tpl_vars['data']['high_blood_pressure']; ?>
" />
					</label>
					
				</fieldset>
				
				<fieldset>
					
					<label for="mental_illness">Mental illness
						<input type="text" name="mental_illness" id="mental_illness" maxlength="2" value="<?php echo $this->_tpl_vars['data']['mental_illness']; ?>
" />
					</label>
					<label for="stroke">Stroke
						<input type="text" name="stroke" id="stroke" maxlength="2" value="<?php echo $this->_tpl_vars['data']['stroke']; ?>
" />
					</label>
					<label for="suicide">Suicide
						<input type="text" name="suicide" id="suicide" maxlength="2" value="<?php echo $this->_tpl_vars['data']['suicide']; ?>
" />
					</label>
					<label for="tuberculosis">Tuberculosis
						<input type="text" name="tuberculosis" id="tuberculosis" maxlength="2" value="<?php echo $this->_tpl_vars['data']['tuberculosis']; ?>
" />
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