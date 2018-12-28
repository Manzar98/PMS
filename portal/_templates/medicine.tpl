{include file="header.tpl"}
<div id=""  class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}">Dashboard</a>
				</li>
				{if $smarty.get.q neq ''}
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}medicine/">Medicines</a>
				</li>
				<li class="breadcrumb-item active">Search</li>
				{elseif isset($id) && $id=="0"}
				<li class="breadcrumb-item active">Medicines</li>
				{else}
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}medicine/">Medicines</a>
				</li>
				<li class="breadcrumb-item active text-capitalize">{$id}</li>
				{/if}
			</ol>
		</div>
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
		{if isset($add)}
		<h2 class="text-capitalize">{$id} Medicine</h2>
		<input type="hidden" name="" id="medicineFull" value="{$medicineFull}">
		<form class="box" action="{$smarty.server.REQUEST_URI}" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>{$id} Medicine</legend>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">Medicine Name</label>
							<input type="text" name="name" id="name" value="{$data.name}" {if $errors.name} class="error form-control" {else} class="form-control" {/if} />
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="formula">Medicine Formula</label>
							<input type="text" name="formula" id="formula" value="{$data.formula}" {if $errors.name} class="error form-control" {else} class="form-control" {/if}/>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="type">Type</label>
							<select name="type" id="type" {if $errors.name} class="error form-control" {else} class="form-control" {/if}>
								<option value="" {if $data.type==""} selected="selected" {/if} disabled="disabled">Select</option>
								<option {if $data.type=="Tablet"} selected="selected" {/if} value="Tablet">Tablet</option>
								<option {if $data.type=="Capsule"} selected="selected" {/if}  value="Capsule">Capsule</option>
								<option {if $data.type=="Syrup"} selected="selected" {/if}  value="Syrup">Syrup</option>
								<option {if $data.type=="Injection"} selected="selected" {/if}  value="Injection">Injection</option>
								<option {if $data.type=="Cream"} selected="selected" {/if}  value="Cream">Cream</option>
								<option {if $data.type=="Drops"} selected="selected" {/if}  value="Drops">Drops</option>
							</select>
						</div>	
					</div> 
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="company">Company</label>
							<input type="text" name="company" id="company" value="{$data.company}" {if $errors.name} class="error form-control" {else} class="form-control" {/if}/>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="dose">Dose</label>
							<input type="text" name="dose[]" id="dose" value="{$data.dose}" {if $errors.name} class="error form-control" {else} class="form-control" {/if}/>	</div>
						</div>
						<div class="col-sm-4" style="margin-top: 30px;">
							<input type="button" name="" id="m_does" value="Add More Dose" class="btn btn-primary" />
						</div>
					</div>
					<div class="row input_fields_wrap">

					</div>	
					<div class="col-sm-4 mx-auto mt-3">
						<input type="submit" name="submit" id="submit" value="{if $id==='add'}Add{else}Update{/if}" class="btn btn-primary form-control" />
					</div>
				</fieldset>
			</form>
			{else}
			<h2 class="headingBottom">{if $smarty.get.q neq ''} Search Result For "<b>{$smarty.get.q}</b>" {else}Medicine List{/if}</h2>
			<p>
				<a href="{$BASE_URL_ADMIN}medicine/add/" title="Add new"><i class="fa fa-plus-square sqicon" aria-hidden="true"></i></a>
			</p>

			<form class="box style" action="{$BASE_URL_ADMIN}medicine/" method="get" enctype="multipart/form-data">
				<fieldset>
					<legend>Search for Medicine</legend>
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<select name="field" id="field" class="form-control">
									<option value="id" {if $data.field=='id'} selected="selected" {/if}>Medicine ID</option>
									<option value="name" {if $data.field=='name'} selected="selected" {/if}>Medicine Name</option>	
									<option value="formula" {if $data.field=='formula'} selected="selected" {/if}>Medicine Formula</option>
									<option value="type" {if $data.field=='type'} selected="selected" {/if}>Type</option>
									<option value="dose" {if $data.field=='dose'} selected="selected" {/if}>Dose</option>
									<option value="company" {if $data.field=='company'} selected="selected" {/if}>Company</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<input type="text" name="q" id="q" value="{$data.q}" maxlength="20" class="form-control" />
							</div>
						</div>
						<div class="col-sm-3">
							<input type="submit" value="Search" name="submit" id="submit" class="btn btn-primary" />
						</div>
					</div>
				</fieldset>
			</form>
			{if $medicine_list}
			<div class="pull-right grp_btn">
				Group By :&nbsp; 
				<a {if $group_by=='formula'} class="current_page" {/if} href="{$BASE_URL_ADMIN}medicine/?group_by=formula&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Formula</a>
				<a {if $group_by=='dose'} class="current_page" {/if} href="{$BASE_URL_ADMIN}medicine/?group_by=dose&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Dose</a>
				<a {if $group_by=='type'} class="current_page" {/if} href="{$BASE_URL_ADMIN}medicine/?group_by=type&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Type</a>
				<a {if $group_by=='company'} class="current_page" {/if} href="{$BASE_URL_ADMIN}medicine/?group_by=company&q={$smarty.get.q}&field={$smarty.get.field}&p={$smarty.get.p}">Company</a>
			</div>
			{foreach from=$medicine_list item=medicine key=key}

			<table class="table table-striped table-bordered" >
				{if $group_by=='date'}
				<caption>{$key|date_format:"%A, %B %e, %Y"}</caption>				
				{elseif $group_by=="patient_id"}
				<caption>Patient ID: {$key}</caption>
				{else}
				<caption>{$key}</caption>
				{/if}

				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Formula</th>
						<th>Dose</th>
						<th>Type</th>
						<th>Company</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$medicine item=med}
					<tr class="{cycle values='odd,even'}">
						<td >{$med.id}</td>
						<td>{$med.name}</td>
						<td >{$med.formula}</td>
						<td>{$med.dose}</td>
						<td>{$med.type}</td>
						<td>{$med.company}</td>
						<td>
							<div class="icons">				
								<a href="{$BASE_URL_ADMIN}medicine/edit/{$med.id}/" title="Edit"><img src="{$BASE_URL_ADMIN}_templates/img/pencil.png" alt="Edit" /></a>
								<a href="{$BASE_URL_ADMIN}medicine/delete/{$med.id}/" title="Delete this" onclick="if(!confirm('Are you sure you want to delete this ?'))return false;"><img src="{$BASE_URL_ADMIN}_templates/img/bin.png" alt="Delete" /></a>
							</div>
						</td>
					</tr>
					{foreachelse}
					<tr style="color:red;">
						<td>
							No Medicine on the List
						</td>
					</tr>
					{/foreach}
				</tbody>
			</table>
			{/foreach}
			{else}
			<p class="box-info text-center" style="margin-top: 7rem!important;">No Medicine against this {$smarty.get.field}</p>
			{/if}
			<div class="pagination">
				{$pages}
			</div>


			{/if}

		</div><!-- #content -->
	</div>
	{include file="footer.tpl"}
	
	{literal}
	<script type="text/javascript">

		$(document).ready(function() {
			var max_fields      = 5;
			var wrapper    = $(".input_fields_wrap");
			var x = 1; 
			$('#m_does').click(function(e){
				e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-sm-4 common-bottom"><label for="dose'+x+'">Dose</label><a href="#" class="remove_field pull-right"><i class="fa fa-times" aria-hidden="true"></i></a><input type="text" name="dose[]" id="dose'+x+'" class="form-control"/></div>'); //add input box
        }
    })

	 $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	 	e.preventDefault(); $(this).parent('div').remove(); x--;
	 })

	 if ($('#medicineFull').val()) {
	 	alert($('#medicineFull').val());
	 }else{
	 	$('#medicineFull').val('');
	 }
	 
	 $('#collapseMedicine').collapse({
	 	toggle: true
	 })

	})
</script>
{/literal}