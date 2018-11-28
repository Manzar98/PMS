<?php /* Smarty version 2.6.31, created on 2018-11-28 14:50:23
         compiled from appointments/list_appointments.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'appointments/list_appointments.tpl', 103, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="content" class="clientWrap">
	<?php if (isset ( $this->_tpl_vars['appoint'] ) && isset ( $this->_tpl_vars['pat'] ) && isset ( $this->_tpl_vars['doc'] )): ?>
	<!-- <?php echo $this->_tpl_vars['pat']; ?>
 -->

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
					<span><b>Patient Name : </b><span><?php echo $this->_tpl_vars['pat']['name']; ?>
</span></span>
				</div>
				<div class="ac">

					<span><b>Patient Id : </b><span><?php echo $this->_tpl_vars['pat']['id']; ?>
</span></span>
					
				</div>
				<div class="ac">
					<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
					<?php if ($this->_tpl_vars['pat']['city_id'] == $this->_tpl_vars['city']['id']): ?>
					<span><b>City : </b><span><?php echo $this->_tpl_vars['city']['name']; ?>
</span></span>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				</div> 
				<div class="ac">
					<span><b>Address : </b><span><?php echo $this->_tpl_vars['pat']['address']; ?>
</span></span>
				</div>
				<div class="ac">
					<span><b>Mobile No : </b><span><?php echo $this->_tpl_vars['pat']['mobile']; ?>
</span></span>
				</div>
				<div class="ac">
					<span><b>Gender : </b><span><?php echo $this->_tpl_vars['pat']['gender']; ?>
</span></span>
				</div>
				<div class="ac"><span><b>Email : </b><span><?php echo $this->_tpl_vars['pat']['email']; ?>
</span></span></div>
			</div>
			<div class="col-sm-2">
				<div width="100" height="100" style="border: 1px solid;"></div>
			</div>
		</div>
		<div class="row common-bottom bor">
			<div class="col-sm-8">
				<div class="common-bottom common-top">
					<span class="common-bottom"><b>Appointment No : </b><span><?php echo $this->_tpl_vars['appoint']['ap_number']; ?>
</span></span>
				</div>
				<div class="common-bottom">
					<span class="common-bottom"><b>Appointment Date : </b><span><?php echo $this->_tpl_vars['appoint']['ap_date']; ?>
</span></span>
				</div>
				<div class="common-bottom">
					<span class="common-bottom"><b>Appointment Time : </b><span><?php echo $this->_tpl_vars['appoint']['ap_time']; ?>
</span></span>
				</div>
			</div>
			<div class="col-sm-4 ">
				<div class="docInfo">
					<div class="common-bottom">
						<span class="doci"><b>Doctor's Name : </b><span><?php echo $this->_tpl_vars['doc']['F_name']; ?>
 <?php echo $this->_tpl_vars['doc']['L_name']; ?>
</span></span>
					</div>
					<div class="common-bottom">
						<span class="doci"><b>Clinic Phone Number: </b><span><?php echo $this->_tpl_vars['doc']['phone']; ?>
</span></span> 
					</div>
					<div class="common-bottom">
						<span class="doci" ><b>Clinic Address : </b><span><?php echo $this->_tpl_vars['doc']['c_address']; ?>
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
	<?php else: ?>
	<div class="row app_btns">
		<div class="col-sm-10"></div>
		<div class="col-sm-2 common-bottom" >
			<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
doc-appointments/?doc_id=<?php echo $this->_tpl_vars['doc']['id']; ?>
&doc_name=<?php echo $this->_tpl_vars['doc']['F_name']; ?>
 <?php echo $this->_tpl_vars['doc']['L_name']; ?>
 &doc_adr=<?php echo $this->_tpl_vars['doc']['c_address']; ?>
&doc_phne=<?php echo $this->_tpl_vars['doc']['phone']; ?>
&img=<?php echo $this->_tpl_vars['doc']['profile_img']; ?>
&speciallist=<?php echo $this->_tpl_vars['doc']['specialist']; ?>
&exprience=<?php echo $this->_tpl_vars['doc']['exprience']; ?>
&fee=<?php echo $this->_tpl_vars['doc']['c_fee']; ?>
&exist=patient" class="btn btn-primary">Get Appointment</a>
		</div>
	</div>

	
	<table class="table table-striped table-bordered" >
		<thead class="">
			<tr>
				<th>Patient ID</th>
				<th>Name</th>
				<th>City</th>
				<th>Appointment Date</th>
				<th>Appointment Time</th>
				<th>Appointment via</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

			<?php $_from = $this->_tpl_vars['pat_detials']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pat']):
?>
			<tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
				<td class="bold" width="35"><?php echo $this->_tpl_vars['pat']['id']; ?>
</td>
				<td width="200"><?php echo $this->_tpl_vars['pat']['name']; ?>
</td>
				<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
				<?php if ($this->_tpl_vars['pat']['city_id'] == $this->_tpl_vars['city']['id']): ?>
				<td><?php echo $this->_tpl_vars['city']['name']; ?>
</td>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<td width="200"><?php echo $this->_tpl_vars['pat']['ap_date']; ?>
</td>
				<td width="200"><?php echo $this->_tpl_vars['pat']['ap_time']; ?>
</td>
				<td width="200"><?php echo $this->_tpl_vars['pat']['online_manual']; ?>
</td>
				<td width="65">
					<div class="icons text-center">				
						<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
list-appointments/view/<?php echo $this->_tpl_vars['pat']['a_id']; ?>
/" title="View this Appointment"><img src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
_templates/img/eye.png" alt="View" /></a>
					</div>
					
				</td>
			</tr>
			<?php endforeach; else: ?>
			<tr style="color:red;">
				<td>
					No appointments exist.
				</td>
			</tr>
			<?php endif; unset($_from); ?>
		</tbody>
	</table>
	
	<?php endif; ?>

	<div style="margin-top: 30px;"></div>
</div><!-- #content -->

<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
<?php echo '
<script type="text/javascript">
	
	$(document).ready(function()
	{

		$("#printPrescription").click(function(){
			
			window.print();
		});

	});
</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>