<?php /* Smarty version 2.6.31, created on 2018-07-16 17:19:33
         compiled from prescription/prescriptions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'prescription/prescriptions.tpl', 95, false),array('modifier', 'default', 'prescription/prescriptions.tpl', 117, false),array('function', 'cycle', 'prescription/prescriptions.tpl', 114, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '

<script type="text/javascript">
	$(document).ready(function(){
		
		
		$("#header-footer").checked = false;		
		$("#field").change(function(){
			
			if( $("#field").val()== \'created_on\')
			{
				
				$("#q").datepicker({
					dateFormat : "yy-mm-dd",
					changeMonth: true,
				});
				$("#q").datepicker("show");
			}	
			else
			{
				$("#q").datepicker("destroy");
			}
		});
		
		$("#print_fee").click(function()
		{
			if(("#print_fee").checked == true)
			{
				$("#fee").removeClass("noprint");
			}
			else
			{
				$("#fee").addClass("noprint");
			}
		});
		
	});
</script>

'; ?>

		<div id="content">
			
				
				<?php if (( isset ( $this->_tpl_vars['errors'] ) && $this->_tpl_vars['errors'] )): ?>
					<div class="fail noprint">
						<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
							<?php echo $this->_tpl_vars['error']; ?>

						<?php endforeach; endif; unset($_from); ?>
					</div>
				<?php endif; ?>
			
			
				
				<h2 class="noprint"><?php if (( isset ( $_GET['q'] ) && $_GET['q'] != '' )): ?> Search Result For "<b><?php echo $_GET['q']; ?>
</b>" <?php else: ?>Prescription List<?php endif; ?></h2>
				
			<p class="noprint">
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-prescription/" title="Add a new Prescription"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/plus-button.png" alt="Add new" /></a>
			</p>
			<form class="box style noprint" action="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/" method="get" enctype="multipart/form-data">
				<p>
				<select name="field" id="field">
					<option value="id" <?php if (( isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['field'] == 'id' )): ?> selected="selected" <?php endif; ?>>Prescription ID</option>
					<option value="patient_id" <?php if (( isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['field'] == 'patient_id' )): ?> selected="selected" <?php endif; ?>>Patient ID</option>
					<option value="patient_name" <?php if (( isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['field'] == 'patient_name' )): ?> selected="selected" <?php endif; ?>>Patient Name</option>
					<option value="created_on" <?php if (( isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['field'] == 'created_on' )): ?> selected="selected" <?php endif; ?>>Date</option>
					<option value="complain" <?php if (( isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['field'] == 'complain' )): ?> selected="selected" <?php endif; ?>>Complain</option>
				</select>
				
				<input type="text" name="q" id="q" <?php if (isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['q']): ?>value="<?php echo $this->_tpl_vars['search']['q']; ?>
"<?php endif; ?> maxlength="20" />
				
				<input type="submit" value="Search" name="submit" id="submit" />
				</p>
			</form>
			
			<?php if (( isset ( $_GET['q'] ) && $_GET['q'] != '' )): ?>
				<p class="noprint"><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/">Back to all Prescription List</a></p>
			<?php endif; ?>

				<?php if ($this->_tpl_vars['grouped_prescriptions']): ?>
				
				<div style="text-align: right" class="pagination">
					Group By : 
					<a <?php if ($this->_tpl_vars['group_by'] == 'date'): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/?group_by=date&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Date</a>
					<a <?php if ($this->_tpl_vars['group_by'] == 'patient_id'): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/?group_by=patient_id&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Patient ID</a>
					<a <?php if ($this->_tpl_vars['group_by'] == 'patient_name'): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/?group_by=patient_name&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Name</a>
					<a <?php if ($this->_tpl_vars['group_by'] == 'complain'): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/?group_by=complain&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Complain</a>
				</div>
				
				<?php $_from = $this->_tpl_vars['grouped_prescriptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['prescriptions']):
?>
			
				<table class="zebra" >
					<?php if ($this->_tpl_vars['group_by'] == 'date'): ?>
						<caption><?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
</caption>				
					<?php elseif ($this->_tpl_vars['group_by'] == 'patient_id'): ?>
						<caption>Patient ID: <?php echo $this->_tpl_vars['key']; ?>
</caption>
					<?php else: ?>
						<caption><?php echo $this->_tpl_vars['key']; ?>
</caption>
					<?php endif; ?>
					
					<thead>
						<tr>
							<th>ID</th>
							<th>Patient Name (ID)</th>
							<th>Complain</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					<?php $_from = $this->_tpl_vars['prescriptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['prescription']):
?>
					<tr class="row <?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
						<td class="bold" width="35"><?php echo $this->_tpl_vars['prescription']['id']; ?>
</td>
						<td width="200"><?php echo $this->_tpl_vars['prescription']['patient_name']; ?>
 (<?php echo $this->_tpl_vars['prescription']['patient_id']; ?>
)</td>
						<td><?php echo ((is_array($_tmp=@$this->_tpl_vars['prescription']['complain'])) ? $this->_run_mod_handler('default', true, $_tmp, '<span style="color:gray;font-style: italic;">Empty</span>') : smarty_modifier_default($_tmp, '<span style="color:gray;font-style: italic;">Empty</span>')); ?>
</td>
						<td width="200"><?php echo ((is_array($_tmp=$this->_tpl_vars['prescription']['created_on'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
</td>
						<td width="65">
							<div class="icons">				
								<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/view/<?php echo $this->_tpl_vars['prescription']['id']; ?>
/" title="View this Prescription"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/eye.png" alt="View" /></a>
								<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
edit-prescription/<?php echo $this->_tpl_vars['prescription']['id']; ?>
/" title="Edit this Prescription"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
								<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/delete/<?php echo $this->_tpl_vars['prescription']['id']; ?>
/" title="Delete this Prescription" onclick="if(!confirm('Are you sure you want to delete this?'))return false;"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/bin.png" alt="Delete" /></a>
							</div>
						</td>
					</tr>
					<?php endforeach; else: ?>
						<tr style="color:red;">
							<td>
								No Prescription For this date
							</td>
						</tr>
					<?php endif; unset($_from); ?>
				</tbody>
				</table>

				<?php endforeach; endif; unset($_from); ?>

				<div class="pagination">
					<?php echo $this->_tpl_vars['pages']; ?>

				</div>
				
				
				
				
				<?php elseif ($this->_tpl_vars['data']): ?>
				<div id="prescription_info"> 
				<h3 class="noprint" style="float: left;">Patient's Details</h3>
				<span class="date">Date:<em><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['created_on'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
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
					<h3>Instructions</h3>
					
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
					<hr class="noprint dotted"/>
					
					<h3>Tests</h3>
					
					
					<?php $_from = $this->_tpl_vars['data']['tests']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['test']):
?>
						<table class="zebra tests">
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
				
					
					<p id="fee"> Fee Received : <strong><?php echo $this->_tpl_vars['data']['fee_received']; ?>
</strong>    </p>
					<p class="noprint">Print Fee Amount <input type="checkbox" name="print_fee" id="print_fee" value="1" checked="checked" /></p>
					
					</div>
					
					
					
					<div class="details">
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
				
				
				
				
				
				
				<p></p>
				
				<br /><br /><br />
				<br />
				
				<br />
				
				
				
				<?php else: ?>
					
					<p class="box-info">No Prescription on the List</p>
				
				<?php endif; ?>
				
		</div><!-- #content -->
		
<div class="print branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>