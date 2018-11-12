{include file="header.tpl"}
<div id="content">
	<div class="container-fluid">
		<h2 class="headingBottom">{if $smarty.get.q neq ''} Search Result For "<b>{$smarty.get.q}</b>" {else}Patient List{/if}</h2>
		<p>
			<a href="{$BASE_URL_ADMIN}patients/add/" title="Add a new patient"><i class="fa fa-plus-square sqicon" aria-hidden="true"></i></a>
		</p>
		<form class="box style" action="{$BASE_URL_ADMIN}patients/" method="get" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-3 col-sm-12 search-top">
					<select name="field" id="field" class="form-control">
						<option value="id" {if $data.field=='id'} selected="selected" {/if}>Patient ID</option>
						<option value="name" {if $data.field=='name'} selected="selected" {/if}>Patient Name</option>
						<option value="mobile" {if $data.field=='mobile'} selected="selected" {/if}>Mobile No</option>
						<option value="phone" {if $data.field=='phone'} selected="selected" {/if}>Phone No</option>
					</select>
				</div>
				<div class="col-md-3 col-sm-12 search-top">
					<input type="text" name="q" id="q" value="{$data.q}" maxlength="20" class="form-control"/>
				</div>
				<div class="col-md-2 col-sm-12 search-top">
					<input type="submit" value="Search" name="submit" id="submit" class="btn btn-primary"/>
				</div>
			</div>
		</form>
		
		{if (isset($smarty.get.q) && $smarty.get.q neq '')}
		<p class="common-top"><a href="{$BASE_URL_ADMIN}patients/">Back to all Patients List</a></p>
		{/if}
		
		<div class="pagination pull-right grp_btn common-top">
			Group By : 
			<a {if $group_by=='date'} class="current_page" {/if} href="{$BASE_URL_ADMIN}patients/?group_by=date&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Date</a>
			<a {if $group_by=='blood_group'} class="current_page" {/if} href="{$BASE_URL_ADMIN}patients/?group_by=blood_group&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Blood Group</a>
			<a {if $group_by=='patient_name'} class="current_page" {/if} href="{$BASE_URL_ADMIN}patients/?group_by=patient_name&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Name</a>
			<a {if $group_by=='city'} class="current_page" {/if} href="{$BASE_URL_ADMIN}patients/?group_by=city_name&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">City</a>
			<a {if $group_by=='gender'} class="current_page" {/if} href="{$BASE_URL_ADMIN}patients/?group_by=gender&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Gender</a>
			<a {if $group_by=='marital_status'} class="current_page" {/if} href="{$BASE_URL_ADMIN}patients/?group_by=marital_status&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Marital Status </a>
		</div>

		{foreach from=$grouped_patients item=patients key=key}
		
		<table class="table table-striped table-bordered" >
			{if $group_by=='date'}
			<caption>{$key|date_format:"%A, %B %e, %Y"}</caption>				
			{elseif $group_by=="patient_id"}
			<caption>Patient ID: {$key}</caption>
			{else}
			<caption>{$key|default:'Empty Value'}</caption>
			{/if}
			<thead class="">
				<tr>
					<th>ID</th>
					<th>Patient Name</th>
					<th>Mobile</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>					

				{foreach from=$patients item=patient}
				<tr class="{cycle values='odd,even'}">
					<td class="bold" width="45">{$patient.patient_id}</td>
					<td>{$patient.patient_name}</td>
					<td width="100">{$patient.mobile}</td>
					<td width="155">
						<div class="icons">				
							<a href="{$BASE_URL_ADMIN}patient-family-history/add/{$patient.patient_id}/" title="Add Family History">
								<img src="{$BASE_URL_ADMIN}_templates/img/user_male_16.png" alt="family"/>
							</a>
							<a href="{$BASE_URL_ADMIN}patient-lifestyle/add/{$patient.patient_id}/" title="Add History">
								<img src="{$BASE_URL_ADMIN}_templates/img/address_book_16.png" alt="Histor" />
							</a>
							<a href="{$BASE_URL_ADMIN}patient-other-history/add/{$patient.patient_id}/" title="Add Other History">
								<img src="{$BASE_URL_ADMIN}_templates/img/cabinet_open_16.png" alt="Other History" />
							</a>
							<a href="{$BASE_URL_ADMIN}patient-relatives/add/{$patient.patient_id}/" title="Add Relatives">
								<img src="{$BASE_URL_ADMIN}_templates/img/chat_box_16.png" alt="Relatives" />
							</a>
							<a href="{$BASE_URL_ADMIN}patients/view/{$patient.patient_id}/" title="View this patient"><img src="{$BASE_URL_ADMIN}_templates/img/eye.png" alt="View" /></a>

							<a href="{$BASE_URL_ADMIN}prescriptions/{$patient.patient_id}/" title="View list of prescription against this patient">
								<img src="{$BASE_URL_ADMIN}_templates/img/121-512.png" alt="prescription" width="15%" />
							</a>
							<a href="{$BASE_URL_ADMIN}patients/edit/{$patient.patient_id}/" title="Edit this patient"><img src="{$BASE_URL_ADMIN}_templates/img/pencil.png" alt="Edit" /></a>
							<a href="{$BASE_URL_ADMIN}patients/delete/{$patient.patient_id}/" title="Delete this patient" onclick="if(!confirm('Are you sure you want to delete this?'))return false;"><img src="{$BASE_URL_ADMIN}_templates/img/bin.png" alt="Delete" /></a>
						</div>
					</td>
				</tr>
				{foreachelse}
				<tr style="color:red;">
					<td>
						No Patients on the List
					</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
		{/foreach}

		<div class="pagination">{$pages}</div>
	</div><!-- #content -->
</div>
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
{include file="footer.tpl"}