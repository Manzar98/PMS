<?php /* Smarty version 2.6.31, created on 2018-09-24 14:52:12
         compiled from users/edit_user.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'print_r', 'users/edit_user.tpl', 16, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="content">



	<h2>Edit User</h2>

	<?php if (( isset ( $this->_tpl_vars['errors'] ) && $this->_tpl_vars['errors'] )): ?>
	<div class="fail">
		<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
		<?php echo $this->_tpl_vars['error']; ?>

		<?php endforeach; endif; unset($_from); ?>
	</div>
	<?php endif; ?>
	<!-- <?php echo $_SERVER['REQUEST_URI']; ?>
  -->
	<!-- <?php echo ((is_array($_tmp=$this->_tpl_vars['data'])) ? $this->_run_mod_handler('print_r', true, $_tmp) : print_r($_tmp)); ?>
 -->
	<form id="add_user" class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
		<fieldset>
			<legend>Edit User</legend>
			<div class="row">
				<div class="col-sm-3 common-bottom">
					<label for="F_name">First Name</label>
					<input type="text" name="F_name" id="F_name" class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['F_name'] )): ?>value="<?php echo $this->_tpl_vars['data']['F_name']; ?>
"<?php endif; ?>/>
				</div>
				<div class="col-sm-3 common-bottom">
					<label for="L_name">Last Name</label>
					<input type="text" name="L_name" id="L_name" class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['L_name'] )): ?>value="<?php echo $this->_tpl_vars['data']['L_name']; ?>
"<?php endif; ?>/>
				</div>
				<div class="col-sm-3 common-bottom">
					<label for="email">Email address</label>
					<input type="email" name="email" id="email" class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['email'] )): ?>value="<?php echo $this->_tpl_vars['data']['email']; ?>
"<?php endif; ?>/>
				</div>
				<div class="col-sm-3 common-bottom">
					<label for="name">User Name</label>
					<input type="text" name="name" id="name" class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['username'] )): ?>value="<?php echo $this->_tpl_vars['data']['username']; ?>
"<?php endif; ?> />
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 common-bottom">
					<label for="mobile">Mobile</label>
					<input type="text" name="mobile" id="mobile" class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['mobile'] )): ?>value="<?php echo $this->_tpl_vars['data']['mobile']; ?>
"<?php endif; ?>/>
				</div>
				<div class="col-sm-3 common-bottom">
					<label for="phone">Landline</label>
					<input type="text" name="phone" id="phone"class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['phone'] )): ?>value="<?php echo $this->_tpl_vars['data']['phone']; ?>
"<?php endif; ?>/>
				</div>
				<div class="col-sm-3 common-bottom">
					<label for="expire">Expiration</label>
					<input type="text" name="expire" id="expire"class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['expire'] )): ?>value="<?php echo $this->_tpl_vars['data']['expire']; ?>
"<?php endif; ?>/>
				</div>
				<div class="col-sm-3 common-bottom">
					<label for="city">Clinic City</label>
					<input type="text" name="city" id="city"class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['city'] )): ?>value="<?php echo $this->_tpl_vars['data']['city']; ?>
"<?php endif; ?>/>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 common-bottom">
					<label for="c_address">Clinic Address</label>
					<input type="text" name="c_address" id="c_address"class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['c_address'] )): ?>value="<?php echo $this->_tpl_vars['data']['c_address']; ?>
"<?php endif; ?>/>
				</div>
				<div class="col-sm-3 common-bottom">
					<label for="quali">Doctor's Qualification</label>
					<input type="text" name="quali" id="quali"class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['quali'] )): ?>value="<?php echo $this->_tpl_vars['data']['quali']; ?>
"<?php endif; ?>/>
				</div>
				<div class="col-sm-3 common-bottom">
					<label for="exprience">Doctor's Experience</label>
					<input type="number" name="exprience" id="exprience"class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['exprience'] )): ?>value="<?php echo $this->_tpl_vars['data']['exprience']; ?>
"<?php endif; ?>/>
				</div>
				<div class="col-md-3 common-bottom">
					<label for="specialist">Specialist</label>
					<input type="text" name="specialist" id="specialist"class="form-control" <?php if (( isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']['specialist'] )): ?>value="<?php echo $this->_tpl_vars['data']['specialist']; ?>
"<?php endif; ?> />
				</div>
			</div>
			<input type="hidden" name="profile_img" id="profile_img">

		</form>
		<div class="row">
			<form>
				<div class="col-md-6">
					<div class="file-field input-field" style="margin-top: 25px;">
						<div class="btn btn-primary" id="pro-file-upload"> <span>Profile photo</span>
							<input type="file" id="upload">	
						</div>
					</div>
				</div>
				<div class="col-md-6" >
					<img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
<?php echo $this->_tpl_vars['data']['profile_img']; ?>
" id="preveiw_image" width="30%" alt="">
					<div id="upload-demo" style="width:300px">
					</div>
					<button id="upload-demo-btn"  class="btn upload-result" type="button">Crop Image</button>
					<div id="upload-demo-i">	
					</div>
				</div>
			</form>
		</div>

		<div class="row">
			<div class="col-sm-4 common-bottom" style="padding-top: 25px;">
				<input type="submit" name="submit" id="submit" class="btn btn-primary"/>
			</div>
		</div>
	</fieldset>
</div><!-- #content -->


<?php echo '
<script type="text/javascript">
	$(document).ready(function()
	{
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

  	debugger
  	$(\'#upload-demo\').show();
  	$(\'#upload-demo-btn\').show();
  	var reader = new FileReader();
  	reader.onload = function (e) {
  		debugger
  		$uploadCrop.croppie(\'bind\', {
  			url: e.target.result
  		}).then(function(){
  			console.log(e.target.result);
  			debugger;
  			$(\'#preveiw_image\').remove();
  			console.log(\'jQuery bind complete\');
  		});

  	}
  	reader.readAsDataURL(this.files[0]);
  	debugger;
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

});


</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>