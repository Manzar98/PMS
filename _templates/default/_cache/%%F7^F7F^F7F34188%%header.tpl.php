<?php /* Smarty version 2.6.31, created on 2018-12-05 22:56:25
         compiled from header.tpl */ ?>
<!DOCTYPE html>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if (isset ( $this->_tpl_vars['seo_title'] )): ?><?php echo $this->_tpl_vars['seo_title']; ?>
<?php else: ?><?php echo $this->_tpl_vars['html_title']; ?>
<?php endif; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/css/jquery-ui-1.8.17.custom.css"/>

<!-- <script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/js/jquery.js" type="text/javascript" charset="utf-8"></script> -->
<!-- <script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/js/jquery.validate.min.js" type="text/javascript" charset="utf-8"></script> -->
<!-- <script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/js/jquery-ui-1.8.17.custom.min.js"></script> -->

</head>
<body>

<div id="fb-root"></div>
<?php echo '
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=198157676907872";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>
'; ?>

<div id="wrap">

<div id="main-body">


<div class="home">
<div id="header">

<div id="logo-placeholder">
	<h1><img style="float:right;" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/bg_logo.png" alt="Shamal TV" /></h1>
</div>
<div class="clear"></div>
<div id="navigation">

<?php if (( isset ( $this->_tpl_vars['LINKS_TYPE'] ) && $this->_tpl_vars['LINKS_TYPE'] == 'Links' )): ?>
<ul>
<?php $_from = $this->_tpl_vars['navigation']['secondary']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nav']):
?>
<li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == "'{".($this->_tpl_vars['nav']).".name"): ?>'}class="current"<?php endif; ?> href="<?php if ($this->_tpl_vars['nav']['outside'] == 0): ?> <?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo $this->_tpl_vars['nav']['url']; ?>
<?php else: ?> <?php echo $this->_tpl_vars['nav']['url']; ?>
 <?php endif; ?>"><?php echo $this->_tpl_vars['nav']['name']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>	
<?php else: ?>	
<ul>	
<li><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
">Home</a></li>
<li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'videos'): ?>class="current"<?php endif; ?>  href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
videos/" >Videos</a></li>
<li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == 'shows'): ?>class="current"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
shows/"> Shows </a></li>
<?php $_from = $this->_tpl_vars['web_pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
<li><a <?php if ($this->_tpl_vars['CURRENT_PAGE'] == $this->_tpl_vars['page']): ?>class="current"<?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo $this->_tpl_vars['page']['url']; ?>
/"><?php echo $this->_tpl_vars['page']['title']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>
</div>
<div class="clear"></div>