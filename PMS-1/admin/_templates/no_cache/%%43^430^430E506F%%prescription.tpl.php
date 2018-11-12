<?php /* Smarty version 2.6.26, created on 2012-06-16 11:15:13
         compiled from prescription/prescription.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id="content">
				<h2>Prescription Info</h2>
				
				<?php if ($this->_tpl_vars['errors']): ?>
					<div class="fail">
						<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
							<?php echo $this->_tpl_vars['error']; ?>

						<?php endforeach; endif; unset($_from); ?>
					</div>
				<?php endif; ?>
				
				
				<?php if ($this->_tpl_vars['prescriptions']): ?>
				
				
				
				
				
				
				
				
				<?php elseif ($this->_tpl_vars['data']): ?>
				<div>
					Patient ID: <?php echo $this->_tpl_vars['data']['patient_id']; ?>
 Name: <?php echo $this->_tpl_vars['data']['patient']['name']; ?>
 City: <?php echo $this->_tpl_vars['data']['patient']['city_name']; ?>
<br/><br/>
					

					<strong>Description: </strong><?php echo $this->_tpl_vars['data']['description']; ?>
<br/>
					<strong>Complain: </strong><?php echo $this->_tpl_vars['data']['complain']; ?>
<br/>
					<strong>Complain Detail: </strong><?php echo $this->_tpl_vars['data']['complain_detail']; ?>
<br/>
					<strong>Next Plan: </strong><?php echo $this->_tpl_vars['data']['next_plan']; ?>
<br/>
					<strong>Next Date: </strong><?php echo $this->_tpl_vars['data']['next_date']; ?>
<br/>
					
					
					<br/>
					<br/>
					
					<h2>Medicines</h2>
					<?php $_from = $this->_tpl_vars['data']['instructions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ins']):
?>
						<?php echo $this->_tpl_vars['ins']['name']; ?>
 (<?php echo $this->_tpl_vars['ins']['dose']; ?>
) : <?php echo $this->_tpl_vars['ins']['instruction']; ?>
<br/><br/>
					<?php endforeach; endif; unset($_from); ?>
					
					<?php $_from = $this->_tpl_vars['data']['tests']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['test']):
?>
						<h3><?php echo $this->_tpl_vars['test']['test_name']; ?>
</h3><br/>
						
						<?php $_from = $this->_tpl_vars['test']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option']):
?>
							<?php echo $this->_tpl_vars['option']['option_name']; ?>
 -> <?php echo $this->_tpl_vars['option']['result']; ?>
<?php echo $this->_tpl_vars['option']['measurement']; ?>
 (<?php echo $this->_tpl_vars['option']['normal_range']; ?>
)
							</br/>
						<?php endforeach; endif; unset($_from); ?>
						
					<?php endforeach; endif; unset($_from); ?>
					
					
				</div>
				
				<?php endif; ?>
				
		</div><!-- #content -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>