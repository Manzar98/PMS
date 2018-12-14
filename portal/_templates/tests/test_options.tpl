{include file="header.tpl"}
<div id=""  class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}">Dashboard</a>
				</li>
				{if isset($edit) || isset($add)}
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}tests/">Tests</a>
				</li>
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}test-options/{$test_id}/">Test Options</a>
				</li>
				<li class="breadcrumb-item active">{if isset($edit)} Edit{else} Add {/if} Test Option</li>
				{else}
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}tests/">Tests</a>
				</li>
				<li class="breadcrumb-item active">Test Options</li>
				{/if}
			</ol>
		</div>
		{if (isset($smarty.session.flashAlert))}
		<div class="fail text-center ">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{$smarty.session.flashAlert}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="{php} unset($_SESSION['flashAlert']); {/php}">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>		
		</div>
		{/if}
		{if isset($edit) || isset($add)}
		<h2 class="pt-2">{if isset($edit)} Edit{else} Add {/if} Test Option</h2>
		
		{if isset($errors)}
		<div class="fail">
			{foreach from=$errors item=error}
			{$error}
			{/foreach}
		</div>
		{/if}
		
		<form id="add_option_options" class="box style" action="{$smarty.server.REQUEST_URI}" method="post">
			
			<fieldset>
				<legend>{if isset($edit)}Edit {else}Add {/if} Test Options</legend>

				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">Option Name</label>
							<input type="text" name="name" id="name" maxlength="100" {if (isset($data) && $data.name)}value="{$data.name}"{/if} class="form-control"/>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="measurement">Measurment</label>
							<input type="text" name="measurement" id="measurement" maxlength="100" {if (isset($data) && $data.name)}value="{$data.measurement}"{/if} class="form-control"/>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="normal_range">Normal Range</label>
							<input type="text" name="normal_range" id="normal_range" {if (isset($data) && $data.name)}value="{$data.normal_range}"{/if} class="form-control" />
						</div>
					</div>
				</div>
				<div class="col-sm-3 mx-auto mt-3">
					<input type="submit" name="submit" id="submit" value="{if isset($edit)} Update{else} Add {/if}" class="btn btn-primary form-control" />
				</div>	
			</fieldset>		
		</form>
		{else}
		<p>
			<a href="{$BASE_URL_ADMIN}test-options/add/{$test_id}/" title="Add a new"><i class="fa fa-plus-square sqicon pt-2" aria-hidden="true"></i></a>
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
				{foreach from=$options item=option}
				<tr class="{cycle values='odd,even'}">
					<td width="45">{$option.id}</td>
					<td>{$option.name}</td>
					<td>{$option.measurement}</td>
					<td>{$option.normal_range}</td>
					
					<td width="50">
						<div class="icons">				
							<a href="{$BASE_URL_ADMIN}test-options/edit/{$option.id}/" title="Edit this"><img src="{$BASE_URL_ADMIN}_templates/img/pencil.png" alt="Edit" /></a>
							<a href="{$BASE_URL_ADMIN}test-options/delete/{$option.id}/" title="Delete this" onclick="if(!confirm('Are you sure you want to delete this ?'))return false;"><img src="{$BASE_URL_ADMIN}_templates/img/bin.png" alt="Delete" /></a>
						</div>
					</td>
				</tr>
				{foreachelse}
				<tr style="color:red;">
					<td>
						No Options on the List
					</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
		{/if}		
	</div><!-- #content -->
</div>
{include file="footer.tpl"}
{literal}
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#name').focus();
		
		$("#add_test_option").validate({
			rules: {
				name: { required: true }
			}
		});
	});
</script>
{/literal}
