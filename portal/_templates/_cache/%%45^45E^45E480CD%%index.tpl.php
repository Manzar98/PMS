<?php /* Smarty version 2.6.31, created on 2018-11-07 12:30:46
         compiled from index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="content" class="db-icons">
	<div class="container-fluid homeWrap">
		<?php if (isset ( $_SESSION['UserType'] ) && $_SESSION['UserType'] != 'S_admin'): ?>
		<div class="row db-bottom" style="margin-top: 20px;">

			<div class="col-sm-3 text-center">
				<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'prescriptions'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/">
					<div class="db-back-shadow">
						<i class="fa fa-file-text-o" aria-hidden="true" style="color: #7986cd;padding-left: 7px;"></i><br>
						<span>Prescriptions</span><br>
						<div class="div-P">
							<p style="">Add/Edit/View <br>Prescriptions</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-3 text-center">
				<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'patients'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/">
					<div class="db-back-shadow">
						<i class="fa fa-users" aria-hidden="true" style="color: #064f68;"></i><br>
						<span style="">Patients</span><br>
						<div class="div-P" style="">
							<p style="">Add/Edit/View <br>Patients</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-3 text-center">
				<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'medicine'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/">
					<div class="db-back-shadow">
						<i class="fa fa-archive" aria-hidden="true" style="color: #58c457;"></i><br>
						<span style="">Medicine</span><br>
						<div class="div-P" style="">
							<p style="">Add/Edit/View <br>Medicines</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-3 text-center">
				<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'tests'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/">
					<div class="db-back-shadow">
						<i class="fa fa-plus-square" aria-hidden="true" style="color: #d61e40;"></i><br>
						<span style="">Tests</span><br>
						<div class="div-P" style="">
							<p style="">Add/Edit/View <br>Tests</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="row db-bottom">
			<div class="col-sm-3 text-center">
				<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'instructions'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
instructions/">
					<div class="db-back-shadow">
						<i class="fa fa-list-ul" aria-hidden="true" style="color: #ff8200;"></i><br>
						<span style="padding-left: 3px;">Instructions</span><br>
						<div class="div-P">
							<p style="">Manage <br>Instructions</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-3 text-center">
				<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'list-appointments'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
list-appointments/<?php echo $_SESSION['AdminId']; ?>
/">
					<div class="db-back-shadow">
						<i class="fa  fa-calendar" aria-hidden="true"></i><br>
						<span style="">Appointments</span><br>
						<div class="div-P">
							<p style="">Manage<br> Appointments</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-3 text-center">
			<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'reports'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
reports/<?php echo $_SESSION['AdminId']; ?>
/">
				<div class="db-back-shadow">
						<i class="fa fa-bars" aria-hidden="true"></i><br>
						<span style="">Reports</span><br>
						<div class="div-P">
							<p style="">Manage<br> Reports</p>
						</div>
					</div>
			</a>
		</div>
			<div class="col-sm-3 text-center">
				<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'settings'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/">
					<div class="db-back-shadow">
						<i class="fa fa-cogs" aria-hidden="true" style="color: #064f68; "></i><br>
						<span style="padding-left: 10px;">Settings</span><br>
						<div class="div-P" style="padding-left: 14px;">
							<p style="">Manage global<br> settings</p>
						</div>
					</div>
				</a>
			</div>
			
		</div>
		<div class="row db-bottom">
			<div class="col-sm-3 text-center">
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
edit-users/<?php echo $_SESSION['AdminId']; ?>
/">
					<div class="db-back-shadow">
						<i class="fa fa-user" aria-hidden="true" style="color: #1da1f2;"></i><br>
						<span style="">Profile</span><br>
						<div class="div-P" style="">
							<p style="">Manage your<br> profile</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-3 text-center">
				<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'password'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
password/">
					<div class="db-back-shadow">
						<i class="fa fa-key" aria-hidden="true"></i><br>
						<span style="">Password</span><br>
						<div class="div-P">
							<p style="">Change your<br> password</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-3 text-center">
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
logout/">
					<div class="db-back-shadow">
						<i class="fa fa-power-off" aria-hidden="true" style="color: #f44242;"></i><br>
						<span style="">Logout</span><br>
						<div class="div-P" style="">
							<p style="">Logout from<br> system</p>
						</div>
					</div>
				</a>
			</div>

			<div class="col-sm-3">

			</div>
			<div class="col-sm-3">

			</div>
			<div class="col-sm-2">

			</div>
		</div>
		<?php else: ?>
				<div class="row db-bottom" style="margin-top: 20px;">

			<div class="col-sm-4 text-center">
				<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'settings'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/">
					<div class="db-back-shadow">
						<i class="fa fa-cogs" aria-hidden="true" style="color: #064f68; "></i><br>
						<span style="padding-left: 10px;">Settings</span><br>
						<div class="div-P" style="padding-left: 14px;">
							<p style="">Manage global<br> settings</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-4 text-center">
				<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'password'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
password/">
					<div class="db-back-shadow">
						<i class="fa fa-key" aria-hidden="true"></i><br>
						<span style="">Password</span><br>
						<div class="div-P">
							<p style="">Change your<br> password</p>
						</div>
					</div>
				</a>
			</div>
			
			<div class="col-sm-4 text-center">
				<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'users'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/">
					<div class="db-back-shadow">
						<i class="fa fa-users" aria-hidden="true" style="color: #064f68;"></i><br>
						<span style="padding-left: 13px;">Users</span><br>
						<div class="div-P">
							<p style="">Add/Edit/View <br>Users</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="row db-bottom">
			<div class="col-sm-4 text-center">
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
logout/">
					<div class="db-back-shadow">
						<i class="fa fa-power-off" aria-hidden="true" style="color: #f44242;"></i><br>
						<span style="padding-left: 10px;">Logout</span><br>
						<div class="div-P" >
							<p style="">Logout from<br> system</p>
						</div>
					</div>
				</a>
			</div>
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