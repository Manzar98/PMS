<html>
<head>
	<link rel="stylesheet" href="{$BASE_URL_ADMIN}_templates/css/print.css" type="text/css" media="print" />

</head>
<body>


	<div id="content">
		{if isset($printslip) && $printslip}

    <div> 

    	<div class="common-bottom text-center" style="margin-bottom: 40px;">
    		<h4><b>APPOINTMENT CONFIRMATION</b></h4>
    	</div>
    	<div class="noprint btnW">
    		<input type="button"class="btn btn-primary printBtn pull-right" value="Print" id="printPrescription">
    	</div>
    	
    	<div class="row common-bottom">
    		<div class="col-sm-10">
    			<div class="ac">
    				<span><b>Patient Name : </b><span>{$printslip.name}</span></span>
    			</div>
    			<div class="ac">
    				<span><b>Patient Id : </b><span>{$printslip.pat_id}</span></span>
    			</div>
    			<div class="ac">
    				<span><b>City : </b><span>{$printslip.city_id}</span></span>
    			</div>
    			<div class="ac">
    				<span><b>Address : </b><span>{$printslip.address}</span></span>
    			</div>
    			<div class="ac">
    				<span><b>Mobile No : </b><span>{$printslip.mobile}</span></span>
    			</div>
    			<div class="ac">
    				<span><b>Gender : </b><span>{$printslip.gender}</span></span>
    			</div>
    			<div class="ac"><span><b>Email : </b><span>{$printslip.email}</span></span></div>
    	</div>
    	<div class="col-sm-2">
    		 <div width="100" height="100" style="border: 1px solid;"></div>
    	</div>
    	</div>
    	<div class="row common-bottom bor">
    	<div class="col-sm-8">
    		<div class="common-bottom common-top">
    			<span class="common-bottom"><b>Appointment No : </b><span>{$printslip.ap_number}</span></span>
    		</div>
    		<div class="common-bottom">
    			<span class="common-bottom"><b>Appointment Date : </b><span>{$printslip.ap_date}</span></span>
    		</div>
    		<div class="common-bottom">
    			<span class="common-bottom"><b>Appointment Time : </b><span>{$printslip.ap_time}</span></span>
    		</div>
    	</div>
    	<div class="col-sm-4 ">
    		<div class="docInfo">
    			<div class="common-bottom">
    				<span class="doci"><b>Doctor's Name : </b><span>{$printslip.doc_name}</span></span>
    			</div>
    			<div class="common-bottom">
    				<span class="doci"><b>Clinic Phone Number: </b><span>{$printslip.doc_phne}</span></span> 
    			</div>
    			<div class="common-bottom">
    				<span class="doci" ><b>Clinic Address : </b><span>{$printslip.doc_adr}</span></span>
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
		{/if}
	</div><!-- #content -->
}
</body>
</html>
