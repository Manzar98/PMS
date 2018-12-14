<?php /* Smarty version 2.6.31, created on 2018-12-13 23:21:20
         compiled from tests/tests.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'print_r', 'tests/tests.tpl', 102, false),array('function', 'cycle', 'tests/tests.tpl', 119, false),)), $this); ?>
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
				<?php if ($_GET['q'] != ''): ?>
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/">Tests</a>
				</li>
				<li class="breadcrumb-item active">Search</li>
				<?php elseif (( isset ( $this->_tpl_vars['edit'] ) || isset ( $this->_tpl_vars['add'] ) )): ?>
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/">Tests</a>
				</li>
				<li class="breadcrumb-item active"><?php if (( isset ( $this->_tpl_vars['edit'] ) && $this->_tpl_vars['edit'] )): ?>Edit<?php else: ?>Add<?php endif; ?></li>
				<?php else: ?>
				<li class="breadcrumb-item active">Tests</li>
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
		<?php if (( isset ( $this->_tpl_vars['edit'] ) || isset ( $this->_tpl_vars['add'] ) )): ?>
		<h2 class="pt-3"><?php if (( isset ( $this->_tpl_vars['edit'] ) && $this->_tpl_vars['edit'] )): ?> Edit<?php else: ?> Add <?php endif; ?> Test</h2>

		<?php if (( isset ( $this->_tpl_vars['errors'] ) && $this->_tpl_vars['errors'] )): ?>
		<div class="fail">
			<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
			<?php echo $this->_tpl_vars['error']; ?>

			<?php endforeach; endif; unset($_from); ?>
		</div>
		<?php endif; ?>
		<input type="hidden" name="" id="testsFull" value="<?php echo $this->_tpl_vars['testsFull']; ?>
">
		<form id="add_test" class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">

			<fieldset>
				<legend>Add Test</legend>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">Test Name</label>
							<input type="text" name="name" id="name" maxlength="100" <?php if (( isset ( $this->_tpl_vars['data'] ) )): ?>value="<?php echo $this->_tpl_vars['data']['name']; ?>
"<?php endif; ?> class="form-control" />
						</div>
					</div>
					<div class="col-sm-1" style="margin-top: 28px;">
						<input type="submit" name="submit" id="submit" value="<?php if (( isset ( $this->_tpl_vars['edit'] ) )): ?> Update<?php else: ?> Add <?php endif; ?>" class="btn btn-primary form-control" />
					</div>
				</div>
			</fieldset>	
			<div class="" style="margin-bottom: 20px;"></div>		
		</form>
		<?php else: ?>
		<h2 class="pb-2 pt-2"><?php if ($_GET['q'] != ''): ?> Search Result For "<b><?php echo $_GET['q']; ?>
</b>" <?php else: ?>Test List<?php endif; ?></h2>
		<p class="common-top">
			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/add/" title="Add a new"><i class="fa fa-plus-square sqicon" aria-hidden="true"></i></a>
		</p>

		<form class="box style noprint" action="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/" method="get" enctype="multipart/form-data">
			<fieldset>
				<legend>Search for Tests</legend>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<select name="field" id="field" class="form-control">
								<option value="id" <?php if (( isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['field'] == 'id' )): ?> selected="selected" <?php endif; ?>>Test ID</option>
								<option value="name" <?php if (( isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['field'] == 'name' )): ?> selected="selected" <?php endif; ?>>Test Name</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<input type="text" name="q" id="q" <?php if (isset ( $this->_tpl_vars['search'] ) && $this->_tpl_vars['search']['q']): ?>value="<?php echo $this->_tpl_vars['search']['q']; ?>
"<?php endif; ?> maxlength="20" class="form-control" />
						</div>
					</div>
					<div class="col-sm-3">
						<input type="submit" value="Search" name="submit" id="submit" class="btn btn-primary"/>
					</div>
				</div>
			</fieldset>
		</form>
		<div class="pull-right grp_btn">
			Group By :&nbsp; 
			<a <?php if ($this->_tpl_vars['group_by'] == 'id'): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/?group_by=id&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Test id</a>
			<a <?php if ($this->_tpl_vars['group_by'] == 'name'): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/?group_by=name&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Test Name</a>
		</div>
		<?php if ($this->_tpl_vars['tests']): ?>	
		<?php $_from = $this->_tpl_vars['tests']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['test']):
?>
		<table class="table table-striped table-bordered">
			<!-- <?php echo $this->_tpl_vars['group_by']; ?>
 -->
			<!-- <?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('print_r', true, $_tmp) : print_r($_tmp)); ?>
  -->
			<?php if ($this->_tpl_vars['group_by'] == 'id'): ?>
			<caption>Test ID: <?php echo $this->_tpl_vars['key']; ?>
</caption>				
			<?php else: ?>
			<caption><?php echo $this->_tpl_vars['key']; ?>
</caption>
			<?php endif; ?>
			<thead>
				<tr>
					<th>ID</th>
					<th>Test Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				

				<?php $_from = $this->_tpl_vars['test']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tst']):
?>
				<tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
					<td width="45"><?php echo $this->_tpl_vars['tst']['id']; ?>
</td>
					<td><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
test-options/<?php echo $this->_tpl_vars['test']['id']; ?>
/" ><?php echo $this->_tpl_vars['tst']['name']; ?>
</a></td>
					<td width="150">
						<div class="icons">				
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
test-options/<?php echo $this->_tpl_vars['tst']['id']; ?>
/" title="Add Options"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/041.png" alt="Add Options" /></a>
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/edit/<?php echo $this->_tpl_vars['tst']['id']; ?>
/" title="Edit this"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
tests/delete/<?php echo $this->_tpl_vars['tst']['id']; ?>
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
		<?php endforeach; endif; unset($_from); ?>
		<?php else: ?>
		<p class="box-info text-center" style="margin-top: 7rem!important;">No Test against this <?php echo $_GET['field']; ?>
</p>
		<?php endif; ?>
		<?php endif; ?>	
		<div class="pagination">
			<?php echo $this->_tpl_vars['pages']; ?>

		</div>
	</div>
</div><!-- #content -->
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

		$("#add_test").validate({
			rules: {
				name: { required: true }
			}
		});

		if ($(\'#testsFull\').val()) {
			
			alert($(\'#testsFull\').val());
		}else{
			$(\'#testsFull\').val(\'\');
		}

		$(\'#collapseTest\').collapse({
			toggle: true
		})
	});
</script>
'; ?>

