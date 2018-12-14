{include file="header.tpl"}
<div id="" class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}">Dashboard</a>
				</li>
				{if $smarty.get.q neq ''}
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}tests/">Tests</a>
				</li>
				<li class="breadcrumb-item active">Search</li>
				{elseif (isset($edit) || isset($add))}
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}tests/">Tests</a>
				</li>
				<li class="breadcrumb-item active">{if (isset($edit) && $edit)}Edit{else}Add{/if}</li>
				{else}
				<li class="breadcrumb-item active">Tests</li>
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
		{if (isset($edit) || isset($add))}
		<h2 class="pt-3">{if (isset($edit) && $edit)} Edit{else} Add {/if} Test</h2>

		{if (isset($errors) && $errors)}
		<div class="fail">
			{foreach from=$errors item=error}
			{$error}
			{/foreach}
		</div>
		{/if}
		<input type="hidden" name="" id="testsFull" value="{$testsFull}">
		<form id="add_test" class="box style" action="{$smarty.server.REQUEST_URI}" method="post">

			<fieldset>
				<legend>Add Test</legend>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">Test Name</label>
							<input type="text" name="name" id="name" maxlength="100" {if (isset($data))}value="{$data.name}"{/if} class="form-control" />
						</div>
					</div>
					<div class="col-sm-1" style="margin-top: 28px;">
						<input type="submit" name="submit" id="submit" value="{if (isset($edit))} Update{else} Add {/if}" class="btn btn-primary form-control" />
					</div>
				</div>
			</fieldset>	
			<div class="" style="margin-bottom: 20px;"></div>		
		</form>
		{else}
		<h2 class="pb-2 pt-2">{if $smarty.get.q neq ''} Search Result For "<b>{$smarty.get.q}</b>" {else}Test List{/if}</h2>
		<p class="common-top">
			<a href="{$BASE_URL_ADMIN}tests/add/" title="Add a new"><i class="fa fa-plus-square sqicon" aria-hidden="true"></i></a>
		</p>

		<form class="box style noprint" action="{$BASE_URL_ADMIN}tests/" method="get" enctype="multipart/form-data">
			<fieldset>
				<legend>Search for Tests</legend>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<select name="field" id="field" class="form-control">
								<option value="id" {if (isset($search) && $search.field=='id')} selected="selected" {/if}>Test ID</option>
								<option value="name" {if (isset($search) && $search.field=='name')} selected="selected" {/if}>Test Name</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<input type="text" name="q" id="q" {if isset($search) && $search.q}value="{$search.q}"{/if} maxlength="20" class="form-control" />
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
			<a {if $group_by=='id'} class="current_page" {/if} href="{$BASE_URL_ADMIN}tests/?group_by=id&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Test id</a>
			<a {if $group_by=='name'} class="current_page" {/if} href="{$BASE_URL_ADMIN}tests/?group_by=name&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Test Name</a>
		</div>
		{if $tests}	
		{foreach from=$tests item=test key=key}
		<table class="table table-striped table-bordered">
			<!-- {$group_by} -->
			<!-- {$key|print_r}  -->
			{if $group_by=='id'}
			<caption>Test ID: {$key}</caption>				
			{else}
			<caption>{$key}</caption>
			{/if}
			<thead>
				<tr>
					<th>ID</th>
					<th>Test Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				

				{foreach from=$test item=tst}
				<tr class="{cycle values='odd,even'}">
					<td width="45">{$tst.id}</td>
					<td><a href="{$BASE_URL_ADMIN}test-options/{$test.id}/" >{$tst.name}</a></td>
					<td width="150">
						<div class="icons">				
							<a href="{$BASE_URL_ADMIN}test-options/{$tst.id}/" title="Add Options"><img src="{$BASE_URL_ADMIN}_templates/img/041.png" alt="Add Options" /></a>
							<a href="{$BASE_URL_ADMIN}tests/edit/{$tst.id}/" title="Edit this"><img src="{$BASE_URL_ADMIN}_templates/img/pencil.png" alt="Edit" /></a>
							<a href="{$BASE_URL_ADMIN}tests/delete/{$tst.id}/" title="Delete this" onclick="if(!confirm('Are you sure you want to delete this ?'))return false;"><img src="{$BASE_URL_ADMIN}_templates/img/bin.png" alt="Delete" /></a>
						</div>
					</td>
				</tr>
				{foreachelse}
				<tr style="color:red;">
					<td>
						No Tests on the List
					</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
		{/foreach}
		{else}
		<p class="box-info text-center" style="margin-top: 7rem!important;">No Test against this {$smarty.get.field}</p>
		{/if}
		{/if}	
		<div class="pagination">
			{$pages}
		</div>
	</div>
</div><!-- #content -->
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

		if ($('#testsFull').val()) {
			
			alert($('#testsFull').val());
		}else{
			$('#testsFull').val('');
		}

		$('#collapseTest').collapse({
			toggle: true
		})
	});
</script>
{/literal}

