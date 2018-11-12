{include file="header.tpl"}
<div id="content">
	<div class="container-fluid">


		{if (isset($edit) || isset($add))}
		<h2>{if (isset($edit) && $edit)} Edit{else} Add {/if} Test</h2>

		{if (isset($errors) && $errors)}
		<div class="fail">
			{foreach from=$errors item=error}
			{$error}
			{/foreach}
		</div>
		{/if}
		{$smarty.server.REQUEST_URI|@print_r}
		<form id="add_test" class="box style" action="{$smarty.server.REQUEST_URI}" method="post">

			<fieldset>
				<legend>Add Test</legend>
				<div class="row">
					<div class="col-sm-4">
						<label for="name">Test Name</label>
						<input type="text" name="name" id="name" maxlength="100" {if (isset($data))}value="{$data.name}"{/if} class="form-control" />
					</div>
					<div class="col-sm-4" style="margin-top: 2px;">
						<input type="submit" name="submit" id="submit" value="{if (isset($edit))} Update{else} Add {/if}" class="btn btn-primary" />
					</div>
				</div>
			</fieldset>	
			<div class="" style="margin-bottom: 20px;"></div>		
		</form>
		{else}

		<p class="common-top">
			<a href="{$BASE_URL_ADMIN}tests/add/" title="Add a new"><i class="fa fa-plus-square sqicon" aria-hidden="true"></i></a>
		</p>


		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Test Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$tests item=test}
				<tr class="{cycle values='odd,even'}">
					<td width="45">{$test.id}</td>
					<td><a href="{$BASE_URL_ADMIN}test-options/{$test.id}/" >{$test.name}</a></td>
					<td width="90">
						<div class="icons">				
							<a href="{$BASE_URL_ADMIN}test-options/{$test.id}/" title="Add Options"><img src="{$BASE_URL_ADMIN}_templates/img/041.png" alt="Add Options" /></a>
							<a href="{$BASE_URL_ADMIN}tests/edit/{$test.id}/" title="Edit this"><img src="{$BASE_URL_ADMIN}_templates/img/pencil.png" alt="Edit" /></a>
							<a href="{$BASE_URL_ADMIN}tests/delete/{$test.id}/" title="Delete this" onclick="if(!confirm('Are you sure you want to delete this ?'))return false;"><img src="{$BASE_URL_ADMIN}_templates/img/bin.png" alt="Delete" /></a>
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

		{/if}	

		<div class="pagination">
			{$pages}
		</div>
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