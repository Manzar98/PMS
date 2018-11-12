<?php /* Smarty version 2.6.26, created on 2012-06-27 20:24:23
         compiled from tests/tests.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'tests/tests.tpl', 45, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id="content">
			
			
		<?php if ($this->_tpl_vars['edit'] || $this->_tpl_vars['add']): ?>
				<h2><?php if ($this->_tpl_vars['edit']): ?> Edit<?php else: ?> Add <?php endif; ?> Test</h2>
				
				<?php if ($this->_tpl_vars['errors']): ?>
					<div class="fail">
						<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
							<?php echo $this->_tpl_vars['error']; ?>

						<?php endforeach; endif; unset($_from); ?>
					</div>
				<?php endif; ?>
				
			<form id="add_test" class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
			
				<fieldset>
					<legend>Add Test</legend>
					<label for="name">Test Name
						<input type="text" name="name" id="name" maxlength="100" value="<?php echo $this->_tpl_vars['data']['name']; ?>
" />
					</label>
					
													
					<input type="submit" name="submit" id="submit" value="<?php if ($this->_tpl_vars['edit']): ?> Update<?php else: ?> Add <?php endif; ?>" />
				</fieldset>			
			</form>
		<?php else: ?>
		
		<p>
			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/add/" title="Add a new"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/plus-button.png" alt="Add new" /></a>
		</p>
		
		
		<table class="zebra">
			<thead>
				<tr>
					<th>ID</th>
					<th>Test Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $_from = $this->_tpl_vars['tests']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['test']):
?>
				<tr class="row <?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
					<td width="45"><?php echo $this->_tpl_vars['test']['id']; ?>
</td>
					<td><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
test-options/<?php echo $this->_tpl_vars['test']['id']; ?>
/" ><?php echo $this->_tpl_vars['test']['name']; ?>
</a></td>
					<td width="90">
						<div class="icons">				
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
test-options/<?php echo $this->_tpl_vars['test']['id']; ?>
/" title="Add Options"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/041.png" alt="Add Options" /></a>
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/edit/<?php echo $this->_tpl_vars['test']['id']; ?>
/" title="Edit this"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/delete/<?php echo $this->_tpl_vars['test']['id']; ?>
/" title="Delete this" onclick="if(!confirm('Are you sure you want to delete this ?'))return false;"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/bin.png" alt="Delete" /></a>
						</div>
					</td>
				</tr>
				<?php endforeach; else: ?>
					<tr style="color:red;">
						<td>
							No Tests on the List
						</td>
					</tr>
				<?php endif; unset($_from); ?>
			</tbody>
		</table>
				
			<?php endif; ?>	
			
			<div class="pagination">
				<?php echo $this->_tpl_vars['pages']; ?>

			</div>
			
			
			
		</div><!-- #content -->

	<?php echo '
		<script type="text/javascript">
			$(document).ready(function()
			{
				$(\'#name\').focus();
				
				$("#add_test").validate({
					rules: {
						name: { required: true }
					}
				});
			});
		</script>
		'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>