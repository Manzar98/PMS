<?php /* Smarty version 2.6.31, created on 2018-11-23 15:52:46
         compiled from appointments/appointments.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'print_r', 'appointments/appointments.tpl', 8, false),array('modifier', 'date_format', 'appointments/appointments.tpl', 57, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="content" class="publicWrap">



	<!-- <?php echo $_SERVER['REQUEST_URI']; ?>
  -->
	<!-- <?php echo ((is_array($_tmp=$this->_tpl_vars['doctors'])) ? $this->_run_mod_handler('print_r', true, $_tmp) : print_r($_tmp)); ?>
 -->
	
	<?php if (isset ( $this->_tpl_vars['doctors'] )): ?>
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
			<?php $_from = $this->_tpl_vars['doctors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['doctors']):
?>
			<div class="col-sm-3 common-bottom complete_wrap">
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
appointments/view/<?php echo $this->_tpl_vars['doctors']['id']; ?>
/" class="docCard">
					<div class="card text-center cardWrap">
						<img class="card-img-top" src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
<?php echo $this->_tpl_vars['doctors']['profile_img']; ?>
" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title info_wrap"><?php echo $this->_tpl_vars['doctors']['F_name']; ?>
 <?php echo $this->_tpl_vars['doctors']['L_name']; ?>
</h5>
							<p ><span class="info_wrap"><?php echo $this->_tpl_vars['doctors']['specialist']; ?>
</span> - 
								<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
								<?php if ($this->_tpl_vars['doctors']['city'] == $this->_tpl_vars['city']['id']): ?>
								<span class="info_wrap"><?php echo $this->_tpl_vars['city']['name']; ?>
</span>
								<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							</p>
						</div>
					</div>
				</a>
			</div>	
			<?php endforeach; endif; unset($_from); ?>
		</div>
	</fieldset>
	<?php elseif (isset ( $this->_tpl_vars['data'] )): ?>

	<div class="row">
		<div class="col-sm-10">
			<h3 class="noprint" ><?php echo $this->_tpl_vars['data']['F_name']; ?>
's Details</h3>
		</div>
		<div class="col-sm-2" style="padding-top: 25px;">
			<span class="date">Join Date:<em><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['d_join'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</em></span><br>
		</div>
	</div>
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
&exist=patient" class="btn btn-primary">Get Appointment</a>
		</div>
		<div class="col-sm-1"  >
			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
history/" class="btn btn-primary">Veiw History</a>
		</div>
	</div>

	<hr style="border-top: dotted 1px #DEDEDE; " /> 
	<div style="margin-top: 30px;"></div>
	<div class="row" style="margin-bottom: 20px;">
		<div class="text-center center-block"> <img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
<?php echo $this->_tpl_vars['data']['profile_img']; ?>
" alt="" width="12%">
		</div>
	</div>
	<div class="row ">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Name : </b><span>Dr. <?php echo $this->_tpl_vars['data']['F_name']; ?>
 <?php echo $this->_tpl_vars['data']['L_name']; ?>
</span></span>

		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>User's Name : </b><span><?php echo $this->_tpl_vars['data']['username']; ?>
</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Email Address : </b><span><?php echo $this->_tpl_vars['data']['email']; ?>
</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Specialist : </b><span class="capitalize"><?php echo $this->_tpl_vars['data']['specialist']; ?>
</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
			<?php if ($this->_tpl_vars['data']['city'] == $this->_tpl_vars['city']['id']): ?>	
			<span><b>City : </b><span class="capitalize"><?php echo $this->_tpl_vars['city']['name']; ?>
</span></span>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Clinic Address : </b><span><?php echo $this->_tpl_vars['data']['c_address']; ?>
</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Landline : </b><span><?php echo $this->_tpl_vars['data']['phone']; ?>
</span></span>
		</div>
		<div class="col-sm-4 common-bottom">
			<span><b>Doctor's Qualification : </b><span class="capitalize"><?php echo $this->_tpl_vars['data']['quali']; ?>
</span></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-4 common-bottom">
			<span><b>Doctor's Experience : </b><span><?php echo $this->_tpl_vars['data']['exprience']; ?>
</span></span>
		</div>
	</div>
	<div style="margin-bottom: 30px;"></div>
	<?php endif; ?>
</div><!-- #content -->

<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
<?php echo '
<script type="text/javascript">
	$(document).ready(function()
	{
		$(\'.docWrap\').hide();
		if ($(\'.errorId\').val()) {

			alert($(\'.errorId\').val());
		}

	});

	
	function myFunction(event) {

		var input=document.getElementById("mysearch");

		var filter=input.value;

		var trObj = $(\'.doctor_Wrap .complete_wrap\');
		$(\'.doctor_Wrap .complete_wrap\').hide();

		if (event.which==13 || event.type=="click" ) {

			$.each(trObj,function(k,value){

				if(value.innerHTML.toLowerCase().indexOf(filter) > -1){
					$(value).show();
				}
			});
// debugger;
}else if(event.type=="change"){

// debugger
filter=$(\'#searchBy_cat\').val();
console.log(filter);

$.each($(\'.info_wrap\'),function(k,value){

	console.log(value);

	if(value.innerHTML.toLowerCase().indexOf(filter) > -1){

		$(value).parents(\'.complete_wrap\').show();
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
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>