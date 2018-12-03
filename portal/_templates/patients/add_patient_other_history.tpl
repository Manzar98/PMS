{include file="header.tpl"}
{literal}
<style>
.form textarea 
{
	/*height: 100px;*/
}
</style>
{/literal}
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
				<li class="breadcrumb-item active text-capitalize">{if isset($edit)} Edit{else} Add{/if} Other History</li>
			</ol>
		</div>
		<h2>{if isset($edit)} Edit{else} Add a{/if} Patient Other History</h2>
		
		{if isset($errors)}
		<div class="fail">
			{foreach from=$errors item=error}
			{$error}
			{/foreach}
		</div>
		{/if}
		<p>
			ID: &nbsp;<strong class="text-dark">{$patient_details.id}</strong><br/>
			Name: &nbsp;<strong  class="text-dark">{$patient_details.name}</strong><br/>
			Mobile No: &nbsp;<strong  class="text-dark">{$patient_details.mobile}</strong>
		</p>	
		<form id="add_patient_other_history" class="" action="{$smarty.server.REQUEST_URI}" method="post">
			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<div class="other-border">
								<label for="field1">Field 1</label>
								<input type="text" name="field1" id="field1" {if isset($data) }value="{$data.field1}"{/if} class="form-control"/>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<div class="other-border">
								<label for="value1">Value 1</label>
								<textarea name="value1" id="value1" class="form-control textarea-height">{if isset($data) }{$data.value1}{/if}</textarea> 
							</div>
						</div>
					</div>
				</div>
			</fieldset>	
			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<div class="other-border">
								<label for="field2">Field 2</label>
								<input type="text" name="field2" id="field2" {if isset($data) }value="{$data.field2}"{/if} class="form-control "/> 	
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<div class="other-border">
								<label for="value2">Value 2</label>
								<textarea name="value2" id="value2" class="form-control textarea-height">{if isset($data) }{$data.value2}{/if}</textarea>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
			
			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<div class="other-border">
								<label for="additional_history">Additional History</label>
								<textarea name="additional_history" id="additional_history" class="form-control textarea-height">{if isset($data) }{$data.additional_history}{/if}</textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 mx-auto mt-5">
						<input type="submit" name="submit" id="submit" value="{if isset($edit)} Update{else} Add {/if}" class="btn btn-primary form-control"/>
					</div>
				</div>	
			</fieldset>		
		</form>
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