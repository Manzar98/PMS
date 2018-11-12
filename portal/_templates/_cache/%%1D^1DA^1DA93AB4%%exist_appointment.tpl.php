<?php /* Smarty version 2.6.31, created on 2018-10-04 16:34:04
         compiled from appointments/exist_appointment.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<style type="text/css">
	.docWrap{
		display: none;
	}
</style>
'; ?>

<div id="content">

		<input type="hidden" name="" value="<?php echo $this->_tpl_vars['erorMsg']; ?>
" id="errorId">
		<form id="add_user" class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-6">
					<input type="hidden" name="doc_id" id="doc_id" class="doc_id form-control" value="<?php echo $_GET['doc_id']; ?>
"/>
					<input type="hidden" name="doc_name" id="doc_name" class="doc_name form-control" value="<?php echo $_GET['doc_name']; ?>
" />
					<label for="dt" class="">Patient Id</label>
					<input type="text" name="p_id" id="p_id" class="p_id form-control" />
				</div>
				<div class="col-sm-1" style="padding-top: 24px;">
					<input type="submit" class="btn btn-primary" value="Search" />
				</div>
				<div class="" style="padding-top: 24px;">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-appointment/<?php echo $_GET['doc_id']; ?>
?doc_name=<?php echo $_GET['doc_name']; ?>
&doc_adr=<?php echo $_GET['doc_adr']; ?>
&doc_phne=<?php echo $_GET['doc_phne']; ?>
" class="btn btn-primary">New Patient</a>
				</div>
			</div>
		</form>
	</div><!-- #content -->
	<?php echo '
	<script type="text/javascript">
		$(document).ready(function()
		{
              if ($(\'#errorId\').val()) {
              	alert($(\'#errorId\').val());
              }
		});
</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>