<?php /* Smarty version 2.6.31, created on 2018-08-15 20:52:07
         compiled from instructions/instructions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'print_r', 'instructions/instructions.tpl', 16, false),array('modifier', 'date_format', 'instructions/instructions.tpl', 86, false),array('function', 'cycle', 'instructions/instructions.tpl', 104, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="content">
	<div class="container-fluid"> 
		
		
		<?php if (isset ( $this->_tpl_vars['edit'] ) || isset ( $this->_tpl_vars['add'] )): ?>
		<h2><?php if (isset ( $this->_tpl_vars['edit'] )): ?> Edit<?php else: ?> Add <?php endif; ?> Instruction</h2>

		<?php if (isset ( $this->_tpl_vars['errors'] )): ?>
		<div class="fail">
			<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
			<?php echo $this->_tpl_vars['error']; ?>

			<?php endforeach; endif; unset($_from); ?>
		</div>
		<?php endif; ?>
		<!-- <?php echo print_r($_SERVER['REQUEST_URI']); ?>
 -->
		<form id="add_instructions" class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
			<fieldset>
				<legend>Add Instructions</legend>  
				<div class="row">
					<div class="col-sm-4 common-bottom">
						<label for="medicine_id">Medicine</label>
						<select name="medicine_id" id="medicine_id" class="form-control">
							<option value="">Without Medicine</option>
							<?php $_from = $this->_tpl_vars['medicine_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['medicine']):
?>
							<option <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['medicine_id'] == $this->_tpl_vars['medicine']['id'] )): ?> selected="selected" <?php endif; ?> value="<?php echo $this->_tpl_vars['medicine']['id']; ?>
"><?php echo $this->_tpl_vars['medicine']['name']; ?>
</option>
							<?php endforeach; endif; unset($_from); ?>
						</select>
					</div>
				</div>
				<div class="row"> 
					<div class="col-sm-4 common-bottom">
						<label for="instruction">Instruction</label>
						<textarea name="instruction" id="instruction" class="form-control"><?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['instruction'] )): ?><?php echo $this->_tpl_vars['data']['instruction']; ?>
<?php endif; ?></textarea>
					</div>
				</div> 
				
				<div class="" style="margin-left: 15px;">
					<input type="submit" name="submit" id="submit" value="<?php if (isset ( $this->_tpl_vars['edit'] )): ?> Update<?php else: ?> Add <?php endif; ?>" class="btn btn-primary" />
				</div>
				
			</fieldset>			
		</form>
		<?php else: ?>


		<h2><?php if ($_GET['q'] != ''): ?> Search Result For "<b><?php echo $_GET['q']; ?>
</b>" <?php else: ?>Instructions List<?php endif; ?></h2>
		<p>
			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
instructions/add/" title="Add new"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
		</p>

		<form class="box style" action="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
instructions/" method="get" enctype="multipart/form-data">
			<fieldset>
				<legend>Search for Instructions</legend>
				<div class="row">
					<div class="col-sm-3 search-top">
						<select name="field" id="field" class="form-control">
							<option value="instruction" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['field'] == 'instruction' )): ?> selected="selected" <?php endif; ?>>Instruction</option>
							<option value="medicine.name" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['field'] == 'medicine_name' )): ?> selected="selected" <?php endif; ?>>Medicine Name</option>	
						</select>
					</div>
					<div class="col-sm-3 search-top">
						<input type="text" name="q" id="q" <?php if (isset ( $this->_tpl_vars['data']['q'] )): ?>value="<?php echo $this->_tpl_vars['data']['q']; ?>
"<?php endif; ?> maxlength="20" class="form-control" />
					</div>
					<div class="col-sm-3 search-top">
						<input type="submit" value="Search" name="submit" id="submit" class="btn btn-primary" />
					</div>
				</div>
			</fieldset>
		</form>
		
		<?php if ($_GET['q'] != ''): ?>
		<p><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/">Back to all Medicine List</a></p>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['grouped_instructions']): ?>

		<div class="pagination  pull-right grp_btn">
			<span style="margin-bottom: 5px;">Group By :</span>  
			<a <?php if (( isset ( $this->_tpl_vars['group_by'] ) && $this->_tpl_vars['group_by'] == 'medicine_name' )): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
instructions/?group_by=medicine_name&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Medicine Name</a>
			<a <?php if (( isset ( $this->_tpl_vars['group_by'] ) && $this->_tpl_vars['group_by'] == 'instruction' )): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
instructions/?group_by=instruction&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Instruction</a>
		</div>
		<?php $_from = $this->_tpl_vars['grouped_instructions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['instructions']):
?>

		<table class="table table-striped table-bordered" >
			<?php if (isset ( $this->_tpl_vars['group_by'] ) == 'date'): ?>
			<caption><?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
</caption>				
			<?php elseif (isset ( $this->_tpl_vars['group_by'] ) == 'patient_id'): ?>
			<caption>Patient ID: <?php echo $this->_tpl_vars['key']; ?>
</caption>
			<?php else: ?>
			<caption><?php echo $this->_tpl_vars['key']; ?>
</caption>
			<?php endif; ?>

			<thead>
				<tr>
					<th>ID</th>
					<th>Medicine</th>
					<th>Instruction</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>		

				<?php $_from = $this->_tpl_vars['instructions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['instruction']):
?>
				<tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
					<td width="45"><?php echo $this->_tpl_vars['instruction']['id']; ?>
</td>
					<td width="150"><?php echo $this->_tpl_vars['instruction']['medicine_name']; ?>
</td>
					<td><?php echo $this->_tpl_vars['instruction']['instruction']; ?>
</td>
					<td width="50">
						<div class="icons">				
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
instructions/edit/<?php echo $this->_tpl_vars['instruction']['id']; ?>
/" title="Edit this"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
instructions/delete/<?php echo $this->_tpl_vars['instruction']['id']; ?>
/" title="Delete this" onclick="if(!confirm('Are you sure you want to delete this ?'))return false;"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/bin.png" alt="Delete" /></a>
						</div>
					</td>
				</tr>
				<?php endforeach; else: ?>
				<tr style="color:red;">
					<td>
						No Instructions on the List
					</td>
				</tr>
				<?php endif; unset($_from); ?>
			</tbody>
		</table>
		<?php endforeach; endif; unset($_from); ?>

		<?php endif; ?>

		<div class="pagination">
			<?php echo $this->_tpl_vars['pages']; ?>

		</div>
		<?php endif; ?>	
		
		
		
		
	</div><!-- #content -->
</div>
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
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