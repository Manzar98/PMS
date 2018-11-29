<?php /* Smarty version 2.6.31, created on 2018-11-28 18:35:10
         compiled from users/users.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'print_r', 'users/users.tpl', 80, false),array('modifier', 'date_format', 'users/users.tpl', 85, false),array('function', 'cycle', 'users/users.tpl', 104, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script type="text/javascript">
	$(document).ready(function(){
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

	<?php if (isset ( $_SESSION['UserType'] ) && $_SESSION['UserType'] == 'S_admin'): ?>

	<h2 class="noprint headingBottom"><?php if (( isset ( $_GET['q'] ) && $_GET['q'] != '' )): ?> Search Result For "<b><?php echo $_GET['q']; ?>
</b>" <?php else: ?>Doctors List<?php endif; ?></h2>

	<p class="noprint">		
		<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-users/" title="Add a new User"><i class="fa fa-plus-square sqicon" aria-hidden="true"></i></a>	
	</p>

	<form class="box style noprint" action="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/" method="get" enctype="multipart/form-data">
		<div class="row">
			<div class="col-sm-3 search-top">
				<select name="field" id="field" class="form-control">
					<option value="id" <?php if (( isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['field'] == 'id' )): ?> selected="selected" <?php endif; ?>>User ID</option>
					<option value="username" <?php if (( isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['field'] == 'username' )): ?> selected="selected" <?php endif; ?>>User Name</option>
					<option value="created_on" <?php if (( isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['field'] == 'created_on' )): ?> selected="selected" <?php endif; ?>>Date</option>
				</select>
			</div>
			<div class="col-sm-3 search-top">
				<input type="text" name="q" id="q" <?php if (isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['q']): ?>value="<?php echo $this->_tpl_vars['search']['q']; ?>
"<?php endif; ?> maxlength="20" class="form-control" />
			</div>
			<div class="col-sm-3 search-top">
				<input type="submit" value="Search" name="submit" id="submit" class="btn btn-primary"/>
			</div>
		</div>
	</form>
	<?php endif; ?>
	<?php if (( isset ( $_GET['q'] ) && $_GET['q'] != '' )): ?>
	<div style="padding: 20px 0;">
		<p class="noprint"><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/">Back to all users List</a></p>
	</div>
	<?php endif; ?>
	<?php if (( isset ( $this->_tpl_vars['grouped_users'] ) && $this->_tpl_vars['grouped_users'] )): ?>

	<div class="pagination pull-right grp_btn">
		Group By : 
		<a <?php if (( isset ( $this->_tpl_vars['group_by'] ) && $this->_tpl_vars['group_by'] == 'expire' )): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/?group_by=expire&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Expiration</a>
		<a <?php if (( isset ( $this->_tpl_vars['group_by'] ) && $this->_tpl_vars['group_by'] == 'id' )): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/?group_by=id&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">User ID</a>
		<a <?php if (( isset ( $this->_tpl_vars['group_by'] ) && $this->_tpl_vars['group_by'] == 'username' )): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/?group_by=username&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">User Name</a>
	</div>

	<!-- <?php echo ((is_array($_tmp=$this->_tpl_vars['grouped_users'])) ? $this->_run_mod_handler('print_r', true, $_tmp) : print_r($_tmp)); ?>
 -->
	<?php $_from = $this->_tpl_vars['grouped_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['users']):
?>

	<table class="table table-striped table-bordered" >
		<?php if ($this->_tpl_vars['group_by'] == 'expire'): ?>
		<caption><?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
</caption>				
		<?php elseif ($this->_tpl_vars['group_by'] == 'id'): ?>
		<caption>User ID: <?php echo $this->_tpl_vars['key']; ?>
</caption>
		<?php else: ?>
		<caption><?php echo $this->_tpl_vars['key']; ?>
</caption>
		<?php endif; ?>

		<thead>
			<tr>
				<th>ID</th>
				<th>User Name</th>
				<th>Expiration Date</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['usr']):
?>

			<?php if ($this->_tpl_vars['usr']['is_delete'] == 'on'): ?>
			<tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
" style="background: #f1d2d2;">
				<td class="bold"><?php echo $this->_tpl_vars['usr']['id']; ?>
</td>
				<td><?php echo $this->_tpl_vars['usr']['username']; ?>
</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['expire'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
</td>
				<td>
					<div class="icons">				
						<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/view/<?php echo $this->_tpl_vars['usr']['id']; ?>
/" title="View this user"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/eye.png" alt="View" /></a>
						<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
edit-users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/" title="Edit this user"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
						<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/reactivate/<?php echo $this->_tpl_vars['usr']['id']; ?>
/" title="Reactivate this user" onclick="if(!confirm('Are you sure you want to reactivate this?'))return false;"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/bin.png" alt="Reactivate" /></a>
					</div>
				</td>
			</tr>
			<?php else: ?>
			<tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
" >
				<td class="bold"><?php echo $this->_tpl_vars['usr']['id']; ?>
</td>
				<td><?php echo $this->_tpl_vars['usr']['username']; ?>
</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['expire'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
</td>
				<td>
					<div class="icons">				
						<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/view/<?php echo $this->_tpl_vars['usr']['id']; ?>
/" title="View this user"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/eye.png" alt="View" /></a>
						<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
edit-users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/" title="Edit this user"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
						<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/delete/<?php echo $this->_tpl_vars['usr']['id']; ?>
/" title="Delete this user" onclick="if(!confirm('Are you sure you want to delete this?'))return false;"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/bin.png" alt="Delete" /></a>
					</div>
				</td>
			</tr>
			<?php endif; ?>
			<?php endforeach; else: ?>
			<tr style="color:red;">
				<td>
					No User For this date
				</td>
			</tr>
			<?php endif; unset($_from); ?>
		</tbody>
	</table>

	<?php endforeach; endif; unset($_from); ?>


	<?php elseif (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data'] )): ?>

	<div class="row">
		<div class="col-sm-10">
			<h3 class="noprint" ><?php echo $this->_tpl_vars['data']['F_name']; ?>
's Details</h3>
		</div>
		<div class="col-sm-2" style="padding-top: 25px;">
			<span class="date">Join Date:<em><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['d_join'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</em></span><br>
			<div style="margin-top: 10px;">
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
edit-users/<?php echo $this->_tpl_vars['data']['id']; ?>
/" class="btn btn-primary">Edit</a>
			</div>
			
		</div>
	</div>

	<hr style="border-top: dotted 1px #DEDEDE; " /> 
	<div style="margin-top: 30px;"></div>
	<div class="row" style="margin-bottom: 20px;">
		<div class="text-center center-block"> <img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
<?php echo $this->_tpl_vars['data']['profile_img']; ?>
" alt="" width="12%">
		</div>
	</div>
	<div class="row ">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Name : </b><span>Dr. <?php echo $this->_tpl_vars['data']['F_name']; ?>
 <?php echo $this->_tpl_vars['data']['L_name']; ?>
</span></span>
			
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>User's Name : </b><span><?php echo $this->_tpl_vars['data']['username']; ?>
</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Email Address : </b><span><?php echo $this->_tpl_vars['data']['email']; ?>
</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Expiration Date : </b><span><?php echo $this->_tpl_vars['data']['expire']; ?>
</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
			<?php if ($this->_tpl_vars['data']['city'] == $this->_tpl_vars['city']['id']): ?>	
			<span><b>City : </b><span class="capitalize"><?php echo $this->_tpl_vars['city']['name']; ?>
</span></span>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Clinic Address : </b><span><?php echo $this->_tpl_vars['data']['c_address']; ?>
</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Mobile Number : </b><span class="capitalize"><?php echo $this->_tpl_vars['data']['mobile']; ?>
</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Landline : </b><span><?php echo $this->_tpl_vars['data']['phone']; ?>
</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Doctor's Qualification : </b><span class="capitalize"><?php echo $this->_tpl_vars['data']['quali']; ?>
</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Doctor's Experience : </b><span><?php echo $this->_tpl_vars['data']['exprience']; ?>
</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Specialist : </b><span class="capitalize"><?php echo $this->_tpl_vars['data']['specialist']; ?>
</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<?php $_from = $this->_tpl_vars['packages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['package']):
?>
			<?php if ($this->_tpl_vars['data']['package_id'] == $this->_tpl_vars['package']['id']): ?> 
			<span><b>Package : </b><span class="capitalize"><?php echo $this->_tpl_vars['package']['pkg_name']; ?>
</span></span> 
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>	
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Clinic Fee : </b><span class="capitalize"><?php echo $this->_tpl_vars['data']['c_fee']; ?>
</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Clinic Name : </b><span class="capitalize"><?php echo $this->_tpl_vars['data']['c_name']; ?>
</span></span>
		</div>
	</div>
	<div style="margin-bottom: 30px;"></div>
	<?php else: ?>
	<div style="padding: 20px 0;">
		<p class="box-info">No User on the List</p>
	</div>
	<?php endif; ?>

</div><!-- #content -->

<div class="print branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>