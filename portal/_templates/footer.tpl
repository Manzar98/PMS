	
	</div><!-- #wrap -->
	<footer class="sticky-footer branding footer clear noprint">
		<div class="container">
			<div class="text-center">
				<small>Copyright © IDoctor.pk 2018-2019</small>
			</div>
		</div>
	</footer><!-- .footer -->

			<!--=========================
		=========================
	         Doctor Template Scripting Start
	    ========================== 
	    ========================== -->


	    <!-- Bootstrap core JavaScript-->
	    <script src="{$BASE_URL_ADMIN}_templates/vendor/jquery/jquery.min.js"></script> 
	    <script src="{$BASE_URL_ADMIN}_templates/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	    <!-- Core plugin JavaScript-->
	    <script src="{$BASE_URL_ADMIN}_templates/vendor/jquery-easing/jquery.easing.min.js"></script>
	    <!-- Page level plugin JavaScript-->
	    <script src="{$BASE_URL_ADMIN}_templates/vendor/chart.js/Chart.js"></script>
	    <script src="{$BASE_URL_ADMIN}_templates/vendor/datatables/jquery.dataTables.js"></script>
	    <script src="{$BASE_URL_ADMIN}_templates/vendor/datatables/dataTables.bootstrap4.js"></script> 
	    <script src="{$BASE_URL_ADMIN}_templates/vendor/jquery.selectbox-0.2.js"></script> 
	    <!-- <script src="{$BASE_URL_ADMIN}_templates/vendor/retina-replace.min.js"></script>  -->
	    <script src="{$BASE_URL_ADMIN}_templates/vendor/jquery.magnific-popup.min.js"></script>
	    <!-- Custom scripts for all pages-->
	    <script src="{$BASE_URL_ADMIN}_templates/js/admin.js"></script>
	    <script src="{$BASE_URL_ADMIN}_templates/js/datedropper.js"></script>
	    <!-- Custom scripts for this page-->
	    <!-- <script src="js/admin-charts.js"></script>  -->

	<!--=============================
		=============================
		    Doctor Template Scripting End 
		============================= 
		================================-->
		<script src="{$BASE_URL_ADMIN}_templates/js/jquery.bgiframe.js" type="text/javascript"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/jquery.validate.min.js" type="text/javascript"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/functions.js" type="text/javascript"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/main.js" type="text/javascript"></script>
		<!-- <script src="{$BASE_URL_ADMIN}_templates/js/bootstrap.min.js" type="text/javascript"></script> -->
		<script src="{$BASE_URL_ADMIN}_templates/js/categories.js" type="text/javascript"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/hoverIntent.js" type="text/javascript"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/links.js" type="text/javascript"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/select2.js" type="text/javascript"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/messages.js" type="text/javascript"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/overlay.js" type="text/javascript"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/types.js" type="text/javascript"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/jquery.fancybox.js" type="text/javascript"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/jquery.easing.1.3.js" type="text/javascript"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/jquery.timepicker.js" type="text/javascript"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/jquery-ui.min.js"></script>
		<!-- <script src="{$BASE_URL_ADMIN}_templates/js/core.js"></script> -->
		<script src="{$BASE_URL_ADMIN}_templates/js/widget.js"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/datepicker.js" type="text/javascript"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/accordion.js"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/croppie.js"></script>
		{if isset($editor)}
		<script src="{$BASE_URL_ADMIN}_templates/js/tiny_mce/tiny_mce.js" type="text/javascript"></script>
		<script src="{$BASE_URL_ADMIN}_templates/js/editor.js" type="text/javascript"></script>
		{literal}
		<script type="text/javascript">
			$( document ).ready(function(){

				tinyMCE.init({
					plugins : 'style,layer,table,save,advhr,advimage,advlink,media,searchreplace,contextmenu,paste,directionality,nonbreaking,xhtmlxtras',
					themes : 'advanced',
					languages : 'en',
					disk_cache : true,
					relative_urls : false, 
					debug : false
				});
			})
		</script>
		{/literal}
		{/if}
	<script type="text/javascript">
		SIK.I18n = {$translationsJson};
	</script>
		{literal}
		<script type="text/javascript">
		//<![CDATA[
		SIK.SIK_admin_url = "{/literal}{$BASE_URL_ADMIN}{literal}";
		SIK.FixPng(); 
		//]]>
		$(document).ready(function() {
			$("a.iframe").fancybox({
				hideOnContentClick: true,
				frameWidth: 980,
				frameHeight: 500
			});
		}); 
	</script>
	{/literal}
	<div id="overlay"><img src="{$BASE_URL_ADMIN}img/ajax-loader.gif" /></div>
	<div id="messagesContainer"></div>
	{if $CURRENT_PAGE == "categories"}
	<div id="help" style="display: none;">
		<p class="bold">Categories help</p>
		<ul>
			<li><strong>Name</strong>: The name that will be used in the template</li>
			<li><strong>Title</strong>:</li>
			<li><strong>Description</strong>:</li>
			<li><strong>Keywords</strong>:</li>
			<li><strong>URL</strong>:</li>
		</ul>
	</div>
	{/if}
</body>
</html>