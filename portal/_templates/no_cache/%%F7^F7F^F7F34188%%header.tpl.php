<?php /* Smarty version 2.6.26, created on 2012-07-01 12:17:34
         compiled from header.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title><?php echo $this->_tpl_vars['SITE_NAME']; ?>
 Administration</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
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
_templates/css/jquery.fancybox-1.2.6.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/fonts/kreon.css">
    <link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/fonts/droidsans.css" />
	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
 -->
 
    <script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.js" type="text/javascript"></script> 
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.bgiframe.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/functions.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/main.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/categories.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/hoverIntent.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/links.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/messages.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/overlay.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/superfish.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/supersubs.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/types.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.fancybox-1.2.6.pack.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.timepicker.js" type="text/javascript"></script>
  	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery-ui.min.js"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.ui.core.js"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.ui.widget.js"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.ui.datepicker.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.ui.accordion.js"></script>

<!-- <?php if ($this->_tpl_vars['editor']): ?>

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
	<?php endif; ?>   -->
	<script type="text/javascript">
	 SIK.I18n = <?php echo $this->_tpl_vars['translationsJson']; ?>
;
	</script>

	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/superfish.css" /> 
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/superfish-navbar.css" />  
	<?php echo '
	<script type="text/javascript"> 
	 $(document).ready(function(){ 
	 $("ul.sf-menu").superfish({ 
	 animation: {height:\'show\'},
	 delay:     1500
	 }); 
	 }); 
	</script>
	
	'; ?>

</head>

<body style="background: #8C856B url(<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/bg.jpg) no-repeat">
	<div id="wrap">
	<div class="noprint" id="top_nav">
	 <a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
">&larr; Back to site</a>
	</div>
	<?php //print_r($_SESSION); ?>
	<?php if ($this->_tpl_vars['isAuthenticated'] == 1): ?>
	 <?php if (isset($_SESSION['status'])): ?>
	 <div id="status">
	 <?php echo $_SESSION['status']; ?>

	 </div><!-- #status -->
	 <?php endif; ?>
	<?php endif; ?>
	<?php //print_r($this->_tpl_vars);?>
	 <h1 class="noprint"><?php echo $this->_tpl_vars['SITE_NAME']; ?>
 Administration</h1>

	<?php if ($this->_tpl_vars['isAuthenticated'] == 1): ?>
	 <ul class="sf-menu sf-navbar noprint">
	 <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == ''): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
">Home</a></li>
	 <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'prescriptions'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/">Prescriptions</a>
     	<ul>
     		<li>
     			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-prescription/" >Add Prescription</a>
     		</li>
     		<li>
     			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
prescriptions/" >View All Prescriptions</a>
     		</li>
     	</ul>	
     </li>
     <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'patients'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/">Patients</a>
     	<ul>
     		<li>
     			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/add/" >Add a Patient</a>
     		</li>
     		<li>
     			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/" >View all Patient</a>
     		</li>
     	</ul>	
     </li>
     <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'medicine'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/">Medicine</a>
     	<ul>
     		<li>
     			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/add/" >Add a Medicine</a>
     		</li>
     		<li>
     			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/" >View all Medicine</a>
     		</li>
     	</ul>	
     </li>
     <li>
     	<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'tests'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/">Tests</a>
     	<ul>
     		<li>
     			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/add/">Add New Test</a>
     		</li>
     		<li>
     			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/">View All Tests</a>
     		</li>
     		
     	</ul>
     </li>
      <li>
     	<a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'instructions'): ?> class="selected" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
instructions/">Instructions</a>
     </li>    
     
	 <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'pages'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
pages/">Pages</a></li>
	 <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'links'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/">Links</a>
		 <ul>
			 <li><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/home/">Home Links</a></li>

			 <li><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/secondary/">Main Menu</a></li>
			<!--
			 <li><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/footer1/">Footer Column 1</a></li>
			 <li><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/footer2/">Footer Column 2</a></li>
			 <li><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
links/footer3/">Footer Column 3</a></li>
			-->
		 </ul>
	 </li>
	 <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'settings'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/">Settings</a>
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
	 <li><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/<?php echo $this->_tpl_vars['settings_categories'][$this->_sections['index']['index']]['var_name']; ?>
/"><?php echo $this->_tpl_vars['settings_categories'][$this->_sections['index']['index']]['name']; ?>
</a></li>
	 <?php endfor; endif; ?>
	 </ul>
	 </li>
	 <li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'password'): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
password/">Change password</a></li>
	 <li class="right bold"><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
logout/">Logout</a></li>
	 </ul>
		
	<?php endif; ?>
	<div class="clear" style="height: 4px;"></div>
	
