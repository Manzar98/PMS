<?php /* Smarty version 2.6.26, created on 2012-06-27 19:35:47
         compiled from medicine.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'medicine.tpl', 87, false),array('function', 'cycle', 'medicine.tpl', 107, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
		
		<div id="content">
			
			<?php if ($this->_tpl_vars['add']): ?>
			
				<form class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post" enctype="multipart/form-data">
					<fieldset>
						<legend>Add Medicine</legend>
						
					<label for="name">Medicine Name
						<input type="text" name="name" id="name" value="<?php echo $this->_tpl_vars['data']['name']; ?>
" <?php if ($this->_tpl_vars['errors']['name']): ?> class="error" <?php endif; ?>/>	
					</label>

					<label for="formula">Medicine Formula
						<input type="text" name="formula" id="formula" value="<?php echo $this->_tpl_vars['data']['formula']; ?>
" <?php if ($this->_tpl_vars['errors']['formula']): ?> class="error" <?php endif; ?>/>	
					</label>

					<label for="type">Type
						<select name="type" id="type" <?php if ($this->_tpl_vars['errors']['type']): ?> class="error" <?php endif; ?>>
							<option value="" <?php if ($this->_tpl_vars['data']['type'] == ""): ?> selected="selected" <?php endif; ?> disabled="disabled">Select</option>
							<option <?php if ($this->_tpl_vars['data']['type'] == 'Tablet'): ?> selected="selected" <?php endif; ?> value="Tablet">Tablet</option>
							<option <?php if ($this->_tpl_vars['data']['type'] == 'Capsule'): ?> selected="selected" <?php endif; ?>  value="Capsule">Capsule</option>
							<option <?php if ($this->_tpl_vars['data']['type'] == 'Syrup'): ?> selected="selected" <?php endif; ?>  value="Syrup">Syrup</option>
							<option <?php if ($this->_tpl_vars['data']['type'] == 'Injection'): ?> selected="selected" <?php endif; ?>  value="Injection">Injection</option>
							<option <?php if ($this->_tpl_vars['data']['type'] == 'Cream'): ?> selected="selected" <?php endif; ?>  value="Cream">Cream</option>
							<option <?php if ($this->_tpl_vars['data']['type'] == 'Drops'): ?> selected="selected" <?php endif; ?>  value="Drops">Drops</option>
						</select>	
					</label>

					<label for="dose">Dose
						<input type="text" name="dose" id="dose" value="<?php echo $this->_tpl_vars['data']['dose']; ?>
" <?php if ($this->_tpl_vars['errors']['dose']): ?> class="error" <?php endif; ?>/>	
					</label>

					<label for="company">Company
						<input type="text" name="company" id="company" value="<?php echo $this->_tpl_vars['data']['company']; ?>
" <?php if ($this->_tpl_vars['errors']['company']): ?> class="error" <?php endif; ?>/>	
					</label>
					
					<br class="clear"/>
						<input type="submit" name="submit" id="submit" value="Submit" />	
					
					</fieldset>
				</form>
			
			<?php else: ?>
			<h2><?php if ($_GET['q'] != ''): ?> Search Result For "<b><?php echo $_GET['q']; ?>
</b>" <?php else: ?>Medicine List<?php endif; ?></h2>
			<p>
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/add/" title="Add new"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/plus-button.png" alt="Add new" /></a>
			</p>
		
			<form class="box style" action="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/" method="get" enctype="multipart/form-data">
				<fieldset>
					<legend>Search for Medicine</legend>
				<select name="field" id="field">
					<option value="id" <?php if ($this->_tpl_vars['data']['field'] == 'id'): ?> selected="selected" <?php endif; ?>>Medicine ID</option>
					<option value="name" <?php if ($this->_tpl_vars['data']['field'] == 'name'): ?> selected="selected" <?php endif; ?>>Medicine Name</option>	
					<option value="formula" <?php if ($this->_tpl_vars['data']['field'] == 'formula'): ?> selected="selected" <?php endif; ?>>Medicine Formula</option>
					<option value="type" <?php if ($this->_tpl_vars['data']['field'] == 'type'): ?> selected="selected" <?php endif; ?>>Type</option>
					<option value="dose" <?php if ($this->_tpl_vars['data']['field'] == 'dose'): ?> selected="selected" <?php endif; ?>>Dose</option>
					<option value="company" <?php if ($this->_tpl_vars['data']['field'] == 'company'): ?> selected="selected" <?php endif; ?>>Company</option>
				</select>
				
				<input type="text" name="q" id="q" value="<?php echo $this->_tpl_vars['data']['q']; ?>
" maxlength="20" />
				
				<input type="submit" value="Search" name="submit" id="submit" />
				</fieldset>
			</form>
			
			<?php if ($_GET['q'] != ''): ?>
				<p><a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/">Back to all Medicine List</a></p>
			<?php endif; ?>
			
			<?php if ($this->_tpl_vars['medicine_list']): ?>
				
				<div style="text-align: right" class="pagination">
					Group By : 
					<a <?php if ($this->_tpl_vars['group_by'] == 'formula'): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/?group_by=formula&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Formula</a>
					<a <?php if ($this->_tpl_vars['group_by'] == 'dose'): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/?group_by=dose&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Dose</a>
					<a <?php if ($this->_tpl_vars['group_by'] == 'type'): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/?group_by=type&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Type</a>
					<a <?php if ($this->_tpl_vars['group_by'] == 'company'): ?> class="current_page" <?php endif; ?> href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/?group_by=company&q=<?php echo $_GET['q']; ?>
&field=<?php echo $_GET['field']; ?>
&p=<?php echo $_GET['p']; ?>
">Company</a>
				</div>
			<?php $_from = $this->_tpl_vars['medicine_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['medicine']):
?>
		
					<table class="zebra" >
					<?php if ($this->_tpl_vars['group_by'] == 'date'): ?>
						<caption><?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
</caption>				
					<?php elseif ($this->_tpl_vars['group_by'] == 'patient_id'): ?>
						<caption>Patient ID: <?php echo $this->_tpl_vars['key']; ?>
</caption>
					<?php else: ?>
						<caption><?php echo $this->_tpl_vars['key']; ?>
</caption>
					<?php endif; ?>
					
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Formula</th>
							<th>Dose</th>
							<th>Type</th>
							<th>Company</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $_from = $this->_tpl_vars['medicine']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['med']):
?>
					<tr class="row <?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
						<td width="45"><?php echo $this->_tpl_vars['med']['id']; ?>
</td>
						<td><?php echo $this->_tpl_vars['med']['name']; ?>
</td>
						<td width="100"><?php echo $this->_tpl_vars['med']['formula']; ?>
</td>
						<td><?php echo $this->_tpl_vars['med']['dose']; ?>
</td>
						<td><?php echo $this->_tpl_vars['med']['type']; ?>
</td>
						<td><?php echo $this->_tpl_vars['med']['company']; ?>
</td>
						<td width="90">
							<div class="icons">				
								<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/edit/<?php echo $this->_tpl_vars['med']['id']; ?>
/" title="Edit"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/pencil.png" alt="Edit" /></a>
								<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/delete/<?php echo $this->_tpl_vars['med']['id']; ?>
/" title="Delete this" onclick="if(!confirm('Are you sure you want to delete this ?'))return false;"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/bin.png" alt="Delete" /></a>
							</div>
						</td>
					</tr>
					<?php endforeach; else: ?>
						<tr style="color:red;">
							<td>
								No Medicine on the List
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

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>