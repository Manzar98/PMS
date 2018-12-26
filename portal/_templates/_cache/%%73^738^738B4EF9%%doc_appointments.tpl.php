<?php /* Smarty version 2.6.31, created on 2018-12-24 14:53:32
         compiled from appointments/doc_appointments.tpl */ ?>
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
	
	<div id="page" class="">
		
		<?php if ($this->_tpl_vars['isAuthenticated'] == 1): ?>
		<?php if (isset ( $_SESSION['status'] )): ?>
		<div class="noprint" id="status">
			<?php echo $_SESSION['status']; ?>

		</div><!-- #status -->
		<?php endif; ?>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['isAuthenticated'] == 1): ?>
		<header class="static">
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
<div id="preloader" class="Fixed">
	<div data-loader="circle-side"></div>
</div>
<!-- /Preload-->
<?php if (isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']): ?>
<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
">Dashboard</a>
				</li>
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
list-appointments/<?php echo $_SESSION['AdminId']; ?>
/">Appointments</a>
				</li>
				<li class="breadcrumb-item active">Get Appointment</li>
				
			</ol>
		</div>
<!-- /breadcrumb -->
<div class="container margin_60">
	<div class="row">
		<div class="col-xl-8 col-lg-8">
			<nav id="secondary_nav">
				<div class="container">
					<ul class="clearfix">
						<li><a href="#section_1" class="active">General info</a></li>
						<li><a href="#section_2">Reviews</a></li>
						<li><a href="#sidebar">Booking</a></li>
					</ul>
				</div>
			</nav>
			<div id="section_1">
				<input type="hidden" name="" id="doc_name" value="<?php echo $this->_tpl_vars['data']['F_name']; ?>
 <?php echo $this->_tpl_vars['data']['L_name']; ?>
">
				<input type="hidden" name="" id="doc_id" value="<?php echo $this->_tpl_vars['data']['id']; ?>
">
				<div class="box_general_3">
					<div class="profile">
						<div class="row">
							<div class="col-lg-5 col-md-4">
								<figure>
									<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
portal/<?php echo $this->_tpl_vars['data']['profile_img']; ?>
" alt="" class="img-fluid">
								</figure>
							</div>
							<div class="col-lg-7 col-md-8">
								<!-- <small>Primary care - Internist</small> -->
								<h1>DR. <?php echo $this->_tpl_vars['data']['F_name']; ?>
 <?php echo $this->_tpl_vars['data']['L_name']; ?>
</h1>
								<span class="rating">
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star"></i>
									<small>(145)</small>
									<a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
								</span>
								<ul class="statistic">
									<li>854 Views</li>
									<li><?php echo $this->_tpl_vars['noOfPatients']; ?>
 Patients</li>
								</ul>
								<ul class="contacts">
									<li>
										<h6>Fee</h6>
										Rs. <?php echo $this->_tpl_vars['data']['c_fee']; ?>
 
									</li>
									<li>
										<h6>Address</h6>
										<?php echo $this->_tpl_vars['data']['c_address']; ?>

									</li>
									<li>
										<h6>Phone</h6> <a href="tel://<?php echo $this->_tpl_vars['data']['phone']; ?>
"><?php echo $this->_tpl_vars['data']['phone']; ?>
</a></li>
									</ul>
								</div>
							</div>
						</div>
						<hr>

						<!-- /profile -->
						<div class="indent_title_in">
							<i class="pe-7s-user"></i>
							<h3>Info</h3>
						</div>
						<div class="wrapper_indent">
							<div class="row pb-3">
								<div class="col-lg-6">
									<div class="pb-3">
										<span><b>Email Address : </b><span><?php echo $this->_tpl_vars['data']['email']; ?>
</span></span>
									</div>
									<div class="pb-3">								<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
										<?php if ($this->_tpl_vars['data']['city'] == $this->_tpl_vars['city']['id']): ?>	
										<span><b>City : </b><span class="capitalize"><?php echo $this->_tpl_vars['city']['name']; ?>
</span></span>
										<?php endif; ?>
										<?php endforeach; endif; unset($_from); ?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="pb-3">
										<span><b>Experience : </b><span><?php echo $this->_tpl_vars['data']['exprience']; ?>
 Years</span></span>
									</div>
									<div class="pb-3">
										<span><b>Qualification : </b><span class="capitalize"><?php echo $this->_tpl_vars['data']['quali']; ?>
</span></span>
									</div>
								</div>
							</div>
							<h6>Specializations</h6>
							<div class="row">
								<div class="col-lg-6">
									<ul class="bullets">
										<li><?php echo $this->_tpl_vars['data']['specialist']; ?>
</li>
									</ul>
								</div>
							</div>
							<!-- /row-->
						</div>
						<!-- /wrapper indent -->
					</div>
					<!-- /section_1 -->
				</div>
				<!-- /box_general -->
				<div id="section_2">
					<div class="box_general_3">
						<div class="reviews-container">
							<div class="row">
								<div class="col-lg-3">
									<div id="review_summary">
										<strong>4.7</strong>
										<div class="rating">
											<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
										</div>
										<small>Based on 4 reviews</small>
									</div>
								</div>
								<div class="col-lg-9">
									<div class="row">
										<div class="col-lg-10 col-9">
											<div class="progress">
												<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
									</div>
									<!-- /row -->
									<div class="row">
										<div class="col-lg-10 col-9">
											<div class="progress">
												<div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
									</div>
									<!-- /row -->
									<div class="row">
										<div class="col-lg-10 col-9">
											<div class="progress">
												<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
									</div>
									<!-- /row -->
									<div class="row">
										<div class="col-lg-10 col-9">
											<div class="progress">
												<div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
									</div>
									<!-- /row -->
									<div class="row">
										<div class="col-lg-10 col-9">
											<div class="progress">
												<div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
									</div>
									<!-- /row -->
								</div>
							</div>
							<!-- /row -->

							<hr>

							<div class="review-box clearfix">
								<figure class="rev-thumb"><img src="img/avatar1.jpg" alt="">
								</figure>
								<div class="rev-content">
									<div class="rating">
										<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
									</div>
									<div class="rev-info">
										Admin – April 03, 2016:
									</div>
									<div class="rev-text">
										<p>
											Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
										</p>
									</div>
								</div>
							</div>
							<!-- End review-box -->

							<div class="review-box clearfix">
								<figure class="rev-thumb"><img src="img/avatar2.jpg" alt="">
								</figure>
								<div class="rev-content">
									<div class="rating">
										<i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
									</div>
									<div class="rev-info">
										Ahsan – April 01, 2016
									</div>
									<div class="rev-text">
										<p>
											Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
										</p>
									</div>
								</div>
							</div>
							<!-- End review-box -->

							<div class="review-box clearfix">
								<figure class="rev-thumb"><img src="img/avatar3.jpg" alt="">
								</figure>
								<div class="rev-content">
									<div class="rating">
										<i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
									</div>
									<div class="rev-info">
										Sara – March 31, 2016
									</div>
									<div class="rev-text">
										<p>
											Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
										</p>
									</div>
								</div>
							</div>
							<!-- End review-box -->
						</div>
						<!-- End review-container -->
					</div>
				</div>
				<!-- /section_2 -->
			</div>
			<!-- /col -->
			<aside class="col-xl-4 col-lg-4" id="sidebar">
				<div class="box_general_3 booking">
					<form  id="add_user" class="" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
						<div class="title">
							<h3>Make an Appointment</h3>
							<small>Monday to Friday 09.00am-06.00pm</small>
						</div>
						<input type="hidden" name="doc_name" value="<?php echo $this->_tpl_vars['data']['F_name']; ?>
 <?php echo $this->_tpl_vars['data']['L_name']; ?>
" id="doc_name">
						<input type="hidden" name="doc_adr" value="<?php echo $this->_tpl_vars['data']['c_address']; ?>
" id="doc_adr">
						<input type="hidden" name="doc_phne" value="<?php echo $this->_tpl_vars['data']['phone']; ?>
" id="doc_phne">
						<input type="hidden" name="u_id" value="<?php echo $this->_tpl_vars['data']['id']; ?>
" id="id">
						<input type="hidden" name="package_id" id="package_id" class="package_id" value="<?php echo $this->_tpl_vars['data']['package_id']; ?>
"/>
						<input type="hidden" name="online_manual" id="online_manual" value="online">
						<input type="hidden" name="pat_id" id="patient_id">
						<input type="hidden" name="security_key" id="security_key">
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<input class="form-control" type="text" id="booking_date" data-lang="en" data-min-year="2017" data-max-year="2020" data-disabled-days="10/17/2017,11/18/2017" name="dt">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<input class="form-control" type="text" id="booking_time" value="9:00 am" name="hour">
								</div>
							</div>
						</div>
						<!-- /row -->
						<div class="row" style="border-top: 1px dotted #ddd;
						border-bottom: none;">
						<div class="col-6 pt-3">
							<label for="dt" class="">Patient Id</label>
							<input type="text" name="p_id" id="p_id" class="p_id form-control" />
						</div>
						<div class="col-6 pt-3">
							<label for="dt" class="">Security Key</label>
							<input type="text" name="security_key" id="sec_key" class="form-control" />
						</div>
						
					</div>
					
					<div class="row text-center my-3" style="border-top: 1px dotted #ddd;border-bottom: none;">
						<div class="col-6  pt-3">
							<input type="button" class="btn btn-primary" id="existSearch" name="" value="Search">
						</div>
						<div class="col-6 pt-3">
							<a href="javascript:void(0)" class="btn btn-primary" id="add_patient">New Patient</a>
						</div>
					</div>
					<div id="add_new_patient" style="display: none; clear:both; border-top: 1px dotted #ddd;border-bottom: none;" class="pt-3">
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="name">Patient Name</label>
									<input type="text" name="name" id="name" maxlength="50" class="form-control e_name" onclick="generateRandomNumber()"/>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group disWrap">
									<div class="AddDisSelect"></div>
									<label for="gender">Gender</label>
									<select name="gender" id="gender" class="form-control e_gender">
										<option value="male" <?php if ($this->_tpl_vars['data']['gender'] == 'male'): ?> selected="selected" <?php endif; ?>>Male</option>
										<option value="female" <?php if ($this->_tpl_vars['data']['gender'] == 'female'): ?> selected="selected" <?php endif; ?>>Female</option>
										<option value="other" <?php if ($this->_tpl_vars['data']['gender'] == 'other'): ?> selected="selected" <?php endif; ?>>Other</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="dob">Date of Birth</label>
									<input type="text" name="dob" id="dob" value="<?php echo $this->_tpl_vars['data']['dob']; ?>
" autocomplete="off" class="form-control e_dob"/>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group disWrap">
									<div class="AddDisSelect"></div>
									<label for="marital_status">Marital Status</label>
									<select name="marital_status" id="marital_status" class="form-control e_marital_status">
										<option value="married">Married</option>
										<option value="unmarried" >Unmarried</option>
										<option value="widow">Widow</option>
										<option value="divorced">Divorced</option>
										<option value="seperated">Seperated</option>
									</select> 
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="mobile">Mobile</label>
									<input type="text" name="mobile" id="mobile"maxlength="50" class="form-control e_mobile"/>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="address">Address</label>
									<textarea  name="address" id="address" class="form-control e_address" style="height: 40px;"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group disWrap">
									<div class="AddDisSelect"></div>
									<label for="city">City</label>
									<select name="city" id="city" class="form-control e_city">
										<option value="">Select City</option>
										<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
										<option <?php if ($this->_tpl_vars['data']['city'] == $this->_tpl_vars['city']['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $this->_tpl_vars['city']['id']; ?>
"><?php echo $this->_tpl_vars['city']['name']; ?>
</option>
										<?php endforeach; endif; unset($_from); ?>						
									</select>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="email">Email Address</label>
									<input type="email" name="email"
									id="email" class="form-control e_email">
								</div>
							</div>
						</div>
					</div>
					<!-- /row -->
					<hr>
					<input type="submit" name="" class="btn_1 full-width" value="Book Now">
				</form>
			</div>
			<!-- /box_general -->
		</aside>
		<!-- /asdide -->
	</div>
	<!-- /row -->
</div>
<!-- /container -->
<div class="row" style="margin-top: 10px;">
	<div class="col-sm-8"></div>
	<div class="col-sm-2 common-bottom" >
		<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
add-appointment/?doc_id=<?php echo $this->_tpl_vars['data']['id']; ?>
&doc_name=<?php echo $this->_tpl_vars['data']['F_name']; ?>
 <?php echo $this->_tpl_vars['data']['L_name']; ?>
 &doc_adr=<?php echo $this->_tpl_vars['data']['c_address']; ?>
&doc_phne=<?php echo $this->_tpl_vars['data']['phone']; ?>
&img=<?php echo $this->_tpl_vars['data']['profile_img']; ?>
&speciallist=<?php echo $this->_tpl_vars['data']['specialist']; ?>
&pkgId=<?php echo $this->_tpl_vars['data']['package_id']; ?>
&exprience=<?php echo $this->_tpl_vars['data']['exprience']; ?>
&fee=<?php echo $this->_tpl_vars['data']['c_fee']; ?>
&exist=patient" class="btn btn-primary">Get Appointment</a>
	</div>
	<div class="col-sm-1"  >
		<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
history/" class="btn btn-primary">Veiw History</a>
	</div>
</div>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/js/select2.js"></script>
<?php echo '
<style type="text/css">
.diswrap{
	position: relative;
}
.disabledSelect{
	width: 81%;
	height: 40px;
	background-color: #DDD;
	opacity: 0.5;
	position: absolute;
	top: 27px;
	border-radius: 3px;
}
</style>
<script type="text/javascript">
	$(document).ready(function()
	{

		$(\'#existSearch\').click(function(){
			var pat_id = $(\'#p_id\').val();
			var doc_name = $(\'#doc_name\').val();
			var doc_id = $(\'#doc_id\').val();
			var sec_key = $(\'#sec_key\').val();

			if (pat_id!="" && sec_key!="") {
				$.ajax({
					type: \'POST\',
					url:\''; ?>
<?php echo $this->_tpl_vars['BASE_URL']; ?>
appointments?ajax=y<?php echo '\',
					data: \'p_id=\'+pat_id+\'&doc_id=\'+doc_id+\'&doc_name=\'+doc_name+\'&sec_key=\'+sec_key,
					success:function(msg){
						debugger;
						var res =JSON.parse(msg);
						debugger
						if (res.status==true) {
							$("#add_new_patient").show();
							$(\'.e_name\').val(res.msg.name);
							$(\'.e_name\').prop(\'readonly\',true);
							$(\'.e_gender\').val(res.msg.gender);
							$(\'.e_gender\').prop(\'readonly\',true);
							$(\'.e_dob\').val(res.msg.dob);
							$(\'.e_dob\').prop(\'readonly\',true);
							$(\'.e_marital_status\').val(res.msg.marital_status);
							$(\'.e_marital_status\').prop(\'readonly\',true);
							$(\'.e_mobile\').val(res.msg.mobile);
							$(\'.e_mobile\').prop(\'readonly\',true);
							$(\'.e_address\').val(res.msg.address);
							$(\'.e_address\').prop(\'readonly\',true);
							$(\'.e_email\').val(res.msg.email);
							$(\'.e_email\').prop(\'readonly\',true);
							$(\'#patient_id\').val(res.msg.id)
							$(\'#security_key\').val(res.msg.security_key);
							$(\'.e_city option[value="\'+res.msg.city_id+\'"]\').prop("selected",true);
							$(\'.AddDisSelect\').addClass(\'disabledSelect\');
							$(\'.e_city\').select2().trigger(\'change\');
						}else{

							$(\'#p_id\').val(\'\');
							$(\'#sec_key\').val(\'\');
							alert(res.msg);
							// $(\'#existPatientError\').val(msg);
						}
					}

				})
			}
		})

		$("#add_patient").click(function(){
			
			if ($(\'.e_name\').val()=="") {
				$("#add_new_patient").toggle();
			}

			$(\'.AddDisSelect\').removeClass(\'disabledSelect\')
			$(\'#p_id\').val(\'\');
			$(\'#patient_id\').val(\'\');
			$(\'#security_key\').val(\'\');
			$(\'#add_new_patient input\').val(\'\');
			$(\'.e_name\').prop(\'readonly\',false);
			$(\'.e_gender\').prop(\'readonly\',false);
			$(\'.e_marital_status\').prop(\'readonly\',false);
			$(\'.e_dob\').prop(\'readonly\',false);
			$(\'.e_mobile\').prop(\'readonly\',false);
			$(\'.e_address\').prop(\'readonly\',false);
			$(\'.e_email\').prop(\'readonly\',false);
		});
		$("#city").select2({
                    // placeholder: "Select a State",
                    allowClear: true
                });

	});
	function generateRandomNumber(){

		var d=new Date();
		var n=d.getTime();
		n = n.toString()
		m=n.substring(9,14)
		$(\'#security_key\').val(m);
	}
</script>
<noscript>
	<style type="text/css">
	.pagecontainer {display:none;}
</style>
<div class="noscriptmsg">
	You don\'t have javascript enabled.  Good luck with that.
</div>
</noscript>
'; ?>

