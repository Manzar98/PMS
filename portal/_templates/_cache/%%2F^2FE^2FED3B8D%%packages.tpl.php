<?php /* Smarty version 2.6.31, created on 2018-12-04 18:03:48
         compiled from packages/packages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'packages/packages.tpl', 36, false),)), $this); ?>
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
packages/">Packages</a>
				</li>
				<li class="breadcrumb-item active">View</li>
				<?php else: ?>
				<li class="breadcrumb-item active">Packages</li>
				<?php endif; ?>
			</ol>
		</div>
       <?php if (isset ( $this->_tpl_vars['record'] ) && $this->_tpl_vars['record']): ?>  
       <h2>Packages List</h2>
		<p class="common-top">
			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
/add-package/" title="Add a new"><i class="fa fa-plus-square sqicon" aria-hidden="true"></i></a>
		</p>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Package Name</th>
					<th>Package Price</th>
					<th>No of Patients</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $_from = $this->_tpl_vars['record']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rec']):
?>
				<tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
					<td><?php echo $this->_tpl_vars['rec']['pkg_name']; ?>
</td>
					<td><?php echo $this->_tpl_vars['rec']['pkg_price']; ?>
</td>
					<td><?php echo $this->_tpl_vars['rec']['no_of_patients']; ?>
</td>
					<td width="">
						<div class="icons">				
						<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
packages/view/<?php echo $this->_tpl_vars['rec']['id']; ?>
/" title="View this package"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/eye.png" alt="View" /></a>
						<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-package/edit/<?php echo $this->_tpl_vars['rec']['id']; ?>
/" title="Edit this package"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
						<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
packages/delete/<?php echo $this->_tpl_vars['rec']['id']; ?>
/" title="Delete this package" onclick="if(!confirm('Are you sure you want to delete this?'))return false;"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/bin.png" alt="Delete" /></a>
					</div>
					</td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			</tbody>
		</table>
		<?php elseif (isset ( $this->_tpl_vars['singleRecord'] )): ?>
		<div class="row">
			<div class="col-sm-10 pt-3">
        <h2 style="margin-bottom: 60px;"><?php echo $this->_tpl_vars['singleRecord']['pkg_name']; ?>
 Package Detail's</h2>
        </div>
        <div class="col-sm-2  pt-3">
        	<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-package/edit/<?php echo $this->_tpl_vars['singleRecord']['id']; ?>
/" class="btn btn-primary form-control">Edit Package</a>
        </div>
        </div>
		<div class="row mt-5">
		<div class="col-sm-3"></div>
		<div class="col-sm-4">
			<div class="form-group">
			<span><b>Package Name : </b><span><?php echo $this->_tpl_vars['singleRecord']['pkg_name']; ?>
</span></span>
		</div>		
		</div>
		<div class="col-sm-4">
			<div class="form-group">
			<span><b>Package Price : </b><span><?php echo $this->_tpl_vars['singleRecord']['pkg_price']; ?>
</span></span>
		</div>
	</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4">
			<div class="form-group">
			<span><b>No Of Patients : </b><span><?php echo $this->_tpl_vars['singleRecord']['no_of_patients']; ?>
</span></span>
		</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
			<span><b>No Of Prescriptions : </b><span><?php echo $this->_tpl_vars['singleRecord']['no_of_prescriptions']; ?>
</span></span>
		</div>
	</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4">
			<div class="form-group">
			<span><b>No Of Medicines : </b><span><?php echo $this->_tpl_vars['singleRecord']['no_of_medicines']; ?>
</span></span>
		</div>
	</div>
		<div class="col-sm-4">
			<div class="form-group">
			<span><b>No Of Tests : </b><span><?php echo $this->_tpl_vars['singleRecord']['no_of_tests']; ?>
</span></span>
		</div>
	</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4">
			<div class="form-group">
			<span><b>No Of Online Appointments : </b><span><?php echo $this->_tpl_vars['singleRecord']['no_of_online_appointments']; ?>
</span></span>
		</div>
	</div>
	</div>
	<?php else: ?>
      <h2>Packages List</h2>
		<p class="common-top">
			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
/add-package/" title="Add a new"><i class="fa fa-plus-square sqicon" aria-hidden="true"></i></a>
		</p>
		<div class="row">
			<p>No Packages Created</p>
		</div>
	<?php endif; ?>	

	</div>
</div><!-- #content -->
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>