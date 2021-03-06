{include file="header.tpl"}
<div id="content">
	<div class="container-fluid">
		{if $settings_categories && isset($settings_form) == ''}
		<div class="row">
			
				<i class="fa fa-cogs" aria-hidden="true" style="color: #064f68;float: left;clear: both;line-height: 70px;font-size: 30px;margin-right: 9px; "></i>
				<h2 id="settings" class="pull-left">Settings Overview</h2>
		</div>
		
		<div class="row list common-top settingWrap">
			
			{section name=tmp loop=$settings_categories}
			<div class="{cycle values='odd,even'} setBolc">
				<div class="col-sm-4 text-center">
					{if $settings_categories[tmp].name == "Main Settings" }
					<div class="mainWrap"> 
						<a href="{$BASE_URL_ADMIN}settings/{$settings_categories[tmp].var_name}?id={$smarty.session.AdminId}&c_id=1" title="Edit {$settings_categories[tmp].name}">
							<i class="fa fa-cogs" aria-hidden="true" style="color: #064f68;"></i>
							<h4 class="setH2">{$settings_categories[tmp].name}</h4>
							<div class="divP">{if $settings_categories[tmp].description != ''}{$settings_categories[tmp].description}{/if}
							</div>
						</a>
					</div>
					{else}
					<div class="feeWrap">
						<a href="{$BASE_URL_ADMIN}settings/{$settings_categories[tmp].var_name}?id={$smarty.session.AdminId}&c_id=2" title="Edit {$settings_categories[tmp].name}">
							<i class="fa fa-dollar" aria-hidden="true" style="color: #85bb65;"></i><h4 class="setH2 ">{$settings_categories[tmp].name}</h4>
							<div class="divP">{if $settings_categories[tmp].description != ''}{$settings_categories[tmp].description}{/if}
							</div>
						</a>
					</div>
					{/if}
				</div>
			</div>
			{/section}
			{if isset($smarty.session.UserType) && $smarty.session.UserType!="S_admin"}
			{/if}
		</div>
		<div style="margin-bottom: 20px;"></div>

		{/if}

		{if isset($settings_form) != ''}
		{if $category_name !=  ''}<h2 id="settings">{$category_name}</h2>{/if}
		
		{if isset($errors) != ''}
		<div class="fail">
			{foreach from=$errors item=error}
			{section name=tmp2 loop=$error}								
			<div>{$error[tmp2]}</div>
			{/section}						
			{/foreach}
		</div>
		{/if}
		
		<form id="publish_form" method="post" action="{$BASE_URL_ADMIN}settings/{$CURRENT_ID}/">
			<div class="row list settings common-top">
				<div class="">
					<h2>Reached Here</h2>
					{$settings_form|print_r}
					{foreach from=$settings_form item=setting}
					{assign var=name value=$setting.name}
					{assign var=title value=$setting.title}
					{assign var=description value=$setting.description}
					{assign var=value value=$setting.value}
					{assign var=data_type value=$setting.data_type}
					{assign var=input_type value=$setting.input_type}
					{assign var=input_options value=$setting.input_options}
					
					<div class="{cycle values='odd,even'}{if $errors.$name != ''} error{/if}">
						<div class="col-sm-5 common-bottom">
							<label>{$title}</label>
							{if $input_type == 'text_area'}
							<textarea class="form-control settingsform_text_area{if $errors.$name != ''} error{/if} form-control" name="{$name}">{$value|escape}</textarea>
						</div>
						<div class="col-sm-5 common-bottom">
							{elseif $input_type == 'radiobutton'}
							
							{if $data_type == 'boolean'}
							<label class="radio-inline">
								<input type="radio" name="{$name}" value="0" {if $value == 0}checked="checked"{/if} />{if $input_options[0]}{$input_options[0]}{else}0{/if}
							</label>
							<label class="radio-inline">
								<input type="radio" name="{$name}" value="1" {if $value == 1}checked="checked"{/if} />{if $input_options[1]}{$input_options[1]}{else}1{/if}
							</label>
							
							{else}
							{section name=tmp2 loop=$input_options}
							<input type="radio" name="{$name}" value="{$input_options[tmp2]}" {if $input_options[tmp2] == $value}checked="checked"{/if} />
							{$input_options[tmp2]}
							{/section}
							{/if}

							{elseif $input_type == 'select'}
							<select {if $errors.$name != ''}class="error"{/if} name="{$name}">
								{section name=tmp2 loop=$input_options}
								<option value="{$input_options[tmp2]}" {if $input_options[tmp2] == $value}selected="selected"{/if}>{$input_options[tmp2]}</option>
								{/section}
							</select>
							{elseif $input_type == 'checkbox'}
							<input {if $errors.$name != ''}class="error"{/if} type="checkbox" name="{$name}[]" value="_hidden" style="display:none;" checked="checked" />
							{section name=tmp2 loop=$input_options}
							<input type="checkbox" name="{$name}[]" value="{$input_options[tmp2]}" {if in_array($input_options[tmp2], $value)}checked="checked"{/if} />{$input_options[tmp2]}<br />
							{/section}
							{else}
							<input class="form-control settingsform_text_field{if $errors.$name != ''} error{/if}" type="text" name="{$name}" value="{$value|escape}" size="42" />
							{/if}
						</div>
					</div>
					{/foreach}
				</div>
				<label style="visibility: hidden;">button</label>
				<div class="col-sm-2 pull-right common-bottom">
					
					<input type="hidden" name="action" value="update_settings" />
					<a class="button_gray btn btn-primary" href="{$BASE_URL_ADMIN}settings/">Cancel</a>
					<button type="submit" class="btn btn-primary" id="save"><span>Save</span></button>
				</div>
			</div>
			
		</form>
		{/if}
	</div>
</div>
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
{include file="footer.tpl"}