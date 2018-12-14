{include file="header.tpl"}

<div id="" class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}">Dashboard</a>
				</li>
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}packages/">Packages</a>
				</li>
				<li class="breadcrumb-item active">{if isset($singleRecord)}Edit{else}Add{/if}</li>
			</ol>
		</div>
		<h2>{if isset($singleRecord)}Edit{else}Add{/if} Package</h2>
		<form id="add_package" class="box style" action="{$smarty.server.REQUEST_URI}" method="post">
			<fieldset>
				<legend>{if isset($singleRecord)}Edit{else}Add{/if} Package</legend>
				<div class="row">
					<input type="hidden" name="id" id="" class="" {if (isset($singleRecord) && $singleRecord.id)}value="{$singleRecord.id}"{/if}/>
					<div class="col-sm-4">
						<div class="form-group">
						<label>Package Name</label>
						<input type="text" name="pkg_name" id="pkg_name" class="form-control" {if (isset($singleRecord) && $singleRecord.pkg_name)}value="{$singleRecord.pkg_name}"{/if}/>
					</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
						<label>Number Of Patients</label>
						<input type="number" name="no_of_patients" id="no_of_patients" class="form-control" {if (isset($singleRecord) && $singleRecord.no_of_patients)}value="{$singleRecord.no_of_patients}"{/if}/>
					</div>
				</div>
					<div class="col-sm-4">
						<div class="form-group">
						<label>Number Of Prescriptions</label>
						<input type="number" name="no_of_prescriptions" id="no_of_prescriptions" class="form-control" {if (isset($singleRecord) && $singleRecord.no_of_prescriptions)}value="{$singleRecord.no_of_prescriptions}"{/if}/>
					</div>
				</div>
				</div>
				<div class="row"> 
					<div class="col-sm-4">
						<div class="form-group">
						<label>Number Of Medicines</label>
						<input type="number" name="no_of_medicines" id="no_of_medicines" class="form-control" {if (isset($singleRecord) && $singleRecord.no_of_medicines)}value="{$singleRecord.no_of_medicines}"{/if}/>
					</div>
				</div>
					<div class="col-sm-4">
						<div class="form-group">
						<label>Number Of Tests</label>
						<input type="number" name="no_of_tests" id="no_of_tests" class="form-control" {if (isset($singleRecord) && $singleRecord.no_of_tests)}value="{$singleRecord.no_of_tests}"{/if}/>
					</div>
				</div>
					<div class="col-sm-4">
						<div class="form-group">
						<label>Number Of Online Appointments</label>
						<input type="number" name="no_of_online_appointments" id="no_of_online_appointments" class="form-control" {if (isset($singleRecord) && $singleRecord.no_of_online_appointments)}value="{$singleRecord.no_of_online_appointments}"{/if}/>
					</div>
				</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
						<label>Package Price</label>
						<input type="text" name="pkg_price" id="pkg_price"class="form-control" {if (isset($singleRecord) && $singleRecord.pkg_price)}value="{$singleRecord.pkg_price}"{/if}/>
					</div>
				</div>
				</div>
				<div class="row">
					<div class="col-sm-4 mx-auto">
						<input type="submit" name="submit" id="submit" class="btn btn-primary form-control"  {if isset($singleRecord)}value="Update Package"{else}value="Add Package"{/if}  />
					</div>
				</div>
			</fieldset>
		</form>
	</div><!-- #content -->
</div>

{include file="footer.tpl"}
{literal}
<script type="text/javascript">
	$('#add_package').validate({

		rules: {
			pkg_name: { required: true },
			no_of_patients: { required: true },
			no_of_prescriptions: { required: true },
			no_of_medicines: { required: true },
			no_of_tests: { required: true },
			no_of_instructions: { required: true },
			no_of_online_appointments: { required: true },
			pkg_price: { required: true },
		}
	});
</script>
{/literal}