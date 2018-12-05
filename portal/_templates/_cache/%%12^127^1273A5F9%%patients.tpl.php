<?php /* Smarty version 2.6.31, created on 2018-12-05 18:27:30
         compiled from patients/patients.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'patients/patients.tpl', 63, false),array('modifier', 'default', 'patients/patients.tpl', 67, false),array('function', 'cycle', 'patients/patients.tpl', 81, false),)), $this); ?>
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
				<?php if (( isset ( $_GET['q'] ) && $_GET['q'] != '' )): ?>
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients">Patients</a>
				</li>
				<li class="breadcrumb-item active">Search</li>
				<?php else: ?>
				<li class="breadcrumb-item active">Patients</li>
				<?php endif; ?>
			</ol>
		</div>
		<h2 class="py-2"><?php if ($_GET['q'] != ''): ?> Search Result For "<b><?php echo $_GET['q']; ?>
</b>" <?php else: ?>Patient List<?php endif; ?></h2>
		<p>
			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/add/" title="Add a new patient"><i class="fa fa-plus-square sqicon" aria-hidden="true"></i></a>
		</p>
		<form class="box style" action="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/" method="get" enctype="multipart/form-data">
			<fieldset>
				<legend>Search for Patients</legend>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
					<select name="field" id="field" class="form-control">
						<option value="id" <?php if ($this->_tpl_vars['data']['field'] == 'id'): ?> selected="selected" <?php endif; ?>>Patient ID</option>
						<option value="name" <?php if ($this->_tpl_vars['data']['field'] == 'name'): ?> selected="selected" <?php endif; ?>>Patient Name</option>
						<option value="mobile" <?php if ($this->_tpl_vars['data']['field'] == 'mobile'): ?> selected="selected" <?php endif; ?>>Mobile No</option>
						<option value="phone" <?php if ($this->_tpl_vars['data']['field'] == 'phone'): ?> selected="selected" <?php endif; ?>>Phone No</option>
					</select>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
					<input type="text" name="q" id="q" value="<?php echo $this->_tpl_vars['data']['q']; ?>
" maxlength="20" class="form-control"/>
				</div>
			</div>
				<div class="col-sm-1">
					<input type="submit" value="Search" name="submit" id="submit" class="btn btn-primary form-control"/>
				</div>
			</div>
		</fieldset>
		</form>		
		<div class="pull-right grp_btn">
			Group By : &nbsp;
			<a <?php if ($this->_tpl_vars['group_by'] == 'date'): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/?group_by=date&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Date</a>
			<a <?php if ($this->_tpl_vars['group_by'] == 'blood_group'): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/?group_by=blood_group&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Blood Group</a>
			<a <?php if ($this->_tpl_vars['group_by'] == 'patient_name'): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/?group_by=patient_name&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Name</a>
			<a <?php if ($this->_tpl_vars['group_by'] == 'city'): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/?group_by=city_name&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">City</a>
			<a <?php if ($this->_tpl_vars['group_by'] == 'gender'): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/?group_by=gender&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Gender</a>
			<a <?php if ($this->_tpl_vars['group_by'] == 'marital_status'): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/?group_by=marital_status&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Marital Status </a>
		</div>
		<?php if ($this->_tpl_vars['grouped_patients']): ?>
		<?php $_from = $this->_tpl_vars['grouped_patients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['patients']):
?>
		
		<table class="table table-striped table-bordered" >
			<?php if ($this->_tpl_vars['group_by'] == 'date'): ?>
			<caption><?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
</caption>				
			<?php elseif ($this->_tpl_vars['group_by'] == 'patient_id'): ?>
			<caption>Patient ID: <?php echo $this->_tpl_vars['key']; ?>
</caption>
			<?php else: ?>
			<caption><?php echo ((is_array($_tmp=@$this->_tpl_vars['key'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Empty Value') : smarty_modifier_default($_tmp, 'Empty Value')); ?>
</caption>
			<?php endif; ?>
			<thead class="">
				<tr>
					<th>ID</th>
					<th>Patient Name</th>
					<th>Mobile</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>					

				<?php $_from = $this->_tpl_vars['patients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['patient']):
?>
				<tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
					<td class="bold"><?php echo $this->_tpl_vars['patient']['patient_id']; ?>
</td>
					<td width="400"><?php echo $this->_tpl_vars['patient']['patient_name']; ?>
</td>
					<td width="400"><?php echo $this->_tpl_vars['patient']['mobile']; ?>
</td>
					<td width="250">
						<div class="icons">				
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patient-family-history/add/<?php echo $this->_tpl_vars['patient']['patient_id']; ?>
/" title="Add Family History">
								<img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/user_male_16.png" alt="family"/>
							</a>
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patient-lifestyle/add/<?php echo $this->_tpl_vars['patient']['patient_id']; ?>
/" title="Add History">
								<img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/address_book_16.png" alt="Histor" />
							</a>
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patient-other-history/add/<?php echo $this->_tpl_vars['patient']['patient_id']; ?>
/" title="Add Other History">
								<img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/cabinet_open_16.png" alt="Other History" />
							</a>
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patient-relatives/add/<?php echo $this->_tpl_vars['patient']['patient_id']; ?>
/" title="Add Relatives">
								<img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/chat_box_16.png" alt="Relatives" />
							</a>
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/view/<?php echo $this->_tpl_vars['patient']['patient_id']; ?>
/" title="View this patient"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/eye.png" alt="View" /></a>

							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/<?php echo $this->_tpl_vars['patient']['patient_id']; ?>
/" title="View list of prescription against this patient">
								<img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/121-512.png" alt="prescription" width="10%" />
							</a>
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/edit/<?php echo $this->_tpl_vars['patient']['patient_id']; ?>
/" title="Edit this patient"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/delete/<?php echo $this->_tpl_vars['patient']['patient_id']; ?>
/" title="Delete this patient" onclick="if(!confirm('Are you sure you want to delete this?'))return false;"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/bin.png" alt="Delete" /></a>
						</div>
					</td>
				</tr>
				<?php endforeach; else: ?>
				<tr style="color:red;">
					<td>
						No Patients on the List
					</td>
				</tr>
				<?php endif; unset($_from); ?>
			</tbody>
		</table>
		<?php endforeach; endif; unset($_from); ?>
		<?php else: ?>
		<p class="box-info text-center" style="margin-top: 7rem!important;">No Patient against this <?php echo $_GET['field']; ?>
</p>
		<?php endif; ?>
		<div class="pagination"><?php echo $this->_tpl_vars['pages']; ?>
</div>
	</div><!-- #content -->
</div>
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>