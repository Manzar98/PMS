<?php /* Smarty version 2.6.31, created on 2018-11-15 14:47:23
         compiled from settings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'settings.tpl', 14, false),array('modifier', 'print_r', 'settings.tpl', 73, false),array('modifier', 'escape', 'settings.tpl', 87, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="content">
	<div class="container-fluid">
		<?php if ($this->_tpl_vars['settings_categories'] && isset ( $this->_tpl_vars['settings_form'] ) == ''): ?>
		<div class="row">
			
				<i class="fa fa-cogs" aria-hidden="true" style="color: #064f68;float: left;clear: both;line-height: 70px;font-size: 30px;margin-right: 9px; "></i>
				<h2 id="settings" class="pull-left">Settings Overview</h2>
		</div>
		
		<div class="row list common-top settingWrap">
			
			<?php unset($this->_sections['tmp']);
$this->_sections['tmp']['name'] = 'tmp';
$this->_sections['tmp']['loop'] = is_array($_loop=$this->_tpl_vars['settings_categories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tmp']['show'] = true;
$this->_sections['tmp']['max'] = $this->_sections['tmp']['loop'];
$this->_sections['tmp']['step'] = 1;
$this->_sections['tmp']['start'] = $this->_sections['tmp']['step'] > 0 ? 0 : $this->_sections['tmp']['loop']-1;
if ($this->_sections['tmp']['show']) {
    $this->_sections['tmp']['total'] = $this->_sections['tmp']['loop'];
    if ($this->_sections['tmp']['total'] == 0)
        $this->_sections['tmp']['show'] = false;
} else
    $this->_sections['tmp']['total'] = 0;
if ($this->_sections['tmp']['show']):

            for ($this->_sections['tmp']['index'] = $this->_sections['tmp']['start'], $this->_sections['tmp']['iteration'] = 1;
                 $this->_sections['tmp']['iteration'] <= $this->_sections['tmp']['total'];
                 $this->_sections['tmp']['index'] += $this->_sections['tmp']['step'], $this->_sections['tmp']['iteration']++):
$this->_sections['tmp']['rownum'] = $this->_sections['tmp']['iteration'];
$this->_sections['tmp']['index_prev'] = $this->_sections['tmp']['index'] - $this->_sections['tmp']['step'];
$this->_sections['tmp']['index_next'] = $this->_sections['tmp']['index'] + $this->_sections['tmp']['step'];
$this->_sections['tmp']['first']      = ($this->_sections['tmp']['iteration'] == 1);
$this->_sections['tmp']['last']       = ($this->_sections['tmp']['iteration'] == $this->_sections['tmp']['total']);
?>
			<div class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
 setBolc">
				<div class="col-sm-4 text-center">
					<?php if ($this->_tpl_vars['settings_categories'][$this->_sections['tmp']['index']]['name'] == 'Main Settings'): ?>
					<div class="mainWrap"> 
						<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/<?php echo $this->_tpl_vars['settings_categories'][$this->_sections['tmp']['index']]['var_name']; ?>
?id=<?php echo $_SESSION['AdminId']; ?>
&c_id=1" title="Edit <?php echo $this->_tpl_vars['settings_categories'][$this->_sections['tmp']['index']]['name']; ?>
">
							<i class="fa fa-cogs" aria-hidden="true" style="color: #064f68;"></i>
							<h4 class="setH2"><?php echo $this->_tpl_vars['settings_categories'][$this->_sections['tmp']['index']]['name']; ?>
</h4>
							<div class="divP"><?php if ($this->_tpl_vars['settings_categories'][$this->_sections['tmp']['index']]['description'] != ''): ?><?php echo $this->_tpl_vars['settings_categories'][$this->_sections['tmp']['index']]['description']; ?>
<?php endif; ?>
							</div>
						</a>
					</div>
					<?php else: ?>
					<div class="feeWrap">
						<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/<?php echo $this->_tpl_vars['settings_categories'][$this->_sections['tmp']['index']]['var_name']; ?>
?id=<?php echo $_SESSION['AdminId']; ?>
&c_id=2" title="Edit <?php echo $this->_tpl_vars['settings_categories'][$this->_sections['tmp']['index']]['name']; ?>
">
							<i class="fa fa-dollar" aria-hidden="true" style="color: #85bb65;"></i><h4 class="setH2 "><?php echo $this->_tpl_vars['settings_categories'][$this->_sections['tmp']['index']]['name']; ?>
</h4>
							<div class="divP"><?php if ($this->_tpl_vars['settings_categories'][$this->_sections['tmp']['index']]['description'] != ''): ?><?php echo $this->_tpl_vars['settings_categories'][$this->_sections['tmp']['index']]['description']; ?>
<?php endif; ?>
							</div>
						</a>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endfor; endif; ?>
			<?php if (isset ( $_SESSION['UserType'] ) && $_SESSION['UserType'] != 'S_admin'): ?>
			<div class="setBolc">
			<div class="col-sm-4 text-center ">
				<div class="feeWrap">
						<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
work-settings/" title="">
							<i class="fa fa-clock-o" aria-hidden="true" style="color: ;"></i><h4 class="setH2 ">Time & Date</h4>
							<div class="divP">
								Manage availability settings
							</div>
						</a>
					</div>
			</div>
			</div>
			<?php endif; ?>
		</div>
		<div style="margin-bottom: 20px;"></div>

		<?php endif; ?>

		<?php if (isset ( $this->_tpl_vars['settings_form'] ) != ''): ?>
		<?php if ($this->_tpl_vars['category_name'] != ''): ?><h2 id="settings"><?php echo $this->_tpl_vars['category_name']; ?>
</h2><?php endif; ?>
		
		<?php if (isset ( $this->_tpl_vars['errors'] ) != ''): ?>
		<div class="fail">
			<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
			<?php unset($this->_sections['tmp2']);
$this->_sections['tmp2']['name'] = 'tmp2';
$this->_sections['tmp2']['loop'] = is_array($_loop=$this->_tpl_vars['error']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tmp2']['show'] = true;
$this->_sections['tmp2']['max'] = $this->_sections['tmp2']['loop'];
$this->_sections['tmp2']['step'] = 1;
$this->_sections['tmp2']['start'] = $this->_sections['tmp2']['step'] > 0 ? 0 : $this->_sections['tmp2']['loop']-1;
if ($this->_sections['tmp2']['show']) {
    $this->_sections['tmp2']['total'] = $this->_sections['tmp2']['loop'];
    if ($this->_sections['tmp2']['total'] == 0)
        $this->_sections['tmp2']['show'] = false;
} else
    $this->_sections['tmp2']['total'] = 0;
if ($this->_sections['tmp2']['show']):

            for ($this->_sections['tmp2']['index'] = $this->_sections['tmp2']['start'], $this->_sections['tmp2']['iteration'] = 1;
                 $this->_sections['tmp2']['iteration'] <= $this->_sections['tmp2']['total'];
                 $this->_sections['tmp2']['index'] += $this->_sections['tmp2']['step'], $this->_sections['tmp2']['iteration']++):
$this->_sections['tmp2']['rownum'] = $this->_sections['tmp2']['iteration'];
$this->_sections['tmp2']['index_prev'] = $this->_sections['tmp2']['index'] - $this->_sections['tmp2']['step'];
$this->_sections['tmp2']['index_next'] = $this->_sections['tmp2']['index'] + $this->_sections['tmp2']['step'];
$this->_sections['tmp2']['first']      = ($this->_sections['tmp2']['iteration'] == 1);
$this->_sections['tmp2']['last']       = ($this->_sections['tmp2']['iteration'] == $this->_sections['tmp2']['total']);
?>								
			<div><?php echo $this->_tpl_vars['error'][$this->_sections['tmp2']['index']]; ?>
</div>
			<?php endfor; endif; ?>						
			<?php endforeach; endif; unset($_from); ?>
		</div>
		<?php endif; ?>
		
		<form id="publish_form" method="post" action="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/<?php echo $this->_tpl_vars['CURRENT_ID']; ?>
/">
			<div class="row list settings common-top">
				<div class="">
					<h2>Reached Here</h2>
					<?php echo ((is_array($_tmp=$this->_tpl_vars['settings_form'])) ? $this->_run_mod_handler('print_r', true, $_tmp) : print_r($_tmp)); ?>

					<?php $_from = $this->_tpl_vars['settings_form']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['setting']):
?>
					<?php $this->assign('name', $this->_tpl_vars['setting']['name']); ?>
					<?php $this->assign('title', $this->_tpl_vars['setting']['title']); ?>
					<?php $this->assign('description', $this->_tpl_vars['setting']['description']); ?>
					<?php $this->assign('value', $this->_tpl_vars['setting']['value']); ?>
					<?php $this->assign('data_type', $this->_tpl_vars['setting']['data_type']); ?>
					<?php $this->assign('input_type', $this->_tpl_vars['setting']['input_type']); ?>
					<?php $this->assign('input_options', $this->_tpl_vars['setting']['input_options']); ?>
					
					<div class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
<?php if ($this->_tpl_vars['errors'][$this->_tpl_vars['name']] != ''): ?> error<?php endif; ?>">
						<div class="col-sm-5 common-bottom">
							<label><?php echo $this->_tpl_vars['title']; ?>
</label>
							<?php if ($this->_tpl_vars['input_type'] == 'text_area'): ?>
							<textarea class="form-control settingsform_text_area<?php if ($this->_tpl_vars['errors'][$this->_tpl_vars['name']] != ''): ?> error<?php endif; ?> form-control" name="<?php echo $this->_tpl_vars['name']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
						</div>
						<div class="col-sm-5 common-bottom">
							<?php elseif ($this->_tpl_vars['input_type'] == 'radiobutton'): ?>
							
							<?php if ($this->_tpl_vars['data_type'] == 'boolean'): ?>
							<label class="radio-inline">
								<input type="radio" name="<?php echo $this->_tpl_vars['name']; ?>
" value="0" <?php if ($this->_tpl_vars['value'] == 0): ?>checked="checked"<?php endif; ?> /><?php if ($this->_tpl_vars['input_options'][0]): ?><?php echo $this->_tpl_vars['input_options'][0]; ?>
<?php else: ?>0<?php endif; ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="<?php echo $this->_tpl_vars['name']; ?>
" value="1" <?php if ($this->_tpl_vars['value'] == 1): ?>checked="checked"<?php endif; ?> /><?php if ($this->_tpl_vars['input_options'][1]): ?><?php echo $this->_tpl_vars['input_options'][1]; ?>
<?php else: ?>1<?php endif; ?>
							</label>
							
							<?php else: ?>
							<?php unset($this->_sections['tmp2']);
$this->_sections['tmp2']['name'] = 'tmp2';
$this->_sections['tmp2']['loop'] = is_array($_loop=$this->_tpl_vars['input_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tmp2']['show'] = true;
$this->_sections['tmp2']['max'] = $this->_sections['tmp2']['loop'];
$this->_sections['tmp2']['step'] = 1;
$this->_sections['tmp2']['start'] = $this->_sections['tmp2']['step'] > 0 ? 0 : $this->_sections['tmp2']['loop']-1;
if ($this->_sections['tmp2']['show']) {
    $this->_sections['tmp2']['total'] = $this->_sections['tmp2']['loop'];
    if ($this->_sections['tmp2']['total'] == 0)
        $this->_sections['tmp2']['show'] = false;
} else
    $this->_sections['tmp2']['total'] = 0;
if ($this->_sections['tmp2']['show']):

            for ($this->_sections['tmp2']['index'] = $this->_sections['tmp2']['start'], $this->_sections['tmp2']['iteration'] = 1;
                 $this->_sections['tmp2']['iteration'] <= $this->_sections['tmp2']['total'];
                 $this->_sections['tmp2']['index'] += $this->_sections['tmp2']['step'], $this->_sections['tmp2']['iteration']++):
$this->_sections['tmp2']['rownum'] = $this->_sections['tmp2']['iteration'];
$this->_sections['tmp2']['index_prev'] = $this->_sections['tmp2']['index'] - $this->_sections['tmp2']['step'];
$this->_sections['tmp2']['index_next'] = $this->_sections['tmp2']['index'] + $this->_sections['tmp2']['step'];
$this->_sections['tmp2']['first']      = ($this->_sections['tmp2']['iteration'] == 1);
$this->_sections['tmp2']['last']       = ($this->_sections['tmp2']['iteration'] == $this->_sections['tmp2']['total']);
?>
							<input type="radio" name="<?php echo $this->_tpl_vars['name']; ?>
" value="<?php echo $this->_tpl_vars['input_options'][$this->_sections['tmp2']['index']]; ?>
" <?php if ($this->_tpl_vars['input_options'][$this->_sections['tmp2']['index']] == $this->_tpl_vars['value']): ?>checked="checked"<?php endif; ?> />
							<?php echo $this->_tpl_vars['input_options'][$this->_sections['tmp2']['index']]; ?>

							<?php endfor; endif; ?>
							<?php endif; ?>

							<?php elseif ($this->_tpl_vars['input_type'] == 'select'): ?>
							<select <?php if ($this->_tpl_vars['errors'][$this->_tpl_vars['name']] != ''): ?>class="error"<?php endif; ?> name="<?php echo $this->_tpl_vars['name']; ?>
">
								<?php unset($this->_sections['tmp2']);
$this->_sections['tmp2']['name'] = 'tmp2';
$this->_sections['tmp2']['loop'] = is_array($_loop=$this->_tpl_vars['input_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tmp2']['show'] = true;
$this->_sections['tmp2']['max'] = $this->_sections['tmp2']['loop'];
$this->_sections['tmp2']['step'] = 1;
$this->_sections['tmp2']['start'] = $this->_sections['tmp2']['step'] > 0 ? 0 : $this->_sections['tmp2']['loop']-1;
if ($this->_sections['tmp2']['show']) {
    $this->_sections['tmp2']['total'] = $this->_sections['tmp2']['loop'];
    if ($this->_sections['tmp2']['total'] == 0)
        $this->_sections['tmp2']['show'] = false;
} else
    $this->_sections['tmp2']['total'] = 0;
if ($this->_sections['tmp2']['show']):

            for ($this->_sections['tmp2']['index'] = $this->_sections['tmp2']['start'], $this->_sections['tmp2']['iteration'] = 1;
                 $this->_sections['tmp2']['iteration'] <= $this->_sections['tmp2']['total'];
                 $this->_sections['tmp2']['index'] += $this->_sections['tmp2']['step'], $this->_sections['tmp2']['iteration']++):
$this->_sections['tmp2']['rownum'] = $this->_sections['tmp2']['iteration'];
$this->_sections['tmp2']['index_prev'] = $this->_sections['tmp2']['index'] - $this->_sections['tmp2']['step'];
$this->_sections['tmp2']['index_next'] = $this->_sections['tmp2']['index'] + $this->_sections['tmp2']['step'];
$this->_sections['tmp2']['first']      = ($this->_sections['tmp2']['iteration'] == 1);
$this->_sections['tmp2']['last']       = ($this->_sections['tmp2']['iteration'] == $this->_sections['tmp2']['total']);
?>
								<option value="<?php echo $this->_tpl_vars['input_options'][$this->_sections['tmp2']['index']]; ?>
" <?php if ($this->_tpl_vars['input_options'][$this->_sections['tmp2']['index']] == $this->_tpl_vars['value']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['input_options'][$this->_sections['tmp2']['index']]; ?>
</option>
								<?php endfor; endif; ?>
							</select>
							<?php elseif ($this->_tpl_vars['input_type'] == 'checkbox'): ?>
							<input <?php if ($this->_tpl_vars['errors'][$this->_tpl_vars['name']] != ''): ?>class="error"<?php endif; ?> type="checkbox" name="<?php echo $this->_tpl_vars['name']; ?>
[]" value="_hidden" style="display:none;" checked="checked" />
							<?php unset($this->_sections['tmp2']);
$this->_sections['tmp2']['name'] = 'tmp2';
$this->_sections['tmp2']['loop'] = is_array($_loop=$this->_tpl_vars['input_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tmp2']['show'] = true;
$this->_sections['tmp2']['max'] = $this->_sections['tmp2']['loop'];
$this->_sections['tmp2']['step'] = 1;
$this->_sections['tmp2']['start'] = $this->_sections['tmp2']['step'] > 0 ? 0 : $this->_sections['tmp2']['loop']-1;
if ($this->_sections['tmp2']['show']) {
    $this->_sections['tmp2']['total'] = $this->_sections['tmp2']['loop'];
    if ($this->_sections['tmp2']['total'] == 0)
        $this->_sections['tmp2']['show'] = false;
} else
    $this->_sections['tmp2']['total'] = 0;
if ($this->_sections['tmp2']['show']):

            for ($this->_sections['tmp2']['index'] = $this->_sections['tmp2']['start'], $this->_sections['tmp2']['iteration'] = 1;
                 $this->_sections['tmp2']['iteration'] <= $this->_sections['tmp2']['total'];
                 $this->_sections['tmp2']['index'] += $this->_sections['tmp2']['step'], $this->_sections['tmp2']['iteration']++):
$this->_sections['tmp2']['rownum'] = $this->_sections['tmp2']['iteration'];
$this->_sections['tmp2']['index_prev'] = $this->_sections['tmp2']['index'] - $this->_sections['tmp2']['step'];
$this->_sections['tmp2']['index_next'] = $this->_sections['tmp2']['index'] + $this->_sections['tmp2']['step'];
$this->_sections['tmp2']['first']      = ($this->_sections['tmp2']['iteration'] == 1);
$this->_sections['tmp2']['last']       = ($this->_sections['tmp2']['iteration'] == $this->_sections['tmp2']['total']);
?>
							<input type="checkbox" name="<?php echo $this->_tpl_vars['name']; ?>
[]" value="<?php echo $this->_tpl_vars['input_options'][$this->_sections['tmp2']['index']]; ?>
" <?php if (in_array ( $this->_tpl_vars['input_options'][$this->_sections['tmp2']['index']] , $this->_tpl_vars['value'] )): ?>checked="checked"<?php endif; ?> /><?php echo $this->_tpl_vars['input_options'][$this->_sections['tmp2']['index']]; ?>
<br />
							<?php endfor; endif; ?>
							<?php else: ?>
							<input class="form-control settingsform_text_field<?php if ($this->_tpl_vars['errors'][$this->_tpl_vars['name']] != ''): ?> error<?php endif; ?>" type="text" name="<?php echo $this->_tpl_vars['name']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="42" />
							<?php endif; ?>
						</div>	<!-- <?php echo $this->_tpl_vars['description']; ?>
 -->
					</div>
					<?php endforeach; endif; unset($_from); ?>
				</div>
				<label style="visibility: hidden;">button</label>
				<div class="col-sm-2 pull-right common-bottom">
					
					<input type="hidden" name="action" value="update_settings" />
					<a class="button_gray btn btn-primary" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
settings/">Cancel</a>
					<button type="submit" class="btn btn-primary" id="save"><span>Save</span></button>
				</div>
			</div>
			
		</form>
		<?php endif; ?>
	</div>
</div>
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>