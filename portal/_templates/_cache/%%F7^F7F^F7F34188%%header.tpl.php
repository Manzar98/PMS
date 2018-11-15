<?php /* Smarty version 2.6.31, created on 2018-11-15 15:53:59
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
	<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/print.css" type="text/css" media="print" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/screen.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/fonts/kreon.css">
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/fonts/droidsans.css" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/bootstrap-theme.css" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/fonts/fontawesome.css" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/select2.css" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/croppie.css" />
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/jquery.timepicker.css" />
	<link href=" rel="stylesheet" />


	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.js" type="text/javascript"></script> 
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.bgiframe.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/functions.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/main.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/categories.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/hoverIntent.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/links.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/select2.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/messages.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/overlay.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/types.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.fancybox.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.timepicker.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery-ui.min.js"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/core.js"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/widget.js"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/datepicker.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/accordion.js"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/croppie.js"></script>
	<?php if (isset ( $this->_tpl_vars['editor'] )): ?>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/tiny_mce/tiny_mce.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/editor.js" type="text/javascript"></script>


	<script type="text/javascript">
		<?php echo '
		tinyMCE.init({
			plugins : \'style,layer,table,save,advhr,advimage,advlink,media,searchreplace,contextmenu,paste,directionality,nonbreaking,xhtmlxtras\',
			themes : \'advanced\',
			languages : \'en\',
			disk_cache : true,
			relative_urls : false, 
			debug : false
		});

		'; ?>

	</script>
	<?php endif; ?> 
	<script type="text/javascript">
		SIK.I18n = <?php echo $this->_tpl_vars['translationsJson']; ?>
;
	</script>
</head>

<body style="background: #8C856B url(<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/bg.jpg) no-repeat">
	<div id="wrap" class="container">
		<div class="noprint" id="top_nav">
			<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
">&larr; Back to site</a>
		</div>
		<?php if ($this->_tpl_vars['isAuthenticated'] == 1): ?>
		<?php if (isset ( $_SESSION['status'] )): ?>
		<div class="noprint" id="status">
			<?php echo $_SESSION['status']; ?>

		</div><!-- #status -->
		<?php endif; ?>
		<?php endif; ?>

		<h1 class="noprint docWrap"><?php echo $this->_tpl_vars['SITE_NAME']; ?>
 Administration</h1>
		<!-- <?php echo $this->_tpl_vars['CURRENT_PAGE']; ?>
 -->
		<?php if ($this->_tpl_vars['isAuthenticated'] == 1): ?>

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
           <a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
" class="navbar-brand scroll-top logo headerLogo"><b><?php echo $this->_tpl_vars['SITE_NAME']; ?>
</b></a>

        </div>
        <!--/.navbar-header-->
        <div id="main-nav" class="collapse navbar-collapse">
          <ul>
          <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == ''): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
">Home</a></li>
   <?php if (isset ( $_SESSION['UserType'] ) && $_SESSION['UserType'] != 'S_admin'): ?>
	<li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'prescriptions'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/">Prescriptions <i class="fa fa-caret-down" aria-hidden="true"></i></a>
		<ul>
			<li>
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-prescription/" >Add New</a>
			</li>
			<li>
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/" >View All</a>
			</li>
		</ul>	
	</li>
	<li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'patients'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/">Patients <i class="fa fa-caret-down" aria-hidden="true"></i></a>
		<ul>
			<li>
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/add/" >Add New</a>
			</li>
			<li>
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/" >View All</a>
			</li>
		</ul>	
	</li>
	<li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'medicine'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/">Medicine <i class="fa fa-caret-down" aria-hidden="true"></i></a>
		<ul>
			<li>
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/add/" >Add New</a>
			</li>
			<li>
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/" >View All</a>
			</li>
		</ul>	
	</li>
	<li>
		<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'tests'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/">Tests  <i class="fa fa-caret-down" aria-hidden="true"></i></a>
		<ul>
			<li>
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/add/">Add New</a>
			</li>
			<li>
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/">View All</a>
			</li>
		</ul>
	</li>
	<li>
		<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'reports'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
reports/<?php echo $_SESSION['AdminId']; ?>
/">Reports</a>
	</li>
	<li>
		<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'instructions'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
instructions/">Instructions</a>
	</li> 
	<?php endif; ?> 
	<li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'settings'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/">Settings <i class="fa fa-caret-down" aria-hidden="true"></i></a>
			<ul>
				<?php unset($this->_sections['index']);
$this->_sections['index']['name'] = 'index';
$this->_sections['index']['loop'] = is_array($_loop=$this->_tpl_vars['settings_categories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['index']['show'] = true;
$this->_sections['index']['max'] = $this->_sections['index']['loop'];
$this->_sections['index']['step'] = 1;
$this->_sections['index']['start'] = $this->_sections['index']['step'] > 0 ? 0 : $this->_sections['index']['loop']-1;
if ($this->_sections['index']['show']) {
    $this->_sections['index']['total'] = $this->_sections['index']['loop'];
    if ($this->_sections['index']['total'] == 0)
        $this->_sections['index']['show'] = false;
} else
    $this->_sections['index']['total'] = 0;
if ($this->_sections['index']['show']):

            for ($this->_sections['index']['index'] = $this->_sections['index']['start'], $this->_sections['index']['iteration'] = 1;
                 $this->_sections['index']['iteration'] <= $this->_sections['index']['total'];
                 $this->_sections['index']['index'] += $this->_sections['index']['step'], $this->_sections['index']['iteration']++):
$this->_sections['index']['rownum'] = $this->_sections['index']['iteration'];
$this->_sections['index']['index_prev'] = $this->_sections['index']['index'] - $this->_sections['index']['step'];
$this->_sections['index']['index_next'] = $this->_sections['index']['index'] + $this->_sections['index']['step'];
$this->_sections['index']['first']      = ($this->_sections['index']['iteration'] == 1);
$this->_sections['index']['last']       = ($this->_sections['index']['iteration'] == $this->_sections['index']['total']);
?>
				<li> <?php if ($this->_tpl_vars['settings_categories'][$this->_sections['index']['index']]['var_name'] == 'main'): ?>
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/<?php echo $this->_tpl_vars['settings_categories'][$this->_sections['index']['index']]['var_name']; ?>
?id=<?php echo $_SESSION['AdminId']; ?>
&c_id=1"><?php echo $this->_tpl_vars['settings_categories'][$this->_sections['index']['index']]['name']; ?>
</a>
					<?php else: ?>
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/<?php echo $this->_tpl_vars['settings_categories'][$this->_sections['index']['index']]['var_name']; ?>
?id=<?php echo $_SESSION['AdminId']; ?>
&c_id=2"><?php echo $this->_tpl_vars['settings_categories'][$this->_sections['index']['index']]['name']; ?>
</a>
					<?php endif; ?>
				</li>
				<?php endfor; endif; ?>
				<?php if (isset ( $_SESSION['UserType'] ) && $_SESSION['UserType'] != 'S_admin'): ?>
				<li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'work-settings'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
work-settings/">Time & Date</a>
				</li>
				<?php endif; ?>
			</ul>
		</li>
		<?php if (isset ( $_SESSION['UserType'] ) && $_SESSION['UserType'] != 'S_admin'): ?>
		<li>
			<a href="#">Profile <i class="fa fa-caret-down" aria-hidden="true"></i></a>
			<ul>
				<li style="text-align: center;">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
edit-users/<?php echo $_SESSION['AdminId']; ?>
/">Edit</a>
				</li>
				<li style="text-align: center;">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/view/<?php echo $_SESSION['AdminId']; ?>
/">View</a>
				</li>
				<li>
					<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'password'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
password/">Change password</a>
				</li>
			</ul>
		</li>
		<?php endif; ?>

		<?php if (isset ( $_SESSION['UserType'] ) && $_SESSION['UserType'] == 'S_admin'): ?>
		<li>
					<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'password'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
password/">Change password</a>
				</li>
		<li>
			<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'users'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/">Doctors <i class="fa fa-caret-down" aria-hidden="true"></i></a>
			<ul>
				<li>
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-users/">Add New</a>
				</li>
				<li>
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/">View All</a>
				</li>
			</ul>
		</li>
		<?php endif; ?>
      
      	<li class="pull-right"><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
logout/">Logout</a></li>
      	</ul>
                </div>
                <!--/.navbar-collapse-->
              </nav>
    </div>
  </header>

	<?php endif; ?>
	<div class="clear" style="height: 4px;"></div>
	