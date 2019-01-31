<?php /* Smarty version 2.6.31, created on 2019-01-03 17:57:31
         compiled from reports/reports.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'reports/reports.tpl', 66, false),array('modifier', 'print_r', 'reports/reports.tpl', 86, false),array('modifier', 'count', 'reports/reports.tpl', 97, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/fusioncharts.js" type="text/javascript"></script> 
<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/fusioncharts.charts.js" type="text/javascript"></script> 
<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/fusioncharts.theme.fusion.js" type="text/javascript"></script> 
<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/fusioncharts.theme.zune.js" type="text/javascript"></script> 

<div id="" class="clientWrap content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Reports</li>
			</ol>
		</div>
		<?php if (isset ( $_GET['type'] )): ?>
		<!--======Comparsion if Condition Start======= -->
		<div class="row">
			<div class="col-sm-10 pt-4">
				<h3>Comparison Reports</h3>
			</div>
			<div class="col-sm-2 pt-4">
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
reports/<?php echo $_SESSION['AdminId']; ?>
/" class="btn btn-primary">Reports</a>
			</div>
		</div>
		<form class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="POST" enctype="multipart/form-data" id="comparisonForm">
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
						<input value="<?php echo $this->_tpl_vars['data']['filter']; ?>
" type="hidden" id="dmyfilter">
						<span>From Date:</span>&nbsp;<span><b><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['from_Comp'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%b-%y") : smarty_modifier_date_format($_tmp, "%d-%b-%y")); ?>
</b></span>
					</div>
					<div class="col-sm-4 common-bottom">
						<span>To Date:</span>&nbsp;<span><b><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['to_Comp'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%b-%y") : smarty_modifier_date_format($_tmp, "%d-%b-%y")); ?>
</b></span>
					</div>
					<div class="col-sm-4 common-bottom">
						<span>Comparison B/W:</span>&nbsp;<span><b><?php echo $this->_tpl_vars['data']['parameter_Comp']; ?>
</b></span>
					</div>
				</div>

				<?php if (isset ( $this->_tpl_vars['pieChart'] ) && ! isset ( $this->_tpl_vars['error'] )): ?>
				<div id="pieChart" hidden="">
					<?php echo $this->_tpl_vars['pieChart']; ?>

				</div>
				<div id="chart-container-pie"></div>
				<table class="table table-striped table-bordered reportGenTblPie mt-4 bg-dark text-white">
					<thead>
						<th class="text-center" >Total <?php echo $this->_tpl_vars['data']['parameter_Comp']; ?>
</th>
						<th class="text-center"><?php echo $this->_tpl_vars['data']['totalCount']; ?>
</th>
					</thead>
					<!-- <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['thName'])) ? $this->_run_mod_handler('print_r', true, $_tmp) : print_r($_tmp)); ?>
 -->
				</table>
				<table class="table table-striped table-bordered  extendedTablePie text-dark">
					<thead>
						<tr>
							<th class="text-center">Parameter</th>
							<th class="text-center">Name (id)</th>
						</tr>
					</thead>
					<tbody>
						<?php $_from = $this->_tpl_vars['resRecord']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
						<?php $this->assign('val', count($this->_tpl_vars['v'])); ?>
						<?php $this->assign('val', $this->_tpl_vars['val']+1); ?>
						<tr class="">
							<th class="text-center multiRowColumn" rowspan="<?php echo $this->_tpl_vars['val']; ?>
" style="vertical-align : middle;text-align:center;">
							<?php echo $this->_tpl_vars['k']; ?>
 (<?php echo count($this->_tpl_vars['v']); ?>
)</th>
						</tr>
						<?php $_from = $this->_tpl_vars['v']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['name']):
?>
						<tr>
							<td class="text-center"><?php echo $this->_tpl_vars['name']; ?>
</td>
						</tr>
						<?php endforeach; endif; unset($_from); ?>
						<?php endforeach; endif; unset($_from); ?>
					</tbody>
				</table>
				<?php else: ?>

				<span class="text-center"><p><?php echo $this->_tpl_vars['error']; ?>
</p></span>

				<?php endif; ?>

			</fieldset>
		</form>
		<?php else: ?> <!--=======Reports Else Condition Start====== -->
		<div class="row">
			<div class="col-sm-9 pt-4">
				<h3>Reports</h3>
			</div>
			<div class="col pt-4 text-right">
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
reports/<?php echo $_SESSION['AdminId']; ?>
?type=comparison" class="btn btn-primary" role="button">Comparison Reports</a>
			</div>
		</div>
		<form class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="POST" enctype="multipart/form-data" id="reportForm">
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
						<input value="<?php echo $this->_tpl_vars['data']['filter']; ?>
" type="hidden" id="dmyfilter">
						<span>From Date:</span>&nbsp;<span><b><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['from'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%b-%y") : smarty_modifier_date_format($_tmp, "%d-%b-%y")); ?>
</b></span>
					</div>
					<div class="col-sm-4 common-bottom">
						<span>To Date:</span>&nbsp;<span><b><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['to'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%b-%y") : smarty_modifier_date_format($_tmp, "%d-%b-%y")); ?>
</b></span>
					</div>
					<div class="col-sm-4 common-bottom">
						<span>Search For:</span>&nbsp;<span><b><?php echo $this->_tpl_vars['data']['parameter']; ?>
</b></span>
					</div>
				</div>

				<div id="chart-container"></div>

				
				<?php if (isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data'] && ! isset ( $this->_tpl_vars['error'] )): ?>
				<table class="table table-striped table-bordered reportGenTbl bg-dark text-white">
					<thead>
						<th class="text-center"><?php echo $this->_tpl_vars['data']['heading']; ?>
</th>
						<th class="text-center"><?php echo $this->_tpl_vars['data']['totalCount']; ?>
</th>
					</thead>
					<!-- <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['thName'])) ? $this->_run_mod_handler('print_r', true, $_tmp) : print_r($_tmp)); ?>
 -->
				</table>
				<div class="extendedTable">
					<?php if (isset ( $this->_tpl_vars['data']['filter'] ) && ( $this->_tpl_vars['data']['filter'] == 'months' || $this->_tpl_vars['data']['filter'] == 'years' )): ?>

					<?php if (isset ( $this->_tpl_vars['data'] ) && ( $this->_tpl_vars['data']['parameter'] == 'Free checkups' || $this->_tpl_vars['data']['parameter'] == 'Total fee collected' )): ?>

					<table class="table table-striped table-bordered text-dark">
						<thead>
							<tr>
								<th class="text-center"><?php if ($this->_tpl_vars['data']['filter'] == 'years'): ?>Year<?php else: ?>Month<?php endif; ?></th>
								<th class="text-center"><?php if (isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['parameter'] == 'Free checkups'): ?>Checkups<?php else: ?>Total Amount<?php endif; ?></th>
							</tr>
						</thead>
						<tbody>
							<?php $_from = $this->_tpl_vars['feerecord']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
							<div id="charts" hidden="">
								<?php echo $this->_tpl_vars['charts']; ?>

							</div>
							<tr>
								<th><?php echo $this->_tpl_vars['k']; ?>
</th>
								<td class="text-center"><?php echo $this->_tpl_vars['v']; ?>
</td>
							</tr>
							<?php endforeach; endif; unset($_from); ?>
						</tbody>
					</table>
					<?php else: ?>
					<div id="charts" hidden="">
						<?php echo $this->_tpl_vars['charts']; ?>

					</div>
					<table class="table table-striped table-bordered text-dark">
						<thead>
							<tr>
								<th class="text-center"><?php if ($this->_tpl_vars['data']['filter'] == 'years'): ?>Year<?php else: ?>Month<?php endif; ?></th>
								<th class="text-center">Name</th>
								<tr>
								</thead>
								<tbody>
									<?php $_from = $this->_tpl_vars['feerecord']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
									<?php $this->assign('val', count($this->_tpl_vars['v'])); ?>
									<?php $this->assign('val', $this->_tpl_vars['val']+1); ?>
									<tr>
										<th class="text-center multiRowColumn" rowspan="<?php echo $this->_tpl_vars['val']; ?>
" style="vertical-align : middle;text-align:center;">
										<?php echo $this->_tpl_vars['k']; ?>
 (<?php echo count($this->_tpl_vars['v']); ?>
)</th>
									</tr>
									<?php $_from = $this->_tpl_vars['v']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name']):
?>
									<tr>
										<td class="text-center"><?php echo $this->_tpl_vars['name']; ?>
</td>
									</tr>
									<?php endforeach; endif; unset($_from); ?>

									<?php endforeach; endif; unset($_from); ?>
								</tbody>
							</table>
							<?php endif; ?>

							<?php elseif (isset ( $this->_tpl_vars['feerecord'] ) && $this->_tpl_vars['feerecord']): ?>

							<div id="charts" hidden="">
								<?php echo $this->_tpl_vars['charts']; ?>

							</div>
							<table class="table table-striped table-bordered text-dark">
								<thead>
									<tr>
										<th class="text-center">Date</th>
										<th class="text-center"><?php if (isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['parameter'] == 'Free checkups'): ?>Checkups<?php else: ?>Total Amount<?php endif; ?></th>
									</tr>
								</thead>
								<tbody>
									<?php $_from = $this->_tpl_vars['feerecord']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['feerec']):
?>
									<tr>
										<th><?php echo ((is_array($_tmp=$this->_tpl_vars['feerec']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%b-%y") : smarty_modifier_date_format($_tmp, "%d-%b-%y")); ?>
</th>
										<td class="text-center"><?php echo $this->_tpl_vars['feerec']['fee']; ?>
</td>
									</tr>
									<?php endforeach; endif; unset($_from); ?>
								</tbody>
							</table>
							<?php else: ?>

							<div id="charts" hidden="">
								<?php echo $this->_tpl_vars['charts']; ?>

							</div>
							<table class="table table-striped table-bordered text-dark">
								<thead>
									<tr>
										<?php unset($this->_sections['th']);
$this->_sections['th']['name'] = 'th';
$this->_sections['th']['loop'] = is_array($_loop=$this->_tpl_vars['data']['thName']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['th']['show'] = true;
$this->_sections['th']['max'] = $this->_sections['th']['loop'];
$this->_sections['th']['step'] = 1;
$this->_sections['th']['start'] = $this->_sections['th']['step'] > 0 ? 0 : $this->_sections['th']['loop']-1;
if ($this->_sections['th']['show']) {
    $this->_sections['th']['total'] = $this->_sections['th']['loop'];
    if ($this->_sections['th']['total'] == 0)
        $this->_sections['th']['show'] = false;
} else
    $this->_sections['th']['total'] = 0;
if ($this->_sections['th']['show']):

            for ($this->_sections['th']['index'] = $this->_sections['th']['start'], $this->_sections['th']['iteration'] = 1;
                 $this->_sections['th']['iteration'] <= $this->_sections['th']['total'];
                 $this->_sections['th']['index'] += $this->_sections['th']['step'], $this->_sections['th']['iteration']++):
$this->_sections['th']['rownum'] = $this->_sections['th']['iteration'];
$this->_sections['th']['index_prev'] = $this->_sections['th']['index'] - $this->_sections['th']['step'];
$this->_sections['th']['index_next'] = $this->_sections['th']['index'] + $this->_sections['th']['step'];
$this->_sections['th']['first']      = ($this->_sections['th']['iteration'] == 1);
$this->_sections['th']['last']       = ($this->_sections['th']['iteration'] == $this->_sections['th']['total']);
?>
										<th><?php echo $this->_tpl_vars['data']['thName'][$this->_sections['th']['index']]; ?>
</th>
										<?php endfor; endif; ?>
									</tr>
								</thead>
								<tbody>

									<?php $_from = $this->_tpl_vars['record']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rec']):
?>
									<tr>
										<?php $_from = $this->_tpl_vars['data']['tdName']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['td']):
?>
										<td><?php echo $this->_tpl_vars['rec'][$this->_tpl_vars['td']]; ?>
</td>
										<?php endforeach; endif; unset($_from); ?>
									</tr>
									<?php endforeach; endif; unset($_from); ?>

								</tbody>
							</table>
							<?php endif; ?>
						</div>
						<?php else: ?>
						<span class="text-center"><p><?php echo $this->_tpl_vars['error']; ?>
</p></span>
						<?php endif; ?>
					</fieldset>
				</form>
				<?php endif; ?><!--=======Reports Else Condition End======= -->
			</div>
		</div><!-- #content -->
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php echo '
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

		$(\'#mediWrap\').hide();
		$(\'#testWrap\').hide();
		$(\'#chart-container\').hide();
		$(\'#chart-container-pie\').hide();
	// $(\'.resultWrap\').hide();
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
				var date = $(this).datepicker(\'getDate\');

				date.setDate(date.getDate() + 30); 
				$("#to").datepicker("option", "minDate", selected);
				$("#to").datepicker("option", "maxDate", date);
				$(\'#to\').val(\'\');
			}
		});

		$( "#to" ).datepicker({
			dateFormat : "yy-mm-dd",
			changeMonth: true,
			changeYear: true,
			readOnly:true,
		});

		$(\'#reportForm\').validate({
			rules:{
				parameter:{required: true},
				from:{required: true},
				to:{required: true},
			}

		});

		$(\'.extendedTable\').hide();
		
		$(\'.reportGenTbl\').click(function(){

			$(".extendedTable").toggle();
		})

		var charts=$( "#charts" ).html();
 //console.log(charts);
//debugger;

if (charts) {

	charts=JSON.parse(charts);
	$(\'#chart-container\').show();
	var dmy=$(\'#dmyfilter\').val();

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
	$(\'#chart-container\').hide();
}




/*====================Comparison Script Start=======================*/
$(\'.extendedTablePie\').hide();

$(\'.reportGenTblPie\').click(function(){

	$(".extendedTablePie").toggle();
})
$(\'#comparisonForm\').validate({

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
	$(\'#chart-container-pie\').show();

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

	$(\'#chart-container-pie\').hide();
}


/*================Comparison Script End=================*/
});

	function checkParameter(that){

		if ($(that).val()=="Medicine prescribed to number of patients") {
			$(\'#testWrap\').hide();
			$.ajax({

				type: "POST",
				url : "'; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
reports/add?ajax=y<?php echo '",
				dataType: "html",
				data: $(that).val(),
				success:function (msg) {

					var data =JSON.parse(msg);
					var dropdown = "";
					dropdown+=\'<option class="topOpt" value="" selected disabled>Select Medicine</option>\';
					$.each(data.id,function(k,v){

						dropdown+=\'<option value="\'+v+\'">\'+data.medi[k] + "("+data.dose[k]+")"+\'</option>\';   
					})
					$(\'#mediWrap\').show();
					$(\'#medicine\').html(\'\');
					$(\'#medicine\').html(dropdown);
				}
			})
		}else if($(that).val()=="Tests"){
			$(\'#mediWrap\').hide();
			$.ajax({

				type: "POST",
				url : "'; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
reports/add?testajax=y<?php echo '",
				dataType: "html",
				data: $(that).val(),
				success:function (msg) {

					var data =JSON.parse(msg);
					console.log(data);
					//debugger
					var dropdown = "";
					dropdown+=\'<option class="topOpt" value="" selected disabled>Select Test</option>\';
					$.each(data.ids,function(k,v){

						dropdown+=\'<option value="\'+v+\'">\'+data.test[k]+\'</option>\';   
					})
					$(\'#testWrap\').show();
					$(\'#testSelect\').html(\'\');
					$(\'#testSelect\').html(dropdown);
				}
			})


		}else{

			$(\'#mediWrap\').hide();
			$(\'#testWrap\').hide();
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
					var date = $(this).datepicker(\'getDate\');

					date.setDate(date.getDate() + 30); 
					$("#to").datepicker("option", "minDate", selected);
					$("#to").datepicker("option", "maxDate", date);
					$(\'#to\').val(\'\');
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
'; ?>

