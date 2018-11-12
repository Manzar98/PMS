{include file="header.tpl"}
		<div id="content">
			
			

				<h2>Add User</h2>
				
				{if (isset($errors) && $errors)}
					<div class="fail">
						{foreach from=$errors item=error}
							{$error}
						{/foreach}
					</div>
					{/if}
			 {$smarty.server.REQUEST_URI} 
			<form id="add_user" class="box style" action="{$smarty.server.REQUEST_URI}" method="post">
				<fieldset>
					<legend>{if (isset($edit) && $edit)} Edit{else} Add {/if} User</legend>
					<div class="row">
						<div class="col-sm-4 common-bottom">
							<label for="name">User Name</label>
							<input type="text" name="name" id="name" class="form-control" />
						</div>
						<div class="col-sm-4 common-bottom">
							<label for="c_name">Clinic Name</label>
							<input type="text" name="c_name" id="c_name" class="form-control"/>
						</div>
						<div class="col-sm-4 common-bottom">
							<label for="email">Email address</label>
							<input type="email" name="email" id="email" class="form-control"/>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 common-bottom">
							<label for="expire">Expiration</label>
							<input type="text" name="expire" id="expire" class="form-control"/>
						</div>
						<div class="col-sm-4 common-bottom">
							<label for="password">Password</label>
							<input type="password" name="password" id="password"class="form-control"/>
						</div>
						<div class="col-sm-4 common-bottom" style="padding-top: 25px;">

							<input type="submit" name="submit" id="submit" class="btn btn-primary"/>
						</div>
					</div>
				</fieldset>			

			</form>
			
		</div><!-- #content -->

	{literal}
		<script type="text/javascript">
			$(document).ready(function()
			{
				$('#name').focus();
				
				$("#add_user").validate({
					rules: {
						name: { required: true },
						password: { required: true }
					}
				});
			
		var today = new Date();
		$( "#expire" ).datepicker({
			dateFormat : "yy-mm-dd",
			changeMonth: true,
			minDate: today,
		});
	});
		</script>
		{/literal}

{include file="footer.tpl"}