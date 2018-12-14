<?php /* Smarty version 2.6.31, created on 2018-12-14 14:20:03
         compiled from prescription/prescriptions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'print_r', 'prescription/prescriptions.tpl', 32, false),array('modifier', 'date_format', 'prescription/prescriptions.tpl', 89, false),array('modifier', 'default', 'prescription/prescriptions.tpl', 111, false),array('function', 'cycle', 'prescription/prescriptions.tpl', 108, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="" class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
">Dashboard</a>
				</li>
				<?php if (isset ( $this->_tpl_vars['id'] ) && $this->_tpl_vars['id'] == 'view' && $this->_tpl_vars['id'] != '0'): ?>
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/">Prescriptions</a>
				</li>
				<li class="breadcrumb-item active">View</li>
				<?php elseif (( isset ( $_GET['q'] ) && $_GET['q'] != '' )): ?>
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/">Prescriptions</a>
				</li>
				<li class="breadcrumb-item active">Search</li>
				<?php else: ?>
				<li class="breadcrumb-item active">Prescriptions</li>
				<?php endif; ?>
			</ol>
		</div>
		<?php if (( isset ( $this->_tpl_vars['errors'] ) && $this->_tpl_vars['errors'] )): ?>
		<div class="fail noprint">
			<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
			<?php echo $this->_tpl_vars['error']; ?>

			<?php endforeach; endif; unset($_from); ?>
		</div>
		<?php endif; ?>
		<!-- <?php echo ((is_array($_tmp=$_SESSION)) ? $this->_run_mod_handler('print_r', true, $_tmp) : print_r($_tmp)); ?>
 -->
		<?php if (( isset ( $_SESSION['flashAlert'] ) )): ?>
		<div class="fail text-center ">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<?php echo $_SESSION['flashAlert']; ?>

				<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="<?php  unset($_SESSION['flashAlert']);  ?>">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>		
		</div>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['id'] == '0'): ?>
		<h2 class="noprint py-2"><?php if (( isset ( $_GET['q'] ) && $_GET['q'] != '' )): ?> Search Result For "<b><?php echo $_GET['q']; ?>
</b>" <?php else: ?>Prescription List<?php endif; ?></h2>
		<p class="noprint">
			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-prescription/" title="Add a new Prescription"><i class="fa fa-plus-square sqicon" aria-hidden="true"></i></a>
		</p>
		
		<form class="box style noprint" action="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/" method="get" enctype="multipart/form-data">
			<fieldset>
				<legend>Search for Prescriptions</legend>
				<div class="row">
					<!-- <?php echo ((is_array($_tmp=$this->_tpl_vars['grouped_prescriptions'])) ? $this->_run_mod_handler('print_r', true, $_tmp) : print_r($_tmp)); ?>
	 				 -->
					<div class="col-md-3 col-sm-12">
						<div class="form-group">
							<select name="field" id="field" class="form-control">
								<option value="id" <?php if (( isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['field'] == 'id' )): ?> selected="selected" <?php endif; ?>>Prescription ID</option>
								<option value="patient_id" <?php if (( isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['field'] == 'patient_id' )): ?> selected="selected" <?php endif; ?>>Patient ID</option>
								<option value="patient_name" <?php if (( isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['field'] == 'patient_name' )): ?> selected="selected" <?php endif; ?>>Patient Name</option>
								<option value="complain" <?php if (( isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['field'] == 'complain' )): ?> selected="selected" <?php endif; ?>>Complain</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<input type="text" class="form-control" name="q" id="q" <?php if (isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['q']): ?>value="<?php echo $this->_tpl_vars['search']['q']; ?>
"<?php endif; ?> maxlength="20" />
						</div>
					</div>
					<div class="col-sm-2">
						<input class="btn btn-primary" type="submit" value="Search" name="submit" id="submit" />
					</div>
				</div>
			</fieldset>
		</form>
		<?php endif; ?>
		<?php if (( isset ( $this->_tpl_vars['grouped_prescriptions'] ) && $this->_tpl_vars['grouped_prescriptions'] )): ?>
		
		<div class="pull-right grp_btn">
			<span style="margin-bottom: 5px;">Group By :&nbsp;</span> 
			<a <?php if (( isset ( $this->_tpl_vars['group_by'] ) && $this->_tpl_vars['group_by'] == 'patient_id' )): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/?group_by=patient_id&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Patient ID</a>
			<a <?php if (( isset ( $this->_tpl_vars['group_by'] ) && $this->_tpl_vars['group_by'] == 'patient_name' )): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/?group_by=patient_name&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Name</a>
			<a <?php if (( isset ( $this->_tpl_vars['group_by'] ) && $this->_tpl_vars['group_by'] == 'complain' )): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/?group_by=complain&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Complain</a>
		</div>
		
		<?php $_from = $this->_tpl_vars['grouped_prescriptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['prescriptions']):
?>
		
		<table class="table table-striped table-bordered" >
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

				<?php $_from = $this->_tpl_vars['prescriptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['prescription']):
?>
				<tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
					<td class="bold"><?php echo $this->_tpl_vars['prescription']['id']; ?>
</td>
					<td><?php echo $this->_tpl_vars['prescription']['patient_name']; ?>
 (<?php echo $this->_tpl_vars['prescription']['patient_id']; ?>
)</td>
					<td><?php echo ((is_array($_tmp=@$this->_tpl_vars['prescription']['complain'])) ? $this->_run_mod_handler('default', true, $_tmp, '<span style="color:gray;font-style: italic;">Empty</span>') : smarty_modifier_default($_tmp, '<span style="color:gray;font-style: italic;">Empty</span>')); ?>
</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['prescription']['created_on'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
</td>
					<td>
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
					<td class="">
						No Prescription For this date
					</span>
				</td>
			</tr>
			<?php endif; unset($_from); ?>
		</tbody>
	</table>
	<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
	<!-- <?php echo $this->_tpl_vars['grouped_prescriptions']; ?>
 -->
	<div class="pagination">
		<?php echo $this->_tpl_vars['pages']; ?>

	</div>

	<?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data'] )): ?>
	<div id="prescription_info">
		<div class="row noprint">
			<div class="col-sm-11  py-3">
				<h3 class="hideThink noprint" >Patient's Details</h3>
			</div>
			<div class="col-sm-1  py-3 noprint">
				<input type="button"class="btn btn-primary printBtn form-control" value="Print" id="printPrescription">
			</div>
		</div> 
		<div class="pull-right pt-3">
			<span class="date text-dark">Date:&nbsp;&nbsp;<em><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['created_on'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</em></span>
		</div><br>
		<hr style="border-top: dotted 1px #DEDEDE; "/>
		<div class="mb-5">
			<ul class="patient_info list-inline text-center" style="font-size: 15px;">
				<li class="list-inline-item"><span style="font-weight: normal;"> Patient's Name: <span class="text-dark"><?php echo $this->_tpl_vars['data']['patient']['name']; ?>
</span></span></li>
				<li class="list-inline-item"><span style="font-weight: normal;">City: <span  class="text-dark"><?php echo $this->_tpl_vars['data']['patient']['city_name']; ?>
</span></span ></li>
				<li class="list-inline-item"><span style="font-weight: normal;">Gender:<?php if (isset ( $this->_tpl_vars['data']['patient']['gender'] )): ?><span  class="text-dark"><?php echo $this->_tpl_vars['data']['patient']['gender']; ?>
 </span><?php endif; ?></span></li>
				<li class="list-inline-item"><span style="font-weight: normal;">Date of Birth: <span  class="text-dark"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['patient']['dob'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</span></span></li>
				<li class="list-inline-item"> <span style="font-weight: normal;">ID: <span  class="text-dark"><?php echo $this->_tpl_vars['data']['patient']['id']; ?>
</span></span></li>
			</ul>	
		</div>

		<div class="row instr_detail_row">
			<div class="col-sm-6">
				<h3 class="pb-3">Instructions</h3>

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

				<h3 class="pb-3">Tests</h3>


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
					<h3 class="pb-3">Details</h3>
					<dl class="separator" style="margin-top: 23px;">
						<dt style="font-size: 13px;" class="text-dark">Description</dt>
						<dd><?php echo $this->_tpl_vars['data']['description']; ?>
</dd>
						<dt style="font-size: 13px;" class="text-dark">Complain</dt>
						<dd><strong><?php echo $this->_tpl_vars['data']['complain']; ?>
</strong></dd>
						<dd><?php echo $this->_tpl_vars['data']['complain_detail']; ?>
</dd>
						<dt style="font-size: 13px;" class="text-dark">Next Plan</dt>
						<dd><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['next_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
</strong></dd>
						<dd><?php echo $this->_tpl_vars['data']['next_plan']; ?>
</dd>
						<dt style="font-size: 13px;" class="text-dark">Address</dt>
						<dd><?php echo $this->_tpl_vars['data']['patient']['address']; ?>
</dd>

					</dl>
				</div>
			</div>
		</div>
		<p id="fee" class="text-dark"> Fee Received : <strong><?php echo $this->_tpl_vars['data']['fee_received']; ?>
</strong>    </p>
		<p class="noprint text-dark">Print Fee Amount <input type="checkbox" name="print_fee" id="print_fee" value="1" checked="checked" /></p>
	</div>
	<p></p>

	<br /><br /><br />
	<br />

	<br />
	<?php endif; ?>
</div>

</div><!-- #content -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
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
			//debugger;
			if($("#print_fee").prop("checked") == true)
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
		$(\'#collapsePrescription\').collapse({
			toggle: true
		})
	});
</script>

'; ?>