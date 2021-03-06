<?php /* Smarty version 2.6.31, created on 2019-01-02 19:12:22
         compiled from medicine.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'medicine.tpl', 138, false),array('function', 'cycle', 'medicine.tpl', 158, false),)), $this); ?>
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
				<?php if ($_GET['q'] != ''): ?>
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/">Medicines</a>
				</li>
				<li class="breadcrumb-item active">Search</li>
				<?php elseif (isset ( $this->_tpl_vars['id'] ) && $this->_tpl_vars['id'] == '0'): ?>
				<li class="breadcrumb-item active">Medicines</li>
				<?php else: ?>
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/">Medicines</a>
				</li>
				<li class="breadcrumb-item active text-capitalize"><?php echo $this->_tpl_vars['id']; ?>
</li>
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
		<?php if (isset ( $this->_tpl_vars['add'] )): ?>
		<h2 class="text-capitalize"><?php echo $this->_tpl_vars['id']; ?>
 Medicine</h2>
		<input type="hidden" name="" id="medicineFull" value="<?php echo $this->_tpl_vars['medicineFull']; ?>
">
		<form class="box" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend><?php echo $this->_tpl_vars['id']; ?>
 Medicine</legend>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">Medicine Name</label>
							<input type="text" name="name" id="name" value="<?php echo $this->_tpl_vars['data']['name']; ?>
" <?php if ($this->_tpl_vars['errors']['name']): ?> class="error form-control" <?php else: ?> class="form-control" <?php endif; ?> />
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="formula">Medicine Formula</label>
							<input type="text" name="formula" id="formula" value="<?php echo $this->_tpl_vars['data']['formula']; ?>
" <?php if ($this->_tpl_vars['errors']['name']): ?> class="error form-control" <?php else: ?> class="form-control" <?php endif; ?>/>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="type">Type</label>
							<select name="type" id="type" <?php if ($this->_tpl_vars['errors']['name']): ?> class="error form-control" <?php else: ?> class="form-control" <?php endif; ?>>
								<option value="" <?php if ($this->_tpl_vars['data']['type'] == ""): ?> selected="selected" <?php endif; ?> disabled="disabled">Select</option>
								<option <?php if ($this->_tpl_vars['data']['type'] == 'Tablet'): ?> selected="selected" <?php endif; ?> value="Tablet">Tablet</option>
								<option <?php if ($this->_tpl_vars['data']['type'] == 'Capsule'): ?> selected="selected" <?php endif; ?>  value="Capsule">Capsule</option>
								<option <?php if ($this->_tpl_vars['data']['type'] == 'Syrup'): ?> selected="selected" <?php endif; ?>  value="Syrup">Syrup</option>
								<option <?php if ($this->_tpl_vars['data']['type'] == 'Injection'): ?> selected="selected" <?php endif; ?>  value="Injection">Injection</option>
								<option <?php if ($this->_tpl_vars['data']['type'] == 'Cream'): ?> selected="selected" <?php endif; ?>  value="Cream">Cream</option>
								<option <?php if ($this->_tpl_vars['data']['type'] == 'Drops'): ?> selected="selected" <?php endif; ?>  value="Drops">Drops</option>
							</select>
						</div>	
					</div> 
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="company">Company</label>
							<input type="text" name="company" id="company" value="<?php echo $this->_tpl_vars['data']['company']; ?>
" <?php if ($this->_tpl_vars['errors']['name']): ?> class="error form-control" <?php else: ?> class="form-control" <?php endif; ?>/>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="dose">Dose</label>
							<input type="text" name="dose[]" id="dose" value="<?php echo $this->_tpl_vars['data']['dose']; ?>
" <?php if ($this->_tpl_vars['errors']['name']): ?> class="error form-control" <?php else: ?> class="form-control" <?php endif; ?>/>	</div>
						</div>
						<div class="col-sm-4" style="margin-top: 30px;">
							<input type="button" name="" id="m_does" value="Add More Dose" class="btn btn-primary" />
						</div>
					</div>
					<div class="row input_fields_wrap">

					</div>	
					<div class="col-sm-4 mx-auto mt-3">
						<input type="submit" name="submit" id="submit" value="<?php if ($this->_tpl_vars['id'] === 'add'): ?>Add<?php else: ?>Update<?php endif; ?>" class="btn btn-primary form-control" />
					</div>
				</fieldset>
			</form>
			<?php else: ?>
			<h2 class="headingBottom"><?php if ($_GET['q'] != ''): ?> Search Result For "<b><?php echo $_GET['q']; ?>
</b>" <?php else: ?>Medicine List<?php endif; ?></h2>
			<p>
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/add/" title="Add new"><i class="fa fa-plus-square sqicon" aria-hidden="true"></i></a>
			</p>

			<form class="box style" action="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
medicine/" method="get" enctype="multipart/form-data">
				<fieldset>
					<legend>Search for Medicine</legend>
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<select name="field" id="field" class="form-control">
									<option value="id" <?php if ($this->_tpl_vars['data']['field'] == 'id'): ?> selected="selected" <?php endif; ?>>Medicine ID</option>
									<option value="name" <?php if ($this->_tpl_vars['data']['field'] == 'name'): ?> selected="selected" <?php endif; ?>>Medicine Name</option>	
									<option value="formula" <?php if ($this->_tpl_vars['data']['field'] == 'formula'): ?> selected="selected" <?php endif; ?>>Medicine Formula</option>
									<option value="type" <?php if ($this->_tpl_vars['data']['field'] == 'type'): ?> selected="selected" <?php endif; ?>>Type</option>
									<option value="dose" <?php if ($this->_tpl_vars['data']['field'] == 'dose'): ?> selected="selected" <?php endif; ?>>Dose</option>
									<option value="company" <?php if ($this->_tpl_vars['data']['field'] == 'company'): ?> selected="selected" <?php endif; ?>>Company</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<input type="text" name="q" id="q" value="<?php echo $this->_tpl_vars['data']['q']; ?>
" maxlength="20" class="form-control" />
							</div>
						</div>
						<div class="col-sm-3">
							<input type="submit" value="Search" name="submit" id="submit" class="btn btn-primary" />
						</div>
					</div>
				</fieldset>
			</form>
			<?php if ($this->_tpl_vars['medicine_list']): ?>
			<div class="pull-right grp_btn">
				Group By :&nbsp; 
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

			<table class="table table-striped table-bordered" >
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
					<tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
						<td ><?php echo $this->_tpl_vars['med']['id']; ?>
</td>
						<td><?php echo $this->_tpl_vars['med']['name']; ?>
</td>
						<td ><?php echo $this->_tpl_vars['med']['formula']; ?>
</td>
						<td><?php echo $this->_tpl_vars['med']['dose']; ?>
</td>
						<td><?php echo $this->_tpl_vars['med']['type']; ?>
</td>
						<td><?php echo $this->_tpl_vars['med']['company']; ?>
</td>
						<td>
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
							No Medicines on the List
						</td>
					</tr>
					<?php endif; unset($_from); ?>
				</tbody>
			</table>
			<?php endforeach; endif; unset($_from); ?>
			<?php else: ?>
			<p class="box-info text-center" style="margin-top: 7rem!important;"><?php if (isset ( $_GET['field'] )): ?>No Medicine against this <?php echo $_GET['field']; ?>
 <?php else: ?>No medicines on the list <?php endif; ?></p>
			<?php endif; ?>
			<div class="pagination">
				<?php echo $this->_tpl_vars['pages']; ?>

			</div>


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

		$(document).ready(function() {
			var max_fields      = 5;
			var wrapper    = $(".input_fields_wrap");
			var x = 1; 
			$(\'#m_does\').click(function(e){
				e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append(\'<div class="col-sm-4 common-bottom"><label for="dose\'+x+\'">Dose</label><a href="#" class="remove_field pull-right"><i class="fa fa-times" aria-hidden="true"></i></a><input type="text" name="dose[]" id="dose\'+x+\'" class="form-control"/></div>\'); //add input box
        }
    })

	 $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	 	e.preventDefault(); $(this).parent(\'div\').remove(); x--;
	 })

	 if ($(\'#medicineFull\').val()) {
	 	alert($(\'#medicineFull\').val());
	 }else{
	 	$(\'#medicineFull\').val(\'\');
	 }
	 
	 $(\'#collapseMedicine\').collapse({
	 	toggle: true
	 })

	})
</script>
'; ?>