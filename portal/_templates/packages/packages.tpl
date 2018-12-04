{include file="header.tpl"}
<div id="" class="content-wrapper">
	<div class="container-fluid">
				<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}">Dashboard</a>
				</li>
				{if isset($id) && $id=="view" && $id!="0"}
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}packages/">Packages</a>
				</li>
				<li class="breadcrumb-item active">View</li>
				{else}
				<li class="breadcrumb-item active">Packages</li>
				{/if}
			</ol>
		</div>
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
			<div class="col-sm-10 pt-3">
        <h2 style="margin-bottom: 60px;">{$singleRecord.pkg_name} Package Detail's</h2>
        </div>
        <div class="col-sm-2  pt-3">
        	<a href="{$BASE_URL_ADMIN}add-package/edit/{$singleRecord.id}/" class="btn btn-primary form-control">Edit Package</a>
        </div>
        </div>
		<div class="row mt-5">
		<div class="col-sm-3"></div>
		<div class="col-sm-4">
			<div class="form-group">
			<span><b>Package Name : </b><span>{$singleRecord.pkg_name}</span></span>
		</div>		
		</div>
		<div class="col-sm-4">
			<div class="form-group">
			<span><b>Package Price : </b><span>{$singleRecord.pkg_price}</span></span>
		</div>
	</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4">
			<div class="form-group">
			<span><b>No Of Patients : </b><span>{$singleRecord.no_of_patients}</span></span>
		</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
			<span><b>No Of Prescriptions : </b><span>{$singleRecord.no_of_prescriptions}</span></span>
		</div>
	</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4">
			<div class="form-group">
			<span><b>No Of Medicines : </b><span>{$singleRecord.no_of_medicines}</span></span>
		</div>
	</div>
		<div class="col-sm-4">
			<div class="form-group">
			<span><b>No Of Tests : </b><span>{$singleRecord.no_of_tests}</span></span>
		</div>
	</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4">
			<div class="form-group">
			<span><b>No Of Online Appointments : </b><span>{$singleRecord.no_of_online_appointments}</span></span>
		</div>
	</div>
	</div>
	{else}
      <h2>Packages List</h2>
		<p class="common-top">
			<a href="{$BASE_URL_ADMIN}/add-package/" title="Add a new"><i class="fa fa-plus-square sqicon" aria-hidden="true"></i></a>
		</p>
		<div class="row">
			<p>No Packages Created</p>
		</div>
	{/if}	

	</div>
</div><!-- #content -->
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
{include file="footer.tpl"}