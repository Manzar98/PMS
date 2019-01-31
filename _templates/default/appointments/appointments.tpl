{include file="header.tpl"}
<link rel="stylesheet" href="{$BASE_URL}portal/_templates/css/select2.css" />
<link rel="stylesheet" href="{$BASE_URL}portal/_templates/css/croppie.css" />
<link rel="stylesheet" href="{$BASE_URL}portal/_templates/css/jquery.timepicker.css" />
<div id="preloader" class="Fixed">
	<div data-loader="circle-side"></div>
</div>
<!-- /Preload-->
{if isset($doctors)}
<div id="results">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h4><strong>Showing 10</strong> of 140 results</h4>
			</div>
			<div class="col-md-6">
				<div class="search_bar_list">
					<input type="text" class="form-control" placeholder="Ex. Specialist, Name, Doctor...">
					<input type="submit" value="Search">
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /results -->
<div class="container margin_60_35">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				{foreach from=$doctors item=doctors}
				<div class="col-md-4">
					<div class="box_list wow fadeIn">
						<a href="#0" class="wish_bt"></a>
						<figure>
							<a href="{$BASE_URL}appointments/view/{$doctors.id}/"><img src="{$BASE_URL}portal/{$doctors.profile_img}" class="img-fluid" alt="" width="100%">
								<div class="preview"><span>Read more</span></div>
							</a>
						</figure>
						<div class="wrapper">
							{assign var=foo value=","|explode:$doctors.specialist}
							<small><i class="icon_circle-slelected" style="margin-right: 3px;"></i>{$foo[0]}</small>
							{if isset($foo[1])}
							<small><i class="icon_circle-slelected" style="margin-right: 3px;"></i>{$foo[1]}</small>
							{/if}
							<small class="arrow_carrot-2right moreSpecialization" title="{foreach from=$foo item=v}<i class='icon_circle-slelected' style='margin-right: 3px;font-size:11px; '></i>{$v}</br>{/foreach}" data-toggle="tooltip" data-placement="top" data-html="true"></small>

							<h3 class="text-capitalize">Dr.{$doctors.F_name} {$doctors.L_name}</h3>

							<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cuodo....</p>
							<span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
							<a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
						</div>
						<ul style="padding-bottom: 40px;">
							<li><a href="{$BASE_URL}appointments/view/{$doctors.id}/">Book now</a></li>
						</ul>
					</div>
				</div>
				{/foreach}
				<!-- /box_list -->
			</div>
		</div>
	</div>
</div>
{elseif isset($smarty.session.printslip)}
{assign var=printslip value=$smarty.session.printslip}
<div class="container margin_60_35" >
	<div class="appoint_Wrap" style="border:1px solid #F6F6F6; padding: 15px;"> 
		<div class="row">
			<div class="col-sm-11 text-center" style="margin-bottom: 40px;">
				<h4 class="py-3"><b>APPOINTMENT CONFIRMATION</b></h4>
			</div>
			<div class="col-sm-1 noprint btnW pt-1">
				<input type="button"class="btn btn-primary printBtn form-control" value="Print" id="printPrescription">
			</div>
		</div>
		<div class="row common-bottom">
			<div class="col-sm-10">
				<div class="ac form-group">

					<span><b>Patient Name : </b><span>{$printslip.name}</span></span>
				</div>
				<div class="ac form-group">

					<span><b>Patient Id : </b><span>{$printslip.pat_id}</span></span>

				</div>
				<div class="ac form-group">
					{foreach from=$cities item=city}
					{if $printslip.city_id==$city.id}
					<span><b>City : </b><span>{$city.name}</span></span>
					{/if}
					{/foreach}
				</div> 
				<div class="ac form-group">
					<span><b>Address : </b><span>{$printslip.address}</span></span>
				</div>
				<div class="ac form-group">
					<span><b>Mobile No : </b><span>{$printslip.mobile}</span></span>
				</div>
				<div class="ac form-group">
					<span><b>Gender : </b><span>{$printslip.gender}</span></span>
				</div>
				<div class="ac form-group"><span><b>Email : </b><span>{$printslip.email}</span></span></div>
			</div>
			<div class="col-sm-2">
				<div width="100" height="100" style="border: 1px solid;"></div>
			</div>
		</div>
		<div class="row mb-5 mt-5">
			<div class="col-sm-8 mt-2">
				<div class="pb-2">
					<span class=""><b>Appointment No : </b><span>{$printslip.ap_number}</span></span>
				</div>
				<div class="pb-2">
					<span class=""><b>Appointment Date : </b><span>{$printslip.ap_date}</span></span>
				</div>
				<div class="pb-2">
					<span class=""><b>Appointment Time : </b><span>{$printslip.ap_time}</span></span>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="docInfo">
					<div class="pb-2">
						<span><b>Doctor's Name : </b><span>{$printslip.doc_name}</span></span>
					</div>
					<div class="pb-2">
						<span><b>Clinic Phone Number: </b><span>{$printslip.doc_phne}</span></span> 
					</div>
					<div class="pb-2">
						<span><b>Clinic Address : </b><span>{$printslip.doc_adr}</span></span>
					</div>
				</div> 
			</div>
		</div>
		<div class="note" style=" " >
			<p class="text-center common-bottom not_p">
				<em class="text-danger">Note: &nbsp;</em> Please reach the clinic on time otherwise your appointment would be cancelled.
			</p>
			<p class="text-center doci">idoctor.pk</p>
		</div>
	</div>
</div>
{php} unset($_SESSION['printslip']); {/php}
{elseif isset($data)}
<div id="breadcrumb">
	<div class="container">
		<ul>
			<li><a href="{$BASE_URL}">Home</a></li>
			<li><a href="{$BASE_URL}appointments/">Doctors</a></li>
			<li>View</li>
		</ul>
	</div>
</div>
<!-- /breadcrumb -->
{if isset($appointmentFull)}
<div class="alert alert-danger alert-dismissible fade show mx-auto my-3 text-center" role="alert" style="width: 50%">
	<strong>{$appointmentFull}</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
{/if}
{if isset($existAppointment)}
<div class="alert alert-danger alert-dismissible fade show mx-auto my-3 text-center" role="alert" style="width: 50%">
	<strong>{$existAppointment}</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
{/if}
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
				<input type="hidden" name="" id="doc_name" value="{$data.F_name} {$data.L_name}">
				<input type="hidden" name="" id="doc_id" value="{$data.id}">
				<div class="box_general_3">
					<div class="profile">
						<div class="row">
							<div class="col-lg-5 col-md-4">
								<figure>
									<img src="{$BASE_URL}portal/{$data.profile_img}" alt="" class="img-fluid">
								</figure>
							</div>
							<div class="col-lg-7 col-md-8">
								<!-- <small>Primary care - Internist</small> -->
								<h1>DR. {$data.F_name} {$data.L_name}</h1>
								<span class="rating">
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star"></i>
									<small>(145)</small>
									<a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
								</span>
								<ul class="statistic">
									<li>854 Views</li>
									<li>{$noOfPatients} Patients</li>
								</ul>
								<ul class="contacts">
									<li>
										<h6>Fee</h6>
										Rs. {$data.c_fee} 
									</li>
									<li>
										<h6>Address</h6>
										{$data.c_address}
									</li>
									<li>
										<h6>Phone</h6> <a href="tel://{$data.phone}">{$data.phone}</a></li>
									</ul>
								</div>
							</div>
						</div>
						<hr>
						<!-- /profile -->
						<div class="indent_title_in">
							<i class="pe-7s-user"></i>
							<h3>Info</h3>
						</div>
						<div class="wrapper_indent">
							<div class="row pb-3">
								<div class="col-lg-6">
									<div class="pb-3">
										<span><b>Email Address : </b><span>{$data.email}</span></span>
									</div>
									<div class="pb-3">								{foreach from=$cities item=city}
										{if $data.city==$city.id}	
										<span><b>City : </b><span class="capitalize">{$city.name}</span></span>
										{/if}
										{/foreach}
									</div>
								</div>
								<div class="col-lg-6">
									<div class="pb-3">
										<span><b>Experience : </b><span>{$data.exprience} Years</span></span>
									</div>
									<div class="pb-3">
										<span><b>Qualification : </b><span class="capitalize">{$data.quali}</span></span>
									</div>
								</div>
							</div>
							<h6>Specializations</h6>
							<div class="row">
								<div class="col-lg-8">
									{assign var=foo value=","|explode:$data.specialist}
									<ul class="bullets mt-2 specializationWrap">
										{foreach from=$foo item=v}
										<li>{$v}</li>
										{/foreach}
									</ul>
								</div>
							</div>
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
											<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
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
										<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
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
										<i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
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
										<i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
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
					<form  id="add_user" class="" action="{$smarty.server.REQUEST_URI}" method="POST">
						<div class="title">
							<h3>Make an Appointment</h3>
							<small>Monday to Friday 09.00am-06.00pm</small>
						</div>
						<input type="hidden" name="" value="{$unavail}" id="unavail">
						<input type="hidden" name="" value="{$from}" id="from"> 
						<input type="hidden" name="" value="{$to}" id="to">
						<input type="hidden" name="ap_number" id="ap_number"> 

						<input type="hidden" name="doc_name" value="{$data.F_name} {$data.L_name}" id="doc_name">
						<input type="hidden" name="doc_adr" value="{$data.c_address}" id="doc_adr">
						<input type="hidden" name="doc_phne" value="{$data.phone}" id="doc_phne">
						<input type="hidden" name="u_id" value="{$data.id}" id="id">
						<input type="hidden" name="package_id" id="package_id" class="package_id" value="{$data.package_id}"/>
						<input type="hidden" name="online_manual" id="online_manual" value="online">
						<input type="hidden" name="pat_id" id="patient_id">
						<input type="hidden" name="sec_key" id="security_key">
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<div id="dateRendering">

									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<input class="form-control" type="text" id="bookingTime" name="hour">
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
										<option value="male" {if $data.gender =='male'} selected="selected" {/if}>Male</option>
										<option value="female" {if $data.gender =='female'} selected="selected" {/if}>Female</option>
										<option value="other" {if $data.gender =='other'} selected="selected" {/if}>Other</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<div class="AddDisSelect"></div>
									<label for="dob">Date of Birth</label>
									<input type="text" name="dob" id="dob" class="form-control e_dob" data-large-mode="true"/>
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
									<label for="city">City</label></br>
									<select name="city" id="city" class="form-control e_city">
										<option value="">Select City</option>
										{foreach from=$cities item=city}
										<option {if $data.city==$city.id} selected="selected" {/if} value="{$city.id}">{$city.name}</option>
										{/foreach}						
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
					<input type="button" name="" class="btn_1 full-width" value="Book Now" id="submitAppointment">
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
				<div class="modal-header header-forget-div">
					<h5 class="modal-title text-center" id="exampleModalLongTitle">Forget Security Key</h5>
					<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button> -->
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
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button> 
				</div> 
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="timeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header title-header-div">
					<h5 class="modal-title" id="exampleModalLongTitle">Select Hour</h5>
				</div>
				<div class="modal-body">
					<div class="hideHr">
						<div class="timeWrap">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button> 
				</div> 
			</div>
		</div>
	</div>
</div>
<!-- /container -->
<!-- <div class="row" style="margin-top: 10px;">
	<div class="col-sm-8"></div>
	<div class="col-sm-2 common-bottom" >
		<a href="{$BASE_URL}add-appointment/?doc_id={$data.id}&doc_name={$data.F_name} {$data.L_name} &doc_adr={$data.c_address}&doc_phne={$data.phone}&img={$data.profile_img}&speciallist={$data.specialist}&pkgId={$data.package_id}&exprience={$data.exprience}&fee={$data.c_fee}&exist=patient" class="btn btn-primary">Get Appointment</a>
	</div>
	<div class="col-sm-1"  >
		<a href="{$BASE_URL}history/" class="btn btn-primary">Veiw History</a>
	</div>
</div> -->
{/if}
{include file="footer.tpl"}
<script src="{$BASE_URL}_templates/{$THEME}/js/select2.js"></script>
<script src="{$BASE_URL}_templates/{$THEME}/js/jquery.timepicker.js" type="text/javascript"></script>
{literal}
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
.moreSpecialization{
	cursor: pointer;
}
.timeWrap .ui-timepicker-wrapper{
	display: block !important;
	position: relative !important;
	top: 0px !important;
	left: 0px !important;
}
.timeWrap .ui-timepicker-wrapper ul li:hover{
	background-color: #e74e84;
	color: #fff;
}
.timeWrap .ui-timepicker-wrapper ul li{
	display: inline-block;
	-moz-transition: all .3s ease-in-out;
	-o-transition: all .3s ease-in-out;
	-webkit-transition: all .3s ease-in-out;
	-ms-transition: all .3s ease-in-out;
	transition: all .3s ease-in-out;
	background-color: #f8f8f8;
	border-radius: 3px;
	padding: 8px 10px 6px;
	line-height: 1;
	min-width: 100px;
	margin: 5px;
	text-align: center;
	cursor: pointer;

}
.title-header-div{
	background-color: #3f4079;
	/*-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-ms-border-radius: 5px;
	border-radius: 5px;*/
	text-align: center;
	padding: 10px;
	margin-bottom: 30px;
}
.ui-timepicker-list{

	text-align: center !important;
}
.title-header-div h5{
	font-size: 16px;
	font-size: 1rem;
	color: #fff;
	text-align: center;
	margin-top: 5px !important;
	margin-bottom: 3px !important;
	margin: 0 auto;
}
.ui-timepicker-list .ui-timepicker-selected{
	background-color: #333 !important;
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
label.error{
	font-size: 11px;
	color: red;
}
.modal-backdrop {
	position: relative;
}
.header-forget-div{

	background-color: #3f4079;
	text-align: center;
}
.header-forget-div h5{

	color: #fff !important;
	margin: 0 auto;
	font-size: 16px;
}
</style>
<script type="text/javascript">
	$(document).ready(function()
	{


		$("#printPrescription").click(function(){
			
			window.print();
		});
/*==============
=========================
Start Submitting Form
=========================
==============*/
$('#submitAppointment').click(function(){

	var validator=$("#add_user").validate({
		rules: {
			dt: { required: true },
			hour: { required: true },
		},
		errorElement : 'label',
		errorPlacement: function(error, element) {

			//console.log(element);
			var placement = $(element).data('error');
			//console.log(placement);
			//console.log(error);
			if (placement) {
				$(placement).append(error)
			} else {
				error.insertAfter(element);
			}
		}
	});
	validator.form();

	if (validator.form()==false) {
		var body = $("html, body");
		$.each($('#add_user').find(".error"),function(key,value)
		{

			if($(value).css('display')!="none")
			{
				body.stop().animate({scrollTop:($(value).offset().top - 150)},1000, 'swing', function() { });
				return false; 
			}
		});
	}else{

		$("#add_user").submit();
	}
})
/*===================End Submitting Form====================*/


$('#bookingTime').focus(function(){
    //open bootsrap modal
    $('#timeModal').modal({
    	show: true
    });
});//TimePicker for Hour selection 

$('#dob').dateDropper();//dateDropper for Date of Birth

$("#city").select2({
                    // placeholder: "Select a State",
                    allowClear: true
                });
$('.select2-selection--single').addClass('form-control');
/*================
==========================
To Check Pateint is Exist or Not
==========================
==================*/
$('#existSearch').click(function(){
	var pat_id = $('#p_id').val();
	var doc_name = $('#doc_name').val();
	var doc_id = $('#doc_id').val();
	var sec_key = $('#sec_key').val();

	if (pat_id!="" && sec_key!="") {
		$.ajax({
			type: 'POST',
			url:'{/literal}{$BASE_URL}appointments?ajax=y{literal}',
			data: 'p_id='+pat_id+'&doc_id='+doc_id+'&doc_name='+doc_name+'&sec_key='+sec_key,
			success:function(msg){
				var res =JSON.parse(msg);
				if (res.status==true) {
					$("#add_new_patient").show();
					$('.e_name').val(res.msg.name);
					$('.e_name').prop('readonly',true);
					$('.e_gender').val(res.msg.gender);
					$('.e_gender').prop('readonly',true);
					$('.e_dob').val(res.msg.dob);
					$('.e_dob').prop('readonly',true);
					$('.e_marital_status').val(res.msg.marital_status);
					$('.e_marital_status').prop('readonly',true);
					$('.e_mobile').val(res.msg.mobile);
					$('.e_mobile').prop('readonly',true);
					$('.e_address').val(res.msg.address);
					$('.e_address').prop('readonly',true);
					$('.e_email').val(res.msg.email);
					$('.e_email').prop('readonly',true);
					$('#patient_id').val(res.msg.id)
					$('#security_key').val(res.msg.security_key);
					$('.e_city option[value="'+res.msg.city_id+'"]').prop("selected",true);
					$('.AddDisSelect').addClass('disabledSelect');
					$('.e_city').select2().trigger('change');

				}else{

					$('#p_id').val('');
					$('#sec_key').val('');
					$('#snackbar').text(res.msg);
					var x = $("#snackbar");
					x.addClass('show');
                            // After 3 seconds, remove the show class from DIV
                            setTimeout(function(){ x.removeClass('show'); }, 3000);

                        }
                    }

                })
	}
})
/*===================End Pateint is Exist or Not====================*/

/*=============
=====================
To Add a New Patient
=====================
=============*/
$("#add_patient").click(function(){

	if ($('.e_name').val()=="") {
		$("#add_new_patient").toggle();
	}
	$('.AddDisSelect').removeClass('disabledSelect')
	$('#p_id').val('');
	$('#patient_id').val('');
	$('#security_key').val('');
	$('#add_new_patient input').val('');
	$('.e_name').prop('readonly',false);
	$('.e_gender').prop('readonly',false);
	$('.e_marital_status').prop('readonly',false);
	$('.e_dob').prop('readonly',false);
	$('.e_mobile').prop('readonly',false);
	$('.e_address').prop('readonly',false);
	$('.e_email').prop('readonly',false);
});
/*================End New Patient===================*/

/*================
=========================================================
TO Check Which days is available and Which dates is not available
=========================================================
===================*/
$('#bookingTime').attr('disabled', true);
var unavail=  $('#unavail').val().split(',');
var fromDate=  $('#from').val().split(',');
var toDate=  $('#to').val().split(',');
var today = new Date();
var doc_id= $('#id').val();
		//debugger
		var count="";
			// var check_in = [[fromDate[7], toDate[7]]];
			var start = new Date(fromDate[7]),
			end = new Date(toDate[7]),
			currentDate = new Date(start.getTime()),
			between = []
			while (currentDate <= end) {
				between.push((currentDate.getMonth()+1)+"/"+currentDate.getDate()+"/"+currentDate.getFullYear());
				currentDate.setDate(currentDate.getDate() + 1);
				
			}
			$('#booking_date').attr( 'data-disabled-days',between.toString())
			$("#dateRendering").html('<input class="form-control" type="text" id="booking_date" data-lang="en" data-min-year="2017" data-max-year="2020" data-disabled-days="'+between.toString()+'" name="dt" data-lock="from">');
			$('#booking_date').dateDropper();
			$('#booking_date').val('')
			var weekday=new Array(7);
			weekday[0]="mon_on";
			weekday[1]="Tue_on";
			weekday[2]="Wed_on";
			weekday[3]="Thu_on";
			weekday[4]="Fri_on";
			weekday[5]="Sat_on";
			weekday[6]="Sun_on";

			$('#booking_date').on("change",function(){

				var date = new Date($(this).val());
				//var disabledDate= $(this).val();
				var dayOfWeek = weekday[date.getUTCDay()];
				debugger;
				  // dayOfWeek is then a string containing the day of the week
				  $.ajax({
				  	type: "POST",
				  	url: "{/literal}{$BASE_URL}appointments?ejax=y{literal}",
				  	data: "d_Str=" + dayOfWeek +"&doc_id="+doc_id ,
				  	success: function(msg) 
				  	{
				  		$('#bookingTime').timepicker('remove');
				  		var timDiv= $('.timeWrap');
				  		debugger
				  		var time_st="";
				  		var time_end="";
				  		if (msg!="") {
				  			$('#bookingTime').attr('disabled', false);
				  			var res=JSON.parse(msg);
				  			time_st=res.start;
				  			time_end=res.end;
				  			count=res.count;
				  			$("#bookingTime").timepicker({
				  				step: 60,
				  				timeFormat: 'h:i A',
				  				dynamic: false,
				  				dropdown: true,
				  				scrollbar: true,
				  				disableTextInput: true,
				  				minTime: time_st,
				  				maxTime:  time_end,
				  				appendTo: timDiv
				  			});

				  		}else{ 
				  			$('#bookingTime').attr('disabled', true);
				  			$('#booking_date').val('');

				  			$('#snackbar').text('Doctor is not available on the selected date.');
				  			var x = $("#snackbar");
				  			x.addClass('show');
                            // After 3 seconds, remove the show class from DIV
                            setTimeout(function(){ x.removeClass('show'); }, 3000);
                        }
                    }
                });
				})
			/*==================End Days & Dates checking===============*/

/*=================
==========================
To Check Hour Slot is available
==========================
===================*/

$('#bookingTime').on("change",function(e,ui){


	debugger
	
	var hr = $('#bookingTime').val();
	var currentSelectedDate= $('#booking_date').val();
	var datearray = currentSelectedDate.split("/");
	var selected_Date = datearray[2] + '-' + datearray[0] + '-' + datearray[1];
				//debugger;
				$.ajax({ 
					type: "POST",
					url: "{/literal}{$BASE_URL}appointments?appoint=y{literal}",
					data: "ap_time=" + hr +"&ap_date="+selected_Date+"&doc_id="+doc_id ,
					success: function(msg) 
					{
                  		//debugger
                  		$('#ap_number').val(+msg + +1);
                  		///console.log(count);
                  		debugger
                  		if (parseInt(count) == parseInt(msg)) {

                  			$('#bookingTime').val('');

                  			$('.ui-timepicker-selected').addClass('disabledFullhr');
                  			$('#snackbar').text("The selected hour's slot is full, please choose another time.");
                  			var x = $("#snackbar");
                  			x.addClass('show');
                            // After 3 seconds, remove the show class from DIV
                            setTimeout(function(){ x.removeClass('show'); }, 3000);
                            var foo=$('.ui-timepicker-selected').clone()
                            var key=null;
                            $.each($('.ui-timepicker-list li'),function(k,y){

                            	if($(y).hasClass('ui-timepicker-selected')){

                            		key=k;
                            	}
                            })
							//key;
							$('.ui-timepicker-selected').remove()
							$('.ui-timepicker-list li:nth-child('+(key+1)+')').before(foo[0])
						}

					}
				});
			});
/*================End Check Hour script=================*/

/*=================
=========================
Send Security key if forgoton
=============================
==================*/
$('#sendSecKey').click(function(){
	var id =$('#sendPatId').val();
	var email =$('#sendEmail').val();
	var secKey =$('#security_key').val();
	var doc_id = $('#doc_id').val();
	var doc_name = $('#doc_name').val();
	if (id!="" && email!="") {
		$.ajax({
			type: "POST",
			url:"{{/literal}{$BASE_URL}appointments?yjax=x{literal}}",
			data:"pat_id=" + id +"&doc_id="+doc_id+"&email="+email+"&sec_key="+secKey+"&doc_name="+doc_name,
			success:function(msg){

				var res= JSON.parse(msg);

				if (res.status==true) {

					$('#sec_key_response').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>'+res.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
					setTimeout(function() {
						$(".alert").alert('close');
					}, 2000);
				}else{

					$('#sec_key_response').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>'+res.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
					setTimeout(function() {
						$(".alert").alert('close');
					}, 2000);
					$('#sendPatId').val('');
					$('#sendEmail').val('');
					$('#security_key').val('');
				}
			}
		})
	}
});
/*======================End Send Security key======================*/
});
function generateRandomNumber(){//Security key generator

	var d=new Date();
	var n=d.getTime();
	n = n.toString()
	m=n.substring(9,14)
	$('#security_key').val(m);
}
</script>
<noscript>
	<style type="text/css">
	.pagecontainer {display:none;}
</style>
<div class="noscriptmsg">
	You don't have javascript enabled.  Good luck with that.
</div>
</noscript>
{/literal}
