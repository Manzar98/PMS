<?php /* Smarty version 2.6.31, created on 2018-11-15 14:17:54
         compiled from appointments/search_history.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'appointments/search_history.tpl', 20, false),array('modifier', 'default', 'appointments/search_history.tpl', 23, false),array('modifier', 'date_format', 'appointments/search_history.tpl', 24, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="content" class="publicWrap">

	<?php echo $this->_tpl_vars['record']; ?>

	<?php if (isset ( $this->_tpl_vars['record'] )): ?>

	<table class="table table-striped table-bordered" >
		<thead class="">
			<tr>
				<th>ID</th>
				<th>Patient Name (ID)</th>
				<th>Complain</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

			<?php $_from = $this->_tpl_vars['record']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['prescription']):
?>
			<tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
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
					<div class="icons text-center">				
						<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
history/view/<?php echo $this->_tpl_vars['prescription']['id']; ?>
/" title="View this Prescription"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/eye.png" alt="View" /></a>
					</div>
				</td>
			</tr>
			<?php endforeach; else: ?>
			<tr style="color:red;">
				<td>
					No prescriptions generated for this patient.
				</td>
			</tr>
			<?php endif; unset($_from); ?>
		</tbody>
	</table>
	<?php elseif (isset ( $this->_tpl_vars['data'] )): ?>
	<div id="prescription_info">
		<div class="row">
			<div class="col-sm-10">
				<h3 class="hideThink" >Patient's Details</h3>
			</div>
			<div class="col-sm-2">
				<span class="date">Date:<em><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['created_on'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</em></span>

			</div>
			<div class="noprint" style="margin-right: 50px;">
				<input type="button"class="btn btn-primary printBtn pull-right" value="Print" id="printPrescription">
			</div> 
		</div>

		<hr style="border-top: dotted 1px #DEDEDE; " />
		<div>
			<ul class="patient_info list-inline">
				<li><span style="font-weight: normal;"> Patient's Name: <span><?php echo $this->_tpl_vars['data']['patient']['name']; ?>
</span></span></li>
				<li><span style="font-weight: normal;">City: <span><?php echo $this->_tpl_vars['data']['patient']['city_name']; ?>
</span></span ></li>
				<li><span style="font-weight: normal;">Gender:<?php if (isset ( $this->_tpl_vars['data']['patient']['gender'] )): ?><span><?php echo $this->_tpl_vars['data']['patient']['gender']; ?>
 </span><?php endif; ?></span></li>
				<li><span style="font-weight: normal;">Date of Birth: <span><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['patient']['dob'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</span></span></li>
				<li><span style="font-weight: normal;">ID: <span><?php echo $this->_tpl_vars['data']['patient']['id']; ?>
</span></span></li>
			</ul>	
		</div>

		<div class="row">
			<div class="col-sm-6">
				<h3>Instructions</h3>
				<?php if ($this->_tpl_vars['data']['instructions']): ?>
				<table class="table table-bordered table-striped instructions">
					<caption>Instructions</caption>
					<thead class="thead-dark">
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
</td>
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
				<table class="table table-bordered table-striped tests">
					<caption><?php echo $this->_tpl_vars['test']['test_name']; ?>
</caption>

					<thead class="thead-dark">
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
			<div class="col-sm-1"></div>
			<div class="col-sm-4">
				<div class="">
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
						<dt>Address</dt>
						<dd><?php echo $this->_tpl_vars['data']['patient']['address']; ?>
</dd>

					</dl>
				</div>
			</div>
		</div>
		<p id="fee"> Fee Received : <strong><?php echo $this->_tpl_vars['data']['fee_received']; ?>
</strong>    </p>
	</div>
	<p></p>
	
	<br /><br /><br />
	<br />
	
	<br />
	<?php else: ?>

	<input type="hidden" name="" value="<?php echo $this->_tpl_vars['resp']; ?>
" id="resp">
	<form id="check_patient" class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-4">
				<label for="dt" class="">Patient Id</label>
				<input type="text" name="p_id" id="" class="form-control" />
			</div>
			<div class="col-sm-4">
				<label for="dt" class="">Security Key</label>
				<input type="text" name="key" id="" class="form-control" />
			</div>
			<div class="col-sm-1" style="padding-top: 24px;">
				<input type="submit" class="btn btn-primary" value="Search" />
			</div>
		</div>
	</form>

	<?php endif; ?>
	<div style="margin-top: 30px;"></div>
</div><!-- #content -->

<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
<?php echo '
<style type="text/css">
	 .docWrap{
	 	display: none;/*Hide Main heading For customers*/
	 }
</style>
<script type="text/javascript">
	$(document).ready(function()
	{
		
		if ($(\'#resp\').val()) {
			alert($(\'#resp\').val());
		}
		

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

		$("#printPrescription").click(function(){
			
			window.print();
		});

	});


</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>