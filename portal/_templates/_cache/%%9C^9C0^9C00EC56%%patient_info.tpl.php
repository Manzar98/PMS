<?php /* Smarty version 2.6.31, created on 2018-08-15 20:50:20
         compiled from patients/patient_info.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'patients/patient_info.tpl', 52, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script>
	$(document).ready(function(){
    $(\'#tabs div\').hide();
    $(\'#tabs div:first\').show();
    $(\'#tabs ul li:first\').addClass(\'active\');

    $(\'#tabs ul li a\').click(function(){
     $(\'#tabs ul li\').removeClass(\'active\');
     $(this).parent().addClass(\'active\');
     var currentTab = $(this).attr(\'href\');
     $(\'#tabs div\').hide();
     $(currentTab).show();
     return false;
   });
  });

</script>

'; ?>

<div id="content">
 <div class="container-fluid">
   <div id="tabs">
    <ul class="tabs">
     <li><a href="#patients_info">General info</a></li>
     <li><a href="#lifestyle">Lifestyle</a></li>
     <li><a href="#family_history">Family History</a></li>
     <li><a href="#relatives">Relatives</a></li>
     <li><a href="#other_history">Other History</a></li>
   </ul>
   <?php if (( $this->_tpl_vars['info']['patient_name'] !== null ) || ( $this->_tpl_vars['info']['gender'] !== null ) || ( $this->_tpl_vars['info']['marital_status'] !== null ) || ( $this->_tpl_vars['info']['blood_group'] !== null ) || ( $this->_tpl_vars['info']['occupation'] !== null ) || ( $this->_tpl_vars['info']['mobile'] !== null ) || ( $this->_tpl_vars['info']['city_name'] !== null ) || ( $this->_tpl_vars['info']['address'] !== null )): ?>
   <div id="patients_info">
     <table class="table table-stripped">
       <caption>General Info</caption>
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

     <a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patients/edit/<?php echo $this->_tpl_vars['info']['patient_id']; ?>
/" class="button-more">Edit it</a>

   </div>
   <?php endif; ?>
   <?php if (( $this->_tpl_vars['info']['father'] !== null ) || ( $this->_tpl_vars['info']['mother'] !== null ) || ( $this->_tpl_vars['info']['spouse'] !== null ) || ( $this->_tpl_vars['info']['siblings'] !== null ) || ( $this->_tpl_vars['info']['offspring'] !== null )): ?>
   <div id="family_history">
    <table class="table table-stripped">
      <caption>Family History</caption>
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
    <a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patient-family-history/edit/<?php echo $this->_tpl_vars['info']['patient_id']; ?>
/" class="button-more">Edit it</a>
  </div>
  <?php endif; ?>

  <?php if (( $this->_tpl_vars['info']['tabacco'] !== null ) || ( $this->_tpl_vars['info']['coffee'] !== null ) || ( $this->_tpl_vars['info']['alcohol'] !== null ) || ( $this->_tpl_vars['info']['recreational_drugs'] !== null ) || ( $this->_tpl_vars['info']['counseling'] !== null ) || ( $this->_tpl_vars['info']['exercise_patterns'] !== null ) || ( $this->_tpl_vars['info']['hazardous_activities'] !== null ) || ( $this->_tpl_vars['info']['sleep_patterns'] !== null ) || ( $this->_tpl_vars['info']['seatbelt_use'] !== null )): ?>
  <div id="lifestyle">
    <ul class="check">
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
    <a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patient-lifestyle/edit/<?php echo $this->_tpl_vars['info']['patient_id']; ?>
/" class="button-more">Edit it</a>
  </div>
  <?php endif; ?>
  <?php if (( $this->_tpl_vars['info']['cancer'] !== null ) || ( $this->_tpl_vars['info']['diabetes'] !== null ) || ( $this->_tpl_vars['info']['epilepsy'] !== null ) || ( $this->_tpl_vars['info']['heart'] !== null ) || ( $this->_tpl_vars['info']['high_blood_pressure'] !== null ) || ( $this->_tpl_vars['info']['mental_illness'] !== null ) || ( $this->_tpl_vars['info']['stroke'] !== null ) || ( $this->_tpl_vars['info']['suicide'] !== null ) || ( $this->_tpl_vars['info']['tuberculosis'] !== null )): ?>
  <div id="relatives">
    <table class="table table-stripped">
      <caption>Relatives</caption>
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
    <a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patient-relatives/edit/<?php echo $this->_tpl_vars['info']['patient_id']; ?>
/" class="button-more">Edit it</a>
  </div>
  <?php endif; ?>
  <?php if (( $this->_tpl_vars['info']['other_history_field1'] !== null ) || ( $this->_tpl_vars['info']['other_history_value1'] !== null ) || ( $this->_tpl_vars['info']['other_history_field2'] !== null ) || ( $this->_tpl_vars['info']['other_history_value2'] !== null )): ?>
  <div id="other_history">
    <table class="table table-stripped">
      <caption>Other History</caption>
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
    <a href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
patient-other-history/edit/<?php echo $this->_tpl_vars['info']['patient_id']; ?>
/" class="button-more">Edit it</a>
  </div>
  <?php endif; ?>
</div>					

</div><!-- #content -->
</div>
<div class="branding">Software Developed by GoWirelss - www.ugowireless.biz - 03008117700</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>