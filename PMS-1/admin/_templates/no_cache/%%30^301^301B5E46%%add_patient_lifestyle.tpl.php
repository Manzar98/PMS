<?php /* Smarty version 2.6.26, created on 2012-04-28 09:29:47
         compiled from patients/add_patient_lifestyle.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

		<div id="content">
				<h2><?php if ($this->_tpl_vars['edit']): ?> Edit<?php else: ?> Add a<?php endif; ?> Patient Lifestyle</h2>
				
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
			<form id="add_patient" class="form" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
				<fieldset>
					<label for="tabacco">Tabacco
						<input type="checkbox" name="tabacco" id="tabacco" maxlength="50" value="1" <?php if ($this->_tpl_vars['data']['tabacco'] === '1'): ?> checked="checked" <?php endif; ?> />
					</label>
					
					<label for="coffee">Coffee
						<input type="checkbox" name="coffee" id="coffee" maxlength="50" value="1" <?php if ($this->_tpl_vars['data']['coffee'] === '1'): ?> checked="checked" <?php endif; ?> />
					</label>
					
					<label for="alcohol">Alcohol
						<input type="checkbox" name="alcohol" id="alcohol" maxlength="50" value="1" <?php if ($this->_tpl_vars['data']['alcohol'] === '1'): ?> checked="checked" <?php endif; ?> />
					</label>
					
					<label for="recreational_drugs">Recreational Drugs
						<input type="checkbox" name="recreational_drugs" id="recreational_drugs" maxlength="50" value="1" <?php if ($this->_tpl_vars['data']['recreational_drugs'] === '1'): ?> checked="checked" <?php endif; ?> />
					</label>
					
					<label for="counseling">Counseling
						<input type="checkbox" name="counseling" id="counseling" maxlength="50" value="1" <?php if ($this->_tpl_vars['data']['counseling'] === '1'): ?> checked="checked" <?php endif; ?> />
					</label>
					
				</fieldset>
				
				<fieldset>
					
					<label for="exercise_patterns">Exercise Patterns
						<input type="checkbox" name="exercise_patterns" id="exercise_patterns" maxlength="50" value="1" <?php if ($this->_tpl_vars['data']['exercise_patterns'] === '1'): ?> checked="checked" <?php endif; ?> />
					</label>
					
					<label for="hazardous_activities">Hazardous Activities
						<input type="checkbox" name="hazardous_activities" id="hazardous_activities" maxlength="50" value="1" <?php if ($this->_tpl_vars['data']['hazardous_activities'] === '1'): ?> checked="checked" <?php endif; ?> />
					</label>
					
					<label for="sleep_patterns">Sleep Patterns
						<input type="checkbox" name="sleep_patterns" id="sleep_patterns" maxlength="50" value="1" <?php if ($this->_tpl_vars['data']['sleep_patterns'] === '1'): ?> checked="checked" <?php endif; ?> />
					</label>
					
					<label for="seatbelt_use">Seatbelt Use
						<input type="checkbox" name="seatbelt_use" id="seatbelt_use" maxlength="50" value="1" <?php if ($this->_tpl_vars['data']['seatbelt_use'] === '1'): ?> checked="checked" <?php endif; ?> />
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