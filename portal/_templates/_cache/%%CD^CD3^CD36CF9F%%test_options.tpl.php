<?php /* Smarty version 2.6.31, created on 2019-01-02 18:34:43
         compiled from tests/test_options.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'tests/test_options.tpl', 93, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id=""  class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
">Dashboard</a>
				</li>
				<?php if (isset ( $this->_tpl_vars['edit'] ) || isset ( $this->_tpl_vars['add'] )): ?>
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/">Tests</a>
				</li>
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
test-options/<?php echo $this->_tpl_vars['test_id']; ?>
/">Test Options</a>
				</li>
				<li class="breadcrumb-item active"><?php if (isset ( $this->_tpl_vars['edit'] )): ?> Edit<?php else: ?> Add <?php endif; ?> Test Option</li>
				<?php else: ?>
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/">Tests</a>
				</li>
				<li class="breadcrumb-item active">Test Options</li>
				<?php endif; ?>
			</ol>
		</div>
		<?php if (( isset ( $_SESSION['flashAlert'] ) )): ?>
		<div class="fail text-center ">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<?php echo $_SESSION['flashAlert']; ?>

				<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="<?php  unset($_SESSION['flashAlert']);  ?>">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>		
		</div>
		<?php endif; ?>
		<?php if (isset ( $this->_tpl_vars['edit'] ) || isset ( $this->_tpl_vars['add'] )): ?>
		<h2 class="pt-2"><?php if (isset ( $this->_tpl_vars['edit'] )): ?> Edit<?php else: ?> Add <?php endif; ?> Test Option</h2>
		
		<?php if (isset ( $this->_tpl_vars['errors'] )): ?>
		<div class="fail">
			<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
			<?php echo $this->_tpl_vars['error']; ?>

			<?php endforeach; endif; unset($_from); ?>
		</div>
		<?php endif; ?>
		
		<form id="add_option_options" class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
			
			<fieldset>
				<legend><?php if (isset ( $this->_tpl_vars['edit'] )): ?>Edit <?php else: ?>Add <?php endif; ?> Test Options</legend>

				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">Option Name</label>
							<input type="text" name="name" id="name" maxlength="100" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['name'] )): ?>value="<?php echo $this->_tpl_vars['data']['name']; ?>
"<?php endif; ?> class="form-control"/>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="measurement">Measurment</label>
							<input type="text" name="measurement" id="measurement" maxlength="100" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['name'] )): ?>value="<?php echo $this->_tpl_vars['data']['measurement']; ?>
"<?php endif; ?> class="form-control"/>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="normal_range">Normal Range</label>
							<input type="text" name="normal_range" id="normal_range" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['name'] )): ?>value="<?php echo $this->_tpl_vars['data']['normal_range']; ?>
"<?php endif; ?> class="form-control" />
						</div>
					</div>
				</div>
				<div class="col-sm-3 mx-auto mt-3">
					<input type="submit" name="submit" id="submit" value="<?php if (isset ( $this->_tpl_vars['edit'] )): ?> Update<?php else: ?> Add <?php endif; ?>" class="btn btn-primary form-control" />
				</div>	
			</fieldset>		
		</form>
		<?php else: ?>
		<p>
			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
test-options/add/<?php echo $this->_tpl_vars['test_id']; ?>
/" title="Add a new"><i class="fa fa-plus-square sqicon pt-2" aria-hidden="true"></i></a>
		</p>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Option Name</th>
					<th>Measurement</th>
					<th>Normal Range</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php $_from = $this->_tpl_vars['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option']):
?>
				<tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
					<td width="45"><?php echo $this->_tpl_vars['option']['id']; ?>
</td>
					<td><?php echo $this->_tpl_vars['option']['name']; ?>
</td>
					<td><?php echo $this->_tpl_vars['option']['measurement']; ?>
</td>
					<td><?php echo $this->_tpl_vars['option']['normal_range']; ?>
</td>
					
					<td width="50">
						<div class="icons">				
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
test-options/edit/<?php echo $this->_tpl_vars['option']['id']; ?>
/" title="Edit this"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
test-options/delete/<?php echo $this->_tpl_vars['option']['id']; ?>
/" title="Delete this" onclick="if(!confirm('Are you sure you want to delete this ?'))return false;"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/bin.png" alt="Delete" /></a>
						</div>
					</td>
				</tr>
				<?php endforeach; else: ?>
				<tr style="color:red;">
					<td>
						No Options on the List
					</td>
				</tr>
				<?php endif; unset($_from); ?>
			</tbody>
		</table>
		<?php endif; ?>		
	</div><!-- #content -->
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script type="text/javascript">
	$(document).ready(function()
	{
		$(\'#name\').focus();
		
		$("#add_test_option").validate({
			rules: {
				name: { required: true }
			}
		});
	});
</script>
'; ?>
