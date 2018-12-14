<?php /* Smarty version 2.6.31, created on 2018-12-10 22:14:41
         compiled from users/edit_user.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="" class="content-wrapper">
	<div class="container-fluid">
				<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
">Dashboard</a>
				</li>
				<?php if (isset ( $_SESSION['UserType'] ) && $_SESSION['UserType'] == 'S_admin'): ?>
				<?php if (isset ( $this->_tpl_vars['id'] ) && $this->_tpl_vars['id'] > '0'): ?>
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/">Doctors</a>
				</li>
				<li class="breadcrumb-item active">Edit</li>
				<?php else: ?>
				<li class="breadcrumb-item active">Doctors</li>
				<?php endif; ?>
				<?php else: ?>
				<li class="breadcrumb-item active">Edit Profile</li>
				<?php endif; ?>
				
			</ol>
		</div>
		<h2>Edit Doctor</h2>
		<?php if (( isset ( $this->_tpl_vars['errors'] ) && $this->_tpl_vars['errors'] )): ?>
		<div class="fail">
			<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
			<?php echo $this->_tpl_vars['error']; ?>

			<?php endforeach; endif; unset($_from); ?>
		</div>
		<?php endif; ?>

		<form id="add_user" class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
			<fieldset>
				<legend>Edit Doctor</legend>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label for="F_name">First Name</label>
							<input type="text" name="F_name" id="F_name" class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['F_name'] )): ?>value="<?php echo $this->_tpl_vars['data']['F_name']; ?>
"<?php endif; ?>/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="L_name">Last Name</label>
							<input type="text" name="L_name" id="L_name" class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['L_name'] )): ?>value="<?php echo $this->_tpl_vars['data']['L_name']; ?>
"<?php endif; ?>/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="email">Email address</label>
							<input type="email" name="email" id="email" class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['email'] )): ?>value="<?php echo $this->_tpl_vars['data']['email']; ?>
"<?php endif; ?>/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="name">User Name</label>
							<input type="text" name="name" id="name" class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['username'] )): ?>value="<?php echo $this->_tpl_vars['data']['username']; ?>
"<?php endif; ?> />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label for="mobile">Mobile</label>
							<input type="text" name="mobile" id="mobile" class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['mobile'] )): ?>value="<?php echo $this->_tpl_vars['data']['mobile']; ?>
"<?php endif; ?>/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="phone">Landline</label>
							<input type="text" name="phone" id="phone"class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['phone'] )): ?>value="<?php echo $this->_tpl_vars['data']['phone']; ?>
"<?php endif; ?>/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="expire">Expiration</label>
							<input type="text" name="expire" id="expire"class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['expire'] )): ?>value="<?php echo $this->_tpl_vars['data']['expire']; ?>
"<?php endif; ?>/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="city">Clinic City</label>
							<select name="city" id="city" class="form-control">
								<option value="">Select City</option>
								<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
								<option <?php if ($this->_tpl_vars['data']['city'] == $this->_tpl_vars['city']['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $this->_tpl_vars['city']['id']; ?>
"><?php echo $this->_tpl_vars['city']['name']; ?>
</option>
								<?php endforeach; endif; unset($_from); ?>						
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label for="c_address">Clinic Address</label>
							<input type="text" name="c_address" id="c_address"class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['c_address'] )): ?>value="<?php echo $this->_tpl_vars['data']['c_address']; ?>
"<?php endif; ?>/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="quali">Doctor's Qualification</label>
							<input type="text" name="quali" id="quali"class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['quali'] )): ?>value="<?php echo $this->_tpl_vars['data']['quali']; ?>
"<?php endif; ?>/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="exprience">Doctor's Experience</label>
							<input type="number" name="exprience" id="exprience"class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['exprience'] )): ?>value="<?php echo $this->_tpl_vars['data']['exprience']; ?>
"<?php endif; ?>/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="specialist">Specialist</label>
							<input type="text" name="specialist" id="specialist"class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['specialist'] )): ?>value="<?php echo $this->_tpl_vars['data']['specialist']; ?>
"<?php endif; ?> />
						</div>
					</div>
				</div>

				<div class="row">
					<?php if (isset ( $_SESSION['UserType'] ) && $_SESSION['UserType'] == 'S_admin'): ?>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="package_id">Package</label>
							<select name="package_id" id="package_id" class="form-control">

								<option value="">Select Package</option>

								<?php $_from = $this->_tpl_vars['packages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['package']):
?>
								<option <?php if ($this->_tpl_vars['data']['package_id'] == $this->_tpl_vars['package']['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $this->_tpl_vars['package']['id']; ?>
"><?php echo $this->_tpl_vars['package']['pkg_name']; ?>
</option>
								<?php endforeach; endif; unset($_from); ?>						
							</select>
						</div>
					</div>
					<?php endif; ?>
					<div class="col-md-3">
						<div class="form-group">
							<label for="c_fee">Clinic Fee</label>
							<input type="text" name="c_fee" id="c_fee"class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['c_fee'] )): ?>value="<?php echo $this->_tpl_vars['data']['c_fee']; ?>
"<?php endif; ?>/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="c_name">Clinic Name</label>
							<input type="text" name="c_name" id="c_name"class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['c_name'] )): ?>value="<?php echo $this->_tpl_vars['data']['c_name']; ?>
"<?php endif; ?>/>
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
						<img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
<?php echo $this->_tpl_vars['data']['profile_img']; ?>
" id="preveiw_image" width="" alt="">
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
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
		$(\'#name\').focus();

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
		$(\'#work_hr\').timepicker({
			// timeFormat: \'h:mm p\',
			interval: 60,
			minTime: \'10\',
			maxTime: \'6:00pm\',
			defaultTime: \'11\',
			startTime: \'10:00\',
			dynamic: false,
			dropdown: true,
			scrollbar: true
		});


/*=======================
  Profile image reader
  =========================*/  

  $(\'#upload-demo\').hide();
  $(\'#upload-demo-i\').hide();
  $(\'#upload-demo-btn\').hide();
  $uploadCrop = $(\'#upload-demo\').croppie({
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


  $(\'#upload\').on(\'change\', function () { 

  	// debugger
  	$(\'#upload-demo\').show();
  	$(\'#upload-demo-btn\').show();
  	var reader = new FileReader();
  	reader.onload = function (e) {

  		$uploadCrop.croppie(\'bind\', {
  			url: e.target.result
  		}).then(function(){
  			//console.log(e.target.result);

  			$(\'#preveiw_image\').remove();
  			console.log(\'jQuery bind complete\');
  		});

  	}
  	reader.readAsDataURL(this.files[0]);
  });

  $(\'.upload-result\').on(\'click\', function (ev) {
  	$uploadCrop.croppie(\'result\', {
  		type: \'canvas\',
  		size: \'viewport\'
  	}) .then(function (resp) {


  		$.ajax({

  			type: "POST",
  			url: "'; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
edit-users?img=y<?php echo '",     
  			data: {"image":resp},
  			success: function (data) {

  				$(\'#upload-demo\').hide();
  				$(\'#upload-demo-btn\').hide();
  				$("#upload-demo-i").show();
  				html = \'<img src="\' + resp + \'" />\';
  				$("#upload-demo-i").html(html);
  				$(\'#profile_img\').val(data);



        // debugger;
    }
});
  	});
  });

  		$(\'#collapseProfile\').collapse({
			toggle: true
		})

});
</script>
'; ?>
