{include file="header.tpl"}
<div id="" class="content-wrapper">
 <div class="container-fluid">
  <!-- Breadcrumbs-->
  <div class="noprint">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{$BASE_URL_ADMIN}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{$BASE_URL_ADMIN}patients">Patients</a>
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
    {if ($info.patient_name !== null) || ($info.gender !== null) || ($info.marital_status !== null) || ($info.blood_group !== null) || ($info.occupation !== null) || ($info.mobile !== null) || ($info.city_name !== null) || ($info.address !== null)}
    <div id="patients_info">
     <a href="{$BASE_URL_ADMIN}patients/edit/{$info.patient_id}/" class="button-more btn btn-primary pull-right my-3">Edit it</a>
     <table class="table table-stripped">
       <!-- <caption>General Info</caption> -->
       <tbody>
         <tr>
           <td>Name </td>

           <td>{$info.patient_name}</td>
         </tr>
         <tr>
           <td>Gender </td>
           <td>{$info.gender}</td>
         </tr>
         <tr>
           <td>Marital Status </td>
           <td>{$info.marital_status}</td>
         </tr>
         <tr>
           <td>Date of Birth </td>
           <td>{$info.dob|date_format}</td>
         </tr>
         <tr>
           <td>Blood Group </td>
           <td>{$info.blood_group}</td>
         </tr>
         <tr>
           <td>Occupation </td>
           <td>{$info.occupation}</td>
         </tr>

         {if $info.field1 neq '' && $info.value1 neq ''}
         <tr>
           <td>{$info.field1} </td>
           <td>{$info.value1}</td>
         </tr>  					
         {/if}

         {if $info.field2 neq '' && $info.value2 neq ''}
         <tr>
           <td>{$info.field2} </td>
           <td>{$info.value2}</td>
         </tr>  					
         {/if}


         <tr>
           <td>Mobile </td>
           <td>{$info.mobile}</td>
         </tr>
         <tr>
           <td>Phone </td>
           <td>{$info.phone}</td>
         </tr>
         <tr>
           <td>City </td>
           <td>{$info.city_name}</td>
         </tr>
         <tr>
           <td>Address </td>
           <td>{$info.address}</td>
         </tr>
         <tr>
           <td>Date Added </td>
           <td>{$info.created_on|date_format:"%b %d, %Y - %H:%M:%S"}</td>
         </tr>
       </tbody>
     </table>
   </div>
   {/if}
   {if ($info.father !== null) || ($info.mother !== null) || ($info.spouse !== null) || ($info.siblings !== null) || ($info.offspring !== null)}
   <div id="family_history">
    <a href="{$BASE_URL_ADMIN}patient-family-history/edit/{$info.patient_id}/" class="button-more btn btn-primary pull-right my-3">Edit it</a>
    <table class="table table-stripped">
      <tbody>
        <tr>
          <td>Father </td>

          <td>{$info.father}</td>
        </tr>
        <tr>
          <td>Mother </td>
          <td>{$info.mother}</td>
        </tr>
        <tr>
          <td>Spouse </td>
          <td>{$info.spouse}</td>
        </tr>
        <tr>
          <td>Siblings </td>
          <td>{$info.siblings}</td>
        </tr>
        <tr>
          <td>Offspring</td>
          <td>{$info.offspring}</td>
        </tr>

      </tbody>
    </table>
  </div>
  {else}
  <div class="row" id="family_history">
   <div class="col-sm-2 mx-auto addBtnCls mt-5">
    <p class="py-2 ">No Family History Added</p>
    <a href="{$BASE_URL_ADMIN}patient-family-history/add/{$info.patient_id}/" class="button-more btn btn-primary my-3">Add Family History</a>    
  </div>
</div>
{/if}

{if ($info.tabacco !== null) || ($info.coffee !== null) || ($info.alcohol !== null) || ($info.recreational_drugs !== null) || ($info.counseling !== null) || ($info.exercise_patterns !== null) || ($info.hazardous_activities !== null) || ($info.sleep_patterns !== null) || ($info.seatbelt_use !== null)}
<div id="lifestyle">
  <a href="{$BASE_URL_ADMIN}patient-lifestyle/edit/{$info.patient_id}/" class="button-more btn btn-primary pull-right my-3">Edit it</a>
  <ul class="check mt-5">
    {if $info.tabacco==1}<li>Tabacco</li> {/if}
    {if $info.coffee==1}<li>Coffee</li> {/if}
    {if $info.alcohol==1}<li>Alcohol</li> {/if}
    {if $info.recreational_drugs==1}<li>Recreational Drugs</li> {/if}
    {if $info.counseling==1}<li>Counseling</li> {/if}
    {if $info.exercise_patterns==1}<li>Exercise Patterns</li> {/if}
    {if $info.hazardous_activities==1}<li>Hazardous Activities</li> {/if}
    {if $info.sleep_patterns==1}<li>Sleep Patterns</li> {/if}
    {if $info.seatbelt_use==1}<li>Seatbelt Use</li> {/if}
  </ul>
  <br/>
</div>
{else}
<div class="row" id="lifestyle">
 <div class="col-sm-2 mx-auto addBtnCls mt-5">
  <p class="py-2 ">No Other History Added</p>
  <a href="{$BASE_URL_ADMIN}patient-lifestyle/add/{$info.patient_id}/" class="button-more btn btn-primary my-3">Add Lifestyle</a>    
</div>
</div>
{/if}
{if ($info.cancer !== null) || ($info.diabetes !== null) || ($info.epilepsy !== null) || ($info.heart !== null) || ($info.high_blood_pressure !== null) || ($info.mental_illness !== null) || ($info.stroke !== null) || ($info.suicide !== null) || ($info.tuberculosis !== null)}
<div id="relatives">
  <a href="{$BASE_URL_ADMIN}patient-relatives/edit/{$info.patient_id}/" class="button-more btn btn-primary pull-right my-3">Edit it</a>
  <table class="table table-stripped">
    <tbody>
      <tr>
        <td>Cancer </td>

        <td>{$info.cancer}</td>
      </tr>
      <tr>
        <td>Diabetes </td>
        <td>{$info.diabetes}</td>
      </tr>
      <tr>
        <td>Epilepsy </td>
        <td>{$info.epilepsy}</td>
      </tr>
      <tr>
        <td>Heart </td>
        <td>{$info.heart}</td>
      </tr>
      <tr>
        <td>High Blood Pressure</td>
        <td>{$info.high_blood_pressure}</td>
      </tr>
      <tr>
        <td>Mental illness </td>

        <td>{$info.mental_illness}</td>
      </tr>
      <tr>
        <td>Stroke </td>
        <td>{$info.stroke}</td>
      </tr>
      <tr>
        <td>Suicide </td>
        <td>{$info.suicide}</td>
      </tr>
      <tr>
        <td>Tuberculosis </td>
        <td>{$info.tuberculosis}</td>
      </tr>
    </tbody>
  </table>
</div>
{else}
<div class="row" id="relatives">
 <div class="col-sm-2 mx-auto addBtnCls mt-5">
  <p class="py-2 ">No Relatives Added</p>
  <a href="{$BASE_URL_ADMIN}patient-relatives/add/{$info.patient_id}/" class="button-more btn btn-primary my-3">Add Relatives</a>    
</div>
</div>
{/if}

{if ($info.other_history_field1 !== null) || ($info.other_history_value1 !== null) || ($info.other_history_field2 !== null) || ($info.other_history_value2 !== null)}
<div id="other_history">
 <a href="{$BASE_URL_ADMIN}patient-other-history/edit/{$info.patient_id}/" class="button-more btn btn-primary pull-right my-3">Edit it</a>
 <table class="table table-stripped">
  <tbody>
    {if $info.other_history_field1 neq '' && $info.other_history_value1 neq ''}
    <tr>
      <td>{$info.other_history_field1} </td>
      <td>{$info.other_history_value1}</td>
    </tr>  					
    {/if}

    {if $info.other_history_field2 neq '' && $info.other_history_value2 neq ''}
    <tr>
      <td>{$info.other_history_field2} </td>
      <td>{$info.other_history_value2}</td>
    </tr>  					
    {/if}

    {if $info.other_additional_history neq ''}
    <tr>
      <td>Additional History</td>
      <td>{$info.other_additional_history}</td>
    </tr>  					
    {/if}    					
  </tbody>
</table>
</div>
{else}
<div class="row" id="other_history">
 <div class="col-sm-2 mx-auto addBtnCls mt-5">
  <p class="py-2 ">No Other History Added</p>
  <a href="{$BASE_URL_ADMIN}patient-other-history/add/{$info.patient_id}/" class="button-more btn btn-primary my-3">Add Other History</a>    
</div>
</div>
{/if}
</div>					

</div><!-- #content -->
</div>
{include file="footer.tpl"}
{literal}
<script>
  $(document).ready(function(){
    $('#tabs div').hide();
    $('#tabs div:first').show();
    $('#tabs ul li:first a').addClass('active');

    $('#tabs ul li a').click(function(){
     $('#tabs ul li a').removeClass('active');
     $(this).parent().addClass('active');
     var currentTab = $(this).attr('href');
     $('#tabs div').hide();
     $(currentTab).show();
     $(currentTab).find('.addBtnCls').show();
     return false;
   });
  });

</script>

{/literal}