<?php /* Smarty version 2.6.31, created on 2018-12-14 14:18:39
         compiled from header.tpl */ ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $this->_tpl_vars['SITE_NAME']; ?>
 Administration</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="<?php echo $this->_tpl_vars['meta_description']; ?>
" />
	<meta name="keywords" content="<?php echo $this->_tpl_vars['meta_keywords']; ?>
" />
	<!-- <link rel="shortcut icon" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
favicon.ico" type="image/x-icon" /> -->
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/print.css" type="text/css" media="print" />
	<!-- Bootstrap core CSS-->
	<link href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Icon fonts-->
	<link href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Plugin styles -->
	<link href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<!-- Main styles -->
	<link href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/custom.css" rel="stylesheet">
	<!-- Main styles -->
	<link href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/admin.css" rel="stylesheet">
	<!-- 	 <link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/screen.css" type="text/css" media="screen" /> -->
	<!-- <link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/jquery.fancybox.css" type="text/css" media="screen" /> -->
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/jquery-ui.css">
	<!-- <link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/fonts/kreon.css"> -->
	<!-- <link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/fonts/droidsans.css" /> -->
	<!-- <link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/bootstrap.css" /> -->
	<!-- <link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/bootstrap-theme.css" /> -->
	<!-- <link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/fonts/fontawesome.css" /> -->
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/select2.css" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/croppie.css" />
	<!-- <link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/jquery.timepicker.css" /> -->
	<link href=" "rel="stylesheet" />
	<!-- <script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.js" type="text/javascript"></script>  -->
</head>
<body class="fixed-nav sticky-footer" id="page-top">
	
	<div id="wrap" class="">
		
		<?php if ($this->_tpl_vars['isAuthenticated'] == 1): ?>
		<?php if (isset ( $_SESSION['status'] )): ?>
		<div class="noprint" id="status">
			<?php echo $_SESSION['status']; ?>

		</div><!-- #status -->
		<?php endif; ?>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['isAuthenticated'] == 1): ?>
		<header>
			<div class="docWrap">
				<!-- Navigation-->
				<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
					<a class="navbar-brand" href="index.html"><img src="img/logo.png" data-retina="true" alt="" width="163" height="36"></a>
					<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarResponsive">
						<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
							<li class="nav-item <?php if ($this->_tpl_vars['CURRENT_PAGE'] == ''): ?>selected<?php endif; ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
								<a class="nav-link" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
">
									<i class="fa fa-fw fa-dashboard"></i>
									<span class="nav-link-text">Dashboard</span>
								</a>
							</li>
							<?php if (isset ( $_SESSION['UserType'] ) && $_SESSION['UserType'] != 'S_admin'): ?>
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Prescriptions">
								<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePrescription" data-parent="#exampleAccordion">
									<i class="fa fa-fw fa-file-text-o"></i>
									<span class="nav-link-text">Prescriptions</span>
								</a>
								<ul class="sidenav-second-level collapse" id="collapsePrescription">
									<li>
										<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/">View All</a>
									</li>
									<li>
										<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-prescription/">Add New</a>
									</li>
								</ul>
							</li>
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Prescriptions">
								<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePatient" data-parent="#exampleAccordion">
									<i class="fa fa-fw fa-users"></i>
									<span class="nav-link-text">Patients</span>
								</a>
								<ul class="sidenav-second-level collapse" id="collapsePatient">
									<li>
										<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/">View All</a>
									</li>
									<li>
										<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/add/">Add New</a>
									</li>
								</ul>
							</li>
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Prescriptions">
								<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMedicine" data-parent="#exampleAccordion">
									<i class="fa fa-fw fa-archive"></i>
									<span class="nav-link-text">Medicines</span>
								</a>
								<ul class="sidenav-second-level collapse" id="collapseMedicine">
									<li>
										<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/">View All</a>
									</li>
									<li>
										<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/add/">Add New</a>
									</li>
								</ul>
							</li>
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Prescriptions">
								<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTest" data-parent="#exampleAccordion">
									<i class="fa fa-fw fa-plus-square"></i>
									<span class="nav-link-text">Tests</span>
								</a>
								<ul class="sidenav-second-level collapse" id="collapseTest">
									<li>
										<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/">View All</a>
									</li>
									<li>
										<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/add/">Add New</a>
									</li>
								</ul>
							</li>
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
								<a class="nav-link <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'reports'): ?>selected<?php endif; ?>" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
reports/<?php echo $_SESSION['AdminId']; ?>
/">
									<i class="fa fa-fw fa-bar-chart"></i>
									<span class="nav-link-text">Reports</span>
								</a>
							</li>
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
								<a class="nav-link <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'list-appointments'): ?>selected<?php endif; ?>" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
list-appointments/<?php echo $_SESSION['AdminId']; ?>
/">
									<i class="fa fa-fw fa-calendar"></i>
									<span class="nav-link-text">Appointments</span>
								</a>
							</li>
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
								<a class="nav-link <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'instructions'): ?>selected<?php endif; ?>" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
instructions/">
									<i class="fa fa-fw fa-list-ul"></i>
									<span class="nav-link-text">Instructions</span>
								</a>
							</li>
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
								<a class="nav-link <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'work-settings'): ?>selected<?php endif; ?>" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
work-settings/">
									<i class="fa fa-fw fa-clock-o"></i>
									<span class="nav-link-text">Time & Date</span>
								</a>
							</li>
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
								<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile" data-parent="#exampleAccordion">
									<i class="fa fa-fw fa-user"></i>
									<span class="nav-link-text">My profile</span>
								</a>
								<ul class="sidenav-second-level collapse" id="collapseProfile">
									<li>
										<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
edit-users/<?php echo $_SESSION['AdminId']; ?>
/">Edit Profile</a>
									</li>
									<li>
										<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/view/<?php echo $_SESSION['AdminId']; ?>
/">View Profile</a>
									</li>
									<li>
										<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
password/">Change Password</a>
									</li>
								</ul>
							</li>
							<?php else: ?>
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Prescriptions">
								<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseDoctor" data-parent="#exampleAccordion">
									<i class="fa fa-fw fa-user-md"></i>
									<span class="nav-link-text">Doctors</span>
								</a>
								<ul class="sidenav-second-level collapse" id="collapseDoctor">
									<li>
										<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/">View All</a>
									</li>
									<li>
										<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-users/">Add New</a>
									</li>
								</ul>
							</li>
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Prescriptions">
								<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePackage" data-parent="#exampleAccordion">
									<i class="fa fa-fw fa-list-alt"></i>
									<span class="nav-link-text">Packages</span>
								</a>
								<ul class="sidenav-second-level collapse" id="collapsePackage">
									<li>
										<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
packages/">View All</a>
									</li>
									<li>
										<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-package/">Add New</a>
									</li>
								</ul>
							</li>
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
								<a class="nav-link <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'password'): ?>selected<?php endif; ?>" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
password/">
									<i class="fa fa-fw fa-clock-o"></i>
									<span class="nav-link-text">Change password</span>
								</a>
							</li>
							<?php endif; ?>
						</ul>
						<ul class="navbar-nav sidenav-toggler">
							<li class="nav-item">
								<a class="nav-link text-center" id="sidenavToggler">
									<i class="fa fa-fw fa-angle-left"></i>
								</a>
							</li>
						</ul>
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
logout/">
									<i class="fa fa-fw fa-sign-out"></i>Logout</a>
								</li>
							</ul>
						</div>
					</nav>
					<!-- /Navigation-->
				</div>
			</header>
			<?php endif; ?>

