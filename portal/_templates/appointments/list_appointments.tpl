{include file="header.tpl"}
<div id="content" class="clientWrap">
	{if isset($appoint) && isset($pat) && isset($doc)}
	<!-- {$pat} -->

	<div class="appoint_Wrap"> 

		<div class="common-bottom text-center" style="margin-bottom: 40px;">
			<h4><b>APPOINTMENT CONFIRMATION</b></h4>
		</div>
		<div class="noprint btnW">
			<input type="button"class="btn btn-primary printBtn pull-right" value="Print" id="printPrescription">
		</div>
		<div class="row common-bottom">
			<div class="col-sm-10">
				<div class="ac">
					<span><b>Patient Name : </b><span>{$pat.name}</span></span>
				</div>
				<div class="ac">

					<span><b>Patient Id : </b><span>{$pat.id}</span></span>
					
				</div>
				<div class="ac">
					{foreach from=$cities item=city}
					{if $pat.city_id==$city.id}
					<span><b>City : </b><span>{$city.name}</span></span>
					{/if}
					{/foreach}
				</div> 
				<div class="ac">
					<span><b>Address : </b><span>{$pat.address}</span></span>
				</div>
				<div class="ac">
					<span><b>Mobile No : </b><span>{$pat.mobile}</span></span>
				</div>
				<div class="ac">
					<span><b>Gender : </b><span>{$pat.gender}</span></span>
				</div>
				<div class="ac"><span><b>Email : </b><span>{$pat.email}</span></span></div>
			</div>
			<div class="col-sm-2">
				<div width="100" height="100" style="border: 1px solid;"></div>
			</div>
		</div>
		<div class="row common-bottom bor">
			<div class="col-sm-8">
				<div class="common-bottom common-top">
					<span class="common-bottom"><b>Appointment No : </b><span>{$appoint.ap_number}</span></span>
				</div>
				<div class="common-bottom">
					<span class="common-bottom"><b>Appointment Date : </b><span>{$appoint.ap_date}</span></span>
				</div>
				<div class="common-bottom">
					<span class="common-bottom"><b>Appointment Time : </b><span>{$appoint.ap_time}</span></span>
				</div>
			</div>
			<div class="col-sm-4 ">
				<div class="docInfo">
					<div class="common-bottom">
						<span class="doci"><b>Doctor's Name : </b><span>{$doc.F_name} {$doc.L_name}</span></span>
					</div>
					<div class="common-bottom">
						<span class="doci"><b>Clinic Phone Number: </b><span>{$doc.phone}</span></span> 
					</div>
					<div class="common-bottom">
						<span class="doci" ><b>Clinic Address : </b><span>{$doc.c_address}</span></span>
					</div>
				</div> 
			</div>
		</div>
		<div class="note" style=" " >
			<p class="text-center common-bottom not_p">
				Note: Please reach the clinic on time otherwise your appointment would be cancelled.
			</p>
			<p class="text-center doci">idoctor.pk</p>
		</div>
	</div>
	{else}
	<div class="row app_btns">
		<div class="col-sm-10"></div>
		<div class="col-sm-2 common-bottom" >
			<a href="{$BASE_URL_ADMIN}doc-appointments/?doc_id={$doc.id}&doc_name={$doc.F_name} {$doc.L_name} &doc_adr={$doc.c_address}&doc_phne={$doc.phone}&exist=patient" class="btn btn-primary">Get Appointment</a>
		</div>
	</div>

	
	<table class="table table-striped table-bordered" >
		<thead class="">
			<tr>
				<th>Patient ID</th>
				<th>Name</th>
				<th>City</th>
				<th>Appointment Date</th>
				<th>Appointment Time</th>
				<th>Appointment via</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

			{foreach from=$pat_detials item=pat}
			<tr class="{cycle values='odd,even'}">
				<td class="bold" width="35">{$pat.id}</td>
				<td width="200">{$pat.name}</td>
				{foreach from=$cities item=city}
				{if $pat.city_id==$city.id}
				<td>{$city.name}</td>
				{/if}
				{/foreach}
				<td width="200">{$pat.ap_date}</td>
				<td width="200">{$pat.ap_time}</td>
				<td width="200">{$pat.online_manual}</td>
				<td width="65">
					<div class="icons text-center">				
						<a href="{$BASE_URL_ADMIN}list-appointments/view/{$pat.a_id}/" title="View this Appointment"><img src="{$BASE_URL_ADMIN}_templates/img/eye.png" alt="View" /></a>
					</div>
					
				</td>
			</tr>
			{foreachelse}
			<tr style="color:red;">
				<td>
					No appointments exist.
				</td>
			</tr>
			{/foreach}
		</tbody>
	</table>
	
	{/if}

	<div style="margin-top: 30px;"></div>
</div><!-- #content -->

<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
{literal}
<script type="text/javascript">
	
	$(document).ready(function()
	{

		$("#printPrescription").click(function(){
			
			window.print();
		});

	});
</script>
{/literal}

{include file="footer.tpl"}