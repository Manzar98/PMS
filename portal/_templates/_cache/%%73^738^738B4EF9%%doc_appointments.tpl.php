<?php /* Smarty version 2.6.31, created on 2018-12-28 19:54:37
         compiled from appointments/doc_appointments.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', 'appointments/doc_appointments.tpl', 116, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/css/timedropper.css" /> 
<div id="" class="content-wrapper">
	<div class="container-fluid">
		<div id="preloader" class="Fixed">
			<div data-loader="circle-side"></div>
		</div>
		<!-- /Preload-->
		<?php if (isset ( $this->_tpl_vars['appointmentFull'] )): ?>
		<div class="alert alert-success alert-dismissible fade show mx-auto my-3" role="alert" style="width: 50%">
			<strong><?php echo $this->_tpl_vars['appointmentFull']; ?>
</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		<?php endif; ?>
		<?php if (isset ( $this->_tpl_vars['data'] ) && $this->_tpl_vars['data']): ?>
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
">Dashboard</a>
				</li>
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
list-appointments/<?php echo $_SESSION['AdminId']; ?>
/">Appointments</a>
				</li>
				<li class="breadcrumb-item active">Get Appointment</li>
			</ol>
		</div>
		<!-- /breadcrumb -->
		<!-- The actual snackbar -->
		<div id="snackbar"></div>
		<div class="container margin_60">
			<div class="row">
				<div class="col-xl-8 col-lg-8">
					<nav id="secondary_nav">
						<div class="container">
							<ul class="clearfix">
								<li><a href="#section_1" class="active">General info</a></li>
								<li><a href="#section_2">Reviews</a></li>
								<li><a href="#sidebar">Booking</a></li>
							</ul>
						</div>
					</nav>
					<div id="section_1">
						<input type="hidden" name="" id="doc_name" value="<?php echo $this->_tpl_vars['data']['F_name']; ?>
 <?php echo $this->_tpl_vars['data']['L_name']; ?>
">
						<input type="hidden" name="" id="doc_id" value="<?php echo $this->_tpl_vars['data']['id']; ?>
">
						<div class="box_general_3">
							<div class="profile">
								<div class="row">
									<div class="col-lg-5 col-md-4">
										<figure>
											<img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
<?php echo $this->_tpl_vars['data']['profile_img']; ?>
" alt="" class="img-fluid">
										</figure>
									</div>
									<div class="col-lg-7 col-md-8">
										<!-- <small>Primary care - Internist</small> -->
										<h1>DR. <?php echo $this->_tpl_vars['data']['F_name']; ?>
 <?php echo $this->_tpl_vars['data']['L_name']; ?>
</h1>
										<span class="rating">
											<i class="icon_star voted fa fa-star" aria-hidden="true"></i>
											<i class="icon_star voted fa fa-star" aria-hidden="true"></i>
											<i class="icon_star voted fa fa-star" aria-hidden="true"></i>
											<i class="icon_star voted fa fa-star" aria-hidden="true"></i>
											<i class="icon_star fa fa-star" aria-hidden="true"></i>
											<small>(145)</small>
											<a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
										</span>
										<ul class="statistic">
											<li>854 Views</li>
											<li><?php echo $this->_tpl_vars['noOfPatients']; ?>
 Patients</li>
										</ul>
										<ul class="contacts">
											<li>
												<h6>Fee</h6>
												Rs. <?php echo $this->_tpl_vars['data']['c_fee']; ?>
 
											</li>
											<li>
												<h6>Address</h6>
												<?php echo $this->_tpl_vars['data']['c_address']; ?>

											</li>
											<li>
												<h6>Phone</h6> <a href="tel://<?php echo $this->_tpl_vars['data']['phone']; ?>
" style="color: #e74e84;"><?php echo $this->_tpl_vars['data']['phone']; ?>
</a></li>
											</ul>
										</div>
									</div>
								</div>
								<hr>

								<!-- /profile -->
								<div class="indent_title_in">
									<i class="fa fa-user-circle-o" aria-hidden="true"></i>
									<h3>Info</h3>
								</div>
								<div class="wrapper_indent">
									<div class="row pb-3">
										<div class="col-lg-6">
											<div class="pb-3">
												<span><b>Email Address : </b><span><?php echo $this->_tpl_vars['data']['email']; ?>
</span></span>
											</div>
											<div class="pb-3">								<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
												<?php if ($this->_tpl_vars['data']['city'] == $this->_tpl_vars['city']['id']): ?>	
												<span><b>City : </b><span class="capitalize"><?php echo $this->_tpl_vars['city']['name']; ?>
</span></span>
												<?php endif; ?>
												<?php endforeach; endif; unset($_from); ?>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="pb-3">
												<span><b>Experience : </b><span><?php echo $this->_tpl_vars['data']['exprience']; ?>
 Years</span></span>
											</div>
											<div class="pb-3">
												<span><b>Qualification : </b><span class="capitalize"><?php echo $this->_tpl_vars['data']['quali']; ?>
</span></span>
											</div>
										</div>
									</div>
									<h6>Specializations</h6>
									<div class="row">
										<div class="col-lg-8">
											<?php $this->assign('foo', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['data']['specialist']) : explode($_tmp, $this->_tpl_vars['data']['specialist']))); ?>
											<ul class="bullets mt-2 specializationWrap">
												<?php $_from = $this->_tpl_vars['foo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
												<li><i class="fa fa-dot-circle-o" aria-hidden="true" style="margin-right:5px;color: #CCCCCC "></i><?php echo $this->_tpl_vars['v']; ?>
</li>
												<?php endforeach; endif; unset($_from); ?>
											</ul>
										</div>
									</div>
									<!-- /row-->
									<!-- /row-->
								</div>
								<!-- /wrapper indent -->
							</div>
							<!-- /section_1 -->
						</div>
						<!-- /box_general -->
						<div id="section_2">
							<div class="box_general_3">
								<div class="reviews-container">
									<div class="row">
										<div class="col-lg-3">
											<div id="review_summary">
												<strong>4.7</strong>
												<div class="rating">
													<i class="icon-star voted"></i><i class="icon_star voted fa fa-star" aria-hidden="true"></i><i class="icon_star voted fa fa-star" aria-hidden="true"></i><i class="icon_star voted fa fa-star" aria-hidden="true"></i><i class="icon_star fa fa-star" aria-hidden="true"></i>
												</div>
												<small>Based on 4 reviews</small>
											</div>
										</div>
										<div class="col-lg-9">
											<div class="row">
												<div class="col-lg-10 col-9">
													<div class="progress">
														<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
												<div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
											</div>
											<!-- /row -->
											<div class="row">
												<div class="col-lg-10 col-9">
													<div class="progress">
														<div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
												<div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
											</div>
											<!-- /row -->
											<div class="row">
												<div class="col-lg-10 col-9">
													<div class="progress">
														<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
												<div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
											</div>
											<!-- /row -->
											<div class="row">
												<div class="col-lg-10 col-9">
													<div class="progress">
														<div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
												<div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
											</div>
											<!-- /row -->
											<div class="row">
												<div class="col-lg-10 col-9">
													<div class="progress">
														<div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
												<div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
											</div>
											<!-- /row -->
										</div>
									</div>
									<!-- /row -->

									<hr>

									<div class="review-box clearfix">
										<figure class="rev-thumb"><img src="img/avatar1.jpg" alt="">
										</figure>
										<div class="rev-content">
											<div class="rating">
												<i class="icon-star voted"></i><i class="icon_star voted fa fa-star" aria-hidden="true"></i><i class="icon_star voted fa fa-star" aria-hidden="true"></i><i class="icon_star voted fa fa-star" aria-hidden="true"></i><i class="icon_star fa fa-star" aria-hidden="true"></i>
											</div>
											<div class="rev-info">
												Admin – April 03, 2016:
											</div>
											<div class="rev-text">
												<p>
													Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
												</p>
											</div>
										</div>
									</div>
									<!-- End review-box -->

									<div class="review-box clearfix">
										<figure class="rev-thumb"><img src="img/avatar2.jpg" alt="">
										</figure>
										<div class="rev-content">
											<div class="rating">
												<i class="icon-star voted"></i><i class="icon_star voted fa fa-star" aria-hidden="true"></i><i class="icon_star voted fa fa-star" aria-hidden="true"></i><i class="icon_star voted fa fa-star" aria-hidden="true"></i><i class="icon_star fa fa-star" aria-hidden="true"></i>
											</div>
											<div class="rev-info">
												Ahsan – April 01, 2016
											</div>
											<div class="rev-text">
												<p>
													Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
												</p>
											</div>
										</div>
									</div>
									<!-- End review-box -->

									<div class="review-box clearfix">
										<figure class="rev-thumb"><img src="img/avatar3.jpg" alt="">
										</figure>
										<div class="rev-content">
											<div class="rating">
												<i class="icon-star voted"></i><i class="icon_star voted fa fa-star" aria-hidden="true"></i><i class="icon_star voted fa fa-star" aria-hidden="true"></i><i class="icon_star voted fa fa-star" aria-hidden="true"></i><i class="icon_star fa fa-star" aria-hidden="true"></i>
											</div>
											<div class="rev-info">
												Sara – March 31, 2016
											</div>
											<div class="rev-text">
												<p>
													Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
												</p>
											</div>
										</div>
									</div>
									<!-- End review-box -->
								</div>
								<!-- End review-container -->
							</div>
						</div>
						<!-- /section_2 -->
					</div>
					<!-- /col -->
					<aside class="col-xl-4 col-lg-4" id="sidebar">
						<div class="box_general_3 booking">
							<form  id="add_user" class="" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
								<div class="title">
									<h3>Make an Appointment</h3>
									<small>Monday to Friday 09.00am-06.00pm</small>
								</div>
								<input type="hidden" name="" value="<?php echo $this->_tpl_vars['unavail']; ?>
" id="unavail">
								<input type="hidden" name="" value="<?php echo $this->_tpl_vars['from']; ?>
" id="from"> 
								<input type="hidden" name="" value="<?php echo $this->_tpl_vars['to']; ?>
" id="to">
								<input type="hidden" name="ap_number" id="ap_number"> 

								<input type="hidden" name="doc_name" value="<?php echo $this->_tpl_vars['data']['F_name']; ?>
 <?php echo $this->_tpl_vars['data']['L_name']; ?>
" id="doc_name">
								<input type="hidden" name="doc_adr" value="<?php echo $this->_tpl_vars['data']['c_address']; ?>
" id="doc_adr">
								<input type="hidden" name="doc_phne" value="<?php echo $this->_tpl_vars['data']['phone']; ?>
" id="doc_phne">
								<input type="hidden" name="u_id" value="<?php echo $this->_tpl_vars['data']['id']; ?>
" id="id">
								<input type="hidden" name="package_id" id="package_id" class="package_id" value="<?php echo $this->_tpl_vars['data']['package_id']; ?>
"/>
								<input type="hidden" name="online_manual" id="online_manual" value="manual">
								<input type="hidden" name="pat_id" id="patient_id">
								<input type="hidden" name="security_key" id="security_key">
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<input class="form-control" type="text" id="booking_date" data-lang="en" data-min-year="2017" data-max-year="2020" data-disabled-days="10/17/2017,11/18/2017" name="dt">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input class="form-control" type="text" id="booking_time" value="9:00 am" name="hour">
										</div>
									</div>
								</div>
								<!-- /row -->
								<div class="row" style="border-top: 1px dotted #ddd;
								border-bottom: none;">
								<div class="col-6 pt-3">
									<label for="dt" class="">Patient Id</label>
									<input type="text" name="p_id" id="p_id" class="p_id form-control" />
								</div>
								<div class="col-6 pt-3">
									<label for="dt" class="">Security Key</label>
									<input type="text" name="security_key" id="sec_key" class="form-control" />
									<a  href="#" data-toggle="modal" data-target="#forgetModal" class="pt-1 ftSecKey" style="font-size: 11px;">Forget Security Key?</a>
								</div>

							</div>  

							<div class="row text-center my-3" style="border-top: 1px dotted #ddd;border-bottom: none;">
								<div class="col-6  pt-3">
									<input type="button" class="btn btn-primary" id="existSearch" name="" value="Search">
								</div>
								<div class="col-6 pt-3">
									<a href="javascript:void(0)" class="btn btn-primary" id="add_patient">New Patient</a>
								</div>
							</div>
							<div id="add_new_patient" style="display: none; clear:both; border-top: 1px dotted #ddd;border-bottom: none;" class="pt-3">
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="name">Patient Name</label>
											<input type="text" name="name" id="name" maxlength="50" class="form-control e_name" onclick="generateRandomNumber()"/>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group disWrap">
											<div class="AddDisSelect"></div>
											<label for="gender">Gender</label>
											<select name="gender" id="gender" class="form-control e_gender">
												<option value="male" <?php if ($this->_tpl_vars['data']['gender'] == 'male'): ?> selected="selected" <?php endif; ?>>Male</option>
												<option value="female" <?php if ($this->_tpl_vars['data']['gender'] == 'female'): ?> selected="selected" <?php endif; ?>>Female</option>
												<option value="other" <?php if ($this->_tpl_vars['data']['gender'] == 'other'): ?> selected="selected" <?php endif; ?>>Other</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="dob">Date of Birth</label>
											<input type="text" name="dob" id="dob" value="<?php echo $this->_tpl_vars['data']['dob']; ?>
" autocomplete="off" class="form-control e_dob"/>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group disWrap">
											<div class="AddDisSelect"></div>
											<label for="marital_status">Marital Status</label>
											<select name="marital_status" id="marital_status" class="form-control e_marital_status">
												<option value="married">Married</option>
												<option value="unmarried" >Unmarried</option>
												<option value="widow">Widow</option>
												<option value="divorced">Divorced</option>
												<option value="seperated">Seperated</option>
											</select> 
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="mobile">Mobile</label>
											<input type="text" name="mobile" id="mobile"maxlength="50" class="form-control e_mobile"/>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="address">Address</label>
											<textarea  name="address" id="address" class="form-control e_address" style="height: 40px;"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group disWrap">
											<div class="AddDisSelect"></div>
											<label for="city">City</label>
											<select name="city" id="city" class="form-control e_city">
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
									<div class="col-6">
										<div class="form-group">
											<label for="email">Email Address</label>
											<input type="email" name="email"
											id="email" class="form-control e_email">
										</div>
									</div>
								</div>
							</div>
							<!-- /row -->
							<hr>
							<input type="submit" name="" class="btn_1 full-width" value="Book Now">
						</form>
					</div>
					<!-- /box_general -->
				</aside>
				<!-- /asdide -->
			</div>
			<!-- /row -->
			<!-- Modal -->
			<div class="modal fade" id="forgetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title text-center" id="exampleModalLongTitle">Forget Security Key</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div id="sec_key_response" class="mx-auto py-2">

							</div>
							<form>
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label for="dt" class="">Patient Id</label>
											<input type="text" name="p_id" id="sendPatId" class="p_id form-control" />
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label for="email">Email Address</label>
											<input type="email" name="email"
											id="sendEmail" class="form-control e_email" onclick="generateRandomNumber()"> 
										</div>
									</div>
								</div>
								<div class="row">
									<button type="button" class="btn btn-primary mx-auto" id="sendSecKey">Send</button>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /container -->
<div class="row" style="margin-top: 10px;">
	<div class="col-sm-8"></div>
	<div class="col-sm-2 common-bottom" >
		<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
add-appointment/?doc_id=<?php echo $this->_tpl_vars['data']['id']; ?>
&doc_name=<?php echo $this->_tpl_vars['data']['F_name']; ?>
 <?php echo $this->_tpl_vars['data']['L_name']; ?>
 &doc_adr=<?php echo $this->_tpl_vars['data']['c_address']; ?>
&doc_phne=<?php echo $this->_tpl_vars['data']['phone']; ?>
&img=<?php echo $this->_tpl_vars['data']['profile_img']; ?>
&speciallist=<?php echo $this->_tpl_vars['data']['specialist']; ?>
&pkgId=<?php echo $this->_tpl_vars['data']['package_id']; ?>
&exprience=<?php echo $this->_tpl_vars['data']['exprience']; ?>
&fee=<?php echo $this->_tpl_vars['data']['c_fee']; ?>
&exist=patient" class="btn btn-primary">Get Appointment</a>
	</div>
	<div class="col-sm-1"  >
		<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
history/" class="btn btn-primary">Veiw History</a>
	</div>
</div>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/js/select2.js"></script>
<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/js/timedropper.js" type="text/javascript"></script> 
<?php echo '
<style type="text/css">
.diswrap{
	position: relative;
}
.disabledSelect{
	width: 81%;
	height: 40px;
	background-color: #DDD;
	opacity: 0.5;
	position: absolute;
	top: 27px;
	border-radius: 3px;
}
.specializationWrap li{
	display: inline-block;
	width: 49%;
	margin-bottom: 5px;
}
#secondary_nav {
	background-color: #3f4079;
	position: relative;
	bottom: -3px;
	border-bottom: none;
	-webkit-border-radius: 5px 5px 0 0;
	-moz-border-radius: 5px 5px 0 0;
	-ms-border-radius: 5px 5px 0 0;
	border-radius: 5px 5px 0 0;
	padding: 15px;
}
#secondary_nav ul {
	margin: 0;
}
#secondary_nav ul li {
	display: inline-block;
	font-weight: 500;
	font-size: 16px;
	font-size: 1rem;
	margin-right: 25px;
}
#secondary_nav ul li a.active, #secondary_nav ul li a:hover {
	color: #fff;
}
#secondary_nav ul li a {
	color: #74d1c6;
}
.box_general_3 {
	background-color: #fff;
	padding: 30px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	margin-bottom: 15px;
	border: 1px solid #e1e8ed;
}

.booking .title{
	background-color:#3f4079;
	color:#fff;
	margin:-30px -30px 30px;
	padding:20px 30px;
	border-radius:5px 5px 0 0
}
.booking .title h3{
	font-size:28px;
	font-size:1.75rem;
	margin:0;
	color:#fff !important;
}
.booking .title small{
	font-size:13px;
	font-size:.8125rem
}
.booking hr{
	margin-top:15px!important
}
.booking ul.treatments{
	margin:15px 0 0
}
.booking ul.treatments li{
	border-top:1px dotted #ddd;
	border-bottom:none;
	width:100%;
	margin:0;
	padding:12px 0 5px
}
#secondary_nav ul li:last-child {
	display: none;
	margin-right: 0;
}
.profile h1 {
	font-size: 24px;
	font-size: 1.5rem;
}
.profile .rating {
	margin-bottom: 15px;
	display: inline-block;
}
.profile small {
	color: #999;
	font-weight: 600;
}
.profile ul.statistic {
	padding-bottom: 5px;
	margin-bottom: 15px;
	padding-left: 0;
}
.profile ul.statistic li {
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-ms-border-radius: 3px;
	border-radius: 3px;
	line-height: 1;
	color: #fff;
	padding: 8px 10px 5px;
	font-size: 12px;
	font-size: .75rem;
	text-align: center;
}
.box_profile ul.statistic li, .profile ul.statistic li {
	background-color: #74d1c6;
	font-weight: 600;
	min-width: 95px;
	display: inline-block;
}
.profile ul.contacts {
	margin: 25px 0 0;
	padding-left: 0px;
}
.profile ul.contacts li {
	margin-bottom: 15px;
}
.profile ul.contacts li h6 {
	font-size: 14px;
	font-size: .875rem;
	margin-bottom: 3px;
}
.profile ul.contacts li:last-child {
	margin-bottom: 0;
}
.sbOptions, ol, ul, ul#cat_nav {
	list-style: none;
}
.profile {
	padding-top: 20px;
}
.box_general_3 hr {
	margin: 30px -30px;
}
.indent_title_in {
	position: relative;
	padding-left: 60px;
	margin-bottom: 20px;
}
.indent_title_in i {
	font-size: 40px;
	position: absolute;
	left: 0;
	color: #3f4079;
	top: 0;
}
.indent_title_in h3 {
	margin-bottom: 0;
	margin-top: 0;
	font-size: 21px;
}
.wrapper_indent {
	padding-left: 60px;
}
ul.bullets {
	line-height: 1.8;
	margin-bottom: 0;
}
ul.bullets li {
	position: relative;
	padding-left: 20px;
}
.btn_1:hover, a.btn_1:hover {
	background: #74d1c6;
}
.btn_1.full-width, a.btn_1.full-width {
	display: block;
	text-align: center;
	padding: 12px 45px;
	font-size: 16px;
	font-size: 1rem;
	width: 100%;
}
.btn_1, a.btn_1 {
	border: none;
	color: #fff;
	background: #e74e84;
	cursor: pointer;
	padding: 7px 20px;
	display: inline-block;
	outline: 0;
	font-size: 14px;
	font-size: .875rem;
	transition: all .3s ease-in-out;
	-webkit-border-radius: 25px;
	-moz-border-radius: 25px;
	-ms-border-radius: 25px;
	border-radius: 25px;
	font-weight: 500;
}
.btn_1, a.btn_1, header.header_sticky {
	-moz-transition: all .3s ease-in-out;
	-o-transition: all .3s ease-in-out;
	-webkit-transition: all .3s ease-in-out;
	-ms-transition: all .3s ease-in-out;
}
.rating i.voted {
	color: #FFC107;
}
#review_summary {
	text-align: center;
	background-color: #3f4079;
	color: #fff;
	padding: 20px 10px;
	border-radius: 5px;
}
#review_summary, .strip_list {
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-ms-border-radius: 5px;
}
#review_summary strong {
	font-size: 3rem;
	line-height: 1;
}
strong{

	font-weight: 600;
}
.reviews-container .progress {
	margin-bottom: 10px;
}
.progress {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	height: 1rem;
	overflow: hidden;
	font-size: .75rem;
	background-color: #e9ecef;
	border-radius: .25rem;
}
.reviews-container .progress-bar {
	background-color: #74d1c6;
}
.progress-bar {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-orient: vertical;
	-webkit-box-direction: normal;
	-ms-flex-direction: column;
	flex-direction: column;
	-webkit-box-pack: center;
	-ms-flex-pack: center;
	justify-content: center;
	color: #fff;
	text-align: center;
	background-color: #007bff;
	transition: width .6s ease;
}
.reviews-container .rev-info {
	font-size: .75rem;
	font-style: italic;
	color: #777;
	margin-bottom: 10px;
}
.ftSecKey{
	color: #e74e84;
}
</style>
<script type="text/javascript">
	$(document).ready(function()
	{
		$(\'#booking_date\').dateDropper();
		$(\'#booking_time\').timeDropper();
		
		// 	$(\'#forgetModal\').modal({
		// 		backdrop: false

		// })
		$("#city").select2({
                    // placeholder: "Select a State",
                    allowClear: true
                });

		$(\'#existSearch\').click(function(){
			debugger
			var pat_id = $(\'#p_id\').val();
			var doc_name = $(\'#doc_name\').val();
			var doc_id = $(\'#doc_id\').val();
			var sec_key = $(\'#sec_key\').val();

			if (pat_id!="" && sec_key!="") {
				$.ajax({
					type: \'POST\',
					url:\''; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
doc-appointments?ajax=y<?php echo '\',
					data: \'p_id=\'+pat_id+\'&doc_id=\'+doc_id+\'&doc_name=\'+doc_name+\'&sec_key=\'+sec_key,
					success:function(msg){
						// debugger;
						var res =JSON.parse(msg);
						// debugger
						if (res.status==true) {
							$("#add_new_patient").show();
							$(\'.e_name\').val(res.msg.name);
							$(\'.e_name\').prop(\'readonly\',true);
							$(\'.e_gender\').val(res.msg.gender);
							$(\'.e_gender\').prop(\'readonly\',true);
							$(\'.e_dob\').val(res.msg.dob);
							$(\'.e_dob\').prop(\'readonly\',true);
							$(\'.e_marital_status\').val(res.msg.marital_status);
							$(\'.e_marital_status\').prop(\'readonly\',true);
							$(\'.e_mobile\').val(res.msg.mobile);
							$(\'.e_mobile\').prop(\'readonly\',true);
							$(\'.e_address\').val(res.msg.address);
							$(\'.e_address\').prop(\'readonly\',true);
							$(\'.e_email\').val(res.msg.email);
							$(\'.e_email\').prop(\'readonly\',true);
							$(\'#patient_id\').val(res.msg.id)
							$(\'#security_key\').val(res.msg.security_key);
							$(\'.e_city option[value="\'+res.msg.city_id+\'"]\').prop("selected",true);
							$(\'.AddDisSelect\').addClass(\'disabledSelect\');
							$(\'.e_city\').select2().trigger(\'change\');
						}else{

							$(\'#p_id\').val(\'\');
							$(\'#sec_key\').val(\'\');

							$(\'#snackbar\').text(res.msg);
							var x = $("#snackbar");
							x.addClass(\'show\');
                            // After 3 seconds, remove the show class from DIV
                            setTimeout(function(){ x.removeClass(\'show\'); }, 3000);
                        }
                    }
                })
			}
		})

		$("#add_patient").click(function(){
			
			if ($(\'.e_name\').val()=="") {
				$("#add_new_patient").toggle();
			}
			$(\'.AddDisSelect\').removeClass(\'disabledSelect\')
			$(\'#p_id\').val(\'\');
			$(\'#patient_id\').val(\'\');
			$(\'#security_key\').val(\'\');
			$(\'#add_new_patient input\').val(\'\');
			$(\'.e_name\').prop(\'readonly\',false);
			$(\'.e_gender\').prop(\'readonly\',false);
			$(\'.e_marital_status\').prop(\'readonly\',false);
			$(\'.e_dob\').prop(\'readonly\',false);
			$(\'.e_mobile\').prop(\'readonly\',false);
			$(\'.e_address\').prop(\'readonly\',false);
			$(\'.e_email\').prop(\'readonly\',false);
		});
		
		var unavail=  $(\'#unavail\').val().split(\',\');
		var fromDate=  $(\'#from\').val().split(\',\');
		var toDate=  $(\'#to\').val().split(\',\');
		var today = new Date();
		var doc_id= $(\'#id\').val();
		debugger
		var selected_Date="";
		var count="";
		// 	// var check_in = [[fromDate[7], toDate[7]]];
		var start = new Date(fromDate[7]),
		end = new Date(toDate[7]),
		currentDate = new Date(start.getTime()),
		between = []
		while (currentDate <= end) {
			between.push((currentDate.getMonth()+1)+"/"+currentDate.getDate()+"/"+currentDate.getFullYear());
			currentDate.setDate(currentDate.getDate() + 1);

		}
		$(\'#booking_date\').attr( \'data-disabled-days\',between.toString())
		$("#dateRendering").html(\'<input class="form-control" type="text" id="booking_date" data-lang="en" data-min-year="2017" data-max-year="2020" data-disabled-days="\'+between.toString()+\'" name="dt" >\');
		$(\'#booking_date\').dateDropper();

		var weekday=new Array(7);
		weekday[0]="mon_on";
		weekday[1]="Tue_on";
		weekday[2]="Wed_on";
		weekday[3]="Thu_on";
		weekday[4]="Fri_on";
		weekday[5]="Sat_on";
		weekday[6]="Sun_on";

		$(\'#booking_date\').on("change",function(){
			debugger;
			var date = new Date($(this).val());
			var disabledDate= $(this).val();
			var dayOfWeek = weekday[date.getUTCDay()];
				//debugger;
				  // dayOfWeek is then a string containing the day of the week
				  $.ajax({
				  	type: "POST",
				  	url: "'; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
doc-appointments?ejax=y<?php echo '",
				  	data: "d_Str=" + dayOfWeek +"&doc_id="+doc_id ,
				  	success: function(msg) 
				  	{
				  		var time_st="";
				  		var time_end="";
				  		if (msg!="") {
				  			var res=JSON.parse(msg);
				  			time_st=res.start;
				  			time_end=res.end;
				  			count=res.count;
				  		}else{ 
				  			$(\'#booking_date\').val(\'\');
				  			
				  			$(\'#snackbar\').text(\'Doctor is not available on the selected date.\');
				  			var x = $("#snackbar");
				  			x.addClass(\'show\');
                            // After 3 seconds, remove the show class from DIV
                            setTimeout(function(){ x.removeClass(\'show\'); }, 3000);
                            
                        }
                    }
                });
				})

		$(\'#sendSecKey\').click(function(){
			var id =$(\'#sendPatId\').val();
			var email =$(\'#sendEmail\').val();
			var secKey =$(\'#security_key\').val();
			var doc_id = $(\'#doc_id\').val();
			var doc_name = $(\'#doc_name\').val();
			debugger
			if (id!="" && email!="") {
				$.ajax({
					type: "POST",
					url:"{'; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
doc-appointments?yjax=x<?php echo '}",
					data:"pat_id=" + id +"&doc_id="+doc_id+"&email="+email+"&sec_key="+secKey+"&doc_name="+doc_name,
					success:function(msg){

						var res= JSON.parse(msg);

						if (res.status==true) {

							$(\'#sec_key_response\').html(\'<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>\'+res.msg+\'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>\')
							setTimeout(function() {
								$(".alert").alert(\'close\');
							}, 2000);
						}else{

							$(\'#sec_key_response\').html(\'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>\'+res.msg+\'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>\')
							setTimeout(function() {
								$(".alert").alert(\'close\');
							}, 2000);
							$(\'#sendPatId\').val(\'\');
							$(\'#sendEmail\').val(\'\');
							$(\'#security_key\').val(\'\');
						}
					}
				})
			}
		});

	});
function generateRandomNumber(){

	var d=new Date();
	var n=d.getTime();
	n = n.toString()
	m=n.substring(9,14)
	$(\'#security_key\').val(m);
}

</script>
<noscript>
	<style type="text/css">
	.pagecontainer {display:none;}
</style>
<div class="noscriptmsg">
	You don\'t have javascript enabled.  Good luck with that.
</div>
</noscript>
'; ?>

