<?php /* Smarty version 2.6.31, created on 2018-12-04 18:13:14
         compiled from own_package.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="" class="content-wrapper">
	<div class="container-fluid">
				<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
">Dashboard</a>
				</li>	
				<li class="breadcrumb-item active">View Package</li>

			</ol>
		</div>
		<h2>Package Details</h2>
		<table class="table table-striped table-bordered" style="margin: 50px 0;">
			<thead>
				<tr>
					<th class="text-center">Items</th>
					<th class="text-center">Total</th>
					<th class="text-center">Consumed</th>
				</tr>
			</thead>
			<tbody>
				<?php $_from = $this->_tpl_vars['Result']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
				<tr class="">
					<td class="text-center"><?php echo $this->_tpl_vars['k']; ?>
</td>
					<?php $_from = $this->_tpl_vars['v']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
					<?php if ($this->_tpl_vars['val'] == ""): ?>
					<td class="text-center">0</td>
					<?php else: ?>
					<td class="text-center"><?php echo $this->_tpl_vars['val']; ?>
</td>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			</tbody>
		</table>
	</div>
</div><!-- #content -->
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>