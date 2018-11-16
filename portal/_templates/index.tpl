{include file="header.tpl"}

<div id="content" class="db-icons">
	<div class="container-fluid homeWrap">
		{if isset($smarty.session.UserType) && $smarty.session.UserType!="S_admin"}
		<div class="row db-bottom" style="margin-top: 20px;">

			<div class="col-sm-3 text-center">
				<a {if $CURRENT_PAGE == 'prescriptions'} class="selected" {/if} href="{$BASE_URL_ADMIN}prescriptions/">
					<div class="db-back-shadow">
						<i class="fa fa-file-text-o" aria-hidden="true" style="color: #7986cd;padding-left: 7px;"></i><br>
						<span>Prescriptions</span><br>
						<div class="div-P">
							<p style="">Add/Edit/View <br>Prescriptions</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-3 text-center">
				<a {if $CURRENT_PAGE == 'patients'} class="selected" {/if} href="{$BASE_URL_ADMIN}patients/">
					<div class="db-back-shadow">
						<i class="fa fa-users" aria-hidden="true" style="color: #064f68;"></i><br>
						<span style="">Patients</span><br>
						<div class="div-P" style="">
							<p style="">Add/Edit/View <br>Patients</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-3 text-center">
				<a {if $CURRENT_PAGE == 'medicine'} class="selected" {/if} href="{$BASE_URL_ADMIN}medicine/">
					<div class="db-back-shadow">
						<i class="fa fa-archive" aria-hidden="true" style="color: #58c457;"></i><br>
						<span style="">Medicine</span><br>
						<div class="div-P" style="">
							<p style="">Add/Edit/View <br>Medicines</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-3 text-center">
				<a {if $CURRENT_PAGE == 'tests'} class="selected" {/if} href="{$BASE_URL_ADMIN}tests/">
					<div class="db-back-shadow">
						<i class="fa fa-plus-square" aria-hidden="true" style="color: #d61e40;"></i><br>
						<span style="">Tests</span><br>
						<div class="div-P" style="">
							<p style="">Add/Edit/View <br>Tests</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="row db-bottom">
			<div class="col-sm-3 text-center">
				<a {if $CURRENT_PAGE == 'instructions'} class="selected" {/if} href="{$BASE_URL_ADMIN}instructions/">
					<div class="db-back-shadow">
						<i class="fa fa-list-ul" aria-hidden="true" style="color: #ff8200;"></i><br>
						<span style="padding-left: 3px;">Instructions</span><br>
						<div class="div-P">
							<p style="">Manage <br>Instructions</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-3 text-center">
				<a {if $CURRENT_PAGE == 'list-appointments'} class="selected" {/if} href="{$BASE_URL_ADMIN}list-appointments/{$smarty.session.AdminId}/">
					<div class="db-back-shadow">
						<i class="fa  fa-calendar" aria-hidden="true"></i><br>
						<span style="">Appointments</span><br>
						<div class="div-P">
							<p style="">Manage<br> Appointments</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-3 text-center">
			<a {if $CURRENT_PAGE == 'reports'} class="selected" {/if} href="{$BASE_URL_ADMIN}reports/{$smarty.session.AdminId}/">
				<div class="db-back-shadow">
						<i class="fa fa-bars" aria-hidden="true"></i><br>
						<span style="">Reports</span><br>
						<div class="div-P">
							<p style="">Manage<br> Reports</p>
						</div>
					</div>
			</a>
		</div>
			<div class="col-sm-3 text-center">
				<a {if $CURRENT_PAGE == 'settings'}class="selected"{/if} href="{$BASE_URL_ADMIN}settings/">
					<div class="db-back-shadow">
						<i class="fa fa-cogs" aria-hidden="true" style="color: #064f68; "></i><br>
						<span style="padding-left: 10px;">Settings</span><br>
						<div class="div-P" style="padding-left: 14px;">
							<p style="">Manage global<br> settings</p>
						</div>
					</div>
				</a>
			</div>
			
		</div>
		<div class="row db-bottom">
			<div class="col-sm-3 text-center">
				<a href="{$BASE_URL_ADMIN}edit-users/{$smarty.session.AdminId}/">
					<div class="db-back-shadow">
						<i class="fa fa-user" aria-hidden="true" style="color: #1da1f2;"></i><br>
						<span style="">Profile</span><br>
						<div class="div-P" style="">
							<p style="">Manage your<br> profile</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-3 text-center">
				<a {if $CURRENT_PAGE == 'password'}class="selected"{/if} href="{$BASE_URL_ADMIN}password/">
					<div class="db-back-shadow">
						<i class="fa fa-key" aria-hidden="true"></i><br>
						<span style="">Password</span><br>
						<div class="div-P">
							<p style="">Change your<br> password</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-3 text-center">
				<a href="{$BASE_URL_ADMIN}logout/">
					<div class="db-back-shadow">
						<i class="fa fa-power-off" aria-hidden="true" style="color: #f44242;"></i><br>
						<span style="">Logout</span><br>
						<div class="div-P" style="">
							<p style="">Logout from<br> system</p>
						</div>
					</div>
				</a>
			</div>

			<div class="col-sm-3">

			</div>
			<div class="col-sm-3">

			</div>
			<div class="col-sm-2">

			</div>
		</div>
		{else}
		<div class="row db-bottom" style="margin-top: 20px;">
			<div class="col-sm-4 text-center">
				<a {if $CURRENT_PAGE == 'users'} class="selected" {/if} href="{$BASE_URL_ADMIN}users/">
					<div class="db-back-shadow">
						<i class="fa fa-users" aria-hidden="true" style="color: #064f68;"></i><br>
						<span>Doctors</span><br>
						<div class="div-P">
							<p style="">Add/Edit/View <br>Doctors</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-4 text-center">
				<a {if $CURRENT_PAGE == 'packages'} class="selected" {/if} href="{$BASE_URL_ADMIN}packages/">
					<div class="db-back-shadow">
						<i class="fa fa-list-alt" aria-hidden="true"></i><br>
						<span>Packages</span><br>
						<div class="div-P">
							<p style="">Add/Edit/View <br>Packages</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-4 text-center">
				<a {if $CURRENT_PAGE == 'settings'}class="selected"{/if} href="{$BASE_URL_ADMIN}settings/">
					<div class="db-back-shadow">
						<i class="fa fa-cogs" aria-hidden="true" style="color: #064f68; "></i><br>
						<span style="padding-left: 10px;">Settings</span><br>
						<div class="div-P" style="padding-left: 14px;">
							<p style="">Manage global<br> settings</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="row db-bottom">
			<div class="col-sm-4 text-center">
				<a {if $CURRENT_PAGE == 'password'}class="selected"{/if} href="{$BASE_URL_ADMIN}password/">
					<div class="db-back-shadow">
						<i class="fa fa-key" aria-hidden="true"></i><br>
						<span style="">Password</span><br>
						<div class="div-P">
							<p style="">Change your<br> password</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-4 text-center">
				<a href="{$BASE_URL_ADMIN}logout/">
					<div class="db-back-shadow">
						<i class="fa fa-power-off" aria-hidden="true" style="color: #f44242;"></i><br>
						<span style="padding-left: 10px;">Logout</span><br>
						<div class="div-P" >
							<p style="">Logout from<br> system</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		{/if}
	</div>
</div><!-- #content -->
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
{include file="footer.tpl"}	