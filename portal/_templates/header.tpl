<!DOCTYPE html>

<html>
<head>
	<title>{$SITE_NAME} Administration</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="{$meta_description}" />
	<meta name="keywords" content="{$meta_keywords}" />
	<!-- <link rel="shortcut icon" href="{$BASE_URL}favicon.ico" type="image/x-icon" /> -->
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/print.css" type="text/css" media="print" />
	<!-- Bootstrap core CSS-->
	<link href="{$BASE_URL_ADMIN}_templates/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Icon fonts-->
	<link href="{$BASE_URL_ADMIN}_templates/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Plugin styles -->
	<link href="{$BASE_URL_ADMIN}_templates/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<!-- Main styles -->
	<link href="{$BASE_URL_ADMIN}_templates/css/custom.css" rel="stylesheet">
	<!-- Main styles -->
	<link href="{$BASE_URL_ADMIN}_templates/css/admin.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/screen.css" type="text/css" media="screen" /> -->
	<!-- <link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/jquery.fancybox.css" type="text/css" media="screen" /> -->
	<!-- <link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/jquery-ui.css"> -->
	<!-- <link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/fonts/kreon.css"> -->
	<!-- <link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/fonts/droidsans.css" /> -->
	<!-- <link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/bootstrap.css" /> -->
	<!-- <link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/bootstrap-theme.css" /> -->
	<!-- <link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/fonts/fontawesome.css" /> -->
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/select2.css" />
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/croppie.css" />
	<!-- <link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/jquery.timepicker.css" /> -->
	<link href=" rel="stylesheet" />
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery.js" type="text/javascript"></script> 
	<!-- Doctor Template Scripting Start  -->
	<script src="{$BASE_URL_ADMIN}_templates/js/admin.js" type="text/javascript"></script> 
	<script src="{$BASE_URL_ADMIN}_templates/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery-easing/jquery.easing.min.js" type="text/javascript"></script> 
	<!-- Doctor Template Scripting End  -->
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery.bgiframe.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/functions.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/main.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/categories.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/hoverIntent.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/links.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/select2.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/messages.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/overlay.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/types.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery.fancybox.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery.timepicker.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery-ui.min.js"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/core.js"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/widget.js"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/datepicker.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/accordion.js"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/croppie.js"></script>
	{if isset($editor)}
	<script src="{$BASE_URL_ADMIN}_templates/js/tiny_mce/tiny_mce.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/editor.js" type="text/javascript"></script>


	<script type="text/javascript">
		{literal}
		tinyMCE.init({
			plugins : 'style,layer,table,save,advhr,advimage,advlink,media,searchreplace,contextmenu,paste,directionality,nonbreaking,xhtmlxtras',
			themes : 'advanced',
			languages : 'en',
			disk_cache : true,
			relative_urls : false, 
			debug : false
		});

		{/literal}
	</script>
	{/if} 
	<script type="text/javascript">
		SIK.I18n = {$translationsJson};
	</script>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
	<div id="wrap" class="">
		{if $isAuthenticated == 1}
		{if isset($smarty.session.status)}
		<div class="noprint" id="status">
			{$smarty.session.status}
		</div><!-- #status -->
		{/if}
		{/if}

		{if $isAuthenticated == 1}
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
							<li class="nav-item {if $CURRENT_PAGE == ''}selected{/if}" data-toggle="tooltip" data-placement="right" title="Dashboard">
								<a class="nav-link" href="{$BASE_URL_ADMIN}">
									<i class="fa fa-fw fa-dashboard"></i>
									<span class="nav-link-text">Dashboard</span>
								</a>
							</li>
							{if isset($smarty.session.UserType) && $smarty.session.UserType!="S_admin"}
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Prescriptions">
								<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePrescription" data-parent="#exampleAccordion">
									<i class="fa fa-fw fa-file-text-o"></i>
									<span class="nav-link-text">Prescriptions</span>
								</a>
								<ul class="sidenav-second-level collapse" id="collapsePrescription">
									<li>
										<a href="{$BASE_URL_ADMIN}prescriptions/">View All</a>
									</li>
									<li>
										<a href="{$BASE_URL_ADMIN}add-prescription/">Add New</a>
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
										<a href="{$BASE_URL_ADMIN}patients/">View All</a>
									</li>
									<li>
										<a href="{$BASE_URL_ADMIN}patients/add/">Add New</a>
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
										<a href="{$BASE_URL_ADMIN}medicine/">View All</a>
									</li>
									<li>
										<a href="{$BASE_URL_ADMIN}medicine/add/">Add New</a>
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
										<a href="{$BASE_URL_ADMIN}tests/">View All</a>
									</li>
									<li>
										<a href="{$BASE_URL_ADMIN}tests/add/">Add New</a>
									</li>
								</ul>
							</li>
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
								<a class="nav-link {if $CURRENT_PAGE == 'reports'}selected{/if}" href="{$BASE_URL_ADMIN}reports/{$smarty.session.AdminId}/">
									<i class="fa fa-fw fa-bars"></i>
									<span class="nav-link-text">Reports</span>
								</a>
							</li>
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
								<a class="nav-link {if $CURRENT_PAGE == 'instructions'}selected{/if}" href="{$BASE_URL_ADMIN}instructions/">
									<i class="fa fa-fw fa-list-ul"></i>
									<span class="nav-link-text">Instructions</span>
								</a>
							</li>
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
								<a class="nav-link {if $CURRENT_PAGE == 'work-settings'}selected{/if}" href="{$BASE_URL_ADMIN}work-settings/">
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
										<a href="{$BASE_URL_ADMIN}edit-users/{$smarty.session.AdminId}/">Edit Profile</a>
									</li>
									<li>
										<a href="{$BASE_URL_ADMIN}users/view/{$smarty.session.AdminId}/">View Profile</a>
									</li>
									<li>
										<a href="{$BASE_URL_ADMIN}password/">Change Password</a>
									</li>
								</ul>
							</li>
							{else isset($smarty.session.UserType) && $smarty.session.UserType=="S_admin"}
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Prescriptions">
								<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseDoctor" data-parent="#exampleAccordion">
									<i class="fa fa-fw fa-user-md"></i>
									<span class="nav-link-text">Doctors</span>
								</a>
								<ul class="sidenav-second-level collapse" id="collapseDoctor">
									<li>
										<a href="{$BASE_URL_ADMIN}users/">View All</a>
									</li>
									<li>
										<a href="{$BASE_URL_ADMIN}add-users/">Add New</a>
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
										<a href="{$BASE_URL_ADMIN}packages/">View All</a>
									</li>
									<li>
										<a href="{$BASE_URL_ADMIN}add-package/">Add New</a>
									</li>
								</ul>
							</li>
							<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
								<a class="nav-link {if $CURRENT_PAGE == 'password'}selected{/if}" href="{$BASE_URL_ADMIN}password/">
									<i class="fa fa-fw fa-clock-o"></i>
									<span class="nav-link-text">Change password</span>
								</a>
							</li>
							{/if}
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
								<a class="nav-link" data-toggle="modal" href="{$BASE_URL_ADMIN}logout/">
									<i class="fa fa-fw fa-sign-out"></i>Logout</a>
								</li>
							</ul>
						</div>
					</nav>
					<!-- /Navigation-->
				</div>
			</header>
			{/if}
			
			
