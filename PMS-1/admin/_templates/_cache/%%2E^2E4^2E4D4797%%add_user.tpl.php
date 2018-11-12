<?php /* Smarty version 2.6.31, created on 2018-08-16 11:33:04
         compiled from users/add_user.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id="content">
			
			

				<h2>Add User</h2>
				
				<?php if (( isset ( $this->_tpl_vars['errors'] ) && $this->_tpl_vars['errors'] )): ?>
					<div class="fail">
						<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
							<?php echo $this->_tpl_vars['error']; ?>

						<?php endforeach; endif; unset($_from); ?>
					</div>
					<?php endif; ?>
			 <?php echo $_SERVER['REQUEST_URI']; ?>
 
			<form id="add_user" class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
				<fieldset>
					<legend><?php if (( isset ( $this->_tpl_vars['edit'] ) && $this->_tpl_vars['edit'] )): ?> Edit<?php else: ?> Add <?php endif; ?> User</legend>
					<div class="row">
						<div class="col-sm-4 common-bottom">
							<label for="name">User Name</label>
							<input type="text" name="name" id="name" class="form-control" />
						</div>
						<div class="col-sm-4 common-bottom">
							<label for="c_name">Clinic Name</label>
							<input type="text" name="c_name" id="c_name" class="form-control"/>
						</div>
						<div class="col-sm-4 common-bottom">
							<label for="email">Email address</label>
							<input type="email" name="email" id="email" class="form-control"/>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 common-bottom">
							<label for="expire">Expiration</label>
							<input type="text" name="expire" id="expire" class="form-control"/>
						</div>
						<div class="col-sm-4 common-bottom">
							<label for="password">Password</label>
							<input type="password" name="password" id="password"class="form-control"/>
						</div>
						<div class="col-sm-4 common-bottom" style="padding-top: 25px;">

							<input type="submit" name="submit" id="submit" class="btn btn-primary"/>
						</div>
					</div>
				</fieldset>			

			</form>
			
		</div><!-- #content -->

	<?php echo '
		<script type="text/javascript">
			$(document).ready(function()
			{
				$(\'#name\').focus();
				
				$("#add_user").validate({
					rules: {
						name: { required: true },
						password: { required: true }
					}
				});
			
		var today = new Date();
		$( "#expire" ).datepicker({
			dateFormat : "yy-mm-dd",
			changeMonth: true,
			minDate: today,
		});
	});
		</script>
		'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>