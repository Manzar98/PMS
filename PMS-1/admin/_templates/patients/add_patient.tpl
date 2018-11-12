{include file="header.tpl"}

{literal}
<script>
	$(function() {
		$( "#dob" ).datepicker({
			yearRange: "-100:+0",
			dateFormat : "yy-mm-dd",
			changeMonth: true,
			changeYear: true
		});
	});
</script>
{/literal}
<div id="content">
	<div class="container-fluid">
		<h2>{if (isset($edit) && $edit)} Edit{else} Add a{/if} Patient</h2>

		{if $errors}
		<div class="fail">
			{foreach from=$errors item=error}
			{$error}
			{/foreach}
		</div>
		{/if}
		
		<form id="add_patient" class="box style" action="{$smarty.server.REQUEST_URI}" method="post">
			<fieldset>
				<legend>Add Patient Info</legend>
				<div class="row">
					<div class="col-sm-4 common-bottom">
						<label for="name">Patient Name</label>
						<input type="text" name="name" id="name" maxlength="50" value="{$data.name}" class="form-control"/>
					</div>
					<div class="col-sm-4 common-bottom">
						<label for="gender">Gender</label>
						<select name="gender" id="gender" class="form-control">
							<option value="male" {if $data.gender =='male'} selected="selected" {/if}>Male</option>
							<option value="female" {if $data.gender =='female'} selected="selected" {/if}>Female</option>
							<option value="other" {if $data.gender =='other'} selected="selected" {/if}>Other</option>
						</select>
					</div>
					<div class="col-sm-4 common-bottom">
						<label for="dob">Date of Birth</label>
						<input type="text" name="dob" id="dob" value="{$data.dob}" autocomplete="off" class="form-control"/>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 common-bottom">
						<label for="marital_status">Marital Status</label>
						<select name="marital_status" id="marital_status" class="form-control">
							<option value=""  selected="" disabled="">Select Status</option>
							<option value="married" {if $data.marital_status=='married'} selected="selected" {/if}>Married</option>
							<option value="unmarried" {if $data.marital_status=='unmarried'} selected="selected" {/if}>Unmarried</option>
							<option value="widow" {if $data.marital_status=='widow'} selected="selected" {/if}>Widow</option>
							<option value="divorced" {if $data.marital_status=='divorced'} selected="selected" {/if}>Divorced</option>
							<option value="seperated" {if $data.marital_status=='seperated'} selected="selected" {/if}>Seperated</option>
						</select> 
					</div>
					<div class="col-sm-4 common-bottom">
						<label for="blood_group">Blood Group</label>
						<select name="blood_group" id="blood_group" class="form-control">
							<option value="" selected="" disabled="">Select Blood Group</option>
							<option value="a+" {if $data.blood_group=='a+'} selected="selected" {/if} >A+</option>
							<option value="a-" {if $data.blood_group=='a-'} selected="selected" {/if} >A-</option>
							<option value="b+" {if $data.blood_group=='b+'} selected="selected" {/if} >B+</option>
							<option value="b-" {if $data.blood_group=='b-'} selected="selected" {/if} >B-</option>
							<option value="ab+" {if $data.blood_group=='ab+'} selected="selected" {/if} >AB+</option>
							<option value="ab-" {if $data.blood_group=='ab-'} selected="selected" {/if} >AB-</option>
							<option value="o+" {if $data.blood_group=='o+'} selected="selected" {/if} >O+</option>
							<option value="o-" {if $data.blood_group=='o-'} selected="selected" {/if} >O-</option>
						</select>
					</div>
					<div class="col-sm-4 common-bottom">
						<label for="occupation">Occupation</label>
						<input type="text" name="occupation" id="occupation" value="{$data.occupation}" class="form-control" />
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend>Other Info</legend>
				<div class="row">
					<div class="col-sm-3 common-bottom">
						<label for="mobile">Mobile</label>
						<input type="text" name="mobile" id="mobile" value="{$data.mobile}" maxlength="50" class="form-control"/>
					</div>
					<div class="col-sm-3 common-bottom">
						<label for="phone">Phone</label>
						<input type="text" name="phone" id="phone" value="{$data.phone}" maxlength="50" class="form-control"/>	
					</div>
					<div class="col-sm-3 common-bottom">
						<label for="city">City</label>
						<select name="city" id="city" class="form-control">
							<option value="">Select City</option>
							{foreach from=$cities item=city}
							<option {if $data.city_id==$city.id} selected="selected" {/if} value="{$city.id}">{$city.name}</option>
							{/foreach}						
						</select>
					</div>
					<div class="col-sm-3 common-bottom">
						<label for="address">Address</label>
						<textarea  name="address" id="address" class="form-control">{$data.address}</textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 common-bottom">
						<label>Custom Field 1 Name</label>
						<input type="text" name="field1" id="field1" value="{$data.field1}" class="form-control"/>
					</div>
					<div class="col-sm-3 common-bottom">
						<label>Custom Field 1 Value</label>
						<input type="text" name="value1" id="value1" value="{$data.value1}" class="form-control"/>
					</div>
					<div class="col-sm-3 common-bottom">
						<label>Custom Field 2 Name</label>
						<input type="text" name="field2" id="field2" value="{$data.field2}" class="form-control"/>
					</div>
					<div class="col-sm-3 common-bottom">
						<label>Custom Field 2 Value</label>
						<input type="text" name="value2" id="value2" value="{$data.value2}" class="form-control"/>						</div>
					</div>
					<label for="submit"></label>
					<input type="submit" name="submit" id="submit" value="{if (isset($edit) && $edit )} Update{else} Add{/if}" class="btn btn-primary" />

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
			$('#name').focus();

			$("#add_patient").validate({
				rules: {
					name: { required: true }
				}
			});
		});
	</script>
	{/literal}

	{include file="footer.tpl"}