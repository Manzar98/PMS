<?php /* Smarty version 2.6.31, created on 2019-01-01 22:20:31
         compiled from index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="" class="content-wrapper">
	<div class="container-fluid homeWrap db-icons">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">My Dashboard</li>
		</ol>
		<?php if (isset ( $_SESSION['UserType'] ) && $_SESSION['UserType'] != 'S_admin'): ?>

		<div class="row mt-5">
			<div class="col-xl-3 col-sm-6 mb-5 text-center">
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/" class="clearfix <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'prescriptions'): ?> selected <?php endif; ?>" >
					<div class="db-back-shadow">
						<i class="fa fa-file-text-o" aria-hidden="true" style="color: #F75176;"></i><br>
						<span>Prescriptions</span><br>
						<div class="div-P">
							<p style="">Add/Edit/View <br>Prescriptions</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xl-3 col-sm-6 mb-5 text-center">
				<a class="clearfix <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'patients'): ?> selected <?php endif; ?>" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/">
					<div class="db-back-shadow">
						<i class="fa fa-users text-secondary" aria-hidden="true"></i><br>
						<span style="">Patients</span><br>
						<div class="div-P" style="">
							<p style="">Add/Edit/View <br>Patients</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xl-3 col-sm-6 mb-5 text-center">
				<a class="clearfix <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'medicine'): ?> selected <?php endif; ?>"  href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/">
					<div class="db-back-shadow">
						<i class="fa fa-archive text-success" aria-hidden="true" ></i><br>
						<span style="">Medicine</span><br>
						<div class="div-P" style="">
							<p style="">Add/Edit/View <br>Medicines</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xl-3 col-sm-6 mb-5 text-center">
				<a class="clearfix <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'tests'): ?> selected <?php endif; ?>"  href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/">
					<div class="db-back-shadow">
						<i class="fa fa-plus-square text-danger" aria-hidden="true"></i><br>
						<span style="">Tests</span><br>
						<div class="div-P" style="">
							<p style="">Add/Edit/View <br>Tests</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-3 col-sm-6 mb-5 text-center">
				<a class="clearfix <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'instructions'): ?> selected <?php endif; ?>"  href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
instructions/">
					<div class="db-back-shadow">
						<i class="fa fa-list-ul text-warning" aria-hidden="true"></i><br>
						<span style="padding-left: 3px;">Instructions</span><br>
						<div class="div-P">
							<p style="">Manage <br>Instructions</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xl-3 col-sm-6 mb-5 text-center">
				<a class="clearfix <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'list-appointments'): ?> selected <?php endif; ?>"  href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
list-appointments/<?php echo $_SESSION['AdminId']; ?>
/">
					<div class="db-back-shadow">
						<i class="fa  fa-calendar text-info" aria-hidden="true"></i><br>
						<span style="">Appointments</span><br>
						<div class="div-P">
							<p style="">Manage<br> Appointments</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xl-3 col-sm-6 mb-5 text-center">
				<a class="clearfix <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'reports'): ?> selected <?php endif; ?>" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
reports/<?php echo $_SESSION['AdminId']; ?>
/">
					<div class="db-back-shadow">
						<i class="fa fa-bar-chart" aria-hidden="true" style="color: #571845;"></i><br>
						<span style="">Reports</span><br>
						<div class="div-P">
							<p style="">Manage<br> Reports</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xl-3 col-sm-6 mb-5 text-center">
				<a class="clearfix <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'work-settings'): ?> selected <?php endif; ?>" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
work-settings/" title="" >
					<div class="db-back-shadow">
						<i class="fa fa-clock-o text-muted" aria-hidden="true" style="color: #064f68; "></i><br>
						<span style="padding-left: 10px;">Time & Date</span><br>
						<div class="div-P">
							<p style="">Manage availability<br> settings</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-3 col-sm-6 mb-5 text-center">
				<a  class="clearfix <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'edit-users'): ?> selected <?php endif; ?>" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
edit-users/<?php echo $_SESSION['AdminId']; ?>
/" >
					<div class="db-back-shadow">
						<i class="fa fa-user text-danger" aria-hidden="true"></i><br>
						<span style="">Profile</span><br>
						<div class="div-P" style="">
							<p style="">Manage your<br> profile</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xl-3 col-sm-6 mb-5 text-center">
				<a class="clearfix <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'own-package'): ?> selected <?php endif; ?>" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
own-package/">
					<div class="db-back-shadow">
						<i class="fa fa-info text-success" aria-hidden="true"></i><br>
						<span style="">Package</span><br>
						<div class="div-P">
							<p style="">Check your<br> package details</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xl-3 col-sm-6 mb-5 text-center">
				<a class="clearfix <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'password'): ?> selected <?php endif; ?>" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
password/">
					<div class="db-back-shadow">
						<i class="fa fa-key" aria-hidden="true" style="color: #ae7c7c"></i><br>
						<span style="">Password</span><br>
						<div class="div-P">
							<p style="">Change your<br> password</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<?php else: ?>
		<div class="row mt-5">
			<div class="col-xl-4 col-sm-6 mb-5 text-center">
				<a class="clearfix <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'users'): ?> selected <?php endif; ?>" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/">
					<div class="db-back-shadow">
						<i class="fa fa-users text-info" aria-hidden="true"></i><br>
						<span style="">Doctors</span><br>
						<div class="div-P" style="">
							<p style="">Add/Edit/View <br>Doctors</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xl-4 col-sm-6 mb-5 text-center">
				<a class="clearfix <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'packages'): ?> selected <?php endif; ?>" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
packages/">
					<div class="db-back-shadow">
						<i class="fa fa-list-alt text-warning" aria-hidden="true"></i><br>
						<span>Packages</span><br>
						<div class="div-P">
							<p style="">Add/Edit/View <br>Packages</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xl-4 col-sm-6 mb-5 text-center">
				<a class="clearfix <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'password'): ?> selected <?php endif; ?>" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
password/">
					<div class="db-back-shadow">
						<i class="fa fa-key text-primary" aria-hidden="true"></i><br>
						<span style="">Password</span><br>
						<div class="div-P">
							<p style="">Change your<br> password</p>
						</div>
					</div>
				</a>
			</div>
		</div>
<!-- 		<div class="row">
			<div class="col-xl-4 col-sm-6 mb-5 text-center">
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
logout/">
					<div class="db-back-shadow">
						<i class="fa fa-power-off text-danger" aria-hidden="true"></i><br>
						<span>Logout</span><br>
						<div class="div-P" >
							<p>Logout from<br> system</p>
						</div>
					</div>
				</a>
			</div>
		</div> -->
		<?php endif; ?>
	</div>
</div><!-- #content -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	