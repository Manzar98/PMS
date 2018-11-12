{include file="header.tpl"}
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
            $(wrapper).append('<div class="col-sm-4 common-bottom"><label for="dose'+x+'">Dose</label><input type="text" name="dose[]" id="dose'+x+'" class="form-control"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
	})

	 $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
})
</script>
{/literal}
<div id="content">
	<div class="container-fluid">

		{if isset($add)}
		
		<form class="box" action="{$smarty.server.REQUEST_URI}" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Add Medicine</legend>
				<div class="row">
					<div class="col-sm-4 common-bottom">
						<label for="name">Medicine Name</label>
						<input type="text" name="name" id="name" value="{$data.name}" {if $errors.name} class="error form-control" {else} class="form-control" {/if} />
					</div>
					<div class="col-sm-4 common-bottom">
						<label for="formula">Medicine Formula</label>
						<input type="text" name="formula" id="formula" value="{$data.formula}" {if $errors.name} class="error form-control" {else} class="form-control" {/if}/>
					</div>
					<div class="col-sm-4 common-bottom">
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
				<div class="row">
					<div class="col-sm-4 common-bottom">
						<label for="company">Company</label>
						<input type="text" name="company" id="company" value="{$data.company}" {if $errors.name} class="error form-control" {else} class="form-control" {/if}/>
					</div>
					<div class="col-sm-4 common-bottom">
						<label for="dose">Dose</label>
						<input type="text" name="dose[]" id="dose" value="{$data.dose}" {if $errors.name} class="error form-control" {else} class="form-control" {/if}/>	
					</div>
					<div class="col-sm-4" style="margin-top: 25px;">

						<input type="button" name="" id="m_does" value="Add More Dose" class="btn btn-primary" />
					</div>
				</div>
				<div class="row input_fields_wrap">
					
				</div>	
				<div class="col-sm-4" style="margin-top: 25px;">

						<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary" />
					</div>
			</fieldset>
			<div class="" style="margin-bottom: 20px;"></div>
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
					<div class="col-sm-3 search-top">
						<select name="field" id="field" class="form-control">
							<option value="id" {if $data.field=='id'} selected="selected" {/if}>Medicine ID</option>
							<option value="name" {if $data.field=='name'} selected="selected" {/if}>Medicine Name</option>	
							<option value="formula" {if $data.field=='formula'} selected="selected" {/if}>Medicine Formula</option>
							<option value="type" {if $data.field=='type'} selected="selected" {/if}>Type</option>
							<option value="dose" {if $data.field=='dose'} selected="selected" {/if}>Dose</option>
							<option value="company" {if $data.field=='company'} selected="selected" {/if}>Company</option>
						</select>
					</div>
					<div class="col-sm-3 search-top">
						<input type="text" name="q" id="q" value="{$data.q}" maxlength="20" class="form-control" />
					</div>
					<div class="col-sm-3 search-top">
						<input type="submit" value="Search" name="submit" id="submit" class="btn btn-primary" />
					</div>
				</div>
			</fieldset>
		</form>
		
		{if $smarty.get.q neq ''}
		<div style="padding: 20px 0;">
			<p><a href="{$BASE_URL_ADMIN}medicine/">Back to all Medicine List</a></p>
		</div>
		{/if}
		
		{if $medicine_list}

		<div class="pagination pull-right grp_btn">
			Group By : 
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
					<td width="45">{$med.id}</td>
					<td>{$med.name}</td>
					<td width="100">{$med.formula}</td>
					<td>{$med.dose}</td>
					<td>{$med.type}</td>
					<td>{$med.company}</td>
					<td width="90">
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
		{/if}
		<div class="pagination">
			{$pages}
		</div>	
		{/if}	
	</div><!-- #content -->
</div>
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
{include file="footer.tpl"}