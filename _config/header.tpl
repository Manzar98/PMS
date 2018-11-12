<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>{$SITE_NAME} Administration</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="description" content="{$meta_description}" />
	<meta name="keywords" content="{$meta_keywords}" />
	<link rel="shortcut icon" href="{$BASE_URL}favicon.ico" type="image/x-icon" />
	
	
			
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/print.css" type="text/css" media="print" />
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/screen.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/jquery.fancybox-1.2.6.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/jquery-ui.css">
    <link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/fonts/kreon.css">
    <link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/fonts/droidsans.css" />
    <link href=" rel="stylesheet" />

	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
 -->
 
    <script src="{$BASE_URL_ADMIN}_templates/js/jquery.js" type="text/javascript"></script> 
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery.bgiframe.min.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/functions.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/main.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/categories.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/hoverIntent.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/links.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/messages.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/overlay.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/superfish.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/supersubs.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/types.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery.fancybox-1.2.6.pack.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery.timepicker.js" type="text/javascript"></script>
  	<script src="{$BASE_URL_ADMIN}_templates/js/jquery-ui.min.js"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery.ui.core.js"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery.ui.widget.js"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery.ui.datepicker.js" type="text/javascript"></script>
	<script src="{$BASE_URL_ADMIN}_templates/js/jquery.ui.accordion.js"></script>
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

	<link rel="stylesheet" type="text/css" media="screen" href="{$BASE_URL_ADMIN}_templates/css/superfish.css" /> 
	<link rel="stylesheet" type="text/css" media="screen" href="{$BASE_URL_ADMIN}_templates/css/superfish-navbar.css" />  
	{literal}
	<script type="text/javascript"> 
	 $(document).ready(function(){ 
	 $("ul.sf-menu").superfish({ 
	 animation: {height:'show'},
	 delay:     1500
	 }); 
	 }); 
	</script>
	
	{/literal}
</head>

<body style="background: #8C856B url({$BASE_URL_ADMIN}_templates/img/bg.jpg) no-repeat">
	<div id="wrap">
	<div class="noprint" id="top_nav">
	 <a href="{$BASE_URL}">&larr; Back to site</a>
	</div>
	{if $isAuthenticated == 1}
	 {if isset($smarty.session.status)}
	 <div id="status">
	 {$smarty.session.status}
	 </div><!-- #status -->
	 {/if}
	{/if}

	 <h1 class="noprint">{$SITE_NAME} Administration</h1>
     <!-- {$CURRENT_PAGE} -->
	{if $isAuthenticated == 1}
	 <ul class="sf-menu sf-navbar noprint">
	 <li><a {if $CURRENT_PAGE == ''}class="selected"{/if} href="{$BASE_URL_ADMIN}">Home</a></li>
	 <li><a {if $CURRENT_PAGE == 'prescriptions'} class="selected" {/if} href="{$BASE_URL_ADMIN}prescriptions/">Prescriptions</a>
     	<ul>
     		<li>
     			<a href="{$BASE_URL_ADMIN}add-prescription/" >Add Prescription</a>
     		</li>
     		<li>
     			<a href="{$BASE_URL_ADMIN}prescriptions/" >View All Prescriptions</a>
     		</li>
     	</ul>	
     </li>
     <li><a {if $CURRENT_PAGE == 'patients'} class="selected" {/if} href="{$BASE_URL_ADMIN}patients/">Patients</a>
     	<ul>
     		<li>
     			<a href="{$BASE_URL_ADMIN}patients/add/" >Add a Patient</a>
     		</li>
     		<li>
     			<a href="{$BASE_URL_ADMIN}patients/" >View all Patient</a>
     		</li>
     	</ul>	
     </li>
     <li><a {if $CURRENT_PAGE == 'medicine'} class="selected" {/if} href="{$BASE_URL_ADMIN}medicine/">Medicine</a>
     	<ul>
     		<li>
     			<a href="{$BASE_URL_ADMIN}medicine/add/" >Add a Medicine</a>
     		</li>
     		<li>
     			<a href="{$BASE_URL_ADMIN}medicine/" >View all Medicine</a>
     		</li>
     	</ul>	
     </li>
     <li>
     	<a {if $CURRENT_PAGE == 'tests'} class="selected" {/if} href="{$BASE_URL_ADMIN}tests/">Tests</a>
     	<ul>
     		<li>
     			<a href="{$BASE_URL_ADMIN}tests/add/">Add New Test</a>
     		</li>
     		<li>
     			<a href="{$BASE_URL_ADMIN}tests/">View All Tests</a>
     		</li>
     		
     	</ul>
     </li>
      <li>
     	<a {if $CURRENT_PAGE == 'instructions'} class="selected" {/if} href="{$BASE_URL_ADMIN}instructions/">Instructions</a>
     </li>    
     
<!-- 	 <li><a {if $CURRENT_PAGE == 'pages'}class="selected"{/if} href="{$BASE_URL_ADMIN}pages/">Pages</a></li>
	 <li><a {if $CURRENT_PAGE == 'links'}class="selected"{/if} href="{$BASE_URL_ADMIN}links/">Links</a>
		 <ul>
			 <li><a href="{$BASE_URL_ADMIN}links/home/">Home Links</a></li>

			 <li><a href="{$BASE_URL_ADMIN}links/secondary/">Main Menu</a></li>
		
			 <li><a href="{$BASE_URL_ADMIN}links/footer1/">Footer Column 1</a></li>
			 <li><a href="{$BASE_URL_ADMIN}links/footer2/">Footer Column 2</a></li>
			 <li><a href="{$BASE_URL_ADMIN}links/footer3/">Footer Column 3</a></li>
			
		 </ul>
	 </li> -->
	 <li><a {if $CURRENT_PAGE == 'settings'}class="selected"{/if} href="{$BASE_URL_ADMIN}settings/">Settings</a>
	 <ul>
	 {section name=index loop=$settings_categories}
	 <li><a href="{$BASE_URL_ADMIN}settings/{$settings_categories[index].var_name}/">{$settings_categories[index].name}</a></li>
	 {/section}
	 </ul>
	 </li>
	 <li><a {if $CURRENT_PAGE == 'password'}class="selected"{/if} href="{$BASE_URL_ADMIN}password/">Change password</a></li>
	 {if isset($smarty.session.UserType) && $smarty.session.UserType=="S_admin"}
	 <li>
	 	<a {if $CURRENT_PAGE == 'users'}class="selected"{/if} href="{$BASE_URL_ADMIN}users/">Users</a>
	 	<ul>
	 		<li>
     			<a href="{$BASE_URL_ADMIN}users/add/">Add New User</a>
     		</li>
     		<li>
     			<a href="{$BASE_URL_ADMIN}users/">View All Users</a>
     		</li>
	 	</ul>
	 </li>
	  {/if}
	 <li class="right bold"><a href="{$BASE_URL_ADMIN}logout/">Logout</a></li>
	 </ul>
		
	{/if}
	<div class="clear" style="height: 4px;"></div>
	
