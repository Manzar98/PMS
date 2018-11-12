<?php /* Smarty version 2.6.31, created on 2018-11-12 17:02:12
         compiled from work_settings.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- <link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/clockpicker.css" /> -->
<!-- <script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/clockpicker.js" type="text/javascript"></script>  -->
<?php echo '
<script type="text/javascript">
	$(document).ready(function()
	{


});
</script>
'; ?>

<div id="content">
	<div class="container-fluid checkboxWrap">
		<h2>Time & Date Settings</h2>
		<form class="box" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post" enctype="multipart/form-data">
			
		</form>
		<div style="margin-bottom: 50px;"></div>
	</div>
</div>

<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	