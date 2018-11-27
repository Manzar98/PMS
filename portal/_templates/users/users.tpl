{include file="header.tpl"}

{literal}
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


		
	});
</script>

{/literal}
<div id="content">


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
		<div class="row">
			<div class="col-sm-3 search-top">
				<select name="field" id="field" class="form-control">
					<option value="id" {if (isset($search) && $search.field=='id')} selected="selected" {/if}>User ID</option>
					<option value="username" {if (isset($search) && $search.field=='username')} selected="selected" {/if}>User Name</option>
					<option value="created_on" {if (isset($search) && $search.field=='created_on')} selected="selected" {/if}>Date</option>
				</select>
			</div>
			<div class="col-sm-3 search-top">
				<input type="text" name="q" id="q" {if isset($search) && $search.q}value="{$search.q}"{/if} maxlength="20" class="form-control" />
			</div>
			<div class="col-sm-3 search-top">
				<input type="submit" value="Search" name="submit" id="submit" class="btn btn-primary"/>
			</div>
		</div>
	</form>
	{/if}
	{if (isset($smarty.get.q) && $smarty.get.q neq '')}
	<div style="padding: 20px 0;">
		<p class="noprint"><a href="{$BASE_URL_ADMIN}users/">Back to all users List</a></p>
	</div>
	{/if}
	{if (isset($grouped_users) && $grouped_users)}

	<div class="pagination pull-right grp_btn">
		Group By : 
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
		<div class="col-sm-10">
			<h3 class="noprint" >{$data.F_name}'s Details</h3>
		</div>
		<div class="col-sm-2" style="padding-top: 25px;">
			<span class="date">Join Date:<em>{$data.d_join|date_format:"%d/%m/%Y"}</em></span><br>
			<div style="margin-top: 10px;">
				<a href="{$BASE_URL_ADMIN}edit-users/{$smarty.session.AdminId}/" class="btn btn-primary">Edit</a>
			</div>
			
		</div>
	</div>

	<hr style="border-top: dotted 1px #DEDEDE; " /> 
	<div style="margin-top: 30px;"></div>
	<div class="row" style="margin-bottom: 20px;">
		<div class="text-center center-block"> <img src="{$BASE_URL_ADMIN}{$data.profile_img}" alt="" width="12%">
		</div>
	</div>
	<div class="row ">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Name : </b><span>Dr. {$data.F_name} {$data.L_name}</span></span>
			
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>User's Name : </b><span>{$data.username}</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Email Address : </b><span>{$data.email}</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Expiration Date : </b><span>{$data.expire}</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			{foreach from=$cities item=city}
			{if $data.city==$city.id}	
			<span><b>City : </b><span class="capitalize">{$city.name}</span></span>
			{/if}
			{/foreach}
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Clinic Address : </b><span>{$data.c_address}</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Mobile Number : </b><span class="capitalize">{$data.mobile}</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Landline : </b><span>{$data.phone}</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Doctor's Qualification : </b><span class="capitalize">{$data.quali}</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Doctor's Experience : </b><span>{$data.exprience}</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Specialist : </b><span class="capitalize">{$data.specialist}</span></span>
		</div>
	</div>
	<div style="margin-bottom: 30px;"></div>
	{else}
	<div style="padding: 20px 0;">
		<p class="box-info">No User on the List</p>
	</div>
	{/if}

</div><!-- #content -->

<div class="print branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
{include file="footer.tpl"}