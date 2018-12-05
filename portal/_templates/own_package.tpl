{include file="header.tpl"}
<div id="" class="content-wrapper">
	<div class="container-fluid">
				<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}">Dashboard</a>
				</li>	
				<li class="breadcrumb-item active">View Package</li>

			</ol>
		</div>
		<h2>Package Details</h2>
		<table class="table table-striped table-bordered" style="margin: 50px 0;">
			<thead>
				<tr>
					<th class="text-center">Items</th>
					<th class="text-center">Total</th>
					<th class="text-center">Consumed</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$Result key=k item=v}
				<tr class="">
					<td class="text-center">{$k}</td>
					{foreach from=$v item=val}
					{if $val==""}
					<td class="text-center">0</td>
					{else}
					<td class="text-center">{$val}</td>
					{/if}
					{/foreach}
				</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div><!-- #content -->
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
{include file="footer.tpl"}