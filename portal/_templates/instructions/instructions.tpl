{include file="header.tpl"}
<div id="content">
	<div class="container-fluid"> 
		
		
		{if isset($edit) || isset($add)}
		<h2>{if isset($edit)} Edit{else} Add {/if} Instruction</h2>

		{if isset($errors)}
		<div class="fail">
			{foreach from=$errors item=error}
			{$error}
			{/foreach}
		</div>
		{/if}
		<!-- {$smarty.server.REQUEST_URI|@print_r} -->
		<form id="add_instructions" class="box style" action="{$smarty.server.REQUEST_URI}" method="post">
			<fieldset>
				<legend>Add Instructions</legend>  
				<div class="row">
					<div class="col-sm-4 common-bottom">
						<label for="medicine_id">Medicine</label>
						<select name="medicine_id" id="medicine_id" class="form-control">
							<option value="">Without Medicine</option>
							{foreach from=$medicine_list item=medicine}
							<option {if (isset($data) && $data.medicine_id==$medicine.id)} selected="selected" {/if} value="{$medicine.id}">{$medicine.name}</option>
							{/foreach}
						</select>
					</div>
				</div>
				<div class="row"> 
					<div class="col-sm-4 common-bottom">
						<label for="instruction">Instruction</label>
						<textarea name="instruction" id="instruction" class="form-control">{if (isset($data) && $data.instruction)}{$data.instruction}{/if}</textarea>
					</div>
				</div> 
				
				<div class="" style="margin-left: 15px;">
					<input type="submit" name="submit" id="submit" value="{if isset($edit)} Update{else} Add {/if}" class="btn btn-primary" />
				</div>
				
			</fieldset>			
		</form>
		{else}


		<h2 class="headingBottom">{if $smarty.get.q neq ''} Search Result For "<b>{$smarty.get.q}</b>" {else}Instructions List{/if}</h2>
		<p>
			<a href="{$BASE_URL_ADMIN}instructions/add/" title="Add new"><i class="fa fa-plus-square sqicon" aria-hidden="true"></i></a>
		</p>

		<form class="box style" action="{$BASE_URL_ADMIN}instructions/" method="get" enctype="multipart/form-data">
			<fieldset>
				<legend>Search for Instructions</legend>
				<div class="row">
					<div class="col-sm-3 search-top">
						<select name="field" id="field" class="form-control">
							<option value="instruction" {if (isset($data) && $data.field=='instruction')} selected="selected" {/if}>Instruction</option>
							<option value="medicine.name" {if (isset($data) && $data.field=='medicine_name')} selected="selected" {/if}>Medicine Name</option>	
						</select>
					</div>
					<div class="col-sm-3 search-top">
						<input type="text" name="q" id="q" {if isset($data.q)}value="{$data.q}"{/if} maxlength="20" class="form-control" />
					</div>
					<div class="col-sm-3 search-top">
						<input type="submit" value="Search" name="submit" id="submit" class="btn btn-primary" />
					</div>
				</div>
			</fieldset>
		</form>
		
		{if $smarty.get.q neq ''}
		<p><a href="{$BASE_URL_ADMIN}medicine/">Back to all Medicine List</a></p>
		{/if}
		{if $grouped_instructions}

		<div class="pagination  pull-right grp_btn">
			<span style="margin-bottom: 5px;">Group By :</span>  
			<a {if (isset($group_by) && $group_by=='medicine_name')} class="current_page" {/if} href="{$BASE_URL_ADMIN}instructions/?group_by=medicine_name&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Medicine Name</a>
			<a {if (isset($group_by) && $group_by=='instruction')} class="current_page" {/if} href="{$BASE_URL_ADMIN}instructions/?group_by=instruction&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Instruction</a>
		</div>
		{foreach from=$grouped_instructions item=instructions key=key}

		<table class="table table-striped table-bordered" >
			{if isset($group_by)=='date'}
			<caption>{$key|date_format:"%A, %B %e, %Y"}</caption>				
			{elseif isset($group_by)=="patient_id"}
			<caption>Patient ID: {$key}</caption>
			{else}
			<caption>{$key}</caption>
			{/if}

			<thead>
				<tr>
					<th>ID</th>
					<th>Medicine</th>
					<th>Instruction</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>		

				{foreach from=$instructions item=instruction}
				<tr class="{cycle values='odd,even'}">
					<td width="45">{$instruction.id}</td>
					<td width="150">{$instruction.medicine_name}</td>
					<td>{$instruction.instruction}</td>
					<td width="50">
						<div class="icons">				
							<a href="{$BASE_URL_ADMIN}instructions/edit/{$instruction.id}/" title="Edit this"><img src="{$BASE_URL_ADMIN}_templates/img/pencil.png" alt="Edit" /></a>
							<a href="{$BASE_URL_ADMIN}instructions/delete/{$instruction.id}/" title="Delete this" onclick="if(!confirm('Are you sure you want to delete this ?'))return false;"><img src="{$BASE_URL_ADMIN}_templates/img/bin.png" alt="Delete" /></a>
						</div>
					</td>
				</tr>
				{foreachelse}
				<tr style="color:red;">
					<td>
						No Instructions on the List
					</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
		{/foreach}

		{/if}

		<div class="pagination">
			{$pages}
		</div>
		{/if}	
		
		
		
		
	</div><!-- #content -->
</div>
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
{literal}
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#name').focus();

		$("#add_test").validate({
			rules: {
				name: { required: true }
			}
		});
	});
</script>
{/literal}

{include file="footer.tpl"}