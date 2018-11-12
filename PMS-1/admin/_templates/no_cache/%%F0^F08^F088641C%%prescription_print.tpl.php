<?php /* Smarty version 2.6.26, created on 2012-07-01 09:14:15
         compiled from prescription/prescription_print.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'prescription/prescription_print.tpl', 16, false),)), $this); ?>
<html>
	<head>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/print.css" type="text/css" media="print" />
		
	</head>
	<body>
		

		<div id="content">
			
				
			
				<?php if ($this->_tpl_vars['data']): ?>
				<div id="prescription_info"> 
				<h3 style="float: left;">Patient's Details</h3>
				<span style="float: right;margin:20px 10px 0 0">Date:<em><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['created_on'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</em></span>
				<hr class="dotted clear" />
				<div>
					<p class="patient_info">
						<span>Patient's Name: <span><?php echo $this->_tpl_vars['data']['patient']['name']; ?>
</span></span>
						<span>City: <span><?php echo $this->_tpl_vars['data']['patient']['city_name']; ?>
</span></span>
						<span>Gender: <span><?php echo $this->_tpl_vars['data']['patient']['gender']; ?>
</span></span>
						<span>Date of Birth: <span><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['patient']['dob'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</span></span>
						<span style="font-weight: normal;">ID: <span><?php echo $this->_tpl_vars['data']['patient']['id']; ?>
</span></span>
					</p>
					
					
					<div style="width: 50%;float: left;">
					
					<?php if ($this->_tpl_vars['data']['instructions']): ?>
					<table class="zebra instructions">
						<caption>Instructions</caption>
						<thead>
							<tr>
								<th>Medicine</th>
								<th>Dose</th>
								<th>Instruction</th>
							</tr>
						</thead>
						<tbody>
							<?php $_from = $this->_tpl_vars['data']['instructions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ins']):
?>
							 <tr>
							 <td class="medicine_name"><?php echo $this->_tpl_vars['ins']['name']; ?>
</td>
							 <td class="dose">(<?php echo $this->_tpl_vars['ins']['dose']; ?>
)</td> 
							 <td class="instruction"><?php echo $this->_tpl_vars['ins']['instruction']; ?>
</td></li>
							 </tr>
							<?php endforeach; endif; unset($_from); ?>
						</tbody>
					</table>
					<?php else: ?>
					
					<p class="box-info">No Instructions for this prescription.</p>
					
					<?php endif; ?>
					<hr class="dotted"/>
					
					<?php $_from = $this->_tpl_vars['data']['tests']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['test']):
?>
						<table class="zebra">
							<caption><?php echo $this->_tpl_vars['test']['test_name']; ?>
</caption>
							
						<thead>
							<tr>
								<th>Test Field</th>
								<th>Result</th>
								<th>Default</th>
							</tr>
						</thead>
						<tbody>
						<?php $_from = $this->_tpl_vars['test']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option']):
?>
							<tr>
								<td width="40%"><?php echo $this->_tpl_vars['option']['option_name']; ?>
</td> 
								<td width="30%"><?php echo $this->_tpl_vars['option']['result']; ?>
<?php echo $this->_tpl_vars['option']['measurement']; ?>
</td>
								<td width="30%"><?php echo $this->_tpl_vars['option']['normal_range']; ?>
</td>
							</tr>
						<?php endforeach; endif; unset($_from); ?>
						</tbody>
						</table>
					
					<?php endforeach; else: ?>	
						<p class="box-info">No Tests for this prescription.</p>
					<?php endif; unset($_from); ?>
				
					
					</div>
					
					
					
					<div style="width: 42%;float: right;padding-left: 20px;margin-left: 20px;">
						<h3>Details</h3>
					<dl class="separator" style="margin-top: 23px;">
						<dt>Description</dt>
						<dd><?php echo $this->_tpl_vars['data']['description']; ?>
</dd>
						<dt>Complain</dt>
						<dd><strong><?php echo $this->_tpl_vars['data']['complain']; ?>
</strong></dd>
						<dd><?php echo $this->_tpl_vars['data']['complain_detail']; ?>
</dd>
						<dt>Next Plan</dt>
						<dd><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['next_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
</strong></dd>
						<dd><?php echo $this->_tpl_vars['data']['next_plan']; ?>
</dd>
					</dl>
						</div>
				
										
				</div>
				</div>
				<?php else: ?>
					
					<p class="box-info">No Prescription on the List</p>
				
				<?php endif; ?>
				
		</div><!-- #content -->
	</body>
</html>