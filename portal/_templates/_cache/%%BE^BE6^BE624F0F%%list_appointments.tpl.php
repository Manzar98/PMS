<?php /* Smarty version 2.6.31, created on 2019-01-03 16:53:03
         compiled from appointments/list_appointments.tpl */ ?>
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
				<?php if (isset ( $this->_tpl_vars['id'] ) && $this->_tpl_vars['id'] == 'view' && $this->_tpl_vars['id'] != '0'): ?>
				<li class="breadcrumb-item">
					<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
list-appointments/<?php echo $_SESSION['AdminId']; ?>
/">Appointments</a>
				</li>
				<li class="breadcrumb-item active">View</li>
				<?php else: ?>
				<li class="breadcrumb-item active">Appointments</li>
				<?php endif; ?>
			</ol>
		</div>
		<?php if (isset ( $this->_tpl_vars['appoint'] ) && isset ( $this->_tpl_vars['pat'] ) && isset ( $this->_tpl_vars['doc'] )): ?>
		<!-- <?php echo $this->_tpl_vars['pat']; ?>
 -->
		<div class="appoint_Wrap"> 
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
						
						<span><b>Patient Name : </b><span><?php echo $this->_tpl_vars['pat']['name']; ?>
</span></span>
					</div>
					<div class="ac form-group">

						<span><b>Patient Id : </b><span><?php echo $this->_tpl_vars['pat']['id']; ?>
</span></span>

					</div>
					<div class="ac form-group">
						<?php $_from = $this->_tpl_vars['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
						<?php if ($this->_tpl_vars['pat']['city_id'] == $this->_tpl_vars['city']['id']): ?>
						<span><b>City : </b><span><?php echo $this->_tpl_vars['city']['name']; ?>
</span></span>
						<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
					</div> 
					<div class="ac form-group">
						<span><b>Address : </b><span><?php echo $this->_tpl_vars['pat']['address']; ?>
</span></span>
					</div>
					<div class="ac form-group">
						<span><b>Mobile No : </b><span><?php echo $this->_tpl_vars['pat']['mobile']; ?>
</span></span>
					</div>
					<div class="ac form-group">
						<span><b>Gender : </b><span><?php echo $this->_tpl_vars['pat']['gender']; ?>
</span></span>
					</div>
					<div class="ac form-group"><span><b>Email : </b><span><?php echo $this->_tpl_vars['pat']['email']; ?>
</span></span></div>
				</div>
				<div class="col-sm-2">
					<div width="100" height="100" style="border: 1px solid;"></div>
				</div>
			</div>
			<div class="row mb-5 mt-5">
				<div class="col-sm-8 mt-2">
					<div class="pb-2">
						<span class=""><b>Appointment No : </b><span><?php echo $this->_tpl_vars['appoint']['ap_number']; ?>
</span></span>
					</div>
					<div class="pb-2">
						<span class=""><b>Appointment Date : </b><span><?php echo $this->_tpl_vars['appoint']['ap_date']; ?>
</span></span>
					</div>
					<div class="pb-2">
						<span class=""><b>Appointment Time : </b><span><?php echo $this->_tpl_vars['appoint']['ap_time']; ?>
</span></span>
					</div>
				</div>
				<div class="col-sm-4 ">
					<div class="docInfo">
						<div class="pb-2">
							<span><b>Doctor's Name : </b><span><?php echo $this->_tpl_vars['doc']['F_name']; ?>
 <?php echo $this->_tpl_vars['doc']['L_name']; ?>
</span></span>
						</div>
						<div class="pb-2">
							<span><b>Clinic Phone Number: </b><span><?php echo $this->_tpl_vars['doc']['phone']; ?>
</span></span> 
						</div>
						<div class="pb-2">
							<span><b>Clinic Address : </b><span><?php echo $this->_tpl_vars['doc']['c_address']; ?>
</span></span>
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
		<?php else: ?>

		<div class="row app_btns">

			<div class="col-sm-10">
				<h2 class="py-4">List Of Appointments</h2>
			</div>
			<div class="col py-3" >
				<a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
doc-appointments/view/<?php echo $_SESSION['AdminId']; ?>
/" class="btn btn-primary">Add Appointment</a>
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
				<tr class="">
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
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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

