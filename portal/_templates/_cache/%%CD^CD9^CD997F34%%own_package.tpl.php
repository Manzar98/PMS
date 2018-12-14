<?php /* Smarty version 2.6.31, created on 2018-12-12 16:23:38
         compiled from own_package.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'own_package.tpl', 15, false),array('modifier', 'print_r', 'own_package.tpl', 51, false),)), $this); ?>
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
		<h2 class="pt-2">Package Details</h2>
		<input type="hidden" name="" id="endDays" value='<?php echo ((is_array($_tmp=$this->_tpl_vars['docDetails']['expire'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m/%d/%Y") : smarty_modifier_date_format($_tmp, "%m/%d/%Y")); ?>
'>
		<div class="row text-center my-3 daysCounterWrap">
			<div class="col-sm-2 mx-auto">
				<div id="daysCounter"></div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-6 mx-auto">
				<table class="table table-bordered mt-5">
					<thead class="text-center text-white bg-dark">
						<tr>
							<th>Package Name</th>
							<th>Subscription Date</th>
							<th>Expiry Date</th>
						</tr>
					</thead>
					<tbody class="text-center text-dark font-weight-bold">
						<tr>
							<td class="text-capitalize"><?php echo $this->_tpl_vars['pkg_name']; ?>
</td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['docDetails']['d_join'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%b-%Y") : smarty_modifier_date_format($_tmp, "%d-%b-%Y")); ?>
</td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['docDetails']['expire'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%b-%Y") : smarty_modifier_date_format($_tmp, "%d-%b-%Y")); ?>
</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<table class="table table-striped table-bordered mt-5">
			<thead class="bg-dark">
				<tr >
					<th class="text-center text-white">Items</th>
					<th class="text-center text-white">Total</th>
					<th class="text-center text-white">Consumed</th>
				</tr>
			</thead>
			<tbody>
				<!-- <?php echo ((is_array($_tmp=$this->_tpl_vars['Result'])) ? $this->_run_mod_handler('print_r', true, $_tmp) : print_r($_tmp)); ?>
 -->
				<?php $_from = $this->_tpl_vars['Result']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
				<tr class="">
					<td class="text-center text-dark"><?php echo $this->_tpl_vars['k']; ?>
</td>
					<?php if ($this->_tpl_vars['v'][0]-$this->_tpl_vars['v'][1] <= 10): ?>
					<?php $_from = $this->_tpl_vars['v']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
					<?php if ($this->_tpl_vars['val'] == ""): ?>
					<td class="text-center">0</td>
					<?php else: ?>
					<?php if ($this->_tpl_vars['key'] == 1): ?>
					<td class="text-center text-white font-weight-bold  bg-danger"><?php echo $this->_tpl_vars['val']; ?>
</td>
					<?php else: ?>
					<td class="text-center text-dark font-weight-bold"><?php echo $this->_tpl_vars['val']; ?>
</td>
					<?php endif; ?>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
					<?php else: ?>

					<?php $_from = $this->_tpl_vars['v']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
					<?php if ($this->_tpl_vars['val'] == ""): ?>
					<td class="text-center">0</td>
					<?php else: ?>
					<td class="text-center text-dark font-weight-bold"><?php echo $this->_tpl_vars['val']; ?>
</td>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			</tbody>
		</table>
	</div>
</div><!-- #content -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/jquery.countdown.js"></script> 
<?php echo '
<style type="text/css">
#daysCounter{

	font-size: 23px;
	width: auto;
	height: auto;
	border: 1px solid #dcdcdc;
	padding: 10px;
	box-shadow: 0 0 5px 5px #dcdcdc;
	border-radius: 5px;
	font-weight: 700;
	color: #DC3545;
}
</style>
<script type="text/javascript">
	$(\'.daysCounterWrap\').hide()
	$(document).ready(function(){
    
   	  var date1 = new Date(); //mm/dd/yyyy
   	  //debugger
      var date2 = new Date($(\'#endDays\').val());  //mm/dd/yyyy
      var timeDiff = Math.abs(date2.getTime() - date1.getTime());
      var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
debugger
      if (diffDays < 30) {
      	debugger
      	$(\'.daysCounterWrap\').show()
      	$(\'#daysCounter\').countdown($(\'#endDays\').val(), function(event) {
      		$(this).html(event.strftime(\'%D Days Left!\'));
      	});
      }


})
</script>
'; ?>