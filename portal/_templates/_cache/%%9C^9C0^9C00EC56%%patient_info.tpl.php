<?php /* Smarty version 2.6.31, created on 2018-12-27 18:26:15
         compiled from patients/patient_info.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'patients/patient_info.tpl', 45, false),)), $this); ?>
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
patients">Patients</a>
      </li>
      <li class="breadcrumb-item active">View</li>
    </ol>
  </div>
  <div id="tabs">
    <ul class="nav nav-tabs">
      <li class="nav-item"><a href="#patients_info" class="nav-link">General info</a></li>
      <li  class="nav-item"><a href="#lifestyle" class="nav-link">Lifestyle</a></li>
      <li  class="nav-item"><a href="#family_history"  class="nav-link">Family History</a></li>
      <li  class="nav-item"><a href="#relatives"  class="nav-link">Relatives</a></li>
      <li  class="nav-item"><a href="#other_history"  class="nav-link">Other History</a></li>
    </ul>
    <?php if (( $this->_tpl_vars['info']['patient_name'] !== null ) || ( $this->_tpl_vars['info']['gender'] !== null ) || ( $this->_tpl_vars['info']['marital_status'] !== null ) || ( $this->_tpl_vars['info']['blood_group'] !== null ) || ( $this->_tpl_vars['info']['occupation'] !== null ) || ( $this->_tpl_vars['info']['mobile'] !== null ) || ( $this->_tpl_vars['info']['city_name'] !== null ) || ( $this->_tpl_vars['info']['address'] !== null )): ?>
    <div id="patients_info">
     <a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/edit/<?php echo $this->_tpl_vars['info']['patient_id']; ?>
/" class="button-more btn btn-primary pull-right my-3">Edit it</a>
     <table class="table table-stripped">
       <!-- <caption>General Info</caption> -->
       <tbody>
         <tr>
           <td>Name </td>

           <td><?php echo $this->_tpl_vars['info']['patient_name']; ?>
</td>
         </tr>
         <tr>
           <td>Gender </td>
           <td><?php echo $this->_tpl_vars['info']['gender']; ?>
</td>
         </tr>
         <tr>
           <td>Marital Status </td>
           <td><?php echo $this->_tpl_vars['info']['marital_status']; ?>
</td>
         </tr>
         <tr>
           <td>Date of Birth </td>
           <td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['dob'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
         </tr>
         <tr>
           <td>Blood Group </td>
           <td><?php echo $this->_tpl_vars['info']['blood_group']; ?>
</td>
         </tr>
         <tr>
           <td>Occupation </td>
           <td><?php echo $this->_tpl_vars['info']['occupation']; ?>
</td>
         </tr>

         <?php if ($this->_tpl_vars['info']['field1'] != '' && $this->_tpl_vars['info']['value1'] != ''): ?>
         <tr>
           <td><?php echo $this->_tpl_vars['info']['field1']; ?>
 </td>
           <td><?php echo $this->_tpl_vars['info']['value1']; ?>
</td>
         </tr>  					
         <?php endif; ?>

         <?php if ($this->_tpl_vars['info']['field2'] != '' && $this->_tpl_vars['info']['value2'] != ''): ?>
         <tr>
           <td><?php echo $this->_tpl_vars['info']['field2']; ?>
 </td>
           <td><?php echo $this->_tpl_vars['info']['value2']; ?>
</td>
         </tr>  					
         <?php endif; ?>


         <tr>
           <td>Mobile </td>
           <td><?php echo $this->_tpl_vars['info']['mobile']; ?>
</td>
         </tr>
         <tr>
           <td>Phone </td>
           <td><?php echo $this->_tpl_vars['info']['phone']; ?>
</td>
         </tr>
         <tr>
           <td>City </td>
           <td><?php echo $this->_tpl_vars['info']['city_name']; ?>
</td>
         </tr>
         <tr>
           <td>Address </td>
           <td><?php echo $this->_tpl_vars['info']['address']; ?>
</td>
         </tr>
         <tr>
           <td>Date Added </td>
           <td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['created_on'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%b %d, %Y - %H:%M:%S") : smarty_modifier_date_format($_tmp, "%b %d, %Y - %H:%M:%S")); ?>
</td>
         </tr>
       </tbody>
     </table>
   </div>
   <?php endif; ?>
   <?php if (( $this->_tpl_vars['info']['father'] !== null ) || ( $this->_tpl_vars['info']['mother'] !== null ) || ( $this->_tpl_vars['info']['spouse'] !== null ) || ( $this->_tpl_vars['info']['siblings'] !== null ) || ( $this->_tpl_vars['info']['offspring'] !== null )): ?>
   <div id="family_history">
    <a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patient-family-history/edit/<?php echo $this->_tpl_vars['info']['patient_id']; ?>
/" class="button-more btn btn-primary pull-right my-3">Edit it</a>
    <table class="table table-stripped">
      <tbody>
        <tr>
          <td>Father </td>

          <td><?php echo $this->_tpl_vars['info']['father']; ?>
</td>
        </tr>
        <tr>
          <td>Mother </td>
          <td><?php echo $this->_tpl_vars['info']['mother']; ?>
</td>
        </tr>
        <tr>
          <td>Spouse </td>
          <td><?php echo $this->_tpl_vars['info']['spouse']; ?>
</td>
        </tr>
        <tr>
          <td>Siblings </td>
          <td><?php echo $this->_tpl_vars['info']['siblings']; ?>
</td>
        </tr>
        <tr>
          <td>Offspring</td>
          <td><?php echo $this->_tpl_vars['info']['offspring']; ?>
</td>
        </tr>

      </tbody>
    </table>
  </div>
  <?php else: ?>
  <div class="row" id="family_history">
   <div class="col-sm-2 mx-auto addBtnCls mt-5">
    <p class="py-2 ">No Family History Added</p>
    <a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patient-family-history/add/<?php echo $this->_tpl_vars['info']['patient_id']; ?>
/" class="button-more btn btn-primary my-3">Add Family History</a>    
  </div>
</div>
<?php endif; ?>

<?php if (( $this->_tpl_vars['info']['tabacco'] !== null ) || ( $this->_tpl_vars['info']['coffee'] !== null ) || ( $this->_tpl_vars['info']['alcohol'] !== null ) || ( $this->_tpl_vars['info']['recreational_drugs'] !== null ) || ( $this->_tpl_vars['info']['counseling'] !== null ) || ( $this->_tpl_vars['info']['exercise_patterns'] !== null ) || ( $this->_tpl_vars['info']['hazardous_activities'] !== null ) || ( $this->_tpl_vars['info']['sleep_patterns'] !== null ) || ( $this->_tpl_vars['info']['seatbelt_use'] !== null )): ?>
<div id="lifestyle">
  <a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patient-lifestyle/edit/<?php echo $this->_tpl_vars['info']['patient_id']; ?>
/" class="button-more btn btn-primary pull-right my-3">Edit it</a>
  <ul class="check mt-5">
    <?php if ($this->_tpl_vars['info']['tabacco'] == 1): ?><li>Tabacco</li> <?php endif; ?>
    <?php if ($this->_tpl_vars['info']['coffee'] == 1): ?><li>Coffee</li> <?php endif; ?>
    <?php if ($this->_tpl_vars['info']['alcohol'] == 1): ?><li>Alcohol</li> <?php endif; ?>
    <?php if ($this->_tpl_vars['info']['recreational_drugs'] == 1): ?><li>Recreational Drugs</li> <?php endif; ?>
    <?php if ($this->_tpl_vars['info']['counseling'] == 1): ?><li>Counseling</li> <?php endif; ?>
    <?php if ($this->_tpl_vars['info']['exercise_patterns'] == 1): ?><li>Exercise Patterns</li> <?php endif; ?>
    <?php if ($this->_tpl_vars['info']['hazardous_activities'] == 1): ?><li>Hazardous Activities</li> <?php endif; ?>
    <?php if ($this->_tpl_vars['info']['sleep_patterns'] == 1): ?><li>Sleep Patterns</li> <?php endif; ?>
    <?php if ($this->_tpl_vars['info']['seatbelt_use'] == 1): ?><li>Seatbelt Use</li> <?php endif; ?>
  </ul>
  <br/>
</div>
<?php else: ?>
<div class="row" id="lifestyle">
 <div class="col-sm-2 mx-auto addBtnCls mt-5">
  <p class="py-2 ">No Other History Added</p>
  <a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patient-lifestyle/add/<?php echo $this->_tpl_vars['info']['patient_id']; ?>
/" class="button-more btn btn-primary my-3">Add Lifestyle</a>    
</div>
</div>
<?php endif; ?>
<?php if (( $this->_tpl_vars['info']['cancer'] !== null ) || ( $this->_tpl_vars['info']['diabetes'] !== null ) || ( $this->_tpl_vars['info']['epilepsy'] !== null ) || ( $this->_tpl_vars['info']['heart'] !== null ) || ( $this->_tpl_vars['info']['high_blood_pressure'] !== null ) || ( $this->_tpl_vars['info']['mental_illness'] !== null ) || ( $this->_tpl_vars['info']['stroke'] !== null ) || ( $this->_tpl_vars['info']['suicide'] !== null ) || ( $this->_tpl_vars['info']['tuberculosis'] !== null )): ?>
<div id="relatives">
  <a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patient-relatives/edit/<?php echo $this->_tpl_vars['info']['patient_id']; ?>
/" class="button-more btn btn-primary pull-right my-3">Edit it</a>
  <table class="table table-stripped">
    <tbody>
      <tr>
        <td>Cancer </td>

        <td><?php echo $this->_tpl_vars['info']['cancer']; ?>
</td>
      </tr>
      <tr>
        <td>Diabetes </td>
        <td><?php echo $this->_tpl_vars['info']['diabetes']; ?>
</td>
      </tr>
      <tr>
        <td>Epilepsy </td>
        <td><?php echo $this->_tpl_vars['info']['epilepsy']; ?>
</td>
      </tr>
      <tr>
        <td>Heart </td>
        <td><?php echo $this->_tpl_vars['info']['heart']; ?>
</td>
      </tr>
      <tr>
        <td>High Blood Pressure</td>
        <td><?php echo $this->_tpl_vars['info']['high_blood_pressure']; ?>
</td>
      </tr>
      <tr>
        <td>Mental illness </td>

        <td><?php echo $this->_tpl_vars['info']['mental_illness']; ?>
</td>
      </tr>
      <tr>
        <td>Stroke </td>
        <td><?php echo $this->_tpl_vars['info']['stroke']; ?>
</td>
      </tr>
      <tr>
        <td>Suicide </td>
        <td><?php echo $this->_tpl_vars['info']['suicide']; ?>
</td>
      </tr>
      <tr>
        <td>Tuberculosis </td>
        <td><?php echo $this->_tpl_vars['info']['tuberculosis']; ?>
</td>
      </tr>
    </tbody>
  </table>
</div>
<?php else: ?>
<div class="row" id="relatives">
 <div class="col-sm-2 mx-auto addBtnCls mt-5">
  <p class="py-2 ">No Relatives Added</p>
  <a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patient-relatives/add/<?php echo $this->_tpl_vars['info']['patient_id']; ?>
/" class="button-more btn btn-primary my-3">Add Relatives</a>    
</div>
</div>
<?php endif; ?>

<?php if (( $this->_tpl_vars['info']['other_history_field1'] !== null ) || ( $this->_tpl_vars['info']['other_history_value1'] !== null ) || ( $this->_tpl_vars['info']['other_history_field2'] !== null ) || ( $this->_tpl_vars['info']['other_history_value2'] !== null )): ?>
<div id="other_history">
 <a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patient-other-history/edit/<?php echo $this->_tpl_vars['info']['patient_id']; ?>
/" class="button-more btn btn-primary pull-right my-3">Edit it</a>
 <table class="table table-stripped">
  <tbody>
    <?php if ($this->_tpl_vars['info']['other_history_field1'] != '' && $this->_tpl_vars['info']['other_history_value1'] != ''): ?>
    <tr>
      <td><?php echo $this->_tpl_vars['info']['other_history_field1']; ?>
 </td>
      <td><?php echo $this->_tpl_vars['info']['other_history_value1']; ?>
</td>
    </tr>  					
    <?php endif; ?>

    <?php if ($this->_tpl_vars['info']['other_history_field2'] != '' && $this->_tpl_vars['info']['other_history_value2'] != ''): ?>
    <tr>
      <td><?php echo $this->_tpl_vars['info']['other_history_field2']; ?>
 </td>
      <td><?php echo $this->_tpl_vars['info']['other_history_value2']; ?>
</td>
    </tr>  					
    <?php endif; ?>

    <?php if ($this->_tpl_vars['info']['other_additional_history'] != ''): ?>
    <tr>
      <td>Additional History</td>
      <td><?php echo $this->_tpl_vars['info']['other_additional_history']; ?>
</td>
    </tr>  					
    <?php endif; ?>    					
  </tbody>
</table>
</div>
<?php else: ?>
<div class="row" id="other_history">
 <div class="col-sm-2 mx-auto addBtnCls mt-5">
  <p class="py-2 ">No Other History Added</p>
  <a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patient-other-history/add/<?php echo $this->_tpl_vars['info']['patient_id']; ?>
/" class="button-more btn btn-primary my-3">Add Other History</a>    
</div>
</div>
<?php endif; ?>
</div>					

</div><!-- #content -->
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script>
  $(document).ready(function(){
    $(\'#tabs div\').hide();
    $(\'#tabs div:first\').show();
    $(\'#tabs ul li:first a\').addClass(\'active\');

    $(\'#tabs ul li a\').click(function(){
     $(\'#tabs ul li a\').removeClass(\'active\');
     $(this).parent().addClass(\'active\');
     var currentTab = $(this).attr(\'href\');
     $(\'#tabs div\').hide();
     $(currentTab).show();
     $(currentTab).find(\'.addBtnCls\').show();
     return false;
   });
  });

</script>

'; ?>