{include file="header.tpl"}
<div id="" class="content-wrapper">
	<div class="container-fluid">
				<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}">Dashboard</a>
				</li>
				{if isset($smarty.session.UserType) && $smarty.session.UserType=="S_admin"}
				{if isset($id) && $id>"0"}
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}users/">Doctors</a>
				</li>
				<li class="breadcrumb-item active">Edit</li>
				{else}
				<li class="breadcrumb-item active">Doctors</li>
				{/if}
				{else}
				<li class="breadcrumb-item active">Edit Profile</li>
				{/if}
				
			</ol>
		</div>
		<h2>Edit Doctor</h2>
		{if (isset($errors) && $errors)}
		<div class="fail">
			{foreach from=$errors item=error}
			{$error}
			{/foreach}
		</div>
		{/if}

		<form id="add_user" class="box style" action="{$smarty.server.REQUEST_URI}" method="post">
			<fieldset>
				<legend>Edit Doctor</legend>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label for="F_name">First Name</label>
							<input type="text" name="F_name" id="F_name" class="form-control" {if (isset($data) && $data.F_name)}value="{$data.F_name}"{/if}/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="L_name">Last Name</label>
							<input type="text" name="L_name" id="L_name" class="form-control" {if (isset($data) && $data.L_name)}value="{$data.L_name}"{/if}/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="email">Email address</label>
							<input type="email" name="email" id="email" class="form-control" {if (isset($data) && $data.email)}value="{$data.email}"{/if}/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="name">User Name</label>
							<input type="text" name="name" id="name" class="form-control" {if (isset($data) && $data.username)}value="{$data.username}"{/if} />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label for="mobile">Mobile</label>
							<input type="text" name="mobile" id="mobile" class="form-control" {if (isset($data) && $data.mobile)}value="{$data.mobile}"{/if}/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="phone">Landline</label>
							<input type="text" name="phone" id="phone"class="form-control" {if (isset($data) && $data.phone)}value="{$data.phone}"{/if}/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="expire">Expiration</label>
							<input type="text" name="expire" id="expire"class="form-control" {if (isset($data) && $data.expire)}value="{$data.expire}"{/if}/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="city">Clinic City</label>
							<select name="city" id="city" class="form-control">
								<option value="">Select City</option>
								{foreach from=$cities item=city}
								<option {if $data.city==$city.id} selected="selected" {/if} value="{$city.id}">{$city.name}</option>
								{/foreach}						
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label for="c_address">Clinic Address</label>
							<input type="text" name="c_address" id="c_address"class="form-control" {if (isset($data) && $data.c_address)}value="{$data.c_address}"{/if}/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="quali">Doctor's Qualification</label>
							<input type="text" name="quali" id="quali"class="form-control" {if (isset($data) && $data.quali)}value="{$data.quali}"{/if}/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="exprience">Doctor's Experience</label>
							<input type="number" name="exprience" id="exprience"class="form-control" {if (isset($data) && $data.exprience)}value="{$data.exprience}"{/if}/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group"> 
							<label for="specialist">Specializations</label><i class="fa fa-question-circle pull-right pt-1 qMarkPurpose" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Write comaseparated specializations"></i>
							<textarea name="specialist" id="specialist" class="form-control">{if (isset($data) && $data.specialist)}{$data.specialist}{/if}</textarea>
						</div>
					</div>
				</div>

				<div class="row">
					{if isset($smarty.session.UserType) && $smarty.session.UserType=="S_admin"}
					<div class="col-sm-3">
						<div class="form-group">
							<label for="package_id">Package</label>
							<select name="package_id" id="package_id" class="form-control">

								<option value="">Select Package</option>

								{foreach from=$packages item=package}
								<option {if $data.package_id == $package.id} selected="selected" {/if} value="{$package.id}">{$package.pkg_name}</option>
								{/foreach}						
							</select>
						</div>
					</div>
					{/if}
					<div class="col-md-3">
						<div class="form-group">
							<label for="c_fee">Clinic Fee</label>
							<input type="text" name="c_fee" id="c_fee"class="form-control" {if (isset($data) && $data.c_fee)}value="{$data.c_fee}"{/if}/>
						</div>
					</div>
				</div>
				<input type="hidden" name="profile_img" id="profile_img">
				<div class="row">
					<div class="col-md-6 my-2">
						<div class="form-group">
						<div class="file-field input-field">
							<div class="btn btn-primary" id="pro-file-upload"> <span>Profile photo</span>
								<input type="file" id="upload">	
							</div>
						</div>
						</div>
					</div>
					<div class="col-md-6 text-center my-4">
						<img src="{$BASE_URL_ADMIN}{$data.profile_img}" id="preveiw_image" width="" alt="">
						<div id="upload-demo">
						</div>
						<div id="upload-demo-i">	
						</div>
						<button id="upload-demo-btn"  class="btn upload-result" type="button">Crop Image</button>
						
					</div>
				</div>
			</form>
			<div class="row">
				<div class="col-sm-4 my-4 mx-auto">
					<input type="submit" name="submit" id="submit" class="btn btn-primary form-control" value="Update"/>
				</div>
			</div>
		</fieldset>
	</div>
</div><!-- #content -->
{include file="footer.tpl"}
{literal}
<style type="text/css">
span.select2.select2-container.select2-container--default {
	width: 247px !important;
}
</style>
<script type="text/javascript">
	$(document).ready(function()
	{
		$("#city").select2({
                   // placeholder: "Select a State",
                   allowClear: true
               });
		$('#name').focus();

		$("#add_user").validate({
			rules: {
				name: { required: true },
				password: { required: true },
				L_name: { required: true },
				F_name: { required: true },
				email: { required: true },
				quali: { required: true },
				exprience: { required: true },
				city: { required: true },
				c_address: { required: true },
				expire: { required: true },
			}
		});

		var today = new Date();
		$( "#expire" ).datepicker({
			dateFormat : "yy-mm-dd",
			changeMonth: true,
			minDate: today,
		});
		$('#work_hr').timepicker({
			// timeFormat: 'h:mm p',
			interval: 60,
			minTime: '10',
			maxTime: '6:00pm',
			defaultTime: '11',
			startTime: '10:00',
			dynamic: false,
			dropdown: true,
			scrollbar: true
		});


/*=======================
  Profile image reader
  =========================*/  

  $('#upload-demo').hide();
  $('#upload-demo-i').hide();
  $('#upload-demo-btn').hide();
  $uploadCrop = $('#upload-demo').croppie({
  	enableExif: true,
  	viewport: {
  		width: 200,
  		height: 200,
  	},
  	boundary: {
  		width: 300,
  		height: 300
  	}
  });


  $('#upload').on('change', function () { 

  	// debugger
  	$('#upload-demo').show();
  	$('#upload-demo-btn').show();
  	var reader = new FileReader();
  	reader.onload = function (e) {

  		$uploadCrop.croppie('bind', {
  			url: e.target.result
  		}).then(function(){
  			//console.log(e.target.result);

  			$('#preveiw_image').remove();
  			console.log('jQuery bind complete');
  		});

  	}
  	reader.readAsDataURL(this.files[0]);
  });

  $('.upload-result').on('click', function (ev) {
  	$uploadCrop.croppie('result', {
  		type: 'canvas',
  		size: 'viewport'
  	}) .then(function (resp) {


  		$.ajax({

  			type: "POST",
  			url: "{/literal}{$BASE_URL_ADMIN}edit-users?img=y{literal}",     
  			data: {"image":resp},
  			success: function (data) {

  				$('#upload-demo').hide();
  				$('#upload-demo-btn').hide();
  				$("#upload-demo-i").show();
  				html = '<img src="' + resp + '" />';
  				$("#upload-demo-i").html(html);
  				$('#profile_img').val(data);



        // debugger;
    }
});
  	});
  });

  		$('#collapseProfile').collapse({
			toggle: true
		})

});
</script>
{/literal}
