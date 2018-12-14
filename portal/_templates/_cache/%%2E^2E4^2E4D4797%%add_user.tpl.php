<?php /* Smarty version 2.6.31, created on 2018-12-14 10:03:04
         compiled from users/add_user.tpl */ ?>
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
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
users/">Doctors</a>
				</li>
				<li class="breadcrumb-item active">Add</li>
			</ol>
		</div>
		<h2>Add Doctor</h2>

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
				<legend>Add Doctor</legend>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group"> 
							<label for="F_name">First Name</label>
							<input type="text" name="F_name" id="F_name" class="form-control" />
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group"> 
							<label for="L_name">Last Name</label>
							<input type="text" name="L_name" id="L_name" class="form-control"/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group"> 
							<label for="email">Email address</label>
							<input type="email" name="email" id="email" class="form-control"/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group"> 
							<label for="name">User Name</label>
							<input type="text" name="name" id="name" class="form-control" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group"> 
							<label for="mobile">Mobile</label>
							<input type="text" name="mobile" id="mobile" class="form-control"/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group"> 
							<label for="phone">Landline</label>
							<input type="text" name="phone" id="phone"class="form-control"/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group"> 
							<label for="expire">Expiration</label>
							<input type="text" name="expire" id="expire"class="form-control"/>
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
								<option value="<?php echo $this->_tpl_vars['city']['id']; ?>
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
							<input type="text" name="c_address" id="c_address"class="form-control"/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group"> 
							<label for="quali">Doctor's Qualification</label>
							<input type="text" name="quali" id="quali"class="form-control"/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group"> 
							<label for="exprience">Doctor's Experience</label>
							<input type="number" name="exprience" id="exprience"class="form-control"/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group"> 
							<label for="password">Password</label>
							<input type="text" name="password" id="password"class="form-control"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group"> 
							<label for="specialist">Specialist</label>
							<input type="text" name="specialist" id="specialist"class="form-control"/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group"> 
							<label for="package_id">Package</label>
							<select name="package_id" id="package_id" class="form-control">
								<option value="">Select Package</option>
								<?php $_from = $this->_tpl_vars['packages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['package']):
?>
								<option value="<?php echo $this->_tpl_vars['package']['id']; ?>
"><?php echo $this->_tpl_vars['package']['pkg_name']; ?>
</option>
								<?php endforeach; endif; unset($_from); ?>						
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group"> 
							<label for="c_fee">Clinic Fee</label>
							<input type="text" name="c_fee" id="c_fee"class="form-control"/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group"> 
							<label for="c_name">Clinic Name</label>
							<input type="text" name="c_name" id="c_name"class="form-control"/>
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
					<div class="col-md-6 text-center my-4" >
						<div class="form-group">
							<div id="upload-demo">
							</div>
							<div id="upload-demo-i">	
							</div>
							<button id="upload-demo-btn"  class="btn upload-result" type="button">Crop Image</button>
						</div>
					</div>
				</div>
			</form>
			<div class="row">
				<div class="col-sm-3 my-4 mx-auto" style="padding-top: 25px;">
					<input type="submit" name="submit" id="submit" class="btn btn-primary form-control" value="Add Doctor" />
				</div>
			</div>
		</fieldset>
	</div><!-- #content -->
</div>
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
				package_id: {required:true},
			}
		});

		var today = new Date();
		$( "#expire" ).datepicker({
			dateFormat : "yy-mm-dd",
			changeMonth: true,
			changeYear: true,
			minDate: today,
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
  	//debugger
  	$(\'#upload-demo\').show();
  	$(\'#upload-demo-btn\').show();
  	var reader = new FileReader();
  	reader.onload = function (e) {
  		$uploadCrop.croppie(\'bind\', {
  			url: e.target.result
  		}).then(function(){
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
add-users?img=y<?php echo '",     
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


});
</script>
'; ?>
