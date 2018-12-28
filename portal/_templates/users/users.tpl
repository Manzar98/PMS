{include file="header.tpl"}
<div id="" class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}">Dashboard</a>
				</li>
				{if isset($smarty.session.UserType) && $smarty.session.UserType=="S_admin"}
				{if isset($id) && $id=="view" && $id!="0"}
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}users/">Doctors</a>
				</li>
				<li class="breadcrumb-item active">View</li>
				{elseif  (isset($smarty.get.q) && $smarty.get.q neq '')}
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}users/">Doctors</a>
				</li>
				<li class="breadcrumb-item active">Search</li>
				{else}
				<li class="breadcrumb-item active">Doctors</li>
				{/if}
				{else}
				<li class="breadcrumb-item active">View Profile</li>
				{/if}
			</ol>
		</div>
		{if (isset($smarty.session.flashAlert))}
		<div class="fail text-center ">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{$smarty.session.flashAlert}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="{php} unset($_SESSION['flashAlert']); {/php}">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>		
		</div>
		{/if}
		{if (isset($errors) && $errors)}
		<div class="fail noprint">
			{foreach from=$errors item=error}
			{$error}
			{/foreach}
		</div>
		{/if}

		{if isset($smarty.session.UserType) && $smarty.session.UserType=="S_admin"}

		<h2 class="noprint headingBottom">{if (isset($smarty.get.q) && $smarty.get.q neq '')} Search Result For "<b>{$smarty.get.q}</b>" {else}Doctors List{/if}</h2>

		<p class="noprint">		
			<a href="{$BASE_URL_ADMIN}add-users/" title="Add a new User"><i class="fa fa-plus-square sqicon" aria-hidden="true"></i></a>	
		</p>

		<form class="box style noprint" action="{$BASE_URL_ADMIN}users/" method="get" enctype="multipart/form-data">
			<fieldset>
				<legend>Search for Doctors</legend>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<select name="field" id="field" class="form-control">
								<option value="id" {if (isset($search) && $search.field=='id')} selected="selected" {/if}>User ID</option>
								<option value="username" {if (isset($search) && $search.field=='username')} selected="selected" {/if}>User Name</option>
								<option value="created_on" {if (isset($search) && $search.field=='created_on')} selected="selected" {/if}>Date</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<input type="text" name="q" id="q" {if isset($search) && $search.q}value="{$search.q}"{/if} maxlength="20" class="form-control" />
						</div>
					</div>
					<div class="col-sm-3">
						<input type="submit" value="Search" name="submit" id="submit" class="btn btn-primary"/>
					</div>
				</div>
			</fieldset>
		</form>
		{/if}
		{if (isset($grouped_users) && $grouped_users)}

		<div class="pull-right grp_btn">
			Group By : &nbsp;
			<a {if ( isset($group_by) && $group_by=='expire')} class="current_page" {/if} href="{$BASE_URL_ADMIN}users/?group_by=expire&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Expiration</a>
			<a {if ( isset($group_by) && $group_by=='id')} class="current_page" {/if} href="{$BASE_URL_ADMIN}users/?group_by=id&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">User ID</a>
			<a {if ( isset($group_by) && $group_by=='username')} class="current_page" {/if} href="{$BASE_URL_ADMIN}users/?group_by=username&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">User Name</a>
		</div>

		<!-- {$grouped_users|print_r} -->
		{foreach from=$grouped_users item=users key=key}

		<table class="table table-striped table-bordered" >
			{if $group_by=='expire'}
			<caption>{$key|date_format:"%A, %B %e, %Y"}</caption>				
			{elseif $group_by=="id"}
			<caption>User ID: {$key}</caption>
			{else}
			<caption>{$key}</caption>
			{/if}

			<thead>
				<tr>
					<th>ID</th>
					<th>User Name</th>
					<th>Expiration Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$users item=usr}

				{if $usr.is_delete=="on"}
				<tr class="{cycle values='odd,even'}" style="background: #f1d2d2;">
					<td class="bold">{$usr.id}</td>
					<td>{$usr.username}</td>
					<td>{$usr.expire|date_format:"%A, %B %e, %Y"}</td>
					<td>
						<div class="icons">				
							<a href="{$BASE_URL_ADMIN}users/view/{$usr.id}/" title="View this user"><img src="{$BASE_URL_ADMIN}_templates/img/eye.png" alt="View" /></a>
							<a href="{$BASE_URL_ADMIN}edit-users/{$usr.id}/" title="Edit this user"><img src="{$BASE_URL_ADMIN}_templates/img/pencil.png" alt="Edit" /></a>
							<a href="{$BASE_URL_ADMIN}users/reactivate/{$usr.id}/" title="Reactivate this user" onclick="if(!confirm('Are you sure you want to reactivate this?'))return false;"><img src="{$BASE_URL_ADMIN}_templates/img/bin.png" alt="Reactivate" /></a>
						</div>
					</td>
				</tr>
				{else}
				<tr class="{cycle values='odd,even'}" >
					<td class="bold">{$usr.id}</td>
					<td>{$usr.username}</td>
					<td>{$usr.expire|date_format:"%A, %B %e, %Y"}</td>
					<td>
						<div class="icons">				
							<a href="{$BASE_URL_ADMIN}users/view/{$usr.id}/" title="View this user"><img src="{$BASE_URL_ADMIN}_templates/img/eye.png" alt="View" /></a>
							<a href="{$BASE_URL_ADMIN}edit-users/{$usr.id}/" title="Edit this user"><img src="{$BASE_URL_ADMIN}_templates/img/pencil.png" alt="Edit" /></a>
							<a href="{$BASE_URL_ADMIN}users/delete/{$usr.id}/" title="Delete this user" onclick="if(!confirm('Are you sure you want to delete this?'))return false;"><img src="{$BASE_URL_ADMIN}_templates/img/bin.png" alt="Delete" /></a>
						</div>
					</td>
				</tr>
				{/if}
				{foreachelse}
				<tr style="color:red;">
					<td>
						No User For this date
					</td>
				</tr>
				{/foreach}
			</tbody>
		</table>

		{/foreach}


		{elseif (isset($data) && $data)}

		<div class="row">
			<div class="col-sm-10 pt-3">
				<h3 class="noprint" >{$data.F_name}'s Details</h3>
			</div>
			<div class="col-sm-2  pt-4">
				<span class="date text-dark">Join Date: &nbsp;<em>{$data.d_join|date_format:"%d/%m/%Y"}</em></span><br>

				<div class="mt-3">
					<a href="{$BASE_URL_ADMIN}edit-users/{$data.id}/" class="btn btn-primary form-control">Edit Profile</a>
				</div>

			</div>
		</div>

		<hr style="border-top: dotted 1px #DEDEDE; " class="mt-4" /> 

		<div class="row my-5">
			<div class="text-center mx-auto"> <img src="{$BASE_URL_ADMIN}{$data.profile_img}" class="" alt="" width="80%">
			</div>
		</div>
		<div class="row ">
			<div class="col-sm-3"></div>
			<div class="col-sm-4">
				<div class="form-group">
					<span><b>Name : </b><span>Dr. {$data.F_name} {$data.L_name}</span></span>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<span><b>User's Name : </b><span>{$data.username}</span></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-4">
				<div class="form-group">
					<span><b>Email Address : </b><span>{$data.email}</span></span>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<span><b>Expiration Date : </b><span>{$data.expire}</span></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-4">
				<div class="form-group">
					{foreach from=$cities item=city}
					{if $data.city==$city.id}	
					<span><b>City : </b><span class="capitalize">{$city.name}</span></span>

					{/if}
					{/foreach}
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<span><b>Clinic Address : </b><span>{$data.c_address}</span></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-4">
				<div class="form-group">
					<span><b>Mobile Number : </b><span class="capitalize">{$data.mobile}</span></span>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<span><b>Landline : </b><span>{$data.phone}</span></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-4">
				<div class="form-group">
					<span><b>Doctor's Qualification : </b><span class="capitalize">{$data.quali}</span></span>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<span><b>Doctor's Experience : </b><span>{$data.exprience}</span></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-4">
				<div class="form-group">
					<span><b>Clinic Fee : </b><span class="capitalize">{$data.c_fee}</span></span>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					{foreach from=$packages item=package}
					{if $data.package_id == $package.id} 
					<span><b>Package Name : </b><span class="capitalize">{$package.pkg_name}</span></span> 
					{/if}
					{/foreach}	
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<!-- <div class="form-group"> -->
					<span><b>Specializations : </b></span>
					{assign var=foo value=","|explode:$data.specialist}
					<ul class="bullets mt-2 specializationWrap">
						{foreach from=$foo item=v}
						<li><i class="fa fa-dot-circle-o" aria-hidden="true" style="margin-right:5px; "></i>{$v}</li>
						{/foreach}
					</ul>
					
				<!-- </div> -->
				
			</div>
		</div>
		<div style="margin-bottom: 30px;"></div>
		{else}
		<div class="row">
			<p class="box-info  mx-auto mt-5">No User against this {if $smarty.get.field=="created_on"} Date {elseif $smarty.get.field=="username"} Name{else} {$smarty.get.field}{/if}</p>
		</div>
		{/if}

	</div><!-- #content -->
</div>
{include file="footer.tpl"}
{literal}
<style type="text/css">
.specializationWrap li{
	display: inline-block;
	width: 49%;
	margin-bottom: 5px;
}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$("#field").change(function(){
			
			if( $("#field").val()== 'created_on')
			{
				
				$("#q").datepicker({
					dateFormat : "yy-mm-dd",
					changeMonth: true,
				});
				$("#q").datepicker("show");
			}	
			else
			{
				$("#q").datepicker("destroy");
			}
		});	

		$('#collapseProfile').collapse({
			toggle: true
		})
	});
</script>
{/literal}