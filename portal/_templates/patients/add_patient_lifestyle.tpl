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
				<li class="breadcrumb-item active text-capitalize">{if isset($edit)} Edit{else} Add{/if} Lifestyle</li>
			</ol>
		</div>
		<h2 class="py-2">{if isset($edit)} Edit{else} Add a{/if} Patient Lifestyle</h2>
		{if isset($errors)}
		<div class="fail">
			{foreach from=$errors item=error}
			{$error}
			{/foreach}
		</div>
		{/if}
		<p>
			ID: <strong class="text-dark">{$patient_details.id}</strong><br/>
			Name: <strong  class="text-dark">{$patient_details.name}</strong><br/>
			Mobile No: <strong  class="text-dark">{$patient_details.mobile}</strong>
		</p>	
		<form id="add_patient" class="box" action="{$smarty.server.REQUEST_URI}" method="post">
			<fieldset>
				<legend>Lifestyle</legend>
				<div class="row mx-auto">
					<!-- <div class="col-sm-3"></div> -->
					<div class="col-sm-6">
						<div class="form-group">
							<div class="form-check">
								<input type="checkbox" name="tabacco" id="tabacco"  value="1" {if (isset($data) && $data.tabacco ==='1')} checked="checked" {/if}/>
								<label for="tabacco">Tabacco</label>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-check">
							<div class="form-group">
								<input type="checkbox" name="coffee" id="coffee"  value="1" {if (isset($data) && $data.coffee ==='1')} checked="checked" {/if}/>
								<label for="coffee">Coffee</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row  mx-auto">
					<!-- <div class="col-sm-3"></div> -->
					<div class="col-sm-6">
						<div class="form-check">
							<div class="form-group">
								<input type="checkbox" name="alcohol" id="alcohol" maxlength="50" value="1" {if (isset($data) && $data.alcohol ==='1')} checked="checked" {/if} />
								<label for="alcohol">Alcohol</label>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-check">
							<div class="form-group">
								<input type="checkbox" name="recreational_drugs" id="recreational_drugs" maxlength="50" value="1" {if (isset($data) && $data.recreational_drugs ==='1')} checked="checked" {/if} />
								<label for="recreational_drugs">Recreational Drugs</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row  mx-auto">
					<!-- <div class="col-sm-3"></div> -->
					<div class="col-sm-6">
						<div class="form-check">
							<div class="form-group">
								<input type="checkbox" name="counseling" id="counseling" maxlength="50" value="1" {if (isset($data) && $data.counseling ==='1')} checked="checked" {/if} />
								<label for="counseling">Counseling</label>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<div class="form-check">
								<input type="checkbox" name="exercise_patterns" id="exercise_patterns" maxlength="50" value="1" {if (isset($data) && $data.exercise_patterns ==='1')} checked="checked" {/if} />
								<label for="exercise_patterns">Exercise Patterns</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row mx-auto">
					<!-- <div class="col-sm-3"></div> -->
					<div class="col-sm-6">
						<div class="form-group">
							<div class="form-check">
								<input type="checkbox" name="hazardous_activities" id="hazardous_activities" maxlength="50" value="1" {if (isset($data) && $data.hazardous_activities ==='1')} checked="checked" {/if} />
								<label for="hazardous_activities">Hazardous Activities</label>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-check">
							<div class="form-group">
								<input type="checkbox" name="sleep_patterns" id="sleep_patterns" maxlength="50" value="1" {if (isset($data) && $data.sleep_patterns ==='1')} checked="checked" {/if} />
								<label for="sleep_patterns">Sleep Patterns</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row mx-auto">
					<!-- <div class="col-sm-3"></div> -->
					<div class="col-sm-6">
						<div class="form-group">
							<div class="form-check">
								<input type="checkbox" name="seatbelt_use" id="seatbelt_use" maxlength="50" value="1" {if (isset($data) && $data.seatbelt_use ==='1')} checked="checked" {/if} />
								<label for="seatbelt_use">Seatbelt Use</label>
							</div>
						</div>
					</div>
				</div> 
				<div class="row">
					<div class="col-sm-4 mx-auto">
						<input type="submit" name="submit" id="submit" value="{if isset($edit)} Update{else} Add {/if}"  class="btn btn-primary form-control" />
						<label for="submit"></label>

					</div>
				</div>
			</fieldset>
		</form>
	</div><!-- #content -->
</div>
{include file="footer.tpl"}
{literal}
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#name').focus();

		$("#add_patient").validate({
			rules: {
				name: { required: true }
			}
		});
	});
</script>
{/literal}

