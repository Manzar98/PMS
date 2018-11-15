{include file="header.tpl"}
<div id="content" class="publicWrap">
	{$record}
	{if isset($record)}

	<table class="table table-striped table-bordered" >
		<thead class="">
			<tr>
				<th>ID</th>
				<th>Patient Name (ID)</th>
				<th>Complain</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

			{foreach from=$record item=prescription}
			<tr class="{cycle values='odd,even'}">
				<td class="bold" width="35">{$prescription.id}</td>
				<td width="200">{$prescription.patient_name} ({$prescription.patient_id})</td>
				<td>{$prescription.complain|default:'<span style="color:gray;font-style: italic;">Empty</span>'}</td>
				<td width="200">{$prescription.created_on|date_format:"%A, %B %e, %Y"}</td>
				<td width="65">
					<div class="icons text-center">				
						<a href="{$BASE_URL_ADMIN}history/view/{$prescription.id}/" title="View this Prescription"><img src="{$BASE_URL_ADMIN}_templates/img/eye.png" alt="View" /></a>
					</div>
				</td>
			</tr>
			{foreachelse}
			<tr style="color:red;">
				<td>
					No prescriptions generated for this patient.
				</td>
			</tr>
			{/foreach}
		</tbody>
	</table>
	{elseif isset($data)}
	<div id="prescription_info">
		<div class="row">
			<div class="col-sm-10">
				<h3 class="hideThink" >Patient's Details</h3>
			</div>
			<div class="col-sm-2">
				<span class="date">Date:<em>{$data.created_on|date_format:"%d/%m/%Y"}</em></span>

			</div>
			<div class="noprint" style="margin-right: 50px;">
				<input type="button"class="btn btn-primary printBtn pull-right" value="Print" id="printPrescription">
			</div> 
		</div>


		<hr style="border-top: dotted 1px #DEDEDE; " />
		<div>
			<ul class="patient_info list-inline">
				<li><span style="font-weight: normal;"> Patient's Name: <span>{$data.patient.name}</span></span></li>
				<li><span style="font-weight: normal;">City: <span>{$data.patient.city_name}</span></span ></li>
				<li><span style="font-weight: normal;">Gender:{if isset($data.patient.gender)}<span>{$data.patient.gender} </span>{/if}</span></li>
				<li><span style="font-weight: normal;">Date of Birth: <span>{$data.patient.dob|date_format:"%d/%m/%Y"}</span></span></li>
				<li><span style="font-weight: normal;">ID: <span>{$data.patient.id}</span></span></li>
			</ul>	
		</div>

		<div class="row">
			<div class="col-sm-6">
				<h3>Instructions</h3>

				{if $data.instructions}
				<table class="table table-bordered table-striped instructions">
					<caption>Instructions</caption>
					<thead class="thead-dark">
						<tr>
							<th>Medicine</th>
							<th>Dose</th>
							<th>Instruction</th>
						</tr>
					</thead>
					<tbody>
						{foreach from=$data.instructions item=ins}
						<tr>

							<td class="medicine_name">{$ins.name}</td>
							<td class="dose">({$ins.dose})</td> 
							<td class="instruction">{$ins.instruction}</td>
						</tr>
						{/foreach}
					</tbody>
				</table>
				{else}

				<p class="box-info">No Instructions for this prescription.</p>

				{/if}
				<hr class="noprint dotted"/>

				<h3>Tests</h3>


				{foreach from=$data.tests item=test}
				<table class="table table-bordered table-striped tests">
					<caption>{$test.test_name}</caption>

					<thead class="thead-dark">
						<tr>
							<th>Test Field</th>
							<th>Result</th>
							<th>Default</th>
						</tr>
					</thead>
					<tbody>
						{foreach from=$test.options item=option}
						<tr>
							<td width="40%">{$option.option_name}</td> 
							<td width="30%">{$option.result}{$option.measurement}</td>
							<td width="30%">{$option.normal_range}</td>
						</tr>
						{/foreach}
					</tbody>
				</table>
				{foreachelse}	
				<p class="box-info">No Tests for this prescription.</p>
				{/foreach}
			</div>
			<div class="col-sm-1"></div>
			<div class="col-sm-4">
				<div class="">
					<h3>Details</h3>
					<dl class="separator" style="margin-top: 23px;">
						<dt>Description</dt>
						<dd>{$data.description}</dd>
						<dt>Complain</dt>
						<dd><strong>{$data.complain}</strong></dd>
						<dd>{$data.complain_detail}</dd>
						<dt>Next Plan</dt>
						<dd><strong>{$data.next_date|date_format:"%A, %B %e, %Y"}</strong></dd>
						<dd>{$data.next_plan}</dd>
						<dt>Address</dt>
						<dd>{$data.patient.address}</dd>

					</dl>
				</div>
			</div>
		</div>
		<p id="fee"> Fee Received : <strong>{$data.fee_received}</strong>    </p>
	</div>
	<p></p>
	
	<br /><br /><br />
	<br />
	
	<br />
	{/if}
	<div style="margin-top: 30px;"></div>
</div><!-- #content -->

<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
{literal}
<script type="text/javascript">
	$(document).ready(function()
	{
		if ($('#resp').val()) {
			alert($('#resp').val());
		}
		$('.docWrap').hide();

		$("#print_fee").click(function()
		{
			if(("#print_fee").checked == true)
			{
				$("#fee").removeClass("noprint");
			}
			else
			{
				$("#fee").addClass("noprint");
			}
		});

		$("#printPrescription").click(function(){
			
			window.print();
		});

	});


</script>
{/literal}

{include file="footer.tpl"}