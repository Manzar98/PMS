{include file="header.tpl"}
<div id="content">
	<div class="container-fluid">
       {if isset($record) && $record}  
       <h2>Packages List</h2>
		<p class="common-top">
			<a href="{$BASE_URL_ADMIN}/add-package/" title="Add a new"><i class="fa fa-plus-square sqicon" aria-hidden="true"></i></a>
		</p>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Package Name</th>
					<th>Package Price</th>
					<th>No of Patients</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$record item=rec}
				<tr class="{cycle values='odd,even'}">
					<td>{$rec.pkg_name}</td>
					<td>{$rec.pkg_price}</td>
					<td>{$rec.no_of_patients}</td>
					<td width="">
						<div class="icons">				
						<a href="{$BASE_URL_ADMIN}packages/view/{$rec.id}/" title="View this package"><img src="{$BASE_URL_ADMIN}_templates/img/eye.png" alt="View" /></a>
						<a href="{$BASE_URL_ADMIN}add-package/edit/{$rec.id}/" title="Edit this package"><img src="{$BASE_URL_ADMIN}_templates/img/pencil.png" alt="Edit" /></a>
						<a href="{$BASE_URL_ADMIN}packages/delete/{$rec.id}/" title="Delete this package" onclick="if(!confirm('Are you sure you want to delete this?'))return false;"><img src="{$BASE_URL_ADMIN}_templates/img/bin.png" alt="Delete" /></a>
					</div>
					</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
		{elseif isset($singleRecord)}
		<div class="row">
			<div class="col-sm-11">
        <h2 style="margin-bottom: 60px;">{$singleRecord.pkg_name} Package Detail's</h2>
        </div>
        <div class="col-sm-1" style="margin-top: 25px;">
        	<a href="{$BASE_URL_ADMIN}add-package/edit/{$singleRecord.id}/" class="btn btn-primary">Edit</a>
        </div>
        </div>
		<div class="row ">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Package Name : </b><span>{$singleRecord.pkg_name}</span></span>
			
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Package Price : </b><span>{$singleRecord.pkg_price}</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>No Of Patients : </b><span>{$singleRecord.no_of_patients}</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>No Of Prescriptions : </b><span>{$singleRecord.no_of_prescriptions}</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>No Of Medicines : </b><span>{$singleRecord.no_of_medicines}</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>No Of Tests : </b><span>{$singleRecord.no_of_tests}</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>No Of Instructions : </b><span>{$singleRecord.no_of_instructions}</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>No Of Online Appointments : </b><span>{$singleRecord.no_of_online_appointments}</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b></b><span></span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b></b><span></span></span>
		</div>
	</div>
		{/if}	
	</div>
</div><!-- #content -->