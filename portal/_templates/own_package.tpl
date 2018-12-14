{include file="header.tpl"}
<div id="" class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<div class="noprint">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{$BASE_URL_ADMIN}">Dashboard</a>
				</li>	
				<li class="breadcrumb-item active">View Package</li>

			</ol>
		</div>
		<h2 class="pt-2">Package Details</h2>
		<input type="hidden" name="" id="endDays" value='{$docDetails.expire|date_format:"%m/%d/%Y"}'>
		<div class="row text-center my-3 daysCounterWrap">
			<div class="col-sm-2 mx-auto">
				<div id="daysCounter"></div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-6 mx-auto">
				<table class="table table-bordered mt-5">
					<thead class="text-center text-white bg-dark">
						<tr>
							<th>Package Name</th>
							<th>Subscription Date</th>
							<th>Expiry Date</th>
						</tr>
					</thead>
					<tbody class="text-center text-dark font-weight-bold">
						<tr>
							<td class="text-capitalize">{$pkg_name}</td>
							<td>{$docDetails.d_join|date_format:"%d-%b-%Y"}</td>
							<td>{$docDetails.expire|date_format:"%d-%b-%Y"}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<table class="table table-striped table-bordered mt-5">
			<thead class="bg-dark">
				<tr >
					<th class="text-center text-white">Items</th>
					<th class="text-center text-white">Total</th>
					<th class="text-center text-white">Consumed</th>
				</tr>
			</thead>
			<tbody>
				<!-- {$Result|print_r} -->
				{foreach from=$Result key=k item=v}
				<tr class="">
					<td class="text-center text-dark">{$k}</td>
					{if $v[0]-$v[1] <= 10}
					{foreach from=$v item=val key=key}
					{if $val==""}
					<td class="text-center">0</td>
					{else}
					{if $key==1}
					<td class="text-center text-white font-weight-bold  bg-danger">{$val}</td>
					{else}
					<td class="text-center text-dark font-weight-bold">{$val}</td>
					{/if}
					{/if}
					{/foreach}
					{else}

					{foreach from=$v item=val}
					{if $val==""}
					<td class="text-center">0</td>
					{else}
					<td class="text-center text-dark font-weight-bold">{$val}</td>
					{/if}
					{/foreach}
					{/if}
					
				</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div><!-- #content -->
{include file="footer.tpl"}
<script src="{$BASE_URL_ADMIN}_templates/js/jquery.countdown.js"></script> 
{literal}
<style type="text/css">
#daysCounter{

	font-size: 23px;
	width: auto;
	height: auto;
	border: 1px solid #dcdcdc;
	padding: 10px;
	box-shadow: 0 0 5px 5px #dcdcdc;
	border-radius: 5px;
	font-weight: 700;
	color: #DC3545;
}
</style>
<script type="text/javascript">
	$('.daysCounterWrap').hide()
	$(document).ready(function(){
    
   	  var date1 = new Date(); //mm/dd/yyyy
   	  //debugger
      var date2 = new Date($('#endDays').val());  //mm/dd/yyyy
      var timeDiff = Math.abs(date2.getTime() - date1.getTime());
      var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
debugger
      if (diffDays < 30) {
      	debugger
      	$('.daysCounterWrap').show()
      	$('#daysCounter').countdown($('#endDays').val(), function(event) {
      		$(this).html(event.strftime('%D Days Left!'));
      	});
      }


})
</script>
{/literal}