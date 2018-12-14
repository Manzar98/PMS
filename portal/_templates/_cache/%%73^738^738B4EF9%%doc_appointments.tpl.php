<?php /* Smarty version 2.6.31, created on 2018-12-10 17:27:12
         compiled from appointments/doc_appointments.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 

<div id="" class="clientWrap content-wrapper">
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
list-appointments/<?php echo $_SESSION['AdminId']; ?>
/">Appointments</a>
				</li>
				<li class="breadcrumb-item active">Get Appointment</li>
				
			</ol>
		</div>

		<input type="hidden" name="" value="<?php echo $this->_tpl_vars['exist_appoint']; ?>
" id="exist_appoint">
		<input type="hidden" name="" value="<?php echo $this->_tpl_vars['appointmentFull']; ?>
" id="appointmentFull">
		<?php if (isset ( $this->_tpl_vars['printslip'] ) && $this->_tpl_vars['printslip']): ?>
		<div class="appoint_Wrap"> 

			<div class="common-bottom text-center" style="margin-bottom: 40px;">
				<h4><b>APPOINTMENT CONFIRMATION</b></h4>
			</div>
			<div class="noprint btnW">
				<input type="button"class="btn btn-primary printBtn pull-right" value="Print" id="printPrescription">
			</div>
			<div class="row common-bottom">
				<div class="col-sm-10">
					<div class="ac">
						<span><b>Patient Name : </b><span><?php echo $this->_tpl_vars['printslip']['name']; ?>
</span></span>
					</div>
					<div class="ac">

						<span><b>Patient Id : </b><span><?php echo $this->_tpl_vars['printslip']['pat_id']; ?>
</span></span>

					</div>
					<div class="ac">
						<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
						<?php if ($this->_tpl_vars['printslip']['city_id'] == $this->_tpl_vars['city']['id']): ?>
						<span><b>City : </b><span><?php echo $this->_tpl_vars['city']['name']; ?>
</span></span>
						<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
					</div> 
					<div class="ac">
						<span><b>Address : </b><span><?php echo $this->_tpl_vars['printslip']['address']; ?>
</span></span>
					</div>
					<div class="ac">
						<span><b>Mobile No : </b><span><?php echo $this->_tpl_vars['printslip']['mobile']; ?>
</span></span>
					</div>
					<div class="ac">
						<span><b>Gender : </b><span><?php echo $this->_tpl_vars['printslip']['gender']; ?>
</span></span>
					</div>
					<div class="ac"><span><b>Email : </b><span><?php echo $this->_tpl_vars['printslip']['email']; ?>
</span></span></div>
				</div>
				<div class="col-sm-2">
					<div width="100" height="100" style="border: 1px solid;"></div>
				</div>
			</div>
			<div class="row common-bottom bor">
				<div class="col-sm-8">
					<div class="common-bottom common-top">
						<span class="common-bottom"><b>Appointment No : </b><span><?php echo $this->_tpl_vars['printslip']['ap_number']; ?>
</span></span>
					</div>
					<div class="common-bottom">
						<span class="common-bottom"><b>Appointment Date : </b><span><?php echo $this->_tpl_vars['printslip']['ap_date']; ?>
</span></span>
					</div>
					<div class="common-bottom">
						<span class="common-bottom"><b>Appointment Time : </b><span><?php echo $this->_tpl_vars['printslip']['ap_time']; ?>
</span></span>
					</div>
				</div>
				<div class="col-sm-4 ">
					<div class="docInfo">
						<div class="common-bottom">
							<span class="doci"><b>Doctor's Name : </b><span><?php echo $this->_tpl_vars['printslip']['doc_name']; ?>
</span></span>
						</div>
						<div class="common-bottom">
							<span class="doci"><b>Clinic Phone Number: </b><span><?php echo $this->_tpl_vars['printslip']['doc_phne']; ?>
</span></span> 
						</div>
						<div class="common-bottom">
							<span class="doci" ><b>Clinic Address : </b><span><?php echo $this->_tpl_vars['printslip']['doc_adr']; ?>
</span></span>
						</div>
					</div> 
				</div>
			</div>
			<div class="note" style=" " >
				<p class="text-center common-bottom not_p">
					Note: Please reach the clinic on time otherwise your appointment would be cancelled.
				</p>
				<p class="text-center doci">idoctor.pk</p>
			</div>
		</div>
		<?php elseif (isset ( $this->_tpl_vars['record'] ) && record): ?>

		<div class="alertWrap" title="Errors"></div>
		<form id="add_user" class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
			<fieldset>
				<legend>Appointments</legend>
				<div class="container doctorStyleCard mb-5">
					<div class="row" style="padding: 10px;    padding-top: 20px;">
						<div class="col-sm-2"> 
							<img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
<?php echo $_GET['img']; ?>
" alt=""  class="img-responsive">
						</div>
						<div class="col-sm-6 pt-3" style="margin-left: 20px;">
							<h4 style="margin-bottom: 30px;">Dr. <?php echo $_GET['doc_name']; ?>
</h4>
							<div style="margin-bottom: 12px;">
								<span class="text-center"><?php echo $_GET['speciallist']; ?>
</span>
							</div>
							<span><?php echo $_GET['doc_adr']; ?>
</span>
						</div>
						<div class="col-sm-3 pull-right expri-div">
							<div style="margin-bottom: 12px;">
								<span class="text-center"><i class="fa fa-star-o" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $_GET['exprience']; ?>
 Years of Exprience</span></div>
								<span><i class="fa fa-money" aria-hidden="true"></i>&nbsp;&nbsp;Rs. <?php echo $_GET['fee']; ?>
</span>
							</div>
						</div>
					</div>	
					<div>
						<input type="hidden" name="doc_name" value="<?php echo $_GET['doc_name']; ?>
" id="doc_name">
						<input type="hidden" name="doc_adr" value="<?php echo $_GET['doc_adr']; ?>
" id="doc_adr">
						<input type="hidden" name="doc_phne" value="<?php echo $_GET['doc_phne']; ?>
" id="doc_phne">
						<input type="hidden" name="u_id" value="<?php echo $_GET['doc_id']; ?>
" id="id"> 
						<input type="hidden" name="" value="<?php echo $this->_tpl_vars['unavail']; ?>
" id="unavail"> 
						<input type="hidden" name="p_id" value="" id="" placeholder="For Condition true(input for condition only)"> 
						<input type="hidden" name="" value="<?php echo $this->_tpl_vars['from']; ?>
" id="from"> 
						<input type="hidden" name="" value="<?php echo $this->_tpl_vars['to']; ?>
" id="to">
						<input type="hidden" name="ap_number" id="ap_number"> 
						<input type="hidden" name="security_key" id="security_key" value="<?php echo $this->_tpl_vars['record']['security_key']; ?>
">
						<input type="hidden" name="" id="res_error" value="<?php echo $this->_tpl_vars['res_error']; ?>
">
						<input type="hidden" name="name" id="" value="<?php echo $this->_tpl_vars['record']['name']; ?>
">
						<input type="hidden" name="patient_Id" id="" value="<?php echo $this->_tpl_vars['record']['id']; ?>
">
						<input type="hidden" name="address" id="" value="<?php echo $this->_tpl_vars['record']['address']; ?>
">
						<input type="hidden" name="mobile" id="" value="<?php echo $this->_tpl_vars['record']['mobile']; ?>
">
						<input type="hidden" name="gender" id="" value="<?php echo $this->_tpl_vars['record']['gender']; ?>
">
						<input type="hidden" name="email" id="" value="<?php echo $this->_tpl_vars['record']['email']; ?>
">
						<input type="hidden" name="online_manual" id="online_manual" value="manual">
						<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
						<?php if ($this->_tpl_vars['record']['city_id'] == $this->_tpl_vars['city']['id']): ?>
						<input type="hidden" name="city" id="" value="<?php echo $this->_tpl_vars['city']['id']; ?>
">
						<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>

					</div>
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-4">	
							<div class="calendar_block">
								<input type="hidden" name="dt" id="" class="dateInput" />
								<div class="text-center datetimeHeading"> 
									<span>Select Date</span>
								</div>
								<div class="dt">

								</div>
							</div>
						</div>
						<div class="col-sm-4 common-bottom ">
							<div class="hideHr">

								<div class="timeWrap">
									<div class="text-center timeHeading">
										<span>Select Hour</span>
									</div>
								</div>
								<input type="text" name="hour"  class="form-control" id="hour"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
							<div style="margin-top: 24px;">
								<input type="submit" name="submit" id="submit" value="Book Appointment" class="btn btn-primary form-control" />
							</div>
						</div>
					</div>
				</fieldset>
			</form>
			<?php elseif (isset ( $_GET['exist'] )): ?>

			<input type="hidden" name="" value="<?php echo $this->_tpl_vars['erorMsg']; ?>
" id="errorId">
			<form id="check_patient" class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
				<fieldset>
					<legend>Get Appointment</legend>

					<div class="row">
						<div class="col-sm-6 mx-auto">
							<div class="form-group">
								<input type="hidden" name="doc_id" id="doc_id" class="doc_id form-control" value="<?php echo $_GET['doc_id']; ?>
"/>
								<input type="hidden" name="doc_name" id="doc_name" class="doc_name form-control" value="<?php echo $_GET['doc_name']; ?>
" />
								<label for="dt" class="">Patient Id</label>
								<input type="number" name="p_id" id="p_id" class="p_id form-control"/>
							</div>
						</div>
					</div>
					<div class="form-row my-3">
						<div class="col-sm-3"></div>
						<div class="col">
							<input type="submit" class="btn btn-primary form-control" value="Search" />
						</div>
						<div class="col">
							<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
doc-appointments/<?php echo $_GET['doc_id']; ?>
?doc_name=<?php echo $_GET['doc_name']; ?>
&doc_adr=<?php echo $_GET['doc_adr']; ?>
&doc_phne=<?php echo $_GET['doc_phne']; ?>
&img=<?php echo $_GET['img']; ?>
&speciallist=<?php echo $_GET['speciallist']; ?>
&exprience=<?php echo $_GET['exprience']; ?>
&fee=<?php echo $_GET['fee']; ?>
" class="btn btn-primary form-control" role="button">New Patient</a>
						</div>
						<div class="col-sm-3"></div>
					</div>
				</fieldset>
			</form>
			<?php else: ?>
			<div class="alertWrap" title="Errors"></div>
			<form id="add_user" class="box style" action="<?php echo $_SERVER['REQUEST_URI']; ?>
" method="post">
				<fieldset>
					<legend>Appointments</legend>
					<div class="container doctorStyleCard  mb-5">
						<div class="row" style="padding: 10px;    padding-top: 20px;">
							<div class="col-sm-2"> 
								<img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
<?php echo $_GET['img']; ?>
" alt=""  class="img-responsive">
							</div>
							<div class="col-sm-6  pt-3" style="margin-left: 20px;">
								<h4 style="margin-bottom: 30px;">Dr. <?php echo $_GET['doc_name']; ?>
</h4>
								<div style="margin-bottom: 12px;">
									<span class="text-center"><?php echo $_GET['speciallist']; ?>
</span></div>
									<span><?php echo $_GET['doc_adr']; ?>
</span>
								</div>
								<div class="col-sm-3 pull-right expri-div">
									<div style="margin-bottom: 12px;">
										<span class="text-center"><i class="fa fa-star-o" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $_GET['exprience']; ?>
 Years of Exprience</span></div>
										<span><i class="fa fa-money" aria-hidden="true"></i>&nbsp;&nbsp;Rs. <?php echo $_GET['fee']; ?>
</span>
									</div>
								</div>
							</div>		
							<input type="hidden" name="doc_name" value="<?php echo $_GET['doc_name']; ?>
" id="doc_name">
							<input type="hidden" name="doc_adr" value="<?php echo $_GET['doc_adr']; ?>
" id="doc_adr">
							<input type="hidden" name="doc_phne" value="<?php echo $_GET['doc_phne']; ?>
" id="doc_phne">
							<input type="hidden" name="u_id" value="<?php echo $this->_tpl_vars['id']; ?>
" id="id"> 
							<input type="hidden" name="" value="<?php echo $this->_tpl_vars['unavail']; ?>
" id="unavail"> 
							<input type="hidden" name="" value="<?php echo $this->_tpl_vars['from']; ?>
" id="from"> 
							<input type="hidden" name="" value="<?php echo $this->_tpl_vars['to']; ?>
" id="to">
							<input type="hidden" name="ap_number" id="ap_number"> 
							<input type="hidden" name="security_key" id="security_key">
							<input type="hidden" name="" id="res_error" value="<?php echo $this->_tpl_vars['res_error']; ?>
">
							<input type="hidden" name="online_manual" id="online_manual" value="manual">
							<div class="row" style="margin-top: 40px; margin-bottom: 20px;">
								<div class="col-sm-2"></div>
								<div class="col-sm-4">	
									<div class="calendar_block">
										<input type="hidden" name="dt" id="" class="dateInput" />
										<div class="text-center datetimeHeading"> 
											<span>Select Date</span>
										</div>
										<div class="dt">	
										</div>
									</div>
								</div>
								<div class="col-sm-4 common-bottom ">
									<div class="hideHr">
										<div class="text-center timeHeading">
											<span>Select Hour</span>
										</div>
										<div class="timeWrap">
											<input type="text" name="hour"  class="form-control" id="hour"/>
										</div>

									</div>
								</div>
							</div>
							<div class="row mt-5">
								<div class="col-sm-2"></div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="name">Patient Name</label>
										<input type="text" name="name" id="name" maxlength="50" class="form-control" onclick="generateRandomNumber()"/>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="gender">Gender</label>
										<select name="gender" id="gender" class="form-control">
											<option value="male" <?php if ($this->_tpl_vars['data']['gender'] == 'male'): ?> selected="selected" <?php endif; ?>>Male</option>
											<option value="female" <?php if ($this->_tpl_vars['data']['gender'] == 'female'): ?> selected="selected" <?php endif; ?>>Female</option>
											<option value="other" <?php if ($this->_tpl_vars['data']['gender'] == 'other'): ?> selected="selected" <?php endif; ?>>Other</option>
										</select>
									</div>
								</div> 
							</div>
							<div class="row">
								<div class="col-sm-2"></div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="dob">Date of Birth</label>
										<input type="text" name="dob" id="dob" value="<?php echo $this->_tpl_vars['data']['dob']; ?>
" autocomplete="off" class="form-control"/>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="marital_status">Marital Status</label>
										<select name="marital_status" id="marital_status" class="form-control">
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
								<div class="col-sm-2"></div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="mobile">Mobile</label>
										<input type="text" name="mobile" id="mobile" value="<?php echo $this->_tpl_vars['data']['mobile']; ?>
" maxlength="50" class="form-control"/>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="city">City</label>
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
								<div class="col-sm-2"></div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="address">Address</label>
										<textarea  name="address" id="address" class="form-control textarea-height"><?php echo $this->_tpl_vars['data']['address']; ?>
</textarea>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="email">Email Address</label>
										<input type="email" name="email"
										id="email" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-8 mx-auto py-2">
									<div >
										<input type="submit" name="submit" id="submit" value="Book Appointment" class="btn btn-primary form-control" />
									</div>
								</div>
							</div>
						</fieldset>
					</form>
					<?php endif; ?> 
				</div><!-- #content -->
			</div>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php echo '
			<style type="text/css">
			.datetimeHeading{
				margin-bottom: 10px;
				border: 1px solid #e0e0e0;
				padding: 6px;
				background-color: #e0e0e0;
				color: #FFF;
			}
			.container.doctorStyleCard{
				margin:0 auto;
				box-shadow: 0 0 5px 5px #dcdcdc;
				border-radius: 5px;
				width: 100%;
				min-height: 150px;

			}
			.doctorStyleCard div span{
				font-size: 14px;
			}
			.calendar_block {
				box-shadow: 0 0 5px 5px #dcdcdc;
				background-color:#f9f8f8;
				border-radius: 5px;
				/*float: left;*/
			}

			.dt {
				padding:20px;
			}

			.dt .ui-widget-header {
				border:none;
				background:none;
			}

			.dt .ui-datepicker {
				border: 3px solid #FF8800;
				/*padding:10px 10px 10px;*/
			}

			.dt .ui-corner-all {
				border-radius:10px;
			}

			.dt .ui-widget-content {
				background: none;
			}

			.dt .ui-datepicker-calendar {
				color: #FF8800;
			}
			.ui-icon{
				background-color: #FF8800;
				border-radius: 9px;
			}
			.dt .ui-state-hover {
				background-color: #FF8800 !important;
				color: #FFF !important;
				/*// border-radius: 15px;*/

			}
			.ui-timepicker-list .ui-timepicker-selected{
				background-color: #FF8800 !important;
				color: #FFF !important;

			}
			.ui-timepicker-list .disabledFullhr{

				background: #6B6565 !important;
				color: #FFF !important;
				/*cursor: not-allowed;*/

			}
			.ui-timepicker-list .disabledFullhr:hover{

				background: #6B6565 !important;
				color: #FFF !important;
				cursor: not-allowed;

			}

/*.ui-datepicker-next-hover{
   background-color:#FFF !important;
	border: none !important;
	color: #f9f8f8 !important;
	}*/
	.dt .ui-datepicker-month, .ui-datepicker-year{
		background-color:#fff !important;
		border: none !important;
		color: #FF8800 !important;
	}

	.dt .ui-state-default {
		text-align:center;
		background: none;
		color: #FF8800;
		width:35px !important;
		padding:10px 0 10px 0;
		/*border: none !important;*/

	}
	.timeWrap.ShowTimingBlock div {
		display: block !important;
		position: relative !important;
		top: -7 !important;
		left: 0 !important;
		right: 0 !important;
		bottom: 0 !important;

	}
	.timeHeading{

		box-shadow: 0px 0 5px 5px #dcdcdc;
		border-radius: 5px;
		border: 1px solid #e0e0e0;
		padding: 6px;
		background-color: #e0e0e0;
		color: #FFF;
		width: 338px;
	}
	span.select2.select2-container.select2-container--default {
		width: 340px !important;
	}
	.fa-money, .fa-star-o{
		font-size: 20px;
		color: #FF8800;
	}
	.expri-div{

		margin-top: 73px;
	}

</style>
<script type="text/javascript">
	$(\'.hideHr\').hide();
	$(document).ready(function()
	{
		$("#city").select2({
                    // placeholder: "Select a State",
                    allowClear: true
                });
		$(document).on(\'click\', \'.ui-datepicker-next\', function () {
			$(".ui-datepicker-title>span").hide().show(300);
			$(".ui-datepicker-calendar").hide(\'slide\', { direction: \'right\' }, 300).show(\'slide\', { direction: \'left\' }, 300)
		})

		$(document).on(\'click\', \'.ui-datepicker-prev\', function () {
			$(".ui-datepicker-title>span").hide().show(300);
			$(".ui-datepicker-calendar").hide(\'slide\', { direction: \'left\' }, 300).show(\'slide\', { direction: \'right\' }, 300)
		})

		$("#check_patient").validate({
			rules:{
				p_id:{required: true},
			}
		});
		if ($(\'#errorId\').val()) {
			alert($(\'#errorId\').val());
		}

		if ($(\'#exist_appoint\').val()) {

			alert($(\'#exist_appoint\').val());
			$(\'#exist_appoint\').val(\'\');
		}else{
			
			$(\'#exist_appoint\').val(\'\');
		}

		if ($(\'#appointmentFull\').val()) {
			if(!alert($(\'#appointmentFull\').val())){window.history.go(-1);}
			// alert();
			// location.reload();
		}else{
			
			$(\'#appointmentFull\').val(\'\');
		}


		$("#printPrescription").click(function(){
			
			window.print();
		});

		$("#dt").attr("readonly","readonly");

		if ($(\'#res_error\').val()) {
			debugger
			var responseArray = "";
			$.each($(\'#res_error\').val().split(\',\'),function(k,val){
				debugger
				responseArray += "<li style=\'color:red;\'><i class=\'fa fa-times errordialog_x\' aria-hidden=\'true\' style=\'padding-right:10px;\'></i>"+val+"</li>";
			})
			$(\'.alertWrap\').html("<ul class=\'responseDialog\' style=\'list-style: none;padding: 0px;font-size: 14px;\'>"+responseArray+"</ul>") ;    
			$(\'.alertWrap\').dialog();

			$(\'.alertWrap\').on(\'dialogclose\', function(event) {
				history.go(-1); 
			});
		}
		$("#add_user").validate({
			rules: {
				hour: { required: true },
				dt: { required: true },
			}
		});
		// $(\'.docWrap\').remove();
		var unavail=  $(\'#unavail\').val().split(\',\');
		var fromDate=  $(\'#from\').val().split(\',\');
		var toDate=  $(\'#to\').val().split(\',\');
		var today = new Date();
		var doc_id= $(\'#id\').val();
		debugger
		var selected_Date="";
		var count="";
		$(\'#dt\').trigger(\'click\');


		if (unavail[7]==="on") {

			var check_in = [[fromDate[7], toDate[7]]];
			$(\'.dt\').datepicker({
				dateFormat: \'yy-mm-dd\',
				changeMonth: true,
				changeYear: true,
				minDate: today,
				beforeShowDay: function(date) {
					var string = jQuery.datepicker.formatDate(\'yy-mm-dd\', date);
					for (var i = 0; i < check_in.length; i++) {
						if (Array.isArray(check_in[i])) {
							var from = new Date(check_in[i][0]);
							var to = new Date(check_in[i][1]);
							var current = new Date(string);
							if (current >= from && current <= to) return false;
						}
					}
					return [check_in.indexOf(string) == -1]
				}
			});

		}else{

			var weekday=new Array(7);
			weekday[0]="mon_on";
			weekday[1]="Tue_on";
			weekday[2]="Wed_on";
			weekday[3]="Thu_on";
			weekday[4]="Fri_on";
			weekday[5]="Sat_on";
			weekday[6]="Sun_on";
			
			$( ".dt" ).datepicker({
				dateFormat : "yy-mm-dd",
				changeMonth: true,
				changeYear: true,
				minDate: today,
				onSelect: function(dateText, inst) {
					var date = $(this).datepicker(\'getDate\');
					selected_Date=$(\'.dt\').val();
					$(\'.dateInput\').val(selected_Date);
					var dayOfWeek = weekday[date.getUTCDay()];
  // dayOfWeek is then a string containing the day of the week
  $.ajax({
  	type: "POST",
  	url: "'; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
doc-appointments/add?ajax=y<?php echo '",
  	data: "d_Str=" + dayOfWeek +"&doc_id="+doc_id ,
  	success: function(msg) 
  	{
  		//debugger
  		$(\'#hour\').timepicker(\'remove\');
  		$(\'#hour\').hide();
  		var timDiv= $(\'.timeWrap\').addClass(\'ShowTimingBlock\');
  		var time_st="";
  		var time_end="";
  		if (msg!="") {
  			$(\'.hideHr\').show();
  			var res=JSON.parse(msg);
  			time_st=res.start;
  			time_end=res.end;
  			count=res.count;
  			$("#hour").timepicker({
  				
  				step: 60,
  				timeFormat: \'h:i A\',
  				dynamic: false,
  				dropdown: true,
  				scrollbar: true,
  				disableTextInput: true,
  				minTime: time_st,
  				maxTime:  time_end,
  				appendTo: timDiv
  			});
  			$(\'#hour\').trigger(\'click\');
  		}else{   
  			$(\'.hideHr\').hide();
  			alert("Doctor is not available on the selected date.");
  			$(\'#dt\').val(\'\');
  		}
  	}
  });
}
});		

		}

		$(\'#hour\').on("change",function(e,ui){
			var hr = $(\'#hour\').val();
			debugger;
			$.ajax({ 
				type: "POST",
				url: "'; ?>
<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
doc-appointments/add?appoint=y<?php echo '",
				data: "ap_time=" + hr +"&ap_date="+selected_Date+"&doc_id="+doc_id ,
				success: function(msg) 
				{
                  		//debugger
                  		$(\'#ap_number\').val(+msg + +1);

                  		if (parseInt(count) == parseInt(msg)) {

                  			$(\'#hour\').val(\'\');
                  			$(\'.ui-timepicker-selected\').addClass(\'disabledFullhr\');
                  			//$(\'#hour\').timepicker(\'hide\');
                  			alert("The selected hour\'s slot is full, please choose another time.");

                  		}
                  	}
                  });

		});

		$( "#dob" ).datepicker({
			yearRange: "-100:+0",
			dateFormat : "yy-mm-dd",
			changeMonth: true,
			changeYear: true
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
'; ?>
