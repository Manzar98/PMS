<?php /* Smarty version 2.6.31, created on 2018-12-10 22:08:35
         compiled from password.tpl */ ?>
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
				<li class="breadcrumb-item active">Change Password</li>
			</ol>
		</div>
		<?php if (isset ( $this->_tpl_vars['error'] )): ?>
		<div class="fail text-center ">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Success!</strong> <?php echo $this->_tpl_vars['error']; ?>

				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
		</div>
		<?php endif; ?>
		<h2 id="password" class="pt-3">Change password</h2>

		

		<form id="change_password" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post" class="box style">
			<fieldset>
				<legend>Change Password</legend>

				<div class="row">
					<div class="col-sm-2"></div>
					<div class="group<?php if ($this->_tpl_vars['error']): ?> error<?php endif; ?> col-sm-4">
						<div class="form-group">
							<label for="new_password">New password</label>
							<input type="password" name="new_password" id="new_password" size="30" class="form-control" />
						</div>
					</div>
					<div class="group<?php if ($this->_tpl_vars['error']): ?> error<?php endif; ?> col-sm-4">
						<div class="form-group">
							<label for="verify_password">Verify password</label>
							<input type="password" name="verify_password" id="verify_password" size="30" class="form-control" />
						</div>
					</div>
				</div>
				<div class="row"> 
					<div class="group_submit col-sm-3 mx-auto py-4">
						<button type="submit" class="btn btn-primary form-control"><span>Change password</span></button>
					</div>
				</div>
			</fieldset>
		</form>
		<div class="common-bottom"></div>
	</div><!-- #content -->
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script type="text/javascript">
	$(document).ready(function()
	{
		$(\'#new_password\').focus();

		$("#change_password").validate({
			rules: {
				new_password: { required: true },
				verify_password: { equalTo: "#new_password" }
			}
		});
		
		$(\'#collapseProfile\').collapse({
			toggle: true
		})
	});
</script>
'; ?>