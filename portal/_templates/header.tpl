<!DOCTYPE html>

<html>
<head>
	<title>{$SITE_NAME} Administration</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="{$meta_description}" />
	<meta name="keywords" content="{$meta_keywords}" />
	<link rel="shortcut icon" href="{$BASE_URL}favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/print.css" type="text/css" media="print" />
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/screen.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/jquery-ui.css">
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/fonts/kreon.css">
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/fonts/droidsans.css" />
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/bootstrap.css" />
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/bootstrap-theme.css" />
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/fonts/fontawesome.css" />
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/select2.css" />
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/croppie.css" />
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/jquery.timepicker.css" />
	<link href=" rel="stylesheet" />


	<script src="{$BASE_URL_ADMIN}_templates/js/jquery.js" type="text/javascript"></script> 
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

<body style="background: #8C856B url({$BASE_URL_ADMIN}_templates/img/bg.jpg) no-repeat">
	<div id="wrap" class="container">
		<div class="noprint" id="top_nav">
			<a href="{$BASE_URL}">&larr; Back to site</a>
		</div>
		{if $isAuthenticated == 1}
		{if isset($smarty.session.status)}
		<div class="noprint" id="status">
			{$smarty.session.status}
		</div><!-- #status -->
		{/if}
		{/if}

		<h1 class="noprint docWrap">{$SITE_NAME} Administration</h1>
		<!-- {$CURRENT_PAGE} -->
		{if $isAuthenticated == 1}

   <header>
    <div class="docWrap">
    	 <nav class="navbar navbar-inverse" role="navigation" width="103%">
        <div class="navbar-header">
          <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           <a href="{$BASE_URL_ADMIN}" class="navbar-brand scroll-top logo headerLogo"><b>{$SITE_NAME}</b></a>

        </div>
        <!--/.navbar-header-->
        <div id="main-nav" class="collapse navbar-collapse">
          <ul>
          <li><a {if $CURRENT_PAGE == ''}class="selected"{/if} href="{$BASE_URL_ADMIN}">Home</a></li>
   {if isset($smarty.session.UserType) && $smarty.session.UserType!="S_admin"}
	<li><a {if $CURRENT_PAGE == 'prescriptions'} class="selected" {/if} href="{$BASE_URL_ADMIN}prescriptions/">Prescriptions <i class="fa fa-caret-down" aria-hidden="true"></i></a>
		<ul>
			<li>
				<a href="{$BASE_URL_ADMIN}add-prescription/" >Add New</a>
			</li>
			<li>
				<a href="{$BASE_URL_ADMIN}prescriptions/" >View All</a>
			</li>
		</ul>	
	</li>
	<li><a {if $CURRENT_PAGE == 'patients'} class="selected" {/if} href="{$BASE_URL_ADMIN}patients/">Patients <i class="fa fa-caret-down" aria-hidden="true"></i></a>
		<ul>
			<li>
				<a href="{$BASE_URL_ADMIN}patients/add/" >Add New</a>
			</li>
			<li>
				<a href="{$BASE_URL_ADMIN}patients/" >View All</a>
			</li>
		</ul>	
	</li>
	<li><a {if $CURRENT_PAGE == 'medicine'} class="selected" {/if} href="{$BASE_URL_ADMIN}medicine/">Medicine <i class="fa fa-caret-down" aria-hidden="true"></i></a>
		<ul>
			<li>
				<a href="{$BASE_URL_ADMIN}medicine/add/" >Add New</a>
			</li>
			<li>
				<a href="{$BASE_URL_ADMIN}medicine/" >View All</a>
			</li>
		</ul>	
	</li>
	<li>
		<a {if $CURRENT_PAGE == 'tests'} class="selected" {/if} href="{$BASE_URL_ADMIN}tests/">Tests  <i class="fa fa-caret-down" aria-hidden="true"></i></a>
		<ul>
			<li>
				<a href="{$BASE_URL_ADMIN}tests/add/">Add New</a>
			</li>
			<li>
				<a href="{$BASE_URL_ADMIN}tests/">View All</a>
			</li>
		</ul>
	</li>
	<li>
		<a {if $CURRENT_PAGE == 'reports'} class="selected" {/if} href="{$BASE_URL_ADMIN}reports/{$smarty.session.AdminId}/">Reports</a>
	</li>
	<li>
		<a {if $CURRENT_PAGE == 'instructions'} class="selected" {/if} href="{$BASE_URL_ADMIN}instructions/">Instructions</a>
	</li> 
	{/if} 
	<li><a {if $CURRENT_PAGE == 'settings'}class="selected"{/if} href="{$BASE_URL_ADMIN}settings/">Settings <i class="fa fa-caret-down" aria-hidden="true"></i></a>
			<ul>
				{section name=index loop=$settings_categories}
				<li> {if $settings_categories[index].var_name== "main"}
					<a href="{$BASE_URL_ADMIN}settings/{$settings_categories[index].var_name}?id={$smarty.session.AdminId}&c_id=1">{$settings_categories[index].name}</a>
					{else}
					<a href="{$BASE_URL_ADMIN}settings/{$settings_categories[index].var_name}?id={$smarty.session.AdminId}&c_id=2">{$settings_categories[index].name}</a>
					{/if}
				</li>
				{/section}
				<li><a {if $CURRENT_PAGE == 'work-settings'} class="selected" {/if} href="{$BASE_URL_ADMIN}work-settings/">Time & Date</a></li>
			</ul>
		</li>
		{if isset($smarty.session.UserType) && $smarty.session.UserType!="S_admin"}
		<li>
			<a href="#">Profile <i class="fa fa-caret-down" aria-hidden="true"></i></a>
			<ul>
				<li style="text-align: center;">
					<a href="{$BASE_URL_ADMIN}edit-users/{$smarty.session.AdminId}/">Edit</a>
				</li>
				<li style="text-align: center;">
					<a href="{$BASE_URL_ADMIN}users/view/{$smarty.session.AdminId}/">View</a>
				</li>
				<li>
					<a {if $CURRENT_PAGE == 'password'}class="selected"{/if} href="{$BASE_URL_ADMIN}password/">Change password</a>
				</li>
			</ul>
		</li>
		{/if}

		{if isset($smarty.session.UserType) && $smarty.session.UserType=="S_admin"}
		<li>
					<a {if $CURRENT_PAGE == 'password'}class="selected"{/if} href="{$BASE_URL_ADMIN}password/">Change password</a>
				</li>
		<li>
			<a {if $CURRENT_PAGE == 'users'}class="selected"{/if} href="{$BASE_URL_ADMIN}users/">Users <i class="fa fa-caret-down" aria-hidden="true"></i></a>
			<ul>
				<li>
					<a href="{$BASE_URL_ADMIN}add-users/">Add New</a>
				</li>
				<li>
					<a href="{$BASE_URL_ADMIN}users/">View All</a>
				</li>
			</ul>
		</li>
		{/if}
      
      	<li class="pull-right"><a href="{$BASE_URL_ADMIN}logout/">Logout</a></li>
      	</ul>
                </div>
                <!--/.navbar-collapse-->
              </nav>
    </div>
  </header>

	{/if}
	<div class="clear" style="height: 4px;"></div>
	
