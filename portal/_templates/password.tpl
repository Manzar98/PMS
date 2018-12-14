{include file="header.tpl"}
<div id="" class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Change Password</li>
			</ol>
		</div>
		{if isset($error)}
		<div class="fail text-center ">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Success!</strong> {$error}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
		</div>
		{/if}
		<h2 id="password" class="pt-3">Change password</h2>

		

		<form id="change_password" action="{$smarty.server.REQUEST_URI}" method="post" class="box style">
			<fieldset>
				<legend>Change Password</legend>

				<div class="row">
					<div class="col-sm-2"></div>
					<div class="group{if $error} error{/if} col-sm-4">
						<div class="form-group">
							<label for="new_password">New password</label>
							<input type="password" name="new_password" id="new_password" size="30" class="form-control" />
						</div>
					</div>
					<div class="group{if $error} error{/if} col-sm-4">
						<div class="form-group">
							<label for="verify_password">Verify password</label>
							<input type="password" name="verify_password" id="verify_password" size="30" class="form-control" />
						</div>
					</div>
				</div>
				<div class="row"> 
					<div class="group_submit col-sm-3 mx-auto py-4">
						<button type="submit" class="btn btn-primary form-control"><span>Change password</span></button>
					</div>
				</div>
			</fieldset>
		</form>
		<div class="common-bottom"></div>
	</div><!-- #content -->
</div>
{include file="footer.tpl"}
{literal}
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#new_password').focus();

		$("#change_password").validate({
			rules: {
				new_password: { required: true },
				verify_password: { equalTo: "#new_password" }
			}
		});
		
		$('#collapseProfile').collapse({
			toggle: true
		})
	});
</script>
{/literal}