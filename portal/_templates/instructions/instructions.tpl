{include file="header.tpl"}
<div id=""  class="content-wrapper">
	<div class="container-fluid"> 
		<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">				
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}">Dashboard</a>
				</li>
				{if $smarty.get.q neq ''}
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}instructions/">Instructions</a>
				</li>
				<li class="breadcrumb-item active">Search</li>
				{elseif isset($edit) || isset($add)}
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}instructions/">Instructions</a>
				</li>
				<li class="breadcrumb-item active">{if isset($edit)} Edit{else} Add {/if}</li>
				{else}
				<li class="breadcrumb-item active">Instructions</li>
				{/if}
			</ol>
		</div>
		
		{if (isset($smarty.session.flashAlert))}
		<div class="fail text-center ">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{$smarty.session.flashAlert}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="">
					<span aria-hidden="true">&times;</span>
				</button>
				{php} unset($_SESSION['flashAlert']); {/php}
			</div>		
		</div>
		{/if}
		{if isset($edit) || isset($add)}
		<h2>{if isset($edit)} Edit{else} Add {/if} Instruction</h2>
		{if isset($errors)}
		<div class="fail">
			{foreach from=$errors item=error}
			{$error}
			{/foreach}
		</div>
		{/if}
		<form id="add_instructions" class="box style" action="{$smarty.server.REQUEST_URI}" method="post">
			<fieldset>
				<legend>{if isset($edit)}Edit{else}Add{/if}  Instructions</legend>  
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="medicine_id">Medicine</label>
							<select name="medicine_id" id="medicine_id" class="form-control">
								<option value="">Without Medicine</option>
								{foreach from=$medicine_list item=medicine}
								<option {if (isset($data) && $data.medicine_id==$medicine.id)} selected="selected" {/if} value="{$medicine.id}">{$medicine.name}</option>
								{/foreach}
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="instruction">Instruction</label>
							<textarea name="instruction" id="instruction" class="form-control textarea-height">{if (isset($data) && $data.instruction)}{$data.instruction}{/if}</textarea>
						</div>
					</div>
				</div>
				<div class="col-sm-3 mt-3 mx-auto">
					<input type="submit" name="submit" id="submit" value="{if isset($edit)} Update{else} Add {/if}" class="btn btn-primary form-control" />
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
					<div class="col-sm-3">
						<div class="form-group">
							<select name="field" id="field" class="form-control">
								<option value="instruction" {if (isset($data) && $data.field=='instruction')} selected="selected" {/if}>Instruction</option>
								<option value="medicine.name" {if (isset($data) && $data.field=='medicine_name')} selected="selected" {/if}>Medicine Name</option>	
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<input type="text" name="q" id="q" {if isset($data.q)}value="{$data.q}"{/if} maxlength="20" class="form-control" />
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<input type="submit" value="Search" name="submit" id="submit" class="btn btn-primary" />
						</div>
					</div>
				</div>
			</fieldset>
		</form>
		{if $grouped_instructions}

		<div class="pull-right grp_btn">
			<span>Group By :&nbsp;</span>  
			<a {if (isset($group_by) && $group_by=='medicine_name')} class="current_page" {/if} href="{$BASE_URL_ADMIN}instructions/?group_by=medicine_name&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Medicine Name</a>
			<a {if (isset($group_by) && $group_by=='instruction')} class="current_page"{/if} href="{$BASE_URL_ADMIN}instructions/?group_by=instruction&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Instruction</a>
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
					<td width="200">{$instruction.id}</td>
					<td width="200">{$instruction.medicine_name}</td>
					<td width="200">{$instruction.instruction}</td>
					<td width="200">
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
		{else}
		<p class="box-info text-center" style="margin-top: 7rem!important;">No Instruction against this {if $smarty.get.field =="medicine.name"} medicine{else} {$smarty.get.field } {/if}</p>
		{/if}
		<div class="pagination">
			{$pages}
		</div>
		{/if}		
	</div><!-- #content -->
</div>
{include file="footer.tpl"}
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