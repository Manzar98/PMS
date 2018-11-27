<html>
	<head>
<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/print.css" type="text/css" media="print" />
		
	</head>
	<body>
		

		<div id="content">
			
				
			
				{if $data}
				<div id="prescription_info"> 
				<h3 style="float: left;">Patient's Details</h3>
				<span style="float: right;margin:20px 10px 0 0">Date:<em>{$data.created_on|date_format:"%d/%m/%Y"}</em></span>
				<hr class="dotted clear" />
				<div>
					<p class="patient_info">
						<span>Patient's Name: <span>{$data.patient.name}</span></span>
						<span>City: <span>{$data.patient.city_name}</span></span>
						<span>Gender: {if isset($data.patient.gender)}<span>{$data.patient.gender} </span>{/if}</span>
						<span>Date of Birth: <span>{$data.patient.dob|date_format:"%d/%m/%Y"}</span></span>
						<span style="font-weight: normal;">ID: <span>{$data.patient.id}</span></span>
					</p>
					
					
					<div style="width: 50%;float: left;">
					
					{if $data.instructions}
					<table class="zebra instructions">
						<caption>Instructions</caption>
						<thead>
							<tr>
								<th>Medicine</th>
								<th>Dose</th>
								<th>Instruction</th>
							</tr>
						</thead>
						<tbody>
							{foreach from=$data.instructions item=ins}
							 <tr>
							 <pre>
							 	{$ins|print_r}
							 </pre>
							 							 <td class="medicine_name">{$ins.name}</td>
							 <td class="dose">({$ins.dose})</td> 
							 <td class="instruction">{$ins.instruction}</td></li>
							 </tr>
							{/foreach}
						</tbody>
					</table>
					{else}
					
					<p class="box-info">No Instructions for this prescription.</p>
					
					{/if}
					<hr class="dotted"/>
					
					{foreach from=$data.tests item=test}
						<table class="zebra">
							<caption>{$test.test_name}</caption>
							
						<thead>
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
				
					<p> Fee Received : <strong>{$data.fee_received}</strong></p>
					
					</div>
					
					
					
					<div style="width: 42%;float: right;padding-left: 20px;margin-left: 20px;">
						<h3>Details</h3>
					<dl class="separator" style="margin-top: 23px;">
						<dt style="font-size: 13px;">Description</dt>
						<dd>{$data.description}</dd>
						<dt style="font-size: 13px;">Complain</dt>
						<dd><strong>{$data.complain}</strong></dd>
						<dd>{$data.complain_detail}</dd>
						<dt style="font-size: 13px;">Next Plan</dt>
						<dd><strong>{$data.next_date|date_format:"%A, %B %e, %Y"}</strong></dd>
						<dd>{$data.next_plan}</dd>
						<dt style="font-size: 13px;">Address</dt>
						<dd>{$data.patient.address}</dd>
					</dl>
						</div>
				
										
				</div>
				</div>
				{else}
					
					<p class="box-info">No Prescription on the List</p>
				
				{/if}
				
		</div><!-- #content -->
	</body>
</html>
