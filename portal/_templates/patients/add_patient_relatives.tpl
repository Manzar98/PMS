{include file="header.tpl"}
<div id="content">
	<div class="container-fluid">
		<h2>{if (isset($edit) && $edit)} Edit{else} Add a{/if} Patient Relatives</h2>

		{if $errors}
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
		<form id="add_patient_relatives" class="" action="{$smarty.server.REQUEST_URI}" method="post">
			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="relative-border">
							<label for="cancer">Cancer</label>
							<input type="text" name="cancer" id="cancer" maxlength="2" value="{$data.cancer}" class="form-control"/>

						</div>
					</div>
					<div class="col-sm-6">
						<div class="relative-border">
							<label for="diabetes">Diabetes</label>
							<input type="text" name="diabetes" id="diabetes" maxlength="2" value="{$data.diabetes}" class="form-control"/>
						</div>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="relative-border">
							<label for="epilepsy">Epilepsy</label>
							<input type="text" name="epilepsy" id="epilepsy" maxlength="2" value="{$data.epilepsy}" class="form-control"/>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="relative-border">
							<label for="heart">Heart</label>
							<input type="text" name="heart" id="heart" maxlength="2" value="{$data.heart}" class="form-control"/>
						</div>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="relative-border">
							<label for="high_blood_pressure">High Blood Pressure</label>
							<input type="text" name="high_blood_pressure" id="high_blood_pressure" maxlength="2" value="{$data.high_blood_pressure}" class="form-control" />
						</div>
					</div>
					<div class="col-sm-6">
						<div class="relative-border">
							<label for="mental_illness">Mental illness</label>
							<input type="text" name="mental_illness" id="mental_illness" maxlength="2" value="{$data.mental_illness}" class="form-control"/>
						</div>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="relative-border">
							<label for="stroke">Stroke</label>
							<input type="text" name="stroke" id="stroke" maxlength="2" value="{$data.stroke}" class="form-control"/>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="relative-border">
							<label for="suicide">Suicide</label>
							<input type="text" name="suicide" id="suicide" maxlength="2" value="{$data.suicide}" class="form-control"/>
						</div>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div class="relative-border">
							<label for="tuberculosis">Tuberculosis</label>
							<input type="text" name="tuberculosis" id="tuberculosis" maxlength="2" value="{$data.tuberculosis}" class="form-control" />
						</div>
					</div>
					<div class="col-sm-6">
						<div class="relative-border">
							<label for="submit"></label>
							<input type="submit" name="submit" id="submit" value="{if $edit} Update{else} Add {/if}" class="btn btn-primary" style="margin-top: 20px;"/>
						</div>
					</div>
				</div>
			</fieldset>
			<div class="" style="margin-bottom: 20px;"></div>
		</form>
	</div><!-- #content -->
</div>
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
{literal}
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#cancer').focus();

		$("#add_patient_relatives").validate({
			rules: {
				cancer: { number:true }
			}
		});
	});
</script>
{/literal}

{include file="footer.tpl"}