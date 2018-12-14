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
					<a href="{$BASE_URL_ADMIN}prescriptions/">Prescriptions</a>
				</li>
				<li class="breadcrumb-item active">View</li>
				{elseif  (isset($smarty.get.q) && $smarty.get.q neq '')}
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}prescriptions/">Prescriptions</a>
				</li>
				<li class="breadcrumb-item active">Search</li>
				{else}
				<li class="breadcrumb-item active">Prescriptions</li>
				{/if}
			</ol>
		</div>
		{if (isset($errors) && $errors)}
		<div class="fail noprint">
			{foreach from=$errors item=error}
			{$error}
			{/foreach}
		</div>
		{/if}
		<!-- {$smarty.session|print_r} -->
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
		{if $id=="0"}
		<h2 class="noprint py-2">{if (isset($smarty.get.q) && $smarty.get.q neq '')} Search Result For "<b>{$smarty.get.q}</b>" {else}Prescription List{/if}</h2>
		<p class="noprint">
			<a href="{$BASE_URL_ADMIN}add-prescription/" title="Add a new Prescription"><i class="fa fa-plus-square sqicon" aria-hidden="true"></i></a>
		</p>
		
		<form class="box style noprint" action="{$BASE_URL_ADMIN}prescriptions/" method="get" enctype="multipart/form-data">
			<fieldset>
				<legend>Search for Prescriptions</legend>
				<div class="row">
					<!-- {$grouped_prescriptions|print_r}	 				 -->
					<div class="col-md-3 col-sm-12">
						<div class="form-group">
							<select name="field" id="field" class="form-control">
								<option value="id" {if (isset($search) && $search.field=='id')} selected="selected" {/if}>Prescription ID</option>
								<option value="patient_id" {if (isset($search) && $search.field=='patient_id')} selected="selected" {/if}>Patient ID</option>
								<option value="patient_name" {if (isset($search) && $search.field=='patient_name')} selected="selected" {/if}>Patient Name</option>
								<option value="complain" {if (isset($search) && $search.field=='complain')} selected="selected" {/if}>Complain</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<input type="text" class="form-control" name="q" id="q" {if isset($search) && $search.q}value="{$search.q}"{/if} maxlength="20" />
						</div>
					</div>
					<div class="col-sm-2">
						<input class="btn btn-primary" type="submit" value="Search" name="submit" id="submit" />
					</div>
				</div>
			</fieldset>
		</form>
		{/if}
		{if (isset($grouped_prescriptions) && $grouped_prescriptions)}
		
		<div class="pull-right grp_btn">
			<span style="margin-bottom: 5px;">Group By :&nbsp;</span> 
			<a {if ( isset($group_by) && $group_by=='patient_id')} class="current_page" {/if} href="{$BASE_URL_ADMIN}prescriptions/?group_by=patient_id&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Patient ID</a>
			<a {if ( isset($group_by) && $group_by=='patient_name')} class="current_page" {/if} href="{$BASE_URL_ADMIN}prescriptions/?group_by=patient_name&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Name</a>
			<a {if ( isset($group_by) && $group_by=='complain')} class="current_page" {/if} href="{$BASE_URL_ADMIN}prescriptions/?group_by=complain&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Complain</a>
		</div>
		
		{foreach from=$grouped_prescriptions item=prescriptions key=key}
		
		<table class="table table-striped table-bordered" >
			{if $group_by=='date'}
			<caption>{$key|date_format:"%A, %B %e, %Y"}</caption>				
			{elseif $group_by=="patient_id"}
			<caption>Patient ID: {$key}</caption>
			{else}
			<caption>{$key}</caption>
			{/if}
			
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

				{foreach from=$prescriptions item=prescription}
				<tr class="{cycle values='odd,even'}">
					<td class="bold">{$prescription.id}</td>
					<td>{$prescription.patient_name} ({$prescription.patient_id})</td>
					<td>{$prescription.complain|default:'<span style="color:gray;font-style: italic;">Empty</span>'}</td>
					<td>{$prescription.created_on|date_format:"%A, %B %e, %Y"}</td>
					<td>
						<div class="icons">				
							<a href="{$BASE_URL_ADMIN}prescriptions/view/{$prescription.id}/" title="View this Prescription"><img src="{$BASE_URL_ADMIN}_templates/img/eye.png" alt="View" /></a>
							<a href="{$BASE_URL_ADMIN}edit-prescription/{$prescription.id}/" title="Edit this Prescription"><img src="{$BASE_URL_ADMIN}_templates/img/pencil.png" alt="Edit" /></a>
							<a href="{$BASE_URL_ADMIN}prescriptions/delete/{$prescription.id}/" title="Delete this Prescription" onclick="if(!confirm('Are you sure you want to delete this?'))return false;"><img src="{$BASE_URL_ADMIN}_templates/img/bin.png" alt="Delete" /></a>
						</div>
					</td>
				</tr>
				{foreachelse}
				<tr style="color:red;">
					<td class="">
						No Prescription For this date
					</span>
				</td>
			</tr>
			{/foreach}
		</tbody>
	</table>
	{/foreach}
	{/if}
	<!-- {$grouped_prescriptions} -->
	<div class="pagination">
		{$pages}
	</div>

	{if (isset($data) && $data)}
	<div id="prescription_info">
		<div class="row noprint">
			<div class="col-sm-11  py-3">
				<h3 class="hideThink noprint" >Patient's Details</h3>
			</div>
			<div class="col-sm-1  py-3 noprint">
				<input type="button"class="btn btn-primary printBtn form-control" value="Print" id="printPrescription">
			</div>
		</div> 
		<div class="pull-right pt-3">
			<span class="date text-dark">Date:&nbsp;&nbsp;<em>{$data.created_on|date_format:"%d/%m/%Y"}</em></span>
		</div><br>
		<hr style="border-top: dotted 1px #DEDEDE; "/>
		<div class="mb-5">
			<ul class="patient_info list-inline text-center" style="font-size: 15px;">
				<li class="list-inline-item"><span style="font-weight: normal;"> Patient's Name: <span class="text-dark">{$data.patient.name}</span></span></li>
				<li class="list-inline-item"><span style="font-weight: normal;">City: <span  class="text-dark">{$data.patient.city_name}</span></span ></li>
				<li class="list-inline-item"><span style="font-weight: normal;">Gender:{if isset($data.patient.gender)}<span  class="text-dark">{$data.patient.gender} </span>{/if}</span></li>
				<li class="list-inline-item"><span style="font-weight: normal;">Date of Birth: <span  class="text-dark">{$data.patient.dob|date_format:"%d/%m/%Y"}</span></span></li>
				<li class="list-inline-item"> <span style="font-weight: normal;">ID: <span  class="text-dark">{$data.patient.id}</span></span></li>
			</ul>	
		</div>

		<div class="row instr_detail_row">
			<div class="col-sm-6">
				<h3 class="pb-3">Instructions</h3>

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

				<h3 class="pb-3">Tests</h3>


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
					<h3 class="pb-3">Details</h3>
					<dl class="separator" style="margin-top: 23px;">
						<dt style="font-size: 13px;" class="text-dark">Description</dt>
						<dd>{$data.description}</dd>
						<dt style="font-size: 13px;" class="text-dark">Complain</dt>
						<dd><strong>{$data.complain}</strong></dd>
						<dd>{$data.complain_detail}</dd>
						<dt style="font-size: 13px;" class="text-dark">Next Plan</dt>
						<dd><strong>{$data.next_date|date_format:"%A, %B %e, %Y"}</strong></dd>
						<dd>{$data.next_plan}</dd>
						<dt style="font-size: 13px;" class="text-dark">Address</dt>
						<dd>{$data.patient.address}</dd>

					</dl>
				</div>
			</div>
		</div>
		<p id="fee" class="text-dark"> Fee Received : <strong>{$data.fee_received}</strong>    </p>
		<p class="noprint text-dark">Print Fee Amount <input type="checkbox" name="print_fee" id="print_fee" value="1" checked="checked" /></p>
	</div>
	<p></p>

	<br /><br /><br />
	<br />

	<br />
	{/if}
</div>

</div><!-- #content -->
{include file="footer.tpl"}
{literal}
<script type="text/javascript">
	$(document).ready(function(){
		
		$("#header-footer").checked = false;		
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
		
		$("#print_fee").click(function()
		{
			//debugger;
			if($("#print_fee").prop("checked") == true)
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
		$('#collapsePrescription').collapse({
			toggle: true
		})
	});
</script>

{/literal}