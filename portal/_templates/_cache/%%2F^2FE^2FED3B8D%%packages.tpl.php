<?php /* Smarty version 2.6.31, created on 2018-11-16 15:00:12
         compiled from packages/packages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'packages/packages.tpl', 22, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="content">
	<div class="container-fluid">
		

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
			<div class="col-sm-11">
        <h2 style="margin-bottom: 60px;"><?php echo $this->_tpl_vars['singleRecord']['pkg_name']; ?>
 Package Detail's</h2>
        </div>
        <div class="col-sm-1" style="margin-top: 25px;">
        	<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-package/edit/<?php echo $this->_tpl_vars['singleRecord']['id']; ?>
/" class="btn btn-primary">Edit</a>
        </div>
        </div>
		<div class="row ">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Package Name : </b><span><?php echo $this->_tpl_vars['singleRecord']['pkg_name']; ?>
</span></span>
			
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Package Price : </b><span><?php echo $this->_tpl_vars['singleRecord']['pkg_price']; ?>
</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>No Of Patients : </b><span><?php echo $this->_tpl_vars['singleRecord']['no_of_patients']; ?>
</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>No Of Prescriptions : </b><span><?php echo $this->_tpl_vars['singleRecord']['no_of_prescriptions']; ?>
</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>No Of Medicines : </b><span><?php echo $this->_tpl_vars['singleRecord']['no_of_medicines']; ?>
</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>No Of Tests : </b><span><?php echo $this->_tpl_vars['singleRecord']['no_of_tests']; ?>
</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>No Of Instructions : </b><span><?php echo $this->_tpl_vars['singleRecord']['no_of_instructions']; ?>
</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>No Of Online Appointments : </b><span><?php echo $this->_tpl_vars['singleRecord']['no_of_online_appointments']; ?>
</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b></b><span></span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b></b><span></span></span>
		</div>
	</div>
		<?php endif; ?>	
	</div>
</div><!-- #content -->