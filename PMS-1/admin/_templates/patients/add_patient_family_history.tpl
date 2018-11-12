{include file="header.tpl"}
{literal}
<style>
.form textarea 
{
	/*height: 100px;*/
}
</style>
{/literal}
<div id="content">
	<div class="container-fluid">
		<h2>{if isset($edit)} Edit{else} Add a{/if} Patient Family History</h2>

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
		<form id="add_patient_family_history" class="" action="{$smarty.server.REQUEST_URI}" method="post">
			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="family-border">
							<label for="father">Father</label>
							<textarea name="father" id="father" class="form-control">{if isset($data)}{$data.father}{/if}</textarea> 
						</div>
					</div>
					<div class="col-sm-6">
						<div class="family-border">
							<label for="mother">Mother</label>
							<textarea name="mother" id="mother" class="form-control">{if isset($data)}{$data.mother}{/if}</textarea>
						</div> 
					</div>
				</div>
			</fieldset>

			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="family-border">
							<label for="siblings">Siblings</label>
							<textarea name="siblings" id="siblings" class="form-control">{if isset($data)}{$data.siblings}{/if}</textarea>  
						</div>
					</div>
					<div class="col-sm-6">
						<div class="family-border">
							<label for="spouse">Spouse</label>
							<textarea name="spouse" id="spouse" class="form-control">{if isset($data)}{$data.spouse}{/if}</textarea> 
						</div> 
					</div>
				</div>
			</fieldset>

			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="family-border">
							<label for="offspring">Offspring</label>
							<textarea name="offspring" id="offspring" class="form-control">{if isset($data)}{$data.offspring}{/if}</textarea> 
						</div>
					</div>
					<div class="col-sm-6">
						<div class="family-border">
							<label for="submit"></label>
							<input type="submit" name="submit" id="submit" value="{if isset($edit)} Update{else} Add {/if}" class="btn btn-primary" style="margin-top: 20px;" />
						</div>
					</div> 
				</div>
			</fieldset>	
		</form>
		<div class="" style="margin-bottom: 20px;"></div>
	</div><!-- #content -->
</div>
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
{literal}
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#cancer').focus();
	});
</script>
{/literal}

{include file="footer.tpl"}