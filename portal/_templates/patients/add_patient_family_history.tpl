{include file="header.tpl"}
<div id="" class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}">Dashboard</a>
				</li>
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}patients/">Patients</a>
				</li>
				<li class="breadcrumb-item active text-capitalize">{if isset($edit)} Edit{else} Add{/if} Family History</li>
			</ol>
		</div>
		<h2 class="py-2">{if isset($edit)} Edit{else} Add a{/if} Patient Family History</h2>

		{if isset($errors)}
		<div class="fail">
			{foreach from=$errors item=error}
			{$error}
			{/foreach}
		</div>
		{/if}
		<p>
			ID: <strong>{$patient_details.id}</strong><br/>
			Name: <strong>{$patient_details.name}</strong><br/>
			Mobile No: <strong>{$patient_details.mobile}</strong>
		</p>	
		<form id="add_patient_family_history" class="box " action="{$smarty.server.REQUEST_URI}" method="post">
			<fieldset>
				<legend>Family History</legend>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="father">Father</label>
							<textarea name="father" id="father" class="form-control">{if isset($data)}{$data.father}{/if}</textarea> 
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="mother">Mother</label>
							<textarea name="mother" id="mother" class="form-control">{if isset($data)}{$data.mother}{/if}</textarea>
						</div> 
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="siblings">Siblings</label>
							<textarea name="siblings" id="siblings" class="form-control">{if isset($data)}{$data.siblings}{/if}</textarea>  
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="spouse">Spouse</label>
							<textarea name="spouse" id="spouse" class="form-control">{if isset($data)}{$data.spouse}{/if}</textarea> 
						</div> 
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="offspring">Offspring</label>
							<textarea name="offspring" id="offspring" class="form-control">{if isset($data)}{$data.offspring}{/if}</textarea> 
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 mx-auto py-4">
							<input type="submit" name="submit" id="submit" value="{if isset($edit)} Update{else} Add {/if}" class="btn btn-primary form-control"/>
						
					</div> 
				</div>
			</fieldset>	
		</form>
		<div class="" style="margin-bottom: 20px;"></div>
	</div><!-- #content -->
</div>
{include file="footer.tpl"}
{literal}
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#cancer').focus();
	});
</script>
{/literal}

