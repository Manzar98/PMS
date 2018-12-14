{include file="header.tpl"}

<div id="" class="clientWrap content-wrapper">
<div class="container-fluid">

	{if isset($doctors)}
	<fieldset>
		<!-- <legend>Appointments</legend> -->
		<div class="row">
			<div class="col-sm-4 common-bottom">
				<select onchange="myFunction(event)" class="form-control" id="searchBy_cat" style="border-radius: 10px;" >
					<option value="" selected="">View All</option>
					<option value="neurosurgeon">Neurosurgeon</option>
					<option value="physiologist">Physiologist</option>
					<option value="biochemist">Biochemist</option>
					<option value="gynaecologist">Gynaecologist</option>
					<option value="cardiologist">Cardiologist</option>
				</select>
			</div>
			<div class="col-sm-7 common-bottom" >
				<input type="text" name="" id="mysearch" placeholder="Search Doctor's" class="form-control" style="border-radius: 10px;"  onkeyup="myFunction(event)">
			</div>
		</div> 
	
		<div class="row doctor_Wrap">
			{foreach from=$doctors item=doctors}
			<div class="col-sm-3 common-bottom complete_wrap">
				<a href="{$BASE_URL}appointments/view/{$doctors.id}/" class="docCard">
					<div class="card text-center cardWrap">
						<img class="card-img-top" src="{$BASE_URL}portal/{$doctors.profile_img}" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title info_wrap">{$doctors.F_name} {$doctors.L_name}</h5>
							<p ><span class="info_wrap">{$doctors.specialist}</span> - 
								{foreach from=$cities item=city}
								{if $doctors.city==$city.id}
								<span class="info_wrap">{$city.name}</span>
								{/if}
								{/foreach}
							</p>
						</div>
					</div>
				</a>
			</div>	
			{/foreach}
		</div>
	</fieldset>
	{elseif isset($data)}

	<div class="row">
		<div class="col-sm-10">
			<h3 class="noprint" >{$data.F_name}'s Details</h3>
		</div>
		<div class="col-sm-2" style="padding-top: 25px;">
			<span class="date">Join Date:<em>{$data.d_join|date_format:"%d/%m/%Y"}</em></span><br>
		</div>
	</div>
	<div class="row" style="margin-top: 10px;">
		<div class="col-sm-8"></div>
		<div class="col-sm-2 common-bottom" >
			<a href="{$BASE_URL}add-appointment/?doc_id={$data.id}&doc_name={$data.F_name} {$data.L_name} &doc_adr={$data.c_address}&doc_phne={$data.phone}&img={$data.profile_img}&speciallist={$data.specialist}&pkgId={$data.package_id}&exprience={$data.exprience}&fee={$data.c_fee}&exist=patient" class="btn btn-primary">Get Appointment</a>
		</div>
		<div class="col-sm-1"  >
			<a href="{$BASE_URL}history/" class="btn btn-primary">Veiw History</a>
		</div>
	</div>

	<hr style="border-top: dotted 1px #DEDEDE; " /> 
	<div style="margin-top: 30px;"></div>
	<div class="row" style="margin-bottom: 20px;">
		<div class="text-center center-block"> <img src="{$BASE_URL}portal/{$data.profile_img}" alt="" width="12%">
		</div>
	</div>
	<div class="row ">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Name : </b><span>Dr. {$data.F_name} {$data.L_name}</span></span>

		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>User's Name : </b><span>{$data.username}</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Email Address : </b><span>{$data.email}</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Specialist : </b><span class="capitalize">{$data.specialist}</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			{foreach from=$cities item=city}
			{if $data.city==$city.id}	
			<span><b>City : </b><span class="capitalize">{$city.name}</span></span>
			{/if}
			{/foreach}
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Clinic Address : </b><span>{$data.c_address}</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Landline : </b><span>{$data.phone}</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Doctor's Qualification : </b><span class="capitalize">{$data.quali}</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Doctor's Experience : </b><span>{$data.exprience}</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Clinic Name : </b><span class="capitalize">{$data.c_name}</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Clinic Fee : </b><span class="capitalize">{$data.c_fee}</span></span>
		</div>

	</div>
	<div style="margin-bottom: 30px;"></div>
	{/if}
</div><!-- #content -->
</div>
{include file="footer.tpl"}
<script src="{$BASE_URL}_templates/{$THEME}/js/select2.js"></script>
{literal}
<script type="text/javascript">
	$(document).ready(function()
	{
		$('.docWrap').hide();
		if ($('.errorId').val()) {

			alert($('.errorId').val());
		}

	});

	
	function myFunction(event) {

		var input=document.getElementById("mysearch");

		var filter=input.value;

		var trObj = $('.doctor_Wrap .complete_wrap');
		$('.doctor_Wrap .complete_wrap').hide();

		if (event.which==13 || event.type=="click" ) {

			$.each(trObj,function(k,value){

				if(value.innerHTML.toLowerCase().indexOf(filter) > -1){
					$(value).show();
				}
			});
// debugger;
}else if(event.type=="change"){

filter=$('#searchBy_cat').val();
console.log(filter);

$.each($('.info_wrap'),function(k,value){

	console.log(value);

	if(value.innerHTML.toLowerCase().indexOf(filter) > -1){

		$(value).parents('.complete_wrap').show();
	}
});

}else{
	/*loop for search input  field */
	$.each(trObj,function(k,value){
  // debugger
  if(value.innerHTML.toLowerCase().indexOf(filter) > -1){
  	$(value).show();
  }
});

}

}
</script>
{/literal}
