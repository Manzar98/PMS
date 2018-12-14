{include file="header.tpl"}

<script src="{$BASE_URL_ADMIN}_templates/js/fusioncharts.js" type="text/javascript"></script> 
<script src="{$BASE_URL_ADMIN}_templates/js/fusioncharts.charts.js" type="text/javascript"></script> 
<script src="{$BASE_URL_ADMIN}_templates/js/fusioncharts.theme.fusion.js" type="text/javascript"></script> 
<script src="{$BASE_URL_ADMIN}_templates/js/fusioncharts.theme.zune.js" type="text/javascript"></script> 

<div id="" class="clientWrap content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Reports</li>
			</ol>
		</div>
		{if isset($smarty.get.type)}
		<!--======Comparsion if Condition Start======= -->
		<div class="row">
			<div class="col-sm-10 pt-4">
				<h3>Comparison Reports</h3>
			</div>
			<div class="col-sm-2 pt-4">
				<a href="{$BASE_URL_ADMIN}reports/{$smarty.session.AdminId}/" class="btn btn-primary">Reports</a>
			</div>
		</div>
		<form class="box style" action="{$smarty.server.REQUEST_URI}" method="POST" enctype="multipart/form-data" id="comparisonForm">
			<fieldset>
				<legend>Reports</legend>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label for="from_Comp">From Date</label>
							<input type="text" class="form-control input-field" name="from_Comp" id="from_Comp" />
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="to_Comp">To Date</label>
							<input type="text" class="form-control input-field" name="to_Comp" id="to_Comp" />
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="parameter_Comp">Parameters</label>
							<select class="form-control" id="parameter_Comp" name="parameter_Comp">
								<option value="">Select One</option>
								<option value="New Vs Returning Patients">New Vs Returning Patients</option>
								<option value="Paid Vs Free Checkups">Paid Vs Free Checkups</option>
								<option value="Manual Vs Online Appointments">Manual Vs Online Appointments</option>
							</select>
						</div>
					</div>
					<div class="col-sm-2 text-center">
						<input type="submit" name="" value="Search" class="btn btn-primary form-control" id="reportFormBtn" style="margin-top: 30px;">
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Result</legend>
				<div class="row text-center my-4">
					<div class="col-sm-4 common-bottom">
						<input value="{$data.filter}" type="hidden" id="dmyfilter">
						<span>From Date:</span>&nbsp;<span><b>{$data.from_Comp|date_format:"%d-%b-%y"}</b></span>
					</div>
					<div class="col-sm-4 common-bottom">
						<span>To Date:</span>&nbsp;<span><b>{$data.to_Comp|date_format:"%d-%b-%y"}</b></span>
					</div>
					<div class="col-sm-4 common-bottom">
						<span>Comparison B/W:</span>&nbsp;<span><b>{$data.parameter_Comp}</b></span>
					</div>
				</div>

				{if isset($pieChart) && !isset($error)}
				<div id="pieChart" hidden="">
					{$pieChart}
				</div>
				<div id="chart-container-pie"></div>
				<table class="table table-striped table-bordered reportGenTblPie mt-4 bg-dark text-white">
					<thead>
						<th class="text-center" >Total {$data.parameter_Comp}</th>
						<th class="text-center">{$data.totalCount}</th>
					</thead>
					<!-- {$data.thName|print_r} -->
				</table>
				<table class="table table-striped table-bordered  extendedTablePie text-dark">
					<thead>
						<tr>
							<th class="text-center">Parameter</th>
							<th class="text-center">Name (id)</th>
						</tr>
					</thead>
					<tbody>
						{foreach from=$resRecord key=k item=v}
						{assign var=val value=$v|@count}
						{assign var=val value=$val+1}
						<tr class="">
							<th class="text-center multiRowColumn" rowspan="{$val}" style="vertical-align : middle;text-align:center;">
							{$k} ({$v|@count})</th>
						</tr>
						{foreach from=$v item=name key=k}
						<tr>
							<td class="text-center">{$name}</td>
						</tr>
						{/foreach}
						{/foreach}
					</tbody>
				</table>
				{else}

				<span class="text-center"><p>{$error}</p></span>

				{/if}

			</fieldset>
		</form>
		{else} <!--=======Reports Else Condition Start====== -->
		<div class="row">
			<div class="col-sm-9 pt-4">
				<h3>Reports</h3>
			</div>
			<div class="col pt-4 text-right">
				<a href="{$BASE_URL_ADMIN}reports/{$smarty.session.AdminId}?type=comparison" class="btn btn-primary" role="button">Comparison Reports</a>
			</div>
		</div>
		<form class="box style" action="{$smarty.server.REQUEST_URI}" method="POST" enctype="multipart/form-data" id="reportForm">
			<fieldset>
				<legend>Reports</legend>
				<div class="row">
					<div class="col-sm-2">
						<div class="form-group">
							<label for="filter">Filteration</label>
							<select class="form-control" name="filter" onchange="filteration(this)" id="filter">
								<option value="days">Days</option>
								<option value="months">Months</option>
								<option value="years">Years</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="from">From Date</label>
							<input type="text" class="form-control input-field" name="from" id="from" />
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="to">To Date</label>
							<input type="text" class="form-control input-field" name="to" id="to" />
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="parameter">Parameters</label>
							<select class="form-control" id="parameter" name="parameter" onchange="checkParameter(this)">
								<option value="">Select One</option>
								<option value="New Patients">New Patients</option>
								<option value="Returning patients">Returning patients</option>
								<option value="Medicines">Medicines</option>
								<option value="Tests">Tests</option>
								<option value="Prescriptions">Prescriptions</option>
								<option value="Online appointments">Online appointments</option>
								<option value="Manual appointments">Manual appointments</option>
								<option value="Medicine prescribed to number of patients">Medicine prescribed to number of patients</option>
								<option value="Total fee collected">Total fee collected</option>
								<option value="Free checkups">Free checkups</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3" >
						<div class="form-group">
							<div id="mediWrap">
								<label for="medicine">Medicines</label>
								<select class="form-control" name="medicine" id="medicine" class="medicine">
								</select>
							</div>
							<div id="testWrap">
								<label>Tests</label>
								<select class="form-control" name="testSelect" id="testSelect">
								</select>
							</div>
						</div>
					</div>
					<div class="col-sm-1"></div>
					<div class="col-sm-3 text-center">
						<input type="submit" name="" value="Search" class="btn btn-primary form-control" id="reportFormBtn" style="margin-top: 20px;">
					</div>
				</div>
			</fieldset>
		</form>

		<form class="box style resultWrap" action="" method="" enctype="multipart/form-data" id="">
			<fieldset>

				<legend>Result</legend>
				<div class="row text-center my-4">
					<div class="col-sm-4">
						<input value="{$data.filter}" type="hidden" id="dmyfilter">
						<span>From Date:</span>&nbsp;<span><b>{$data.from|date_format:"%d-%b-%y"}</b></span>
					</div>
					<div class="col-sm-4 common-bottom">
						<span>To Date:</span>&nbsp;<span><b>{$data.to|date_format:"%d-%b-%y"}</b></span>
					</div>
					<div class="col-sm-4 common-bottom">
						<span>Search For:</span>&nbsp;<span><b>{$data.parameter}</b></span>
					</div>
				</div>

				<div id="chart-container"></div>

				
				{if isset($data) && $data && !isset($error)}
				<table class="table table-striped table-bordered reportGenTbl bg-dark text-white">
					<thead>
						<th class="text-center">{$data.heading}</th>
						<th class="text-center">{$data.totalCount}</th>
					</thead>
					<!-- {$data.thName|print_r} -->
				</table>
				<div class="extendedTable">
					{if isset($data.filter) && ($data.filter=="months" || $data.filter=="years")}

					{if isset($data) && ($data.parameter=="Free checkups" || $data.parameter=="Total fee collected")  }

					<table class="table table-striped table-bordered text-dark">
						<thead>
							<tr>
								<th class="text-center">{if $data.filter=="years"}Year{else}Month{/if}</th>
								<th class="text-center">{if isset($data) && $data.parameter=="Free checkups"}Checkups{else}Total Amount{/if}</th>
							</tr>
						</thead>
						<tbody>
							{foreach from=$feerecord key=k item=v}
							<div id="charts" hidden="">
								{$charts}
							</div>
							<tr>
								<th>{$k}</th>
								<td class="text-center">{$v}</td>
							</tr>
							{/foreach}
						</tbody>
					</table>
					{else}
					<div id="charts" hidden="">
						{$charts}
					</div>
					<table class="table table-striped table-bordered text-dark">
						<thead>
							<tr>
								<th class="text-center">{if $data.filter=="years"}Year{else}Month{/if}</th>
								<th class="text-center">Name</th>
								<tr>
								</thead>
								<tbody>
									{foreach from=$feerecord key=k item=v}
									{assign var=val value=$v|@count}
									{assign var=val value=$val+1}
									<tr>
										<th class="text-center multiRowColumn" rowspan="{$val}" style="vertical-align : middle;text-align:center;">
										{$k} ({$v|@count})</th>
									</tr>
									{foreach from=$v item=name}
									<tr>
										<td class="text-center">{$name}</td>
									</tr>
									{/foreach}

									{/foreach}
								</tbody>
							</table>
							{/if}

							{elseif isset($feerecord) && $feerecord}

							<div id="charts" hidden="">
								{$charts}
							</div>
							<table class="table table-striped table-bordered text-dark">
								<thead>
									<tr>
										<th class="text-center">Date</th>
										<th class="text-center">{if isset($data) && $data.parameter=="Free checkups"}Checkups{else}Total Amount{/if}</th>
									</tr>
								</thead>
								<tbody>
									{foreach from=$feerecord item=feerec}
									<tr>
										<th>{$feerec.date|date_format:"%d-%b-%y"}</th>
										<td class="text-center">{$feerec.fee}</td>
									</tr>
									{/foreach}
								</tbody>
							</table>
							{else}

							<div id="charts" hidden="">
								{$charts}
							</div>
							<table class="table table-striped table-bordered text-dark">
								<thead>
									<tr>
										{section name=th loop=$data.thName}
										<th>{$data.thName[th]}</th>
										{/section}
									</tr>
								</thead>
								<tbody>

									{foreach from=$record item=rec}
									<tr>
										{foreach from=$data.tdName item=td}
										<td>{$rec.$td}</td>
										{/foreach}
									</tr>
									{/foreach}

								</tbody>
							</table>
							{/if}
						</div>
						{else}
						<span class="text-center"><p>{$error}</p></span>
						{/if}
					</fieldset>
				</form>
				{/if}<!--=======Reports Else Condition End======= -->
			</div>
		</div><!-- #content -->
		{include file="footer.tpl"}
		{literal}
		<style type="text/css">
		.raphael-group-23-creditgroup,.raphael-group-24-creditgroup{
			display: none;
		}
		span#chartobject-1 {
			display: block !important;
			margin: 0 auto !important;
		}
		span.select2.select2-container.select2-container--default {
			width: 100% !important;
		}
	</style>
	<script type="text/javascript">

		$('#mediWrap').hide();
		$('#testWrap').hide();
		$('#chart-container').hide();
		$('#chart-container-pie').hide();
	// $('.resultWrap').hide();
	$(document).ready(function()
	{

		$("#testSelect").select2({
                    // placeholder: "Select a State",
                    allowClear: true
                });
		$("#medicine").select2({
                    // placeholder: "Select a State",
                    allowClear: true
                });


		$( "#from" ).datepicker({
			dateFormat : "yy-mm-dd",
			changeMonth: true,
			changeYear: true,
			readonly:true,
			onSelect: function(selected) {
				var date = $(this).datepicker('getDate');

				date.setDate(date.getDate() + 30); 
				$("#to").datepicker("option", "minDate", selected);
				$("#to").datepicker("option", "maxDate", date);
				$('#to').val('');
			}
		});

		$( "#to" ).datepicker({
			dateFormat : "yy-mm-dd",
			changeMonth: true,
			changeYear: true,
			readOnly:true,
		});

		$('#reportForm').validate({
			rules:{
				parameter:{required: true},
				from:{required: true},
				to:{required: true},
			}

		});

		$('.extendedTable').hide();
		
		$('.reportGenTbl').click(function(){

			$(".extendedTable").toggle();
		})

		var charts=$( "#charts" ).html();
 //console.log(charts);
//debugger;

if (charts) {

	charts=JSON.parse(charts);
	$('#chart-container').show();
	var dmy=$('#dmyfilter').val();

	const dataSource = {
		"chart": {
			"caption": "",
			"subcaption": "",
			"xaxisname": dmy,
			"yaxisname": "", 
			"theme": "zune"
		},
		"data":charts
	};

	FusionCharts.ready(function() {
		var myChart = new FusionCharts({
			type: "column2d",
			renderAt: "chart-container",
			width: "70%",
			height: "40%",
			dataFormat: "json",
			dataSource
		}).render();
	});

}else{
	$('#chart-container').hide();
}




/*====================Comparison Script Start=======================*/
$('.extendedTablePie').hide();

$('.reportGenTblPie').click(function(){

	$(".extendedTablePie").toggle();
})
$('#comparisonForm').validate({

	rules:{
		parameter_Comp:{required: true},
		to_Comp:{required: true},
		from_Comp:{required: true},
	}

});

$( "#to_Comp" ).datepicker({
	dateFormat : "yy-mm-dd",
	changeMonth: true,
	changeYear: true,
	readOnly:true,
});	

$( "#from_Comp" ).datepicker({
	dateFormat : "yy-mm-dd",
	changeMonth: true,
	changeYear: true,
	readonly:true,

});
var piechart=$( "#pieChart" ).html();

if (piechart) {

	piechart=JSON.parse(piechart);
	console.log(piechart);
	//debugger
	$('#chart-container-pie').show();

	const dataSource = {
		"chart": {
			"caption": "",
			"plottooltext": "<b>$value</b> $label",
			"showlegend": "1",
			"showpercentvalues": "1",
			"legendposition": "bottom",
			"usedataplotcolorforlabels": "1",
			"theme": "fusion"
		},
		"data":piechart
	};
//debugger
FusionCharts.ready(function() {
	var myChart = new FusionCharts({
		type: "pie2d",
		renderAt: "chart-container-pie",
		width: "70%",
		height: "70%",
		dataFormat: "json",
		dataSource
	}).render();
});

}else{

	$('#chart-container-pie').hide();
}


/*================Comparison Script End=================*/
});

	function checkParameter(that){

		if ($(that).val()=="Medicine prescribed to number of patients") {
			$('#testWrap').hide();
			$.ajax({

				type: "POST",
				url : "{/literal}{$BASE_URL_ADMIN}reports/add?ajax=y{literal}",
				dataType: "html",
				data: $(that).val(),
				success:function (msg) {

					var data =JSON.parse(msg);
					var dropdown = "";
					dropdown+='<option class="topOpt" value="" selected disabled>Select Medicine</option>';
					$.each(data.id,function(k,v){

						dropdown+='<option value="'+v+'">'+data.medi[k] + "("+data.dose[k]+")"+'</option>';   
					})
					$('#mediWrap').show();
					$('#medicine').html('');
					$('#medicine').html(dropdown);
				}
			})
		}else if($(that).val()=="Tests"){
			$('#mediWrap').hide();
			$.ajax({

				type: "POST",
				url : "{/literal}{$BASE_URL_ADMIN}reports/add?testajax=y{literal}",
				dataType: "html",
				data: $(that).val(),
				success:function (msg) {

					var data =JSON.parse(msg);
					console.log(data);
					//debugger
					var dropdown = "";
					dropdown+='<option class="topOpt" value="" selected disabled>Select Test</option>';
					$.each(data.ids,function(k,v){

						dropdown+='<option value="'+v+'">'+data.test[k]+'</option>';   
					})
					$('#testWrap').show();
					$('#testSelect').html('');
					$('#testSelect').html(dropdown);
				}
			})


		}else{

			$('#mediWrap').hide();
			$('#testWrap').hide();
		}
	}

	function filteration(that){

		if ($(that).val()=="days") {
			$("#from").val(" ");
			$("#to").val(" ");
			$("#from").datepicker("destroy");
			$("#to").datepicker("destroy");


			$( "#to" ).datepicker({
				dateFormat : "yy-mm-dd",
				changeMonth: true,
				changeYear: true,
				readOnly:true,
			});	

			$( "#from" ).datepicker({
				dateFormat : "yy-mm-dd",
				changeMonth: true,
				changeYear: true,
				readonly:true,
				onSelect: function(selected) {
					var date = $(this).datepicker('getDate');

					date.setDate(date.getDate() + 30); 
					$("#to").datepicker("option", "minDate", selected);
					$("#to").datepicker("option", "maxDate", date);
					$('#to').val('');
				}
			});

		}else{
			
			$("#from").datepicker("destroy");
			$("#to").datepicker("destroy");

			$( "#to" ).datepicker({
				dateFormat : "yy-mm-dd",
				changeMonth: true,
				changeYear: true,
				readOnly:true,
			});	
			
			$( "#from" ).datepicker({
				dateFormat : "yy-mm-dd",
				changeMonth: true,
				changeYear: true,
				readonly:true,

			});
		}
		// debugger
	}
</script>
{/literal}

